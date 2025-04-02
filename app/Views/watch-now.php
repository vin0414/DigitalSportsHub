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
                                <?php if(!empty($game)): ?>
                                <span class="tag">LIVE</span>
                                <?php
                                $teamModel = new \App\Models\teamModel();
                                $team1 = $teamModel->WHERE('team_id',$game['team1_id'])->first();
                                $team2 = $teamModel->WHERE('team_id',$game['team2_id'])->first();      
                                ?>
                                <div class="live-match"><?=$team1['team_name']?> <span>VS</span>
                                    <?=$team2['team_name']?></div>
                                <?php endif; ?>
                            </div>
                            <div class="top-bar-right">
                                <a href="<?=site_url('login')?>" class="login-btn">LOG IN</a>
                                <a href="<?=site_url('register')?>" class="sign-up-btn">SIGN UP</a>
                            </div>
                        </div>
                    </div>
                    <?=view('templates/header')?>
                </div>
            </div>
        </div>

        <!--================= Slide Bar Start Here =================-->
        <?=view('templates/sidebar')?>
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


    <!--================= Gallery Section Start Here =================-->
    <div class="rts-gallery-section home-four">
        <div class="container">
            <div class="top-wrap">
                <div class="section-title-area section-title-area1">
                    <h1 class="title">LIVE STREAMING</h1>
                </div>
            </div>
            <div class="filterd-items home">
                <div class="gallery-grid">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="item">
                                <video id="remote" autoplay controls></video>
                                <?php if(!empty($game)): ?>
                                <span class="tag text-danger">LIVE</span> <?=$team1['team_name']?> <span>VS</span>
                                <?=$team2['team_name']?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Gallery Section End Here =================-->


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
    <script>
    const remote = document.querySelector("video#remote");
    let peerConnection;

    const channel = new BroadcastChannel("stream-video");
    channel.onmessage = e => {
        if (e.data.type === "icecandidate") {
            peerConnection?.addIceCandidate(e.data.candidate)
        } else if (e.data.type === "offer") {
            console.log("Received offer")
            handleOffer(e.data)
        }
    }

    function handleOffer(offer) {
        const config = {};
        peerConnection = new RTCPeerConnection(config);
        peerConnection.addEventListener("track", e => remote.srcObject = e.streams[0]);
        peerConnection.addEventListener("icecandidate", e => {
            let candidate = null;
            if (e.candidate !== null) {
                candidate = {
                    candidate: e.candidate.candidate,
                    sdpMid: e.candidate.sdpMid,
                    sdpMLineIndex: e.candidate.sdpMLineIndex,
                }
            }
            channel.postMessage({
                type: "icecandidate",
                candidate
            })
        });
        peerConnection.setRemoteDescription(offer)
            .then(() => peerConnection.createAnswer())
            .then(async answer => {
                await peerConnection.setLocalDescription(answer);
                console.log("Created answer, sending...")
                channel.postMessage({
                    type: "answer",
                    sdp: answer.sdp,
                });
            });
    }
    </script>
</body>

</html>