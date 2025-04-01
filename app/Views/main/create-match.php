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

    #video-upload {
        padding: 10px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    #video-preview {
        border: 1px solid #000;
        border-radius: 10px;
    }
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
                                <a href="<?=site_url('dashboard')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <i class="ti ti-arrow-left"></i> Back
                                </a>
                                <a href="<?=site_url('dashboard')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <i class="ti ti-arrow-left"></i>
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><?=$title?></div>
                                    <form method="POST" class="row g-3" id="frmMatch">
                                        <?=csrf_field()?>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" name="date" required />
                                                    <div id="date-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Time</label>
                                                    <input type="time" class="form-control" name="time" required />
                                                    <div id="time-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Team 1</label>
                                                    <select class="form-select" name="team1" required>
                                                        <option value="">Choose Team</option>
                                                        <?php foreach($team as $row): ?>
                                                        <option value="<?php echo $row['team_id'] ?>">
                                                            <?php echo $row['team_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div id="team1-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Team 2</label>
                                                    <select class="form-select" name="team2" required>
                                                        <option value="">Choose Team</option>
                                                        <?php foreach($team as $row): ?>
                                                        <option value="<?php echo $row['team_id'] ?>">
                                                            <?php echo $row['team_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div id="team2-error" class="error-message text-danger text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Location</label>
                                            <textarea name="location" class="form-control" style="height:150px;"
                                                required></textarea>
                                            <div id="location-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy"></i>&nbsp;Save Entry
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Incoming Matches</div>
                                </div>
                                <div class="position-relative">
                                    <?php if(empty($matches)): ?>
                                    <div style="padding:5px;margin:5px;">No Incoming Matche(s) Yet</div>
                                    <?php else : ?>
                                    <?php foreach($matches as $row): ?>
                                    <?php 
                                    $date = DateTime::createFromFormat('H:i', $row->time); 
                                    $formattedTime = $date->format('h:i A');
                                    ?>
                                    <div style="padding:10px;margin:10px;border-radius:10px;">
                                        <label style="font-size:1rem;font-weight:bold;">
                                            <?php echo $row->team1 ?> vs <?php echo $row->team2 ?>
                                        </label><br />
                                        <small><?php echo $row->location ?> | <?php echo $row->date ?> |
                                            <?php echo $formattedTime ?></small>
                                    </div>
                                    <?php endforeach; ?>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('#frmMatch').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-match')?>",
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
                            $('#frmMatch')[0].reset();
                            // Perform some action when "Yes" is clicked
                            location.href = "<?=base_url('new-match')?>";
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