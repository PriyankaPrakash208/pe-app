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

	<script>
		if (window.screen.width < 640) {
   // resolution is below 10 x 7
   window.location = 'm.mysite.com'; //for example
 }
	</script>
	<!--begin::Base Styles -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
	<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
	<style type="text/css">
		.warning-level-1{
			background: #ff5e00;
    		height: 7px;
    		margin-top: 0 !important;
    		margin-bottom: 0 !important;
		}
		.warning-level-2{
			background: red;
    		height: 7px;
    		margin-top: 0 !important;
    		margin-bottom: 0 !important;
		}
		#overlay{
  position:fixed;
  z-index:99999;
  top:0;
  left:0;
  bottom:0;
  right:0;
  background:#ffffff12;
  transition: 1s 0.4s;
}
#progress{
  height:1px;
  background:#000;
  position:absolute;
  width:0;
  top:50%;
}
#progstat{
  font-size:0.7em;
  letter-spacing: 3px;
  position:absolute;
  top:55%;
  margin-top:-40px;
  width:100%;
  text-align:center;
  color:#000;
}
.browser-screen-loading-content {
  text-align: center;
  height: 2em;
  max-width: 100%;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 3em;
  left: 0;
  margin: auto;
}
.loading-dots {
  margin-left: -1.5em;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -webkit-animation: loading-dots-fadein .5s linear forwards;
  -moz-animation: loading-dots-fadein .5s linear forwards;
  -o-animation: loading-dots-fadein .5s linear forwards;
  -ms-animation: loading-dots-fadein .5s linear forwards;
  animation: loading-dots-fadein .5s linear forwards;
}
.loading-dots i {
  width: 1em;
  height: 1em;
  display: inline-block;
  vertical-align: middle;
  background: #e0e0e0;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  margin: 0 .125em;
  -webkit-animation: loading-dots-middle-dots .5s linear infinite;
  -moz-animation: loading-dots-middle-dots .5s linear infinite;
  -o-animation: loading-dots-middle-dots .5s linear infinite;
  -ms-animation: loading-dots-middle-dots .5s linear infinite;
  animation: loading-dots-middle-dots .5s linear infinite;
}
.loading-dots.dark-gray i {
  background: #707070;
}
.loading-dots i:first-child {
  -webkit-animation: loading-dots-first-dot .5s infinite;
  -moz-animation: loading-dots-first-dot .5s linear infinite;
  -o-animation: loading-dots-first-dot .5s linear infinite;
  -ms-animation: loading-dots-first-dot .5s linear infinite;
  animation: loading-dots-first-dot .5s linear infinite;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -webkit-transform: translate(-1em);
  -moz-transform: translate(-1em);
  -o-transform: translate(-1em);
  -ms-transform: translate(-1em);
  transform: translate(-1em);
}
.loading-dots i:last-child {
  -webkit-animation: loading-dots-last-dot .5s linear infinite;
  -moz-animation: loading-dots-last-dot .5s linear infinite;
  -o-animation: loading-dots-last-dot .5s linear infinite;
  -ms-animation: loading-dots-last-dot .5s linear infinite;
  animation: loading-dots-last-dot .5s linear infinite;
}


@-moz-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-fadein{100%{opacity:1;-ms-filter:none;filter:none}}

@-moz-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-webkit-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@-o-keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}
@keyframes loading-dots-first-dot{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em);opacity:1;-ms-filter:none;filter:none}}


@-moz-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-webkit-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@-o-keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}
@keyframes loading-dots-middle-dots{100%{-webkit-transform:translate(1em);-moz-transform:translate(1em);-o-transform:translate(1em);-ms-transform:translate(1em);transform:translate(1em)}}


