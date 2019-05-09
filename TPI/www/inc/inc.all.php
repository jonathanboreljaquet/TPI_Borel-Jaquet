<?php
//Session
session_start();

//Database
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/database.php';

//Class
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/Client.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/Opinion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/About.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/manager/OpinionManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/manager/AboutManager.php';