@include('member/includes/header')
    <link rel="stylesheet" href="{{ asset('blog/css/style.css')}}" type="text/css">
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tin Tức Về VENUS</h2>
                        <div class="breadcrumb__option">
                            <a href="../index.html">Home </a>
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
                                    <img src="{{ asset('blog/img/store.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Sep 16,2023</li>
                                    
                                    </ul>
                                    <h5><a href="#">Các cửa hàng kính mắt VENUS mở cửa lúc mấy giờ?</a></h5>
                                    <p>Nhiều khách hàng vẫn chưa rõ thời gian hoạt động hàng ngày của Kính mắt VENUS. Hãy cùng tìm hiểu để ghé thăm chúng mình nhé!</p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                                       
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="tintucveVENUS.html">1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Js Plugins -->
    <script src="js/bootstrap.min.js"></script>
    @include('member/includes/footer')