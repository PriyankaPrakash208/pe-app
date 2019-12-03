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
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
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
												<a href="<?php echo base_url(); ?>admin/home" class="m-nav__link m-">
													<span class="m-topbar__userpic m--hide">
													<img src="<?php echo base_url(); ?>assets/media/logos/logo-2.png" class="m--img-rounded m--marginless m--img-centered" alt="">
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl ">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						<div class="m-content">
							<!--begin:: Widgets/Stats-->
							<div class="m-portlet">
								<div class="row" >
									<!--	new div -->
									<div id="new-div-admin"  class="col-xl-12">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
												
<!--							month picker-->
						<div>
							<form class="m-form m-form--fit m-form--label-align-right" action="javascript:;"  method="post" id="daily_status_emp">
								<div class="m-portlet__body">
								<!--								test code for search and dropdown-->
									<div class="m-container">
										<div class="col-md-4" style="float:left;"> 
											<div class="form-group m-form__group row m-form ">
													
												<select class="form-control" id="emp_team">
													<option value="">Please select a team</option>
													<?php 
														foreach($team as $emps){ 
													?>
												  		<option value="<?php echo $emps['team_id']?>"  ><?php echo $emps['name'];?></option>
												  	<?php 
														} 
												   	?>
												</select>

											</div>
										</div>
									
										<div class="col-md-8" style="float:right;"> 
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12">
													Select a day
												</label>
												
												<div class="col-lg-6 col-md-6 col-sm-6">
													<div class="input-group date" id="">
														<select class="form-control" id="week-list">
															<option>Please select</option>
														</select>
														<div class="col-lg-4 col-md-3 col-sm-3"><button class="btn btn-primary m-btn m-btn--custom" id="generate-old-shift-btn" name="submit" value="view details">Proceed</button> </div>
													</div>
													 
												</div> 
											</div>
										</div>
									</div>
								</div>
							</form>
								
								<div class="m-container">
									<div class="col-md-12 hide" id="shift-management-table">

										<div class="container" style="padding: 5px;">
											<div class="row">
												
												<div class="col-md-6 text-right" ><br/>
													<span class="m-badge m-badge--success m-badge--wide">
													Created By : </span> <span class="m-badge m-badge--success m-badge--wide m-badge--square" id="shift-created-by"></span>
												</div>
												
											</div><br><br><h2 class="m--font-brand text-center"><u>SHIFT TABLE</u><br/></h2><br/>
										</div>

										<table  class=' table m-table  m-table--head-bg-brand'>
											<thead>
												<tr>
													<th>Day</th>
													<th>Morning</th>
													<th>Evening</th>
													<th>Night</th>
													<th>Off</th>
													<th>Comment</th>
													<th class="hide" id="action-shift-btn-group">Action</th>
												</tr>
											</thead>
											<tbody id="new-shift-form">
											</tbody>
											<tfoot id="new-shift-btn-group" class="hide">
												<tr>
													<td><button class="btn btn-sm btn-primary">Submit</button></td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>

<!--	close month picker-->
											</div>
										</div>

										<!--end::Section-->
								
									<!--end::Section-->
<!--								</div>-->
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
		<?php include_once('chat_widget.php') ?>
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/shift-manager.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/typeahead.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/dropdown.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->
</html>
