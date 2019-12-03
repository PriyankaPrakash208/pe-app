<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			HashRoot PE Portal |  <?php echo $adminname?>
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
		<style type="text/css">
			.hide{
				display: none;
			}
		</style>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		
		<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/assets/select2/dist/css/select2.min.css">
		<link href="<?php echo base_url();?>assets/summernote/summernote.css" rel="stylesheet">
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
											<img width="170" alt="" src="<?php echo base_url();?>assets/media/logos/logo-2.png"/>
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
													
													<span class="m-topbar__username">
														Dashboard
													</span>
												</a>
												
											</li>	
											<?php  	if($role!=5){?>
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
											<?php } ?>
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
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">

                        <div class="m-subheader ">
							<div class="d-flex align-items-center">
<!--
								<div class="mr-auto">
									<h3 class="m-subheader__title ">
										Dashboard
									</h3>
								</div>
-->
								<div>
									<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
										<span class="m-subheader__daterange-label">
											<span class="m-subheader__daterange-title">Hello, </span>
											<span class="m-subheader__daterange-date m--font-brand"><?php echo $adminname?></span>
										</span>
										<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
											<i class="la la-user"></i>
										</a>
									</span>
								</div>
							</div>
						</div>												
						<div class="m-content">
							<!--begin:: Widgets/Stats-->
							<div class="m-portlet">
								<div class="m-portlet__body  m-portlet__body--no-padding">
									<div class="row m-row--no-padding m-row--col-separator-xl">
									<?php 
										if($role!=5 ){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::Total Profit-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Employees
													</h4>
													<br>
													<span class="m-widget24__desc">
														Employee List
													</span>
													<a href="<?php echo base_url(); ?>admin/userlist" class="m-widget24__stats m--font-brand" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-users"></i>
													</a>
													<span class="m-widget24__stats m--font-brand">
													
													</span>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													
															<a href="userlist" class="m-widget24__change">
															View 
														</a>
													
<!--
													<span class="m-widget24__number">
														78%
													</span>
-->
												</div>
											</div>
											<!--end::Total Profit-->
										</div>
										
										
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Department
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Dept. Info
													</span>
													
													<a href="javascript:;" class="m-widget24__stats m--font-info"  onclick="viewalldept()" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-interface-4"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="javascript:;" class="m-widget24__change" onclick="viewalldept()">
														View
													</a>
													<a href="#newdept" class="m-widget24__change" data-toggle="modal" data-target="#newdept">
														Add
													</a>
													
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Orders-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Team
													</h4>
													<br>
													<span class="m-widget24__desc">
														Team Info
													</span>
													<a href="javascript:;" class="m-widget24__stats m--font-danger" onclick="viewallteam()" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-suitcase"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="javascript:;" class="m-widget24__change" onclick="viewallteam()">
														View
													</a>
													<a href="#newteam" class="m-widget24__change" data-toggle="modal" data-target="#newteam">
														Add
													</a>
													
												</div>
											</div>
											<!--end::New Orders-->
										</div>
										
										
										
										<!-- Attendance -->
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::Total Profit-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Attendance
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														 Atendance
													</span>
													
													<a href="javascript:;" class="m-widget24__stats m--font-success"  onclick="viewalldept()" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class=" flaticon-event-calendar-symbol"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-success" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												
<!--
													<a href="javascript:;" class="m-widget24__change" onclick="viewalldepts()">
														Add New Activity
													</a>
-->
													<a href="<?php echo base_url(); ?>Admin/attendance" class="m-widget24__change">View</a>
											<!--		<a href="#" class="m-widget24__change">Assigned</a>
													<a href="#" class="m-widget24__change">Tickets</a>-->
<!--
													<a href="javascript:;" class="m-widget24__change" onclick="view_status()">
														View
													</a>
-->
			
												</div>
											</div>
											<!--end::Total Profit-->
										</div>
										
									</div>
									
									
									<div class="row m-row--no-padding m-row--col-separator-xl">
									   
							<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::Total Profit-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Requests
													</h4>
													<br> 
													<span class="m-widget24__desc">
														Requests Info
													</span>
													<a href="<?php echo base_url() ?>admin/request" class="m-widget24__stats m--font-focus" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-file"></i>
													</a>
													<span class="m-widget24__stats m--font-focus"></span>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-focus" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													
														<a href="<?php echo base_url() ?>admin/request"
														 class="m-widget24__change">
															View 
														</a>
													
<!--
													<span class="m-widget24__number">
														78%
													</span>
-->
												</div>
											</div>
											<!--end::Total Profit-->
										</div>
										
										
										
										
							<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Daily Reports
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Dept. Info
													</span>
													
													<a href="javascript:;" class="m-widget24__stats m--font-accent"  onclick="viewalldept()" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2"></i>
													</a>
													<span class="m-widget24__stats m--font-focus"></span>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-accent" role="progressbar" style="width: 54%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="./view_daily_stat" class="m-widget24__change">View</a>
													<a href="javascript:;" class="m-widget24__change" onclick="viewalldepts_jd()">
														Assign  
													</a>
													<a href="./Daily_history" class="m-widget24__change" >
														History
													</a> 

												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
							<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::Total Profit-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Weekly Reports 
													</h4>
													<br>
													<span class="m-widget24__desc">
														Weekly Reports Info
													</span>
													<a href="<?php echo base_url() ?>admin/request" class="m-widget24__stats m--font-warning" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2 "></i>
													</a>
													<span class="m-widget24__stats m--font-warning">
													
													</span>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-warning" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													
															
															<a href="./view_weekly_stat" class="m-widget24__change">View</a>
															<a href="javascript:;" onclick="weeklyactivity()" style="    margin-left: 1.2rem;" class="m-widget24__change">Assign</a>
<!--
													<span class="m-widget24__number">
														78%
													</span>
-->
												</div>
											</div>
											<!--end::Total Profit-->
										</div>	
							<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Monthly Reports 
													</h4>
													<br>
													<span class="m-widget24__desc">
														Monthly Reports Info
													</span>
													<a href="<?php echo base_url() ?>admin/request" class="m-widget24__stats m--font-brand" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2 "></i>
													</a>
													<span class="m-widget24__stats m--font-brand">
													
													</span>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													
															<a href="./view_monthly_stat"  class="m-widget24__change">View</a>
															<a href="javascript:;" onclick="monthlyactivity()" style="    margin-left: 1.2rem;" class="m-widget24__change">Assign</a>
															
<!--
													<span class="m-widget24__number">
														78%
													</span>
-->
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										
										<?php } ?>
							<!--Close new view tab-->
									</div>
									
									<div class="row m-row--no-padding m-row--col-separator-xl">
									    
									    <?php 
										if($role!=1&&$role!=5 ){?>
<!--		start	inventory-->
										<div class="col-md-12 col-lg-6 col-xl-3">
										  <!--begin::New Users-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Inventory Management
													</h4>
													<br>
													<span class="m-widget24__desc">
														Manage Inventory
													</span>
													<a href="#" style="text-decoration: none;" class="m-widget24__stats m--font-warning">
														<i style="font-size:3.3rem;" class="flaticon-tabs"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="../inventory/view_inv" class="m-widget24__change">View</a>
													<a href="#newinv" class="m-widget24__change" data-toggle="modal" data-target="#newinv" onclick="selectTeams()">Add</a>
<!--
													<span class="m-widget24__number">
														90%
													</span>
-->
												</div>
											</div>
											
											<!--end::New Users-->
											
										</div>
										
										<?php } ?>
										
										 <?php 
										if($role!=5 && $role!=4){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
										  <!--begin::New Users-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Notification Management
													</h4>
													<br>
													<span class="m-widget24__desc">
														Manage LinkedIn
													</span>
													<a href="#" style="text-decoration: none;" class="m-widget24__stats m--font-brand">
														<i style="font-size:3.3rem;" class="flaticon-list-1"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-brand" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="javascript:;" onclick="viewlinkedinnot()" class="m-widget24__change">View List</a>
													
<!--
													<span class="m-widget24__number">
														90%
													</span>
-->
												</div>
											</div>
											
											<!--end::New Users-->
											
										</div>
										<?php } ?>
										
										<?php 
										if($role!=5){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
										  <!--begin::New Users-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Project Management
													</h4>
													<br>
													<span class="m-widget24__desc">
														Manage Projects 
													</span>
													<a href="#" style="text-decoration: none;" class="m-widget24__stats m--font-warning">
														<i style="font-size:3.3rem;" class="flaticon-tabs"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<!--<a href="../inventory/view_inv"  style="margin-left: 1.2rem;" class="m-widget24__change">View</a>--> 
													<a href="#newprojectroom" class="m-widget24__change" data-toggle="modal" >Add</a>
													<a href="view_projectrooms" class="m-widget24__change"  target = "_blank">View</a>  
													<a href="admin_chat" class="m-widget24__change"  target = "_blank">Chat</a>  

												</div>
											</div>
											
											<!--end::New Users-->
											
										</div>
										<?php } ?>
										
										<?php 
										if($role!=1&&$role!=2&&$role!=3&&$role!=5){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
										  <!--begin::New Users-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Settings
													</h4>
													<br>
													<span class="m-widget24__desc">
														Admin Settings
													</span>
													<a href="#" style="text-decoration: none;" class="m-widget24__stats m--font-success">
														<i style="font-size:3.3rem;" class="flaticon-settings"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="javascript:;" class="m-widget24__change" onclick="adminsettings()">
														Change
													</a>
<!--
													<span class="m-widget24__number">
														90%
													</span>
-->
												</div>
											</div>
											<!--end::New Users-->
											
										</div>
										<?php } ?>
									</div>
									<div class="row m-row--no-padding m-row--col-separator-xl">
									<?php  	if($role!=4 && $role!=5){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Shift Records
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														View Team Shifts
													</span>
													
													<a href="javascript:;" class="m-widget24__stats m--font-accent"  onclick="viewalldept()" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-accent" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a target="_blank" href="./view_shifts"  class="m-widget24__change">View</a>
													
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										<?php } ?>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Interview Scheduler
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Create Interview
													</span>
													
													<a href="#exam_model"  data-toggle="modal" class="m-widget24__stats m--font-danger" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-danger" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="#exam_model"  class="m-widget24__change" data-toggle="modal">Create</a>
												
													<!-- <a href="#exam_list_model" onclick="search_interview(0)"  style="    margin-left: 1.2rem;" class="m-widget24__change" data-toggle="modal">View Candidates</a> -->
													<a href="interview_list"   style=" margin-left: 1.2rem;" class="m-widget24__change">View Candidates</a>
												
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										<?php  	if($role!=4&&$role!=5){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Announcements
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Create & view Announcement
													</span>
													
													<a href="#notice_board_modal"  data-toggle="modal" class="m-widget24__stats m--font-info" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-notes"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="#notice_board_modal" class="m-widget24__change" data-toggle="modal">Create</a>
													<a href="javascript:void(0)" onclick="get_notice_board_list()"  style="    margin-left: 1.2rem;" class="m-widget24__change" data-toggle="modal">View</a>
													
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										<?php } ?>

										<?php  	if($role!=5){?>
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Hashbook
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Create & view Discussion
													</span>
													
													<a href="<?php echo base_url()."discussion/dashboard/" ?>" target="_blank" class="m-widget24__stats m--font-focus" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-chat-1"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-focus" role="progressbar" style="width: 64%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a href="<?php echo base_url()."discussion/dashboard/" ?>" class="m-widget24__change" target="_blank" >View</a>
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>

									</div>

									<div class="row m-row--no-padding m-row--col-separator-xl">
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Designation
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														Designation Info
													</span>
													
													<a href="#newdesignation_modal"  data-toggle="modal" class="m-widget24__stats m--font-focus" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-suitcase"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-focus" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a  href="#newdesignation_modal"  data-toggle="modal"  class="m-widget24__change">Create</a>
													<a  href="javascript:void(0)" onclick="view_designations()"  data-toggle="modal" style="margin-left: 1.2rem;" class="m-widget24__change">View</a>
													
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>

										<!-- Tasker -->
									
										<div class="col-md-12 col-lg-6 col-xl-3">
											<!--begin::New Feedbacks-->
											<div class="m-widget24">
												<div class="m-widget24__item">
													<h4 class="m-widget24__title">
														Tasker
													</h4>
													
													<br>
													<span class="m-widget24__desc">
														All about tasks
													</span>
													
													<a  href="/Admin/taskManagement"  target="_blank"  class="m-widget24__stats m--font-success" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-3"></i>
													</a>
													<div class="m--space-10"></div>
													<div class="progress m-progress--sm">
														<div class="progress-bar m--bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<a  href="/Admin/taskManagement"  target="_blank" class="m-widget24__change">Control Panel</a>
													
													
												</div>
											</div>
											<!--end::New Feedbacks-->
										</div>
										
										<!-- Tasker Ends -->
										</div><?php } ?>
								</div>
							</div>
							<!--end:: Widgets/Stats-->
						</div>
						
					<!--	<div class="m-content">
						<div class="alert alert-info m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">
							<div class="m-alert__icon">
								<i class="la la-star"></i>
							</div>
							<div class="m-alert__text">
								TOP PERFORMER OF THE MONTH : WHITEFANG
								
							</div>
						</div>
						
					</div>-->
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
												PE Portal
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
		
		<!-- Team  model -->
		<div class="modal fade show" id="newdesignation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
				<form id="addDesig" action="<?php echo base_url('admin/create_designation');?>" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Add new designation
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
							
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">
									Designation:
								</label>
								<input type="text" class="form-control" id="designation-text" name="designation">
							</div>
						
						
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Add
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade show" id="viewdesignation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				
					<div class="modal-header">
						<h5 class="modal-title" id="teammodel">
							Designations
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body " >
						<table class="table m-table m-table--head-bg-success">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Designation
									</th>
									<th>
										Actions
									</th>
									
								</tr>
							</thead>
							<tbody id="design_tbody">
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						
					</div>
					
				</div>
			</div>
		</div>

		<div class="modal fade show" id="newteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
				<form id="addteam" action="<?php echo base_url('admin/newteam');?>" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Add new team
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
							
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">
									Team name:
								</label>
								<input type="text" class="form-control" id="recipient-name" name="teamname">
							</div>
						
						
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Add team
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- end::Team  model -->
	
			<!-- Team  model -->
		<div class="modal fade show" id="viewteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								
									<div class="modal-header">
										<h5 class="modal-title" id="teammodel">
											Teams
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body " >
										<table class="table m-table m-table--head-bg-success">
											<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Team Name
													</th>
													<th>
														Mail ID of team manager
													</th>
													<th>
														Actions
													</th>
													
												</tr>
											</thead>
											<tbody id="teamDiv">
												
											</tbody>
											<tfoot>
												
											</tfoot>
										</table>	
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									
								</div>
							</div>
						</div>
		<!-- end::Team  model -->	
				<!-- dept  model -->
		<div class="modal fade show" id="viewDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								
									<div class="modal-header">
										<h5 class="modal-title" id="teammodel">
											Departments
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body " >
										<table class="table m-table m-table--head-bg-success">
											<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Department Name
													</th>
													
													
												</tr>
											</thead>
											<tbody id="deptDiv">
												
											</tbody>
											<tfoot>
												
											</tfoot>
										</table>	
										
										
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									
								</div>
							</div>
						</div>
		<!-- end::dept  model -->
		

		<!-- Team  model -->
		<div class="modal fade show" id="newdept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<form id="adddept" action="<?php echo base_url('admin/newdept');?>" method="post">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add new Dept
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="recipient-name" class="form-control-label">
												Dept name:
											</label>
											<input type="text" class="form-control" id="recipient-name" name="deptname">
										</div>
										
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button type="submit" class="btn btn-primary">
											Add Dept
										</button>
									</div>
									</form>
								</div>
							</div>
						</div>
		<!-- end::Team  model -->
		<!-- Admin Settings-->
		<div class="modal fade show" id="adminsettings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<form id="adminupdate" action="<?php echo base_url('admin/updateadmin');?>" method="post">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Admin Settings
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										
											<div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Username :
												</label>
												<input type="text" class="form-control"  name="adminname" value="<?php echo $this->session->userdata('email'); ?>">
												<input type="hidden" class="form-control"  name="admin_id" value="<?php echo $this->session->userdata('id'); ?>">
											</div>
											<div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Password:
												</label>
												<input type="text" class="form-control" id="recipient-name" name="adminpass" type="password">
											</div>
										
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button type="submit" class="btn btn-primary">
											Update
										</button>
									</div>
									</form>
								</div>
							</div>
						</div>
		<!-- Close Admin Settings modal-->
		<!--	JD and Daily activity modal	-->
		<div class="modal fade show" id="addJD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog  modal-lg" role="document">
								<div class="modal-content">
									<form id="addJD_form" action="<?php echo base_url('admin/change_jd');?>" method="post">
									
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add Job Descriptions
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">

								<div class="m-portlet__body">
									<div class="form-group ">
									<div class="row">
									<div class="col-md-6">
									<div class="form-group m-form__group">										
												<label >
													Select department
												</label>
												<div id="show_dep_jd" ></div>									
									</div>
									<br>
									<div class="form-group m-form__group">
										<label >Add JD here</label>													
										<textarea class="form-control m-input" rows="3"  name="jd_desc" id="jd" ></textarea>		
									</div>	
									<div class="form-group m-form__group text-center">
										<button class="btn btn-primary" type="submit" >Update JD</button>
									</div>	<br>							
									<div class="form-group m-form__group "  id="add_daily_container">
											<div id="add_daily" >
												
												<label class="form-control-label ">
													Add Daily Work Report   
												</label>
												
												<textarea  class="form-control m-input"  name="daily_act" id="daily_activity"  ></textarea>											
											</div>
									</div>	
									
									<br>
										<div class="form-group m-form__group text-center">
											<label for="exampleSelect1">
												Select input type for Daily Work Report<br>   
											<select id="daily_fieldType_id" class="form-control m-input m-input--square" name="DailyfieldType" >
												<option value="0">
													Check Box
												</option>
												<option  value="1">
													Text Field
												</option>
												<option  value="2">
													Number
												</option>
																							
																								
											</select>
											<br>
											<button id="add_button" type="button" class="btn btn-primary"  onclick="add_new_act()">Add activity</button>
										</div>
										
																				
									
									<div id="new_acct"></div>
									</div>
									<div class="col-md-6">
										<div id="activity_lists">

										</div>
									</div>
									</div>
									</div>
							
								</div>
							
							<!--end::Form-->
						
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									</form>
								</div>
							</div>
						</div>

		
				<!--	 weekly activity modal	-->
		<div class="modal fade show" id="addweekly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog  modal-lg" role="document">
								<div class="modal-content">
									<form id="addWA_form" action="<?php echo base_url('admin/addNewWeeklyActivity');?>" method="post">
									
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Set Weekly Activity
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">

								<div class="m-portlet__body">
									<div class="form-group ">
									<div class="row">
									<div class="col-md-6">
									<div class="form-group m-form__group">										
												<label >
													Select department
												</label>
												<div id="show_dep_wa" ></div>									
									</div>	
									
													
																	
																									
									<div class="form-group m-form__group "  id="add_daily_container">
											<div id="add_daily" >
												
												<label class="form-control-label ">
													Add Weekly Activity  
												</label>
												
												<textarea rows="8"  class="form-control m-input"  name="weekly_act" id="weekly_activity"  ></textarea>											
											</div>
									</div>	
										<div class="col-md-6">

										<div class="form-group m-form__group">
											<label for="exampleSelect1">
												Select the input type
											</label>
											<select class="form-control m-input m-input--square" name="fieldType" >
												<option value="0">
													Check Box
												</option>
												<option  value="1">
													Text Field
												</option>
												<option  value="2">
													Number 
												</option>											
																								
											</select>
										</div>
								</div>								
									<div class="form-group m-form__group text-right">
									<button type="submit" type="button" class="btn btn-primary"  >Add activity</button>
									</div>
									
									
																	
																									
									</div>
									
									<div class="col-md-6">
									Assigned Activities :
										<div id="weekly_activity_lists"style="height: 380px;overflow: auto;">
										
										</div>
																			
									</div>
									
									</div>
									
									</div>
							
								</div>
							
							<!--end::Form-->
						
										
									</div>
									<div class="modal-footer">
										<button onclick="" type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									</form>
								</div>
							</div>
						</div>

		<!--	close JD and Daily weekly modal	-->
