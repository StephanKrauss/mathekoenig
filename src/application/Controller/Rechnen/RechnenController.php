<?php

	namespace App\Controller\Rechnen;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Start Controller
	 *
	 * @author Stephan Krauß
	 * @date 20.11.2017
	 * @file Start.php
	 */
	class RechnenController
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


				return $this->view->render( $response, 'rechnen.tpl', $templateVars);
			}
			catch(\Exception $e){
				throw $e;
			}
		}
	}