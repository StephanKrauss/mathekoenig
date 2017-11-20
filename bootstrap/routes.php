<?php
/**
 * Routen des Projektes
 *
 * @author User
 * @since 20.11.2017 18:07
 */

// Startseite
$app->any('/' , $container[\App\Controller\Start\StartController::class]);