<!--		Start monthly activity modal -->
	<div class="modal fade show" id="addmonthly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog  modal-lg" role="document">
								<div class="modal-content">
									<form id="addMA_form" action="<?php echo base_url('admin/addNewMonthlyActivity');?>" method="post">
									
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											 Set Monthly Activity
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">

								<div class="m-portlet__body">
									<div class="form-group ">
									<div class="row">
									<div class="col-md-6">
									<div class="form-group m-form__group">										
												<label >
													Select department
												</label>
												<div id="show_dep_ma" ></div>									
									</div>	
									
													
																	
																									
									<div class="form-group m-form__group "  id="add_daily_container">
											<div id="add_daily" >
												
												<label class="form-control-label ">
													Add Monthly Activity  
												</label>
												
												<textarea rows="8"  class="form-control m-input"  name="monthly_act" id="monthly_activity"  ></textarea>											
											</div>
									</div>	
										<div class="col-md-6">

										<div class="form-group m-form__group">
											<label for="exampleSelect1">
												Select the input type
											</label>
											<select class="form-control m-input m-input--square" name="monthlyfieldType" >
												<option value="0">
													Check Box
												</option>
												<option  value="1">
													Text Field
												</option>
												<option  value="2">
													Number 
												</option>											
																								
											</select>
										</div>
								</div>								
									<div class="form-group m-form__group text-right">
									<button type="submit" type="button" class="btn btn-primary"  >Add activity</button>
									</div>
									
									
																	
																									
									</div>
									
									<div class="col-md-6">
									Assigned Activities :
										<div id="monthly_activity_lists"style="height: 380px;overflow: auto;">
										
										</div>
																			
									</div>
									
									</div>
									
									</div>
							
								</div>
							
							<!--end::Form-->
						
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									</form>
								</div>
							</div>
						</div>
