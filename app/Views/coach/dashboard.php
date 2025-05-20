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
                    <div class="row g-3 mb-3">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Incoming Matches</div>
                                    <h1>0</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Players</div>
                                    <h1><?=$totalPlayer ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Total Win</div>
                                    <h1><?=$win->total?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Total Loss</div>
                                    <h1><?=$loss->total?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Team Stats</div>
                                    <div id="chartContainer" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Match History</div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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