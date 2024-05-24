<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    @include('frontend.common.vertical_menu')
    <!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->

    <!-- ============================================== HOT DEALS ============================================== -->
    @include('frontend.common.hot_deals')
    <!-- ============================================== HOT DEALS: END ============================================== -->

    <!-- ============================================== SPECIAL OFFER ============================================== -->

    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Offer</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                <div class="item">
                    <div class="products special-product">

                        @foreach ($special_offer as $product)
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                        <img src="{{ asset($product->product_thambnail) }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $product->product_name_hin }}
                                                        @else
                                                            {{ $product->product_name_en }}
                                                        @endif
                                                    </a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price">
                                                        ${{ $product->selling_price }} </span> </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        @endforeach <!-- // end special offer foreach -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
    <!-- ============================================== PRODUCT TAGS ============================================== -->
    @include('frontend.common.product_tags')
    <!-- /.sidebar-widget -->
    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
    <!-- ============================================== SPECIAL DEALS ============================================== -->

    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Deals</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                <div class="item">
                    <div class="products special-product">
                        @foreach ($special_deals as $product)
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                        <img src="{{ asset($product->product_thambnail) }}"
                                                            alt="">
                                                    </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $product->product_name_hin }}
                                                        @else
                                                            {{ $product->product_name_en }}
                                                        @endif
                                                    </a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price">
                                                        ${{ $product->selling_price }}
                                                    </span> </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        @endforeach <!-- // end special deals foreach -->


                    </div>
                </div>

            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
    <!-- ============================================== NEWSLETTER ============================================== -->
    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
        <h3 class="section-title">Newsletters</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
            </form>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== NEWSLETTER: END ============================================== -->

    <!-- ============================================== Testimonials============================================== -->
    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
        <div id="advertisement" class="advertisement">
            <div class="item">
                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }}"
                        alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

            <div class="item">
                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}"
                        alt="Image"></div>
                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->

            <div class="item">
                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member2.png') }}"
                        alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

        </div>
        <!-- /.owl-carousel -->
    </div>

    <!-- ============================================== Testimonials: END ============================================== -->

    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
    </div>
</div>
