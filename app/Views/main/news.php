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
                                <a href="<?=site_url('new-article')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                    </svg>
                                    New Article
                                </a>
                                <a href="<?=site_url('new-article')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
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
                    <div class="row row-cards">
                        <div class="col-lg-12">
                            <form method="GET" class="row g-3" id="frmSearch">
                                <div class="col-lg-2">
                                    <input type="date" class="form-control" name="date"/>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-select" name="type">
                                        <option value="">Filter</option>
                                        <option value="1">Published</option>
                                        <option value="3">Draft</option>
                                        <option value="2">Archive</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-search"></i>&nbsp;Search
                                    </button>
                                </div>
                            </form>
                            <br />
                            <div class="row row-cards">
                                <div class="space-y">
                                <?php if(empty($news)){ ?>
                                    <div class="alert alert-warning" role="alert">No Post(s) Has Been Added Yet</div>
                                <?php }else { ?>
                                <div class="row row-cards" id="results">
                                <?php foreach($news as $row): ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card card-sm">
                                        <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>">
                                        <img src="<?=base_url('admin/images/news/')?><?=$row['image']?>" class="card-img-top" style="width: 100%; height: 200px;"/>
                                        </a>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                            <span class="avatar avatar-2 me-3 rounded" style="background-image: url(<?=base_url('assets/images/avatar.jpg')?>);"></span>
                                            <div style="width:100%;">
                                                <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>"><?=$row['topic'] ?></a>
                                                <div class="text-secondary">
                                                    <div class="row g-3">
                                                        <div class="col-lg-6">
                                                        <?=date('M,d Y',strtotime($row['date']))?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        <?php if($row['status']==1): ?>
                                                            <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>" style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                                            <span class="badge bg-primary text-white" style="float:right;">Published</span>
                                                        <?php elseif($row['status']==3): ?>
                                                            <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>" style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                                            <span class="badge bg-secondary text-white" style="float:right;">Draft</span>
                                                        <?php else : ?>
                                                            <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>" style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                                            <span class="badge bg-danger text-white" style="float:right;">Archive</span>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <?php } ?>
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
        $('#frmSearch').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                url: "<?=site_url('filter-news')?>",
                method: "GET",
                data: data,
                success: function(response) {
                    if (response === "") {
                        Swal.fire({
                            title: 'Sorry!',
                            text: "No Record(s) found. Please try again",
                            icon: 'warning',
                        });
                    } else {
                        $('#results').html(response);
                    }
                }
            });
        });
        </script>
</body>

</html>