@-moz-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-webkit-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@-o-keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
@keyframes loading-dots-last-dot{100%{-webkit-transform:translate(2em);-moz-transform:translate(2em);-o-transform:translate(2em);-ms-transform:translate(2em);transform:translate(2em);opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0)}}
	</style> 
		<script>
		;(function(){
  function id(v){return document.getElementById(v); }
  function loadbar() {
    var ovrl = id("overlay"),
        prog = id("progress"),
        stat = id("progstat"),
        img = document.images,
        c = 0;
        tot = img.length;

    function imgLoaded(){
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      //prog.style.width = perc;
      //stat.innerHTML = "Loading "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading(){
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg     = new Image();
      tImg.onload  = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src     = img[i].src;
    }    
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());
		</script>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body onload="get_daily_acts(<?php echo $user_id;?>)" class="m-page--fluid m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div id="overlay">
        <div id="progstat">        
		<div class="browser-screen-loading-content">
  <div class="loading-dots dark-gray">
    <i></i>
    <i></i>
    <i></i>
    <i></i>
  </div>
</div>
	</div>
        <div id="progress"></div>
      </div>
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
<!--														<img src="assets/app/media/img/user/user.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>-->
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

										

										<li id="m_quick_sidebar_toggle" class="m-nav__item">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-chat-1"></i>
													</span>
												</span>
											</a>
										</li>

										<li class="m-nav__item" data-toggle="tab" href="#m_user_profile_tab_7" role="tab">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-information"></i>
													</span>
												</span>
											</a>
										</li>

										<li class="m-nav__item" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-settings"></i>
													</span>
												</span>
											</a>
										</li>

										<!-- <li class="m-nav__item"  data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-settings"></i>
													</span>
												</span>
											</a>
										</li> -->


										<!-- <a class="nav-link m-tabs__link" onclick="viewallrequests();" data-toggle="tab" href="#m_user_profile_tab_5" role="tab">
															Requests
													</a> -->
										
										
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

		<div class="modal fade show" id="evaluation_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
				
					<div class="modal-header">
						<h5 class="modal-title">
							<span id="evaluation_title"></span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table m-table m-table--head-bg-brand">
							<th>
								<tr>
									<td>Score</td>
									<td>Date</td>
									<td>Comment</td>
								</tr>
							</th>
							<tbody id="evaluation_details">
								<!-- <?php foreach ($pe as $value) {
									if($value->criteria == 'Public review'){ ?>
										<tr>
											<td><?php echo $value->point; ?></td>
											<td><?php echo  date('Y-m-d',$value->time); ?></td>
											<td><?php echo $value->comments; ?></td>
										</tr>
									<?php }
								} ?> -->	
							</tbody>
						</table>
							
						
					</div>
					
				</div>
			</div>
		</div>


		<!-- <div class="modal fade show" id="ticket_updating_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				
					<div class="modal-header">
						<h5 class="modal-title">
							<span>Ticket Details</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body" >
						<div class="form-group m-form__group row">
							<table class="table m-table m-table--head-bg-success">
								<thead>
									<tr>
										<td>Ticket Id</td>
										<td>Response</td>
										<td>SLA</td>
									</tr>
								</thead>
								<form id="ticket_modal_form">
									<tbody id="ticket_modal_body">
										
									</tbody>
								</form>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="button" id="ticket_details_submit_btn" class="btn btn-secondary" >
							Save
						</button>
					</div>
					
				</div>
			</div>
		</div> -->

		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop">
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxxl ">
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
					<div class="m-content">
						<div class="row"  style="margin-right:0;margin-left:0;">
							<div class="col-md-22" style="padding-left:0;">
								<div class="m-portlet  " style="background-color:#2f3e47;height: 100%;margin-bottom: 0;">
								<div class="m-portlet__head" style="border-bottom: 0; padding: 0;">
									
									<img src="<?php if(file_exists('/home/hashroot/pe/assets/img/user/'.$emp_id.'.jpg')){echo base_url('assets/img/user/'.$emp_id.'.jpg');}else{ echo base_url('assets/img/user/avatar.png'); } ?>" alt="" style="width: 100%">

										<div class="m-card-profile" style="padding: 0;">
											
											<!--<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper" style="border:solid 2px #2b3942;">
												</div>
											</div>-->

											
											<div  class="m-card-profile__details" style="padding-top: 3px; padding-bottom: 12px; margin-top: -68px;    background: #2730359e;
    position: relative;">
												<span id="up_name" class="m-card-profile__name" style="color:#fff;">
												<?php if($core == 1) echo '<i class="fa fa-star float-right core" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Core Member" data-skin="dark" style="color:gold;font-size: 20px;padding: 2%;margin-left: -39px;"></i>'; ?>		<?php  echo $fullname;?>
													</span>
											
												<a href="" style="color:#fff;" class="m-card-profile__email m-link">
														<?php echo $email; ?>
													</a>
											
											</div>
											<?php if($warning_level == 1){
												echo '<hr class="warning-level-1" data-toggle="m-tooltip" data-placement="left" title="" data-original-title="Warning level 1" data-skin="dark"></hr>';
											} else if($warning_level == 2){
												echo '<hr class="warning-level-2" data-toggle="m-tooltip" data-placement="left" title="" data-original-title="Final Warning" data-skin="dark"></hr>';
											} ?>
										</div>
									</div>
									<div class="m-portlet__body"style="padding-top: 0;" >
										
										
										<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides" style="color:#ebebef;    background:#333e44;">
<!--											<li class="m-nav__separator m-nav__separator--fit"></li>-->
											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
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
												<div class="m-nav__link m-nav__sidebaritem">
<!--												<i class="far fa-address-card"></i>-->
<!--								<i class="m-nav__link-icon  fa-address-card" aria-hidden="true"></i>-->
													
													<i class="m-nav__link-icon fa fa-address-card-o" aria-hidden="true"></i>	
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap" >
																<span class="m-nav__link-text" >
																	Designation   
																</span>
																<span class="m-nav__link-badge m-nav__link-text" >
																	<span class="">
																  <?php echo $designn;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											</li>
											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
								<i class="m-nav__link-icon fa fa-users" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Team   
																</span>
																<span class="m-nav__link-badge m-nav__link-text" >
																	<span class="white-space">
																  <?php echo $name;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											</li>
											
											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
								<i class="m-nav__link-icon fa fa-star" aria-hidden="true"></i>												
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Dept.   
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span class="white-space">
																  <?php echo $dep_name;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											</li>
											
											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
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
												<div class="m-nav__link m-nav__sidebaritem">
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
											
											<?php if($buddy_assigned != null){ ?>
											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
											<i class="m-nav__link-icon fa fa-user" aria-hidden="true"></i>								
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Buddy
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span id="up_phone" class="white-space">
																  <?php echo $buddy_assigned;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>

											
											<?php } ?>

											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
											<i class="m-nav__link-icon fa fa-tint" aria-hidden="true"></i>								
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Blood Group
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span id="up_phone">
																  <?php echo $bloodgroup;?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>


											<li class="m-nav__item">
												<div class="m-nav__link m-nav__sidebaritem">
											<i class="m-nav__link-icon fa fa-certificate" aria-hidden="true"></i>								
														<span class="m-nav__link-title">
															<span class="m-nav__link-wrap">
																<span class="m-nav__link-text" >
																	Certifications
																</span>
																<span class="m-nav__link-badge m-nav__link-text">
																	<span id="up_phone" class="white-space">
																  	<?php 
																  	echo $cert_list;
																  	/*if($cert_list){
																	  	$cert_a = explode(", ", $cert_list);


																	  	$certficate_a = [];
																		foreach ($certifications_a as $key => $value) {
																			
																			if(in_array($value->id, $cert_a)){
																				array_push($certficate_a, $value->certificate);
																			}
																		}
																		echo implode(", ", $certficate_a);
																  	}*/
																	?>
																	</span>
																</span>
															</span>
														</span>
													</div>
											
											</li>

											<!--<li class="m-nav__item">
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
   											</li>-->

							</ul>
								
										
											

									</div>
									<div class="m-alert m-alert--air alert alert-dismissible fade show" style="background: #243139;  margin: 0px 10px; color: #d0d0d0;">
													
													<div class="m-alert__text">
																	
																	
							Current Month Shifts  <span class="float-right "><?php echo $countshift; ?> </span>
							<br />	

							<?php if(!$wfh_cl_count){ ?>										
							Casual Leaves  <span class="float-right "><?php if(!empty($casual->total)){echo($casual->total);} else {echo 0;} ?>/6  </span>
							<br />
							<?php }else{
								if($casual->total != 6){
									if($wfh_cl_count->wfh_count % 2 == 0){ ?>
										Casual Leaves  <span class="float-right "><?php if(!empty($casual->total)){echo($casual->total.".5");} else {echo 0.5;} ?>/6  </span>
							<br /> <?php
									 }else{
									 	?>
									 	Casual Leaves  <span class="float-right "><?php if(!empty($casual->total)){echo($casual->total);} else {echo 0;} ?>/6  </span><br />
									 	<?php 
									 }
								}else{ ?>
									Casual Leaves  <span class="float-right "><?php if(!empty($casual->total)){echo($casual->total);} else {echo 0;} ?>/6  </span>
							<br /> <?php
								}
							} ?>

							Medical Leaves  <span class="float-right  "><?php if(!empty($sick->total)){echo($sick->total);} else {echo 0;} ?>/6 </span>
							<br />
							<?php if(($designn != 'L1 Server Engineer') && ($designn != 'Trainee')){ ?>Work From Home  <span class="float-right "><?php if(!empty($wfh->total)){echo($wfh->total);} else {echo 0;} if($no_wfh == 1){ echo "/15"; } ?></span>
							<br /> <?php } ?>

							<?php if(!$wfh_cl_count){ ?>
							Loss of Pay   <span class="float-right  "><?php if(!empty($lop->total)){echo($lop->total);} else {echo 0;} ?></span><br />
							<?php } else { 
								if(($wfh_cl_count->wfh_count % 2 == 0) && ($casual->total == 6)){ ?>
									Loss of Pay   <span class="float-right  "><?php if(!empty($lop->total)){echo($lop->total.".5");} else {echo 0.5;} ?></span><br />
								<?php }else{
									?>
										Loss of Pay   <span class="float-right  "><?php if(!empty($lop->total)){echo($lop->total);} else {echo 0;} ?></span><br />
									<?php
								}
							} ?>
							
							Swap Count <span class="float-right  "><?php if(!empty($swap_count->total)){echo($swap_count->total);} else {echo 0;} ?></span><br />

							<?php if(($core == 1) || (($dep_id != 2) && ($dep_id != 22) && ($dep_id != 51) && ($dep_id != 46))){ ?>
								Holidays   <span class="float-right  "><?php if(!empty($holiday->lv_no)){echo($holiday->lv_no);} else {echo 0;} ?>/10 </span>
							<?php } ?>

													</div>
												
								</div>
									
								<div class="m-alert m-alert--air alert alert-dismissible fade show" style="background: #243139;  margin: 20px 10px; color: #d0d0d0;">
												
										<div class="m-alert__text">
										
											Performance Score <span class="float-right"> <?php echo $sum3[0]['total_pe']; ?></span>
											<br />
											Integrity Score <span class="float-right "> <?php echo $sum6[0]['total_ie']; ?></span>
														<br />
											Cultural Score <span class="float-right "> <?php echo $sum4[0]['total_ce']; ?></span>

											<br />

										</div>
								
								</div>

								<div class="m-alert m-alert--air alert alert-dismissible fade show" style="background: #243139;  margin: 20px 10px; color: #d0d0d0;">
												
										<div class="m-alert__text">
										
											Assigned Tasks <span class="float-right"><?php echo ($comp->count+$pend->count);?></span>
											<br />
											Pending Tasks <span class="float-right ">  <?php echo $pend->count;?></span>
														<br />
											Completed Tasks<span class="float-right ">  <?php echo $comp->count;?></span>

											<br />

										</div>
								
								</div>

								<div class="m-alert m-alert--air alert alert-dismissible fade show" style="background: #243139;  margin: 20px 10px; color: #d0d0d0;">
												
										<div class="m-alert__text">
										
											OLD PE PORTAL : <br/><a href="https://hashroot.com/pe2018/" target="_blank">https://hashroot.com/pe2018/</a>

											<br />

										</div>
								
								</div>


												


							</div>
							</div>
							<div class="col">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_8" role="tab" >
															Dashboard
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_6" role="tab" onclick="get_daily_acts(<?php echo $user_id;?>)">
															Timesheet
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_0" role="tab" onclick="get_daily_acts(<?php echo $user_id;?>)">
															Worksheet
													</a>
												</li>
												<!-- Assignment -->
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link"  data-toggle="tab" href="#m_user_profile_tab_9" onclick="getTeamData(<?php echo $user_id ?>)" role="tab">
															My Tasks
													</a>
												
												</li>
												<!-- Assignment -->
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
															My Scores
													</a>
												
												</li>
											<!--	<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_2" role="tab" onclick="">
															<i class="flaticon-share m--hide"></i>
															Evaluation History
													</a>
												
												</li>-->
<!--
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link " data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
															Evaluation History
													</a>
												
												</li>
-->
												
												
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" onclick="viewallrequests();" data-toggle="tab" href="#m_user_profile_tab_5" role="tab">
															Requests
													</a>
												
												</li>
												<!-- <li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
															Update Profile
													</a>
												
												</li> -->
												
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" onclick="FetchAllRooms()"  data-toggle="tab" href="#project_room" role="tab">
															Shift Updates
													</a>
												</li>

												
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link"  data-toggle="tab" href="#shift-records" role="tab" onclick="Shift_manager.loadShiftMangerForUser()">
															Shift Schedule 
													</a>
												
												</li>
												
												
												
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link"   href="<?php echo base_url(); ?>discussion/dashboard" target="_blank">
															HashBook 
													</a>
												
												</li>
												
												
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link"  data-toggle="tab" href="#m_user_profile_tab_7" role="tab">
															Instructions
													</a>
												
												</li>

												
												
											</ul>
										</div>
										
									</div>
									<div class="tab-content">
									<div class="tab-pane" id="m_user_profile_tab_9">
													<div class="m-portlet">
													<div class="row" id="others_tasks" style="display:none !important;">
															<div class="col-md-6">
																<form  id="add_task" class="m-form " enctype="multipart/form-data" action="./addNewAssignment" method="post" >
																<!-- <input type="hidden" name="user_id" class="form-control" id="skill_user_id"> -->
																	<div class="form-group m-form__group col-md-12">

																	<br/><h5 class="m-link m--font-boldest">Assign Tasks</h5> <br/><br/>
																		
																			<div class="input-group">
																				<span class="input-group-addon">
																				<i class="fa fa-tasks"></i>
																				</span>
																				
																				<input type="text" class="form-control" id="task_name" name="title" placeholder="Enter the task title">
																				
																				
																			</div>

																	</div>

																	<div class="form-group m-form__group row col-md-12">
																		<div class="form-group m-form__group row col-md-3">
																			<label class="col-form-label col-lg-3 col-sm-12">
																			Select Employee
																			</label>
																		</div>
																		
																		<div class="form-group m-form__group col-md-5 col-sm-12" id="assignUsers"></div>

																		<div class="form-group m-form__group col-md-4" >
																			<select name="period" class="form-control m-input m-input--square" onchange="selectPeriod(this.value)">
																					<option value="">Select Type</option>
																					<option value="ONE">One Time</option>
																					<option value="Monthly">Monthly</option>
																					<option value="Weekly">Weekly</option>
																					<option value="Daily">Daily</option>      
																			</select>
																		</div>

																	</div>
																	
																		<div class="col-md-6">
																			<div class="form-group m-form__group ">
																				<label>Attach files</label>											
																				<input class="form-control m-input" type="file" name="task_attachments[]" multiple>
																			</div>
																		</div>
																		

																	<!-- <div class="col-md-6">
																		<div class="form-group m-form__group ">
																			<label>Attach file</label>											
																			<input class="form-control m-input" type="file" name="task_attachments[]" multiple>
																		</div>
																	</div> -->
																	
																	<div id="datePick" class="form-group m-form__group col-md-12 col-sm-12"></div>
																	
																	<div class="form-group m-form__group col-md-12">
																		<textarea  name="body" class="form-control m-input" placeholder="Enter the task to be assigned" ></textarea>
																	</div>

																	
																	
																	<div class="form-group text-center">
																		<button type="submit" style="font-size: 13px;" class="btn btn-primary btn-sm">assign</button>
																	</div>
																</form>
																<div class="col-md-12"><h5 class="m--font-brand m--font-boldest">Task Assigned to others</h5><br/></div>
																<div class="m-scrollable" data-scrollable="true" style="height: 600px">
																	<div id="assignment_added" class="col-md-12"></div>
																</div>
															</div>
															<div class="col-md-6" style="border-left: 1px solid #f1f1f1;">
																<div class="form-group m-form__group col-md-12">
																	<br><br><h5 class="m-link m--font-boldest">My Tasks</h5> <br><br>
																	<h6 style="border-bottom: 1px solid #fbdc22; padding-bottom: 4px;">Task In Progress</h6>
																	<div class="m-scrollable" data-scrollable="true" style="height: 250px"><div id="assignment_review"></div></div><br/>
																	<h6 style="border-bottom: 1px solid #22fbec; padding-bottom: 4px;" >Tasks Completed</h6>
																	<div class="m-scrollable" data-scrollable="true" style="height: 250px"><div id="assignment_completed"></div></div>
																</div>
															</div>
														</div>
												</div>
											</div>
<!--									tab0 contents-->
									<div class="tab-pane" id="m_user_profile_tab_6">
											<div class="m-portlet">
												<div class="">
										<div class="row">
								<div class="col-md-12">
															<div class="m-portlet m-portlet--tab">		
							<div class=""> <!-- reomved class  m-portlet__body -->
										<!--begin::Section-->
										<div class="m-section">


		<!-- widgets finish -->

											<div class="m-section__content">
												<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">

												


													<div id="hours"  class="row"></div>
													
													<div class="m-demo__preview m-demo__preview--btn">
													 <div class="row">
													 <div class="col-md-8">
<!--													 cron-->
													 <?php	//if($user_id == 441 || $user_id == 405 || $user_id == 434){ ?>
													 
												 <!--				Pending hours 				-->

													<br/>
													
													
											<!--				Pending hours 				-->
													 	
													 <?php
//													   }
														 ?>
														 
<!--													 		close cron	-->
												<div class="row">
													 <!-- <div class="col-md-2" style="float:left;"><label style="padding:10px;"> Select :</label></div> -->
														 <div class="col-md-4" >
															 <div class="form-group m-form__group " style="margin: auto; ">		
																<select class="form-control m-input m-input--square"  id="work_loc" onChange="work_loc(this);">	
																	<?php  
																	if(empty($All_att_log[0]['punchout'])  && !empty($All_att_log[0]['punchin'])){
																		?>
																	<option <?php if($All_att_log[0]['work_loc']==0){echo"selected='true'";} ?> value="0">Regular</option>
																	<option <?php if($All_att_log[0]['work_loc']==3){echo"selected='true'";} ?> value="3">Extra Hours</option>	
																	<option <?php if($All_att_log[0]['work_loc']==4){echo"selected='true'";} ?> value="4">Flexi Hours</option>	
																	<?php if($designn != 'L1 Server Engineer') {?>
																		<option  <?php if($All_att_log[0]['work_loc']==2){echo"selected='true'";} ?> value="2">WFH</option>	
																	<?php } ?>
																		

																		<?php
																	}else{
																		?>
																	<option value="0">Regular</option>
																	<option value="3">Extra Hours</option>	
																	<option value="4">Flexi Hours</option>	
																	<?php if(($designn != 'L1 Server Engineer') && ($designn != 'Trainee')) {?>
																		<option id="wgh_opt_selection" value="2">Work From Home</option>	
																	<?php } ?>
																	
																	<?php
																	}
																	?>	
																</select>			
															</div>
														</div>

														<div class="col-md-8" ><!--button div-->
														<input type="hidden" id="notification_catcher" value="<?php echo($notif_flag) ?>"/>			
				<button id="btnpunchin" onclick="punchIn(0)"
														 <?php 
//today    
if(empty($All_att_log[0]['punchout'])  && !empty($All_att_log[0]['punchin'])){echo"disabled='true'";}
														  ?> 
														 class="btn btn-primary m-btn m-btn--icon">
															<span>
																<i class="fa fa-sign-in"></i>
																<span>
																	Punch in 
																</span>
															</span>
														</button>														
														<button id="btnbreak" 
															 <?php 
		$break_status="";	
		if(empty($All_att_log[0]['punchout'])  && !empty($All_att_log[0]['punchin'])){
		$count_brk = count($unseril_brk);
		    if(!empty($All_att_log[0]['break'])){ //If there are breaks 
 				if((array_key_exists('on',$unseril_brk[$count_brk-1])) && (!array_key_exists('off',$unseril_brk[$count_brk-1])) ) {

									echo 'break="on"'; 
									$break_status="Get in";
								}else{
									echo 'break="off"'; 
									$break_status="Break";
								}
								
							}else{
									echo 'break="off"'; 
									$break_status="Break";
								}

					}
			else{ 
					echo 'break="off"'; 
					$break_status="Break";
				}

				// print_r($unseril_brk);
 			// 						exit();
		 ?> 
														
			class="btn btn-danger m-btn m-btn--icon">
				<span>
					<i class="fa fa-retweet"></i>
					<span>
						<?php echo $break_status; ?>
					</span>
				</span>
			</button>
			<button id="btnpunchout" class="btn btn-info m-btn m-btn--icon btnpunchout">
				<span>
					<i class="fa fa-sign-out"></i>
					<span>
						Punch out
					</span>
				</span>
			</button>
														</div>




												</div><!-- end row -->
				
			
</div>	
													<!--	 file upload -->
<div class="col-md-4" style="border: 2px solid #716ACA; padding: 10px;">
	<form method="post" name="upload_work_report" id="upload_work_report" enctype="multipart/form-data" action="<?php echo base_url(); ?>user/workscreenshort">
		<input type="hidden" name="image_form_submit" value="1"/>
		Upload Desk Screenshot &nbsp;&nbsp;&nbsp;
			<label for="images">
			<span class="btn btn-secondary m-btn m-btn--icon" style="margin-top: 10px;">
				<span>
					<i class="fa fa-upload"></i>
					<span>
						Browse
					</span>
				</span>
			</span>
			</label>
			
		<input   style="display: none;"  type="file" name="images[]" id="images" multiple >

		<div class="uploading none" style="display: none;margin-left:10px;">
			<label>&nbsp;</label>
			Please wait..<div class="m-spinner m-spinner--brand m-spinner--md"></div>
		</div>
		<div id="uploadstatus"></div>
	</form>
</div>
</div>
													<!--	 file upload -->
														<hr/>	
														<span id="punchin"> 
<?php
 if(empty($All_att_log[0]['punchout'])  && !empty($All_att_log[0]['punchin'])){
 	echo '<span class=" m-badge m-badge--primary m-badge--rounded m--font-bolder" style="font-size:11px;font-weight:bold;">Punched in : '.date('d M Y h:i a',$All_att_log[0]['punchin']).'</span>';} 
 
  ?>															
														  </span>
											

												<?php
												if(isset($total_new_break))
												{  
													echo('<span id="breaktime" class="m-badge m-badge--warning m-badge--rounded" style="margin-left:100px;font-size:11px;font-weight:bold;">'.$total_new_break.'</span> ');
												}
												else{
													echo('<span id="breaktime" style="margin-left:100px;"></span>');
												}	?>
														
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
								<!--	<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Attendance Log
												</h3>
											</div>
										</div>
									</div>-->
									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
<?php
//test user 
if($user_id==357 || $user_id == 434){
	echo "<pre>";
	//print_r($All_att_log);
	echo "</pre>";
}											
?>											
						<table class="table m-table m-table--head-bg-brand table-striped">
							<thead>
							<tr>

								<th>
									Shift Type
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
									Work time
								</th>

							</tr>
						</thead>
						<?php
									$total_rows=count($daily_log);
									foreach($daily_log as $daily_row){
										
										if(count($daily_row)>0){
										foreach($daily_row as $daily){
											
											echo "<tr style='border-left: 1px solid #67f192;'>";
											echo "<td class='m--font-bolder m--font-brand'>".$daily['loc_title']."</td>";
											echo "<td>".$daily['punchin_time']."<br><span  class='m--font-bolder' style='color:#00c5dc;' > ".$daily['punchin_ip']."</span> </td>";
											echo "<td>".$daily['punchout_time']."<br><span  class='m--font-bolder' style='color:#00c5dc;'> ".$daily['punchout_ip']." </span></td>";
											/*echo "<td>".$daily['total_break']."</td>";*/
											/*echo "<td>".$daily['total_break']."</td>";*/
											echo '<td>';
											foreach ($daily['break_times'] as $value) {
												echo $value." <br>";
											}
											echo "<span class='m--font-bolder m--font-info' > <b>Total - </b> ".$daily['total_break']." Hrs </span>";
											echo '</td>';
											echo "<td class='m--font-bolder'>";
											echo $daily['worked_time']." Hrs<br>";
											if($daily['work_loc'] == 2){
												echo "<span  class='m--font-bolder m--font-danger'><b>Idle Time - </b> ".$daily['idle_time']." Hrs</span>";
											}
											echo "</td>";
											echo "</tr>";
											}
										}else{
											echo "<tr style='border-left: 1px solid #ff9f89;'><td></td><td>".$total_rows." ".date('MY')."</td><td  colspan='5'>Haven't Punched in</td></tr>";
										}
										$total_rows--;
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
									<div class="tab-pane " id="m_user_profile_tab_0">
											<div class="m-portlet">
												<div class="m-portlet__body">
												<div style="padding-bottom: 0;">
													<div id="daily_act_list"></div>
													
												</div>	
														
									<!--	Start Checklist-->
										<div style="display:none;">
											<div id="checklist"></div>	
										</div>
								
					
<!--	Close Checklist-->
<!--Test code for Dynamic activity list :8th jan updation-->
	
<!--Close Test code for Dynamic activity list :8th jan updation-->
								
<?php if($dep_id == 2){?>

<!--Open Reports for server adminzz -->	
<!--backup of server adminz code-->

<!--close backup of server adminz code	-->
	<div id="adminz_team" style="padding: 20px; padding-top: 0;">


						<div>
<!-- Work report   start test codes -->
														
						<!--	<form id="addJD_form22" action="<?php echo base_url('admin/change_jd');?>" method="post">
												
									<div class="modal-body" style="padding-left: 0; padding-right: 0;padding-top: 0;">

										<div class="m-portlet__body" style="padding-left: 0;padding-right: 0;padding-top: 0;">
											<div class="form-group ">
											<div class="row">
											<div class="col-md-12">
									
											<div class="form-group m-form__group "  id="add_daily_container">
													<div id="add_daily" >

														<label class="form-control-label ">
															 Details of tickets worked
														</label>

														<textarea placeholder="You can add reports for additional tasks if you've done any." rows="6" style="border-color: #6867dd;"  class="form-control m-input" name="daily_act" id="work_report"></textarea>											
													</div>
											</div>

											
								
									<div class="form-group m-form__group text-right">
										<a href="./ViewAllReports"><button style="float:left;" id="view_all_rpt" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  >View All Reports</button></a>
										<button id="add_work_button" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  onclick="add_workreport()">Save </button>
									</div>
										<div id="new_acct"></div>
									</div>
									<div class="col-md-12">
										<div id="work_lists" style="text-overflow: ellipsis; white-space: normal; word-break:break-all; ">

										</div>
									</div>
									</div>
									</div>
							
								</div>
							</div>
						</form>
-->
						</div>
					</div>	
<!-- Close reports for server adminzz	-->
<?php } ?>
							
				</div>
			</div>
		</div>
<!--	tab0 contents-->
<!--	tab1 contents-->
		<div class="tab-pane" id="m_user_profile_tab_1">
			<div class="m-portlet__body">
				<div class="row">
					 <div class="col-md-6">
						<h5 class="m-portlet__head-text m--font-primary">
													PERFORMANCE EVALUATION
												</h5>
					 </div>
					<div class="col-md-6" style="text-align: right">
						<span class="m--font-brand" style="font-size:15px;font-weight: 600;">TOTAL SCORE : <?php echo $sum3[0]['total_pe']; ?></span>
					</div>
				</div>
														
				<table class="table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover">
					<thead style="background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;">
						<th>Criteria</th>
						<th>Value</th>
						<th>Scores</th>
					</thead>


					<tr>
							<th scope="row" style="width:80%">
								<!-- Trial Period Performance -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Trial Period Performance',<?php echo $performance_id; ?>)">Trial Period Performance</a>
							</th>
							<th>10</th>
							<td>

							<?php 
								if($trialpperf >0){
							?>
									<span class="custom_green">+ <?php echo $trialpperf;?></span>
							<?php 
								}
								elseif($trialpperf<0){
									?>
									<span class="custom_red"><?php echo $trialpperf;?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $trialpperf;?></span>
									<?php
								}


							?>
							</td>
			<!--
							<td>
								<a href="javascript:;" onclick="performance_det(<?php //echo $row->performance_id; ?>);">View Details</a>
							</td>													
			-->
						</tr>



						<!--service cancellation -->

						<tr>
							<th scope="row" style="width:80%">
								<!-- Service Cancellation -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Service Cancellation',<?php echo $performance_id; ?>)">Service Cancellation</a>
							</th>
							<th>30</th>
							<td>

							<?php 
								if($servicecancellation >0){
							?>
									<span class="custom_green">+ <?php echo $servicecancellation;?></span>
							<?php 
								}
								elseif($servicecancellation<0){
									?>
									<span class="custom_red"><?php echo $servicecancellation;?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $servicecancellation;?></span>
									<?php
								}


							?>
							</td>
			<!--
							<td>
								<a href="javascript:;" onclick="performance_det(<?php //echo $row->performance_id; ?>);">View Details</a>
							</td>													
			-->
						</tr>

							<!--service cancellation ends -->

						<tr>
							<th scope="row" style="width:80%">
								<!-- Public Reviews -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Public review',<?php echo $performance_id; ?>)">Public Review</a>
							</th>
							<th>20</th>
							<td>

							<?php 
								if($preview >0){
							?>
									<span class="custom_green">+ <?php echo $preview;?></span>
							<?php 
								}
								elseif($preview<0){
									?>
									<span class="custom_red"><?php echo $preview;?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $preview;?></span>
									<?php
								}


							?>
							</td>
			<!--
							<td>
								<a href="javascript:;" onclick="performance_det(<?php //echo $row->performance_id; ?>);">View Details</a>
							</td>													
			-->
						</tr>
						<tr>
							<th scope="row">
								<!-- Client Reviews -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Client Review',<?php echo $performance_id; ?>)">Client Reviews</a>
							</th>
							<th>10</th>
							<td>
							<?php 
								if($creview >0){
							?>
									<span class="custom_green">+ <?php echo $creview; ?></span>
							<?php 
								}
								elseif($creview<0){
									?>
									<span class="custom_red"><?php echo $creview; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $creview; ?></span>
									
									<?php
								}


							?>

							</td>

						</tr>
						<tr>
							<th scope="row">
								<!-- Work Quality -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Work Quality',<?php echo $performance_id; ?>)">Work Quality</a>
							</th>
							<th>5</th>
							<td>
							<?php
								if($tquality > 0){
							?>
									<span class="custom_green" >+ <?php echo $tquality; ?></span>
							<?php 
								}
								elseif($tquality<0){
									?>
									<span class="custom_red"><?php echo $tquality; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green" > <?php echo $tquality; ?></span>
									<?php
								}


							?>

							</td>
						</tr>
						<tr>
							<th scope="row">
								<!-- Communication -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Communication',<?php echo $performance_id; ?>)">Communication</a>
							</th>
							<th>3</th>
							<td>
								<?php 
								if($cquality > 0){
								?>
									<span class="custom_green">+ <?php echo $cquality; ?></span>
									<?php 
										}
										elseif($cquality<0){
									?>
									<span class="custom_red"><?php echo $cquality; ?></span>
									<?php 
										}else{
											?>
									<span class="custom_green"><?php echo $cquality; ?></span>
											<?php
										}
									?>

							</td>
						</tr>
						
						
						<tr>
							<th scope="row">
								<!-- Client Policy Violations -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Policy Violation',<?php echo $performance_id; ?>)">Client Policy Violation</a>
							</th>
							<th>5</th>
							<td>
							<?php 
								if($pviolation > 0){
							?>
									<span class="custom_green">+ <?php echo $pviolation; ?></span>
							<?php 
								}
								elseif($pviolation<0){
									?>
									<span class="custom_red"><?php echo $pviolation; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $pviolation; ?></span>
									<?php
								}


							?>

							</td>
						</tr>

						<tr>
							<th scope="row">
								<!-- Company Policy Violations -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Company Policy Violation',<?php echo $performance_id; ?>)">Company	Policy Violation</a>
							</th>
							<th>5</th>
							<td>
							<?php 
								if($cypviolation > 0){
							?>
									<span class="custom_green">+ <?php echo $cypviolation; ?></span>
							<?php 
								}
								elseif($cypviolation<0){
									?>
									<span class="custom_red"><?php echo $cypviolation; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $cypviolation; ?></span>
									
									<?php
								}
							?>

							</td>
						</tr>

						
						<tr>
							<th scope="row">
								<!-- SLA Violations -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('SLA Violation',<?php echo $performance_id; ?>)">SLA Violation</a>
							</th>
							<th>2</th>
							<td>
							<?php 
								if($slaviolation > 0){
							?>
									<span class="custom_green">+ <?php echo $slaviolation; ?></span>
							<?php 
								}
								elseif($slaviolation<0){
									?>
									<span class="custom_red"><?php echo $slaviolation; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"> <?php echo $slaviolation; ?></span>
									
									<?php
								}


							?>

							</td>
						</tr>
						<tr>
							<th scope="row">
								<!-- Work Reports -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Work Reports',<?php echo $performance_id; ?>)">Work Reports</a>
							</th>
							<th>1</th>
							<td>
								<?php 
								if($wreport > 0){
							?>
									<span class="custom_green">+ <?php echo $wreport; ?></span>
							<?php 
								}
								elseif($wreport<0){
									?>
									<span class="custom_red"><?php echo $wreport; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $wreport; ?></span>
									<?php
								}


							?>

							</td>
						</tr>
<!--
						<tr>
							<th scope="row">
								Skype Activities
							</th>
							<th>1</th>
							<td>
									<?php 
								//if($skypeactivity >= 0){
							?>
									<span class="custom_green"><?php //echo $skypeactivity; ?></span>
							<?php 
								//}
								//else{
									?>
									<span class="custom_red"><?php //echo $skypeactivity; ?></span>
							<?php 
							//	}


							?>

							</td>
						</tr>
-->
						<tr>
							<th scope="row">
								<!-- Challenge Of The Day -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Challenge Of The Day',<?php echo $performance_id; ?>)">Challenge Of The Day</a>
							</th>
							<th>5</th>
							<td>
									<?php 
								if($ChallengeOfTheDay > 0){
							?>
									<span class="custom_green">+ <?php echo $ChallengeOfTheDay; ?></span>
							<?php 
								}
								elseif($ChallengeOfTheDay<0){
									?>
									<span class="custom_red"><?php echo $ChallengeOfTheDay; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"> <?php echo $ChallengeOfTheDay; ?></span>
									<?php
								}

							?>

							</td>
						</tr>
						<tr>
							<th scope="row">
								<!-- Warnings -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Warning',<?php echo $performance_id; ?>)">Warnings</a>
							</th>
							<th>10</th>
							<td>

									<?php 
								if($warning >0){
							?>
									<span class="custom_green">+ <?php echo $warning; ?></span>
							<?php 
								}
								elseif($warning<0){
									?>
									<span class="custom_red"><?php echo $warning; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $warning; ?></span>
									<?php
								}


							?>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<!-- Suspensions -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Suspension ',<?php echo $performance_id; ?>)">Suspensions</a>
							</th>
							<th>20</th>
							<td>
									<?php 
								if($suspension > 0){
							?>
									<span class="custom_green">+ <?php echo $suspension; ?></span>
							<?php 
								}
								elseif($suspension<0){
									?>
									<span class="custom_red"><?php echo $suspension; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $suspension; ?></span>
									<?php
								}


							?>

							</td>
						</tr>	
						
						<tr>
							<th scope="row">
								<!-- Awards -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Awards & Achievements',<?php echo $performance_id; ?>)">Awards</a>
							</th>
							<th>20</th>
							<td>
							<?php 
								if($awards > 0){
							?>
									<span class="custom_green">+ <?php echo $awards; ?></span>
							<?php 
								}
								elseif($awards<0){
									?>
									<span class="custom_red"><?php echo $awards; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"><?php echo $awards; ?></span>
									<?php
								}


							?>

							</td>
						</tr>
						
						
					</table>
										
					<div style="margin-top:70px;">
						<div class="row">
							 <div class="col-md-6">
									<h5 class="m--font-primary">
										INTEGRITY EVALUATION
									</h5> 
							 </div>
							<div class="col-md-6" style="text-align: right;">
								<span class="m--font-brand" style="font-size:15px;font-weight: 600;">TOTAL SCORE : <?php echo $sum6[0]['total_ie']; ?></span>
							</div>
 					     </div>
					 </div>
					<table class="table table-striped table-sm m-table m-table--head-bg-brand table-hover">
						<thead style="  background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;">
							<th style="width: 80%;">Criteria</th>
							<th>Value</th>
							<th>Scores</th>
						</thead>

						<tr>
							<th scope="row">
								<!-- Golden Responses -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Golden Responses',<?php echo $performance_id; ?>)">Golden Responses</a>
							</th>
							<th>3</th>
							<td>
							<?php 
								if($goldenresponse > 0){
							?>
									<span class="custom_green">+ <?php echo $goldenresponse; ?></span>
							<?php 
								}
								elseif($goldenresponse<0){
									?>
									<span class="custom_red">	<?php echo $goldenresponse; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"> <?php echo $goldenresponse; ?></span>
									<?php
								}


							?>

							</td>
						</tr>

						<tr>
							<th scope="row">
								<!-- Thanks Replies -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Thanks Replies',<?php echo $performance_id; ?>)">Thanks Replies</a>
							</th>
							<th>1</th>
							<td>
							<?php 
								if($treplies > 0){
							?>
									<span class="custom_green">	+ <?php echo $treplies; ?></span>
							<?php 
								}
								elseif($treplies<0){
									?>
									<span class="custom_red">	<?php echo $treplies; ?></span>
							<?php 
								}else{
									?>
									
									<span class="custom_green"> <?php echo $treplies; ?></span>
									<?php
								}


							?>

							</td>
						</tr>

						<tr>
							<th scope="row">
								<!-- Blog Articles -->
								<a href="javascript:void(0)" onclick="open_evaluation_detail('Blog Posts',<?php echo $performance_id; ?>)">Blog Posts</a>
							</th>
							<th>1</th>
							<td>
							<?php 
								if($blogpost > 0){
							?>
									<span class="custom_green">+ <?php echo $blogpost; ?></span>
							<?php 
								}
								elseif($blogpost<0){
									?>
									<span class="custom_red"><?php echo $blogpost; ?></span>
							<?php 
								}else{
									?>
									<span class="custom_green"> <?php echo $blogpost; ?></span>
									<?php
								}


							?>

							</td>
						</tr>	


						<tr>
								<th scope="row">
							     <!-- Interviews -->
							     <a href="javascript:void(0)" onclick="open_evaluation_detail('Interviews',<?php echo $performance_id; ?>)">Interviews</a>
								</th>
								<th>3</th>
								<td>
								<?php 
									if($interviews > 0){
								?>
										<span class="custom_green">+ <?php echo $interviews; ?></span>
								<?php 
									}
									elseif($interviews<0){
										?>
										<span class="custom_red"><?php echo $interviews; ?></span>
								<?php 
									}
									else{
										?>
										<span class="custom_green"><?php echo $interviews; ?></span>
										<?php
									}

								?>
								</td>
							</tr>

							
								
							<tr>
								<th scope="row">
									<!-- Trainings -->
									<a href="javascript:void(0)" onclick="open_evaluation_detail('Training',<?php echo $performance_id; ?>)">Training</a>
								</th>
								<th>10</th>
								<td>
										<?php 
									if($training > 0){
								?>
										<span class="custom_green">	+ <?php echo $training; ?></span>
								<?php 
									}
									elseif($training<0){
										?>
										<span class="custom_red">	<?php echo $training; ?></span>
								<?php 
									}else{
										?>
										<span class="custom_green">	<?php echo $training; ?></span>
										<?php
									}


								?>
								</td>

							</tr>


							
							<tr>
								<th scope="row">
							     <!-- Certifications -->
							     <a href="javascript:void(0)" onclick="open_evaluation_detail('Certifications',<?php echo $performance_id; ?>)">Certifications</a>
								</th>
								<th>10</th>
								<td>
								<?php 
									if($certifications > 0){
								?>
										<span class="custom_green">+ <?php echo $certifications;  ?></span>
								<?php 
									}
									elseif($certifications<0){
										?>
										<span class="custom_red"><?php echo $certifications; ?></span>
								<?php 
									}
									else{
										?>
										<span class="custom_green"><?php echo $certifications; ?></span>
										<?php
									}

								?>
								</td>
							</tr>	

							<tr>
								<th scope="row">
							     <!-- Seminars -->
							     <a href="javascript:void(0)" onclick="open_evaluation_detail('Seminars',<?php echo $performance_id; ?>)">Seminars</a>
								</th>
								<th>5</th>
								<td>
								<?php 
									if($seminars > 0){
								?>
										<span class="custom_green">+ <?php echo $seminars;  ?></span>
								<?php 
									}
									elseif($seminars<0){
										?>
										<span class="custom_red"><?php echo $seminars; ?></span>
								<?php 
									}
									else{
										?>
										<span class="custom_green"><?php echo $seminars; ?></span>
										<?php
									}

								?>
								</td>
							</tr>	
						</table>
							

							<div style="margin-top:70px;">
						<div class="row">
							 <div class="col-md-6">
									<h5 class="m--font-primary">
										CULTURAL EVALUATION
									</h5> 
							 </div>
							<div class="col-md-6" style="text-align: right;">
								<span class="m--font-brand" style="font-size:15px;font-weight: 600;">TOTAL SCORE : <?php echo $sum4[0]['total_ce']; ?></span>
							</div>
 					     </div>
					 </div>
					<table class="table table-striped table-sm m-table m-table--head-bg-brand table-hover">
						<thead style="  background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;">
							<th style="width: 80%;">Criteria</th>
							<th>Value</th>
							<th>Scores</th>
						</thead>

						<tr>
								<th scope="row">
							<!-- Code of conduct -->
							<a href="javascript:void(0)" onclick="open_evaluation_detail('Code of conduct',<?php echo $performance_id; ?>)">Code of conduct</a>
								</th>
								<th >1</th>
								<td>
								<?php 
									if($codeof > 0){
								?>
										<span class="custom_green">	+ <?php echo $codeof; ?></span>
								<?php 
									}
									elseif($codeof<0){
										?>
										<span class="custom_red">	<?php echo $codeof; ?></span>
								<?php 
									}else{
										?>
										<span class="custom_green">	<?php echo $codeof; ?></span>
										<?php
									}


								?>
								</td>
							</tr>	
							
							<tr>
								<th scope="row">
									<!-- Social Media Engagements -->
									<a href="javascript:void(0)" onclick="open_evaluation_detail('Social Media Engagements',<?php echo $performance_id; ?>)">Social Media Engagements</a>
								</th>
								<th>1</th>
								<td>
									<?php 
									if($ssmedia > 0){
								?>
										<span class="custom_green">	+ <?php echo $ssmedia; ?></span>
								<?php 
									}
									elseif($ssmedia<0){ 
										?>
										<span class="custom_red">	<?php echo $ssmedia; ?></span>
								<?php 
									}else{
										?>
										<span class="custom_green">	<?php echo $ssmedia; ?></span>
										<?php
									}


								?>
								</td>
							</tr>
							
							
							<tr>
								<th scope="row">
							     <!-- Extracurricular Activities -->
							     <a href="javascript:void(0)" onclick="open_evaluation_detail('Extracurricular Activitiess',<?php echo $performance_id; ?>)">Extra Curricular Activities</a>
								</th>
								<th>1</th>
								<td>
								<?php 
									if($extracurricular > 0){
								?>
										<span class="custom_green">+ <?php echo $extracurricular; ?></span>
								<?php 
									}
									elseif($extracurricular<0){
										?>
										<span class="custom_red"><?php echo $extracurricular; ?></span>
								<?php 
									}
									else{
										?>
										<span class="custom_green"><?php echo $extracurricular; ?></span>
										<?php
									}

								?>
								</td>
							</tr>

																
																	
					</table>
				</div>
				<div class="m-section__content">
								<!--			month picker-->
						<div class="col-md-11">
							<div class="m-separator m-separator--dashed"></div>
							<h5 class="m--font-primary">EVALUATION HISTORY</h5>
<!--							<div class="m-separator m-separator--dashed"></div>-->
						</div>
					
						<div>
							<form class="m-form m-form--fit m-form--label-align-right" action="javascript:;"  method="post" id="month_history">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-md-4 col-sm-12">
												Please select a month
											</label>
											<div class="col-lg-4 col-md-8 col-sm-12" style="margin-bottom:10px;">
												<div class="input-group date" id="m_datepicker_2">
													<input type="text" class="form-control m-input" name="month_pick" placeholder="Select Here">
													<span class="input-group-addon">
														<i class="la la-calendar-check-o"></i>
													</span>
													
												</div>
												
											</div>
											<div class="col-lg-4 col-md-3 col-sm-3">
												<button class="btn btn-primary m-btn m-btn--custom" type="submit" 	name="submit" value="view details">Proceed</button> 
											</div>
										</div>
								</div>
							</form>
							<div  class="m-portlet__body ">
								<div id="new-div">
									<div class="m-portlet__body">

									</div>
								</div>
							</div>	
						</div>
<!--	close month picker-->
							</div>
			</div>
<!--								/tab 1 contents-->
<!--									tab2 contents-->
		<div class="tab-pane " id="m_user_profile_tab_2" >
			<div class="m-section__content">
				<div class="m-portlet__body">
					<div class="row">
						 <div class="col-md-6">
							<h5 class="m--font-primary">
								PERFORMANCE EVALUATION
							</h5> 
						</div>
						<div class="col-md-6" style="text-align: right;"><span class="" style="font-size:15px;font-weight: 600;">TOTAL SCORE : <?php echo $sum1[0]['point']; ?></span>
						</div>
  					</div>
					<table class="table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover">
						<thead style="  background: #4aafdb; /* Old Browsers */ background: -webkit-linear-gradient(top right,#4aafdb,#1b69c6); /*Safari 5.1-6*/ background: -o-linear-gradient(top right,#4aafdb,#1b69c6); /*Opera 11.1-12*/ background: -moz-linear-gradient(top right,#4aafdb,#1b69c6); /*Fx 3.6-15*/ background: linear-gradient(top right, #4aafdb, #1b69c6); /*Standard*/;color:#fff;">
							<th scope="row">
								Sl:No
							</th>
							<th scope="row">
								Criteria
							</th>
							<th scope="row">
								Points 
							</th>
							<th scope="row">
							   Date
							</th>
						</thead>
						<?php $count = 1;
							foreach($pe as $row){ ?>
							 <?php 
								if($row['cri_type'] == 1){
								 if($row['point'] >=0){
							 ?>
								<tr>
									<th scope="row">
										 <span style="#000">
										 <?php echo $count++ ; ?>
										 </span>
									</th>
									<td>													
										<span style="color:#000;">
											  <?php 
											   echo $row['criteria']; 
											  ?>
									    </span>
									</td>
									<td>
										<span class="custom_green">+
											 <?php 
											   echo $row['point']; 
											  ?>
										</span>
									</td>
									<td>
										 <span style="color:#000;">

										 <?php echo date('d M Y',$row['time']); ?>

										 </span>
									</td>			
								</tr>
							<?php 
							}
							else{

								?>
								<tr>
									<th scope="row">
										 <span style="color:#000;">

											 <?php echo $count++ ; ?>

										 </span>

									</th>
									<td>
										  <span style="color:#000;">
											  <?php 
											  echo $row['criteria'];
											  ?>
										  </span>
									</td>
									<td>
										  <span class="custom_red">
											  <?php 
											   echo $row['point']; 
											  ?>
										  </span>
									</td>
									<td>
										 <span style="color:#000;">
										 <?php echo date('d M Y',$row['time']); ?>
										 </span>
									</td>													
								</tr>
							<?php

							}
							}//closing if ckeck 1
							} 
							?>	

						</table>

										
                        <!--INTEGRITY table-->
								<br/><br/>
					<div class="row">
						 <div class="col-md-6"><h5 class="m--font-primary">
											INTEGRITY EVALUATION
										</h5> </div>
							<div class="col-md-6" style="text-align: right"><span class="" style="font-size:15px;font-weight: 600;">TOTAL SCORE : <?php echo $sum2[0]['point']; ?></span></div>

						</div>

						<table class="table-bordered table table-striped table-sm m-table m-table--head-bg-brand  table-hover">
								<thead>
									<th scope="row">
										Sl:No
									</th>
									<th scope="row">
										Criteria
									</th>
									<th scope="row">
										Points 
									</th>

									<th scope="row">
									   Date
									</th>

								</thead>
						<?php $count = 1;
//											print_r($pe);
							foreach($pe as $row){ ?>
							 <?php 
								if($row['cri_type'] == 2){
								 if($row['point'] >=0){
							 ?>
								<tr style="color:#000;">
									<th scope="row">

										 <span >

										 <?php echo $count++ ; ?>

										 </span>

									</th>

									<td>													

										  <span >
											  <?php 
											   echo $row['criteria']; 
											  ?>
										  </span>

									</td>
									<td>

										  <span class="custom_green" >+
											  <?php 
											   echo $row['point']; 
											  ?>
										  </span>
									</td>


									<td>
										 <span >

										 <?php echo date('d M Y',$row['time']); ?>

										 </span>
									</td>													
								</tr>
							<?php 
							}
							else{

								?>
								<tr style="color:#000;">
									<th scope="row">
										 <span >

											 <?php echo $count++ ; ?>

										 </span>

									</th>
									<td>
									  <span >
										  <?php 
										  echo $row['criteria'];
										  ?>
									  </span>
									</td>
									<td>
									  <span class="custom_red">
										  <?php 
										   echo $row['point']; 
										  ?>
									  </span>
									</td>
									<td>
										 <span >
										 <?php echo date('d M Y',$row['time']); ?>

										 </span>
									</td>													
								</tr>
							<?php

							}
							}//closing if ckeck 1
							} 
							?>	

						</table>
<!-- closing displaying sum of ce fromperformance history table-->
										</div>
								</div>
							</div>


<!--						Project Room -->	
<div class="tab-pane " id="project_room" >
	<input class="prroomid" type="hidden" value="5"/>
	<div class="m-section__content project-room">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						--
					</h3>
					<span class="members" ><a href="javascript:;" class="members" data-toggle="m-popover" data-trigger="focus" title="" data-html="true" data-content="<span>Renjith</span><br /><span>Renjith</span><br /><span>Renjith</span><br /><span>Renjith</span>" data-original-title="Members"><span class="total_members"> -- </span></a> <font color="#ff8c8c"> | </font><span class="tag"> -- </span></span>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-md-9 left-sidebar">
					 <div class="inner-left-side m-project">	

					</div> 
						<div class="new-messanger-msg row">
						 	<div class="col-md-10">
							<textarea placeholder="Message" class="form-control m-input" rows="3"></textarea>
							</div>
							<div class="col-md-2" style="padding-right: 0px;">
								<button onclick="doSend();" type="button" class="btn btn-accent btn-block">Send</button>
							</div>
						</div>
				</div>	
				<div class="col-md-3 right-sidebar">
					
					
					<?php if($temRoomMembersCount > 1){ ?>
					<div class="inner-right-side">
						<!-- <i class="la la-group" style="padding: 8px 10px;background: #e4e4e4;color: #07b958;"></i> <strong>TEAM ROOM</strong> -->
						<hr style="margin-top: 0;background: #f3fcff;" />
						<div class="m-demo__preview" id="listAllTeamRooms" >

						</div>
						<!-- <div class="m-demo__preview" id="TeamRooms" >

						</div> -->
					</div>
					<?php } ?>
					<br />
					<div class="inner-right-side">
						<!-- <i class="la la-group" style="padding: 8px 10px;background: #e4e4e4;color: #07b958;"></i> <strong>PROJECT ROOMS</strong> -->
						<hr style="margin-top: 0;background: #f3fcff;" />
						<div class="m-demo__preview" id="listAllRooms" >

						</div>
						<!-- <div class="m-demo__preview" id="TeamRooms" >

						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="tab-pane" id="shift-records">
	<div class="m-portlet">
		<div class="m-content col-md-12">
			<div class="row" >
				<div class="col-md-12">
					<div class="container" style="padding: 5px;">
						<div class="row">
							<div class="col-md-3"><br/>
								<button id="create-new-shift-btn" onclick="Shift_manager.setNewShiftHtml()" class="btn m-btn--pill btn-outline-success btn-sm">Create New Shift</button>
								<button id="preview-next-shift-btn" onclick="Shift_manager.previewShift()" class="hide btn m-btn--pill btn-outline-success btn-sm">Preview Upcoming shifts</button>
							</div>
							<div class="col-md-6 text-right" ><br/>
								<span class="m-badge m-badge--success m-badge--wide">
								Created By : </span> <span class="m-badge m-badge--success m-badge--wide m-badge--square" id="shift-created-by"></span>
							</div>
							<div class="col-md-3"><br/>
								<a href="#previous-shift-moal" class="btn m-btn--pill btn-outline-success btn-sm" data-toggle="modal">Previous Shifts</a>
							</div>
						</div><br><br><h2 class="m--font-brand text-center"><u>SHIFT TABLE</u><br/></h2><br/>
					</div>
					<table id="shift-management-table" class='table m-table  m-table--head-bg-brand'>
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
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--begin:: dashboard tab 0-->
	<div class="tab-pane active" id="m_user_profile_tab_8">								
		<div class="m-portlet">
			<div class="m-portlet__body">
				<div id="hours_1" >
					<div class="col-12 ">
						<div class="row">
							<div class="col-xs-4 col-md-2 m-badge m-badge--darkgrey m-badge--rounded ">
								<div class="panel status panel-danger">
									<div class="panel-heading text-left">                        
										<h6>Mandatory Hours</h6>
									</div>
									<div class="panel-body">
										<h1 class="panel-title text-left" id="pending_hrs"><?php echo $pending_hrs ?></h1>
									</div>
								</div>
							</div>          
							<div class="col-xs-4 col m-badge m-badge--grey m-badge--rounded">
								<div class="panel status panel-lightblue">
									<div class="panel-heading text-left">
										<h6>Worked Hours</h6>
									</div>
									<div class="panel-body">                        
									<h1 class="panel-title text-left" id="wrkd_hrs"><?php echo $wrking_hrs ?></h1>
									</div>
								</div>
							</div>
							<div class="col-xs-3 col m-badge m-badge--yellow m-badge--rounded">
								<div class="panel status panel-success text-left">
									<div class="panel-heading">
										<h6>Extra Hours</h6>
									</div>
									<div class="panel-body">                        
									<h1 class="panel-title text-left" id="extra_hrs"><?php echo $extra_hrs ?></h1>
									</div>
								</div>
							</div>
							<div class="col-xs-3 col m-badge m-badge--blue m-badge--rounded">
								<div class="panel status panel-info">
									<div class="panel-heading text-left">
										<h6>Overtime Hours</h6>
									</div>
									<div class="panel-body">                        
									<h1 class="panel-title text-left" id="overtime" ><?php echo $overtime ?></h1>
									</div>
								</div>
							</div>
							<div class="col-xs-3 col m-badge m-badge--aqua m-badge--rounded">
								<div class="panel status panel-info">
									<div class="panel-heading text-left">
										<h6>Flexi Hours</h6>
									</div>
									<div class="panel-body">                        
									<h1 class="panel-title text-left" id="flexi_hrs"><?php echo $flexi_hrs ?></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if($todays_interviews || $notice_board){ ?>
				<div class="" id="notice_board">
					<div class="col-12">
						<div class="row">
							<section class="slider">
						        <ul class="carousel" id="carousel">
						        	<?php 
						        		if($todays_interviews){
					        				echo '<li class="bg-1" style=" background: #ffb822bf">';
					        				$count = 1;
						        			foreach ($todays_interviews as $key => $value) {
						        				echo '<h5 style="text-align:left;">'.$count.'. You have an interview sheduled on '.$value->exam_date.'</h5>';
						        				$count++;
						        			}
					        				echo '</li>';
						        		}
										if($notice_board){
											foreach ($notice_board as $key => $value) { ?>
									          <li class="bg-1" style=" background: 
													<?php 
														switch ($value->color) {
															case 'level 1':
															echo '#abb7b7;';
															break;

														case 'level 2':
															echo '#ffb822bf;';
															break;

														case 'level 3':
															echo '#f32401b3;';
															break;

														}
													?>
												">
									            <?php echo $value->notice; ?>
									          </li>
									<?php } ?>
									<?php } ?>
						          
						        </ul>
						        <ul class="sliderpagnation">
						        	<?php foreach ($notice_board as $key => $value) {
						        		echo '<li><a href="#"><i class="fa fa-circle"></i></a></li>';
						        	} ?>
						        </ul>
						</section>
						</div>
						<!-- <div class="row">

							<?php 
								if($notice_board){
									// echo '<h4>Notice Board</h4>';
									foreach ($notice_board as $key => $value) { ?>
										<div class="notice-board" style=" background: 
											<?php 
												switch ($value->color) {
													case 'level 1':
														echo '#abb7b7;';
														break;

													case 'level 2':
														echo '#ffb822bf;';

													case 'level 3':
														echo '#f32401b3;';

													case 'level 4':
														echo 'brown;';

													case 'level 5':
														echo 'green;';

													case 'level 6':
														echo 'orange;';
														break;
												}
											?>
										">
											<?php echo $value->notice; ?>
										</div>
									<?php }
								}
							?>
						</div> -->
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body">
                <div id="work_break_graph" style="height: 500px; overflow: visible; text-align: left;"></div>  
            <!-- </div>
		</div> -->
		<?php if($dep_id==2){ ?>
		<!-- <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body"> -->
                <div id="ticket_count_graph" style="height: 500px; overflow: visible; text-align: left;"></div>  
            <!-- </div>
        </div> -->
		<?php } ?>
		<!-- <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body"> -->
                <div id="performance_score" style="height: 500px; overflow: visible; text-align: left;"></div>  
            </div>
        </div>

	</div>
<!--end::dashboard  tab0-->

<!--									tab4-->
						<div class="tab-pane " id="m_user_profile_tab_4">								
						<div class="m-portlet">
							<!--begin::Form-->
							<?php $id = $user_id; ?>
							<form class="m-form m-form--fit m-form--label-align-right" id="m_form_1" novalidate method="post">
								<div class="m-portlet__body">
									<div class="m-form__content">
										<div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
											<div class="m-alert__icon">
												<i class="la la-warning"></i>
											</div>
											<div class="m-alert__text">
												Oh snap! Change a few things up and try submitting again.
											</div>
											<div class="m-alert__close">
												<button type="button" class="close" data-close="alert" aria-label="Close"></button>
											</div>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Name
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="la la-user"></i>
												</button>										
												</span>
												<input type="text" class="form-control m-input" name="name" value="<?php echo $fullname;?>">
											</div>
											<span class="m-form__help">
												Please enter your fullname
											</span>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Password
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="la la-key"></i>
												</button>										
												</span>
												<input type="password" class="form-control m-input" name="password" value="" placeholder="****************" autocomplete="off">
																								
											</div>
											<span class="m-form__help">
												Reset your password
											</span>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											DOB
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="flaticon-event-calendar-symbol"></i>
												</button>										
												</span>
												<input type="date"  class="form-control m-input" name="dob" value="<?php echo date('Y-m-d', $dob);?>"> 
												
											</div>
											<span class="m-form__help">
												Please enter your date of birth
											</span>
										</div>
									</div>

									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											 Phone
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="la la-phone"></i>
												</button>										
												</span>
												<input type="text" class="form-control m-input" name="phone" value="<?php echo $phone;?>">
												
											</div>
											<span class="m-form__help">
												Please enter your phone number
											</span>
										</div>
									</div>

									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											 Blood Group
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="la la-tint"></i>
												</button>										
												</span>
												<input type="text" class="form-control m-input" name="bloodgroup" value="<?php echo $bloodgroup;?>">
												
											</div>
											<span class="m-form__help">
												Enter your Blood Group
											</span>
										</div>
									</div>
									
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											 Certifications
											 <!-- <?php
											 	$cert_a = explode(", ", $cert_list);
											 	print_r($cert_a);
											 ?> -->
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">
													<i class="la la-certificate"></i>
												</button>										
												</span>
												<input type="text" value="<?php echo $cert_list; ?>" name="cert_list" id="cert_list" class="form-control m-input m-input--air" placeholder="Enter your certifications here">
												<!-- <select multiple="multiple" class="form-control m-input m-input--air " id="cert_list" name="cert_list[]">
													<?php
														$cert_a = explode(", ", $cert_list);
														foreach ($certifications_a as $key => $value) {
															if(in_array($value->id, $cert_a)){
																echo '<option selected="true" id="cert_opt_'.$value->id.'" value="'.$value->id.'">'.$value->certificate.'</option>';
															}else{
																echo '<option id="cert_opt_'.$value->id.'" value="'.$value->id.'">'.$value->certificate.'</option>';
															}
														}
													?>

												</select> -->

											</div>
										
										</div>
									</div>
									
					
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Update
												</button>
											</div>
										</div>
									</div>
								</div>
							</form>  
							<!--end::Form-->
						</div>
<!--				close tab4-->
										
						</div>
					
						<!--	tab3 contents-->
							<div class="tab-pane " id="m_user_profile_tab_5">
										<?php //$id = $user_id; ?>
										
						<div class="m-portlet">

							<!--begin::Form-->
							<?php $id = $user_id; ?>
							<form  enctype="multipart/form-data"  class="m-form m-form--fit m-form--label-align-right" id="request" action="request"  method="post"  novalidate="novalidate" method="post">
								<div class="m-portlet__body">
							
<!--
												<h5 class="m-portlet__head-text m--font-primary" style="padding-left: 30px;">
													REQUESTS
												</h5>
-->
<!--							<div class="m-separator m-separator--dashed"></div>-->
								<div class="row col-md-12">								
								
								<div class="form-group m-form__group col-md-4" style="margin: auto;">
											<!--<label for="exampleSelect1" class="col-6 col-form-label">
												Select the request  type
											</label>-->
											
											<select class="form-control m-input m-input--square " name="requesttype" id="exampleSelect1">

												<option value="0">
													Select Request
												</option>
											<?php if ($notice_period != 1) {?>
												<option  value="5">
													Swap Shift
												</option>

												<?php if (($designn != 'L1 Server Engineer') && ($designn != 'Trainee')){ ?>
												<option  value="3">
													Work From Home 
												</option>

											<?php } ?>
<?php if($casual->total<6){ ?>
											
												<option value="1">
													Casual Leaves
												</option>
<?php	} ?>
<?php if($sick->total<6){ ?>
												<option  value="2">
													Medical Leaves
												</option>

<?php } ?>				
												<option  value="4">
													Loss of Pay 
												</option>

												<?php if((($core == 1) || (($dep_id != 2) && ($dep_id != 22) && ($dep_id != 46) && ($dep_id != 51))) && ($holiday->lv_no < 10)){ ?> <option value="7">Holidays</option><?php } ?>
<?php 	} ?>									
											</select>
											
										</div>
									
									
									<div class="row">
									<br><br>
										<div class="form-group m-form__group col-md-3">
											<label for="example-date-input" class="m--font-bolder">
												Date / Date from
											</label>											
												<input class="form-control m-input" type="date" name="date" value="">
										</div>
										<div class="form-group m-form__group col-md-3">
											<label for="example-date-input" class="m--font-bolder">
												 Date to
											</label>											
												<input class="form-control m-input" type="date" name="dateto" value="">
										</div>
										
											<div class="form-group m-form__group col-md-3">
												<label class="m--font-bolder">
													No. of Days Required
												</label>
												<input type="text" class="form-control m-input" name="requestdays" placeholder="No:of Days">
											</div>
											
										<div class="form-group m-form__group col-md-3">
												<label class="m--font-bolder">
													Consent of
												</label>
												<input type="text" class="form-control m-input" name="approvedby" placeholder="Name">
										</div>
								
									<div class="form-group m-form__group col-md-12">
										<label for="exampleTextarea" class="m--font-bolder">
											Reason
										</label>
										<textarea name="reason" class="form-control m-input"  rows="6"></textarea>
									</div>
																		
									<div class="row col-md-12" style="margin-top: 30px">
										
										
										<div class="form-group m-form__group col-md-8">
												<span>Attach Proof(Optional)</span>											
											<input class="form-control m-input"  type="file" name="userfile" />
									   
									</div>
										
											<div class="col-md-2 ml-lg-auto">
											<br>
												<button id="request_button" type="submit" class="btn btn-success">
													Request 
												</button>
											</div>
											
											<div class="col-md-2 ml-lg-auto">
											<br>
												<button type="reset" class="btn btn-primary">
													Clear
												</button>

											</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top: 70px;" >
								<p>
											<h5 class="m-link m--font-boldest">
												Request History
											</h5>
										</p>
								<div class="m-portlet__body"  id="pending-apps" style="padding:2px;overflow: auto;max-height: 550px;">
					<div class="m-spinner"></div>
						</div>
								</div>
								</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										
									</div>
								</div>
							</form>  
							<!--end::Form-->
							
						</div>
<!--				close tab4-->
										
						</div>
					
								<!--										/test-->
								<div class="tab-pane" id="m_user_profile_tab_7">
																		<?php //$id = $user_id; ?>

														<div class="m-portlet">
								<div class="m-portlet__body">

<!--
												<h5 class="m-portlet__head-text" >
													INSTRUCTIONS
												</h5>
-->
				<div class="m-section__content">
	<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
		<div class="m-demo__preview">
		<h5 class=" m--font-brand m--font-boldest text-center">Performance Evaluation Portal</h5> <br />
			<p style="text-align: justify" >					
			PE portal is a single window system where all employee records including work reports, performance scores, leave  details will be logged for reference throughout their employment at HashRoot.
			</p><br>
			
				<h5 class=" m--font-brand m--font-boldest">PUNCH-IN TYPES</h5> 
				
				<p style="text-align: justify" >Each employee shall access his PE portal at the beginning of each shift. The check-in time shall be logged and marked as beginning of his/her shift.
				</p><br>

											 
											 <ul style="text-align: justify;">
	<h6 class=" m--font-brand m--font-boldest">Regular Shift</h6>	
	
		<p style="text-align: justify" >Regular shift punch-in from Office should be logged by selecting “Regular” from the drop down.</p>

		<p style="text-align: justify" >Please note that the Regular Shift could be logged only using the Office IP. Hence make sure you disconnect any active VPN during punch-in and punch-out.</p>

		<h6 class=" m--font-brand m--font-boldest">Extra Hours</h6>
	
		<p style="text-align: justify" >If a tech is working an additional shift or working for extra hours, he/she should select “Extra Hours” from the drop down to mark your shift.</p>
		<p style="text-align: justify" >This is mandatory that only working hours marked with “Extra Hours” is considered for calculating the Over Time.</p>
		<p style="text-align: justify" >If you plan to work the “Extra Hours” immediately after completing the “Regular Shift”, Punch-out of the Regular Shift and punch-in by selecting “Extra Hours” from shift option. </p>
		<p style="text-align: justify" >Please make sure that VPN is disconnected to mark Punch-in successfully for “Regular Shift” and “Extra Hours”.</p>
		<p style="text-align: justify" >Over Time is calculated only when the Mandatory Hours is completed.</p>
		<p style="text-align: justify" >Please note that the Extra Hours could be logged only using the Office IP. Hence make sure you disconnect any active VPN during punch-in and punch-out.</p>
		

		<h6 class=" m--font-brand m--font-boldest">Flexi Hours</h6>
		
		
		<p style="text-align: justify" >Flexi Hours are meant to record activities and works done other than regular works, as or when required by the client or company. </p>
											
				
		<h6 class=" m--font-brand m--font-boldest">Work From Home</h6>

		<p style="text-align: justify" >An employee is eligible for 15 home logins per year. Every additional home logins exceeding this count will be calculated as half casual leaves. Further home logins taken after using up 6 casual leaves in this manner shall be accounted as Half Day LOP. </p>
		<p style="text-align: justify" >The designations L1 server engineer and Server Engineer Intern is not eligible for home logins.</p>
		<p style="text-align: justify" >Any unreported or unauthorized home logins taken by staffs shall be considered as LOP.  </p>
		<p style="text-align: justify" >Idle Check – An idle time checker will be activated randomly through PE portal during home logins. With this a counter will automatically count the time until you acknowledge the pop-up. The idle time report received thus will be marked and considered for further actions</p>

		
		</ul>

		<p style="text-align: justify" >Punching out of the portal will be marked as the end of shift. It is mandatory that all techs sign out of the PE portal after concluding the shift.</p>
		

			<br>



		<h5 class=" m--font-brand m--font-boldest">WORK FLOW</h6>
		
		<p style="text-align: justify" >Each employee shall access his PE portal at the beginning of each shift. The check-in time shall be logged and marked as beginning of his/her shift</p>
		<p style="text-align: justify" >You have to log the Daily, Weekly and Monthly activities that are displayed under the ‘Worksheet’ tab. The daily activities are valid only for that day and could not be edited the next day. Weekly activities can be added or modified any time a week and will reset on all sundays. Monthly activities can be added or modified any time a month and will reset at the end of every month.</p>
			
		<p style="text-align: justify" >Every employee should enter the ticket records under the 'Worksheet' tab. The entries are time stamp based and so ensure to make an entry, along with sufficient details of the task/ticket, once you complete it. Tech should separately enter the number of resolved and pending tickets after completing the shift.</p>
		<p style="text-align: justify">All employees should upload the snapshots of ticket queue of all helpdesks, after concluding their shift. If you have more than one helpdesk to manage, select and upload snapshot of all helpdesks.</p>
		<p style="text-align: justify" >Details of any additional tasks should be added in the text box towards the end of the same page. We have introduced sections called ‘Golden responses/Thanks Replies" and "Challenge of the day" in the PE portal where techs could log all appreciation or gratitude responses they receive through chats or tickets. </p>
		<p style="text-align: justify" >All breaks should be marked by clicking on the Break button while leaving and Getin button once you join back the shift. </p>
		<p style="text-align: justify" >Punching out of the portal will be marked as the end of shift. It is mandatory that all techs sign out of the PE portal after concluding the shift. If you missed to punch out, the shift shall be closed through an automated force punch-out cron. </p>
		<p style="text-align: justify" >All details of the performance evaluation will be accessible to each techs through their portal. Awards, recognitions, bonus and salary revisionsstu will be based on the information fed here.</p>
			
		



		<h5 class=" m--font-brand m--font-boldest text-left">SHIFT UPDATES</h5>
			<p style="text-align: justify" >					
			Techs need to perform shift update for passing information to other team members. This will avoid multiple Google Sheets being used currently. Any details including new client updates, scheduled tasks, new client policies, pending tickets, handled chats etc should be passed to other team member before you punch out from the PE portal.
			</p><br>


		<h5 class=" m--font-brand m--font-boldest">SHIFT SCHEDULE</h6>
		
		<p style="text-align: justify" >The team lead or the shift admin who prepares the shift schedule for the team, need to update the same under 'Weekly shift' tab in the PE portal. You could select the names of the team members assigned to a shift from the drop down menu. </p>
		<p style="text-align: justify" >The shift updates should be saved only on Sundays - before the new week begins. </p>
		<p style="text-align: justify" >Offs, shift swaps, leaves etc during the week should be marked in the schedule. </p>
		<p style="text-align: justify" >Only, the team lead/shift admin who saved the initial shift would have the privilege to mark the changes.<br></li>
			
									

		<h5 class=" m--font-brand m--font-boldest ">SHIFT TYPES</h5>
			<p style="text-align: justify" >					
			The total hours to be worked by each employee will be displayed under “Mandatory Hours” in the PE dashboard. An employee could plan and set the work schedules to be completed using this “Mandatory Hours”. Whenever you punch-in to the shift with “Regular Shift” and “Home Login”, the duration will be deducted from the “Mandatory Hours”. Note that, there should not be any Mandatory hours left during the time of salary revision.
			</p>
			<p style="text-align: justify" >					
			Additional hours that you work from office to maintain shift balance due to any emergency team requirement, comes under “Extra Hours”. Extra hours will be calculated only if the tech punch-in by choosing ‘Extra Hours’ from drop down. This is compulsory that the additional input from your side is properly logged and available for calculation of “Over Time”.
			</p>
			<p style="text-align: justify" >					
			Overtime is calculated	on the basis of Extra Hours you have taken after completing the Mandatory Hours. The same will be displayed on the Overtime counter in the PE dashboard of each tech.
			</p>
			<p style="text-align: justify" >					
			Break time allowed per shift is 45 minutes. All staffs are free to plan and take the alloted 45 minutes break, without making continuous absence for 30 minutes from the desk. Staffs are expected to take breaks for attending phone calls. It is strictly advised to refrain from using Mobile phones inside office or at office premises/corridors. 
			</p>
			<p style="text-align: justify" >		
			It is mandatory that you mark break and get-in from the PE dashboard without fail. Half day LOP will be marked if a tech is found to move away from desk without proper breaks marked.
			</p>
			<p style="text-align: justify" >		
			Night Shift Break: A power nap time of 20 to 30 minutes is excused during the night shifts if the tech marks proper break in PE portal and client chat rooms separately. During night shifts, following shall be considered as LOP:
				<ul>
			<li>Taking nap without marking breaks</li>
			<li>Taking nap for more than 30 minutes, even after marking breaks. </li>
				</ul>
			</p>

			<br>
						
						
						
						
						
											<h5 class=" m--font-brand m--font-boldest">WORK HOURS</h5>  
<p style="text-align:justify">

The total working hours at HashRoot is 8 Hours 15 Minutes excluding the breaks of 45 min. However, ServerAdminz department has 8 hour shift including the breaks. This makes approximate 60 minute as pending hours for each tech which SHOULD be used for the tasks/activities that the company assign to you, after your regular shift hours. This include, but not limited to R&D contribution, Buddy training, Interview process, Seminars, Workshops etc.
<br/><br/>
Mandatory Hours : 8:15 Hours per shift
<br/><br/>
Break Time : 45 Minutes
<br/><br/>
Extra Hours : The time/shift after your regular shift hours
<br/><br/>
Overtime Hours : Extra Hours after Mandatory hours
<br/><br/>
Flexi Hours : Voluntary Hours worked (Not mandatory)
</p>
	
							<br>
								<h5 class=" m--font-brand m--font-boldest">LEAVES, SWAPS, LOP and WFH</h5>  
	<ul style="text-align: justify;"><br>
		<h6 class=" m--font-brand m--font-boldest">Leave Structure</h6>	
	
	<p style="text-align: justify" >All employees have a total of 12 leaves (6 Casual and 6 Medical) a year., in addition to the regular week offs.</p><br/>

		<h6 class=" m--font-brand m--font-boldest">Casual Leave </h6>
		
		<p style="text-align: justify" >6 days casual leave is allowed to each employee each year</p>
		<p style="text-align: justify" >All permanent employees are eligible to avail Casual leave. The Leaves should be updated and got approved before 3 days from the required date. </p>
		<p style="text-align: justify" >Upto 3 casual leaves could be taken continuously or on consecutive dates. </p>
		<p style="text-align: justify" >Casual leaves shall be reset on 15th day of every January for all staffs who joined on or before January 2018. </p>
		<p style="text-align: justify" >Casual leaves shall be reset every year on their respective joining dates for all staffs who joined after January 2018. </p>
		<p style="text-align: justify" >Any additional leaves exceeding this count shall be accounted as LOP.</p><br/>
		
		

		<h6 class=" m--font-brand m--font-boldest">Medical Leave</h6>
		
		<p style="text-align: justify" > Medical Leave may be used when the employees receive medical, dental or optical treatment or incapacitated by physical illness, injury etc </p>
		<p style="text-align: justify" >6 days medical leave is entitled to each employee in a year. </p>
		<p style="text-align: justify" > All permanent employees are eligible to avail Medical Leave.</p>
		<p style="text-align: justify" > Norms: Any medical Leave taken for more than 2 days at a stretch has to be supported by a Medical Certificate. If an employee falls sick, he/she or their representatives is expected to inform via telephone, email or sms to the HR Department about his/her absence. Once an employee recovers and joins back work, he/she must inform about the no. of days of medical leave via email, for record to HR. Medical leave cannot be prefixed or suffixed with CL. </p>
		<p style="text-align: justify" >Medical leaves shall be reset on 15th day of every January for all staffs who joined on or before January 2018. </p>
		<p style="text-align: justify" >Medical leaves shall be reset every year on their respective joining dates for all staffs who joined after January 2018. </p>
		<p style="text-align: justify" >Any additional leaves exceeding this count shall be accounted as LOP.</p><br/>
											
				
		<h6 class=" m--font-brand m--font-boldest">Swap Shift</h6>

		<p style="text-align: justify" >There is no restrictions in taking swap leaves if the tech/techs in your team are willing to cover your shift in your absence. But it is mandatory to compensate the swap leave by working for the other tech within 30 days.  </p>
		<p style="text-align: justify" >You are requested to enter the name of tech/techs who will be handling your shift in the field "consent of" while applying for swap leaves. </p>
		<p style="text-align: justify" > The tech who is willing to swap the shift, should also report the Swap through PE portal. </p>
		<p style="text-align: justify" >Swap leaves are always approved by default. </p><br/>

		<h6 class=" m--font-brand m--font-boldest">Loss Of Pay </h6>

		<p style="text-align: justify" >There is no restrictions in taking LOP if the tech/techs in your team are willing to cover your shift in your absence.</p>
		<p style="text-align: justify" >You need to get the consent from Team Leader before applying for LOP. </p>
		<p style="text-align: justify" >Any LOP for more than 2 days at a stretch must be informed before 7 days and any LOP more than 10 days must be informed before 30 days. 
		
		</ul>	
			<br>
	
	

		<h5 class=" m--font-brand m--font-boldest">PERFORMANCE REVIEW, PROMOTION & SALARY APPRAISAL  </h5>  
					<p style="text-align: justify" >Salary revision shall be done every six months for salary scale below 2.5 LPA. Salary scale above 2.5LPA shall be receiving annual appraisal/salary revision. </p>
					<p style="text-align: justify" >L1 Server Engineer shall have a performance evaluation, every 6 months. Promotion shall be strictly based on the performance review held every 6 months. </p>
					<p style="text-align: justify" >Designations from L2 Server Engineers shall have annual 'promotional' reviews. A review will be scheduled every year on the date of Joining month to assess skill set and consider for promotion. A test shall be given during the review. The result of the same shall be considered for promotion. You shall receive a confirmation email once the promotion is approved. </p>
					<p style="text-align: justify" >Server Engineer Trainee shall be promoted to L1 Server Engineer after completing the probation period. A Trainee is eligible for promotion if he/she is has learned all topics assigned during this time. </p>
					<p style="text-align: justify" >On-going Training: This new scheme introduced shall include constant skill-set upgrade of all Server Engineer Trainee and L1 server engineer designations. A topic or technology shall be assigned to you to study and update your skill-set. A review shall be scheduled within 3 months a topic is assigned. The performance at review shall be considered for Promotion. If the tech fails to study and update on the topic, he/she shall be assigned for re-training. </p>
					<p style="text-align: justify" >Salary appraisal or performance revision cannot be done if there are any pending Mandatory Hours. </p>
		<br>

						
		<h5 class=" m--font-brand m--font-boldest">WARNINGS & SUSPENSIONS</h5>  
					<p style="text-align: justify" > a) Stage 1 : Orange Alert : First Level Warning</p>
					<p style="text-align: justify" >b) Stage 2 : Red Alert – Final Warning</p>
					<p style="text-align: justify" >c) Stage 3 : Suspension</p>
					<p style="text-align: justify" >The warnings shall be removed after performance review or in 6 months whichever comes first. </p>
		<br>

					
		<h5 class=" m--font-brand m--font-boldest">BUDDY</h5>  
					<p style="text-align: justify" >If a tech is assigned to train a buddy tech, the respective details shall be visible under his/her PE profile. Further, </p>
					<p style="text-align: justify" > a) Weekly buddy review should be updated by the senior tech in their PE profile. </p>
					<p style="text-align: justify" >b) All details of the tickets/tasks worked by the buddy tech should be logged by the senior tech. </p>
					<p style="text-align: justify" >c) A monthly review and remarks should be updated regularly. </p>

					<p style="text-align: justify" >All these details logged shall be considered for the performance review of buddy tech. </p>
		<br>

		<h5 class=" m--font-brand m--font-boldest">HASHBOOK</h5>  
					<p style="text-align: justify" >A new tab is introduced in PE dashboard to update technical tips, scripts, commands and other helpful information necessary to assist you for work. All techs are requested to add their contributions to this page through their own PE profile.</p>

					All these details logged shall be considered for the performance review of buddy tech. 
		<br>



			<h5 class=" m--font-brand m--font-boldest">BLOG POSTS</h5>  
	
	<p style="text-align: justify;">Each tech at HashRoot should post at-least one blog every 2 months. Points shall be added for aforementioned activities during the performance evaluation.</p>	
	<br>
	
	<h5 class=" m--font-brand m--font-boldest">TRAINING and SEMINAR</h5>  
	
		<p style="text-align: justify;">Each tech at HashRoot shall be a part of employee training or seminars beginning. Participation in the training program or seminars shall be considered for performance evaluation. </p>	
	<br>
						