<!--		Close monthly activity modal-->
<!-- Activity  model -->
		<div class="modal fade show" id="addactivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content" style="width:440px;">
									<form id="activity_form" action="<?php echo base_url('admin/jd');?>" method="post">
									<div id="activity_form_msg"></div>
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add Activities
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									
									
									<div class="modal-body">
					
								<div class="m-portlet__body">
									<div class="form-group ">
									<div class="row">
									<div class="col-md-12">

								   <div class="form-group m-form__group row">
								    <div class="col-md-6">
										<div style="display:none;" id="reply"></div>
										
										<div id="show_dep" ></div>

										
										</div>
									</div>
									<div class="form-group m-form__group row">
										
										
										<div class="col-lg-6 col-md-9 col-sm-12">
											<div class='input-group date'>
												<input type='text' name="assign_date" class="form-control" id="m_datepicker_1" readonly placeholder="Select date"/>
												<span class="input-group-addon">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-6 col-md-9 col-sm-12">
											<div class='input-group'>
												<input type='text' name="task_name" class="form-control" id="task_name_id"  placeholder="Type task title here"/>
												
											</div>
										</div>
									</div>
									
									<div class="form-group m-form__group row">
										<div class="col-lg-6 col-md-9 col-sm-12">
											<div class='input-group'>
												<input type='text' name="task" class="form-control" id="task_id"  placeholder="Type task here"/>
												
											</div>
										</div>
									</div>
									
									</div>
									</div>
									</div>
							
								</div>
