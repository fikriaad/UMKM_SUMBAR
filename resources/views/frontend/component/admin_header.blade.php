<!-- HEADER -->
<header>
	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-9 col-xs-6">
					<!-- <div class="header-logo"> -->
						<a href="#" class="logo">
							<img src="{{asset('frontend/img/logo.png')}}" alt="" >
						</a>
					<!-- </div> -->
				</div>
				<!-- /LOGO -->

				<!-- ACCOUNT -->
				<div class="col-md-3 col-xs-6 clearfix">
					<div class="header-ctn">

						<!-- Log Out -->
						<div>
							<a href="{{route('logout-umkm')}}">
								<i class="fa fa-sign-out" style="background-color: #29499C; height: 36px; width: 36px; padding-top: 9px; padding-left: 4px; margin: auto; border-radius: 25px;"></i>
								<span>Log Out</span>
							</a>
						</div>
						<!-- /Log Out -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"  style="padding-bottom: 10px;"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
