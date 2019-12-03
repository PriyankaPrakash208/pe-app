<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			HashRoot PE Portal |  Admin
		</title>
		<meta name="description" content="User profile view and edit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		
		<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m-page--wide  m-header--fixed-mobile m-footer--push m-aside--on canvas-default"  >
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
											<img width="80" alt="" src="<?php echo base_url();?>assets/media/logos/logo-2.png"/>
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
											
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
												<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
													
													<span class="m-topbar__username m_topbar_notification_icon">
														<i class="flaticon-menu-button"></i>
													</span>
												</a>
												
											</li>	
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
												<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
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
												<a href="./logout" class="m-nav__link ">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
													
													<span class="m-topbar__username">
														logout
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">

						<div class="m-content">
							<!--begin:: Widgets/Stats-->
							<div class="m-portlet">
								<div class="row" >
									<div class="col-xl-3" id="list_emp">
								<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													List Of Employees
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<span class="m-section__sub">
											</span>
											<div class="m-section__content">
												<table class="table">
													<thead>
															<th>
																Sl:No
															</th>
															<th>
																Name 
															</th>
													</thead>
													<tbody>
													<?php 
														$slno = 1;
														foreach($emp as $emps){ 
													?>
													<tr>
															
															<td><?php echo $slno;?></td>
<!--															<td><a href="javascript:;" onclick="monthly_daily_status(<?php// echo $emps['user_id']?>)"><?php// echo $emps['fullname'];?></a></td>-->
															
															<td><a href="javascript:;" onclick="view_daily_report(<?php echo $emps['user_id']?>)"><?php echo $emps['fullname'];?></a></td>					
													</tr>
							
														<?php 
														$slno++;
															} 
														?>
													</tbody>
													
												</table>
											</div>
										</div>
										<!--end::Section-->
										<!--begin::Section-->
									
									<!--end::Section-->
								</div>
							</div>
						<!--	new div -->
						<div id="new-div-admin"  class="col-xl-9">

												<h3 class="m-portlet__head-text">
													
												</h3>

										<div class="m-section">
											<span class="m-section__sub">
												
											</span>
											<div class="m-section__content">
												
<!--		month picker-->
						<div>
							<form class="m-form m-form--fit m-form--label-align-right" action="javascript:;"  method="post" id="daily_status_emp">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-sm-12">
												Select a month
											</label>
<!--											<input type="hidden" class="form-control m-input" name="new_user_id" value="<?php //echo $emps['user_id']?>">-->
											<input id="month_user_id" type="hidden"  class="form-control m-input" name="user_id" value="">
											<div class="col-lg-6 col-md-9 col-sm-12">
												<div class="input-group date" id="m_datepicker_admin">
												
													
													<input type="text" class="form-control m-input" name="month_pick_admin1" placeholder="Select Here"/>
													<span class="input-group-addon">
														<i class="la la-calendar-check-o"></i>
													</span>
													<div class="col-lg-4 col-md-3 col-sm-3"><button class="btn btn-primary m-btn m-btn--custom" type="submit" name="submit" value="view details">Proceed</button> </div>
												</div>
												
											</div>
										</div>
									</div>
								</form>
								<div id="new-div-dailystat"></div>
								
							</div>

<!--	close month picker-->
											</div>
										</div>

									</div>
						
						<!--	close new div-->
<!--								...................................-->
								</div>
							<!--end:: Widgets/Stats-->
							</div>

					</div>

				</div>
			</div>
			<!-- end::Body -->
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
											<i class="m-nav__link-icon flaticon-diagram m--icon-font-size-lg3"></i>
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
		
	
		


<!--		close testing add jd-->

<!--		close view status
		-->

		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/typeahead.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/dropdown.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->
</html>
