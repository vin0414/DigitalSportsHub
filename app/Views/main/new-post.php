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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><?=$title?></div>
                                    <form method="POST" class="row g-3" id="frmArticle">
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
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" name="agree" value="1" />
                                                <label class="form-check-label">
                                                    Would you like to add as headline?
                                                </label>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy"></i>&nbsp;Save and Publish
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="ti ti-calendar-week"></i>&nbsp;Recent News
                                    </div>
                                </div>
                                <div class="position-relative">
                                <?php foreach($recent as $row): ?>
                                    <div class="card">
                                        <div class="row row-0">
                                            <div class="col-3">
                                            <img
                                                src="<?=base_url('admin/images/news/')?><?=$row['image']?>"
                                                class="w-100 h-100 object-cover card-img-start"
                                                alt="<?=$row['topic'] ?>"
                                            />
                                            </div>
                                            <div class="col">
                                            <div class="card-body">
                                                <a href="<?=site_url('news/topic/')?><?=$row['topic']?>"><b><?=$row['topic'] ?></b></a><br/>
                                                <small><?=$row['news_type']?></small>
                                                <p class="text-secondary">
                                                <?=substr($row['details'],0,100) ?>...
                                                </p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
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
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });
        </script>
</body>

</html>