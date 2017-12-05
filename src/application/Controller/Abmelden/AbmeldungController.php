<?php

	namespace App\Controller\Abmelden;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Abmeldung Controller
	 *
	 * @author Stephan Krauß
	 * @date 28.11.2017
	 * @file AnmeldenController.php
	 */
	class AbmeldungController
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

				return $this->view->render( $response, 'abmelden.tpl', $templateVars);
			}
			catch(\Exception $e){
				throw $e;
			}
		}
	}