<?php

	namespace App\Controller\Uebersicht;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Erstellen der Übersicht der Adelstabelle und der vorhandenen Königreiche
	 *
	 * @author Stephan Krauß
	 * @date 28.11.2017
	 * @file AnmeldenController.php
	 */
	class UebersichtController
	{
		protected $view = null;
		protected $database = null;

		/**
		 * StartController constructor.
		 *
		 * @param \Slim\Tests\Views\Twig $view
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			\Slim\PDO\Database $database
		)
		{
			$this->view = $view;
			$this->database = $database;
		}

		/**
		 * steuert die Befüllung der Tabellen 'Adel' und 'Königreich'
		 *
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
				
				$adel = $this->tabelleAdel($this->database);
				$adel = $this->leerePositionen($adel);

				// zusammenfügen im Response
				$templateVars['adel'] = $adel;
				$templateVars['subtemplate'] = 'uebersicht';

				return $this->view->render( $response, 'main.tpl', $templateVars);
			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * ermittelt den Inhalt der Adels Tabelle
		 *
		 * @return array
		 */
		protected function tabelleAdel(\Slim\PDO\Database $database)
		{
			$select = $database
				->select()
				->from('adel')
				->orderBy('id');

			$stm = $select->execute();
			$data = $stm->fetchAll();

			return $data;
		}

		/**
		 * keine Darstellung der Goldstücke der Bewohner in der Königsburg
		 *
		 * @param $data
		 *
		 * @return mixed
		 */
		protected function leerePositionen($data)
		{
			$data[0]['punkte']='';
			$data[1]['punkte']='';
			$data[2]['punkte']='';

			return $data;
		}


	}