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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('visualization', "1", {
        packages: ['corechart']
    });
    </script>
    <style>
    @import url("https://rsms.me/inter/inter.css");
    </style>
</head>

<body>
    <script src="<?=base_url('admin/js/demo-theme.min.js')?>"></script>
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <?= view('main/templates/sidebar')?>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <?= view('main/templates/navbar')?>
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
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="<?=site_url('teams')?>" class="btn btn-secondary"><i
                                        class="ti ti-arrow-left"></i> Back</a>
                                <?php if(session()->get('role')=="Super-admin"||session()->get('role')=="Organizer"): ?>
                                <a href="<?=site_url('go-live')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-video-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" />
                                        <path
                                            d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                        <path d="M7 12l4 0" />
                                        <path d="M9 10l0 4" />
                                    </svg>
                                    Go Live
                                </a>
                                <a href="<?=site_url('go-live')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-video-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" />
                                        <path
                                            d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                        <path d="M7 12l4 0" />
                                        <path d="M9 10l0 4" />
                                    </svg>
                                </a>
                                <?php endif;?>
                            </div>
                            <!-- BEGIN MODAL -->
                            <!-- END MODAL -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-address-book"></i>&nbsp;<?=$title?></div>
                                    <?php if($team):?>
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <img src="<?=base_url('admin/images/team/')?><?php echo $team['image'] ?>"
                                                        style="border-radius:25px;" />
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <span><i class="ti ti-chart-bar"></i>&nbsp;Team Stats</span>
                                                            <div id="chartContainer"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <span>Team</span>
                                            <h1><?php echo $team['team_name'] ?></h1>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>Coach Name</span>
                                                    <h1><?php echo $team['coach_name'] ?></h1>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>Name of Sports</span>
                                                    <h1><?=$sports['Name'] ?></h1>
                                                </div>
                                            </div>
                                            <span class="form-label">Name of School</span>
                                            <h1><?php echo $team['school'] ?></h1>
                                            <br />
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                                        <li class="nav-item">
                                                            <a href="#tabs-home-8" class="nav-link active"
                                                                data-bs-toggle="tab">
                                                                <i class="ti ti-play-handball"></i>&nbsp;Players
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#tabs-profile-8" class="nav-link"
                                                                data-bs-toggle="tab">
                                                                <i class="ti ti-history-toggle"></i>&nbsp;Match History
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#tabs-achievement-8" class="nav-link"
                                                                data-bs-toggle="tab">
                                                                <i class="ti ti-award"></i>&nbsp;Achievements
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade active show" id="tabs-home-8">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <th>#</th>
                                                                        <th>Last Name</th>
                                                                        <th>First Name</th>
                                                                        <th>MI</th>
                                                                        <th>Position</th>
                                                                        <th>Age</th>
                                                                        <th>Height</th>
                                                                        <th>Weight</th>
                                                                        <th><i class="ti ti-dots"></i></th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(empty($player)){ ?>
                                                                        <tr>
                                                                            <td colspan="9">
                                                                                <center>No Player(s) Added</center>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }else{ ?>
                                                                        <?php foreach($player as $row): ?>
                                                                        <?php
                                                                        $dob = $row['date_of_birth'];
                                                                        $dob = new DateTime($dob);
                                                                        $now = new DateTime();
                                                                        $age = $now->diff($dob);
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $row['jersey_num'] ?></td>
                                                                            <td><?php echo $row['last_name'] ?></td>
                                                                            <td><?php echo $row['first_name'] ?></td>
                                                                            <td><?php echo $row['mi'] ?></td>
                                                                            <td><?php echo $row['roleName'] ?></td>
                                                                            <td><?php echo $age->y ?></td>
                                                                            <td><?php echo $row['height'] ?>cm</td>
                                                                            <td><?php echo $row['weight'] ?>kgs</td>
                                                                            <td>
                                                                                <a href="<?=site_url('athletes/profile/')?><?php echo $row['player_id'] ?>"
                                                                                    class="btn btn-primary btn-sm">
                                                                                    <i
                                                                                        class="ti ti-user-search"></i>&nbsp;View
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tabs-profile-8">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <th>Date</th>
                                                                        <th>Match</th>
                                                                        <th>Results</th>
                                                                        <th>Location</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(empty($match)){ ?>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <center>No Match History</center>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }else{ ?>
                                                                        <?php foreach($match as $row): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo date('Y-M-d',strtotime($row->date)) ?>
                                                                            </td>
                                                                            <td><?php echo $row->team1 ?> VS
                                                                                <?php echo $row->team2 ?></td>
                                                                            <td><?php echo $row->result ?></td>
                                                                            <td><?php echo $row->location ?></td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tabs-achievement-8">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <th>#</th>
                                                                        <th>Achievements</th>
                                                                        <th>Earned At</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(empty($achievement)){ ?>
                                                                        <tr>
                                                                            <td colspan="3">
                                                                                <center>No Achievement(s) found</center>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }else { ?>
                                                                        <?php foreach($achievement as $row): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $row['team_achievement_id'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <b><?php echo $row['name'] ?></b><br />
                                                                                <small><?php echo $row['description'] ?></small>
                                                                            </td>
                                                                            <td><?php echo $row['earned_at'] ?></td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>
    google.charts.setOnLoadCallback(charts);

    function charts() {
        var data = google.visualization.arrayToDataTable([
            ["Category", "Value"],
            <?php 
            foreach ($stats as $row){
                echo "['Win', ".$row->win."],";
                echo "['Loss', ".$row->loss."],";
                echo "['Draw', ".$row->draw."],";
            }
            ?>
        ]);

        var options = {
            title: '',
            pieHole: 0.5,
            legend: 'bottom',
            backgroundColor: {
                fill: 'transparent'
            },
            chartArea: {
                width: '90%', // Optional: Adjust width of the chart area
                height: '80%' // Optional: Adjust height of the chart area
            },
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('chartContainer'));
        chart.draw(data, options);
    }
    </script>
</body>

</html>