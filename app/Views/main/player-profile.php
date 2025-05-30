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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
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
                                <a href="<?=site_url('athletes')?>" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Back</a>
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
                                        stroke-linejoin="round" class="icon icon-2">
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                                <?php endif; ?>
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
                        <div class="col-lg-4">
                            <div id="panorama" style="border-radius: 10px;"></div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        Player's Information
                                    </div>
                                    <br />
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-5">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['last_name']?>" readonly />
                                                </div>
                                                <div class="col-lg-5">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['first_name']?>" readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">M.I.</label>
                                                    <input type="text" class="form-control" value="<?=$player['mi']?>"
                                                        readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-2">
                                                    <label class="form-label">Jersey No</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['jersey_num']?>" readonly />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Position</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['roleName']?>" readonly />
                                                </div>
                                                <?php
                                                $dob = $player['date_of_birth'];
                                                $dob = new DateTime($dob);
                                                $now = new DateTime();
                                                $age = $now->diff($dob);
                                                ?>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Age</label>
                                                    <input type="text" class="form-control" value="<?=$age->y?>"
                                                        readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Height (cm)</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['height']?>" readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Weight (kgs)</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$player['weight']?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row row-deck row-cards">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">Player Stats</div>
                                            <div id="playerCharts"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">Recent Game Stats</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <th>Stats</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($recent as $row): ?>
                                                        <tr>
                                                            <td><?php echo $row->stat_type ?></td>
                                                            <td class="text-center"><?php echo $row->stat_value ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- END DEMO SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "<?=base_url('admin/images/profile/')?><?=$player['image']?>"
    });
    google.charts.setOnLoadCallback(playerCharts);

    function playerCharts() {
        var data = google.visualization.arrayToDataTable([
            ["Stats", "Total"],
            <?php 
                foreach ($stats as $row){
                    echo "['".$row->stat_type."',".$row->total."],";
                }
                ?>
        ]);

        var options = {
            title: '',
            pieHole: 0.5,
            legend: 'none',
            pieSliceText: 'percentage',
            backgroundColor: {
                fill: 'transparent'
            },
            chartArea: {
                width: '100%', // Optional: Adjust width of the chart area
                height: '100%' // Optional: Adjust height of the chart area
            },
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('playerCharts'));
        chart.draw(data, options);
    }
    </script>
</body>

</html>