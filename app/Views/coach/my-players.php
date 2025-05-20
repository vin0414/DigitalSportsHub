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
                    <form method="GET" class="row g-3" id="frmSearch">
                        <div class="col-lg-5">
                            <input type="search" class="form-control" placeholder="Type here..." name="search" />
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-search"></i>&nbsp;Search
                            </button>
                            <a href="<?=site_url('new-player')?>" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-play-basketball">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 4a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                <path d="M5 21l3 -3l.75 -1.5" />
                                <path d="M14 21v-4l-4 -3l.5 -6" />
                                <path d="M5 12l1 -3l4.5 -1l3.5 3l4 1" />
                                <path d="M18.5 16a.5 .5 0 1 0 0 -1a.5 .5 0 0 0 0 1z" fill="currentColor" />
                            </svg>
                                New Player
                            </a>
                        </div>
                    </form>
                    <br />
                    <div class="row row-cards" id="results">
                        <?php if(empty($players)){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">No Player(s) Has Been Added Yet</div>
                        </div>
                        <?php }else{ ?>
                        <?php foreach($players as $row): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <span class="avatar avatar-xl mb-3 rounded"
                                        style="background-image: url(<?=base_url('admin/images/profile')?>/<?php echo $row->image ?>);width:100%;height:10rem;"></span>
                                    <h3 class="m-0 mb-1">
                                        <a href="<?=site_url('view')?>/<?php echo $row->player_id ?>">
                                            <?php echo $row->last_name ?>, <?php echo $row->first_name ?>
                                            <?php echo $row->mi ?>
                                        </a>
                                    </h3>
                                    <div class="text-secondary"><?php echo $row->roleName ?></div>
                                    <div class="mt-3">
                                        <span class="badge bg-success-lt"><?php echo $row->team_name ?></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="mailto:<?php echo $row->email ?>" class="card-btn">
                                        <i class="ti ti-mail"></i>&nbsp;Message
                                        <?php 
                                            if (isset($row->gender) && $row->gender == 'male') {
                                                echo 'Him';
                                            } else {
                                                echo 'Her';
                                            }
                                        ?>
                                    </a>
                                    <a href="<?=site_url('view')?>/<?php echo $row->player_id ?>"
                                        class="card-btn">
                                        <i class="ti ti-address-book"></i>&nbsp;Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
            url: "<?=site_url('search-players')?>",
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