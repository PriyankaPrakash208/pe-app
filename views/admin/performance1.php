<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			HashRoot | Performance Table
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
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
	</head>
	<!-- end::Body -->
	<body class="m-page--fluid m-content--skin-light2  m-header--fixed m-header--fixed-mobile m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- begin::Header -->
			<header class="m-grid__item		m-header "  data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize" >
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

													<span class="m-topbar__username">
														Admin Panel
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
				<div class="m-header__bottom">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">
							<!-- begin::Horizontal Menu -->
							<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
									<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
										<li class="m-menu__item  m-menu__item--active"  aria-haspopup="true">
											<a  href="<?php echo base_url();?>/admin/home" class="m-menu__link ">
												<span class="m-menu__item-here">
												</span>
												<span class="m-menu__link-text">
													Dashboard
												</span>
											</a>
										</li>
<!--
										<li class="m-menu__item"  aria-haspopup="true">
											<a  href="#" class="m-menu__link ">
												<span class="m-menu__item-here">
												</span>
												<span class="m-menu__link-text">
													Report
												</span>
											</a>
										</li>
-->
									</ul>
								</div>
							</div>
							<!-- end::Horizontal Menu -->
							<!--begin::Search-->
							<div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" data-search-type="default">
								<!--begin::Search Form -->
								<form class="m-header-search__form">
									<div class="m-header-search__wrapper">
										<span class="m-header-search__icon-search" id="m_quicksearch_search">
											<i class="la la-search">
											</i>
										</span>
										<span class="m-header-search__input-wrapper">
											<input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
										</span>
										<span class="m-header-search__icon-close" id="m_quicksearch_close">
											<i class="la la-remove">
											</i>
										</span>
										<span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
											<i class="la la-times">
											</i>
										</span>
									</div>
								</form>
								<!--end::Search Form -->
								<!--begin::Search Results -->
								<div class="m-dropdown__wrapper">
									<div class="m-dropdown__arrow m-dropdown__arrow--center">
									</div>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
												<div class="m-dropdown__content m-list-search m-list-search--skin-light">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Search Results -->
							</div>
							<!--end::Search-->
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
											Evaluation Portal
											
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<i class="la la-plus m--hide"></i>
									<span class="m-badge m-badge--danger m-badge--wide">
											<span class="m--font-boldest" style="font-size: 14px"> Employee : <?php echo $fullname; ?></span>
										</span>
									
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="row">
									<div class="col-md-8">
										<div class="m-portlet m-portlet--tab">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear">
															</i>
														</span>
														<h3 class="m-portlet__head-text">
															Evaluation Categories
														</h3>
													</div>
												</div>
											</div> 
											<!--begin::Form-->
											<form class="m-form m-form--fit m-form--label-align-right" id="addperformance" method="post" action="../addperformance/<?php echo $user_id; ?>">
												<div class="m-portlet__body">

													<div class="row">
														<div class="col-md-6">
															<div class="form-group m-form__group m--margin-top-10">
																<div class="m-alert m-alert--icon alert alert-primary" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-graph"></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Performance Evaluation</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Public  Review 
																</label>
																<div class="col-7"style="padding: 0;"> 
																<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="preview" data-value="20"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="preview"  id="preview"  class="form-control input-number" value="<?php echo  $preview; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="preview" data-value="20"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="preview_<?php echo $performance_id; ?>" onclick="updatepoint('preview',<?php echo $performance_id; ?>,<?php echo  $preview; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Client Review
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="creview" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="creview"  id="creview"  class="form-control input-number" value="<?php echo  $creview; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="creview" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="creview_<?php echo $performance_id; ?>" onclick="updatepoint('creview',<?php echo $performance_id; ?>,<?php echo  $creview; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
										<!--  section ends -->	
															
										<!--  section  starts-->					
								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-5 col-form-label text-left">
										Ticket Quality
									</label>
									<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="tquality" data-value="3"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="tquality"  id="tquality"  class="form-control input-number" value="<?php echo  $tquality; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="tquality" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="tquality_<?php echo $performance_id; ?>" onclick="updatepoint('tquality',<?php echo $performance_id; ?>,<?php echo  $tquality; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
								</div>
										<!--  section ends -->	
										
															
										<!--  section  starts-->					
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Communication Quality
																</label>
										<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="cquality" data-value="3"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="cquality"  id="cquality"  class="form-control input-number" value="<?php echo  $cquality; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="cquality" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="cquality_<?php echo $performance_id; ?>" onclick="updatepoint('cquality',<?php echo $performance_id; ?>,<?php echo  $cquality; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															
										<!--  section  ends-->					
															
															
										<!--  section  starts-->
								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-5 col-form-label text-left">
										Thanks Replies (+3)
									</label>
										<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="treplies" data-value="3"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="treplies"  id="treplies"  class="form-control input-number" value="<?php echo  $treplies; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="treplies" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="treplies_<?php echo $performance_id; ?>" onclick="updatepoint('treplies',<?php echo $performance_id; ?>,<?php echo  $treplies; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
								</div>
										<!--  section  ends-->
															
															
										<!--  section  starts-->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Policy Violation 
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="pviolation" data-value="3"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="pviolation"  id="pviolation"  class="form-control input-number" value="<?php echo  $pviolation; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="pviolation" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="pviolation_<?php echo $performance_id; ?>" onclick="updatepoint('pviolation',<?php echo $performance_id; ?>,<?php echo  $pviolation; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															
															
										<!--  section  ends-->
															
															
										<!--  section  starts-->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	SLA Violation 
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="slaviolation" data-value="2"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="slaviolation"  id="slaviolation"  class="form-control input-number" value="<?php echo  $slaviolation; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="slaviolation" data-value="2"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="slaviolation_<?php echo $performance_id; ?>" onclick="updatepoint('slaviolation',<?php echo $performance_id; ?>,<?php echo  $slaviolation; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
										<!--  section  ends-->	
										
														
										<!--  section  starts-->
										<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Work Reports 
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="wreport" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="wreport"  id="wreport"  class="form-control input-number" value="<?php echo  $wreport; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="wreport" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="wreport_<?php echo $performance_id; ?>" onclick="updatepoint('wreport',<?php echo $performance_id; ?>,<?php echo  $wreport; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
											<!--  section  ends-->
											
															<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-5 col-form-label text-left">
																Skype Activities
															</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="skypeactivity" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="skypeactivity"  id="skypeactivity"  class="form-control input-number" value="<?php echo  $skypeactivity; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="skypeactivity" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="skypeactivity_<?php echo $performance_id; ?>" onclick="updatepoint('skypeactivity',<?php echo $performance_id; ?>,<?php echo  $skypeactivity; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														</div>
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-5 col-form-label text-left">
																Warning
															</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="warning" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="warning"  id="warning"  class="form-control input-number" value="<?php echo  $warning; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="warning" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="warning_<?php echo $performance_id; ?>" onclick="updatepoint('warning',<?php echo $performance_id; ?>,<?php echo  $warning; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														</div>
														<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Suspension 
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="suspension" data-value="20"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="suspension"  id="suspension"  class="form-control input-number" value="<?php echo  $suspension; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="suspension" data-value="20"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="suspension_<?php echo $performance_id; ?>" onclick="updatepoint('suspension',<?php echo $performance_id; ?>,<?php echo  $suspension; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														</div>
														<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Blog Posts
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="blogpost" data-value="20"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="blogpost"  id="blogpost"  class="form-control input-number" value="<?php echo  $blogpost; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="blogpost" data-value="20"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="blogpost_<?php echo $performance_id; ?>" onclick="updatepoint('blogpost',<?php echo $performance_id; ?>,<?php echo  $blogpost; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
														
															
															
																<div class="form-group m-form__group m--margin-top-10">
																<div class="m-alert m-alert--icon alert alert-info" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-profile"></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Demeanour Evaluation</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Seminars 
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="seminars" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="seminars"  id="seminars"  class="form-control input-number" value="<?php echo  $seminars; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="seminars" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="seminars_<?php echo $performance_id; ?>" onclick="updatepoint('seminars',<?php echo $performance_id; ?>,<?php echo  $seminars; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Training
																</label>
																	<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="training" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="training"  id="training"  class="form-control input-number" value="<?php echo  $training; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="training" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="training_<?php echo $performance_id; ?>" onclick="updatepoint('training',<?php echo $performance_id; ?>,<?php echo  $training; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Code of conduct : Work Station Etiquette, Dress Code, Discipline (+1 /0 /-1)
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="codeof" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="codeof"  id="codeof"  class="form-control input-number" value="<?php echo  $codeof; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="codeof" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="codeof_<?php echo $performance_id; ?>" onclick="updatepoint('codeof',<?php echo $performance_id; ?>,<?php echo  $codeof; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Linkedin Engagements
																</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="linkedin" data-value="2"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="linkedin"  id="linkedin"  class="form-control input-number" value="<?php echo  $linkedin; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="linkedin" data-value="2"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="linkedin_<?php echo $performance_id; ?>" onclick="updatepoint('linkedin',<?php echo $performance_id; ?>,<?php echo  $linkedin; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Facebook Engagements
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="fb" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="fb"  id="fb"  class="form-control input-number" value="<?php echo  $fb; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="fb" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="fb_<?php echo $performance_id; ?>" onclick="updatepoint('fb',<?php echo $performance_id; ?>,<?php echo  $fb; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Twitter Engagements 
																</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="twitter" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="twitter"  id="twitter"  class="form-control input-number" value="<?php echo  $twitter; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="twitter" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="twitter_<?php echo $performance_id; ?>" onclick="updatepoint('twitter',<?php echo $performance_id; ?>,<?php echo  $twitter; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Instagram Engagements
																</label>
													<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="insta" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="insta"  id="insta"  class="form-control input-number" value="<?php echo  $insta; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="insta" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="insta_<?php echo $performance_id; ?>" onclick="updatepoint('insta',<?php echo $performance_id; ?>,<?php echo  $insta; ?>);" class="btn btn-success m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															<!--<div class="form-group m-form__group">
																<label for="exampleTextarea">
																	Comments
																</label>
																<textarea class="form-control m-input"  rows="4"  name="comments"  id="comments"></textarea>
															</div>-->
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-6">
															</div>
															<div class="col-6 text-right">
															<!--	<button type="submit" class="btn btn-success">
																	Submit
																</button>
																<button type="reset" class="btn btn-secondary">
																	Cancel
																</button>-->
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="col-md-4">
										<div class="m-portlet m-portlet--tab">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear">
															</i>
														</span>
														<h3 class="m-portlet__head-text">
															Evaluation History
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="m-portlet__body" style="padding:0px;">
											<table class="table-bordered table table-sm m-table m--font-bolder">
												<thead>
													<th scope="row">
													   Date
													</th>
													<th scope="row">
														Criteria
													</th>
													<th scope="row">
														Points 
													</th>
												</thead>
										<tbody>
										<?php 
										
											foreach($pe as $row){
												?>
													<tr>
														
														<td> <?php echo date("d M Y ",$row->time); ?></td>
														<td> <?php echo $row->criteria; ?></td>
														<td><?php echo $row->point; ?></td>
													</tr>										
												<?php
												
											}
											
									
										?>
										</tbody>
										</table>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<div class="row">
													<div class="col-12">
														<p class="text-right">
															<small> *Evaluation</small>
														</p>
													</div>
												</div>
											</div>
										</div>

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


		<!--begin::Base Scripts -->
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript">
		</script>
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->

</html>