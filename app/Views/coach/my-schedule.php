<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <title>Digital Sports Hub</title>
    <link href="<?=base_url('admin/css/tabler.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('admin/css/demo.min.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <style>
    @import url("https://rsms.me/inter/inter.css");
    </style>
</head>

<body>
    <script src="<?=base_url('admin/js/demo-theme.min.js')?>"></script>
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <?= view('coach/templates/sidebar')?>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <?= view('coach/templates/navbar')?>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">Digital Sports Hub</div>
                            <h2 class="page-title"><?=$title?></h2>
                        </div>
                        <!-- Page title actions -->
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div id='calendar'></div>
                </div>
            </div>
            <!-- END PAGE BODY -->
            <!--  BEGIN FOOTER  -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; <?= date('Y')?>
                                    <a href="." class="link-secondary">Digital Sports Hub</a>. All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="link-secondary" rel="noopener"> v1.1.1 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  END FOOTER  -->
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?=base_url('admin/js/tabler.min.js')?>" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?=base_url('admin/js/demo.min.js')?>" defer></script>
    <!-- END DEMO SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
    <?php $eventData = array();?>
    <?php 
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('accountID',session()->get('loggedUser'))->first();
        $matchModel = new \App\Models\matchModel();
        $event = $matchModel->WHERE('team1_id',$team['team_id'])->orWhere('team2_id',$team['team_id'])->findAll();
        foreach($event as $row)
        {
            // Combine date and time with a space
            $start = $row['date'] . (isset($row['time']) && $row['time'] ? ' ' . $row['time'] : '');
            // Optionally, set end time (here, just using start for both)
            $end = $start;
            $tempArray = array(
                "title" => 'Game Match',
                "description" => 'Competition',
                "start" => $start,
                "end" => $end
            );
            array_push($eventData, $tempArray);
        }
      ?>
    const jsonData = <?php echo json_encode($eventData); ?>;   
    var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
        initialView: "dayGridMonth",
        headerToolbar: {
            start: 'title', // will normally be on the left. if RTL, will be on the right
            center: '',
            end: 'today prev,next dayGridMonth timeGridWeek timeGridDay' // will normally be on the right. if RTL, will be on the left
        },
        selectable: true,
        editable: true,
        events: jsonData,
        views: {
            // Customize the timeGridWeek and timeGridDay views
            timeGridWeek: {
                buttonText: 'Week'
            },
            timeGridDay: {
                buttonText: 'Day'
            },
        }
    });

    calendar.render();
    </script>
</body>

</html>