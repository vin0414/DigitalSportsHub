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
        border: 1px solid #000;
        border-radius: 10px;
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
                                <a href="<?=site_url('videos')?>"
                                    class="btn btn-primary btn-5 d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <i class="ti ti-arrow-left"></i> Back
                                </a>
                                <a href="<?=site_url('go-live')?>" class="btn btn-primary btn-6 d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <i class="ti ti-arrow-left"></i>
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title"><?=$title?></div>
                                    <div class="row g-2">
                                        <div class="col-lg-12">
                                            <video id="local" autoplay muted width="100%" controls>
                                            </video>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-primary" onclick="start(this)">
                                                <i class="ti ti-player-play"></i>&nbsp;Start
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="stop(this)">
                                                <i class="ti ti-player-stop"></i>&nbsp;Stop
                                            </button>
                                            <button type="button" class="btn btn-secondary">
                                                <i class="ti ti-download"></i>&nbsp;Download
                                            </button>
                                            <button type="button" class="btn btn-danger" id="stream"
                                                onclick="stream(this)" disabled>
                                                <i class="ti ti-building-broadcast-tower"></i>&nbsp;Live
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Upcoming Matches</div>
                                </div>
                                <div class="position-relative">
                                    <?php if(empty($matches)): ?>
                                    <div style="padding:5px;margin:5px;">No Incoming Match(es) Yet</div>
                                    <?php else : ?>
                                    <?php endif; ?>
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
    const local = document.querySelector("video#local");
    let peerConnection;
    const channel = new BroadcastChannel("stream-video");
    channel.onmessage = e => {
        if (e.data.type === "icecandidate") {
            peerConnection?.addIceCandidate(e.data.candidate);
        } else if (e.data.type === "answer") {
            console.log("Received answer")
            peerConnection?.setRemoteDescription(e.data);
        }
    }
    // function to ask for camera and microphone permission
    // and stream to #local video element
    function start(e) {
        e.disabled = true;
        document.getElementById("stream").disabled = false; // enable the stream button
        navigator.mediaDevices.getUserMedia({
                audio: true,
                video: true
            })
            .then((stream) => local.srcObject = stream);
    }

    function stream(e) {
        e.disabled = true;

        const config = {};
        peerConnection = new RTCPeerConnection(config); // local peer connection

        // add ice candidate event listener
        peerConnection.addEventListener("icecandidate", e => {
            let candidate = null;

            // prepare a candidate object that can be passed through browser channel
            if (e.candidate !== null) {
                candidate = {
                    candidate: e.candidate.candidate,
                    sdpMid: e.candidate.sdpMid,
                    sdpMLineIndex: e.candidate.sdpMLineIndex,
                };
            }
            channel.postMessage({
                type: "icecandidate",
                candidate
            });
        });

        // add media tracks to the peer connection
        local.srcObject.getTracks()
            .forEach(track => peerConnection.addTrack(track, local.srcObject));

        // Create offer and send through the browser channel
        peerConnection.createOffer({
                offerToReceiveAudio: true,
                offerToReceiveVideo: true
            })
            .then(async offer => {
                await peerConnection.setLocalDescription(offer);
                console.log("Created offer, sending...");
                channel.postMessage({
                    type: "offer",
                    sdp: offer.sdp
                });
            });
    }
    </script>
</body>

</html>