<h5 class=" m--font-brand m--font-boldest">DRESS CODE AND WORK STATION ETIQUETTE</h5>  
	<ul><br>
	<h6 class=" m--font-brand m--font-boldest">Dress code</h6>  
<p style="text-align: justify;">In our work environment, clothing should be pressed and never wrinkled. Torn, dirty, or frayed clothing is unacceptable. All seams must be finished.</p>

		<h6 class=" m--font-brand m--font-boldest">Shoes and Footwear</h6>
<p>Conservative walking shoes, dress shoes, oxfords, loafers, boots, flats, dress heels, and backless shoes are acceptable for work. Flip-flops, slippers, sandals, distressed and funky shoes are not acceptable.
</p>
		<h6 class=" m--font-brand m--font-boldest">Work stations</h6>
<p style="text-align: justify;">All office utilities including chairs, cables, laptops and other peripheral devices will be assigned codes and labeled accordingly. Weekly audits will be performed to corroborate the label status. Any tampered stickers or misplaced devices or chairs will be the sole responsibility of the tech in the shift. Always make sure that the labels are in place and not tampered. Performance issues of computers shall be informed to welfare@hashroot.com and get replaced or repaired. You shall not exchange or replace any laptops of other teams or cubicle without consent from HR or Welfare Team.</p>

