Manuel d'installation Sos Infobobo
=======================

124.0.0.1/SosInfobobo/www/


Qu’est-ce que Sos Infobobo ?
-------------

« Sos Infobobo » est une application WEB qui permet de principalement gérer 
des rendez-vous entre un réparateur informatique qui sera l’unique utilisateur 
connecté et des potentiels clients qui seront des utilisateurs non-connectés. 
L’application permet également au client de poster des avis sur la potentielle 
réparation effectuée qui devra d’abord être validée par le réparateur. 
Le réparateur, une fois connecté, a quant à lui accès à un calendrier avec ses 
différents rendez-vous planifiés ainsi qu’aux statistiques des réparations effectuées. 
Il aura également la possibilité de modifier ses informations personnelles dans une page dédiée pour cela. 
-----------------------

Comment installer et utiliser l'applciation WEB Sos Infobobo :

1. Installer et faire fonctionner un serveur WEB, PHP et MySQL (Apache,EasyPhp,PhpMyAdmin, MySQL, ect.)

2. Ajouter à la racine de votre serveur WEB le dossier SosInfobobo

	Exemple Apache : C:/LOCALHOST/SosInfobobo 
	Dans le httpd.conf : DocumentRoot "C:/LOCALHOST"

	Exemple EasyPhp : C:/EasyPHP-DevServer/data/localweb/projects/SosInfobobo

3. Importer le script sql "SOS_INFOBOBO_DB.sql"  dans votre logiciel de gestion et 
   d'administration de bases de données MySQL (MySql Workbench, phpMyAdmin)

4. Configurer un serveur MySql 
	3.1 Créer un utilisateur du nom de : BOREL_JAQUET_TPI
	3.2 Avec un mot de passe : Super2019
	3.4 Donner lui tout les droits sur la base de données "bj_tpi_bd" .

5. Vous pouvez maintenant utiliser le site WEB en accédant à l'url : 124.0.0.1/SosInfobobo/www/
--------------------------

