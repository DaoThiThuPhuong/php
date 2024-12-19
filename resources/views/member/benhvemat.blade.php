@include('member/includes/header')
    <link rel="stylesheet" href="{{ asset('blog/css/style.css')}}" type="text/css">
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bệnh Về Mắt</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
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
                                    <img src="{{ asset('blog/img/thuocnhomat.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Sep 23,2023</li>
                                
                                    </ul>
                                    <h5><a href="#">Top 8 loại thuốc nhỏ mắt tốt cho mắt cận bạn cần biết</a></h5>
                                    <p>Kính là một trong những phụ kiện quen thuộc trong đời sống của mỗi người nhưng chưa chắc mọi người đều biết về chất liệu gọng kính.  </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('blog/img/thucphamtot.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>On Sep 1,2023</li>
                                       
                                    </ul>
                                    <h5><a href="#">Top 9 thực phẩm chứa vitamin tốt cho mắt của bạn</a></h5>
                                    <p>Hãy để Kính mắt VENUS liệt kê các loại vitamin tốt cho mắt để bạn có thể kịp thời bổ sung cho cơ thể mỗi ngày nhé!</p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="/benhvemat">1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
	<script src="{{ asset('blog/js/bootstrap.min.js')}}"></script>
	@include('member/includes/footer')