<h6 class=" m--font-brand m--font-boldest">Music System</h6>
<p>Speaker systems are installed at office with a good intention that you can relieve from the work stress. Avoid playing music in unbearable volume.</p>

<h6 class=" m--font-brand m--font-boldest">Midnight snacks</h6>

<p style="text-align: justify;">Snacks shall be kept at the interview cabin from where you may have it. Avoid eating at the workstation.</p>	
	</ul>
	<br>
	
											

		
	<h5 class=" m--font-brand m--font-boldest">PUBLIC REVIEWS</h5>
	<p style="text-align:justify;">All employees are requested to be a part of company social media activities and promotions. Reviews were intended to boost the Digital Marketing side of our company and we expect each of you to post a sincere review. We truly appreciate your feedback - pros or cons, which has aided in bringing about many improvements in the work environment. Because, effective feedback, is very helpful and a valuable information that will be used to make important decisions. However, illegitimate and untrue reviews posted during or after the employment with HashRoot, intended only for destroying the public image of the company shall not be succumbed and will face strict actions.</p>

<h5 class=" m--font-brand m--font-boldest">REFER AND EARN</h5>

<p style="text-align: justify;">Any techs who refer experienced candidates for live openings will be eligible for Rs 5000, if the candidate completes 3 months of service with us. </p>

