<?php
	/**
	 * Abhängigkeiten Tool, Model, Mapper, Controller
	 *
	 * @author User
	 * @since 20.11.2017 18:10
	 */

	// Controller
	$container[\App\Controller\Start\StartController::class] = function($c){
		return new \App\Controller\Start\StartController(
			$c['view']
		);
	};

	$container[\App\Controller\Anmelden\AnmeldenController::class]=function($c) {
		return new \App\Controller\Anmelden\AnmeldenController(
			$c['view']
		);
	};
