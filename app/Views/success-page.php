
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.1.1
* @link https://tabler.io
* Copyright 2018-2025 The Tabler Authors
* Copyright 2018-2025 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/logo.jpg')?>">
    <title>Digital Sports Hub - Success</title>
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
    <script src="./preview/js/demo-theme.min.js?1740838744"></script>
    <!-- END DEMO THEME SCRIPT -->
    <div class="page page-center">
      <div class="container container-tight py-4">
        <form class="card card-md" method="get" autocomplete="off" novalidate>
          <div class="card-body">
            <h2 class="card-title card-title-lg text-center mb-4">Account Verification</h2>
            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon alert-icon icon-2"
                    >
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <div>Your account has been created!</div>
            </div>
            <p class="my-4 text-center">
                To get all the good stuff, please activate your account.
                You can do this using the activation link we have emailed to your inbox. If you have
                not received it please check your spam folder or use the button below to resend
                the activation link.
            </p>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">It may take a minute to receive your code. Haven't received it? <a href="<?=site_url('/resend/')?><?=$token?>">Resend a new code.</a></div>
      </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="./dist/js/tabler.min.js?1740838744" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="./preview/js/demo.min.js?1740838744" defer></script>
    <!-- END DEMO SCRIPTS -->
    <!-- BEGIN PAGE SCRIPTS -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var inputs = document.querySelectorAll("[data-code-input]");
        // Attach an event listener to each input element
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].addEventListener("input", function (e) {
            // If the input field has a character, and there is a next input field, focus it
            if (e.target.value.length === e.target.maxLength && i + 1 < inputs.length) {
              inputs[i + 1].focus();
            }
          });
          inputs[i].addEventListener("keydown", function (e) {
            // If the input field is empty and the keyCode for Backspace (8) is detected, and there is a previous input field, focus it
            if (e.target.value.length === 0 && e.keyCode === 8 && i > 0) {
              inputs[i - 1].focus();
            }
          });
        }
      });
    </script>
    <!-- END PAGE SCRIPTS -->
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"92ae6a4eaac98965","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.3.0","token":"84cae67e72b342399609db8f32d1c3ff"}' crossorigin="anonymous"></script>
</body>
</html>
