<?php
//Session
session_start();

//Database
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/db/database.php';

//Class
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/Client.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/Opinion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/class/About.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/OpinionManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/ClientManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/manager/RequestManager.php';