<?php
/**
 * Routen des Projektes
 *
 * @author User
 * @since 20.11.2017 18:07
 */

// Startseite
$app->any('/' , $container[\App\Controller\Anmelden\AnmeldenController::class]);
$app->any('/anmelden/' , $container[\App\Controller\Anmelden\AnmeldenController::class]);

// Rechnen
$app->any('/rechnen/' , $container[\App\Controller\Rechnen\RechnenController::class]);

// Übersicht
$app->any('/uebersicht/' , $container[\App\Controller\Uebersicht\UebersichtController::class]);