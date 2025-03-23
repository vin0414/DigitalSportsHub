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
                                <a href="<?=site_url('new-team')?>" class="btn btn-secondary">
                                    <i class="ti ti-plus"></i>&nbsp;New Team
                                </a>
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
                    <form method="GET" class="row g-3" id="frmSearch">
                        <div class="col-lg-2">
                            <select name="category" class="form-select">
                                <option value="">All Sports</option>
                                <?php foreach($sports as $row): ?>
                                <option value="<?php echo $row['sportsID'] ?>"><?php echo $row['Name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="search" class="form-control" placeholder="Type here..." name="search" />
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="ti ti-search"></i>&nbsp;Search</button>
                        </div>
                    </form>
                    <br />
                    <div class="row row-cards" id="results">
                        <?php if(empty($team)){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">No Team Has Been Added Yet</div>
                        </div>
                        <?php }else{ ?>
                        <?php foreach($team as $row): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <span class="avatar avatar-xl mb-3 rounded"
                                        style="background-image: url(<?=base_url('admin/images/team')?>/<?php echo $row->image ?>)"></span>
                                    <h3 class="m-0 mb-1"><a
                                            href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>"><?php echo $row->team_name ?></a>
                                    </h3>
                                    <div class="text-secondary">COACH : <?php echo $row->coach_name ?></div>
                                    <div class="mt-3">
                                        <span class="badge bg-success-lt"><?php echo $row->Name ?></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="<?=site_url('teams/score')?>/<?php echo $row->team_id ?>" class="card-btn">
                                        <i class="ti ti-scoreboard"></i>&nbsp;Scoreboard
                                    </a>
                                    <a href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>"
                                        class="card-btn">
                                        <i class="ti ti-address-book"></i>&nbsp;Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php } ?>
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
    $('#frmSearch').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('filter-team')?>",
            method: "GET",
            data: data,
            success: function(response) {
                if (response === "") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: "No Record(s) found. Please try again",
                        icon: 'warning',
                    });
                } else {
                    $('#results').html(response);
                }
            }
        });
    });
    </script>
</body>

</html>