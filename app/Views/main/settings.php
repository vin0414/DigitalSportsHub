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
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-olympics"></i>&nbsp;Sports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-user-pin"></i>&nbsp;Player's Role
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-achievement-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-target-arrow"></i>&nbsp;Achievements
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-clipboard-data"></i>&nbsp;System Logs
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tabs-home-8">
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="POST" class="row g-3" id="frmSports">
                                                        <?=csrf_field()?>
                                                        <div class="col-lg-12">
                                                            <label>Name of Sports</label>
                                                            <input type="text" class="form-control" name="sports"
                                                                required />
                                                            <div id="sports-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit" class="form-control btn btn-primary">
                                                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-vcenter" id="tblsports">
                                                            <thead>
                                                                <th>#</th>
                                                                <th>Name of Sports</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-profile-8">
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="POST" class="row g-3" id="frmRole">
                                                        <?=csrf_field()?>
                                                        <div class="col-lg-12">
                                                            <label>Name of Sports</label>
                                                            <select class="form-control" name="sports_name" required>
                                                                <option value="">Choose</option>
                                                                <?php foreach($sports as $row): ?>
                                                                <option value="<?php echo $row['Name'] ?>">
                                                                    <?php echo $row['Name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div id="sports_name-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Player's Role</label>
                                                            <input type="text" class="form-control" name="role"
                                                                required />
                                                            <div id="role-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit" class="form-control btn btn-primary">
                                                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-vcenter" id="tblrole">
                                                            <thead>
                                                                <th>#</th>
                                                                <th>Player's Role</th>
                                                                <th>Name of Sports</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-achievement-8">
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="POST" class="row g-3" id="frmAchievement">
                                                        <?=csrf_field() ?>
                                                        <div class="col-lg-12">
                                                            <label>Title of Achievement</label>
                                                            <input type="text" class="form-control" name="title"
                                                                required />
                                                            <div id="title-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Type of Achievement</label>
                                                            <select name="type" class="form-select" required>
                                                                <option value="">Choose</option>
                                                                <option>Team</option>
                                                                <option>Player</option>
                                                            </select>
                                                            <div id="type-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Description</label>
                                                            <textarea name="description" class="form-control"
                                                                required></textarea>
                                                            <div id="description-error"
                                                                class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Criteria (Optional)</label>
                                                            <textarea name="criteria" class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit" class="form-control btn btn-primary">
                                                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered"
                                                            id="tblachievement">
                                                            <thead>
                                                                <th>Title</th>
                                                                <th>Type</th>
                                                                <th>Description</th>
                                                                <th>Criteria</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-activity-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="tbl_logs">
                                            <thead>
                                                <th>Date</th>
                                                <th>Account Information</th>
                                                <th>Activities</th>
                                                <th>Pages</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($logs as $row): ?>
                                                <tr>
                                                    <td><?php echo $row->date ?></t>
                                                    <td><?php echo $row->Fullname ?></td>
                                                    <td><?php echo $row->activities ?></td>
                                                    <td><?php echo $row->page ?></td>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('#tbl_logs').DataTable();
    var table = $('#tblachievement').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?=site_url('fetch-achievement')?>",
            "type": "GET",
            "dataSrc": function(json) {
                // Handle the data if needed
                return json.data;
            },
            "error": function(xhr, error, code) {
                console.error("AJAX Error: " + error);
                alert("Error occurred while loading data.");
            }
        },
        "searching": true,
        "columns": [{
                "data": "title"
            },
            {
                "data": "type"
            },
            {
                "data": "description"
            },
            {
                "data": "criteria"
            },
            {
                "data": "action"
            }
        ]
    });
    var role = $('#tblrole').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?=site_url('fetch-role')?>",
            "type": "GET",
            "dataSrc": function(json) {
                // Handle the data if needed
                return json.data;
            },
            "error": function(xhr, error, code) {
                console.error("AJAX Error: " + error);
                alert("Error occurred while loading data.");
            }
        },
        "searching": true,
        "columns": [{
                "data": "id"
            },
            {
                "data": "role"
            },
            {
                "data": "sports"
            },
            {
                "data": "date"
            },
            {
                "data": "action"
            }
        ]
    });
    var sports = $('#tblsports').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?=site_url('fetch-sports')?>",
            "type": "GET",
            "dataSrc": function(json) {
                // Handle the data if needed
                return json.data;
            },
            "error": function(xhr, error, code) {
                console.error("AJAX Error: " + error);
                alert("Error occurred while loading data.");
            }
        },
        "searching": true,
        "columns": [{
                "data": "id"
            },
            {
                "data": "name"
            },
            {
                "data": "date"
            },
            {
                "data": "action"
            }
        ]
    });

    $('#frmSports').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-sports')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#frmSports')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            sports.ajax.reload();
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

    $('#frmRole').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-role')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#frmRole')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            role.ajax.reload();
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

    $('#frmAchievement').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-achievement')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#frmAchievement')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            table.ajax.reload();
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