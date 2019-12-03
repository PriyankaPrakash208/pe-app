<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8"/>
	<title>
		#PE | My Profile
	</title>
	<meta name="description" content="User profile view and edit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load( {
			google: {
				"families": [ "Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700" ]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		} );
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->

	<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link href="<?php echo base_url();?>assets/summernote/summernote.css" rel="stylesheet">
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>

	<style type="text/css">
		/*.container{
			margin-right: 130px;
    		margin-left: 130px;
		}*/
		form{
			margin-top: 2em;
		}
		.float-right{
			float: right !important;
		}
	</style>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m-page--fluid m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- begin::Header -->
		<header class="m-grid__item	 m-header " data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize">
			<div class="m-header__top">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- begin::Brand -->
						<div class="m-stack__item m-brand">
							<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?php echo base_url();?>user/dashboard" class="m-brand__logo-wrapper">
										<img alt="" width="170px" src="<?php echo base_url();?>assets/img/user/logo.png"/>
									</a>
								
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
									</a>
								
									<!-- END -->
									
									<!-- begin::Responsive Header Menu Toggler-->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
											<span></span>
										</a>
								
									<!-- end::Responsive Header Menu Toggler-->
									
									<!-- begin::Topbar Toggler-->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
											<i class="flaticon-more"></i>
									</a>
								
									<!--end::Topbar Toggler-->
								</div>
							</div>
						</div>
						<!-- end::Brand -->
						<!-- begin::Topbar -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
						
										
										
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">

													</span>
													<span class="m-topbar__welcome">
														Hello,&nbsp;
													</span>
													<span class="m-topbar__username">
													
														<?php 
															
																echo $fullname;
														?>													
													</span>
												</a>
										
										</li>

										
										
										
										<?php 	if($this->session->userdata('email')!='admin'){ ?>
										<span style="color:white;">|&nbsp;&nbsp;&nbsp;</span>
										
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">

											<a href="<?php echo base_url();?>User/logout" class="m-nav__link ">
													
													<span class="m-nav__link-icon">
														<span style="font-size:1rem;font-weight:500;" >
														Logout
														</span>
													</span>
												</a>
										

										</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<!-- end::Topbar -->
					</div>
				</div>
			</div>
			
		</header>



		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

			<div class="m-grid__item m-grid__item--fluid m-wrapper container">

				<div class="modal fade" id="m_summernote_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="la la-remove"></span>
								</button>
							</div>
							<form class="m-form m-form--fit m-form--label-align-right">
								<div class="modal-body">
									<div class="form-group m-form__group row m--margin-top-10">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h5>Enter the new topic</h5>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="summernote" id="summernote"></div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary m-btn" data-dismiss="modal">Cancel</button>
									<button type="button" id="title-btn" class="btn btn-brand m-btn">Create</button>
									<button type="button" id="title-btn-update" class="hide btn btn-brand m-btn">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<form class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<div class="row ">
								<!-- <pre><?php print_r($authers); ?></pre> -->
								<!-- <div class="col-lg-12 ml-lg-auto">
									<a href="" class="btn btn-success m-btn m-btn--pill" data-toggle="modal" data-target="#m_summernote_modal">Start new topic</a>
								</div> -->
								<div class="col-lg-2">
									<a href="" class="btn btn-success m-btn m-btn--pill" data-toggle="modal" data-target="#m_summernote_modal">New Topic</a>
								</div>
								<div class="col-lg-3">
									<h4 align="center">HASHBOOK</h4>
								</div>
								<div class="col-lg-7">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group m-form__group ">
												<select id="auther" class="form-control m-input m-input--square">
													<option value="">Select Author</option>
													<?php foreach ($authers as $row) {
														if($row->fullname != ""){
															$fullname = $row->fullname;
														}else{
															$fullname = $row->name;
														}

														echo '<option value="'.$row->user_id.'">'.$fullname.'</option>';
													} ?>
													<!-- <option>rweg</option>
													<option>rweg</option> -->
												</select>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group m-form__group ">

												<input type="text" id="search-title" placeholder="Enter search keyword" class="form-control m-input m-input--square" name="">
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</form>
				<div class="m-portlet__body">
					<table class="table table-bordered m-table m-table--border m-table--head-bg-brand"">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Author</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="titles">
							<!-- <tr>
								<th scope="row">1</th>
								<td>Jhon</td>
								<td>Stone</td>
								<td>@jhon</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Lisa</td>
								<td>Nilson</td>
								<td>@lisa</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr> -->
						</tbody>
					</table>
					<div class="m-widget3" id="discussion-titles">
						<!-- <div class="m-widget3__item">
							<div class="m-widget3__header">
								<div class="m-widget3__user-img">
									<img class="m-widget3__img" src="<?php echo base_url() ?>/assets/img/user/10319.jpg" alt="">
								</div>
								<div class="m-widget3__info">
									<span class="m-widget3__username">
										Melania Trump
									</span><br>
									<span class="m-widget3__time">
										2 day ago
									</span>
								</div>
							</div>
							<div class="m-widget3__body">
								<p class="m-widget3__text">
									Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
								</p>
							</div>
						</div> -->
					</div>
					<nav aria-label="Page navigation example" class=" float-right">
					  <ul class="pagination" id="pagination">
					  </ul>
					  <!-- <ul class="pagination" id="pagination">
					    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
					    <li class="page-item"><a class="page-link" href="#">Next</a></li>
					  </ul> -->
					</nav>
				</div>
			</div>
		</div>



		<!-- end::Header -->
		
	<!--	close test-->
	</div>
		<script type="text/javascript"> var discussion_id = null; </script>
		<script type="text/javascript"> var usertype = '<?php echo $usertype; ?>' </script>
		<script type="text/javascript"> var user_id = '<?php echo $user_id; ?>' </script>
		<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/js/summernote.js"></script> -->
		
		<script src="<?php echo base_url();?>assets/summernote/summernote.js"></script>
		<script src="<?php echo base_url();?>assets/js/discussion.js"></script>

<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>