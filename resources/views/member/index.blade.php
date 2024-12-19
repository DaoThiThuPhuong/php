@include('member/includes/header')
@include('member/includes/banner')
	<!--Phần popup-->
	<img src="Trangchinh/images/flashsale.png" alt="" class="imgflashsale">
	<!-- Start Product Section_1 -->
	<div class="product-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title">TẤT CẢ SẢN PHẨM</h2>
					<!--<p class="mb-4">Hàng trăm sản phẩm bắt trend mới nhất</p> -->

					<p><a href="/product" class="btn">Xem thêm</a></p>
				</div>
				<!-- End Column 1 -->
				@if (isset($product_all))
					@foreach ($product_all as $item)
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="detail/{{$item->id}}">
							<img src="{{$item->mainImage}}"
								class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$item->nameProduct}} </h3> 
							<strong class="product-price">{{$item->price}} VNĐ</strong>
							<br>
							<strong class="product-price">Danh mục: {{$item->nameCategory}}</strong>
	
							<span class="icon-cross">
								<img src="{{$item->mainImage}}" class="img-fluid">
							</span>
						</a>
					</div>
					@endforeach
				@endif
				<!-- Start Column 2 -->
				
				<!-- End Column 2 -->


				<!-- End Column 4 -->

			</div>
		</div>
	</div>
	<!-- End Product Section_1 -->



	<!-- Start Why Choose Us Section -->
	<div class="bao-hanh">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6">
					<h2 class="section-title">Tại sao nên lựa chọn VENUS?</h2>
					<p>Hãy cùng khám phá xem VENUS mang điều gì đặc biệt đến cho bạn nhé.</p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="Trangchinh/images/truck.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Vận chuyển nhanh chóng</h3>
								<p>Với đội ngũ giao hàng chuyên nghiệp, chúng tôi cam kết vận chuyển trong vòng 1-3 giờ đối với khu vực
									nội thành. Còn đối với các vùng khác sẽ là 1-2 ngày</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="Trangchinh/images/bag.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Khám mắt miễn phí</h3>
								<p>VENUS luôn hỗ trợ bạn khám mắt miễn phí nếu bạn đến cửa hàng.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="Trangchinh/images/support.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Vệ sinh và bảo quản kính mắt</h3>
								<p>Bảo vệ sức khỏe mắt, duy trì độ sắc nét và tăng tuổi thọ kính mắt.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="Trangchinh/images/return.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Đổi trả dễ dàng</h3>
								<p>Bảo hành 1 đổi 1 khi có lỗi của nhà sản xuất,
									lỗi do đo mắt sai (trong 10 ngày đầu), hỗ trợ giảm 50% nếu đổi gọng mới</p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="Trangchinh/images/we chose.jpg" alt="Image" class="img-fluid">
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Why Choose Us Section -->

	<!-- Tab-->
	<img src="Trangchinh/images/Vector-3-1.svg" class="vectoHM">
	<h2 class="hangmoi">HÀNG MỚI LÊN KỆ</h2>
	<!--Tab moi-->

	<div class="tab">
		@if (isset($category_all))
			@foreach ($category_all as $index => $item)
			@if ($index==0)
			<button class="tablinks" onclick="HOTTREND(event, 'danhmuc{{$item->id}}')" id="defaultOpen">{{$item->nameCategory}}</button>
			@else
			<button class="tablinks" onclick="HOTTREND(event, 'danhmuc{{$item->id}}')">{{$item->nameCategory}}</button>
			@endif
			@endforeach
		@endif
	</div>
	@if (isset($category_all))
	@foreach ($category_all as $index => $item)
	<div id="danhmuc{{$item->id}}" class="tabcontent">
		<!-- Start Product Section_1 -->
		<div class="product-section">
			<div class="container">
				<div class="row">
					@if (isset($product_all_new))
						@foreach ($product_all_new as $item1)
						@if ($item1->category_id==$item->id)
						<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
							<a class="product-item" href="detail/{{$item1->id}}">
								<img src="{{$item1->mainImage}}"
									class="img-fluid product-thumbnail">
								<h3 class="product-title">{{$item1->nameProduct}}</h3>
								<strong class="product-price">{{$item1->price}} VNĐ</strong>
	
								<span class="icon-cross">
									<img src="{{$item1->mainImage}}" class="img-fluid">
								</span>
							</a>
						</div>
						@endif
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
	@endforeach
