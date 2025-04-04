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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
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
                                <a href="<?=site_url('news')?>" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Back
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
                    <div class="row row-cards">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><?=$title?></div>
                                    <form method="POST" class="row g-3" enctype="multipart/form-data" id="frmArticle">
                                        <?=csrf_field()?>
                                        <div class="col-lg-12">
                                            <label class="form-label">Title of the Article</label>
                                            <input type="text" class="form-control" name="article" required/>
                                            <div id="article-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" name="date" required/>
                                                    <div id="date-error" class="error-message text-danger text-sm"></div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Author</label>
                                                    <input type="text" class="form-control" name="author" required/>
                                                    <div id="author-error" class="error-message text-danger text-sm"></div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Sports Category</label>
                                                    <select class="form-select" name="category" required>
                                                        <option value="">Choose sports</option>
                                                        <?php foreach($sports as $row): ?>
                                                        <option value="<?php echo $row['Name'] ?>">
                                                            <?php echo $row['Name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div id="category-error" class="error-message text-danger text-sm"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Details</label>
                                            <div id="editor" class="form-control" style="height:200px;"></div>
                                            <div id="details-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Attachment</label>
                                            <input type="file" class="form-control" name="file" required/>
                                            <div id="file-error" class="error-message text-danger text-sm"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" name="agree" value="1" />
                                                <label class="form-check-label">
                                                    Would you like to tag as headline?
                                                </label>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy"></i>&nbsp;Save and Publish
                                            </button>
                                            <button type="button" class="btn btn-secondary draft">
                                                <i class="ti ti-device-floppy"></i>&nbsp;Save as Draft
                                            </button>
                                        </div>
                                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });
            $('#frmArticle').on('submit', function(e) {
                e.preventDefault();
                $('.error-message').html('');
                var details = document.querySelector('.ql-editor').innerHTML;
                $('#frmArticle').append("<textarea name='details' style='display:none;'>"+details+"</textarea>");
                let data = $(this).serialize();
                $.ajax({
                    url: "<?=site_url('save-post')?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#frmArticle')[0].reset();
                            Swal.fire({
                                title: 'Great!',
                                text: "Successfully saved and published",
                                icon: 'success',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                // Action based on user's choice
                                if (result.isConfirmed) {
                                    // Perform some action when "Yes" is clicked
                                    location.href = "<?=base_url('news')?>";
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

            $(document).on('click','.draft', function(e) {
                e.preventDefault();
                $('.error-message').html('');
                var details = document.querySelector('.ql-editor').innerHTML;
                $('#frmArticle').append("<textarea name='details' style='display:none;'>"+details+"</textarea>");
                var formData = new FormData($('#frmArticle')[0]);
                $.ajax({
                    url: "<?=site_url('save-as-draft')?>",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#frmArticle')[0].reset();
                            Swal.fire({
                                title: 'Great!',
                                text: "Successfully saved and published",
                                icon: 'success',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                // Action based on user's choice
                                if (result.isConfirmed) {
                                    // Perform some action when "Yes" is clicked
                                    location.href = "<?=base_url('news')?>";
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