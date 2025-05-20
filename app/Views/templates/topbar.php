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
            <?php if(empty(session()->get('role'))):  ?>
            <?php if(empty(session()->get('loggedInUser'))): ?>
            <a href="<?=site_url('login')?>" class="login-btn">LOG IN</a>
            <a href="<?=site_url('sign-up')?>" class="sign-up-btn">SIGN UP</a>
            <?php else : ?>
            <a href="javascript:void(0);" class="login-btn"><?=session()->get('fullname')?></a>
            <a href="<?=site_url('sign-out')?>" class="sign-up-btn">Sign Out</a>
            <?php endif; ?>
            <?php else : ?>
            <?php if(empty(session()->get('loggedUser'))): ?>
            <a href="<?=site_url('login')?>" class="login-btn">LOG IN</a>
            <a href="<?=site_url('sign-up')?>" class="sign-up-btn">SIGN UP</a>
            <?php else : ?>
            <a href="javascript:void(0);" class="login-btn"><?=session()->get('fullname')?></a>
            <a href="<?=site_url('sign-out')?>" class="sign-up-btn">Sign Out</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>