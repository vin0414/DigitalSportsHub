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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><?=$title ?></div>
                            <form method="POST" class="row g-3" enctype="multipart/form-data" id="frmPlayer">
                                <?=csrf_field()?>
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-5">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" required />
                                            <div id="last_name-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" required />
                                            <div id="first_name-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" name="mi" required />
                                            <div id="mi-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-3">
                                            <label class="form-label">Sports</label>
                                            <select class="form-select" name="sports" id="sports" required>
                                                <option value="">Choose sports</option>
                                                <?php foreach($sports as $row): ?>
                                                <option value="<?php echo $row['sportsID'] ?>">
                                                    <?php echo $row['Name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="sports-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Team</label>
                                            <select class="form-select" name="team" required>
                                                <option value="">Choose team</option>
                                                <?php foreach($team as $row): ?>
                                                <option value="<?php echo $row['team_id'] ?>">
                                                    <?php echo $row['team_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="team-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Position</label>
                                            <select class="form-select" name="position" id="position" required>
                                                <option value="">Choose position</option>
                                            </select>
                                            <div id="position-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Jersey No</label>
                                            <input type="number" class="form-control" name="jersey_number"
                                                placeholder="e.g. 23" required />
                                            <div id="jersey_number-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <label class="form-label">Gender</label>
                                            <div class="form-selectgroup">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="gender" value="male"
                                                        class="form-selectgroup-input" checked />
                                                    <span class="form-selectgroup-label">
                                                        <i class="ti ti-mars"></i>&nbsp;Male
                                                    </span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="gender" value="female"
                                                        class="form-selectgroup-input" />
                                                    <span class="form-selectgroup-label">
                                                        <i class="ti ti-gender-femme"></i>&nbsp;Female
                                                    </span>
                                                </label>
                                            </div>
                                            <div id="gender-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" required />
                                            <div id="date_of_birth-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required />
                                            <div id="email-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Height (cm)</label>
                                            <input type="text" class="form-control" name="height" required />
                                            <div id="height-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Weight (kgs)</label>
                                            <input type="text" class="form-control" name="weight" required />
                                            <div id="weight-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" style="height:150px;"
                                        required></textarea>
                                    <div id="address-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="file" accept="image/*" required />
                                    <div id="file-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy"></i>&nbsp;Save
                                    </button>
                                </div>
                            </form>
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
    $('#sports').change(function() {
        var val = $(this).val();
        $('#position').empty();
        $.ajax({
            url: "<?=site_url('get-position')?>",
            method: "GET",
            data: {
                value: val
            },
            success: function(response) {
                $('#position').append(response);
            }
        });
    });

    $('#frmPlayer').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-player')?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#frmPlayer')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully added",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.href = "<?=base_url('my-players')?>";
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