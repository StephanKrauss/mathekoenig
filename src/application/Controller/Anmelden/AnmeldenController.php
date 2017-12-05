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

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$templateVars = [];

				$templateVars['subtemplate'] = 'anmelden';

				return $this->view->render( $response, 'main.tpl', $templateVars);
			}
			catch(\Exception $e){
				throw $e;
			}
		}
	}