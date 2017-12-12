<?php

	namespace App\Controller\Uebersicht;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Anmeldung Controller
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

		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$templateVars = [];
				
				$select = $this->database
					->select()
					->from('adel')
					->orderBy('id');

				$stm = $select->execute();
				$data = $stm->fetchAll();

				$data[0]['punkte'] = '';
				$data[1]['punkte'] = '';
				$data[2]['punkte'] = '';

				$templateVars['adel'] = $data;
				$templateVars['subtemplate'] = 'uebersicht';

				return $this->view->render( $response, 'main.tpl', $templateVars);
			}
			catch(\Exception $e){
				throw $e;
			}
		}
	}