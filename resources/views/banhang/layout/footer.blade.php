<div id="footer" class="color-div">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Instagram Feed</h4>
                    <div id="beta-instagram-feed"><div></div></div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="widget">
                    <h4 class="widget-title">Information</h4>
                    <div>
                        <ul>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Web Design</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Web Development</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Marketing</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Tips</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Resources</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="widget">
                        <h4 class="widget-title">Contact Us</h4>
                        <div>
                            <div class="contact-info">
                                <i class="fa fa-map-marker"></i>
                                <p>90-92 Lê Thị Riêng, Bến Thành, Quận 1 - Phone: 0163 296 7751</p>
                                <p>Chúng tôi luôn sẵn sàng phục vụ bạn với những sản phẩm chất lượng nhất.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Newsletter Subscribe</h4>
                    <form action="#" method="post">
                        @csrf
                        <input type="email" name="your_email" placeholder="Nhập email của bạn...">
                        <button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
                    </form>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- #footer -->

<div class="copyright">
    <div class="container">
        <p class="pull-left">Privacy policy. (&copy;) {{ date('Y') }}</p>
        <p class="pull-right pay-options">
            <a href="#"><img src="{{ asset('assets/dest/images/pay/master.jpg') }}" alt="Master Card" /></a>
            <a href="#"><img src="{{ asset('assets/dest/images/pay/pay.jpg') }}" alt="Pay" /></a>
            <a href="#"><img src="{{ asset('assets/dest/images/pay/visa.jpg') }}" alt="Visa" /></a>
            <a href="#"><img src="{{ asset('assets/dest/images/pay/paypal.jpg') }}" alt="PayPal" /></a>
        </p>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .copyright -->