<!--			start type of field-->
								<div class="col-md-6">

									<div class="form-group m-form__group">
										<label for="exampleSelect1">
											Select the input type
										</label>
										<select class="form-control m-input m-input--square" name="ass_fieldType" >
											<option value="0">
												Check Box
											</option>
											<option  value="1">
												Text Field
											</option>

										</select>
									</div>
								</div>
<!--		    Close type of field-->
								<button type="submit" class="btn btn-primary">
									Add task
								</button>
							<!--end::Form-->
						
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									</form>
								</div>
							</div>
						</div>
		<!-- end::add activity  model -->
		
		<!-- Inventory  model -->
		<div class="modal fade show" id="newinv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<form id="add_inv" action="<?php echo base_url('inventory/add_new_inv');?>" method="post">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add New Item
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										
											<div class="form-group">
											
												<div class="form-group m-form__group">										
												<label>
													Select Item
												</label>
												
												<div id="d">
													<select id="inv-type" class="form-control m-input" name="select_inv_item">
														<option value="0">Select Type</option>
														<option value="1">Laptop</option>
														<option value="2">Desktop</option>
														<option value="3">Keyboard</option>
														<option value="4">Mouse</option>
														<option value="5">Misc</option>
													</select>
												</div>	
												
																												
									</div>
											
												<div class="form-group m-form__group">
												<label for="serial-number" class="form-control-label">
													HashRoot ID
												</label>
												<input type="text" class="form-control" id="serialno" name="serialno">
												</div>
												
												<div class="form-group m-form__group">
												<label for="brand-name" class="form-control-label">
													Brand Name
												</label>
												<input type="text" class="form-control" id="brandname" name="brandname">
												</div>
																							
												<div class="form-group m-form__group">
													<label>Specifications</label>													
													<textarea class="form-control m-input" rows="4" name="item_spec" id="item_spec"></textarea>		
												</div>
												
												
