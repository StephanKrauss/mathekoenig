<?php

	namespace App\Controller\Anmelden;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Anmeldung Controller
	 *
	 * @author Stephan Krauß
	 * @date 28.11.2017
	 * @file AnmeldenController.php
	 */
	class AnmeldenController
	{
		protected $view = null;
		protected $database = null;
		protected $validator = null;

		/**
		 * StartController constructor.
		 *
		 * @param \Slim\Tests\Views\Twig $view
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			\Slim\PDO\Database $database,
			\App\Validator\Gump $validator
		)
		{
			$this->view = $view;
			$this->database = $database;
			$this->validator = $validator;
		}

		/**
		 * @param \Slim\Http\Request $request
		 * @param \Slim\Http\Response $response
		 * @param array $params
		 *
		 * @return \Psr\Http\Message\ResponseInterface
		 * @throws \Exception
		 */
		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$templateVars = [];

				// Erststart
				if(count($params) == 0){
					$templateVars['subtemplate'] = 'anmelden';

					return $this->view->render( $response, 'main.tpl', $templateVars);
				}
				// Login / Anlegen
				else{
					$params = $this->checkParams($_POST);

					// Parameter fehlerhaft
					if(!$params['success']){
						return $this->view->render( $response, 'main.tpl', $templateVars);
					}
					// Parameter valid
					else{
						// Anmeldung vorhandener Account
						if($params['vorhanden'] == 1){
							$params = $this->accountVorhanden($params);
						}
						// anlegen neuer Account
						else{
							$params = $this->kontrolleBenutzername($params);
							// Benutzername noch nicht vorhanden
							if($params['success']){
								$params = $this->neuerSpielerAccount($params);
							}
						}

						echo json_encode($params);
					}
				}
			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * anlegen neuer Spieleraccount
		 *
		 * @param $params
		 *
		 * @return mixed
		 */
		protected function neuerSpielerAccount($params)
		{
			$database = $this->database;

			$cols = ['benutzername','passwort','geschlecht','adel_id'];
			$values = [$params['benutzername'],$params['passwort'],$params['geschlecht'],20];

			$stm = $database
				->insert()
				->into('benutzer')
				->columns($cols)
				->values($values);

			$params['benutzerId'] = $stm->execute();

			return $params;
		}

		/**
		 * Kontrolle ob Benutzername bereits vergeben
		 *
		 * @param $params
		 *
		 * @return mixed
		 */
		protected function kontrolleBenutzername($params)
		{
			$stm = $this->database
					->select()
					->from('benutzer')
					->where('benutzername',"=", $params['benutzername'])
					->execute();

			$data = $stm->fetchAll();

			if(count($data) >= 1){
				$params['success'] = false;
				$params['info'] = 'Benutzername bereits vergeben';
			}

			return $params;
		}

		/**
		 * überprüft die Zugangsdaten
		 *
		 * @param $params
		 *
		 * @return mixed
		 */
		protected function accountVorhanden($params)
		{
			$params['success'] = false;

			$stm = $this->database
				->select()
				->from('benutzer')
				->where('benutzername',"=", $params['benutzername'])
				->where('passwort',"=", $params['passwort'])
				->execute();

			$data = $stm->fetchAll();

			if(count($data) == 1){
				$params['success'] = true;
				$params['benutzerId'] = $data[0]['id'];
			}
			else
				$params['info'] = 'Benutzername oder Passwort unbekannt';

			return $params;
		}

		/**
		 * kontrolliert die übergebenen Parameter
		 *
		 * @return string
		 */
		protected function checkParams($params)
		{
			$success = false;
			$validator = $this->validator;
			$params = $validator->sanitize($params);

			$filters = [
				'benutzername' => 'trim|sanitize_string',
				'passwort' => 'trim|sanitize_string',
				'vorhanden' => 'trim|sanitize_numbers',
				'geschlecht' => 'trim|sanitize_numbers'
			];

			$rules = [
				'benutzername' => 'required|alpha_numeric|max_len,100|min_len,8',
				'passwort' => 'required|alpha_numeric|max_len,100|min_len,8',
				'vorhanden' => 'required|integer|contains,0 1',
				'geschlecht' => 'required|integer|contains,1 2'
			];

			$params = $validator->filter($params, $filters);
			$validated = $validator->validate($params, $rules);

			if($validated === TRUE)
			    $params['success'] = true;
			else{
				$params['success'] = false;
				$errors = $validator->get_readable_errors(true);
			}

			return $params;
		}
	}