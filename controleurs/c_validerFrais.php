<?php

/**
 * Gestion de l'accueil
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

//prérequis : clôture des fiches du mois passé
$mois = getMois(date('d/m/Y'));
$moisPrecedent = getMoisPrecedent($mois);



$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action){
    case 'choix':
        echo $moisPrecedent;
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $lesCles1 = array_keys($lesVisiteurs);
        $visiteurASelectionner = $lesCles1[0];
        
        $lesMois = getDouzeDerniersMois($mois);
        $lesCles2 = array_keys($lesMois);
        $moisASelectionner = $lesCles2[0];
        
         include 'vues/v_choixVisiteurMois.php';
         break;
    case 'validerChoix':
        $visiteurASelectionner = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_REQUIRE_ARRAY);
        var_dump($visiteurASelectionner);
        $moisASelectionner = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        
        $id = $visiteurASelectionner['id'];
        echo $id ;
        $mois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $lesMois = getDouzeDerniersMois($mois);
        
        $lesFraisForfait = $pdo->getLesFraisForfait($id, $mois);
        var_dump($lesFraisForfait);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($id, $mois);
        var_dump($lesFraisHorsForfait);
        
        include 'vues/v_choixVisiteurMois.php';
        include 'vues/v_listeFraisForfait.php';
        include 'vues/v_listeFraisHorsforfait.php';
        
        break;
}

