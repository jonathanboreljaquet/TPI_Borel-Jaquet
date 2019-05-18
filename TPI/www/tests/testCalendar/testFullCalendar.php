<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/inc.all.php';
if (isset($_POST["saveEvent"])) {
    if ($_POST["id_requestSelected"] != null && $_POST["eventDate"] != null) {
        $id_request = filter_input(INPUT_POST, "id_requestSelected", FILTER_SANITIZE_STRING);
        $eventDate = filter_input(INPUT_POST, "eventDate", FILTER_SANITIZE_STRING);
        $eventHour = filter_input(INPUT_POST, "eventHour", FILTER_SANITIZE_STRING);
        $eventType = filter_input(INPUT_POST, "eventType", FILTER_SANITIZE_STRING);
        if (EventManager::AddEvent($id_request, $eventDate, $eventType, $eventHour)) {
            echo "<div class='alert alert-success mb-0' role='alert'>Rendez-vous créé</div>";
        } else {
            echo "<div class='alert alert-danger mb-0' role='alert'>Problème lors de l'insertion du rendez-vous</div>";
        }
    }
}
$arrOpenRequest = RequestManager::GetOpenRequest();

?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/www/inc/header.php'; ?>
    <!--    Bootstrapp  4.0.0 et Fontawesome 5.0.6 -->
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
    <!-- Plugins css pour un affichage correct des différents plugins utilisés-->
    <link href='fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar-4.1.0/packages/list/main.css' rel='stylesheet' />
    <!-- Plugins JS pour le bon fonctionnement des différents plugins utilisés-->
    <script src='fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <script src='fullcalendar-4.1.0/packages/list/main.js'></script>
    <!-- Plugin pour séléctionner une date dans le calendrier et pour mettre le calendrier en francais -->
    <script src='fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='fullcalendar-4.1.0/packages/core/locales/fr-ch.js'></script>

    <title>Calendar</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-10">
            <form method="POST" action="#">
                <input type="hidden" name="id_requestSelected" id="id_requestSelected">
                <div class="form-group">
                    <label for="eventDate">Date</label>
                    <input name="eventDate" type="text" class="form-control" id="eventDate" readonly>
                </div>
                <div class="form-group">
                    <label for="eventDate2">Date 2</label>
                    <input name="eventDate2" type="text" class="form-control" id="eventDate2" readonly>
                </div>
                <div class="form-group">
                    <select name="eventHour" class="custom-select">
                        <?php
                        for ($i = 1; $i <= 24; $i++) :
                            $value =  sprintf("%'.02d", $i) . ":00";
                            ?>
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endfor;  ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="eventType" class="custom-select">
                        <option value="<?= EVENT_TYPE_GIVE ?>">Récupération</option>
                        <option value="<?= EVENT_TYPE_RETURN ?>">Reddition</option>
                    </select>
                </div>
                <button type="submit" name="saveEvent" class="btn btn-primary">Planifier</button>
            </form>
            <?php
            foreach ($arrOpenRequest as $request) :
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="tableRequest table table-dark rounded border-primary">
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
                    </div>
                </div>
            <?php
        endforeach;
        ?>


        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".tableRequest").click(function() {
                $(".tableRequest").css("background-color", "#343a40");
                $(this).css("background-color", "#2c3e50");
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
    <div style="width: 50%; margin: auto">
        <div id='calendar'></div>
    </div>
</body>
<script>
    //le script est a mettre en bas de la page comme ca le HTML est chargé
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timezone: "local",
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], //ceux que j'ai link (CSS/JS)
        header: { //le menu avec les différent boutons
            left: 'dayGridMonth,timeGridWeek,timeGridDay,list',
            center: 'title',
            right: 'prevYear,prev,next,nextYear'
        },
        defaultView: 'dayGridMonth', //le type de calendrier a afficher au chargement 
        selectable: true, // permet de chosir un jour
        locale: 'fr-ch', // la langue
        dateClick: function(info) { // function a chaque click de date
            var today = new Date;
            var selectDay = new Date(info.dateStr);
            if (selectDay.getDay() < today.getDay()) {
                alert("Impossible de choisir une date plus petite qu'aujoud'hui");
            } else {

                document.getElementById("eventDate").value = info.dateStr;
            }
        },



        events: data

    });
    calendar.render();
</script>

</html>