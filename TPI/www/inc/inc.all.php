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

const EVENT_TYPE_GIVE = "REDD";
const EVENT_TYPE_RETURN = "RECUP";


$arrConstStatus = array(
    STATUS_OPEN => "Ouverte",
    STATUS_IN_PROGRESS => "En cours",
    STATUS_PROCESSED => "Traitée",
    STATUS_REFUSED => "Refusée"
);