<h5 class=" m--font-brand m--font-boldest">ANONYMOUS FEEDBACK</h5>

<p style="text-align: justify;">Employees can directly send suggestions, complaints and feedbacks to CEO in an anonymous way using the url <a href="https://www.hashroot.com/feedback/" target="_blank">https://www.hashroot.com/feedback/</a> </p>
	
	
										</div>
									</div>
								</div>
							<div class="m-separator m-separator--dashed"></div>
							</div>
						
						</div>
						</div>
<!--				close tab4-->
										
						</div>
							</div>	
						</div>	
					</div>			
</div>
</div>
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
	</div></div></div>
	
		
<!--modal ticket reports starts		-->

<div class="modal fade show" id="ticket_edit_model" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" >
	  <div class="modal-dialog modal-lg" role="document"> 
		<div class="modal-content">
			<form class="m-form m-form--fit m-form--label-align-right" action=""  method="post" id="wrokReport" data-toggle="modal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							×
						</span>
					</button>
					
				</div>
				<div class="modal-body">
					<form  class="m-form m-form--fit m-form--label-align-right" action="./get_own_work_report"  method="post" id="edit_ticket_form" data-toggle="modal">
						<div class="form-group m-form__group row">
							<label class="col-form-label">
								Enter updated response
							</label>
							<textarea class="form-control" rows="6" id="ticket_response_details"></textarea>
						</div>
					</form>	
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary" id="ticekt_respnse_update_btn" >
						Update
					</button>
					
				</div>
				
			</form>
		</div>
	</div>
