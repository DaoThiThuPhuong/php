@include('member/includes/header')
    <link rel="stylesheet" href="{{ asset('blog/css/style.css')}}" type="text/css">
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Kiến Thức Chung</h2>
                        <div class="breadcrumb__option">
                            <a href="index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="/tintucveVENUS">Tin tức về VENUS</a></li>
                                <li><a href="/goctuvan">Góc tư vấn</a></li>
                                <li><a href="/benhvemat">Bệnh về mắt</a></li>
                                <li><a href="/kienthucchung">Kiến thức chung</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('blog/img/blog/lens.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Dec 22,2023</li>
                               
                                    </ul>
                                    <h5><a href="blog-details1.html">Có nên đeo kính áp tròng thay kính cận không</a></h5>
                                    <p>Có những băn khoăn về kính áp tròng, rằng: có đeo thay kính cận được không, đeo tối đa bao lâu, đeo làm sao để không ảnh hưởng đến mắt? </p>
                                    <a href="blog-details1.html" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('blog/img/blog/kinhsaido.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Dec 12,2023</li>
                                    
                                    </ul>
                                    <h5><a href="#">Đeo kính sai độ có ảnh hưởng đến mắt không?</a></h5>
                                    <p>Có một số ít người cho rằng: chỉ là kính thôi mà, nhìn rõ là ổn, đeo loại nào chẳng được. Đây là sai lầm và ấn chứa nhiều hệ lụy phía sau. </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>             
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('blog/img/kinh ko do.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Nov 6,2023</li>
                               
                                    </ul>
                                    <h5><a href="#">Đeo kính không độ có hại mắt không?</a></h5>
                                    <p>Kính mắt 0 độ đang ngày càng được phổ biến và trở thành trào lưu thời trang của các bạn trẻ.nhiều người vẫn thắc mắc, liệu đeo kính không độ có hại mắt không? </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('blog/img/kinh ram trang.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Oct 04 22,2023</li>
                                     
                                    </ul>
                                    <h5><a href="#">Điều Bạn Chưa Biết Về Kính Râm Có Độ Cận</a></h5>
                                    <p>Kính râm có độ cận được ra đời nhằm đáp ứng nhu cầu đa dạng của người dùng. VENUS sẽ giúp bạn tìm hiểu kỹ hơn về dòng kính này.</p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div> 
                        </div>  
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="kienthucchung.html">1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('blog/js/bootstrap.min.js"></script>
    @include('member/includes/footer')
