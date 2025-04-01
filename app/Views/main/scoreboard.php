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
                                <a href="<?=site_url('matches')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <i class="ti ti-arrow-left"></i> Back
                                </a>
                                <a href="<?=site_url('matches')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><i class="ti ti-soccer-field"></i>&nbsp;<?=$title?></div>
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <?php
                                            $teamModel = new \App\Models\teamModel();
                                            $team1 = $teamModel->WHERE('team_id',$match['team1_id'])->first();
                                            ?>
                                            <h1 class="text-center"><?php echo $team1['team_name'] ?></h1>
                                            <small>
                                                <center><?php echo $team1['school'] ?></center>
                                            </small>
                                            <br />
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <th>Players</th>
                                                        <th>#</th>
                                                        <th>Position</th>
                                                        <th>Stats</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $db = db_connect();
                                                        $builder = $db->table('players a');
                                                        $builder->select('a.player_id,a.last_name,a.first_name,a.mi,a.jersey_num,b.roleName');
                                                        $builder->join('player_role b','b.roleID=a.roleID','LEFT');
                                                        $builder->WHERE('a.team_id',$team1['team_id']);
                                                        $list = $builder->get()->getResult();
                                                        foreach($list as $row):
                                                         ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row->last_name ?>,&nbsp;<?php echo $row->first_name ?>&nbsp;<?php echo $row->mi ?>
                                                            </td>
                                                            <td><?php echo $row->jersey_num ?></td>
                                                            <td><?php echo $row->roleName ?></td>
                                                            <td>
                                                                <?php
                                                                $builder = $db->table('player_performance');
                                                                $builder->select('stat_type,stat_value');
                                                                $builder->WHERE('player_id',$row->player_id)
                                                                        ->WHERE('match_id',$match['match_id']);
                                                                $stats = $builder->get()->getResult();
                                                                foreach($stats as $s) 
                                                                {
                                                                    ?>
                                                                <small><?php echo $s->stat_type ?></small> :
                                                                <small><?php echo $s->stat_value ?></small><br />
                                                                <?php
                                                                } 
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary add"
                                                                    value="<?php echo $row->player_id ?>"><i
                                                                        class="ti ti-circle-dashed-plus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php
                                            $teamModel = new \App\Models\teamModel();
                                            $team2 = $teamModel->WHERE('team_id',$match['team2_id'])->first();
                                            ?>
                                            <h1 class="text-center"><?php echo $team2['team_name'] ?></h1>
                                            <small>
                                                <center><?php echo $team2['school'] ?></center>
                                            </small>
                                            <br />
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <th>Players</th>
                                                        <th>#</th>
                                                        <th>Position</th>
                                                        <th>Stats</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $db = db_connect();
                                                        $builder = $db->table('players a');
                                                        $builder->select('a.player_id,a.last_name,a.first_name,a.mi,a.jersey_num,b.roleName');
                                                        $builder->join('player_role b','b.roleID=a.roleID','LEFT');
                                                        $builder->WHERE('a.team_id',$team2['team_id']);
                                                        $list = $builder->get()->getResult();
                                                        foreach($list as $row):
                                                         ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row->last_name ?>,&nbsp;<?php echo $row->first_name ?>&nbsp;<?php echo $row->mi ?>
                                                            </td>
                                                            <td><?php echo $row->jersey_num ?></td>
                                                            <td><?php echo $row->roleName ?></td>
                                                            <td>
                                                                <?php
                                                                $builder = $db->table('player_performance');
                                                                $builder->select('stat_type,stat_value');
                                                                $builder->WHERE('player_id',$row->player_id)
                                                                        ->WHERE('match_id',$match['match_id']);
                                                                $stats = $builder->get()->getResult();
                                                                foreach($stats as $s) 
                                                                {
                                                                    ?>
                                                                <small><?php echo $s->stat_type ?></small> :
                                                                <small><?php echo $s->stat_value ?></small><br />
                                                                <?php
                                                                } 
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary add2"
                                                                    value="<?php echo $row->player_id ?>"><i
                                                                        class="ti ti-circle-dashed-plus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="modal modal-blur fade" id="stats1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Player Stats</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmStat1">
                        <?=csrf_field()?>
                        <input type="hidden" name="player" id="player_1" />
                        <input type="hidden" name="match_id" value="<?=$match['match_id']?>" />
                        <div class="col-lg-12">
                            <label>Match ID : <?=$match['match_id']?></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Stats</label>
                                    <select name="stat_type" class="form-select" required>
                                        <option value="">Choose</option>
                                        <option value="PTS">Points</option>
                                        <option value="BLK">Blocks</option>
                                        <option value="REB">Rebounds</option>
                                        <option value="AST">Assists</option>
                                        <option value="STL">Steals</option>
                                        <option value="TO">Turnovers</option>
                                        <option value="K">Kills</option>
                                        <option value="DIG">Digs</option>
                                        <option value="SA">Service Aces</option>
                                        <option value="G">Goals</option>
                                        <option value="T">Tackles</option>
                                        <option value="SOG">Shots On Goal</option>
                                        <option value="S">Smaches</option>
                                        <option value="DS">Drop Shots</option>
                                        <option value="A">Aces</option>
                                        <option value="SE">Service Errors</option>
                                    </select>
                                    <div id="stat_type-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Value</label>
                                    <input type="number" class="form-control" name="value" min="0" required />
                                    <div id="value-error" class="error-message text-danger text-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary form-control">
                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="stats2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Player Stats</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row g-3" id="frmStat2">
                        <?=csrf_field()?>
                        <input type="hidden" name="player" id="player_2" />
                        <input type="hidden" name="match_id" value="<?=$match['match_id']?>" />
                        <div class="col-lg-12">
                            <label>Match ID : <?=$match['match_id']?></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Stats</label>
                                    <select name="stat_type" class="form-select" required>
                                        <option value="">Choose</option>
                                        <option value="PTS">Points</option>
                                        <option value="BLK">Blocks</option>
                                        <option value="REB">Rebounds</option>
                                        <option value="AST">Assists</option>
                                        <option value="STL">Steals</option>
                                        <option value="TO">Turnovers</option>
                                        <option value="K">Kills</option>
                                        <option value="DIG">Digs</option>
                                        <option value="SA">Service Aces</option>
                                        <option value="G">Goals</option>
                                        <option value="T">Tackles</option>
                                        <option value="SOG">Shots On Goal</option>
                                        <option value="S">Smaches</option>
                                        <option value="DS">Drop Shots</option>
                                        <option value="A">Aces</option>
                                        <option value="SE">Service Errors</option>
                                    </select>
                                    <div id="stat_type-error" class="error-message text-danger text-sm"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Value</label>
                                    <input type="number" class="form-control" name="value" min="0" required />
                                    <div id="value-error" class="error-message text-danger text-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary form-control">
                                <i class="ti ti-device-floppy"></i>&nbsp;Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).on('click', '.add', function() {
        $('#player_1').attr("value", $(this).val());
        $('#stats1').modal('show');
    });

    $(document).on('click', '.add2', function() {
        $('#player_2').attr("value", $(this).val());
        $('#stats2').modal('show');
    });

    $('#frmStat1').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('stats')?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#frmStat1')[0].reset();
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

    $('#frmStat2').on('submit', function(e) {
        e.preventDefault();
        $('.error-message').html('');
        let data = $(this).serialize();
        $.ajax({
            url: "<?=site_url('stats')?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#frmStat2')[0].reset();
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