<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <title>Digital Sports Hub - Forgot Password</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?=base_url('admin/css/tabler.min.css')?>" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="<?=base_url('admin/css/demo.min.css')?>" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
    @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body>
    <!-- BEGIN DEMO THEME SCRIPT -->
    <script src="<?=base_url('admin/js/demo-theme.min.js')?>"></script>
    <!-- END DEMO THEME SCRIPT -->
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <!-- BEGIN NAVBAR LOGO -->
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="<?=base_url('assets/images/logo.jpg')?>" width="50" style="border-radius: 50px;" />
                </a>
                <!-- END NAVBAR LOGO -->
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Forgot Password</h2>
                    <p class="text-secondary mb-4">Enter your email address and your password will be reset and emailed
                        to you.</p>
                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?=base_url('request-new-password')?>" method="POST" autocomplete="off" novalidate>
                        <?=csrf_field();?>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="your@email.com" autocomplete="off" />
                            <div class="text-danger">
                                <small><?=isset($validation)? display_error($validation,'email') : '' ?></small>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-2">
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                                Send me new password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">Forgot it, <a href="<?=base_url('auth')?>" tabindex="-1">send
                    me</a> to the sign in screen</div>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?=base_url('admin/js/tabler.min.js')?>" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?=base_url('admin/js/demo.min.js')?>" defer></script>
    <!-- END DEMO SCRIPTS -->
</body>

</html>