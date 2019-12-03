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
		<style type="text/css">
			.hide{
				display: none !important;
			}
		</style>
		<!--end::Web font -->
		<!--begin::Base Styles -->

		<link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
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
											<img width="170px" alt="" src="<?php echo base_url();?>assets/media/logos/logo-2.png"/>
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
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  ">
												<a href="<?php echo base_url();?>admin/home" class="m-nav__link ">
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
												<a href="<?php echo base_url();?>admin/logout" class="m-nav__link ">
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content" style="padding-top: 0;">


						<div class="modal fade show" id="add_comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog " role="document">
								<div class="modal-content">
								
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add Comment
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
												Comment:
											</label>
											<textarea class="form-control" id="new-comment" rows="5"></textarea>
										</div>
										
										<input type="hidden" name="field_name" id="field_name" value="">
										<input type="hidden" name="field_performance_id" id="field_performance_id" value="">
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button onclick="save_comment()" type="button" class="btn btn-primary">
											Add comment
										</button>
									</div>
									
								</div>
							</div>
						</div>

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

								<span class="btn btn-secondary">
											<span class="m--font-boldest" style="font-size: 14px" title="Click to reset Mandatory Hours"> <i class="fa fa-clock-o text-danger"  aria-hidden="true"></i> : <span style="text-decoration: underline;" data-id="<?php echo $weekly_status->wrk_id; ?>" id="mandatory_hrs"><?php echo $weekly_status->pending_hrs; ?></span></span>
										</span>
									
								<span class="btn btn-secondary p-0">
								<select style="width: 120px;" class="form-control" id="adjustable" data-id="<?php echo $weekly_status->wrk_id; ?>" >
									<option > Reset Hours</option>
									<option value="60"> - 1 min</option>
									<option value="300"> - 5 min</option>
									<option value="600"> - 10 min</option>
									<option value="1800"> - 30 min</option>
									<option value="3600"> - 1 Hour</option>
									<option value="29700"> - 1 day</option>
									<option value="59400"> - 2 day</option>
									<option value="89100"> - 3 day</option>
									<option value="118800"> - 4 day</option>
									<option value="148500"> - 5 day</option>
								</select>										
							</span>
									<span class="btn btn-secondary ">
											<span   class="m--font-boldest" style="font-size: 14px"> Overtime  : <span id="overtime_hrs"><?php echo $weekly_status->overtime; ?></span></span>
										</span>
										<span class="btn btn-secondary">
											<span  class="m--font-boldest" style="font-size: 14px"> EH  : <span id="extra_hrs"><?php echo $weekly_status->extra_hrs; ?></span></span>
										</span>
										<button title="Click to reset EH" data-id="<?php echo $weekly_status->wrk_id; ?>" class="btn btn-outline-danger " id="overtime_reset">Reset</button>
									<span class="btn btn-secondary">
											<span class="m--font-boldest" style="font-size: 14px"> Total Score : <?php echo $PE+$CE; ?></span>
										</span>
									<span class="btn btn-secondary">
											<span class="m--font-boldest" style="font-size: 14px"> Employee : <?php echo $fullname; ?></span>
										</span>
									
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="row">
								
								<div class="col-md-12">
								<!--begin::Portlet-->
								<div class="m-portlet">
