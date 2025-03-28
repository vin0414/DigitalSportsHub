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
        border:1px solid #000;
        border-radius: 10px;
    }
    #thumbnail {
        margin-top: 20px;
        max-width: 100px;
        max-height: 100px;
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
                                    <form method="POST" class="row g-3" enctype="multipart/form-data" id="frmUpload">
                                        <?=csrf_field()?>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-8">
                                                    <div class="row g-2">
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" class="form-control" name="title" required/>
                                                            <div id="title-error" class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row g-3">
                                                                <div class="col-lg-6">
                                                                    <label class="form-label">Category</label>
                                                                    <select name="category" class="form-select">
                                                                        <option value="">Choose</option>
                                                                        <?php foreach($sports as $row): ?>
                                                                            <option><?=$row['Name'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div id="category-error" class="error-message text-danger text-sm"></div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="form-label">Date</label>
                                                                    <input type="date" class="form-control" name="date" required/>
                                                                    <div id="date-error" class="error-message text-danger text-sm"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Details</label>
                                                            <textarea name="details" class="form-control" style="height:150px;" required></textarea>
                                                            <div id="details-error" class="error-message text-danger text-sm"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Attach</label>
                                                            <input type="file" id="video-upload" name="file" class="form-control" accept="video/*" required/>
                                                            <div id="file-error" class="error-message text-danger text-sm"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Video Preview</label>
                                                            <video id="video-preview" width="100%" controls>
                                                                <source id="video-source" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Filename</label>
                                                            <input type="text" class="form-control" name="filename" id="filename" readonly/>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="form-label">File Extension</label>
                                                            <input type="text" class="form-control" name="extension" id="extension" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary" id="btnSubmit"><i class="ti ti-device-floppy"></i>&nbsp;Save Video</button>
                                        <button type="button" class="btn btn-primary" id="loading" style="display:none;">Loading....</button>
                                        </div>
                                    </form>
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
            } else {
                alert('Please upload a valid video file.');
            }
        });

        $('#frmUpload').on('submit', function(e) {
            e.preventDefault();
            $('.error-message').html('');
            var formData = new FormData(this);
            $.ajax({
                url: "<?=site_url('save-video')?>",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#loading').show();
                    $('#btnSubmit').hide();
                },
                success: function(response) {
                    $('#loading').hide();
                    $('#btnSubmit').show();
                    if (response.success) {
                        $('#frmUpload')[0].reset();
                        Swal.fire({
                            title: 'Great!',
                            text: "Successfully uploaded",
                            icon: 'success',
                            confirmButtonText: 'Continue'
                        }).then((result) => {
                            // Action based on user's choice
                            if (result.isConfirmed) {
                                // Perform some action when "Yes" is clicked
                                location.href = "<?=base_url('videos')?>";
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