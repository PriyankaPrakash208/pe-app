<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
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
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m-page--fluid m-header--fixed-mobile m-content--skin-light2 m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
									<a href="index.html" class="m-brand__logo-wrapper">
										<img alt="" src="<?php echo base_url();?>assets/img/user/logo.png"/>
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
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">

										<!--	<a href="<?php echo base_url();?>User/attendance" class="m-nav__link ">
													
													<span class="m-nav__link-icon">
														<span style="font-size:1rem;font-weight:500;" >
														
														</span>
													</span>
												</a>-->
										
<a href="<?php echo base_url();?>User/attendance" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill " style="margin-top: 27%;">
															<i class="fa flaticon-list"></i>
														</a>
										</li>
										<span style="color:white;">|&nbsp;&nbsp;&nbsp;</span>
										
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url();?>assets/app/media/img/user/user.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
													<span class="m-topbar__welcome">
														Hello,&nbsp;
													</span>
													<span class="m-topbar__username">
													
														<?php 
															if($this->session->userdata('user_id')){
																echo $fullname;
															}
														    else{
																redirect('index.php');
															}
														?>													
													</span>
												</a>
										

											
										</li>
										
				<?php 	if($this->session->userdata('email')!='admin'){
											
											?>
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
										<?php
												}
										?>
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
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl ">
				<!-- BEGIN: Left Aside -->
			
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid ">
					<!-- BEGIN: Subheader -->
<!--
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									My Profile
								</h3>

							</div>
							
						</div>
					</div>
-->

					<!-- END: Subheader -->
					<div class="m-content"style="    background-color: #f2f3f8;">
						<div class="row"  style="margin-right:0;margin-left:0;">
							<div class="col-md-3" style="padding-left:0;">
								<div class="m-portlet  " style="background-color:#2f3e47;height: 100%;margin-bottom: 0;">
								<div class="m-portlet__head" style="border-bottom: 0; padding: 0;">
									<img src="https://www.hashroot.com/assets/images/management/Bibin.jpg" alt="" style="width: 100%">

										<div class="m-card-profile" style="padding: 0;">
											
											<!--<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper" style="border:solid 2px #2b3942;">
												</div>
											</div>-->
											
											<div  class="m-card-profile__details" style="padding-top: 3px; padding-bottom: 10px; margin-top: -68px;    background: #243139c2;
    position: relative;">
												<span id="up_name" class="m-card-profile__name" style="color:#fff;">
														<?php  echo $fullname;?>
													</span>
											
												<a href="" style="color:#cacaca;" class="m-card-profile__email m-link">
														<?php echo $email; ?>
													</a>
											
											</div>
										</div>
									</div>
									<div class="m-portlet__body"style="padding-top: 0;" >
										
										
										<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides" style="color:#ebebef;    background:#243139;">
<!--											<li class="m-nav__separator m-nav__separator--fit"></li>-->
											<li class="m-nav__item">
												<div class="m-nav__link">
								<i class="m-nav__link-icon fa fa-id-badge" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text">
																	Employee Id  : 
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="">
																  <?php echo $emp_id;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>
											<li class="m-nav__item">
												<div class="m-nav__link">
								<i class="m-nav__link-icon fa fa-star" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Department  : 
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="">
																  <?php echo $dep_name;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											</li>
											<li class="m-nav__item">
												<div class="m-nav__link">
<!--													<i class="m-nav__link-icon flaticon-profile-1"></i>-->														<i class="m-nav__link-icon fa fa-birthday-cake" aria-hidden="true"></i>
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text " >
																	DOB  : 
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="" id="up_dob">

																		<?php 
