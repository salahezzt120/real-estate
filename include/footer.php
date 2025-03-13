<footer class="full-row bg-secondary p-0">
    <div class="container">
        <div  class="row">
            <div class="col-lg-12">
                <div class="divider py-40">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="footer-widget mb-4">
                                <div class="footer-logo mb-4"> 
                                    <a href="#"><img class="logo-bottom" src="images/logo/2.png" alt="image"></a> 
                                </div>
                                <p class="pb-20 text-white">
                                    <?php echo $translations['footer_description']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget footer-nav mb-4">
                                        <h4 class="widget-title text-white double-down-line-left position-relative">
                                            <?php echo $translations['support']; ?>
                                        </h4>
                                        <ul class="hover-text-primary">
                                            <li><a href="#" class="text-white"><?php echo $translations['forum']; ?></a></li>
                                            <li><a href="#" class="text-white"><?php echo $translations['terms_conditions']; ?></a></li>
                                            <li><a href="#" class="text-white"><?php echo $translations['faq']; ?></a></li>
                                            <li><a href="contact.php" class="text-white"><?php echo $translations['contact']; ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget footer-nav mb-4">
                                        <h4 class="widget-title text-white double-down-line-left position-relative">
                                            <?php echo $translations['quick_links']; ?>
                                        </h4>
                                        <ul class="hover-text-primary">
                                            <li><a href="about.php" class="text-white"><?php echo $translations['about_us']; ?></a></li>
                                            <li><a href="#" class="text-white"><?php echo $translations['featured_property']; ?></a></li>
                                            <li><a href="#" class="text-white"><?php echo $translations['submit_property']; ?></a></li>
                                            <li><a href="agent.php" class="text-white"><?php echo $translations['our_agents']; ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="footer-widget">
                                        <h4 class="widget-title text-white double-down-line-left position-relative">
                                            <?php echo $translations['contact_us']; ?>
                                        </h4>
                                        <ul class="text-white">
                                            <li class="hover-text-primary"><i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i><?php echo $translations['address']; ?></li>
                                            <li class="hover-text-primary"><i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i><?php echo $translations['phone_1']; ?></li>
                                            <li class="hover-text-primary"><i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i><?php echo $translations['phone_2']; ?></li>
                                            <li class="hover-text-primary"><i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i><?php echo $translations['email']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="footer-widget media-widget mt-4 text-white hover-text-primary"> 
                                        <a href="#"><i class="fab fa-facebook-f"></i></a> 
                                        <a href="#"><i class="fab fa-twitter"></i></a> 
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a> 
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                                        <a href="#"><i class="fas fa-rss"></i></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-sm-6"> 
                <span class="text-white">© <?php echo date('Y');?> <?php echo $translations['footer_copy']; ?> - <?php echo $translations['developed_by']; ?></span> 
            </div>
            <div class="col-sm-6">
                <ul class="line-menu text-white hover-text-primary float-right">
                    <li><a href="#"><?php echo $translations['privacy_policy']; ?></a></li>
                    <li>|</li>
                    <li><a href="#"><?php echo $translations['site_map']; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
