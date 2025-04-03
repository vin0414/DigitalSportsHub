<div class="footer footer1 baseball">
    <div class="container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo"><img src="<?=base_url('assets/images/logo.jpg')?>" width="50" alt="footer-logo">
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
                            <li class="widget-list-item"><a href="<?=site_url('watch-now')?>">WATCH NOW</a></li>
                            <li class="widget-list-item"><a href="<?=site_url('contact-us')?>">CONTACTS</a></li>
                            <li class="widget-list-item"><a href="<?=site_url('latest-news')?>">LATEST NEWS</a></li>
                            <li class="widget-list-item"><a href="<?=site_url('shop-near-me')?>">SHOP NEAR ME</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="footer-widget news-widget">
                        <h3 class="footer-widget-title">LATEST NEWS</h3>
                        <?php
                        $newsModel = new \App\Models\newsModel();
                        $news = $newsModel->ORDERBY('news_id','DESC')->limit(2)->findAll();
                        foreach($news as $row){
                        ?>
                        <div class="recent-post">
                            <div class="picture"><a href="<?=site_url('latest-news/stories/')?><?php echo $row['topic'] ?>"><img
                                        src="<?=base_url('admin/images/news/')?><?php echo $row['image'] ?>" width="150" alt="side-post-image"></a></div>
                            <div class="content">
                                <span class="news-date"><?php echo date('M d, Y',strtotime($row['date'])) ?></span>
                                <a href="<?=site_url('latest-news/stories/')?><?php echo $row['topic'] ?>" class="recent-post-title">
                                    <?php echo substr($row['topic'],0,30) ?>...
                                </a>
                            </div>
                        </div>
                        <?php } ?>
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