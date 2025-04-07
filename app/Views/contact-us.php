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
    <!--================= Preloader Section Start Here =================-->
    <div id="rts__preloader">
        <div class="main-fader responsive-height-comments">
            <div class="loader">
                <svg viewBox="0 0 866 866" xmlns="http://www.w3.org/2000/svg">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.83 151.5">
                        <path class="path-0"
                            d="M117.24,69.24A8,8,0,0,0,115.67,67c-4.88-4-9.8-7.89-14.86-11.62A4.93,4.93,0,0,0,96.93,55c-5.76,1.89-11.4,4.17-17.18,6a4.36,4.36,0,0,0-3.42,4.12c-1,6.89-2.1,13.76-3,20.66a4,4,0,0,0,1,3.07c5.12,4.36,10.39,8.61,15.68,12.76a3.62,3.62,0,0,0,2.92.75c6.29-2.66,12.52-5.47,18.71-8.36a3.49,3.49,0,0,0,1.68-2.19c1.34-7.25,2.54-14.55,3.9-22.58Z"
                            fill="#e41b23" />
                        <path class="path-1"
                            d="M97.55,38.68A43.76,43.76,0,0,1,98,33.44c.41-2.36-.5-3.57-2.57-4.64C91.1,26.59,87,24,82.66,21.82a6.18,6.18,0,0,0-4-.71C73.45,22.55,68.32,24.25,63.22,26c-3.63,1.21-6.08,3.35-5.76,7.69a26.67,26.67,0,0,1-.6,4.92c-1.08,8.06-1.08,8.08,5.86,11.92,3.95,2.19,7.82,5.75,11.94,6.08s8.76-2.41,13.12-3.93c9.33-3.29,9.33-3.3,9.78-14Z"
                            fill="#e41b23" />
                        <path class="path-2"
                            d="M66.11,126.56c5.91-.91,11.37-1.7,16.81-2.71a3.3,3.3,0,0,0,1.87-2.17c1-4.06,1.73-8.19,2.84-12.24.54-2-.11-3-1.55-4.15-5-4-9.9-8.12-15-12a6.19,6.19,0,0,0-4.15-1.1c-5.35.66-10.7,1.54-16,2.54A4,4,0,0,0,48.34,97a109.13,109.13,0,0,0-3,12.19,4.47,4.47,0,0,0,1.34,3.6c5.54,4.36,11.23,8.53,16.91,12.69a10.84,10.84,0,0,0,2.57,1.11Z"
                            fill="#e41b23" />
                        <path class="path-3"
                            d="M127.42,104.12c4.1-2.1,8-3.93,11.72-6a6,6,0,0,0,2.27-3,58.22,58.22,0,0,0,3.18-29.92c-.26-1.7-8-7.28-9.71-6.85A5,5,0,0,0,133,59.65c-2.81,2.49-5.71,4.88-8.33,7.56a9.46,9.46,0,0,0-2.47,4.4c-1.29,6.49-2.38,13-3.35,19.55a5.73,5.73,0,0,0,.83,3.91c2.31,3.08,5,5.88,7.7,9Z"
                            fill="#e41b23" />
                        <path class="path-4"
                            d="M52.58,29.89c-2.15-.36-3.78-.54-5.39-.9-2.83-.64-4.92.1-7,2.32A64.1,64.1,0,0,0,26.09,54.64c-2.64,7.92-2.62,7.84,5.15,10.87,1.76.69,2.73.45,3.93-1C39.79,59,44.54,53.65,49.22,48.2a4.2,4.2,0,0,0,1.13-2c.8-5.32,1.49-10.68,2.24-16.34Z"
                            fill="#e41b23" />
                        <path class="path-5" fill="#e41b23"
                            d="M23,68.13c0,2.51,0,4.7,0,6.87a60.49,60.49,0,0,0,9.75,32.15c1.37,2.13,6.4,3,7,1.2,1.55-5,2.68-10.2,3.82-15.34.13-.58-.58-1.38-.94-2.06-2.51-4.77-5.47-9.38-7.45-14.37C32.94,71,28.22,69.84,23,68.13Z" />
                        <path class="path-6" fill="#e41b23"
                            d="M83.91,12.86c-.32.36-.66.71-1,1.07.9,1.13,1.57,2.62,2.73,3.33,4.71,2.84,9.56,5.48,14.39,8.1a9.29,9.29,0,0,0,3.13.83c5.45.69,10.89,1.38,16.35,1.94a10.41,10.41,0,0,0,3.07-.71c-11.48-9.9-24.26-14.61-38.71-14.56Z" />
                        <path class="path-7" fill="#e41b23"
                            d="M66.28,132.51c13.36,3.78,25.62,3.5,38-.9C91.68,129.59,79.36,128,66.28,132.51Z" />
                        <path class="path-8" fill="#e41b23"
                            d="M127.2,30.66l-1.27.37a18.58,18.58,0,0,0,1,3.08c3,5.52,6.21,10.89,8.89,16.54,1.34,2.83,3.41,3.82,6.49,4.9a60.38,60.38,0,0,0-15.12-24.9Z" />
                        <path class="bb-9" fill="#e41b23"
                            d="M117.35,125c5.58-2.32,16.9-13.84,18.1-19.2-2.41,1.46-5.18,2.36-6.78,4.23-4.21,5-7.89,10.37-11.32,15Z" />
                    </svg>
                </svg>
            </div>
        </div>
    </div>
    <!--================= Preloader End Here =================-->
    <div class="anywere anywere-home"></div>

    <!--================= Header Section Start Here =================-->
    <header id="rtsHeader" class="rts-header1 header-four">
        <div class="navbar-sticky">
            <div class="navbar-part navbar-part1">
                <div class="container">
                    <?=view('templates/topbar')?>
                    <?=view('templates/header')?>
                </div>
            </div>
        </div>

        <!--================= Slide Bar Start Here =================-->
        <?=view('templates/sidebar')?>
        <!--================= Slide Bar Start Here =================-->

        <!--================= Banner Section Start Here =================-->
        <div class="banner banner1">
            <div class="inner-page-banner banner-bg">
                <div class="container">
                    <div class="banner-content">
                        <div class="page-path">
                            <ul>
                                <li><a class="home-page-link" href="/">Home</a></li>
                                <li><a class="current-page" href="<?=site_url('contact-us')?>"><?=$title?></a></li>
                            </ul>
                        </div>
                        <h1 class="banner-heading">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Banner Section End Here =================-->

    </header>
    <!--================= Header Section End Here =================-->


    <div class="contact-area">
        <div class="container">
            <div class="address-box">
                <div class="contact-area-inner">
                    <div class="row align-items-start">
                        <div class="col-lg-6 col-md-12">
                            <div class="map">
                                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247457.5172042079!2d120.65457473574595!3d14.280976533613943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d4eae8163c71%3A0xf0c4d0843bdde727!2sCavite!5e0!3m2!1sen!2sph!4v1744003962230!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                            </div>  
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <form class="contact-form mb-10">
                                <h3 class="post-title mb-35">GET IN TOUCH</h3>
                                <div class="info-form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-box name mb-20">
                                                <input type="text" name="fullname" placeholder="Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-box email mail-input mb-20">
                                                <input type="email" name="email" placeholder="Your E-mail"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-box message text-input mb-20">
                                                <textarea name="message" cols="30" rows="10"
                                                    placeholder="Write Your Message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-15">
                                            <button type="submit" class="form-btn form-btn4">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--================= Footer Start Here =================-->
    <?=view('templates/footer');?>
    <!--================= Footer End Here =================-->


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