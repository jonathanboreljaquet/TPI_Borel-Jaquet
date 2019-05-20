<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';

UserManager::VerificateRoleUser();
if (isset($_GET["saveEvent"])) {
    if (!empty($_GET["id_requestSelected"]) && !empty($_GET["eventDateStart"]) && !empty($_GET["eventDateEnd"])) {
        $id_request = filter_input(INPUT_GET, "id_requestSelected", FILTER_SANITIZE_STRING);
        $eventDateStart = filter_input(INPUT_GET, "eventDateStart", FILTER_SANITIZE_STRING);
        $eventDateEnd = filter_input(INPUT_GET, "eventDateEnd", FILTER_SANITIZE_STRING);
        if (EventManager::AddEvent($id_request, $eventDateStart, $eventDateEnd)) {
            echo "<div class='alert alert-success mb-0' role='alert'>Rendez-vous créé</div>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Problème lors de l'insertion du rendez-vous</div>";
        }
    }
}
$arrOpenRequest = RequestManager::GetOpenRequest();
?>
<!doctype html>
<html lang="fr">

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/header.php'; ?>
    <!--    Bootstrapp  4.0.0 et Fontawesome 5.0.6 -->
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
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
</head>

<body style="background-color: #272727;">
    <?php
    include "inc/navBar.php";
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-lg-10 col-md-10 border justify-content-center border-primary rounded mt-4 p-4 " style="background-color: #E0E0E0;">
                <div class="row justify-content-center mb-2">
                    <h4>Planification de rendez-vous</h4>
                    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
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
                                            <td> <textarea rows="5" class=" form-control" readonly style="resize: none;"><?= $request[REQUEST]->description ?></textarea></td>

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
        //list d'evenement a afficher dans le calendrier (propriétés events)
        var data = <?= EventManager::GetAllEventFormatJSON() ?>
    </script>
</body>
<script>
    //le script est a mettre en bas de la page comme ca le HTML est chargé
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timezone: "local",
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], //ceux que j'ai link (CSS/JS)
        header: { //le menu avec les différent boutons
            left: 'dayGridMonth,dayGridWeek,timeGridDay,list',
            center: 'title',
            right: 'prevYear,prev,next,nextYear'
        },
        themeSystem: 'bootstrap',
        defaultView: 'dayGridMonth', //le type de calendrier a afficher au chargement 
        selectable: true, // permet de chosir un jour
        locale: 'fr-ch', // la langue
        select: function(info) { // function a chaque click de date

            document.getElementById("eventDateStart").value = info.startStr;
            document.getElementById("eventDateEnd").value = info.endStr;
        },



        events: data

    });
    calendar.render();
</script>
<style>
    #calendar {
        background-color: #bfbfbf;
        color: black;
    }

    .fc-highlight {
        background-color: #595959;
    }

    .fc-unthemed td.fc-today {
        background-color: grey;
    }
    
</style>

</html>