</div>

<div class="modal fade show" id="reports_user_modal" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" >
	  <div class="modal-dialog modal-lg" role="document"> 
		<div class="modal-content">
			<form class="m-form m-form--fit m-form--label-align-right" action="./get_own_work_report"  method="post" id="wrokReportedit" data-toggle="modal">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									
								</div>
								<div class="modal-body">
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
									<div class="m-section">
										<div class="m-section__content">
										    <div class="table-responsive" style="max-width: 100%;overflow-x: scroll;">
										    
										    	<table class="table table-bordered">
										    		<thead>
										    			<tr>
										    				<th>Ticket Id</th>
										    				<th>Response</th>
										    				<th width="150">SLA</th>
										    			</tr>
										    		</thead>
										    		<tbody id="ticket_details_list"></tbody>
										    	</table>
											    <!-- <div class="row" id="list_reports_user" ></div> -->
											</div>	
										</div>
									</div>
										
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
<!--modal ticket reports close		-->
	
	<!--		NOTIFICATION-->

<div class="modal fade show" id="newnotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
							<div class="modal-dialog " role="document"> 
								<div class="modal-content">
								<form id="addnotification" data-toggle="modal" action="<?php echo base_url('user/notification');?>" method="post">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											For Your Information
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
													As a part of social media campaign and marketing, we request all of you to add companies "HashRoot Limited" and "ServerAdminz Limited" under experience on your Linkedin profile and follow both pages. When you are done, your profile will show the logos of HashRoot and ServerAdminz.<br/>
												<br /></label>
												<label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
																		<input type="checkbox" id="notify" name="linkd_notify"  onchange='handleChange(this);'>
																		Its done!
																		<span></span>
																	</label>
												
											</div>
										
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button type="submit" class="btn btn-primary" id="addtolist">
											Add me to list
										</button>
									</div>
									</form>
								</div>
							</div>
						</div>
<!--		NOTIFICATION-->
<!-- BOF Chat Widget -->
	<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
		<div class="m-quick-sidebar__content m--hide">
			<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
				<i class="la la-close"></i>
			</span>
			<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link " id="message-tab-link" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">
					<!-- <i class="la la-comments" ></i>	Messages -->
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" onclick="Chat.getAllUsers()" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">
					<i class="la la-users"></i>	Users
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link active" onclick="Chat.listChatHistory()" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">
					<i class="la la-retweet"></i>	Chat History
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
					<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light" style="text-align:center;">
					<span class="m-badge m-badge--success m-badge--wide" id="open-chat-person"></span><br/><br/>
						<div class="m-messenger__messages" id="message-list">
							<!-- bof recived message -->
							<!-- <div class="m-messenger__message m-messenger__message--in">
								<div class="m-messenger__message-pic">
									<img src="assets/app/media/img//users/user3.jpg" alt=""/>
								</div>
								<div class="m-messenger__message-body">
									<div class="m-messenger__message-arrow"></div>
									<div class="m-messenger__message-content">
										<div class="m-messenger__message-username">
											Megan wrote
										</div>
										<div class="m-messenger__message-text">
											Hi Bob. What time will be the meeting ?
										</div>
										<div><small class="pull-left">2:30pm</small></div>
									</div>
								</div>
							</div> -->
							<!-- eof recieved message -->
							<!-- bof send message -->
							<!-- <div class="m-messenger__message m-messenger__message--out">
								<div class="m-messenger__message-body">
									<div class="m-messenger__message-arrow"></div>
									<div class="m-messenger__message-content">
										<div class="m-messenger__message-text">
											Hi Megan. It's at 2.30PM
										</div>
										<div><small class="pull-right">2:30pm</small></div>
									</div>
								</div>
							</div> -->
							<!-- eof send message -->
							
						</div>
						<div class="m-messenger__seperator"></div>
						<!-- <div class="clear-fix"></div> -->
						<div class="m-messenger__form pull-left">
							<div class="m-messenger__form-controls">
								<textarea style="resize:none;" id="new-message" placeholder="Type your message here" class="m-messenger__form-input"></textarea>
							</div>
							<div class="m-messenger__form-tools">
								<a href="javascript:void(0)" onclick="Chat.doSend()" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air">
									<i class="flaticon-paper-plane"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane  " id="m_quick_sidebar_tabs_settings" role="tabpanel">
					<div class="m-list-timeline__items" id="users-list">
						<div class="m-list-settings__group">
							<a href="javascript:void(0)" class="m-list-settings__heading">
							</a>
						</div>
					</div>
					<div class="m-messenger__seperator"></div>
					
					<div class="users-list-search-container" >
					<i class="flaticon-search-1" style="color:#5867dd;margin-left:10px;">  </i><div class="user-search" style="">
							<hr />
							<input type="text" id="search-user-widget" placeholder="search users here" class="form-control" name="" style="width: 100%">
						</div>
					</div>
				</div>
				<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">
					<div class="m-list-timeline__items" id="chat-history">
						<div class="m-list-settings__group">
							<a href="javascript:void(0)" class="m-list-settings__heading">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- EOF Chat Widget -->

	<!-- BOF Previous shift model -->
	<div class="modal fade" id="previous-shift-moal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Generate Previous Shifts
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="">
					</div>
					<br/>
					<form>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">
								Members:
							</label>
							<select class="form-control" id="week-list" style="width: 100%"></select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="generate-old-shift-btn" class="btn btn-primary">
						Submit
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- EOF Previous shift model -->
		
		<!-- Tasks modal start-->
	<div class="modal fade" id="othrtasks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xlg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal_title m--font-boldest m--font-brand text-center" id="task_title"></h5>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="">
					</div>
					<br/>
					<div class="m-scrollable m-scroller ps ps--active-y" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="height: 500px; overflow: hidden;">
						<div class="form-group m-form__group col-md-12">

						<table class="table table-sm m-table m-table--head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>Assignee</th>
									<th>Assigner</th>
									<th>Date</th>
									<th>Task</th>
									<th>Status</th>
									<th>Deadline</th>
									<th>Attachments</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td  id="assigned_to"></td>
									<td id="assigner"></td>
									<td id="assigned_date"></td>
									<td id="table_task_title" ></td>
									<td id="task_status"></td>
									<td id="task_deadline"></td>
									<td id="task_attachments"></td>
								</tr>
							</tbody>
						</table>
						<br/>
						<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded" style="margin-bottom:10px;">Task Description</span>
						<div id="task_details" style="margin-bottom:30px;"></div>
						
						<span class="m-badge m-badge--brand m-badge--wide m-badge--rounded">Conversation</span>
						<div id="task_comments"></div>
							
						</div>
					

					<form  id="update_task_comment" class="m-form " action="./updateTaskComment" method="post" >
						<div class="form-group m-form__group col-md-12">
							<textarea name="comment" class="form-control m-input" id="text-comments" placeholder="Enter comments"></textarea>
						</div>
						
						<div class="row form-group m-form__group col-md-12">
							<div class="form-group m-form__group col-md-6">
								<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="float:right;">
										<input type="checkbox" name="status" id="task_checkbox"> Completed
										<span></span>
								</label>
							</div>
							<input type="hidden" name="task_id" class="form-control" id="task_id">
							<div class="col-md-6">
								<button type="submit" id="tasks-btn" class="btn btn-primary btn-sm">Send</button>
							</div>
						</div>
											
						<div class="modal-footer">
						
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Tasks model end -->

		<script type="text/javascript">
			/**
			 * Time converter common function
			 */
			function timeConverter(UNIX_timestamp){
			  	var a = new Date(UNIX_timestamp * 1000);
			  	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
			  	var year = a.getFullYear();
			  	var month = months[a.getMonth()];
			  	var date = a.getDate();
			  	var hour = a.getHours();
			  	var min = a.getMinutes();
			  	var sec = a.getSeconds();
			  	var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
			  	return time;
			}
		</script>
		
		<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/user_custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/shift-manager.js" type="text/javascript"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.2.5/js/swiper.min.js" type="text/javascript"></script>

		<!-- <script src="//www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/charts.js" type="text/javascript"></script> -->
		<!-- <Iframe style="display: none;" src="<?php echo base_url();?>firebase.php" width="300" height="600"></Iframe> -->

			<?php require_once('firebase.php') ?>
		