@endif
	<!--Tab moi-->
	<br><br>

	<!--Mục sản phẩm giá tốt-->
	<img src="Trangchinh/images/SPGIATOT.png" alt="" class="imgSPGT">
	<!-- Start Product Section_1 -->
	<div class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title2"
						style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ">
						SẢN PHẨM <br>GIÁ TỐT</h2>

					<p><a href="TrangChuyenMucGK/TrangChuyenMucGK.html" class="btn" id="xemthem">Xem thêm</a></p>
				</div>

				@if (isset($product_good_price))
						@foreach ($product_good_price as $item)
						<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
							<a class="product-item" href="detail/{{$item->id}}">
								<img src="{{$item->mainImage}}"
									class="img-fluid product-thumbnail">
								<h3 class="product-title">{{$item->nameProduct}}</h3>
								<strong class="product-price">{{$item->price}} VNĐ</strong>
								<br>
								<strong class="product-price">Danh mục: {{$item->nameCategory}}</strong>
								<span class="icon-cross">
									<img src="{{$item->mainImage}}" class="img-fluid">
								</span>
							</a>
						</div>
						@endforeach
					@endif
			</div>
		</div>
	</div>
	<!-- End Product Section_1 -->
	<!--End Mục sản phẩm giá tốt-->

	<!-- Start Vutrutruyenthong -->
	<div class="we-help-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-5 mb-lg-0">
					<div class="imgs-grid">
						<div class="grid grid-1"><a href="https://www.instagram.com/kinhmat_ikkuna/"
								target="_blank"><img src="Trangchinh/images/ig1.png" alt="Untree.co"></a></div>
						<div class="grid grid-2"><a href="https://www.tiktok.com/@kinhmatikkuna" target="_blank"><img
									src="Trangchinh/images/tt2.png" alt="Untree.co"></a></div>
						<div class="grid grid-3"><a href="https://www.facebook.com/profile.php?id=61553810680047"
								target="_blank"><img src="Trangchinh/images/fb3.png" alt="Untree.co"></a></div>
					</div>
				</div>
				<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">Vũ trụ truyền thông</h2>
					<p>Kính mắt VENUS chắc không còn quá xa lạ với giới trẻ nữa. Đây là kênh thông tin mua sắm và
						giải
						trí dành cho giới trẻ, là “món ăn tinh thần” hằng ngày không thể thiếu của mỗi người trẻ.
					</p>
					<p>Kính mắt VENUS, thành lập từ năm 2020, đã trở thành lựa chọn không thể thiếu đối với giới
						trẻ
						sau hơn ba năm phát triển.
						Với việc cập nhật nhanh chóng về xu hướng thời trang và sự hiểu biết sâu sắc về sở thích của
						khán giả thông qua các
						mạng xã hội như Facebook, TikTok và Instagram, kính mắt VENUS vẫn duy trì vị trí hàng đầu
						cho
						những người
						muốn trải nghiệm nội dung giải trí đặc sắc và đầy đủ thông tin cần thiết. Cho dù bạn tìm
						kiếm
						những bài viết hấp dẫn hay những video cuốn hút,
						kính mắt VENUS đảm bảo sự kết hợp hoàn hảo giữa giải trí và những thông tin quan trọng.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Vutrutruyenthong -->

	<!-- start Khách hàng thân thiết-->
	<img src="Trangchinh/images/Vector-3-1.svg" class="vectoHM2">
	<h2 class="PKHTT">KHÁCH HÀNG THÂN THIẾT</h2>
	<section class="section-slide">

		<div class="swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide swiper-slide--one">

					<div>
						<h2>Bảo An & Gia Khiêm</h2>
						<p>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">

								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
							</svg>
							TP.HCM
						</p>
					</div>
				</div>
				<div class="swiper-slide swiper-slide--two">

					<div>
						<h2>Khánh Huyền</h2>
						<p>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
							</svg>
							Đà Nẵng
						</p>
					</div>
				</div>

				<div class="swiper-slide swiper-slide--three">

					<div>
						<h2>Ngọc Matcha</h2>
						<p>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
							</svg>
							Hà Tĩnh
						</p>
					</div>
				</div>

				<div class="swiper-slide swiper-slide--four">

					<div>
						<h2>Trâm Anh</h2>
						<p>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
							</svg>
							Hà Nội
						</p>
					</div>
				</div>
				<div class="swiper-slide swiper-slide--five">
					<div>
						<h2>Trần Vân</h2>
						<p>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
							</svg>
							Bắc Ninh
						</p>
					</div>
				</div>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>
	</section>
	<!-- scripts -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
	<!--end Khách hàng thân thiết-->

	<!-- Start Blog Section -->
	<div class="blog-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6">
					<h2 class="section-title">Blog</h2>
				</div>
				<div class="col-md-6 text-start text-md-end">
					<a href="#" class="more">View All Posts</a>
				</div>
			</div>

			<div class="row">

				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="Trangchinh/images/blog.png" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h6 style="margin-top: 10px;"><a href="#">[GIẢI ĐÁP] BỊ CẬN CÓ NÊN ĐEO KÍNH KHI DÙNG MÁY
									TÍNH HAY KHÔNG?</a></h6>
							<div class="meta">
								<span>by <a href="#">Ha Hai Nam</a></span> <span>on <a href="#">Dec 19,
										2023</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="Trangchinh/images/blog1.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h6 style="margin-top: 10px;"><a href="#">NÊN CHỌN GỌNG KÍNH CHO NGƯỜI CẬN NẶNG NHƯ THẾ
									NÀO?</a></h6>
							<div class="meta">
								<span>by <a href="#">Pham Ha Trang</a></span> <span>on <a href="#">Dec 15,
										2023</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="Trangchinh/images/blog4.png" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h6 style="margin-top: 10px;"><a href="#">5+ CÁCH ĐEO KHẨU TRANG KHÔNG BỊ MỜ KÍNH</a></h6>
							<div class="meta">
								<span>by <a href="#">Pham Thuc Quyen</a></span> <span>on <a href="#">Dec 12,
										2023</a></span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Blog Section -->

	<!--Đối tác-->
	<div class="partners-section">
		<h2>Đối tác của VENUS</h2>
		<div class="partner-images">
			<a href="https://www.eyewearstore.vn/gioi-thieu-eyewear-store.html" target="_blank"> 
				<img src="//bizweb.dktcdn.net/100/501/677/themes/931770/assets/img_brand_1.jpg?1702805850154"
					alt="eyewear">
			</a>
			<a href="https://kinhmateyeplus.com/" target="_blank">
				<img src="//bizweb.dktcdn.net/100/501/677/themes/931770/assets/img_brand_2.jpg?1702805850154"
					alt="reeman">
			</a>
			<a href="https://kinhmatlily.com/" target="_blank">
				<img src="//bizweb.dktcdn.net/100/501/677/themes/931770/assets/img_brand_4.jpg?1702805850154"
					alt="kính mắt lily">
			</a>
			<a href="https://kinhmatanna.com/" target="_blank">
				<img src="//bizweb.dktcdn.net/100/501/677/themes/931770/assets/img_brand_5.jpg?1702805850154"
					alt="anna">
			</a>
			<a href="https://matkinhtamduc.com/">
				<img src="//bizweb.dktcdn.net/100/501/677/themes/931770/assets/img_brand_3.jpg?1702805850154"
					alt="chemi">
			</a>
		</div>
	</div>
	<!--Đối tác-->
	@include('member/includes/footer')