<!--												<input type="text" class="form-control" id="serialno" name="serialno">-->
												<div class="form-group m-form__group">										
													<label >
														Select Team
													</label>
													<div id="show_teams" ></div>									
												</div>
												
												
<!--											start	Upload invoices-->
									<div class="form-group m-form__group ">
											<label>Attach Invoice</label>											
											<input class="form-control m-input" type="file" name="invoice">
									   
									</div>


<!--											close	Upload invoices-->
											
											
											</div>
										 
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button type="submit" class="btn btn-primary">
											Add Item
										</button> 
									</div>
									</form>
								</div>
							</div>
						</div>
		<!-- end::Inventory  model -->
		
		
		<!--	start	view status modal-->

		<div class="modal fade show" id="view_stat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content" >
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							WORKSHEET STATUS
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="m-portlet__body">
							<div class="form-group ">
								<div class="row">
									<div class="col-md-12">
										<div id="worksheet_status">
										</div>
										<div id="daily_worksheet_status">
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<a href="./view_daily_stat" class="btn m-btn--pill m-btn--air btn-primary btn-sm">View Daily-Status</a>
						<a href="./employee_stat" class="btn m-btn--pill m-btn--air btn-primary btn-sm">View More Details</a>
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>

					</div>
				</div>
			</div>
		</div>
		
