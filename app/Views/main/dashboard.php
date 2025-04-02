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
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title"><?=$title?></h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="<?=site_url('upload-video')?>" class="btn btn-secondary"><i
                                        class="ti ti-upload"></i>&nbsp;Upload</a>
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
                    <div class="row row-cards">
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-users"></i>&nbsp;Total Users</div>
                                    <h1 class="text-center"><?=$total?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-play-handball"></i>&nbsp;Players</div>
                                    <h1 class="text-center"><?=$player?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-users-group"></i>&nbsp;Teams</div>
                                    <h1 class="text-center"><?=$team?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-calendar"></i>&nbsp;Events</div>
                                    <h1 class="text-center"><?=$total_event?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-brand-youtube"></i>&nbsp;Videos</div>
                                    <h1 class="text-center"><?=$video?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><i class="ti ti-building-store"></i>&nbsp;Shops</div>
                                    <h1 class="text-center"><?=$shop?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row row-cards">
                        <div class="col-lg-9">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="row row-cards row-deck">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title"><i class="ti ti-live-view"></i>&nbsp;Daily Views</div>
                                                    <div id="viewChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title"><i class="ti ti-trending-up"></i>&nbsp;Viewers Trend</div>
                                                    <div id="videoChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title"><i class="ti ti-cast"></i>&nbsp;Live Streaming</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="tbl_trend">
                                                    <thead>
                                                        <th>Videos</th>
                                                        <th>Views</th>
                                                        <th>Users</th>
                                                        <th>Ave. Duration</th>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><i class="ti ti-calendar-week"></i>&nbsp;Incoming Events
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <div class="card-table table-responsive">
                                        <table class="table table-vcenter">
                                            <tbody>
                                                <?php if(empty($event)){ ?>
                                                <tr>
                                                    <td>
                                                        <center><span>No Event(s) found</span></center>
                                                    </td>
                                                </tr>
                                                <?php }else { ?>
                                                <?php foreach($event as $row): ?>
                                                <tr>
                                                    <td>
                                                        <b><?php echo $row['event_title'] ?></b><br />
                                                        <small><?php echo substr($row['event_description'],0,50) ?>...</small>
                                                    </td>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script>
        $('#tbl_trend').DataTable();
        google.charts.setOnLoadCallback(viewCharts);
        google.charts.setOnLoadCallback(videoCharts);

        function viewCharts() {
            var data = google.visualization.arrayToDataTable([
                ["Date", "Total"],
                <?php 
                    foreach ($views as $row){
                        echo "['".$row->date."',".$row->total."],";
                    }
                    ?>
            ]);

            var options = {
                title: '',
                legend: { position: 'bottom' },
                backgroundColor: {
                    fill: 'transparent'
                },
            };
            /* Instantiate and draw the chart.*/
            var chart = new google.visualization.LineChart(document.getElementById('viewChart'));
            chart.draw(data, options);
        }

        function videoCharts() {
            var data = google.visualization.arrayToDataTable([
                ["Title", "Total"],
                <?php 
                    foreach ($video_view as $row){
                        echo "['".$row->file_name."',".$row->total."],";
                    }
                    ?>
            ]);

            var options = {
                title: '',
                legend: { position: 'bottom' },
                backgroundColor: {
                    fill: 'transparent'
                },
            };
            /* Instantiate and draw the chart.*/
            var chart = new google.visualization.ColumnChart(document.getElementById('videoChart'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>