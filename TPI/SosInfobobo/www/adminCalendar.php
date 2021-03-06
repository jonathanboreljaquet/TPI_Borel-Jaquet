<?php
/*
  Projet: SOS INFOBOBO
  Description: Page d'administration des rendez-vous du réparateur.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/SosInfobobo/www/inc/inc.all.php';
UserManager::VerificateRoleUser();
if (isset($_GET["saveEvent"])) {
    if (!empty($_GET["id_requestSelected"]) && !empty($_GET["eventDateStart"]) && !empty($_GET["eventDateEnd"])) {
        $id_request = filter_input(INPUT_GET, "id_requestSelected", FILTER_SANITIZE_STRING);
        $eventDateStart = filter_input(INPUT_GET, "eventDateStart", FILTER_SANITIZE_STRING);
        $eventDateEnd = filter_input(INPUT_GET, "eventDateEnd", FILTER_SANITIZE_STRING);
        $arrRequestClientById = RequestManager::GetRequestById($id_request);
        if (EventManager::AddEvent($id_request, $eventDateStart, $eventDateEnd)) {
            StyleManager::ShowAlert(ALERT_TYPE_SUCCESS, "Rendez-vous créé");
            MailerManager::SendMailToClient($arrConstStatus[STATUS_IN_PROGRESS], $arrRequestClientById[CLIENT], $arrRequestClientById[REQUEST]);
        } else {
            StyleManager::ShowAlert(ALERT_TYPE_FAILED, "Problème lors de l'insertion du rendez-vous");
        }
    } else {
        StyleManager::ShowAlert(ALERT_TYPE_FAILED, "Tous les éléments nécessaires n'ont pas été sélectionné");
    }
}
$arrOpenRequest = RequestManager::GetOpenRequest();
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Plugins css pour un affichage correct des différents plugins utilisés-->
    <link href='lib/fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet' />
    <link href='lib/fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet' />
    <link href='lib/fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet' />
    <link href='lib/fullcalendar-4.1.0/packages/list/main.css' rel='stylesheet' />
    <!-- Plugins JS pour le bon fonctionnement des différents plugins utilisés-->
    <script src='lib/fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='lib/fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='lib/fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <script src='lib/fullcalendar-4.1.0/packages/list/main.js'></script>
    <!-- Plugin pour séléctionner une date dans le calendrier et pour mettre le calendrier en francais -->
    <script src='lib/fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='lib/fullcalendar-4.1.0/packages/core/locales/fr-ch.js'></script>
    <title>Calendrier</title>
    <?php include "inc/header.php"; ?>
</head>

<body>
    <?php include "inc/navBar.php"; ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="section col-sm-10 col-lg-10 col-md-10 border justify-content-center border-primary rounded mt-4 p-4">
                <div class="row justify-content-center mb-2">
                    <h4>Planification de rendez-vous</h4>
                    <hr />
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div id='calendar' style="padding: 15px; border: solid #007bff 1px; border-radius: 5px;"></div>
                    </div>
                    <div class="col-lg-5 col-md-12  col-sm-12" style=" overflow: scroll; height:650px">
                        <form method="GET" action="#">
                            <input type="hidden" name="id_requestSelected" id="id_requestSelected">
                            <div class="form-group">
                                <label for="eventDateStart">Date de récupération</label>
                                <input name="eventDateStart" type="text" class="form-control" id="eventDateStart" readonly>
                            </div>
                            <div class="form-group">
                                <label for="eventDateEnd">Date de reddition</label>
                                <input name="eventDateEnd" type="text" class="form-control" id="eventDateEnd" readonly>
                            </div>
                            <button type="submit" name="saveEvent" class="btn btn-primary mb-2">Planifier</button>
                        </form>
                        <?php foreach ($arrOpenRequest as $request) : ?>
                            <div class="table-responsive">
                                <table class="tableRequest table table-dark rounded border-primary ">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%" scope="col">Id</th>
                                            <th style="width: 10%" scope="col">Nom</th>
                                            <th style="width: 10%" scope="col">Prénom</th>
                                            <th style="width: 70%" scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $request[REQUEST]->id_request ?></td>
                                            <td><?= $request[CLIENT]->firstName ?></td>
                                            <td><?= $request[CLIENT]->secondName ?></td>
                                            <td> <textarea rows="5" class=" form-control" readonly><?= $request[REQUEST]->description ?></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Fonction Javascript de sélection de la demande de réparation informatique 
        $(document).ready(function() {
            $(".tableRequest").click(function() {
                $(".tableRequest").css("background-color", "#212529");
                $(".tableRequest").css("border", "none");
                $(this).css("background-color", "#2c3e50");
                $(this).css("border", "2px solid #007bff ");
                var tableData = $(this).find("td").map(function() {
                    return $(this).text();
                });
                document.getElementById("id_requestSelected").value = tableData[0];
            });
        });
    </script>
    <script>
        //Liste d'événements en format JSON à afficher dans le calendrier (propriétés events)
        var data = <?= EventManager::GetAllEventFormatJSON() ?>
    </script>
</body>
<script>
    //Script de configuration et d'affichage FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timezone: "local",
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'dayGridMonth,dayGridWeek,timeGridDay,list',
            center: 'title',
            right: 'prevYear,prev,next,nextYear'
        },
        defaultView: 'dayGridMonth',
        selectable: true,
        locale: 'fr-ch',
        select: function(info) {

            document.getElementById("eventDateStart").value = info.startStr;
            document.getElementById("eventDateEnd").value = info.endStr;
        },
        events: data,
        eventColor: '#2C3E50',
        eventTextColor: '#FFFFFF'
    });
    calendar.render();
</script>

</html>