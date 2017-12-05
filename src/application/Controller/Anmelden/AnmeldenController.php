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

		/**
		 * StartController constructor.
		 *
		 * @param \Slim\Tests\Views\Twig $view
		 */
		public function __construct(
			\Slim\Views\Twig $view
		)
		{
			$this->view = $view;
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
				// Login
				{
					echo $this->checkLogin($_POST);
				}

			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * kontrolliert die Anmeldung
		 *
		 * @return string
		 */
		protected function checkLogin()
		{
			$response = [
				'success' => true,
				'titelId' => 5,
				'titelName' => 'Herzog'
			];

			return json_encode($response);
		}
	}