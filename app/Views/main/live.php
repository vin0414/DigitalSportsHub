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
                                            <button type="button" id="start" class="btn btn-primary" onclick="start(this)">
                                                <i class="ti ti-player-play"></i>&nbsp;Start
                                            </button>
                                            <button type="button" class="btn btn-primary" id="stopStream" onclick="stopStream()" disabled>
                                                <i class="ti ti-player-stop"></i>&nbsp;Stop
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
                                    <div class="card-title">Upcoming Match</div>
                                </div>
                                <div class="position-relative">
                                    <?php if(empty($match)): ?>
                                    <div style="padding:5px;margin:5px;">No Incoming Match(es) Yet</div>
                                    <?php else : ?>
                                        <?php if($match): ?>
                                            <?php
                                            $teamModel = new \App\Models\teamModel();
                                            $team1 = $teamModel->WHERE('team_id',$match['team1_id'])->first();
                                            $team2 = $teamModel->WHERE('team_id',$match['team2_id'])->first();
                                            ?>
                                            <div class="row" style="margin:10px;padding:10px;">
                                                <div class="col-lg-5">
                                                    <span style="font-size: 1.2rem;"><center><?=$team1['team_name']?></center></span>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="text-center bg-danger text-white">VS</p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <span style="font-size: 1.2rem;"><center><?=$team2['team_name']?></center></span>
                                                </div>
                                                <center><small><?=date('M d, Y',strtotime($match['date']))?> | <?=date('h:i A',strtotime($match['time']))?> | <?php echo $match['location'] ?></small></center>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br/>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Current Match</div>
                                </div>
                                <div class="card-body">
                                    <?php if(empty($game)): ?>
                                    <div style="padding:5px;margin:5px;">No Current Match(es) Yet</div>
                                    <?php else : ?>
                                    <?php
                                    $teamModel = new \App\Models\teamModel();
                                    $team1 = $teamModel->WHERE('team_id',$game['team1_id'])->first();
                                    $team2 = $teamModel->WHERE('team_id',$game['team2_id'])->first();      
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <span style="font-size: 1.0rem;"><center><?=$team1['team_name']?></center></span>
                                            <h1 class="text-center" id="home">0</h1>
                                        </div>
                                        <div class="col-lg-2">
                                            <p class="text-center bg-danger text-white">VS</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <span style="font-size: 1.0rem;"><center><?=$team2['team_name']?></center></span>
                                            <h1 class="text-center" id="guest">0</h1>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <button type="button" class="btn btn-primary add_team1" value="<?=$team1['team_id']?>"><i class="ti ti-plus"></i>&nbsp;Add</button>
                                                    <button type="button" class="btn btn-danger minus_team1" value="<?=$team1['team_id']?>"><i class="ti ti-minus"></i>&nbsp;Minus</button>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="button" class="btn btn-primary add_team2" value="<?=$team2['team_id']?>"><i class="ti ti-plus"></i>&nbsp;Add</button>
                                                    <button type="button" class="btn btn-danger minus_team2" value="<?=$team2['team_id']?>"><i class="ti ti-minus"></i>&nbsp;Minus</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($game['status']==1): ?>
                                        <div class="col-lg-12">
                                            <button type="button" class="form-control btn btn-primary endGame" value="<?=$game['match_id']?>">
                                                <i class="ti ti-square-rounded-x"></i>&nbsp;End Game
                                            </button>
                                        </div>
                                        <?php endif; ?>
                                    </div>
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
        $(document).ready(function(){
            guest();home();
        });
        $(document).on('click','.endGame',function(){
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to end this match?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
                }).then((result) => {
                if (result.isConfirmed) 
                {
                    stopStream();
                    let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
                    $.ajax({
                        url:"<?=site_url('end-game')?>",
                        method:"POST",data:{match:match},
                        success:function(response)
                        {
                            if(response.success){location.reload();}else{Swal.fire({title: 'Warning!',text: response,icon: 'warning'});}
                        }
                    });
                }
            });
        });
        function guest()
        {
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            let team = <?= isset($game['team2_id']) ? $game['team2_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('team2-score')?>",
                method:"GET",data:{match:match,team:team},
                success:function(response)
                {
                    $('#guest').html(response);
                }
            });
        }
        function home()
        {
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            let team = <?= isset($game['team1_id']) ? $game['team1_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('team1-score')?>",
                method:"GET",data:{match:match,team:team},
                success:function(response)
                {
                    $('#home').html(response);
                }
            });
        } 
        //team 1
        $(document).on('click','.add_team1',function(){
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('add-score-team-1')?>",
                method:"POST",
                data:{match:match,team:$(this).val()},
                success:function(response)
                {
                    if(response.success){home();}else{Swal.fire({title: 'Warning!',text: response,icon: 'warning'});}
                }
            });
        });
        $(document).on('click','.minus_team1',function(){
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('minus-score-team-1')?>",
                method:"POST",
                data:{match:match,team:$(this).val()},
                success:function(response)
                {
                    if(response.success){home();}else{Swal.fire({title: 'Warning!',text: response,icon: 'warning'});}
                }
            });
        });
        //team 2
        $(document).on('click','.add_team2',function(){
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('add-score-team-2')?>",
                method:"POST",
                data:{match:match,team:$(this).val()},
                success:function(response)
                {
                    if(response.success){guest();}else{Swal.fire({title: 'Warning!',text: response,icon: 'warning'});}
                }
            });
        });
        $(document).on('click','.minus_team2',function(){
            let match = <?= isset($game['match_id']) ? $game['match_id'] : 0; ?>;
            $.ajax({
                url:"<?=site_url('minus-score-team-2')?>",
                method:"POST",
                data:{match:match,team:$(this).val()},
                success:function(response)
                {
                    if(response.success){guest();}else{Swal.fire({title: 'Warning!',text: response,icon: 'warning'});}
                }
            });
        });
    </script>
    <script>
    const local = document.querySelector("video#local");
    let peerConnection;
    const channel = new BroadcastChannel("stream-video");
    let mediaRecorder;
    let recordedChunks = [];

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
        document.getElementById("stopStream").disabled = false;
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
        startRecording(local.srcObject);
    }

    function startRecording(stream) {
        recordedChunks = []; // Reset the chunks array

        // Create a new MediaRecorder for the stream
        mediaRecorder = new MediaRecorder(stream);

        // When data is available, push it into the recordedChunks array
        mediaRecorder.ondataavailable = (event) => {
            recordedChunks.push(event.data);
        };

        // When recording stops, create a downloadable link
        mediaRecorder.onstop = () => {
            const blob = new Blob(recordedChunks, { type: 'video/webm' });
            const url = URL.createObjectURL(blob);
            const downloadLink = document.createElement('a');
            downloadLink.href = url;
            downloadLink.download = 'streamed_video.webm'; // Set a default filename
            document.body.appendChild(downloadLink); // Append to the body
            downloadLink.click(); // Trigger download
            document.body.removeChild(downloadLink); // Clean up
        };

        // Start recording
        mediaRecorder.start();
        console.log("Recording started...");
    }

    function stopStream() {
        const stream = local.srcObject;
        document.getElementById("stream").disabled = true;
        document.getElementById("start").disabled = false;
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            console.log("Recording stopped...");
        }

        if (stream) {
            // Stop all tracks in the stream
            stream.getTracks().forEach(track => track.stop());
        }

        // Close the peer connection
        if (peerConnection) {
            peerConnection.close();
            peerConnection = null;
        }

        // Disable the stop stream button and enable start/continue stream button
        document.getElementById("stopStream").disabled = true;
        document.getElementById("stream").disabled = false;
    }
    </script>
</body>

</html>