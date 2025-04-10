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
    <style>
        .ad-container {
            display: flex;
            justify-content: start;  /* Align ads to the left */
            overflow: hidden;  /* Hide ads when they are outside the container */
            width: 100%;  /* Full width of the container */
            position: relative;
            }

            .ad {
                width: 300px;  /* Set each ad's width */
                height: 250px;  /* Set each ad's height */
                flex-shrink: 0;  /* Prevent the ads from shrinking */
                animation: slideIn 12s infinite; /* Apply the sliding animation to each ad */
                margin-right: 20px;  /* Space between ads */
            }

            .ad img {
                width: 100%;  /* Make the image take up the full width of the container */
                height: 100%;  /* Make the image fill the height of the container */
                object-fit: cover;  /* Ensure the image covers the area without distorting */
                border-radius: 8px;
                display: block;
                border: 1px solid #ddd;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            /* Keyframes for scrolling each ad one by one */
            @keyframes slideIn {
            0% {
                transform: translateX(100%);  /* Start off-screen to the right */
            }
            10%, 20% {
                transform: translateX(0);  /* Slide to visible area */
            }
            40%, 50% {
                transform: translateX(0);  /* Stay visible for a while */
            }
            60%, 100% {
                transform: translateX(-100%);  /* Move to the left, completely off-screen */
            }
            }

            /* Delaying animations for each ad */
            .ad:nth-child(1) {
            animation-delay: 0s;
            }

            .ad:nth-child(2) {
            animation-delay: 4s;  /* Start second ad after 4 seconds */
            }

            .ad:nth-child(3) {
            animation-delay: 8s;  /* Start third ad after 8 seconds */
            }
    </style>
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
                                <li><a class="current-page" href="#"><?=$title?></a></li>
                            </ul>
                        </div>
                        <h1 class="banner-heading">Watch Now</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Banner Section End Here =================-->

    </header>
    <!--================= Header Section End Here =================-->


    <!--================= Gallery Section Start Here =================-->
    <div class="news-feed-section section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-md-8"> 
                    <div class="item">
                        <video id="remote" width="100%" autoplay controls></video>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="widget-sub-title2 fs-20">Our Sponsors</h4>
                        </div>
                        <div class="card-body">
                            <div class="ad-container">
                                <?php foreach($ads as $row): ?>
                                <div class="ad">
                                    <img src="<?=base_url('admin/images/ads/')?><?=$row['image_url']?>" alt="Ad 1">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="ti ti-calendar-week"></i>&nbsp;Recent Videos
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(empty($recent)): ?>
                            <div style="padding:5px;margin:5px;">No video(s) Has Been Added Yet</div>
                            <?php else : ?>
                            <?php foreach($recent as $row): ?>
                            <div class="row">
                                <div class="col-5">
                                    <video src="<?=base_url('admin/videos/')?><?=$row['file']?>"
                                        class="w-100 h-100 object-cover card-img-start"
                                        alt="<?=$row['file_name'] ?>"></video>
                                </div>
                                <div class="col-7">
                                    <a href="<?=site_url('videos/play/')?><?=$row['Token']?>">
                                    <b><?=substr($row['file_name'],0,25) ?></b>...
                                    </a><br />
                                    <small><?=$row['sportName']?></small>
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
    <!--================= Gallery Section End Here =================-->


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