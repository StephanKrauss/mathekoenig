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
			$c['db']
		);
	};

	// Controller Übersicht
	$container[\App\Controller\Uebersicht\UebersichtController::class]=function($c) {
		return new \App\Controller\Uebersicht\UebersichtController(
			$c['view']
		);
	};
