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
							<a onclick="logout( '{{ route('logout-umkm')}}' )">
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

<div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Logout</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="GET" id="formLogout">
				<div class="modal-body">
					@csrf
					Yakin Ingin Keluar ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Logout</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	// untuk logout
	function logout(url) {
		$('#ModalLogout').modal()
		$('#formLogout').attr('action', url);
	}
</script>