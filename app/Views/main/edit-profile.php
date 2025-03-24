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
                                <a href="<?=site_url('athletes/profile/')?><?=$player['player_id']?>"
                                    class="btn btn-secondary"><i class="ti ti-arrow-left"></i> Back</a>
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
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><?=$title ?></div>
                            <form method="POST" class="row g-3" enctype="multipart/form-data" id="frmPlayer">
                                <?=csrf_field()?>
                                <input type="hidden" name="player_id" value="<?=$player['player_id']?>">
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-5">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="<?=$player['last_name']?>" required />
                                            <div id="last_name-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="<?=$player['first_name']?>" required />
                                            <div id="first_name-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" name="mi" value="<?=$player['mi']?>"
                                                required />
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
                                                <option value="<?php echo $row['sportsID'] ?>" <?php echo ($player['sportsID'] == $row['sportsID']) ? 'selected' : ''; ?>>
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
                                                <option value="<?php echo $row['team_id'] ?>" <?php echo ($player['team_id'] == $row['team_id']) ? 'selected' : ''; ?>>
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
                                                placeholder="e.g. 23" value="<?=$player['jersey_num']?>" required />
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
                                                        class="form-selectgroup-input" <?php echo ($player['gender'] == "male") ? 'checked' : ''; ?>/>
                                                    <span class="form-selectgroup-label">
                                                        <i class="ti ti-mars"></i>&nbsp;Male
                                                    </span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="gender" value="female"
                                                        class="form-selectgroup-input" <?php echo ($player['gender'] == "female") ? 'checked' : ''; ?>/>
                                                    <span class="form-selectgroup-label">
                                                        <i class="ti ti-gender-femme"></i>&nbsp;Female
                                                    </span>
                                                </label>
                                            </div>
                                            <div id="gender-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth"
                                                value="<?=$player['date_of_birth']?>" required />
                                            <div id="date_of_birth-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?=$player['email']?>" required />
                                            <div id="email-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Height (cm)</label>
                                            <input type="text" class="form-control" name="height"
                                                value="<?=$player['height']?>" required />
                                            <div id="height-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Weight (kgs)</label>
                                            <input type="text" class="form-control" name="weight"
                                                value="<?=$player['weight']?>" required />
                                            <div id="weight-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" style="height:150px;"
                                        required><?=$player['address']?></textarea>
                                    <div id="address-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Image (Optional)</label>
                                    <input type="file" class="form-control" name="file" accept="image/*"/>
                                    <div id="file-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="agree" value="1" />
                                        <label class="form-check-label">
                                            Would you like to create account for this athlete?
                                        </label>
                                    </label>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
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
    $(document).ready(function(){
        loadRole();
    });
    function loadRole()
    {
        var val = $('#sports').val();
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
    }
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
            url: "<?=site_url('edit-player')?>",
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
                        text: "Successfully applied changes",
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        // Action based on user's choice
                        if (result.isConfirmed) {
                            // Perform some action when "Yes" is clicked
                            location.href = "<?=base_url('athletes')?>";
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