<?php
/*
  Projet: SOS INFOBOBO
  Description:  Fichier à inclure dans tous les fichiers, inclus
                le démarrage de la session,
                la classe de connexion à la base de données,
                les classe conteneur,
                les classes manager,
                La configuration de Swift Mailer,
                Les constantes.

  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */

//Démarrage de la session
session_start();

//Classe de connexion à la base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/db/database.php';

//Classe conteneur
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/class/Client.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/class/Opinion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/class/About.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/class/Request.php';

//Classe Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/OpinionManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/ClientManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/RequestManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/StyleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/EventManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/manager/MailerManager.php';

//Swift Mailer
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/config/mailparam.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/lib/swiftmailer5/lib/swift_required.php';

//Constantes

//Index pour tableau d'objet CLIENT-REQUEST
const CLIENT = 0;
const REQUEST = 1;

//Statut d'une demande de réparation informatique
const STATUS_OPEN = "OUVERTE";
const STATUS_IN_PROGRESS = "ENCOURS";
const STATUS_PROCESSED = "TRAITEE";
const STATUS_REFUSED = "REFUSEE";

//Lien de toutes les vues du site
const PAGE_ABOUT = "index.php";
const PAGE_CONTACT = "contact.php";
const PAGE_OPINION = "opinion.php";
const PAGE_CONNECTION = "connection.php";
const PAGE_ADMIN_ABOUT = "aboutUpdate.php";
const PAGE_ADMIN_OPINION = "adminOpinion.php";
const PAGE_ADMIN_CONTACT = "adminContact.php";
const PAGE_ADMIN_STATISTIC = "adminStatistic.php";
const PAGE_ADMIN_CALENDAR = "adminCalendar.php";

//Type d'alerte Bootstrap
const ALERT_TYPE_SUCCESS = "success";
const ALERT_TYPE_FAILED = "danger";

//Tableau permettant la traduction BDD->Lisible des statuts de demande de réparation infromatique
$arrConstStatus = array(
    STATUS_OPEN => "Ouverte",
    STATUS_IN_PROGRESS => "En cours",
    STATUS_PROCESSED => "Traitée",
    STATUS_REFUSED => "Refusée"
);
//Tableau des mois pour l'affichage des statistiques 
$arrMonth = array(
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre",
);
