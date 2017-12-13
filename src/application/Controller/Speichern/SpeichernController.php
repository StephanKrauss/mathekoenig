<?php

	namespace App\Controller\Speichern;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Fügt die Goldstücke des benutzer zu seinem Schatz hinzu
	 *
	 * @author Stephan Krauß
	 * @date 13.12.2017
	 * @file SpeichernController.php
	 */
	class SpeichernController
	{
		protected $database = null;
		protected $validator = null;

		/**
		 * SpeichernController constructor.
		 *
		 * @param \Slim\PDO\Database $database
		 * @param \App\Validator\Gump $validator
		 */
		public function __construct(
			\Slim\PDO\Database $database,
			\App\Validator\Gump $validator
		)
		{
			$this->database = $database;
			$this->validator = $validator;
		}

		/**
		 * Update Goldstuecke
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
				$params = $_POST;

				$kontrolle = 0;
				$params = $this->checkParams($this->validator, $params);

				if(is_array($params)){
					$vorhandeneGoldstuecke = $this->findeAnzahlGoldstuecke($this->database, $params['benutzerId']);
					$vorhandeneGoldstuecke += $params['anzahl'];
					$titel = $this->neuerTitel($this->database, $params['benutzerId'], $vorhandeneGoldstuecke);
					$kontrolle = $this->updateBenutzer($this->database, $params['benutzerId'], $vorhandeneGoldstuecke,$titel);
				}

				$antwort = [];
				if($kontrolle == 1)
					$antwort['success'] = true;
				else
					$antwort['success'] = false;

				echo json_encode($antwort);
			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * berechnen neue Titel ID
		 *
		 * @param $database
		 * @param $benutzerId
		 * @param $vorhandeneGoldstuecke
		 *
		 * @return mixed
		 */
		protected function neuerTitel($database, $benutzerId, $vorhandeneGoldstuecke)
		{
			$selectStatement = $database->select()
				->from('adel')
				->where('punkte','<=',$vorhandeneGoldstuecke)
				->where('punkte', '<', $vorhandeneGoldstuecke)
				->where('punkte','>',0);

			$stmt = $selectStatement->execute();
			$data = $stmt->fetch();

			return $data['id'];
		}

		/**
		 * findet die momentane Anzahl an Goldstücken
		 *
		 * @param $database
		 * @param $benutzerId
		 *
		 * @return mixed
		 */
		protected function findeAnzahlGoldstuecke($database, $benutzerId)
		{
			$selectStatement = $database->select()
			                           ->from('benutzer')
			                           ->where('id', '=', $benutzerId);

			$stmt = $selectStatement->execute();
			$data = $stmt->fetch();

			return $data['schatz'];
		}

		/**
		 * Kontrolle Anzahl Goldstuecke und Benutzer ID
		 *
		 * @param \App\Validator\Gump $validator
		 * @param array $params
		 *
		 * @return array|bool
		 */
		protected function checkParams(\App\Validator\Gump $validator,array $params)
		{
			$params = $validator->sanitize($params);

			$rules = [
				'benutzerId' => 'required|integer',
				'anzahl' => 'required|integer'
			];

			$filter = [
				'benutzerId' => 'trim|sanitize_numbers',
				'anzahl' => 'trim|sanitize_numbers'
			];

			$validator->validation_rules($rules);
			$validator->filter_rules($filter);

			$validatedData = $validator->run($params);

			if($validatedData === false) {
				return false;
			}
			else {
				return $validatedData;
			}
		}

		/**
		 * update des Bestandes an Goldstuecke
		 *
		 * @param $database
		 * @param $benutzerId
		 * @param $anzahl
		 *
		 * @return mixed
		 */
		protected function updateBenutzer($database, $benutzerId, $anzahl, $titel)
		{
			$updateCols = [
				'schatz' => $anzahl,
				'adel_id' => $titel
			];

			$updateStatement = $database->update($updateCols)
			                           ->table('benutzer')
			                           ->where('id', '=', $benutzerId);

			$affectedRows = $updateStatement->execute();

			return $affectedRows;
		}
	}