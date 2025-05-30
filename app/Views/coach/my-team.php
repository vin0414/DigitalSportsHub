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
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Create/Update Team</div>
                                    <form method="POST" class="row g-3" id="frmTeam">
                                        <?=csrf_field()?>
                                        <div class="col-lg-12">
                                            <label>Name of Sports</label>
                                            <select class="form-select" name="sports_name" required>
                                                <option value="">Choose</option>
                                                <?php foreach($sports as $row): ?>
                                                <option value="<?= $row['sportsID'] ?>" <?= (isset($team['sportsID']) && $row['sportsID'] == $team['sportsID']) ? 'selected' : '' ?>>
                                                    <?= $row['Name'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="sports_name-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Name of the Team</label>
                                            <input type="text" class="form-control" name="team" value="<?= !empty($team['team_name']) ? $team['team_name'] : '' ?>" required />
                                            <div id="team-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Name of School</label>
                                            <textarea name="school" class="form-control" style="height:200px;" required><?= !empty($team['school']) ? $team['school'] : '' ?></textarea>
                                            <div id="school-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Team Logo</label>
                                            <input type="file" class="form-control" name="file" accept="image/*"
                                                required />
                                            <div id="file-error" class="error-message text-danger text-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-2">
                                                    <path d="M12 5l0 14" />
                                                    <path d="M5 12l14 0" />
                                                </svg>
                                                Add Team
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Incoming Events</div>
                                </div>
                                <div class="position-relative">
                                    <div class="card-table table-responsive">
                                        <table class="table table-vcenter">
                                            <thead>
                                                <th>Event Name</th>
                                                <th>Date</th>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($event)){ ?>
                                                <tr>
                                                    <td colspan="2">
                                                        <center><span>No Event(s) found</span></center>
                                                    </td>
                                                </tr>
                                                <?php }else { ?>
                                                <?php foreach($event as $row): ?>
                                                <tr>
                                                    <td>
                                                        <a target="_blank" href="<?=site_url('latest-events/details/')?><?=$row['event_title']?>"><?php echo $row['event_title'] ?></a><br />
                                                        <small><?php echo substr($row['event_description'],0,30) ?>...</small>
                                                    </td>
                                                    <td>
                                                        <?php echo date('Y-M-d',strtotime($row['start_date'])) ?>
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
    <!-- END DEMO SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('#frmTeam').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('save-team')?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#frmTeam')[0].reset();
                    Swal.fire({
                        title: 'Great!',
                        text: "Successfully saved",
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