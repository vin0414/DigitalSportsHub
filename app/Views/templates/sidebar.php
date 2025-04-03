<aside class="slide-bar">
    <div class="offset-sidebar">
        <button class="slide-bar-close ml--30"><i class="fa-solid fa-circle-xmark"></i></button>
        <div class="offset-widget offset-logo mb-30">
            <a href="<?=base_url('/')?>">
                <img src="<?=base_url('assets/images/logo.jpg')?>" alt="logo">
            </a>
            <hr />
            <?php if(!empty(session()->get('loggedInUser'))): ?>
            <a href="javascript:void(0);" class="login-btn text-white">Welcome, <?=session()->get('fullname')?></a>
            <?php endif; ?>
        </div>
    </div>
    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu side-mobile-menu1">
        <ul id="mobile-menu-active">
            <li class="has-dropdown firstlvl">
                <a class="mm-link" href="<?=base_url('/')?>">Home</a>
            </li>
            <li><a class="mm-link" href="<?=base_url('watch-now')?>">Watch Now</a></li>
            <li>
                <a class="mm-link" href="<?=site_url('latest-events')?>">Events</a>
            </li>
            <li>
                <a class="mm-link" href="<?=site_url('shop-near-me')?>">Shop Near Me</a>
            </li>
            <li>
                <a class="mm-link" href="<?=site_url('latest-news')?>">News</a>
            </li>
            <li><a class="mm-link" href="<?=site_url('contact-us')?>">Contact</a></li>
            <li>
                <?php if(empty(session()->get('loggedInUser'))): ?>
                <a href="<?=site_url('login')?>" class="login-btn">LOG IN</a>
                <a href="<?=site_url('sign-up')?>" class="sign-up-btn">SIGN UP</a>
                <?php else : ?>
                <a href="<?=site_url('sign-out')?>" class="sign-up-btn">Sign Out</a>
                <?php endif; ?>
            </li>
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