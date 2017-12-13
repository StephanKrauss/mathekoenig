<?php
	/**
	 * Abhängigkeiten Tool, Model, Mapper, Controller
	 *
	 * @author User
	 * @since 20.11.2017 18:10
	 */

	// Controller Rechnen
	$container[\App\Controller\Rechnen\RechnenController::class] = function($c){
		return new \App\Controller\Rechnen\RechnenController(
			$c['view']
		);
	};

	// Controller Anmeldung
	$container[\App\Controller\Anmelden\AnmeldenController::class]=function($c) {
		return new \App\Controller\Anmelden\AnmeldenController(
			$c['view'],
			$c['db'],
			$c['validator']
		);
	};

	// Controller Übersicht
	$container[\App\Controller\Uebersicht\UebersichtController::class]=function($c) {
		return new \App\Controller\Uebersicht\UebersichtController(
			$c['view'],
			$c['db']
		);
	};

	// Controller Spielstand , Child
	$container[\App\Controller\Spielstand\SpielstandController::class]=function($c) {
		return new \App\Controller\Spielstand\SpielstandController(
			$c['db']
		);
	};

	// Controller Speichern , Child
	$container[\App\Controller\Speichern\SpeichernController::class]=function($c) {
		return new \App\Controller\Speichern\SpeichernController(
			$c['db'],
			$c['validator']
		);
	};
