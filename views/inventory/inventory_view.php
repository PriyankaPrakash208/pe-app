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
	<body onload="get_inv_type(1)" class="m-page--fluid m-page--wide  m-header--fixed-mobile m-footer--push m-aside--on canvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page" >
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop">
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver m-container m-container--responsive m-container--xxl ">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						<div class="m-content">
							<div class="col-md-12">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs ">

									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_0" role="tab" onclick="get_inv_type(1)">
															Laptop
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_1" role="tab" onclick="get_inv_type(2)">
														Desktop	
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_2" role="tab" onclick="get_inv_type(3)">
															Keyboard
													</a>
												
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_3" role="tab" onclick="get_inv_type(4)">
													<i class="flaticon-share m--hide"></i>
															Mouse
													</a>
												
												</li>

												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" onclick="get_inv_type(5)" data-toggle="tab" href="#m_user_profile_tab_4" role="tab" >
															Miscellaneous
													</a> 
												
												</li>
												
												
											</ul>
										</div>
										
									</div>
									<div class="tab-content">
<!--	tab0 contents-->
									<div class="tab-pane active" id="m_user_profile_tab_0">
										<div class="m-portlet">
											<div id="inventory_list_1"></div> 
										</div>
									</div>
						
<!--	tab0 contents-->
<!--	tab1 contents-->
		<div class="tab-pane" id="m_user_profile_tab_1">
			<div class="m-portlet">
					 <div id="inventory_list_2"></div>
			</div>
		</div>
<!--	/tab 1 contents-->
<!--	tab2 contents-->
		<div class="tab-pane " id="m_user_profile_tab_2" >
			<div class="m-portlet">
				<div id="inventory_list_3"></div> 
			</div>
		</div>
<!--	tab 3 contents-->

<!--	tab4 CONTENTS-->
		<div class="tab-pane " id="m_user_profile_tab_3">	
			<div class="m-portlet">
				<div id="inventory_list_4"></div> 
			</div>						
		</div>
					
	<!--	tab5 contents-->
	<div class="tab-pane " id="m_user_profile_tab_4">
		<div class="m-portlet">
			<div id="inventory_list_5"></div> 
			
			
		</div>			
	</div>
					
								
										
						</div>
							</div>	
						</div>	
						
							
						</div>		
					</div>
				</div>
			</div>
		
									
								
									
					
								
										
					
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
	
		<?php include_once('chat_widget.php') ?>
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
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		
		<!--end::Base Scripts -->
	</body>
	<!-- end::Body -->
</html>
