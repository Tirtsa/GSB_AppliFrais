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

// vérification du statut de l'utilisateur connecté afin dde l'orienter vers l'accueil visiteur ou omptable
$visiteur = estVisiteurConnecte();
$comptable = estComptableConnecte();


if ($visiteur) {
    include 'vues/v_accueilVisiteur.php';
} elseif ($comptable){
        include 'vues/v_accueilComptable.php';
}else{
    include 'vues/v_connexion.php';
}
