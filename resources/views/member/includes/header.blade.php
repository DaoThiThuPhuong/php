<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{{ asset('Trangchinh/logo.png') }}">

	<!-- Bootstrap CSS -->
	<link href="{{ asset('Trangchinh/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font1|Font2|Font3&display=swap">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
	<link href="{{ asset('Trangchinh/css/style.css') }}" rel="stylesheet">

	<title>Trang chu</title>

</head>

<body>
	<!--Header 1-->
	<header>
		<div id="logo">
			<a href="index.html"><img src="{{ asset('Trangchinh/logo1.png')}}" alt="Your Logo" class="VENUS"></a>
		</div>

		<form action="/search" method="post">
			@csrf
		<div class="input-group" id="search-box">
			
			<input type="text" class="form-control" name="searchText" id="search-input" placeholder="Tìm kiếm sản phẩm bạn yêu thích">
			<div class="input-group-append">
				<button class="btn btn-outline-light" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form>


		<div id="login-link">
			<a class="nav-link" href="/auth"><img src="{{ asset('Trangchinh/images/user.svg')}}"></a>
			@if (Auth::check())
				
				<a class="nav-link text-white" >Hello, {{Auth::user()->name}}</a>
				<a class="nav-link text-white" href="/logout">Đăng xuất</a>
			@else
				
			@endif
			<a class="nav-link" href="/cart"><img src="{{ asset('Trangchinh/images/cart.svg')}}"></a>
		</div>
	</header>
	<!--End Header 1-->

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md nagvbar-dark b-dark" arial-label="Furni navigation bar">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="/">Trang chủ</a>
					</li>
					<li>
						<div class="dropdown">
							<a class="nav-link" href="/product">Sản phẩm</a>
							<div class="dropdown-content">
								@if (isset($category_all))
								@foreach ($category_all as $item)
								<a href="/category/{{$item->id}}">{{$item->nameCategory}}</a>
								@endforeach
								@endif
							</div>
						</div>
					</li>
					<li><a class="nav-link" href="/about">Giới thiệu</a></li>
					<li><a class="nav-link" href="/sale">Khuyến mãi</a></li>
					<li>
						<div class="dropdown">
							<a class="nav-link">Blog</a>
							<div class="dropdown-content">
								<a href="/tintucveVENUS">Tin tức về VENUS</a>
                                <a href="/goctuvan">Góc tư vấn</a>
                                <a href="/benhvemat">Bệnh về mắt</a>
                                <a href="/kienthucchung">Kiến thức chung</a>
							</div>
						</div>
					</li>
					@if (Auth::check())
				<li><a class="nav-link" href="/order">Lịch sử đơn hàng</a></li>
					@endif
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li>
						<p class="nav-link">|</p>
					</li>
					<li>
						<p class="nav-link">Hotline: </p>
					</li>
					<li><a class="nav-link" href="#">0366764577</a></li>

				</ul>
			</div>
		</div>
	</nav>




	<!-- Slideshow container -->

	

	<!--END Slideshow container -->

	<!--CRO-BT-->
	<div class="BT">
		<div class="cro-buttons">
			<a href="https://www.facebook.com/profile.php?id=61553810680047" class="facebook" target="_blank"><img
					src="{{ asset('Trangchinh/images/facebook.jpg')}}" alt="Facebook"></a>
			<a href="https://www.tiktok.com/@kinhmatVENUS" class="tiktok" target="_blank"><img
					src="{{ asset('Trangchinh/images/tiktok.png')}}" alt="TikTok"></a>
			<a href="https://www.instagram.com/kinhmat_VENUS/" class="instagram" target="_blank"><img
					src="{{ asset('Trangchinh/images/ig.png')}}"alt="Instagram"></a>
		</div>
	</div>
	<!--CRO-BT-->

	<!--Phần popup-->
	<div class="overlay" id="overlay">
		<div class="popup">
			<span class="close-btn" onclick="closePopup()">×</span>
			<img src="{{ asset('Trangchinh/images/christmas_menu_specials_1_4_.jpg')}}" alt="Khuyến Mãi" class="imgpop">
			<div class="countdown" id="countdown"></div>
		</div>
	</div>

	<script>
		window.onload = function () {
			var endDate = new Date("Jan 5, 2024 00:00:00").getTime(); // Đặt ngày kết thúc khuyến mãi
			function updateCountdown() {
				var now = new Date().getTime();
				var timeLeft = endDate - now;
				if (timeLeft <= 0) {
					closePopup();
					return;
				}
				var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
				var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
				document.getElementById('countdown').innerHTML = "Thời gian còn lại: " + days + " ngày " + hours + " giờ " + minutes + " phút " + seconds + " giây";
			}
			setInterval(updateCountdown, 1000); // Cập nhật thời gian còn lại mỗi giây
			showPopup();
		};

		function showPopup() {
			document.getElementById('overlay').style.display = 'flex';
		}

		function closePopup() {
			document.getElementById('overlay').style.display = 'none';
		}
	</script>