<!--
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Adjusted Pills
												</h3>
											</div>
										</div>
									</div>
									-->
									<div class="m-portlet__body">
										<ul class="nav nav-pills nav-fill" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1" style="border: 1px solid #ccc;">
													Evaluation Categories
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_5_2" style="border: 1px solid #ccc;">
													Evaluation History
												</a>
											</li>
											
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
												<div class="m-portlet m-portlet--tab">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear">
															</i>
														</span>
														<h3 class="m-portlet__head-text" style="text-align: center">
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
																<div class="m-alert m-alert--icon alert alert-info" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-graph"></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Performance Evaluation</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>

												
												<!-- Trial Period Performance -->
												<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-5 col-form-label text-left">
						<!-- Public  Reviews  -->
						<!-- <a href="#preview_detail_modal" class="m-widget24__change" data-toggle="modal" data-target="#preview_detail_modal">Public  Reviews</a> -->
						<a href="javascript:void(0)" onclick="open_evaluation_detail('Trial Period Performance',<?php echo $performance_id; ?>)">Trial Period Performance</a>

					</label>
					<div class="col-7" style="padding: 0;"> 
					<div class="input-group">
						<span class="input-group-btn">
					<button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="trialpperf" data-value="10"><span class="fa fa-minus"></span></button>
					</span>
					<input type="text" name="trialpperf"  onkeyup="activate_button('trialpperf', <?php echo  $trialpperf; ?>)" id="trialpperf"  class="form-control input-number col-2" data-old-value="<?php echo  $trialpperf; ?>" value="<?php echo  $trialpperf; ?>" >
					<span class="input-group-btn">
					<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="trialpperf" data-value="10"><span class="fa fa-plus"></span></button>
					</span>
					&nbsp;&nbsp;
					<button id="trialpperf_comment_btn" type="button" onclick="open_comment_modal('trialpperf', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>
					<textarea rows="1" id="trialpperf_comment" name="trialpperf_comment" class="form-control" style="display: none;"></textarea>
					&nbsp;&nbsp;
					<a style="display: none;" href="javascript:;" id="trialpperf_<?php echo $performance_id; ?>" onclick="updatepoint('trialpperf',<?php echo $performance_id; ?>,<?php echo  $trialpperf; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																			</div>
						
																			</div>

																			</div>
					<!-- Service Cancellation -->
															<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-5 col-form-label text-left">
						<!-- Public  Reviews  -->
						<!-- <a href="#preview_detail_modal" class="m-widget24__change" data-toggle="modal" data-target="#preview_detail_modal">Public  Reviews</a> -->
						<a href="javascript:void(0)" onclick="open_evaluation_detail('Service Cancellation',<?php echo $performance_id; ?>)">Service Cancellation</a>

					</label>
					<div class="col-7" style="padding: 0;"> 
					<div class="input-group">
						<span class="input-group-btn">
					<button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="servicecancellation" data-value="30"><span class="fa fa-minus"></span></button>
					</span>
					<input type="text" name="servicecancellation"  onkeyup="activate_button('servicecancellation', <?php echo  $servicecancellation; ?>)" id="servicecancellation"  class="form-control input-number col-2" data-old-value="<?php echo  $servicecancellation; ?>" value="<?php echo  $servicecancellation; ?>" >
					<span class="input-group-btn">
					<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="servicecancellation" data-value="0"><span class="fa fa-plus"></span></button>
					</span>
					&nbsp;&nbsp;
					<button id="servicecancellation_comment_btn" type="button" onclick="open_comment_modal('servicecancellation', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>
					<textarea rows="1" id="servicecancellation_comment" name="servicecancellation_comment" class="form-control" style="display: none;"></textarea>
					&nbsp;&nbsp;
					<a style="display: none;" href="javascript:;" id="servicecancellation_<?php echo $performance_id; ?>" onclick="updatepoint('servicecancellation',<?php echo $performance_id; ?>,<?php echo  $servicecancellation; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																			</div>
																			</div>
				</div>


												
				

												<!-- Public reviews -->


				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-5 col-form-label text-left">
						<!-- Public  Reviews  -->
						<!-- <a href="#preview_detail_modal" class="m-widget24__change" data-toggle="modal" data-target="#preview_detail_modal">Public  Reviews</a> -->
						<a href="javascript:void(0)" onclick="open_evaluation_detail('Public review',<?php echo $performance_id; ?>)">Public Review</a>

					</label>
					<div class="col-7" style="padding: 0;"> 
					<div class="input-group">
						<span class="input-group-btn">
					<button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="preview" data-value="20"><span class="fa fa-minus"></span></button>
					</span>
					<input type="text" name="preview"  onkeyup="activate_button('preview', <?php echo  $preview; ?>)" id="preview"  class="form-control input-number col-2" data-old-value="<?php echo  $preview; ?>" value="<?php echo  $preview; ?>" >
					<span class="input-group-btn">
					<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="preview" data-value="20"><span class="fa fa-plus"></span></button>
					</span>
					&nbsp;&nbsp;

					<button id="preview_comment_btn" type="button" onclick="open_comment_modal('preview', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

					<textarea rows="1" id="preview_comment" name="preview_comment" class="form-control" style="display: none;"></textarea>
					&nbsp;&nbsp;
					<a style="display: none;" href="javascript:;" id="preview_<?php echo $performance_id; ?>" onclick="updatepoint('preview',<?php echo $performance_id; ?>,<?php echo  $preview; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																			</div>
																			</div>
				</div>


													<!--client reviews -->

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-5 col-form-label text-left">
						<!-- <a href="#creview_detail_modal" class="m-widget24__change" data-toggle="modal" data-target="#creview_detail_modal">Client Reviews</a> -->
						<a href="javascript:void(0)" onclick="open_evaluation_detail('Client Review',<?php echo $performance_id; ?>)">Client Reviews</a>
					</label>
					<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="creview" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="creview" onfocus="blur()" id="creview"  class="form-control input-number col-2" value="<?php echo  $creview; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="creview" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="creview_comment_btn" type="button" onclick="open_comment_modal('creview', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="creview_comment" name="creview_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="creview_<?php echo $performance_id; ?>" onclick="updatepoint('creview',<?php echo $performance_id; ?>,<?php echo  $creview; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
										<!--  section ends -->	
															
										<!--  work quality-->					
								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-5 col-form-label text-left">
										
										<a href="javascript:void(0)" onclick="open_evaluation_detail('Work Quality',<?php echo $performance_id; ?>)">Work Quality</a>
									</label>
									<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="tquality" data-value="5"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="tquality" onfocus="blur()"  id="tquality"  class="form-control input-number col-2" value="<?php echo  $tquality; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="tquality" data-value="5"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <button id="tquality_comment_btn" type="button" onclick="open_comment_modal('tquality', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="tquality_comment" name="tquality_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="tquality_<?php echo $performance_id; ?>" onclick="updatepoint('tquality',<?php echo $performance_id; ?>,<?php echo  $tquality; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
								</div>
										<!--  section ends -->	
										
															
										<!--  communication-->					
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	 
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Communication',<?php echo $performance_id; ?>)">Communication</a>
																</label>
										<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="cquality" data-value="3"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="cquality" onfocus="blur()"  id="cquality"  class="form-control input-number col-2" value="<?php echo  $cquality; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="cquality" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <button id="cquality_comment_btn" type="button" onclick="open_comment_modal('cquality', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="cquality_comment" name="cquality_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="cquality_<?php echo $performance_id; ?>" onclick="updatepoint('cquality',<?php echo $performance_id; ?>,<?php echo  $cquality; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															
										<!--  section  ends-->		
														
																
															
															
										<!--  section  starts-->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																 
																<a href="javascript:void(0)" onclick="open_evaluation_detail('Policy Violation',<?php echo $performance_id; ?>)">Client Policy Violation</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="pviolation" data-value="5"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="pviolation" onfocus="blur()" id="pviolation"  class="form-control input-number col-2" value="<?php echo  $pviolation; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="pviolation" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="pviolation_comment_btn" type="button" onclick="open_comment_modal('pviolation', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="pviolation_comment" name="pviolation_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="pviolation_<?php echo $performance_id; ?>" onclick="updatepoint('pviolation',<?php echo $performance_id; ?>,<?php echo  $pviolation; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															
															
										<!--  section  ends-->
														
										<!-- company policy violation section  starts-->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																 
																<a href="javascript:void(0)" onclick="open_evaluation_detail('Company Policy Violation',<?php echo $performance_id; ?>)">Company Policy Violation</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="cypviolation" data-value="5"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="cypviolation" onfocus="blur()" id="cypviolation"  class="form-control input-number col-2" value="<?php echo  $cypviolation; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="cypviolation" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="cypviolation_comment_btn" type="button" onclick="open_comment_modal('cypviolation', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="cypviolation_comment" name="cypviolation_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="cypviolation_<?php echo $performance_id; ?>" onclick="updatepoint('cypviolation',<?php echo $performance_id; ?>,<?php echo  $cypviolation; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
															
															
										<!--  section  ends-->
															
															
										<!--  SLA Violation  starts-->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	 
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('SLA Violation',<?php echo $performance_id; ?>)">SLA Violation</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="slaviolation" data-value="2"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="slaviolation" onfocus="blur()" id="slaviolation"  class="form-control input-number col-2" value="<?php echo  $slaviolation; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="slaviolation" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="slaviolation_comment_btn" type="button" onclick="open_comment_modal('slaviolation', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="slaviolation_comment" name="slaviolation_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="slaviolation_<?php echo $performance_id; ?>" onclick="updatepoint('slaviolation',<?php echo $performance_id; ?>,<?php echo  $slaviolation; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
										<!--  section  ends-->	
										
														
										<!--  Work Reports  starts-->
										<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	 
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Work Reports',<?php echo $performance_id; ?>)">Work Reports</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="wreport" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="wreport" onfocus="blur()" id="wreport"  class="form-control input-number col-2" value="<?php echo  $wreport; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="wreport" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="wreport_comment_btn" type="button" onclick="open_comment_modal('wreport', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="wreport_comment" name="wreport_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="wreport_<?php echo $performance_id; ?>" onclick="updatepoint('wreport',<?php echo $performance_id; ?>,<?php echo  $wreport; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
											<!--  section  ends-->
											
<!--
		<div class="form-group m-form__group row">
			<label for="example-text-input" class="col-5 col-form-label text-left">
				Skype Activities
			</label>
			<div class="col-5" style="padding: 0;">

			<div class="input-group">
					<span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="skypeactivity" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="skypeactivity" onfocus="blur()" id="skypeactivity"  class="form-control input-number" value="<?php //echo  $skypeactivity; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="skypeactivity" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="skypeactivity_<?php// echo $performance_id; ?>" onclick="updatepoint('skypeactivity',<?php //echo $performance_id; ?>,<?php //echo  $skypeactivity; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
	</div>
-->


<!--	challenge of the day-->

<div class="form-group m-form__group row">
			<label for="example-text-input" class="col-5 col-form-label text-left">
				
				<a href="javascript:void(0)" onclick="open_evaluation_detail('Challenge Of The Day',<?php echo $performance_id; ?>)">Challenge Of The Day</a>
			</label>
			<div class="col-7" style="padding: 0;">

			<div class="input-group">
					<span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="ChallengeOfTheDay" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="ChallengeOfTheDay" onfocus="blur()" id="ChallengeOfTheDay"  class="form-control input-number col-2" value="<?php echo  $ChallengeOfTheDay; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="ChallengeOfTheDay" data-value="5"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="ChallengeOfTheDay_comment_btn" type="button" onclick="open_comment_modal('ChallengeOfTheDay', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="ChallengeOfTheDay_comment" name="ChallengeOfTheDay_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="ChallengeOfTheDay_<?php echo $performance_id; ?>" onclick="updatepoint('ChallengeOfTheDay',<?php echo $performance_id; ?>,<?php echo  $ChallengeOfTheDay; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
	</div>


<!--	Warning starts-->
				
														
														
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-5 col-form-label text-left">
																
																<a href="javascript:void(0)" onclick="open_evaluation_detail('Warning',<?php echo $performance_id; ?>)">Warnings</a>
															</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="warning" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="warning" onfocus="blur()" id="warning"  class="form-control input-number col-2" value="<?php echo  $warning; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="warning" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="warning_comment_btn" type="button" onclick="open_comment_modal('warning', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="warning_comment" name="warning_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="warning_<?php echo $performance_id; ?>" onclick="updatepoint('warning',<?php echo $performance_id; ?>,<?php echo  $warning; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														</div>

														<!--	Suspension starts-->
														<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Suspension ',<?php echo $performance_id; ?>)">Suspensions</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="suspension" data-value="20"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="suspension" onfocus="blur()"  id="suspension"  class="form-control input-number col-2" value="<?php echo  $suspension; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="suspension" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="suspension_comment_btn" type="button" onclick="open_comment_modal('suspension', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="suspension_comment" name="suspension_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="suspension_<?php echo $performance_id; ?>" onclick="updatepoint('suspension',<?php echo $performance_id; ?>,<?php echo  $suspension; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														</div>

													
													<!--	Award starts-->	
														
			<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Awards & Achievements',<?php echo $performance_id; ?>)">Awards</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="awards" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="awards" onfocus="blur()" id="awards"  class="form-control input-number col-2" value="<?php echo  $awards; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="awards" data-value="20"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="awards_comment_btn" type="button" onclick="open_comment_modal('awards', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="awards_comment" name="awards_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="awards_<?php echo $performance_id; ?>" onclick="updatepoint('awards',<?php echo $performance_id; ?>,<?php echo  $awards; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>


				
																												
														</div>

														
														<div class="col-md-6">
														
															
															
																<div class="form-group m-form__group m--margin-top-10">
																<div class="m-alert m-alert--icon alert alert-info" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-interface-6 "></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Integrity Evaluation</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>



	<!--  Golden Response  starts-->
	<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-5 col-form-label text-left">
										
										<a href="javascript:void(0)" onclick="open_evaluation_detail('Golden Responses',<?php echo $performance_id; ?>)">Golden Responses</a>
									</label>
										<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="goldenresponse" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="goldenresponse" onfocus="blur()" id="goldenresponse"  class="form-control input-number col-2" value="<?php echo $goldenresponse; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="goldenresponse" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="goldenresponse_comment_btn" type="button" onclick="open_comment_modal('goldenresponse', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="goldenresponse_comment" name="goldenresponse_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="goldenresponse_<?php echo $performance_id; ?>" onclick="updatepoint('goldenresponse',<?php echo $performance_id; ?>,<?php echo $goldenresponse; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
								</div>
										<!--  section  ends-->			
															
															
										<!--  Thanks Replies  starts-->
								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-5 col-form-label text-left">
										
										<a href="javascript:void(0)" onclick="open_evaluation_detail('Thanks Replies',<?php echo $performance_id; ?>)">Thanks Replies</a>
									</label>
										<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="treplies" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="treplies" onfocus="blur()" id="treplies"  class="form-control input-number col-2" value="<?php echo  $treplies; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="treplies" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="treplies_comment_btn" type="button" onclick="open_comment_modal('treplies', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="treplies_comment" name="treplies_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="treplies_<?php echo $performance_id; ?>" onclick="updatepoint('treplies',<?php echo $performance_id; ?>,<?php echo  $treplies; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
								</div>
										<!--  section  ends-->


													<!-- Blog Article -->
													<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Blog Posts',<?php echo $performance_id; ?>)">Blog Posts</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="blogpost" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="blogpost" onfocus="blur()" id="blogpost"  class="form-control input-number col-2" value="<?php echo  $blogpost; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="blogpost" data-value="0"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="blogpost_comment_btn" type="button" onclick="open_comment_modal('blogpost', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="blogpost_comment" name="blogpost_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="blogpost_<?php echo $performance_id; ?>" onclick="updatepoint('blogpost',<?php echo $performance_id; ?>,<?php echo  $blogpost; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>


<!--		Interviews			-->


<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Interviews',<?php echo $performance_id; ?>)">Interviews</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="interviews" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="interviews" onfocus="blur()" id="interviews"  class="form-control input-number col-2" value="<?php echo  $interviews; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="interviews" data-value="3"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="interviews_comment_btn" type="button" onclick="open_comment_modal('interviews', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="interviews_comment" name="interviews_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="interviews_<?php echo $performance_id; ?>" onclick="updatepoint('interviews',<?php echo $performance_id; ?>,<?php echo $interviews; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
<!--		Interviews			-->


													<!-- Training -->
															
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Training',<?php echo $performance_id; ?>)">Training</a>
																</label>
																	<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="training" data-value="10"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="training" onfocus="blur()" id="training"  class="form-control input-number col-2" value="<?php echo  $training; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="training" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="training_comment_btn" type="button" onclick="open_comment_modal('training', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="training_comment" name="training_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="training_<?php echo $performance_id; ?>" onclick="updatepoint('training',<?php echo $performance_id; ?>,<?php echo  $training; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
														
															</div>




													<!--		Certifications			-->


								<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Certifications',<?php echo $performance_id; ?>)">Certifications</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="certifications" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="certifications" onfocus="blur()" id="certifications"  class="form-control input-number col-2" value="<?php echo  $certifications; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="certifications" data-value="10"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="certifications_comment_btn" type="button" onclick="open_comment_modal('certifications', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

   <!--  <a href="javascript:;" onclick="open_comment_modal('certifications', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only"><span><i class="fa fa-comment"></i>	</span></a> -->
    <textarea id="certifications_comment" name="certifications_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="certifications_<?php echo $performance_id; ?>" onclick="updatepoint('certifications',<?php echo $performance_id; ?>,<?php echo $certifications; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>
<!--		Certifications			-->	

						<!-- Seminars -->
																					
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-5 col-form-label text-left">
							
							<a href="javascript:void(0)" onclick="open_evaluation_detail('Seminars',<?php echo $performance_id; ?>)">Seminars</a>
						</label>
							<div class="col-7" style="padding: 0;">
						
					<div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="seminars" data-value="5"><span class="fa fa-minus"></span></button>
							</span>
							<input type="text" name="seminars" onfocus="blur()" id="seminars"  class="form-control input-number col-2" value="<?php echo  $seminars; ?>" >
							<span class="input-group-btn">
								<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="seminars" data-value="5"><span class="fa fa-plus"></span></button>
							</span>
							&nbsp;&nbsp;

							<button id="seminars_comment_btn" type="button" onclick="open_comment_modal('seminars', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

							<textarea id="seminars_comment" name="seminars_comment" rows="1" class="form-control" style="display: none;"></textarea>
							&nbsp;&nbsp;
							<a style="display: none;" href="javascript:;" id="seminars_<?php echo $performance_id; ?>" onclick="updatepoint('seminars',<?php echo $performance_id; ?>,<?php echo  $seminars; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																						</div>
																</div>
														
															</div>





		<div class="form-group m-form__group m--margin-top-10">
										<div class="m-alert m-alert--icon alert alert-info" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-profile"></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Cultural Evaluation</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>



															<!-- code of conduct -->

															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Code of conduct',<?php echo $performance_id; ?>)">Code of conduct</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="codeof" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="codeof" onfocus="blur()" id="codeof"  class="form-control input-number col-2" value="<?php echo  $codeof; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="codeof" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="codeof_comment_btn" type="button" onclick="open_comment_modal('codeof', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    
    <textarea id="codeof_comment" name="codeof_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="codeof_<?php echo $performance_id; ?>" onclick="updatepoint('codeof',<?php echo $performance_id; ?>,<?php echo  $codeof; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>

															<!-- social media engagements -->
															<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Social Media Engagements',<?php echo $performance_id; ?>)">Social Media Engagements</a>
																</label>
															<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="ssmedia" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="ssmedia" onfocus="blur()" id="ssmedia"  class="form-control input-number col-2" value="<?php echo  $ssmedia; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="ssmedia" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="ssmedia_comment_btn" type="button" onclick="open_comment_modal('ssmedia', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

     
    <textarea id="ssmedia_comment" name="ssmedia_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="ssmedia_<?php echo $performance_id; ?>" onclick="updatepoint('ssmedia',<?php echo $performance_id; ?>,<?php echo  $ssmedia; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>


										
										<!--		Extra curricular activities			-->


										<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	
																	<a href="javascript:void(0)" onclick="open_evaluation_detail('Extracurricular Activitiess',<?php echo $performance_id; ?>)">Extra Curricular Activities</a>
																</label>
																<div class="col-7" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="extracurricular" data-value="0"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="extracurricular" onfocus="blur()" id="extracurricular"  class="form-control input-number col-2" value="<?php echo  $extracurricular; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="extracurricular" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;

    <button id="extracurricular_comment_btn" type="button" onclick="open_comment_modal('extracurricular', <?php echo $performance_id; ?>);" class="btn btn-info m-btn m-btn--icon-only hide"><span><i class="fa fa-comment"></i>	</span></button>

    <textarea id="extracurricular_comment" name="extracurricular_comment" rows="1" class="form-control" style="display: none;"></textarea>
    &nbsp;&nbsp;
    <a style="display: none;" href="javascript:;" id="extracurricular_<?php echo $performance_id; ?>" onclick="updatepoint('extracurricular',<?php echo $performance_id; ?>,<?php echo $extracurricular; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>




															<div class="form-group m-form__group m--margin-top-10">
																<div class="m-alert m-alert--icon alert alert-info" role="alert">
											<div class="m-alert__icon">
												<i class="flaticon-danger"></i>
											</div>
											<div class="m-alert__text">
												<strong><h5>Warning Level</h5>
													
												</strong>
												
											</div>
											
										</div>

															</div>

				<div class="form-group m-form__group row">
					
						<label for="example-text-input" class="col-5 col-form-label text-left">
																		
							<a href="javascript:void(0)">Warning Level</a>
						</label>
						<div class="col-7" style="padding: 0;">
							<div class="col-10">											
								<div class="input-group">
									<select class="form-control" id="warning_level" name="warning_level">
										<?php 
											
											switch ($warning_level) {
												case '1':
													echo '<option value="0">Warning Level Zero</option>';
													echo '<option value="1" selected="true">Warning Level One</option>';
													echo '<option value="2">Final Warning</option>';
													break;

												case '2':
													echo '<option value="0">Warning Level Zero</option>';
													echo '<option value="1">Warning Level One</option>';
													echo '<option value="2" selected="true">Final Warning</option>';
													break;
												
												case '0':
												default:
													echo '<option value="0" selected="true">Warning Level Zero</option>';
													echo '<option value="1">Warning Level One</option>';
													echo '<option value="2">Final Warning</option>';
													break;
											}
										?>
										
										
										
									</select>
									&nbsp;&nbsp;
									<button user_id="<?php echo $user_id; ?>" type="button" class="btn btn-info m-btn m-btn--icon-only" id="warning_level_updater"><span><i class="fa fa-floppy-o"></i>	</span></button>
									<!-- <a href="javascript:;" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a> -->
								</div>
							</div>
							
						</div>
					
				</div>
				
<!--		Extra curricular activities			-->
															
	
															
															<!--<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Facebook Engagements
																</label>
																<div class="col-5" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="fb" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="fb" onfocus="blur()" id="fb"  class="form-control input-number" value="<?php echo  $fb; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="fb" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="fb_<?php echo $performance_id; ?>" onclick="updatepoint('fb',<?php echo $performance_id; ?>,<?php echo  $fb; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>-->
														<!--	<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Twitter Engagements 
																</label>
															<div class="col-5" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="twitter" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="twitter" onfocus="blur()" id="twitter"  class="form-control input-number" value="<?php echo  $twitter; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="twitter" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="twitter_<?php echo $performance_id; ?>" onclick="updatepoint('twitter',<?php echo $performance_id; ?>,<?php echo  $twitter; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>-->
														<!--	<div class="form-group m-form__group row">
																<label for="example-text-input" class="col-5 col-form-label text-left">
																	Instagram Engagements
																</label>
													<div class="col-5" style="padding: 0;">
																
															<div class="input-group">
																    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="insta" data-value="1"><span class="fa fa-minus"></span></button>
    </span>
    <input type="text" name="insta" onfocus="blur()" id="insta"  class="form-control input-number" value="<?php echo  $insta; ?>" >
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="insta" data-value="1"><span class="fa fa-plus"></span></button>
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="insta_<?php echo $performance_id; ?>" onclick="updatepoint('insta',<?php echo $performance_id; ?>,<?php echo  $insta; ?>);" class="btn btn-info m-btn m-btn--icon-only">	<span><i class="fa fa-floppy-o"></i>	</span></a>
																</div>
																</div>
															</div>-->
															<!--<div class="form-group m-form__group">
																<label for="exampleTextarea">
																	Comments
																</label>
																<textarea class="form-control m-input"  rows="4"  name="comments"  id="comments"></textarea>
															</div>-->
														</div>
														
														<!--			comment section											-->
												<div id="comment_reason" class="col-md-12"> 
													<br/><br/>
													
												<form id="add_comm" action="" method="post">
												
									<div class="modal-body" style="padding-left: 0; padding-right: 0;padding-top: 0;">

										<div class="m-portlet__body" style="padding-left: 0;padding-right: 0;padding-top: 0;">
											<div class="form-group ">
											<div class="row">
											<div class="col-md-12">
									
											<!-- <div class="form-group m-form__group "  id="">
													<div id="add_cmnts" >

														<h5 class="m-portlet__head-text" >
															Comments
														</h5>

														<textarea placeholder="Enter your comments here. " rows="6" style="border-color: #6867dd;"  class="form-control m-input" name="comments" id="comments"></textarea>											
													</div>
											</div>
											 -->

											
								
									<!-- <div class="form-group m-form__group text-right">
										<a href="../ViewAllComments/<?php echo $user_id; ?>"><button style="float:left;" id="view_all_rpt" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air">View Comments</button></a>
										<button id="add_comnt_button" type="button" class="btn btn-brand m-btn m-btn--icon m-btn--pill m-btn--air"  onclick="add_comments(<?php echo $user_id; ?>)">Save </button>
									</div>
									<div id="new_acct"></div>
									</div>
									<div class="col-md-12">
										<div id="comment_lists" style="max-height: 250px;overflow: auto;padding:20px;">
												
										</div>-->
									</div> 
									</div>
									</div>
							
								</div>
							</div>
						</form>
													
												</div>	
														
<!--		    close comment section-->
														
														
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
											<div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
												<div class="m-portlet m-portlet--tab">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear">
															</i>
														</span>
														<h3 class="m-portlet__head-text" style="text-align: center">
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
														Comments
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
														<td> <?php echo $row->comments; ?></td>
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
								<!--end::Portlet-->
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
		<script>
		$(document).ready(function(){
				$("#mandatory_hrs").on("click",function(){
					if (confirm("Do you want to reset mandatory hours?")) {
					var thisObject	=	$(this);
					var work_id  =  $(this).attr("data-id");
					$.ajax({
						url:"<?php echo base_url();?>admin/resetMandatory",
						type:"POST",
						data:{work_id},
						dataType:"json",
						success:function(resp){
							if(resp.status){
								thisObject.text(resp.new);
								alert("Succesfuly updated.");
							}
						}
						});
					}
			});

			$("#adjustable").on('change',function(){
				if (confirm("Do you want to Update mandatory hours?")) {
				let thisObj		=	$(this);
				let work_id  = thisObj.attr("data-id");
				let seconds		=	thisObj.val();
				$.ajax({
						url:"<?php echo base_url();?>admin/updateMandatory",
						type:"POST",
						data:{work_id,seconds},
						dataType:"json",
						success:function(resp){
							if(resp.status){
								$("#mandatory_hrs").text(resp.new);
								
								alert("Succesfuly updated.");
							}
						}
						});
					}
			});

			});
			
			
		</script>
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->

</html>