<!--		close testing add jds-->
		
<!--		close view status
		-->
		
<!-- project room modal	-->
<div class="modal fade show" id="newprojectroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		
			<form id="add_projectroom" action="<?php echo base_url('Admin/add_new_projectroom');?>" method="post">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Add New Project  
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<div class="form-group m-form__group">							
							<div class="form-group m-form__group">
							<label for="serial-number" class="form-control-label">
								Project Name
							</label>
							<input type="text" class="form-control" id="pr_name" name="pr_name">
							</div> 
						</div>
					
						<!-- <div class="form-group m-form__group">
							<label for="serial-number" class="form-control-label">
								Add Users
							</label>
																<?php
			//													 echo('<pre>');
			//													 print_r($employees); 
			//													 echo('</pre>');
							?>
							<input list="project_users" name="emps_dataflex" type="text" id="emp_input_dtflx" placeholder="Select employees" class="flexdatalist"  multiple="multiple"  data-min-length="1">
							
						<datalist id="project_users"  name="users_datalist">
					    <?php 
							foreach($employees as $emps){ 
						?>
						
						  <option value="<?php echo $emps['user_id']?>"  ><b><?php echo $emps['fullname'];?></b></option>
						  <?php 
								
							} 
							?>
							
						</datalist>
						
						</div> -->

						<div class="form-group m-form__group">
							<label for="emp_input_dtflx" class="form-control-label">
								Add Users
							</label>
							<select name="emps_dataflex[]" id="emp_input_dtflx" class="form-control select2" multiple="" style="width: 100%">
								<?php 
									foreach($employees as $emps){ 
								?>
								<option value="<?php echo $emps['user_id']?>"><?php echo $emps['fullname'];?></option>
								<?php } ?>
            				</select>
						</div> 
						

						<!-- <div class="form-group m-form__group">
							<label for="created" class="form-control-label">
								Created By
							</label>
							<input type="text" class="form-control" id="createdby" name="createdby">
						</div> -->
																	
						<div class="form-group m-form__group">
							<label>Description</label>													
							<textarea class="form-control m-input" rows="4" name="pr_desc" id="pro_desc"></textarea>		
						</div>
						

					</div>
				 
				
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
				<button  onclick = "add_project()" type="submit" class="btn btn-primary">
					Add Item
				</button> 
			</div>
			
			</form>
		</div>
	</div>
</div>
<!-- project room modal	-->


