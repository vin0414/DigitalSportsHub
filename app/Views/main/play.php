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
                                <a href="<?=site_url('videos')?>" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Back</a>
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
                        <div class="col-lg-8">
                            <div class="row g-2">
                                <div class="col-lg-12">
                                    <video id="video-preview" width="100%" controls>
                                        <source src="<?=base_url('admin/videos/')?><?=$video['file']?>"
                                            type="video/mp4">
                                        <source src="<?=base_url('admin/videos/')?><?=$video['file']?>"
                                            type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row g-2">
                                        <div class="col-lg-9">
                                            <label class="form-label" style="font-size: 1.5rem;">
                                                <?=$video['file_name']?>
                                            </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="<?=site_url('videos/edit/')?><?=$video['Token']?>"
                                                class="btn btn-secondary" style="float:right;">
                                                <i class="ti ti-edit"></i>&nbsp;Edit Video
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row g-3">
                                        <div class="col-lg-9">
                                            <div class="badge bg-default">
                                                <label><b>Posted Date :</b> </label>
                                                <?=date('Y-M-d',strtotime($video['date']))?>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="badge bg-default" style="float:right;">
                                                <label><b>Category :</b> </label> <?=$video['sportName']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card card-body">
                                        <label class="form-label"><b>Description</b></label>
                                        <?=$video['description']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="ti ti-calendar-week"></i>&nbsp;Recent Videos
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <?php if(empty($recent)): ?>
                                    <div style="padding:5px;margin:5px;">No video(s) Has Been Added Yet</div>
                                    <?php else : ?>
                                    <?php foreach($recent as $row): ?>
                                    <div class="row row-0">
                                        <div class="col-5">
                                            <video src="<?=base_url('admin/videos/')?><?=$row['file']?>"
                                                class="w-100 h-100 object-cover card-img-start"
                                                alt="<?=$row['file_name'] ?>"></video>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <a href="<?=site_url('videos/play/')?><?=$row['Token']?>">
                                                    <b><?=substr($row['file_name'],0,25) ?></b>...
                                                </a><br />
                                                <small><?=$row['sportName']?></small>
                                                <p class="text-secondary">
                                                    <?=substr($row['description'],0,50) ?>...
                                                </p>
                                            </div>
                                        </div>
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
    document.getElementById('video-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('video')) {
            const videoPreview = document.getElementById('video-preview');
            const videoSource = document.getElementById('video-source');

            const videoUrl = URL.createObjectURL(file);
            videoSource.src = videoUrl;

            // Show the video preview
            videoPreview.style.display = 'block';

            // Load and play the video
            videoPreview.load();
            videoPreview.pause();
            $('#size').attr("value", (file.size / (1024 * 1024)).toFixed(2) + "MB");
            $('#file_type').attr("value", file.type);
        } else {
            alert('Please upload a valid video file.');
        }
    });
    </script>
</body>

</html>