<script type="text/javascript">
	
	//requires carouFredsel.js
//pen by Beatrize

jQuery(document).ready(function() {
  "use strict";
  $(".carousel").carouFredSel({
    responsive: true,
    width: "100%",
    circular: true,
    scroll: {
      item: 1,
      duration: 500,
      pauseOnHover: true
    },
    auto: true,
    items: {
      visible: {
        min: 1,
        max: 1
      },
      height: "variable"
    },
    pagination: {
      container: ".sliderpagnation",
      anchorBuilder: false
    }
  });
});

</script>

<script type="text/javascript">
	$('#month_history').on('submit', function(event)
		{
			event.preventDefault();
//			alert('hii');
			$('#new-div').html('<div class=" m-spinner m-spinner--danger"></div>');
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
						
						setTimeout(function(){
//							alert("Hello"); 
							$('#new-div').show().html(data);
						}, 1000);
//						if(data['stat'] == 0)
//						{
//							//alert('Hi');
//							$('#email-subs').css("border-color","red");
//							$('#success_news').hide();
//							$('#error_news').show().html(data['stat-msg']);
//						}
//						else
//						{
//							//  $('#error_news').hide();
//							 $('#email-subs').css("border-color","");
//							 $('#newsletter_form').hide();
//							 $('#success_news').show().html(data['stat-msg']);
//						}
//						$("#newsletter_form")[0].reset();
					}
				});
				return false;
		})
</script>
<script>
	document.getElementById("addtolist").style.visibility = "hidden";
	function handleChange(checkbox) {
		
    if(checkbox.checked == true){
        document.getElementById("addtolist").style.visibility = "visible";
    }else{
        document.getElementById("addtolist").style.visibility = "hidden";
   }
}
</script>

<script>

	var chatRoom_a = [];
	var scrollFlag = false;
	var globalPage = 1;
	var chatType;
	var chatImage_a = [];
	var chatImageNull_a = [];

	/*RefreshProjectRoom();
	doUpdate();*/
	var listElm = document.querySelector('.inner-left-side');
	var page = globalPage;
	listElm.addEventListener('scroll', function() {
		if (listElm.scrollTop  == 0 && (globalPage !=0 && scrollFlag == true)) {
			console.log("listElm.scrollHeight:"+listElm.scrollTop);
			page = globalPage;
			doUpdate(page);
			// $(".m-project").scrollTop(10);
		}
	});

	function refreshChat(payload){
		console.clear();
		console.log(payload);
		var data = payload.data;
		/*if(data.chatType == 'group'){
			newMessageFromGroup(data);
		}else{
			Chat.newMessageFromIndividual(data);
		}*/
		
		switch (data.chatType){
			case 'group':
				newMessageFromGroup(data);
				break;
			case 'individual':
				Chat.newMessageFromIndividual(data);
				break;
			case 'online_list':
				Chat.onlineUserManager(data);
				break;
		}
		
		// checkForNewMessage();
	}

	function newMessageFromFcm(data){
		console.log(data);

		var audio = new Audio('<?php echo base_url(); ?>assets/sound/notify.mp3');
		audio.play();

		var thumbnail = "<?php echo base_url(); ?>assets/img/user/avatar.png";
	    					
		if(file_exists("<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg") == true){
			thumbnail = "<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg";
		}

		msg = data.message.replace(/(?:\r\n|\r|\n)/g, '<br />');
		var fullname = '';
		if(data.sender == null){
			fullname = data.sender
		}else{
			fullname = data.sender;
		}
		 $('.m-project').append('\
		 	<div class="chats-others m-alert--icon m-alert alert alert-dismissible fade show" role="alert">\
		 		<div class="m-alert__icon">\
		 			<img src="'+thumbnail+'" alt="" class="mCS_img_loaded">\
		 		</div>\
		 		<div class="msg-body">\
		 			<p><strong>'+fullname+' | <small style="color: #93d1e4;">'+timeConverter(data.chatTime)+'</small></strong>\
		 			</p>\
		 			<span style="line-height: 1.2;font-size: 13px;">'+msg+'</span>\
		 		</div>\
		 	</div>'); 

		 /**
		 * chat message list section scrol to down with division hight
		 */
		
		var divHight = $('.m-project')[0].scrollHeight;
		$(".m-project").scrollTop(divHight+100);	
	}

	function RefreshProjectRoom(){
		var pr_id=$('.prroomid').val();
		 $.post('<?php echo base_url(); ?>Project_room/DoRefresh', function(data) {
	    //    console.log(data);  // process results here
	    $(".m-project").animate({ scrollTop: $('.m-project').prop("scrollHeight")}, 10);

	    });
	}

	function FetchAllRooms(){
		saveToken();
		console.log('FetchAllRooms');
		$(".m-project").html('<div class="cssload-container"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></div></div>');
		$('#listAllRooms').html('<div class="cssload-container"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></div></div>');
			 		$.ajax({type:'POST',	url:'<?php echo base_url(); ?>Project_room/getallrooms',dataType:'json',success:function(data) {
						 console.log(data);
			 			$('#listAllRooms').html('');
			 			$('#listAllTeamRooms').html('');
						data.prRoom.forEach(function(entry) {
							chatRoom_a.push(entry.pr_id);
							var color="45b0c3";
							if(entry.pru_status==1){
								$('.prroomid').val(entry.pr_id);
								color="2cca4f";
									
								// doUpdate(0); // call doUpdate only after load openedChatRoom.
							}
							var type = "'"+entry.type+"'";

					 		unread_count = '';
							if((entry.unread_count == null) || (entry.unread_count == 0)){
								unread_count = '<i class="la la-yelp"></i> ';
							}else{
								unread_count = '<span class="m-badge m-badge--danger">'+entry.unread_count+'</span>';

							}


					 		$('#listAllRooms').append('<p><a href="javascript:;" id="chat-room-'+entry.pr_id+'" style="color:#'+color+'" onclick="ChangeRoom('+entry.pr_id+','+ type+')" > '+unread_count+' &nbsp; <b> '+entry.pru_title+' </b> </a></p>');  
					 		// $('#listAllRooms').append('<p><a href="javascript:;" id="room_name_'+entry.pr_id+'" style="color:#'+color+'" onclick="ChangeRoom('+entry.pr_id+')" ><i class="la la-yelp"></i> &nbsp; <b> '+entry.pru_title+' </b></a></p>');  
    					 						 	
						});

						data.teRoom.forEach(function(entry) {
							var color="45b0c3";
							var type = "'"+entry.type+"'";
							if((entry.unread_count == null) || (entry.unread_count == 0)){
								unread_count = '<i class="la la-yelp"></i>';
							}else{
								unread_count = '<span class="m-badge m-badge--danger">'+entry.unread_count+'</span>';

							}
							var type = "'"+entry.type+"'";
							$('#listAllTeamRooms').append('<p><a href="javascript:;" id="chat-room-'+entry.team_id+'" style="color:#'+color+'" onclick="ChangeRoom('+entry.team_id+','+ type+')" > '+unread_count+'  &nbsp; <b> '+entry.name+' </b></a></p>');  
							ChangeRoom(entry.team_id, entry.type);
						});
						// doUpdate(0); // call doUpdate only after load openedChatRoom.
				RefreshProjectRoom();
    						} // process results here       
			
   		  });
			
		// doUpdate();	
	}

	function ChangeRoom(pr_id, type){
		chatType = type;
		$(".m-project").html('<div class="cssload-container"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></div></div>');
		$('.prroomid').val(pr_id);
		// $('#room_name_'+pr_id).css({"color":"red"});
			$.ajax({type:'POST',	url:'<?php echo base_url(); ?>Project_room/getRoomData',
				data:{pr_id: pr_id, type: type},
				dataType:'json',
				success:function(data) {
					console.log(data);
					$('#project_room h3').html('#'+data.pr_name); 
					$('.total_members').html(''+data.totalusers+' Members'); 
					$('.tag').html(' '+data.pr_tag+''); 
					var users=data.pr_userids;
					users= Array.from(Object.keys(users), k=>users[k]);
					var memberlist="";
					users.forEach(function(entry) {
						memberlist +=" "+entry.name+"<br />";
							});
					$('a.members').attr('data-content',memberlist);	
					}
    		});    	
		RefreshProjectRoom();
		doUpdate(0);
		manageChatRoomList(pr_id);
	 }

	/**
	 * manage opened chat room color
	 */
	
	function manageChatRoomList(pr_id){
		chatRoom_a.forEach(function(chat){
			if(pr_id != chat){
				$("#chat-room-"+chat).css('color', '#45b0c3');
			}else{
				$("#chat-room-"+chat).css('color', '#2cca4f');
			}
		});
	}
		 
	function doUpdate(page){		
		var pr_id=$('.prroomid').val();
				globalPage = page+10;
				var rqstData = JSON.stringify({
		            pr_id: pr_id,
		            offset: page,
		            chatType: chatType
		        });
				console.log(rqstData);
        		$.ajax({type:'POST',
        			url:'<?php echo base_url(); ?>Project_room/getMessages',
        			data:{
        				pr_id: pr_id,
		            	offset: page,
		            	chatType: chatType
		            },
        			dataType:'json',
        			success:function(data) {
					console.log(data);
        		$(".cssload-container").hide();

        			if(data.status == 'success'){
        				scrollFlag = true;
	    				data.chats.forEach(function(entry) { 
	    					
	    					var thumbnail = "<?php echo base_url(); ?>assets/img/user/avatar.png";

	    					/**
	    					 * check image is exist or not
	    					 */
	    					if((chatImage_a.includes(entry.emp_id) == false) && (chatImageNull_a.includes(entry.emp_id) == false))
	    					{
		    					if(file_exists("<?php echo base_url(); ?>assets/img/user/"+entry.emp_id+".jpg") == true){
		    						chatImage_a.push(entry.emp_id);
		    						thumbnail = "<?php echo base_url(); ?>assets/img/user/"+entry.emp_id+".jpg";
		    					}else{
		    						chatImageNull_a.push(entry.emp_id);
		    					}
	    					}else if(chatImageNull_a.includes(entry.emp_id) == false){
	    						thumbnail = "<?php echo base_url(); ?>assets/img/user/"+entry.emp_id+".jpg";
	    					}
	    					

	    					msg = entry.pd_msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
	    					 $('.m-project').prepend('\
	    					 	<div class="chats-others m-alert--icon m-alert alert alert-dismissible fade show" role="alert">\
	    					 		<div class="m-alert__icon">\
	    					 			<img src="'+thumbnail+'" alt="" class="mCS_img_loaded">\
	    					 		</div>\
	    					 		<div class="msg-body">\
	    					 			'+getEnableDeleteBtn(entry.pd_id, entry.own_message)+'\
	    					 			<p><strong>'+entry.fullname+' | <small style="color: #93d1e4;">'+timeConverter(entry.pd_date)+'</small></strong>\
	    					 			</p>\
	    					 			<span style="line-height: 1.2;font-size: 13px;">'+msg+'</span>\
	    					 		</div>\
	    					 	</div>'); 
	    					 markRead(entry.pr_id);
	    					/**
	    					 * chat message list section scrol to down with division hight
	    					 */
	    					if(page == 0){
								var divHight = $('.m-project')[0].scrollHeight;
								$(".m-project").scrollTop(divHight+100);			 	
	    					}else{
	    						$(".m-project").scrollTop(60);
	    					}
						});
					}else{
						scrollFlag = false;
						// $('.m-project').append('<p align="center">Please choose a chat room</p>');
					}
				
				if(data.sound_flag==1){     	
				
					$(".m-project").animate({ scrollTop: $('.m-project').prop("scrollHeight")}, 10);
	    				var audio = new Audio('<?php echo base_url(); ?>assets/sound/notify.mp3');
						audio.play();
    				}
    				// setInterval(checkForNewMessage, 2000);
    				  // setTimeout(doUpdate,2000);
    						} // process results here       
			
   		  });
	/*    if($(".m-project > div").length<1){
	  	$(".m-project").html("<p >No history found</p>");
	  }*/
	    
	}


	function markRead(room_id){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url(); ?>Project_room/markReadMessage',
			data:{room_id: room_id, chatType: chatType},
			dataType:'json', 
			success:function(data) {
				console.log(data)	       		 
			} // process results here       
		
		 });
	}
	
	function file_exists(url){
		var status = false;
		$.ajax({
		    url:url,
		    type:'HEAD',
		    async: false,
		    error: function()
		    {
		        status = false;
		    },
		    success: function()
		    {
		        status = true;
		    }
		});
		return status;
	}

	function checkForNewMessage(){
		var pr_id=$('.prroomid').val();
				
				var rqstData = JSON.stringify({
		            pr_id: pr_id
		        });
				console.log(rqstData);
        		$.ajax({type:'POST',
        			url:'<?php echo base_url(); ?>Project_room/DoUpdate',
        			data: {pr_id: pr_id, chatType},
        			dataType:'json',
        			success:function(data) {
					console.log(data);
        		$(".cssload-container").hide();

	    				data.chats.forEach(function(entry) { 

	    					var thumbnail = "<?php echo base_url(); ?>assets/img/user/avatar.png";
	    					
	    					if(file_exists("<?php echo base_url(); ?>assets/img/user/"+entry.emp_id+".jpg") == true){
	    						thumbnail = "<?php echo base_url(); ?>assets/img/user/"+entry.emp_id+".jpg";
	    					}

	    					msg = entry.pd_msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
	    					 $('.m-project').append('\
	    					 	<div class="chats-others m-alert--icon m-alert alert alert-dismissible fade show" role="alert">\
	    					 		<div class="m-alert__icon">\
	    					 			<img src="'+thumbnail+'" alt="" class="mCS_img_loaded">\
	    					 		</div>\
	    					 		<div class="msg-body">\
	    					 			'+getEnableDeleteBtn(entry.pd_id, entry.own_message)+'\
	    					 			<p><strong>'+entry.fullname+' | <small style="color: #93d1e4;">'+timeConverter(entry.pd_date)+'</small></strong>\
	    					 			</p>\
	    					 			<span style="line-height: 1.2;font-size: 13px;">'+msg+'</span>\
	    					 		</div>\
	    					 	</div>'); 

	    					/**
	    					 * chat message list section scrol to down with division hight
	    					 */
	    					
							var divHight = $('.m-project')[0].scrollHeight;
							$(".m-project").scrollTop(divHight+100);			 	
	    					
						});
				
				if(data.sound_flag==1){     	
				
					$(".m-project").animate({ scrollTop: $('.m-project').prop("scrollHeight")}, 10);
	    				var audio = new Audio('<?php echo base_url(); ?>assets/sound/notify.mp3');
						audio.play();
    				}
    				  // setTimeout(doUpdate,2000);
    						} // process results here       
			
   		  });
	}

	/**
	 * return a delete button with delete message
	 */
	function getEnableDeleteBtn(pd_id, own_message){
		var button = '';
		/*if(own_message == 1){

			button = '<button type="button" class="close" onclick="RemoveChat('+pd_id+')" data-dismiss="alert" aria-label="Close"></button>';
		}*/
		return button;
	}

	function doSend(){
		
		var pr_id=$('.prroomid').val();
		var pr_msg=$('.new-messanger-msg textarea').val();
    		$.ajax({
    			type:'POST',
    			url:'<?php echo base_url(); ?>Project_room/DoSend',
    			data:{pr_id,pr_msg,chatType},
    			dataType:'json', 
    			success:function(data) {
    			msg = data.pd_msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
       		 $('.m-project').append('<div class="m-messenger__message m-messenger__message--in"><div class="m-messenger__message-pic"><img src="<?php echo base_url(); ?>assets/img/user/'+data.emp_id+'.jpg" alt="" class="mCS_img_loaded"></div><div class="m-messenger__message-body">	<div class="m-messenger__message-arrow"></div><div class="m-messenger__message-content"><div class="m-messenger__message-username"><b>'+data.fullname+' </b><span class="m-link m-link--state m-link--info">Now</span></div><div class="m-messenger__message-text">'+msg+'</div></div></div></div>'); 
	//scroll to bottom 
       		$(".m-project").animate({ scrollTop: $('.m-project').prop("scrollHeight")}, 600);
	//clear msg from textarea
       		 $('.new-messanger-msg textarea').val('');
			} // process results here       
			
   		 });
	}
	
	function RemoveChat(pd_id){
			 $.post('<?php echo base_url(); ?>Project_room/DoRemove',{pd_id}, function(data) {    

 		   });
	}
