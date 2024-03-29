<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>UMKM @yield('title') </title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('frontend/owlcarousel/dist/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/owlcarousel/dist/assets/owl.theme.default.min.css')}}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
        <!-- jQuery Plugins -->
        <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
		<script src="{{asset('lte/build/js/axios.min.js')}}"></script>
        
        @include('frontend/component/header')

        @include('frontend/component/navbar')
        
        @yield('content')

        {{--@include('frontend/component/footer')--}}

		<!-- FOOTER -->
		<footer id="footer" style="margin-top: 120px">
			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<!-- <ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul> -->
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="http://mediatamaweb.co.id/" target="_blank" style="color: #B9BABC">CV. MEDIATAMA WEB INDONESIA</a> | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.instagram.com/taufanomt/" target="_blank">Taufano.</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

        @include('frontend/component/script')
		
	</body>
</html>