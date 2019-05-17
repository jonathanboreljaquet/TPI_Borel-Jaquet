<?php
//Session
session_start();

//Database
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/db/database.php';

//Class
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/Client.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/Opinion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/About.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/Request.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/OpinionManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/ClientManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/RequestManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/StyleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/EventManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/MailerManager.php';

//SwiftMailer
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/config/mailparam.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/lib/swiftmailer5/lib/swift_required.php';

//Constante
const CLIENT = 0;
const REQUEST = 1;

const STATUS_OPEN = "OUVERTE";
const STATUS_IN_PROGRESS = "ENCOURS";
const STATUS_PROCESSED = "TRAITEE";
const STATUS_REFUSED = "REFUSEE";

const PAGE_ABOUT = "about.php";
const PAGE_CONTACT = "contact.php";
const PAGE_OPINION = "opinion.php";
const PAGE_CONNECTION = "connection.php";
const PAGE_ADMIN_ABOUT = "adminOpinion.php";
const PAGE_ADMIN_CONTACT = "adminContact.php";
const PAGE_ADMIN_STATISTIC = "adminStatistic.php";

const EVENT_TYPE_GIVE = "REDD";
const EVENT_TYPE_RETURN = "RECUP";


const RECEIVER_MAIL_REQUEST_ADD = "infoboboTPI@gmail.com";
const SUBJECT_MAIL_REQUEST_ADD = "[INFOBOBO.CH] Nouvelle demande de réparation";
const MESSAGE_MAIL_REQUEST_ADD = "Une nouvelle demande de réparation informatique vient d'être envoyé, 
                                  consulter l'administration du site <a href='infobobo.ch'>infobobo.ch</a> pour plus d'informations.";

const SUBJECT_MAIL_REQUEST_STATUS_UPDATE = "[INFOBOBO.CH] Réponse de la demande de réparation informatique";
const MESSAGE_MAIL_REQUEST_STATUS_UPDATE = "Bonjour et merci d'avoir choisis Infobobo pour votre réparation informatique.
                                            Le statut de votre demande de réparation informatique est passé à ";

const ALERT_TYPE_SUCCESS = "success";
const ALERT_TYPE_FAILED = "danger";

$arrConstStatus = array(
    STATUS_OPEN => "Ouverte",
    STATUS_IN_PROGRESS => "En cours",
    STATUS_PROCESSED => "Traitée",
    STATUS_REFUSED => "Refusée"
);

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
