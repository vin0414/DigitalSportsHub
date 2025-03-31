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
                    <div class="top-bar">
                        <div class="top-bar-inner">
                            <div class="top-bar-left">
                                <a href="#" class="get-ticket-btn">Get Ticket</a>
                                <ul class="social-wrapper">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#">
                                            <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.5781 1.66406C16.3828 4.34375 17.2852 7.35156 16.957 10.8242C16.957 10.8242 16.957 10.8516 16.9297 10.8516C15.7266 11.7539 14.3594 12.4375 12.9102 12.875C12.8828 12.9023 12.8828 12.875 12.8555 12.875C12.5547 12.4375 12.2812 12 12.0352 11.5352C12.0352 11.5078 12.0352 11.4805 12.0625 11.4531C12.5 11.2891 12.9102 11.0977 13.3203 10.8516C13.3477 10.8516 13.3477 10.7969 13.3203 10.7695C13.2383 10.7148 13.1562 10.6602 13.0742 10.5781C13.0469 10.5781 13.0469 10.5781 13.0195 10.5781C10.4219 11.7812 7.57812 11.7812 4.95312 10.5781C4.92578 10.5781 4.89844 10.5781 4.89844 10.5781C4.81641 10.6602 4.73438 10.7148 4.65234 10.7695C4.59766 10.7969 4.625 10.8516 4.65234 10.8516C5.03516 11.0977 5.47266 11.2891 5.91016 11.4531C5.9375 11.4805 5.9375 11.5078 5.9375 11.5352C5.69141 12 5.41797 12.4375 5.11719 12.875C5.08984 12.875 5.0625 12.9023 5.0625 12.875C3.61328 12.4375 2.24609 11.7539 1.04297 10.8516C1.01562 10.8516 1.01562 10.8242 1.01562 10.8242C0.742188 7.81641 1.31641 4.78125 3.39453 1.66406C3.39453 1.66406 3.39453 1.66406 3.42188 1.66406C4.46094 1.17188 5.55469 0.84375 6.67578 0.652344C6.70312 0.625 6.73047 0.652344 6.73047 0.652344C6.89453 0.925781 7.03125 1.22656 7.14062 1.5C8.37109 1.30859 9.60156 1.30859 10.832 1.5C10.9414 1.22656 11.0781 0.925781 11.2422 0.652344C11.2422 0.652344 11.2695 0.625 11.2969 0.652344C12.418 0.84375 13.5117 1.17188 14.5508 1.66406C14.5781 1.66406 14.5781 1.66406 14.5781 1.66406ZM6.32031 8.99219C7.11328 8.99219 7.76953 8.25391 7.76953 7.37891C7.76953 6.47656 7.14062 5.76562 6.32031 5.76562C5.52734 5.76562 4.87109 6.47656 4.87109 7.37891C4.87109 8.25391 5.52734 8.99219 6.32031 8.99219ZM11.6523 8.99219C12.4727 8.99219 13.1016 8.25391 13.1016 7.37891C13.1289 6.47656 12.4727 5.76562 11.6523 5.76562C10.8594 5.76562 10.2305 6.47656 10.2305 7.37891C10.2305 8.25391 10.8594 8.99219 11.6523 8.99219Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-bar-mid">
                                <span class="tag">LIVE</span>
                                <div class="live-match">GOLD KING <span>VS</span> ROYAL UP</div>
                            </div>
                            <div class="top-bar-right">
                                <a href="" class="login-btn">LOG IN</a>
                                <a href="" class="sign-up-btn">SIGN UP</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-inner">
                        <a href="<?=base_url('/')?>" class="logo">
                            <img src="assets/images/logo.jpg" width="50" alt="sportius-logo"></a>
                        <a href="<?=base_url('/')?>" class="logo-sticky">
                            <img src="assets/images/logo.jpg" width="50" alt="kester-logo"></a>
                        <div class="rts-menu">
                            <nav class="menus menu-toggle">
                                <ul class="nav__menu">
                                    <li class="has-dropdown">
                                        <a class="menu-item active1" href="<?=base_url('/')?>">Home</a>
                                    </li>
                                    <li><a class="menu-item" href="<?=base_url('watch-now')?>">Watch</a></li>
                                    <li class="has-dropdown"><a class="menu-item" href="#">Pages</a>
                                        <ul class="dropdown-ul mega-dropdown">
                                            <li class="mega-dropdown-li">
                                                <ul class="mega-dropdown-ul">
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="team.html">Team Details</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="team-details.html">Player Details</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="history.html">History</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="awards.html">Awards</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="faq.html">FAQ</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-dropdown-li">
                                                <ul class="mega-dropdown-ul">
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="gallery.html">Gallery</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="event.html">Event</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="event-details.html">Event Details</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="error.html">Error</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-dropdown-li">
                                                <ul class="mega-dropdown-ul">
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="match-schedule.html">Match Schedule</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="match-result.html">Match
                                                            Result</a>
                                                    </li>
                                                    <li class="dropdown-li"><a class="dropdown-link"
                                                            href="league-standings.html">Point Table</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="menu-item" href="#">Shop near me</a>
                                    </li>
                                    <li>
                                        <a class="menu-item" href="">News</a>
                                    </li>
                                    <li><a class="menu-item" href="">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-action-items header-action-items1">
                            <div class="search-part">
                                <div class="search-icon action-item icon"><i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <div class="search-input-area">
                                    <div class="container">
                                        <div class="search-input-inner">
                                            <select class="custom-select select-hidden">
                                                <option value="hide">All Catagories</option>
                                                <option value="all">All</option>
                                                <option value="league">League</option>
                                                <option value="club">Club</option>
                                                <option value="team">Team</option>
                                                <option value="player">Player</option>
                                                <option value="match">Match</option>
                                                <option value="score">Score</option>
                                            </select>
                                            <div class="input-div">
                                                <div class="search-input-icon"><i
                                                        class="fa-solid fa-magnifying-glass"></i></div>
                                                <input id="searchInput1" class="search-input" type="text"
                                                    placeholder="Search by keyword or #">
                                            </div>
                                            <div class="search-close-icon">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart action-item">
                                <div class="cart-nav">
                                    <div class="basket-icon cart-icon icon">
                                        <a href="#">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="hamburger-menu aitem d-block">
                            <div class="hamburger-menu-inner">
                                <span></span>
                                <span class=""></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--================= Slide Bar Start Here =================-->
        <aside class="slide-bar">
            <div class="offset-sidebar">
                <button class="slide-bar-close ml--30"><i class="fa-solid fa-circle-xmark"></i></button>
                <div class="offset-widget offset-logo mb-30">
                    <a href="<?=base_url('/')?>">
                        <img src="<?=base_url('assets/images/logo.png')?>" alt="logo">
                    </a>
                </div>
            </div>
            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu side-mobile-menu1">
                <ul id="mobile-menu-active">
                    <li class="has-dropdown firstlvl">
                        <a class="mm-link" href="<?=base_url('/')?>">Home</a>
                    </li>
                    <li><a class="mm-link" href="<?=base_url('about')?>">About</a></li>
                    <li class="has-dropdown firstlvl">
                        <a class="mm-link" href="index.html">Pages <i class="rt-angle-down"></i></a>
                        <ul class="sub-menu mega-dropdown-mobile">
                            <li class="mega-dropdown-li">
                                <ul class="mega-dropdown-ul mm-show">
                                    <li class="dropdown-li"><a class="dropdown-link" href="team.html">Team Details</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="team-details.html">Player
                                            Details</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="history.html">History</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="faq.html">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-dropdown-li">
                                <ul class="mega-dropdown-ul mm-show">
                                    <li class="dropdown-li"><a class="dropdown-link" href="gallery.html">Gallery</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="event.html">Event</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="event-details.html">Event
                                            Details</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="error.html">Error</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-dropdown-li">
                                <ul class="mega-dropdown-ul mm-show">
                                    <li class="dropdown-li"><a class="dropdown-link" href="match-schedule.html">Match
                                            Schedule</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="match-result.html">Match
                                            Result</a>
                                    </li>
                                    <li class="dropdown-li"><a class="dropdown-link" href="league-standings.html">Point
                                            Table</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-dropdown firstlvl">
                        <a class="mm-link" href="index.html">Shop <i class="rt-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="product-details.html">Product Details</a></li>
                            <li><a href="cart.html">cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="account.html">My Account</a></li>
                            <li><a href="thank-you.html">Thank You</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown firstlvl">
                        <a class="mm-link" href="news-details.html">News <i class="rt-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">News</a></li>
                            <li><a href="blog-details.html">News Details</a></li>
                        </ul>
                    </li>
                    <li><a class="mm-link" href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <!-- side-mobile-menu end -->
            <div class="side-bar-social-links">
                <a href="#0" class="platform"><i class="fab fa-facebook-f"></i></a>
                <a href="#0" class="platform"><i class="fab fa-twitter"></i></a>
                <a href="#0" class="platform"><i class="fab fa-behance"></i></a>
                <a href="#0" class="platform"><i class="fab fa-youtube"></i></a>
            </div>
        </aside>
        <!--================= Slide Bar Start Here =================-->

        <!--================= Banner Section Start Here =================-->
        <section class="banner banner3 home-four">
            <div class="banner-single banner-bg banner-single-2">
                <div class="video-section-inner text-center">
                    <div class="play-video">
                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="container">
                    <div class="banner-content">
                        <div class="flex-wrap d-flex">
                            <span class="blog-catagory-tag">BASKETBALL</span>
                        </div>
                        <h1 class="banner-heading">Exploring World of Basketball</h1>
                        <p class="desc">Whether you're a dedicated fan, a casual observer, or just starting to discover
                            the sport <br>
                            you'll find a wealth of information and inspiration here.</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!--================= Banner Section End Here =================-->

    </header>
    <!--================= Header Section End Here =================-->


    <!--================= Trending News Section Start Here =================-->
    <section class="rts-trending-news-section2 home-four pt--100 pb--100">
        <div class="container">
            <div class="section-inner">
                <div class="section-title-area section-ttile-area2">
                    <h1 class="section-title">LATEST NEWS</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="left-post-inner">
                            <div class="post-inner small">
                                <div class="item small-post">
                                    <a href="blog-details.html" class="gallery-picture">
                                    </a>
                                    <div class="contents-wrapper">
                                        <div class="contents text-start">
                                            <div class="d-block">
                                                <div class="heading d-flex">
                                                    <p class="tag">BASKETBALL</p>
                                                    <span class="blog-date">JULY 21, 2023</span>
                                                </div>
                                                <div class="gallery-title">
                                                    <a href="blog-details.html">Clash of Titans in the Upcoming
                                                        Basketball Battle match</a>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <div class="content">
                                                    <a href="blog-details.html" class="read-more">READ MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-inner small">
                                <div class="item small-post two">
                                    <a href="blog-details.html" class="gallery-picture">
                                    </a>
                                    <div class="contents-wrapper">
                                        <div class="contents text-start">
                                            <div class="d-block">
                                                <div class="heading d-flex">
                                                    <p class="tag">PLAYER</p>
                                                    <span class="blog-date">JULY 21, 2023</span>
                                                </div>
                                                <div class="gallery-title">
                                                    <a href="blog-details.html">Clash of Titans in the Upcoming
                                                        Basketball Battle match</a>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <div class="content">
                                                    <a href="blog-details.html" class="read-more">READ MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post-inner">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">BASKETBALL</p>
                                                <span class="blog-date">JULY 21, 2023</span>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="premier-league-area side-table-item side-item">
                            <div class="side-item-inner">
                                <h3 class="side-content-title">PREMIER LEAGUE</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="head-tr">
                                            <th scope="col">Rank</th>
                                            <th scope="col">Player</th>
                                            <th scope="col">PTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="position-number">1</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-1.svg"
                                                        alt="flag">rON eMRICH</span></td>
                                            <td><span class="win-count">125</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">2</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-2.svg"
                                                        alt="flag">Henry</span></td>
                                            <td><span class="win-count">121</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">3</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-3.svg"
                                                        alt="flag">Benjamin</span></td>
                                            <td><span class="win-count">113</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">4</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-4.svg"
                                                        alt="flag">Alexander</span></td>
                                            <td><span class="win-count">109</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">5</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-5.svg"
                                                        alt="flag">Jackson</span></td>
                                            <td><span class="win-count">102</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">6</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-6.svg"
                                                        alt="flag">Gabriel</span></td>
                                            <td><span class="win-count">99</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">7</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-7.svg"
                                                        alt="flag">Maverick</span></td>
                                            <td><span class="win-count">91</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">8</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-8.svg"
                                                        alt="flag">Thomas</span></td>
                                            <td><span class="win-count">86</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">9</span></td>
                                            <td><span class="player"><img src="assets/images/icons/flag-9.svg"
                                                        alt="flag">Christopher</span></td>
                                            <td><span class="win-count">78</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================= Trending News Section End Here =================-->


    <!--================= Player Static Section Start Here =================-->
    <section class="rts-player-static pt--100 pb--100">
        <div class="container">
            <div class="section-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="left-side-content">
                            <div class="section-title-area section-ttile-area2">
                                <h1 class="section-title">PLAYER STATISTICS</h1>
                            </div>
                            <div class="content-area">
                                <div class="image">
                                    <img src="assets/images/team/team09.png" alt="">
                                </div>
                                <div class="stat-table">
                                    <div class="table-area">
                                        <div class="table-top">
                                            <div class="player">
                                                <span class="tag">NAME</span>
                                                <h2 class="name">
                                                    <a href="team.html">NICK CELIS</a>
                                                </h2>
                                            </div>
                                            <div class="point">
                                                <span class="tag">RANKING POINTS</span>
                                                <div class="number">1,176,768</div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="head-tr">
                                                    <th scope="col">BY YEAR</th>
                                                    <th scope="col">TEAM</th>
                                                    <th scope="col">GP</th>
                                                    <th scope="col">MIN</th>
                                                    <th scope="col">PTS</th>
                                                    <th scope="col">FGM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="position-number">2022-23</span></td>
                                                    <td><span class="player">MAN</span></td>
                                                    <td><span class="win-count">7</span></td>
                                                    <td><span class="win-count">41.0</span></td>
                                                    <td><span class="win-count">14.0</span></td>
                                                    <td><span class="win-count">2.1</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="position-number">2020-21</span></td>
                                                    <td><span class="player">WES</span></td>
                                                    <td><span class="win-count">5</span></td>
                                                    <td><span class="win-count">48.4</span></td>
                                                    <td><span class="win-count">17.0</span></td>
                                                    <td><span class="win-count">8.1</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" class="table-btn btn">VIEW PROFILE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right-side-content">
                            <div class="section-title-area section-ttile-area2">
                                <h1 class="section-title">POINT TABLE</h1>
                                <a href="#" class="view-btn">VIEW ALL <svg xmlns="http://www.w3.org/2000/svg" width="7"
                                        height="10" viewBox="0 0 7 10" fill="none">
                                        <path
                                            d="M0.722898 0.000164177C0.581981 -0.0029352 0.443599 0.0379148 0.326992 0.117098C0.210385 0.196281 0.121345 0.309883 0.0722539 0.442009C0.0231624 0.574135 0.0164578 0.718253 0.0530719 0.854366C0.0896861 0.990478 0.1678 1.11175 0.276553 1.20141L4.4261 4.75627L0.276553 8.30988C0.201323 8.36517 0.13832 8.43536 0.0914884 8.51613C0.0446573 8.5969 0.0150075 8.6865 0.00439536 8.77925C-0.00621682 8.87201 0.00243752 8.96594 0.0298163 9.0552C0.0571951 9.14446 0.102708 9.22713 0.163506 9.29799C0.224304 9.36884 0.299077 9.42631 0.383142 9.46693C0.467206 9.50755 0.558753 9.53036 0.652047 9.53396C0.745341 9.53756 0.838373 9.52191 0.925317 9.48789C1.01226 9.45387 1.09125 9.40227 1.15732 9.33631L5.90818 5.27148C5.98278 5.20781 6.04269 5.12879 6.08377 5.03973C6.12485 4.95066 6.14613 4.85372 6.14613 4.75564C6.14613 4.65756 6.12485 4.56063 6.08377 4.47156C6.04269 4.3825 5.98278 4.3034 5.90818 4.23973L1.15732 0.170989C1.03731 0.064389 0.883374 0.00394085 0.722898 0.000164177Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                            <div class="table-area">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="head-tr">
                                            <th scope="col">POS</th>
                                            <th scope="col">TEAM</th>
                                            <th scope="col">W</th>
                                            <th scope="col">L</th>
                                            <th scope="col">PTS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="position-number">1</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-1.svg" alt="">
                                                    Mancon</span></td>
                                            <td><span class="win-count">9</span></td>
                                            <td><span class="win-count">2</span></td>
                                            <td><span class="win-count">0.912</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">2</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-2.svg"
                                                        alt="">Weston</span></td>
                                            <td><span class="win-count">7</span></td>
                                            <td><span class="win-count">3</span></td>
                                            <td><span class="win-count">0.833</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">3</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-3.svg"
                                                        alt="">Bulls</span></td>
                                            <td><span class="win-count">5</span></td>
                                            <td><span class="win-count">4</span></td>
                                            <td><span class="win-count">0.945</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">4</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-4.svg"
                                                        alt="">Manhut</span></td>
                                            <td><span class="win-count">5</span></td>
                                            <td><span class="win-count">4</span></td>
                                            <td><span class="win-count">0.879</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">5</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-5.svg"
                                                        alt="">Miland</span></td>
                                            <td><span class="win-count">4</span></td>
                                            <td><span class="win-count">2</span></td>
                                            <td><span class="win-count">0.912</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="position-number">6</span></td>
                                            <td><span class="player"><img src="assets/images/icons/club-6.svg"
                                                        alt="">Interko</span></td>
                                            <td><span class="win-count">3</span></td>
                                            <td><span class="win-count">2</span></td>
                                            <td><span class="win-count">0.912</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================= Player Static Section End Here =================-->


    <!--================= Next Match Section Start Here =================-->
    <section class="rts-next-match home-four pt--100">
        <div class="container">
            <div class="section-inner">
                <div class="section-title-area text-center section-ttile-area2">
                    <h1 class="section-title">UPCOMING Match</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="match-wrapper">
                            <div class="logo">
                                <img src="assets/images/icons/club-7.svg" alt="">
                            </div>
                            <div class="content">
                                <p class="date">August 11, 2023</p>
                                <p class="time">5:45 Pm</p>
                                <h3 class="team">Dragons <span>VS</span> Manhut</h3>
                            </div>
                            <div class="logo">
                                <img src="assets/images/icons/club-8.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="match-wrapper">
                            <div class="logo">
                                <img src="assets/images/icons/club-9.svg" alt="">
                            </div>
                            <div class="content">
                                <p class="date">August 11, 2023</p>
                                <p class="time">5:45 Pm</p>
                                <h3 class="team">Weston <span>VS</span> Miland</h3>
                            </div>
                            <div class="logo">
                                <img src="assets/images/icons/club-10.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="match-wrapper">
                            <div class="logo">
                                <img src="assets/images/icons/club-11.svg" alt="">
                            </div>
                            <div class="content">
                                <p class="date">August 11, 2023</p>
                                <p class="time">5:45 Pm</p>
                                <h3 class="team">Bulls <span>VS</span> Interko</h3>
                            </div>
                            <div class="logo">
                                <img src="assets/images/icons/club-12.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================= Next Match Section End Here =================-->


    <!--================= Newsletter Start Here =================-->
    <section class="rts-newsletter-section2 home-four section-gap-100">
        <div class="container">
            <div class="newsletter-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="title">Watch The Basketball Finals game replay</h3>
                        <form>
                            <div class="form">
                                <input type="text" class="form-control" id="username" placeholder="Enter Your Email"
                                    required />
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">SUBSCRIBE</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
    </section>
    <!--================= Newsletter End Here =================-->


    <!--================= Team Section Start Here =================-->
    <div class="rts-team-section home-four pb--100">
        <div class="container">
            <div class="section-title-area section-title-area1 mb--50">
                <h1 class="title">PLAYERS</h1>
                <div class="swiper-slider-btn">
                    <div class="slider-btn slide-prev">
                        <i class="fal fa-chevron-left"></i>
                    </div>
                    <div class="slider-btn slide-next">
                        <i class="fal fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="team-section-inner">
                <div class="swiper rts-teamSlider2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="team-wraper">
                                <div class="player-card">
                                    <a class="image" href="team-details.html"><img src="assets/images/team/team10.png"
                                            alt=""></a>
                                    <ul class="social-area">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#">
                                                <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.5781 1.66406C16.3828 4.34375 17.2852 7.35156 16.957 10.8242C16.957 10.8242 16.957 10.8516 16.9297 10.8516C15.7266 11.7539 14.3594 12.4375 12.9102 12.875C12.8828 12.9023 12.8828 12.875 12.8555 12.875C12.5547 12.4375 12.2812 12 12.0352 11.5352C12.0352 11.5078 12.0352 11.4805 12.0625 11.4531C12.5 11.2891 12.9102 11.0977 13.3203 10.8516C13.3477 10.8516 13.3477 10.7969 13.3203 10.7695C13.2383 10.7148 13.1562 10.6602 13.0742 10.5781C13.0469 10.5781 13.0469 10.5781 13.0195 10.5781C10.4219 11.7812 7.57812 11.7812 4.95312 10.5781C4.92578 10.5781 4.89844 10.5781 4.89844 10.5781C4.81641 10.6602 4.73438 10.7148 4.65234 10.7695C4.59766 10.7969 4.625 10.8516 4.65234 10.8516C5.03516 11.0977 5.47266 11.2891 5.91016 11.4531C5.9375 11.4805 5.9375 11.5078 5.9375 11.5352C5.69141 12 5.41797 12.4375 5.11719 12.875C5.08984 12.875 5.0625 12.9023 5.0625 12.875C3.61328 12.4375 2.24609 11.7539 1.04297 10.8516C1.01562 10.8516 1.01562 10.8242 1.01562 10.8242C0.742188 7.81641 1.31641 4.78125 3.39453 1.66406C3.39453 1.66406 3.39453 1.66406 3.42188 1.66406C4.46094 1.17188 5.55469 0.84375 6.67578 0.652344C6.70312 0.625 6.73047 0.652344 6.73047 0.652344C6.89453 0.925781 7.03125 1.22656 7.14062 1.5C8.37109 1.30859 9.60156 1.30859 10.832 1.5C10.9414 1.22656 11.0781 0.925781 11.2422 0.652344C11.2422 0.652344 11.2695 0.625 11.2969 0.652344C12.418 0.84375 13.5117 1.17188 14.5508 1.66406C14.5781 1.66406 14.5781 1.66406 14.5781 1.66406ZM6.32031 8.99219C7.11328 8.99219 7.76953 8.25391 7.76953 7.37891C7.76953 6.47656 7.14062 5.76562 6.32031 5.76562C5.52734 5.76562 4.87109 6.47656 4.87109 7.37891C4.87109 8.25391 5.52734 8.99219 6.32031 8.99219ZM11.6523 8.99219C12.4727 8.99219 13.1016 8.25391 13.1016 7.37891C13.1289 6.47656 12.4727 5.76562 11.6523 5.76562C10.8594 5.76562 10.2305 6.47656 10.2305 7.37891C10.2305 8.25391 10.8594 8.99219 11.6523 8.99219Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile">
                                    <a href="team-details.html" class="name">DAVID WILLIAM</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team-wraper">
                                <div class="player-card">
                                    <a class="image" href="team-details.html"><img src="assets/images/team/team11.png"
                                            alt=""></a>
                                    <ul class="social-area">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#">
                                                <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.5781 1.66406C16.3828 4.34375 17.2852 7.35156 16.957 10.8242C16.957 10.8242 16.957 10.8516 16.9297 10.8516C15.7266 11.7539 14.3594 12.4375 12.9102 12.875C12.8828 12.9023 12.8828 12.875 12.8555 12.875C12.5547 12.4375 12.2812 12 12.0352 11.5352C12.0352 11.5078 12.0352 11.4805 12.0625 11.4531C12.5 11.2891 12.9102 11.0977 13.3203 10.8516C13.3477 10.8516 13.3477 10.7969 13.3203 10.7695C13.2383 10.7148 13.1562 10.6602 13.0742 10.5781C13.0469 10.5781 13.0469 10.5781 13.0195 10.5781C10.4219 11.7812 7.57812 11.7812 4.95312 10.5781C4.92578 10.5781 4.89844 10.5781 4.89844 10.5781C4.81641 10.6602 4.73438 10.7148 4.65234 10.7695C4.59766 10.7969 4.625 10.8516 4.65234 10.8516C5.03516 11.0977 5.47266 11.2891 5.91016 11.4531C5.9375 11.4805 5.9375 11.5078 5.9375 11.5352C5.69141 12 5.41797 12.4375 5.11719 12.875C5.08984 12.875 5.0625 12.9023 5.0625 12.875C3.61328 12.4375 2.24609 11.7539 1.04297 10.8516C1.01562 10.8516 1.01562 10.8242 1.01562 10.8242C0.742188 7.81641 1.31641 4.78125 3.39453 1.66406C3.39453 1.66406 3.39453 1.66406 3.42188 1.66406C4.46094 1.17188 5.55469 0.84375 6.67578 0.652344C6.70312 0.625 6.73047 0.652344 6.73047 0.652344C6.89453 0.925781 7.03125 1.22656 7.14062 1.5C8.37109 1.30859 9.60156 1.30859 10.832 1.5C10.9414 1.22656 11.0781 0.925781 11.2422 0.652344C11.2422 0.652344 11.2695 0.625 11.2969 0.652344C12.418 0.84375 13.5117 1.17188 14.5508 1.66406C14.5781 1.66406 14.5781 1.66406 14.5781 1.66406ZM6.32031 8.99219C7.11328 8.99219 7.76953 8.25391 7.76953 7.37891C7.76953 6.47656 7.14062 5.76562 6.32031 5.76562C5.52734 5.76562 4.87109 6.47656 4.87109 7.37891C4.87109 8.25391 5.52734 8.99219 6.32031 8.99219ZM11.6523 8.99219C12.4727 8.99219 13.1016 8.25391 13.1016 7.37891C13.1289 6.47656 12.4727 5.76562 11.6523 5.76562C10.8594 5.76562 10.2305 6.47656 10.2305 7.37891C10.2305 8.25391 10.8594 8.99219 11.6523 8.99219Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile">
                                    <a href="team-details.html" class="name">Robert Horry</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team-wraper">
                                <div class="player-card">
                                    <a class="image" href="team-details.html"><img src="assets/images/team/team12.png"
                                            alt=""></a>
                                    <ul class="social-area">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#">
                                                <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.5781 1.66406C16.3828 4.34375 17.2852 7.35156 16.957 10.8242C16.957 10.8242 16.957 10.8516 16.9297 10.8516C15.7266 11.7539 14.3594 12.4375 12.9102 12.875C12.8828 12.9023 12.8828 12.875 12.8555 12.875C12.5547 12.4375 12.2812 12 12.0352 11.5352C12.0352 11.5078 12.0352 11.4805 12.0625 11.4531C12.5 11.2891 12.9102 11.0977 13.3203 10.8516C13.3477 10.8516 13.3477 10.7969 13.3203 10.7695C13.2383 10.7148 13.1562 10.6602 13.0742 10.5781C13.0469 10.5781 13.0469 10.5781 13.0195 10.5781C10.4219 11.7812 7.57812 11.7812 4.95312 10.5781C4.92578 10.5781 4.89844 10.5781 4.89844 10.5781C4.81641 10.6602 4.73438 10.7148 4.65234 10.7695C4.59766 10.7969 4.625 10.8516 4.65234 10.8516C5.03516 11.0977 5.47266 11.2891 5.91016 11.4531C5.9375 11.4805 5.9375 11.5078 5.9375 11.5352C5.69141 12 5.41797 12.4375 5.11719 12.875C5.08984 12.875 5.0625 12.9023 5.0625 12.875C3.61328 12.4375 2.24609 11.7539 1.04297 10.8516C1.01562 10.8516 1.01562 10.8242 1.01562 10.8242C0.742188 7.81641 1.31641 4.78125 3.39453 1.66406C3.39453 1.66406 3.39453 1.66406 3.42188 1.66406C4.46094 1.17188 5.55469 0.84375 6.67578 0.652344C6.70312 0.625 6.73047 0.652344 6.73047 0.652344C6.89453 0.925781 7.03125 1.22656 7.14062 1.5C8.37109 1.30859 9.60156 1.30859 10.832 1.5C10.9414 1.22656 11.0781 0.925781 11.2422 0.652344C11.2422 0.652344 11.2695 0.625 11.2969 0.652344C12.418 0.84375 13.5117 1.17188 14.5508 1.66406C14.5781 1.66406 14.5781 1.66406 14.5781 1.66406ZM6.32031 8.99219C7.11328 8.99219 7.76953 8.25391 7.76953 7.37891C7.76953 6.47656 7.14062 5.76562 6.32031 5.76562C5.52734 5.76562 4.87109 6.47656 4.87109 7.37891C4.87109 8.25391 5.52734 8.99219 6.32031 8.99219ZM11.6523 8.99219C12.4727 8.99219 13.1016 8.25391 13.1016 7.37891C13.1289 6.47656 12.4727 5.76562 11.6523 5.76562C10.8594 5.76562 10.2305 6.47656 10.2305 7.37891C10.2305 8.25391 10.8594 8.99219 11.6523 8.99219Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile">
                                    <a href="team-details.html" class="name">John Havlicek</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team-wraper">
                                <div class="player-card">
                                    <a class="image" href="team-details.html"><img src="assets/images/team/team13.png"
                                            alt=""></a>
                                    <ul class="social-area">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#">
                                                <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.5781 1.66406C16.3828 4.34375 17.2852 7.35156 16.957 10.8242C16.957 10.8242 16.957 10.8516 16.9297 10.8516C15.7266 11.7539 14.3594 12.4375 12.9102 12.875C12.8828 12.9023 12.8828 12.875 12.8555 12.875C12.5547 12.4375 12.2812 12 12.0352 11.5352C12.0352 11.5078 12.0352 11.4805 12.0625 11.4531C12.5 11.2891 12.9102 11.0977 13.3203 10.8516C13.3477 10.8516 13.3477 10.7969 13.3203 10.7695C13.2383 10.7148 13.1562 10.6602 13.0742 10.5781C13.0469 10.5781 13.0469 10.5781 13.0195 10.5781C10.4219 11.7812 7.57812 11.7812 4.95312 10.5781C4.92578 10.5781 4.89844 10.5781 4.89844 10.5781C4.81641 10.6602 4.73438 10.7148 4.65234 10.7695C4.59766 10.7969 4.625 10.8516 4.65234 10.8516C5.03516 11.0977 5.47266 11.2891 5.91016 11.4531C5.9375 11.4805 5.9375 11.5078 5.9375 11.5352C5.69141 12 5.41797 12.4375 5.11719 12.875C5.08984 12.875 5.0625 12.9023 5.0625 12.875C3.61328 12.4375 2.24609 11.7539 1.04297 10.8516C1.01562 10.8516 1.01562 10.8242 1.01562 10.8242C0.742188 7.81641 1.31641 4.78125 3.39453 1.66406C3.39453 1.66406 3.39453 1.66406 3.42188 1.66406C4.46094 1.17188 5.55469 0.84375 6.67578 0.652344C6.70312 0.625 6.73047 0.652344 6.73047 0.652344C6.89453 0.925781 7.03125 1.22656 7.14062 1.5C8.37109 1.30859 9.60156 1.30859 10.832 1.5C10.9414 1.22656 11.0781 0.925781 11.2422 0.652344C11.2422 0.652344 11.2695 0.625 11.2969 0.652344C12.418 0.84375 13.5117 1.17188 14.5508 1.66406C14.5781 1.66406 14.5781 1.66406 14.5781 1.66406ZM6.32031 8.99219C7.11328 8.99219 7.76953 8.25391 7.76953 7.37891C7.76953 6.47656 7.14062 5.76562 6.32031 5.76562C5.52734 5.76562 4.87109 6.47656 4.87109 7.37891C4.87109 8.25391 5.52734 8.99219 6.32031 8.99219ZM11.6523 8.99219C12.4727 8.99219 13.1016 8.25391 13.1016 7.37891C13.1289 6.47656 12.4727 5.76562 11.6523 5.76562C10.8594 5.76562 10.2305 6.47656 10.2305 7.37891C10.2305 8.25391 10.8594 8.99219 11.6523 8.99219Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile">
                                    <a href="team-details.html" class="name">Sam Jones</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Team Section End Here =================-->


    <!--================= Gallery Section Start Here =================-->
    <div class="rts-gallery-section home-four">
        <div class="container">
            <div class="top-wrap">
                <div class="section-title-area section-title-area1">
                    <h1 class="title">MEDIA</h1>
                </div>
                <div class="filter-button-group">
                    <button class="filter-btn active" data-show=".home">ALL</button>
                    <button class="filter-btn" data-show=".highlights">HIGHLIGHTS</button>
                    <button class="filter-btn" data-show=".interview">INTERVIEWS</button>
                    <button class="filter-btn" data-show=".video">VIDEO</button>
                    <button class="filter-btn" data-show=".audio">AUDIO</button>
                </div>
            </div>
            <div class="filterd-items home">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="video-section-inner text-center">
                                    <div class="play-video">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post three">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two four">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterd-items highlights hide">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="video-section-inner text-center">
                                    <div class="play-video">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post three">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two four">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterd-items interview hide">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="video-section-inner text-center">
                                    <div class="play-video">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post three">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two four">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterd-items video hide">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="video-section-inner text-center">
                                    <div class="play-video">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post three">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two four">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterd-items audio hide">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item">
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="video-section-inner text-center">
                                    <div class="play-video">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=G4t6TqG5LM8"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">You're going to want to hop on
                                                    the Yandi bandwagon</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="item small-post three">
                                <span class="post-icon">
                                    <img src="assets/images/icons/volume.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item small-post two four">
                                <span class="post-icon">
                                    <img src="assets/images/icons/camera.svg" alt="">
                                </span>
                                <a href="blog-details.html" class="gallery-picture"></a>
                                <div class="contents-wrapper">
                                    <div class="contents text-start">
                                        <div class="d-block">
                                            <div class="heading d-flex">
                                                <p class="tag">HIGHLIGHTS</p>
                                            </div>
                                            <div class="gallery-title">
                                                <a href="blog-details.html">Clash of Titans in the Upcoming
                                                    Basketball Battle match</a>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <div class="content">
                                                <a href="blog-details.html" class="read-more">READ MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Gallery Section End Here =================-->


    <!--================= Sponsors Section Start Here =================-->
    <div class="rts-sponsors-section pt--100 pb--100">
        <div class="container">
            <div class="sponsors-section-inner">
                <div class="swiper rts-brandSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/7.png" alt="sponsor"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/8.png" alt="sponsor"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/9.png" alt="sponsor"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/10.png" alt="sponsor"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/11.png" alt="sponsor"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="sponsor-single">
                                <div class="sponsors-logo"><img src="assets/images/brands/12.png" alt="sponsor"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Sponsors Table Section End Here =================-->


    <!--================= Footer Start Here =================-->
    <div class="footer footer1 baseball">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-widget">
                            <div class="footer-logo"><img src="assets/images/logo3.png" alt="footer-logo">
                            </div>
                            <p class="footer-text">It was the end of a period in the 1980s
                                in which it seemed like every NBA Finals
                                matchup featured the Celtics sports club.</p>
                            <div class="social-links">
                                <a href="#0" class="platform"><i class="fab fa-facebook-f"></i></a>
                                <a href="#0" class="platform"><i class="fab fa-twitter"></i></a>
                                <a href="#0" class="platform"><i class="fab fa-behance"></i></a>
                                <a href="#0" class="platform"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title"> QUICK LINKS</h3>
                            <ul class="widget-items cata-widget">
                                <li class="widget-list-item"><a href="about.html">ABOUT CLUB</a></li>
                                <li class="widget-list-item"><a href="contact.html">CONTACTS</a></li>
                                <li class="widget-list-item"><a href="price-table.html">PRICE TABLE</a></li>
                                <li class="widget-list-item"><a href="shop.html">SHOP</a></li>
                                <li class="widget-list-item"><a href="our-players.html">OUR PLAYERS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget news-widget">
                            <h3 class="footer-widget-title"> POST GALLERY</h3>
                            <div class="recent-post">
                                <div class="picture"><a href="blog-details.html"><img
                                            src="assets/images/blog/small-post4.png" alt="side-post-image"></a></div>
                                <div class="content">
                                    <span class="news-date">June 21, 2023</span>
                                    <a href="blog-details.html" class="recent-post-title">A batter who's catches
                                        a pitch while batting</a>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="picture"><a href="blog-details.html"><img
                                            src="assets/images/blog/small-post5.png" alt="side-post-image"></a></div>
                                <div class="content">
                                    <span class="news-date">June 21, 2023</span>
                                    <a href="blog-details.html" class="recent-post-title">A batter who's catches
                                        a pitch while batting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget address-widget">
                            <h3 class="footer-widget-title"> GET IN TOUCH</h3>
                            <ul>
                                <li class="widget-list-item"><i class="fas fa-envelope-open"></i><a
                                        href="mailto:info@webmail.com">INFO@WEBMAIL.COM</a></li>
                                <li class="widget-list-item"><i class="fas fa-phone"></i><a href="tel:09877788890">098
                                        777
                                        888 90</a></li>
                                <li class="widget-list-item"><i class="fas fa-map-marker-alt"></i> <span>USA, CALIFORNIA
                                        20,
                                        FIRST <br>
                                        AVENUE, CALIFORNIA</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="bottom-area-inner">
                    <span class="copyright">COPYRIGHT & DESIGN BY <span
                            class="brand">KESTER</span>&nbsp;<?=date('Y') ?></span>
                    <div class="footer-bottom-links">
                        <a href="#">TERMS & CONDITONS</a>
                        <a href="#">FAQ</a>
                        <a href="#">CAREER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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