@include('member/includes/header')
    <link rel="stylesheet" href="{{ asset('blog/css/style.css')}}" type="text/css">
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Góc Tư Vấn</h2>
						<div class="breadcrumb__option">
							<a href="/index.html">Home</a>
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
								<div class="blog__item">
									<div class="blog__item__pic">
										<img src="{{ asset('blog/img/blog/sidebar/matkimcuong1.jpg')}}" alt="">
									</div>
									<div class="blog__item__text">
										<ul>
											<li><i class="fa fa-calendar-o"></i>On Dec 5,2023</li>
										
										</ul>
										<h5><a href="#">Mặt kim cương đeo kính gì phù hợp nhất?</a></h5>
										<p> Gương mặt kim cương là kiểu khuôn mặt khá kén kiểu tóc, phụ kiện và đặt biệt
											là các loại gọng kính mắt. Vậy loại gọng kính nào phù hợp nhất với gương mặt
											kim cương?</p>
										<a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="blog__item">
								<div class="blog__item__pic">
									<img src="{{ asset('blog/img/blog/sidebar/gongkinhnu.jpg')}}" alt="">
								</div>
								<div class="blog__item__text">
									<ul>
										<li><i class="fa fa-calendar-o"></i>On Nov 26,2023</li>
									
									</ul>
									<h5><a href="#">Các loại gọng kính cận nữ được ưa chuộng nhất</a></h5>
									<p>Kính cận không chỉ giúp khắc phục tình trạng về thị lực cho mắt mà còn mang tính
										thẩm mỹ. Tuy nhiên, nhiều bạn gái vẫn chưa chọn được gọng kính phù hợp.</p>
									<a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
								</div>
							</div>
						</div>
						div class="col-lg-6 col-md-6 col-sm-6">
						<div class="blog__item">
							<div class="blog__item__pic">
								<img src="{{ asset('blog/img/blog/sidebar/gongkinhlambangchatlieuj.jpg')}}" alt="">
							</div>
							<div class="blog__item__text">
								<ul>
									<li><i class="fa fa-calendar-o"></i>On Nov 14,2023</li>
								
								</ul>
								<h5><a href="#">Gọng kính làm bằng chất liệu gì?</a></h5>
								<p>Mắt kính là một trong những phụ kiện quen thuộc trong đời sống hàng ngày của mỗi
									người nhưng chưa chắc rằng mọi người đều biết hết về chất liệu gọng kính. </p>
								<a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="product__pagination blog__pagination">
							<a href="goctuvan.html">1</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- Blog Section End -->

    <!-- Blog Section End -->
	<script src="{{ asset('blog/js/bootstrap.min.js')}}"></script>
	@include('member/includes/footer')