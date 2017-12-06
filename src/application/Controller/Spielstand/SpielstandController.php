<?php

	namespace App\Controller\Spielstand;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Controller , Darstellung Spielstand
	 *
	 * @author Stephan Krauß
	 * @date 06.12.2017
	 * @file SpielstandController.php
	 */
	class SpielstandController
	{
		protected $database = null;
		protected $flagIsBurgbewohner = false;

		protected $cols = [
			'benutzer.id as benutzerId',
			'maennlich',
			'weiblich',
			'benutzername',
			'geschlecht',
			'alias',
			'schatz'
		];

		/**
		 * SpielstandController constructor.
		 *
		 * @param \Slim\PDO\Database $database
		 */
		public function __construct(
			\Slim\PDO\Database $database
		)
		{
			$this->database = $database;
		}

		/**
		 * allgemeiner Aufruf
		 *
		 * @param \Slim\Http\Request $request
		 * @param \Slim\Http\Response $response
		 * @param array $params
		 *
		 * @throws \Exception
		 */
		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$burgbewohner = $this->abfrageSpielstand($this->database, $_POST);
				$burgbewohner = $this->korrkturAdelstitel($burgbewohner, $_POST['benutzerId']);

				if(!$this->flagIsBurgbewohner)
					$burgbewohner = $this->bestimmenBenutzerangaben($this->database, $burgbewohner, $_POST['benutzerId']);

				$antwort = [
					'success' => true,
					'burgbewohner' => $burgbewohner
				];

				echo json_encode($antwort);

			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * bestimmt die aktuellen Angaben des Spieler
		 *
		 * @param $burgbewohner
		 * @param $benutzerId
		 */
		protected function bestimmenBenutzerangaben(\Slim\PDO\Database $database,array $burgbewohner, $benutzerId)
		{
			$stm = $database
				->select($this->cols)
				->from('benutzer')
				->join('adel', 'benutzer.adel_id','=','adel.id')
				->where('benutzer.id','=',$benutzerId)
				->execute();

			$data = $stm->fetchAll();
			$burgbewohner[3] = $data[0];

			if($data[0]['geschlecht'] == '1')
				$burgbewohner[3]['adel'] = $data[0]['maennlich'];
			else
				$burgbewohner[3]['adel'] = $data[0]['weiblich'];

			if(!empty($burgbewohner[3]['alias']))
				$burgbewohner[3]['benutzername'] = $burgbewohner[3]['alias'];

			return $burgbewohner;
		}

		/**
		 * Korrektur des Adelstitel der Burgbewohner
		 *
		 * @param $burgbewohner
		 *
		 * @return mixed
		 */
		protected function korrkturAdelstitel($burgbewohner, $benutzerId)
		{
			$korrekturAdel = [
				0 => [
					'König',
					'Königin'
				],
				1 => [
					'Prinz',
					'Prinzessin'
				],
				2 => [
					'Ritter',
					'Burgfräulein'
				]
			];

			for($i=0; $i < 3; $i++){
				if($burgbewohner[$i]['geschlecht'] == '1')
					$burgbewohner[$i]['adel'] = $korrekturAdel[$i][0];
				else
					$burgbewohner[$i]['adel'] = $korrekturAdel[$i][1];

				if(!empty($burgbewohner[$i]['alias']))
					$burgbewohner[$i]['benutzername'] = $burgbewohner[$i]['alias'];

				if($burgbewohner[$i]['benutzerId'] == $benutzerId)
					$this->flagIsBurgbewohner = false;
			}

			return $burgbewohner;
		}

		/**
		 * ermittelt den Spielstand des Spieler sowie den Spielstand der Bewohner der Burg
		 *
		 * @param \Slim\PDO\Database $database
		 * @param array $params
		 *
		 * @return array
		 */
		protected function abfrageSpielstand(\Slim\PDO\Database $database,array $params)
		{

			
			$stm = $database
				->select($this->cols)
				->from('benutzer')
				->join('adel', 'benutzer.adel_id','=','adel.id')
				->limit(3)
				->orderBy('schatz','DESC')
				->execute();

			$data = $stm->fetchAll();

			return $data;
		}
	}