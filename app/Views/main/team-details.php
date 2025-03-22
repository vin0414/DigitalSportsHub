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
                                <a href="<?=site_url('teams')?>" class="btn btn-secondary"><i
                                        class="ti ti-arrow-left"></i> Back</a>
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
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><?=$title?></div>
                                    <?php if($team):?>
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <img src="<?=base_url('admin/images/team/')?><?php echo $team['image'] ?>"
                                                style="border-radius:25px;" />
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
                                            <textarea class="form-control" style="height:100px;"
                                                readonly><?php echo $team['school'] ?></textarea>
                                            <br />
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                                        <li class="nav-item">
                                                            <a href="#tabs-home-8" class="nav-link active"
                                                                data-bs-toggle="tab">
                                                                Players
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#tabs-profile-8" class="nav-link"
                                                                data-bs-toggle="tab">
                                                                Match History
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade active show" id="tabs-home-8">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <th>#</th>
                                                                        <th>Last Name</th>
                                                                        <th>First Name</th>
                                                                        <th>MI</th>
                                                                        <th>Position</th>
                                                                        <th>Age</th>
                                                                        <th>Height</th>
                                                                        <th>Weight</th>
                                                                    </thead>
                                                                    <tbody>
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
                                                                        </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tabs-profile-8">

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
    <!-- END DEMO SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('#frmAccount').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('update')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.href = "<?=base_url('accounts')?>";
                        }
                    });

                } else {
                    var errors = response.error;
                    // Iterate over each error and display it under the corresponding input field
                    for (var field in errors) {
                        $('#' + field + '-error').html('<p>' + errors[field] +
                            '</p>'); // Show the first error message
                        $('#' + field).addClass(
                            'text-danger'); // Highlight the input field with an error
                    }
                }
            }
        });
    });
    </script>
</body>

</html>