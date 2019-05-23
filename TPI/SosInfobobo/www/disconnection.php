<?php
/*
  Projet: SOS INFOBOBO
  Description: Script de déconnexion d'un utilisateur connecté.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
session_start();
session_destroy();
header("location: connection.php");
