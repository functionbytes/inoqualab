<footer id="footer-3" class="pt-100 footer">
    <div class="container">


        <!-- FOOTER CONTENT -->
        <div class="row">

            <div class="col-xl-3">
                <div class="footer-info">
                    <img class="footer-logo" src="/pages/images/logo-blue.svg" alt="footer-logo">
                </div>
            </div>

            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-1">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Company</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li><p><a href="about.html">About Us</a></p></li>
                        <li><p><a href="careers.html">Careers</a></p></li>
                        <li><p><a href="blog-listing.html">Our Blog</a></p></li>
                        <li><p><a href="contacts.html">Contact Us</a></p></li>
                    </ul>

                </div>
            </div>	<!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-2">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Product</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li><p><a href="features.html">Integration</a></p></li>
                        <li><p><a href="reviews.html">Customers</a></p></li>
                        <li><p><a href="pricing-1.html">Pricing</a></p></li>
                        <li><p><a href="help-center.html">Help Center</a></p></li>
                    </ul>

                </div>
            </div>	<!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-md-3 col-xl-2">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Legal</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li><p><a href="terms.html">Terms of Use</a></p></li>
                        <li><p><a href="privacy.html">Privacy Policy</a></p></li>
                        <li><p><a href="cookies.html">Cookie Policy</a></p></li>
                        <li><p><a href="#">Site Map</a></p></li>
                    </ul>

                </div>
            </div>	<!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-6 col-md-3">
                <div class="footer-links fl-4">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Conéctate con nosotros</h6>

                    <!-- Mail Link -->
                    <p class="footer-mail-link ico-25">
                        <a href="mailto:yourdomain@mail.com">info@functionbytes.com</a>
                    </p>

                    <ul class="footer-socials ico-25 text-center clearfix">

                        @if (setting('social_media_facebook')!=null)
                            <li><a href="{{ setting('social_media_facebook') }}"><span class="flaticon-facebook"></span></a></li>
                        @endif
                        @if (setting('social_media_instagram')!=null)
                            <li><a href="{{ setting('social_media_instagram') }}"><span class="flaticon-instagram"></span></a></li>
                        @endif
                        @if (setting('social_media_twitter')!=null)
                            <li><a href="{{ setting('social_media_twitter') }}"><span class="flaticon-twitter"></span></a></li>
                        @endif
                        @if (setting('social_media_linkedin')!=null)
                                <li><a href="{{ setting('social_media_linkedin') }}"><span class="flaticon-linkedin-logo"></span></a></li>
                        @endif
                    </ul>

                </div>
            </div>


        </div>	<!-- END FOOTER CONTENT -->


        <hr>	<!-- FOOTER DIVIDER LINE -->


        <!-- BOTTOM FOOTER -->
        <div class="bottom-footer">
            <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


                <!-- FOOTER COPYRIGHT -->
                <div class="col">
                    <div class="footer-copyright"><p class="p-sm">© 2023 Martex. <span>All Rights Reserved</span></p></div>
                </div>


                <!-- FOOTER SECONDARY LINK -->
                <div class="col">
                    <div class="bottom-secondary-link ico-15 text-end">
                        <p class="p-sm"><a href="https://themeforest.net/user/dsathemes/portfolio">Made with
                                <span class="flaticon-heart color--pink-400"></span> by @DSAThemes</a>
                        </p>
                    </div>
                </div>


            </div>  <!-- End row -->
        </div>	<!-- END BOTTOM FOOTER -->


    </div>     <!-- End container -->
</footer>
