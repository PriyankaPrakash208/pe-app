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
		#PE | Work Reports
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
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body  class="m-page--fluid m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
										<img alt="" width="175px;" src="<?php echo base_url();?>assets/img/user/logo.png"/>
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
						
					</div>
				</div>
			</div>
			
		</header>
		<!-- end::Header -->
		<!-- begin::Body -->
		<div class="m-grid m-grid--hor-desktop m-grid--desktop">
<!--		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop">-->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxxl ">
				<!-- BEGIN: Left Aside -->
			
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid ">
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row col-md-12">
							<div class="col-md-3" style="padding-left:0;">
								<div class="m-portlet  " style="background-color:#2f3e47;height: 100%;margin-bottom: 0;">
								<div class="m-portlet__head" style="border-bottom: 0; padding: 0;">
									<img src="<?php if(file_exists('/home/hashroot/pe/assets/img/user/'.$emp_id.'.jpg')){echo base_url('assets/img/user/'.$emp_id.'.jpg');}else{ echo base_url('assets/img/user/avatar.png'); } ?>" alt="" style="width: 100%">

										<div class="m-card-profile" style="padding: 0;">
											
											<!--<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper" style="border:solid 2px #2b3942;">
												</div>
											</div>-->
											
											<div  class="m-card-profile__details" style="padding-top: 3px; padding-bottom: 10px; margin-top: -68px;    background: #2730359e;
    position: relative;">
												<span id="up_name" class="m-card-profile__name" style="color:#fff;">
														<?php  echo $fullname;?>
													</span>
											
												<a href="" style="color:#fff;" class="m-card-profile__email m-link">
														<?php echo $email; ?>
													</a>
											
											</div>
										</div>
									</div>
									<div class="m-portlet__body col-md-12"style="padding-top: 0;" >
										<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides" style="color:#ebebef;    background:#243139;">
<!--											<li class="m-nav__separator m-nav__separator--fit"></li>-->
											<li class="m-nav__item">
												<div class="m-nav__link">
								<i class="m-nav__link-icon fa fa-id-badge" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text">
																	HashRoot ID   
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
																	Department   
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
								<i class="m-nav__link-icon fa fa-users" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Team   
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="">
																  <?php echo $name;?>
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
																	DOB  
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
																	Phone No
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
																	Date of Joining 
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
																		
							Casual Leaves  <span class="float-right "><?php if(!empty($casual->total)){echo($casual->total);} else {echo 0;} ?> </span>
							<br />
							Medical Leaves  <span class="float-right  "><?php if(!empty($sick->total)){echo($sick->total);} else {echo 0;} ?> </span>
							<br />
							Home Logins  <span class="float-right "><?php if(!empty($wfh->total)){echo($wfh->total);} else {echo 0;} ?></span>
							<br />
							Loss of Pay   <span class="float-right  "><?php if(!empty($lop->total)){echo($lop->total);} else {echo 0;} ?></span>

													</div>
												
								</div>
									<div class="m-alert m-alert--air alert alert-dismissible fade show" style=" background: #243139;
    margin:5px 10px;
    color: #d0d0d0;">
													
													<div class="m-alert__text">
											
Articles Points <span class="float-right"> <?php echo $blogpost; ?></span>
<br />
Seminars Points <span class="float-right "> <?php echo $seminars; ?></span>
														<br />
	White paper Points <span class="float-right "> <?php echo $blogpost; ?> </span>		
													</div>
													
												</div>
							</div>
							</div>

<!--						close testing-->
			<div class="col-lg-9">
				<div class="m-portlet m-portlet--full-height m-portlet--tabs ">
					<div class="m-portlet__head">
					<h5 class="m-portlet__head-text" style="padding-top:10px;">
						<h5 class="m--font-primary">REPORTS HISTORY</h5>
					</h5>
					</div>
					<div class="m-portlet__body">
						<div class="col-md-8"> </div>
							<form class="m-form m-form--fit m-form--label-align-right" action="./reports_user"  method="post" id="wrokReport">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-md-4 col-sm-12">
												Please select a date
											</label>
											
											<div class="col-lg-4 col-md-8 col-sm-12" style="margin-bottom:10px;">
												<div class="input-group date" id="">
													<input type='text' class="form-control" name="date_of_report" id="user_report_datepicker" readonly placeholder="Select date"/>
													<span class="input-group-addon">
														<i class="la la-calendar-check-o"></i>
													</span>
													
												</div>
												
											</div>
											<div class="col-lg-4 col-md-3 col-sm-3">
												<button class="btn btn-primary m-btn m-btn--custom" type="submit" 	>Proceed</button> 
											</div>
										
										</div>
								</div>
							</form>
								
<!--	Close Date picker-->
						<div id="list_reports_user">
        					<table class="table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover">
								<thead>
									<th>Report</th>
									<th>Date & Time</th>
								</thead>
								<?php foreach($all_reports as $info){?>
									<tr>
										<td>
											<?php echo nl2br($info['workreport']); ?>
										</td>
										<td>
											<?php echo $info['time']; ?>
										</td>

									</tr>
									<?php } ?>							
							</table>
								</div>
									<div style="margin-top:70px;">
									</div>
									
								</div>
										
						</div>
	   		</div>	
	</div>		
</div>
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		
		
<!--		test-->

<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/user_custom.js" type="text/javascript"></script>

<!--	close test	-->
		
		
<!--		test-->
<script type="text/javascript">
	$('#month_history').on('submit', function(event)
		{
			
			event.preventDefault();
//			alert('hii');
			var dataString = $("#month_history").serialize();
			var url="user/month_picker"
			$.ajax(
				{
					type:"POST",
					url:"<?php echo base_url() ?>"+url,
					data:dataString,
					dataType: 'html',
					success:function (data)
					{
//						alert('hii2');
						console.log(data);
//						$('#new-div').html(	data);
						
						$('#new-div').html(data);

//						$("#newsletter_form")[0].reset();
					}
				});
				return false;
		})
	
</script>
<!--	close test-->
		
		<!--end::Base Scripts -->
		</ body>
		<!-- end::Body -->
		</ html>