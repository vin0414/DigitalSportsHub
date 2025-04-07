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
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="<?=site_url('events')?>" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i>&nbsp;Back
                                </a>
                                <a href="<?=site_url('new-event')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg>
                                    New Event
                                </a>
                                <a href="<?=site_url('new-event')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
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
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                <?php if(session()->get('role')=="Super-admin"||session()->get('role')=="Organizer"): ?>
                                <li class="nav-item">
                                    <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-calendar-stats"></i>&nbsp;Incoming Event
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-calendar-week"></i>&nbsp;My Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-register-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-calendar-week"></i>&nbsp;Registration
                                    </a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a href="#tabs-profile-8" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-calendar-week"></i>&nbsp;My Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-register-8" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-calendar-week"></i>&nbsp;Registration
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <?php if(session()->get('role')=="Super-admin"||session()->get('role')=="Organizer"): ?>
                                <div class="tab-pane fade active show" id="tabs-home-8">
                                    <div class="table-responsive">
                                        <table class="table table-selectable card-table table-vcenter datatable"
                                            id="tblincoming">
                                            <thead>
                                                <th>Event and Description</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-profile-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="tblrequest">
                                            <thead>
                                                <th>Event</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($event as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['event_title'] ?></td>
                                                    <td><small><?php echo $row['event_description'] ?></small></td>
                                                    <td><?php echo $row['event_location'] ?></td>
                                                    <td><?php echo date('Y-M-d',strtotime($row['start_date'])) ?></td>
                                                    <td><?php echo date('Y-M-d',strtotime($row['end_date']))  ?></td>
                                                    <td>
                                                        <?php if($row['status']==0):?>
                                                        <span class="badge bg-warning text-white">Pending</span>
                                                        <?php elseif($row['status']==1): ?>
                                                        <span class="badge bg-success text-white">Approved</span>
                                                        <?php else : ?>
                                                        <span class="badge bg-danger text-white">Cancelled</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['status']==0): ?>
                                                        <button type="button" class="btn btn-danger cancel"
                                                            value="<?php echo $row['event_id'] ?>">
                                                            <i class="ti ti-cancel"></i>&nbsp;Cancel
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-register-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="tblregistration">
                                            <thead>
                                                <th>Event</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($members as $row): ?>
                                                <?php
                                            $dob = $row->birth_date;
                                            $dob = new DateTime($dob);
                                            $now = new DateTime();
                                            $age = $now->diff($dob);
                                            ?>
                                                <tr>
                                                    <td><?=$row->event_title ?></td>
                                                    <td><?=$row->start_date ?></td>
                                                    <td><?=$row->end_date ?></td>
                                                    <td><?=$row->fullname ?></td>
                                                    <td><?=$row->email ?></td>
                                                    <td><?=$age->y ?></td>
                                                    <td><?=$row->address ?></td>
                                                    <td><?=$row->remarks?></td>
                                                    <td>
                                                        <?php if($row->status==0): ?>
                                                        <button type="button" class="btn btn-primary evaluate"
                                                            value="<?=$row->register_id?>">
                                                            <i class="ti ti-settings"></i>&nbsp;Evaluate
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="tab-pane fade active show" id="tabs-profile-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="tblrequest">
                                            <thead>
                                                <th>#</th>
                                                <th>Event</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($event as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['event_id'] ?></td>
                                                    <td><?php echo $row['event_title'] ?></td>
                                                    <td><small><?php echo $row['event_description'] ?></small></td>
                                                    <td><?php echo $row['event_location'] ?></td>
                                                    <td><?php echo date('Y-M-d',strtotime($row['start_date'])) ?></td>
                                                    <td><?php echo date('Y-M-d',strtotime($row['end_date']))  ?></td>
                                                    <td>
                                                        <?php if($row['status']==0):?>
                                                        <span class="badge bg-warning text-white">Pending</span>
                                                        <?php elseif($row['status']==1): ?>
                                                        <span class="badge bg-success text-white">Approved</span>
                                                        <?php else : ?>
                                                        <span class="badge bg-danger text-white">Cancelled</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['status']==0): ?>
                                                        <button type="button" class="btn btn-danger cancel"
                                                            value="<?php echo $row['event_id'] ?>">
                                                            <i class="ti ti-cancel"></i>&nbsp;Cancel
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-register-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="tblregistration">
                                            <thead>
                                                <th>Event</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($members as $row): ?>
                                                <?php
                                            $dob = $row->birth_date;
                                            $dob = new DateTime($dob);
                                            $now = new DateTime();
                                            $age = $now->diff($dob);
                                            ?>
                                                <tr>
                                                    <td><?=$row->event_title ?></td>
                                                    <td><?=$row->start_date ?></td>
                                                    <td><?=$row->end_date ?></td>
                                                    <td><?=$row->fullname ?></td>
                                                    <td><?=$row->email ?></td>
                                                    <td><?=$age->y ?></td>
                                                    <td><?=$row->address ?></td>
                                                    <td><?=$row->remarks?></td>
                                                    <td>
                                                        <?php if($row->status==0): ?>
                                                        <button type="button" class="btn btn-primary evaluate"
                                                            value="<?=$row->register_id?>">
                                                            <i class="ti ti-settings"></i>&nbsp;Evaluate
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php endif; ?>
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

    <div class="modal modal-blur fade" id="evaluateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evaluation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmUpdate">
                        <?=csrf_field()?>
                        <input type="hidden" name="id" id="id" />
                        <div class="col-lg-12">
                            <label class="form-label">Remarks</label>
                            <select class="form-select" name="status" required>
                                <option value="">Choose</option>
                                <option>Passed</option>
                                <option>Failed</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Team</label>
                            <select class="form-select" name="team" required>
                                <option value="">Choose</option>
                                <?php foreach($team as $row): ?>
                                <option value="<?=$row['team_id']?>"><?=$row['team_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary form-control">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
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
    $(document).on('click', '.evaluate', function() {
        $('#evaluateModal').modal('show');
        $('#id').attr("value", $(this).val());
    });

    $('#frmUpdate').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('add-remarks')?>",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'warning',
                    });
                }
            }
        });
    });

    $('#tblregistration').DataTable();
    var table = $('#tblincoming').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?=site_url('fetch-event')?>",
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
                "data": "event"
            },
            {
                "data": "type"
            },
            {
                "data": "date"
            },
            {
                "data": "action"
            }
        ]
    });

    $(document).on('click', '.accept', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to accept this event?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, accept it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?=site_url('accept-event')?>",
                    method: "POST",
                    data: {
                        value: $(this).val()
                    },
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire({
                                title: "Great!",
                                text: "The event has been accepted",
                                icon: "success"
                            });
                            table.ajax.reload();
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response,
                                icon: "warning"
                            });
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.reject', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to reject this event?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, reject it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?=site_url('reject-event')?>",
                    method: "POST",
                    data: {
                        value: $(this).val()
                    },
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire({
                                title: "Great!",
                                text: "The event has been rejected",
                                icon: "success"
                            });
                            table.ajax.reload();
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response,
                                icon: "warning"
                            });
                        }
                    }
                });
            }
        });
    });

    $('#tblrequest').DataTable();
    $(document).on('click', '.cancel', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to cancel this event?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, cancel it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?=site_url('cancel-event')?>",
                    method: "POST",
                    data: {
                        value: $(this).val()
                    },
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire({
                                title: "Cancelled!",
                                text: "The event has been cancelled",
                                icon: "success"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response,
                                icon: "warning"
                            });
                        }
                    }
                });
            }
        });
    });
    </script>
</body>

</html>