<div class="navbar-inner">
    <a href="<?=base_url('/')?>" class="logo">
        <img src="<?=base_url('assets/images/logo.jpg')?>" width="50" alt="sportius-logo"></a>
    <a href="<?=base_url('/')?>" class="logo-sticky">
        <img src="<?=base_url('assets/images/logo.jpg')?>" width="50" alt="kester-logo"></a>
    <div class="rts-menu">
        <nav class="menus menu-toggle">
            <ul class="nav__menu">
                <li class="has-dropdown">
                    <a class="menu-item <?= ($title == 'Home') ? 'active1' : '' ?>" href="<?=base_url('/')?>">Home</a>
                </li>
                <li><a class="menu-item <?= ($title == 'Watch') ? 'active1' : '' ?>" href="<?=base_url('watch-now')?>">Watch Now</a></li>
                <li>
                    <a class="menu-item <?= ($title == 'Events') ? 'active1' : '' ?>" href="<?=site_url('latest-events')?>">Events</a>
                </li>
                <li>
                    <a class="menu-item <?= ($title == 'Shop') ? 'active1' : '' ?>" href="<?=site_url('shop-near-me')?>">Shop near me</a>
                </li>
                <li>
                    <a class="menu-item <?= ($title == 'News') ? 'active1' : '' ?>" href="<?=site_url('latest-news')?>">News</a>
                </li>
                <li><a class="menu-item <?= ($title == 'Contact Us') ? 'active1' : '' ?>" href="<?=site_url('contact-us')?>">Contact</a></li>
            </ul>
        </nav>
    </div>
    <a class="hamburger-menu aitem d-block">
        <div class="hamburger-menu-inner">
            <span></span>
            <span class=""></span>
            <span></span>
        </div>
    </a>
</div>