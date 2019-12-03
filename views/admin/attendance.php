<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			HashRoot | Attendance  
		</title>
		<meta name="description" content="User profile view and edit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js">
		</script>
		<script>
			WebFont.load(
				{
					google:
					{
						"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]
					},
					active: function()
					{
						sessionStorage.fonts = true;
					}
				});
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->

		<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
	</head>
	<!-- end::Body -->
	<body class="m-page--fluid m-content--skin-light2 m-header--fixed-mobile m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- begin::Header -->
				<header class="m-grid__item m-header "  data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize" > 
				<div class="m-header__top">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">
							<!-- begin::Brand -->
							<div class="m-stack__item m-brand">
								<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
									<div class="m-stack__item m-stack__item--middle m-brand__logo">
										<a href="#" class="m-brand__logo-wrapper">
											<img width="175" alt="" src="<?php echo base_url();?>assets/media/logos/logo-2.png"/>
										</a>
									</div>
									
								</div>
							</div>
							<!-- end::Brand -->
							<!-- begin::Topbar -->
							<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
								<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-topbar__nav-wrapper">
										<ul class="m-topbar__nav m-nav m-nav--inline">
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img" >
												<a href="http://pe.hashroot.com/admin/home" class="m-nav__link m-">
													<span class="m-topbar__userpic m--hide">
														<img src="http://pe.hashroot.com/assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt="">
													</span>
													
													<span class="m-topbar__username">
														Dashboard
													</span>
												</a>
												
											</li>	
												<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown--skin-light" >
												<a href="<?php echo base_url();?>admin/userlist" class="m-nav__link ">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
													
													<span class="m-topbar__username">
														Employees
													</span>
												</a>
												
											</li>
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown--skin-light" >
												<a href="<?php echo base_url();?>admin/logout" class="m-nav__link ">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
													
													<span class="m-topbar__username">
														logout
													</span>
												</a>
												
											</li>	
											<li id="m_quick_sidebar_toggle" class="m-nav__item">
												<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
														<span class="m-nav__link-icon-wrapper">
															<i class="flaticon-chat-1"></i>
														</span>
													</span>
												</a>
											</li>										
										</ul>
									</div>
								</div>
							</div>
							<!-- end::Topbar -->
						</div>
					</div>
				</div>
				
			</header>
			<!-- end::Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content" style="padding-top: 0;">

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Attendance 
											
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									
									
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="row">
								<div class="col-md-12">
								<form class="m-form m-form--fit m-form--label-align-right" action="javascript:;"  method="post" id="attendance_dat_form">
								<div class="m-portlet__body">
<!--								test code for search and dropdown-->
									<div class="col-md-4" style="float:left;"> 
										<div class="form-group m-form__group row m-form ">
												
												<input list="emps" name="emps" type="text" id="emp_input" placeholder="Select an Employee" class="form-control m-input">
												<datalist id="emps">
											  <?php 
													foreach($emp as $emps){ 
												?>
												
												  <option data-value="<?php echo $emps['user_id'];?>" value="<?php echo $emps['fullname']?>"  ><b><?php echo $emps['fullname'];?></b></option>
<!--	 <input type="hidden" name="test">-->
												  <?php 
														
													} 
														?>
												</datalist>
											</div>
										</div>
<!--	close	test code for search and dropdown-->
								<div class="col-md-8" style="float:right;">
									<div class="form-group m-form__group row">

											<label class="col-form-label col-lg-4 col-sm-12">
												Select a month
											</label>
<!--											<input type="hidden" class="form-control m-input" name="new_user_id" value="<?php //echo $emps['user_id']?>">-->
											<input id="month_user_id" type="hidden"  class="form-control m-input" name="user_id" value="">
											<div class="col-lg-6 col-md-9 col-sm-12">
												<div class="input-group date" id="month_pick_attendance">
													<input id="" type="text" class="form-control m-input" name="month_pick_attendancedat" placeholder="Select Here"/>
													<span class="input-group-addon">
														<i class="la la-calendar-check-o"></i>
													</span>
													<div class="col-lg-4 col-md-3 col-sm-3"><button class="btn btn-primary m-btn m-btn--custom" type="submit" name="submit" value="view details">Proceed</button> </div>
												</div>
												
											</div>
										</div>
										</div>
									</div>
								</form>
								<div class="m-portlet__body" id="new-div-attendance"></div>
								<div class="m-portlet__body" id="new-div-attendance2"></div>
								</div>






							</div>
						</div>
					</div>
				</div>
			</div>
</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									<?php echo date('Y'); ?>  &copy; PE System by
									<a href="#" class="m-link">
										HashRoot
									</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												Performance Evaluation System
											</span>
										</a>
									</li>
									<li class="m-nav__item m-nav__item--last">
										<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
											<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3">
											</i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		
		<!-- end:: Page -->
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up">
			</i>
		</div>
		<!-- end::Scroll Top -->

		<?php include_once('chat_widget.php') ?>
		<!--begin::Base Scripts -->
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		
		
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->

</html>