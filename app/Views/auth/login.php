<!DOCTYPE html>
<html lang="en" class="darkmode" data-tHEme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Sports Hub</title>
    <!--================= Favicon =================-->
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <!--================= Bootstrap V5 CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <!--================= Font Awesome 5 CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/all.min.css')?>">
    <!--================= RT Icons CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/rt-icons.css')?>">
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/animate.min.css')?>">
    <!--================= Magnific popup Plugin =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/magnific-popup.css')?>">
    <!--================= Swiper Slider Plugin =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/swiper-bundle.min.css')?>">
    <!--================= Mobile Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/metisMenu.css')?>">
    <!--================= Main Menu CSS =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/rtsmenu.css')?>">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/variables/variable2.css')?>">
    <!--================= Main Stylesheet =================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css"
        integrity="sha512-v8QQ0YQ3H4K6Ic3PJkym91KoeNT5S3PnDKvqnwqFD1oiqIl653crGZplPdU5KKtHjO0QKcQ2aUlQZYjHczkmGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="anywere anywere-home"></div>
    <!--================= Header Section End Here =================-->
    <section class="pt--100 pb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 login-form">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <img src="<?=base_url('assets/images/logo.jpg')?>" width="100"
                                    style="border-radius: 50px;" alt="Logo">
                            </center>
                            <h4 class="text-center">Digital Sports Hub</h4>
                            <p class="text-center">Please enter your email and password</p>
                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('fail'); ?>
                            </div>
                            <?php endif; ?>
                            <form method="POST" class="form" autocomplete="OFF" action="<?=base_url('check')?>">
                                <?=csrf_field();?>
                                <div class="form">
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="<?=set_value('email')?>" required />
                                    <div class="text-danger">
                                        <small><?=isset($validation)? display_error($validation,'email') : '' ?></small>
                                    </div>
                                </div>
                                <div class="form">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        minlength="8" maxlength="16" required />
                                    <div class="text-danger">
                                        <small><?=isset($validation)? display_error($validation,'password') : '' ?></small>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="checkbox" class="form-check-input" id="remember" />
                                    <label for="remember" class="form-label">Remember Me</label>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn form-control">Login
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                                <a class="forgot-password" href="<?=base_url('forgot-password')?>">Forgot password?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================= Scroll to Top Start =================-->
    <div class="scroll-top-btn scroll-top-btn1"><i class="fas fa-angle-up arrow-up"></i><i
            class="fas fa-circle-notch"></i></div>
    <!--================= Scroll to Top End =================-->

    <!--================= Jquery latest version =================-->
    <script src="<?=base_url('assets/js/vendors/jquery-3.6.0.min.js')?>"></script>
    <!--================= Bootstrap latest version =================-->
    <script src="<?=base_url('assets/js/vendors/bootstrap.min.js')?>"></script>
    <!--================= Wow.js =================-->
    <script src="<?=base_url('assets/js/vendors/wow.min.js')?>"></script>
    <!--================= Swiper Slider =================-->
    <script src="<?=base_url('assets/js/vendors/swiper-bundle.min.js')?>"></script>
    <!--================= metisMenu Plugin =================-->
    <script src="<?=base_url('assets/js/vendors/metisMenu.min.js')?>"></script>
    <!--================= Main Menu Plugin =================-->
    <script src="<?=base_url('assets/js/vendors/rtsmenu.js')?>"></script>
    <!--================= Mobile Menu Plugin =================-->
    <script src="<?=base_url('assets/js/vendors/metisMenu.min.js')?>"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?=base_url('assets/js/vendors/isotope.pkgd.min.js')?>"></script>
    <!--================= Magnefic Popup Plugin =================-->
    <script src="<?=base_url('assets/js/vendors/jquery.magnific-popup.min.js')?>"></script>
    <!--================= Main Script =================-->
    <script src="<?=base_url('assets/js/main.js')?>"></script>
</body>

</html>