<!-- Interview  model -->
<div class="modal fade show"  id="exam_model" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<form id="exam_form" enctype="multipart/form-data" action="<?php echo base_url('cron/exam_register');?>" method="post">
			<div class="modal-header">
				<h5 class="modal-title">
					Interview Scheduler
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="candidate_name" class="form-control-label">Candidate name:</label>
							<input type="text" class="form-control" id="candidate_name" name="candidate_name">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="candidate_email" class="form-control-label">Candidate email:</label>
							<input type="text" name="candidate_email" id="candidate_email" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="candidate_phone" class="form-control-label">Candidate Phone:</label>
							<input type="text" name="candidate_phone" id="candidate_phone" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="m_datepicker_1" class="form-control-label">Date Of Interview </label>
							<input type="text" name="interview_date" class="form-control" id="m_datetimepicker_4_3" readonly="" placeholder="Select date &amp; time">
						</div>
					</div>
					<div class="col-md-4">	
						<div class="form-group">
							<label for="exampleInputEmail1" class="form-control-label">
								Position
							</label>
							<input type="text" name="candidate_position" class="form-control"   placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-form__group ">
							<label>Attach Resume</label>											
							<input class="form-control m-input" type="file" name="resume">
						</div>
					</div>

				</div>
				
				<div class="row">
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="notice_period" class="form-control-label">Notice Period:</label>
							<input type="text" name="notice_period" id="notice_period_exam" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-form__group ">
							<label>ETC:</label>											
							<input class="form-control m-input" type="text" name="expected_salary">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="current_salary" class="form-control-label">CTC:</label>
							<input type="text" name="current_salary" id="current_salary" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="examiner" class="form-control-label">
								Interviewers :
							</label>
							<select name="examiner[]" id="examiner" class="form-control select2"  style="width: 100%" multiple="multiple">
								<?php 
									foreach($current_employees as $emps){ 
								?>
								<option value="<?php echo $emps['user_id']?>"><?php echo $emps['fullname'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="interview_mode" class="form-control-label">Mode of Interview:</label>
							<select class="form-control m-input m-input--air" id="interview_mode_create" name="interview_mode">
								<option value="Face to Face">Face to Face</option>
								<option value="Telephonic">Telephonic</option>
								<option value="skype">Skype</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group m-form__group mrg-top-30">
							<label class="m-checkbox m-checkbox--solid m-checkbox--success" >
								Prioritize <input type="checkbox" name="priority" id="interview_priority"> 
									<span></span>
							</label>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="interview_status" class="form-control-label">Status:</label>
							<select class="form-control m-input m-input--air" onchange="changeInterviewStatus(this.value,'create')" id="interview_status" name="interview_status">
								<option value="open">Open</option>
								<option value="not interested">Not Interested</option>
								<option value="unavailable">Unavailable</option>
								<option value="didn't appear">Didn't Appear</option>
								<option value="1st interview scheduled">1st Interview scheduled</option>
								<option value="interviewed">Interviewed</option>
								<option value="2nd interview scheduled">2nd Interview scheduled</option>
								<option value="for review">For Review</option>
								<option value="schedule 2nd round">Schedule 2nd Round</option>
								<option value="review done">Review Done</option>
								<option value="selected">Selected</option>
								<option value="on hold">On Hold</option>
								<option value="unqualified">Unqualified</option>
								<option value="offered">Offered</option>
								<option value="declined">Offer Declined</option>
								<option value="joined">Joined</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3" id="date_join" style="display:none;">
						<div class="form-group">
							<label for="" class="form-control-label">Date Of Joining </label>
							<input type="text" name="joining_date" class="form-control" id="m_datepicker_joindate" placeholder="Select date">
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group m-form__group ">
							<label>Comments:</label>
							<textarea name="comments" class="form-control m-input" rows="4"></textarea>
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-primary">
					Save
				</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Interview modal -->

<div class="modal fade show"   role="dialog" aria-labelledby="exampleModalLabel" id="edit_exam_modal" class="m-scrollable m-scroller ps ps--active-y ps--active-x" data-scrollbar-shown="true" data-scrollable="true" data-height="200" >
			<div class="modal-dialog modal-xlg" role="document">
				<div class="modal-content"  >
					<form id="update_interview" enctype="multipart/form-data" action="<?php echo base_url('cron/update_interview');?>" method="post">
						<div class="modal-header">
							<h5 class="modal-title">
								Update Interview Scheduler
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									×
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="candidate_name" class="form-control-label">Candidate name:</label>
										<input type="text" class="form-control" id="candidate_name_updated" name="candidate_name">
										<input type="hidden" value="" class="form-control" id="candidate_id_hidden" name="candidate_id">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="candidate_email" class="form-control-label">Candidate email:</label>
										<input type="text" name="candidate_email" id="candidate_email_updated" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="candidate_phone" class="form-control-label">Candidate Phone:</label>
										<input type="text" name="candidate_phone" id="candidate_phone_updated" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="m_datepicker_1" class="form-control-label">Date Of Interview </label>
										<input type="text"  name="interview_date" class="form-control" id="m_datetimepicker_4_3_updated" placeholder="Select date &amp; time">
									</div>
								</div>
								<div class="col-md-4">	
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-control-label">
										Position
										</label>
										<input type="text" name="candidate_position" id="candidate_position_updated" class="form-control"   placeholder="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group m-form__group ">
										<label>Attach Resume</label>											
										<input id="resume_attach_updated" class="form-control m-input" type="file" name="resume">
									</div>
								</div>
								
							</div>
							
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="notice_period" class="form-control-label">Notice Period:</label>
										<input type="text" name="notice_period" id="notice_period_exam_updated" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="current_salary" class="form-control-label">CTC:</label>
										<input type="text" name="current_salary" id="current_salary_updated" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group m-form__group ">
										<label>ETC:</label>											
										<input class="form-control m-input" type="text" id="expected_salary_updated" name="expected_salary">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group m-form__group mrg-top-24">
										<div id="download_resume">
											
										</div>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="examiner" class="form-control-label">
											Interviewers :
										</label>
										<select name="examiner[]" id="examiner_updated" class="form-control select2"  style="width: 100%" multiple="multiple">
											<?php 
												foreach($current_employees as $emps){ 
											?>
											<option value="<?php echo $emps['user_id']?>"><?php echo $emps['fullname'];?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="interview_mode" class="form-control-label">Mode:</label>
										<select class="form-control m-input m-input--air" id="interview_mode_updated" name="interview_mode">
											<option value="Face to Face">Face to Face</option>
											<option value="Telephonic">Telephonic</option>
											<option value="skype">Skype</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group m-form__group mrg-top-30">
										<label class="m-checkbox m-checkbox--solid m-checkbox--success" >
											Prioritize <input type="checkbox" name="priority" id="interview_priority_updated"> 
												<span id="priority_updated"></span>
										</label>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="interview_status" class="form-control-label">Status:</label>
										<select class="form-control m-input m-input--air" onchange="changeInterviewStatus(this.value,'update')" id="interview_status_updated" name="interview_status">
											<option value="open">Open</option>
											<option value="not interested">Not Interested</option>
											<option value="unavailable">Unavailable</option>
											<option value="didn't appear">Didn't Appear</option>
											<option value="1st interview scheduled">1st Interview scheduled</option>
											<option value="interviewed">Interviewed</option>
											<option value="2nd interview scheduled">2nd Interview scheduled</option>
											<option value="for review">For Review</option>
											<option value="schedule 2nd round">Schedule 2nd Round</option>
											<option value="review done">Review Done</option>
											<option value="selected">Selected</option>
											<option value="on hold">On Hold</option>
											<option value="unqualified">Unqualified</option>
											<option value="offered">Offered</option>
											<option value="declined">Offer Declined</option>
											<option value="joined">Joined</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3" id="date_join_updated" style="display:none;">
									<div class="form-group">
										<label for="" class="form-control-label">Date Of Joining </label>
										<input type="text" name="joining_date" class="form-control" id="m_datepicker_joindate_updated"  placeholder="Select date">
									</div>
								</div>
								
								
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group m-form__group ">
										<label>Comments:</label>
										<textarea name="comments" id="comments_updated" class="form-control m-input" rows="4"></textarea>
									</div>
								</div>
							</div>
						
							
						</div>
						<div class="modal-footer">
							<span id="delete_scheduled_interview"></span>
							<button type="reset" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">
								Save Changes
							</button>
						</div>
						</form>
					</div>
			</div>
		</div>

<div class="modal fade show" class="m-scrollable m-scroller ps ps--active-y ps--active-x" data-scrollbar-shown="true" data-scrollable="true" data-height="200" id="exam_list_model" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-xlg" role="document">
				<div class="modal-content">
				<form id="#list_exam_details" action="" method="post">
					<div class="modal-header">
						<h5 class="modal-title">
							Interview List
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="m-scrollable m-scroller ps ps--active-y" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="height: 500px; overflow: hidden;">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="m_datepicker_1" class="form-control-label">Start Date</label>
										<input type='text' name="start_date" class="form-control start_date" id="m_datepicker_1" readonly placeholder="Select date"/>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="m_datepicker_1" class="form-control-label">End Date</label>
										<input type='text' name="end_date" class="form-control end_date" id="m_datepicker_1" readonly placeholder="Select date"/>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="search-interview" class="form-control-label">&nbsp;</label><br>
										<button onclick="search_interview(1)" type="button" class="btn btn-primary" id="search-interview" name="search-interview">Search Interview</button>
									</div>
								</div>
							</div>
							
							<div class="m--hide" id="interview-list-container">
								<table class="table table-striped m-table m-table--head-bg-brand">
									<thead>
										<tr>
											<th>Interview Date</th>
											<th>Candidate Name</th>
											<th>Position</th>
											<th>CTC</th>
											<th>ETC</th>
											<th>Notice Period</th>
											<th>Status</th>
											<!-- <th id="joining_head" style="display:none;">Date of Joining</th> -->
										</tr>
									</thead>
									<tbody id="interview-list"></tbody>
								</table>
							</div>
						</div>
						<!-- end scroll -->
					</div>
					
					</form>
				</div>
			</div>
		</div>
		<!-- end::Exam  model -->

		<div class="modal fade show" id="notice_board_modal" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<!-- <form id="notice_board_form" action="<?php echo base_url('admin/save_notice');?>" method="post"> -->
				<form id="notice_board_form" action="" method="post">
					<div class="modal-header">
						<h5 class="modal-title">
							Announcements
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
					
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="candidate_name" class="form-control-label">Recepient:</label>
									<select class="form-control" name="notice_usertype" id="notice_usertype">
										<option value="">select</option>
										<option value="all">All</option>
										<option value="individual">Individual</option>
										<option value="team">Team</option>
										<option value="department">Department</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="candidate_name" class="form-control-label">Notice Type:</label>
									<select class="form-control" id="notice_color">
										<option value="level 1">Common</option>
										<option value="level 2">Intermediate</option>
										<option value="level 3">Important</option>
										<!-- <option value="level 4">Level 4</option>
										<option value="level 5">Level 5</option> -->
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 hide" id="notice_users_list_div">	
								<div class="form-group">
									<label for="exampleInputEmail1" class="form-control-label">
										<span id="notice_users_label"></span>
									</label>
									<select name="notice_user[]" id="notice_user" multiple="true" class="form-control select2"  style="width: 100%"></select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="notice_id" id="notice_id">
									<div class="summernote" id="notice_text" name="notice_text"></div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="button" id="notice_board_btn" class="btn btn-primary">
							Publish
						</button>
						<button type="button" id="notice_board_update_btn" class="btn btn-primary hide">
							Update
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade show" id="notice_board_list_modal" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Notice Board
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<table class="table m-table m-table--head-bg-success">
									<thead>
										<tr>
											<th>ID</th>
											<th>Notice</th>
											<th>Recepient</th>
											<th>Date</th>
											<th>User</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="notice_board_tbody">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- LinkedIn Notifacation  model -->
		<div class="modal fade show" id="viewlinkedinlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								
									<div class="modal-header">
										<h5 class="modal-title" id="teammodel">
											Pending List
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body " >
										<table class="table m-table m-table--head-bg-success">
											<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Employee Name
													</th>
																										
												</tr>
											</thead>
											<tbody id="notifDiv">
												
											</tbody>
											<tfoot>
												
											</tfoot>
										</table>	
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
									
								</div>
							</div>
						</div>
		<!-- end::LinkedIn  model -->		
		<?php include_once('chat_widget.php') ?>	
		
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		
		<script src="<?php echo base_url();?>assets/js/typeahead.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/dropdown.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<link href="<?php echo base_url();?>assets/assets/select2/dist/js/select2.full.min.js">
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/summernote/summernote.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<!--end::Base Scripts -->

		<script type="text/javascript">
			$('.select2').select2();
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
			    saveToken();
			});
		</script>

		<script>
			  $('#exam_form').ajaxForm({
					dataType:'json', 
						success: function(response, status, xhr, $form){
							console.log(response);
							if(response.status == true){
							
								$("#exam_model").modal('toggle');
								$.notify({
									title: '<strong>Success!</strong>',
									message:response.message
								},{
									type: 'success',
									z_index: 10000,
								});
								
								$('#examiner').val(null);
								$('#examiner').trigger('change');
								$('#exam_form')[0].reset();

							}else{
								$.notify({
									title: '<strong>Failed!</strong>',
									message:response.message
								},{
									type: 'danger',
									z_index: 10000,
								});
							}
						}
				});
		</script>

	</body>
	<!-- end::Body -->
</html>