</script>


<!-- /**
 * Push notification for chat.
 */ -->
<script type="text/javascript">
	

	
		function saveToken (){
			var tokenLocal = localStorage.getItem('token');

			/*$.ajax({
	            type:'POST',
	            url:'<?php echo base_url(); ?>Project_room/saveNotification',
				data:{token},
	            dataType: "json",
	            contentType: "application/json",
	            success: function(results){
	            	console.log(results);
	            },
	            error: function(err){
	            	console.log(err);
	            }
	        });*/

	        $.ajax({
    			type:'POST',
    			url:'<?php echo base_url(); ?>Project_room/saveNotification',
    			data:{token: tokenLocal},
    			dataType:'json', 
    			success:function(data) {
    				console.log(data)	       		 
				} // process results here       
			
   		 });
		}

	
</script>
<script src="//www.amcharts.com/lib/4/core.js"></script>
<script src="//www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>

/** Chart break */
// Create chart instance

am4core.useTheme(am4themes_animated);

var chart1 = am4core.create("work_break_graph", am4charts.XYChart);

// Add data
chart1.dataSource.url ='<?php echo base_url(); ?>user/getUserWorkAndBreakTime';

// Create axes
var dateAxis = chart1.xAxes.push(new am4charts.DateAxis());

dateAxis.renderer.minGridDistance = 40;

var valueAxis2 = chart1.yAxes.push(new am4charts.ValueAxis());
valueAxis2.title.text = "Hours";

var series3 = chart1.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "work";
series3.dataFields.dateX = "date";
series3.name = "Worked Hours";
series3.strokeWidth = 2;
//series3.tensionX = 0.7;
series3.yAxis = valueAxis2;
series3.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
series3.strokeWidth = 2;
series3.minBulletDistance = 15;


var bullet3 = series3.bullets.push(new am4charts.CircleBullet());
bullet3.circle.radius = 4;
bullet3.circle.strokeWidth = 2;
bullet3.circle.fill = am4core.color("#fff");

var series4 = chart1.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "break";
series4.dataFields.dateX = "date";
series4.name = "Break Hours";
series4.strokeWidth = 2;
//series4.tensionX = 0.7;
series4.yAxis = valueAxis2;
series4.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
// series4.stroke = chart.colors.getIndex(0).lighten(0.5);
// series4.strokeDasharray = "3,3";
series4.strokeWidth = 2;
//series4.minBulletDistance = 15;
series4.fill = am4core.color("red");
series4.stroke = am4core.color("red");



var bullet4 = series4.bullets.push(new am4charts.CircleBullet());
bullet4.circle.radius = 3;
bullet4.circle.strokeWidth = 2;
bullet4.circle.fill = am4core.color("#fff");

var seriesflexi = chart1.series.push(new am4charts.LineSeries());
seriesflexi.dataFields.valueY = "flexi";
seriesflexi.dataFields.dateX = "date";
seriesflexi.name = "Flexi Hours";
seriesflexi.strokeWidth = 2;
seriesflexi.yAxis = valueAxis2;
seriesflexi.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
seriesflexi.strokeWidth = 2;
seriesflexi.fill = am4core.color("#7FFF00");
seriesflexi.stroke = am4core.color("#7FFF00");

var bulletflexi = seriesflexi.bullets.push(new am4charts.CircleBullet());
bulletflexi.circle.radius = 3;
bulletflexi.circle.strokeWidth = 2;
bulletflexi.circle.fill = am4core.color("#fff");

var seriesExtra = chart1.series.push(new am4charts.LineSeries());
seriesExtra.dataFields.valueY = "extra";
seriesExtra.dataFields.dateX = "date";
seriesExtra.name = "Extra Hours";
seriesExtra.strokeWidth = 2;
seriesExtra.yAxis = valueAxis2;
seriesExtra.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
seriesExtra.strokeWidth = 2;
seriesExtra.fill = am4core.color("orange");
seriesExtra.stroke = am4core.color("orange");

var bulletExtra = seriesExtra.bullets.push(new am4charts.CircleBullet());
bulletExtra.circle.radius = 3;
bulletExtra.circle.strokeWidth = 2;
bulletExtra.circle.fill = am4core.color("#fff");
// Add cursor
chart1.cursor = new am4charts.XYCursor();

// Add legend
chart1.legend = new am4charts.Legend();
chart1.legend.position = "top";

// Add scrollbar
chart1.scrollbarX = new am4charts.XYChartScrollbar();
 chart1.scrollbarX.series.push(series4);
 chart1.scrollbarX.series.push(series3);
 chart1.scrollbarX.series.push(seriesflexi);
 chart1.scrollbarX.series.push(seriesExtra);
chart1.scrollbarX.parent = chart1.bottomAxesContainer;
chart1.events.on("ready", function () {
  dateAxis.zoom({start:0.5, end:1});

// var days=20; 
// var date = new Date();
// var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
// var day =last.getDate();
// var month=last.getMonth()+1;
// var year=last.getFullYear();
// var firstday =day.getDate();
// var firstmonth=day.getMonth();
// var firstyear=day.getFullYear();
//   dateAxis.zoomToDates(
//     year+"-"+month+"-"+day,
// 	firstyear+"-"+firstmonth+"-"+firstday
//   );
  
});


//---------------------PE Score Graph --------------------------------------------------

var chart = am4core.create("performance_score", am4charts.XYChart);

// Add data
chart.dataSource.url ='<?php echo base_url(); ?>user/scoreAdjustmentGraph';

// Create axes
var dateAxis1 = chart.xAxes.push(new am4charts.DateAxis());

dateAxis1.renderer.minGridDistance = 40;

var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis1.title.text = "Score";

var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "pe";
series1.dataFields.dateX = "date";
series1.name = "Performance Score";
series1.strokeWidth = 2;
//series1.tensionX = 0.7;
series1.yAxis = valueAxis1;
series1.tooltipText = "{name}\n[bold font-size: 13]{valueY}[/] {pe_criteria}";
series1.strokeWidth = 2;
//series1.minBulletDistance = 15;

var bullet1 = series1.bullets.push(new am4charts.CircleBullet());
bullet1.circle.radius = 3;
bullet1.circle.strokeWidth = 2;
bullet1.circle.fill = am4core.color("#fff");

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "ie";
series2.dataFields.dateX = "date";
series2.name = "Integrity Score";
series2.strokeWidth = 2;
//series2.tensionX = 0.7;
series2.yAxis = valueAxis1;
series2.tooltipText = "{name}\n[bold font-size: 13]{valueY}[/] {ie_criteria}";
// series4.stroke = chart.colors.getIndex(0).lighten(0.5);
// series4.strokeDasharray = "3,3";
series2.strokeWidth = 2;
//series2.minBulletDistance = 15;
series2.fill = am4core.color("#e59165");
series2.stroke = am4core.color("#e59165");

var bullet2 = series2.bullets.push(new am4charts.CircleBullet());
bullet2.circle.radius = 3;
bullet2.circle.strokeWidth = 2;
bullet2.circle.fill = am4core.color("#fff");

var series5 = chart.series.push(new am4charts.LineSeries());
series5.dataFields.valueY = "ce";
series5.dataFields.dateX = "date";
series5.name = "Cultural Score";
series5.strokeWidth = 2;
//series5.tensionX = 0.7;
series5.yAxis = valueAxis1;
series5.tooltipText = "{name}\n[bold font-size: 13]{valueY}[/] {ce_criteria}";
series5.strokeWidth = 2;
//series5.minBulletDistance = 15;
series5.fill = am4core.color("#1cc158");
series5.stroke = am4core.color("#1cc158");

var bullet5 = series5.bullets.push(new am4charts.CircleBullet());
bullet5.circle.radius = 3;
bullet5.circle.strokeWidth = 2;
bullet5.circle.fill = am4core.color("#fff");

// Add cursor
chart.cursor = new am4charts.XYCursor();

// Add legend
chart.legend = new am4charts.Legend();
chart.legend.position = "top";

// Add scrollbar
chart.scrollbarX = new am4charts.XYChartScrollbar();
 chart.scrollbarX.series.push(series1);
 chart.scrollbarX.series.push(series2);
 chart.scrollbarX.series.push(series5);
chart.scrollbarX.parent = chart.bottomAxesContainer;
// chart.events.on("ready", function () {
//   dateAxis1.zoom({start:0.93, end:1});
// });



/**
 * ------------PE ticket Graph ServerAdminz only -----------
 */
<?php if($dep_id==2){ ?>
var chart2 = am4core.create("ticket_count_graph", am4charts.XYChart);

// Add data
chart2.dataSource.url ='<?php echo base_url(); ?>user/workReportGraph';

// Create axes
var dateAxis2 = chart2.xAxes.push(new am4charts.DateAxis());

dateAxis2.renderer.minGridDistance = 40;

var valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());
valueAxis2.title.text = "Tickets";

var series6 = chart2.series.push(new am4charts.LineSeries());
series6.dataFields.valueY = "handled";
series6.dataFields.dateX = "date";
series6.name = "Handled Tickets";
series6.strokeWidth = 2;
//series6.tensionX = 0.7;
series6.yAxis = valueAxis2;
series6.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
series6.strokeWidth = 2;
//series6.minBulletDistance = 15;

var bullet6 = series6.bullets.push(new am4charts.CircleBullet());
bullet6.circle.radius = 4;
bullet6.circle.strokeWidth = 2;
bullet6.circle.fill = am4core.color("#fff");


var series7 = chart2.series.push(new am4charts.LineSeries());
series7.dataFields.valueY = "resolved";
series7.dataFields.dateX = "date";
series7.name = "Resolved Tickets";
series7.strokeWidth = 2;
//series7.tensionX = 0.7;
series7.yAxis = valueAxis2;
series7.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
// series4.stroke = chart.colors.getIndex(0).lighten(0.5);
// series4.strokeDasharray = "3,3";
series7.strokeWidth = 2;
//series7.minBulletDistance = 15;
series7.fill = am4core.color("#2cd905");   
series7.stroke = am4core.color("#2cd905");

var bullet7 = series7.bullets.push(new am4charts.CircleBullet());
bullet7.circle.radius = 4;
bullet7.circle.strokeWidth = 2;
bullet7.circle.fill = am4core.color("#fff");

var series8 = chart2.series.push(new am4charts.LineSeries());
series8.dataFields.valueY = "pending";
series8.dataFields.dateX = "date";
series8.name = "Pending Tickets";
series8.strokeWidth = 2;
//series8.tensionX = 0.7;
series8.yAxis = valueAxis2;
series8.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
series8.strokeWidth = 2;
//series8.minBulletDistance = 15;
series8.fill = am4core.color("#ffb822");
series8.stroke = am4core.color("#ffb822");

var bullet8 = series8.bullets.push(new am4charts.CircleBullet());
bullet8.circle.radius = 4;
bullet8.circle.strokeWidth = 2;
bullet8.circle.fill = am4core.color("#fff");

var series_sla = chart2.series.push(new am4charts.LineSeries());
series_sla.dataFields.valueY = "sla";
series_sla.dataFields.dateX = "date";
series_sla.name = "SLA Errors";
series_sla.strokeWidth = 2;
//series_sla.tensionX = 0.7;
series_sla.yAxis = valueAxis2;
series_sla.tooltipText = "{name}\n[bold font-size: 15]{valueY}[/]";
series_sla.strokeWidth = 2;
//series8.minBulletDistance = 15;
series_sla.fill = am4core.color("red");
series_sla.stroke = am4core.color("red");

var bullet_sla = series_sla.bullets.push(new am4charts.CircleBullet());
bullet_sla.circle.radius = 4;
bullet_sla.circle.strokeWidth = 2;
bullet_sla.circle.fill = am4core.color("#fff");

// Add cursor
chart2.cursor = new am4charts.XYCursor();

// Add legend
chart2.legend = new am4charts.Legend();
chart2.legend.position = "top";

// Add scrollbar
chart2.scrollbarX = new am4charts.XYChartScrollbar();
 chart2.scrollbarX.series.push(series6);
 chart2.scrollbarX.series.push(series7);
 chart2.scrollbarX.series.push(series8);
 chart2.scrollbarX.series.push(series_sla);
chart2.scrollbarX.parent = chart2.bottomAxesContainer;
chart2.events.on("ready", function () {
  dateAxis2.zoom({start:0.5, end:1});
});
<?php }?>
</script>
<!--	close test-->
		
		<!--end::Base Scripts -->
		</ body>
		<!-- end::Body -->
		</ html>