//																			$timestamp = strtotime($dob);
																
																			?>

																  <?php echo date('d-m-Y', $dob);?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>

											<li class="m-nav__item">
												<div class="m-nav__link">
											<i class="m-nav__link-icon fa fa-phone" aria-hidden="true"></i>								
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Phone No: 
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span id="up_phone" class="">
																  <?php echo $phone;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>
											<li class="m-nav__item">
												<div class="m-nav__link">
													<i class="m-nav__link-icon fa fa-calendar" aria-hidden="true"></i>
												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text">
																	Date of Joining :
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="">
																 
																 	 <?php echo date('d-m-Y',$date_of_join);?>
																	</span>
																</span>
															</span>
														</span>
												</div>
   											</li>

							</ul>
								
										
											

									</div>
									<div class="m-alert m-alert--air alert alert-dismissible fade show" style="    background: #243139;
    margin: 0px 10px;
    color: #d0d0d0;">
													
													<div class="m-alert__text">
													
							Casual leaves : <span class="float-right "><?php echo($casual->total); ?></span>
							<br />
							Medical leaves : <span class="float-right  "><?php echo($sick->total); ?></span>
							<br />
							Work from home :  <span class="float-right "><?php echo($wfh->total); ?></span>
							<br />
							Loss of Pay :  <span class="float-right  "><?php echo($lop->total); ?></span>

													</div>
												
								</div>
									<div class="m-alert m-alert--air alert alert-dismissible fade show" style=" background: #243139;
    margin:5px 10px;
    color: #d0d0d0;">
													
													<div class="m-alert__text">
												
Articles Points: <span class="float-right"> <?php echo $blogpost; ?></span>
<br />
Seminars Points: <span class="float-right "> <?php echo $seminars; ?></span>
														<br />
	White paper : <span class="float-right "> <?php echo $blogpost; ?> </span>		
													</div>
													
												</div>
							</div>
							</div>
							<div class="col-md-9" >
							<div class="m-subheader " style="padding: 15px 1px;">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									PE Attendance
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?php echo base_url(); ?>user/dashboard" class="m-nav__link">
											<span class="m-nav__link-text">
												Dashboard
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Attendance
											</span>
										</a>
									</li>
									
								</ul>
							</div>
							
						</div>
					</div>
							<div class="row">
								<div class="col-md-12">
									<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Set Today timing
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
												<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
													<div class="m-demo__preview m-demo__preview--btn">
													
														<button id="btnpunchin" onclick="punchIn()"
														 <?php 
														 if(empty($attendance[date('d')]['out'])  && !empty($attendance[date('d')]['in'])){echo"disabled='true'";  }
														  ?> 
														 class="btn btn-primary m-btn m-btn--icon"  >
															<span>
																<i class="fa flaticon-diagram"></i>
																<span>
																	Punch in  
																</span>
															</span>
														</button>														
														<button id="btnbreak" break="off" class="btn btn-danger m-btn m-btn--icon">
															<span>
																<i class="fa flaticon-warning-2"></i>
																<span>
																	Break
																</span>
															</span>
														</button>
														<button   id="btnpunchout"  class="btn btn-info m-btn m-btn--icon">
															<span>
																<i class="fa flaticon-symbol"></i>
																<span>
																	Punch out
																</span>
															</span>
														</button>	
														<hr />	
														<span id="punchin"> 
<?php  if(!empty($attendance[date('d')]['in'])){echo date('d M Y h:i a',$attendance[date('d')]['in']);  }  ?>															
														</span>	
														<span style="float: right;" id="punchout"></span>																		
													</div>
												</div>
											</div>
											
										</div>
										<!--end::Section-->
									</div>
								</div>
								</div>
								
								<div class="col-md-12">
									<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Set Today timing
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
											<table class="table m-table m-table--head-bg-success">
												<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Punch in
													</th>
													<th>
														Punch out
													</th>
													<th>
														Break time
													</th>
													<th>
														Total time
													</th>
												</tr>
											</thead>
																						
												<?php
												$i=0;
												$tr=' ';
												$ts=' ';
												foreach($attendance as $att){
													echo "<tr>";
													$i++;
													echo "<td>".$i."</td>";
													echo "<td>".$att['intime']."</td>";	
													echo "<td>".$att['outtime']."</td>";
											if(!empty($att['break']['diff'])){echo "<td>".round($att['break']['diff']/60)."min </td>";}else{echo "<td> not set </td>";}	
											if(!empty($att['total'])){echo "<td>".($att['total'])."min </td>";}else{echo "<td> not set </td>";}	
													
													echo "</tr>";												
												}												
												  
												 ?>
												 </table>	
											</div>
											
										</div>
										<!--end::Section-->
									</div>
								</div>
								</div>
							</div>
							</div>
							
</div>
</div>
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
	</div></div></div>	</div>	
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		
		<!--end::Base Scripts -->
		</ body>
		<!-- end::Body -->
		</ html>