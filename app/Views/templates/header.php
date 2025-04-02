<div class="navbar-inner">
    <a href="<?=base_url('/')?>" class="logo">
        <img src="assets/images/logo.jpg" width="50" alt="sportius-logo"></a>
    <a href="<?=base_url('/')?>" class="logo-sticky">
        <img src="assets/images/logo.jpg" width="50" alt="kester-logo"></a>
    <div class="rts-menu">
        <nav class="menus menu-toggle">
            <ul class="nav__menu">
                <li class="has-dropdown">
                    <a class="menu-item <?= ($title == 'Home') ? 'active1' : '' ?>" href="<?=base_url('/')?>">Home</a>
                </li>
                <li><a class="menu-item <?= ($title == 'Watch') ? 'active1' : '' ?>" href="<?=base_url('watch-now')?>">Watch</a></li>
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
    <a class="hamburger-menu aitem d-block">
        <div class="hamburger-menu-inner">
            <span></span>
            <span class=""></span>
            <span></span>
        </div>
    </a>
</div>