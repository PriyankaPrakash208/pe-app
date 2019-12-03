<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			HashRoot PE Portal | Employees
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
      
        
        <link href="<?php echo base_url();?>assets/vendor/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
		<link href="<?php echo base_url();?>assets/assets/select2/dist/css/select2.min.css">
		<link href="<?php echo base_url();?>assets/summernote/summernote.css" rel="stylesheet">
        
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/tabulator.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
		.tabulator{height:500px !important;}
		#ajax_data{margin-bottom:20px;}
		.actionbtn{text-decoration: none;    margin: 5px;}
		.actionbtn:hover{text-decoration: none;}
		.actionbtn>i{font-size: 1.6rem;color:#676769;}
		.actionbtn:hover i{color: #000000;}
	</style>
	</head>
		<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed-mobile m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
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
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  " >
												<a href="<?php echo base_url();?>admin/home" class="m-nav__link m-">
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
														Candidates
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<div class="m-content" style="padding: 0px 0;">

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title" style="width: 100%">
										
                                        <!-- <a   class="m-widget24__stats m--font-danger" style="text-decoration: none;">
														<i style="font-size:3.3rem;" class="flaticon-list-2"></i>
													</a> -->
											<a style="float: left;margin-top: 15px;" href="#exam_model" data-toggle="modal" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-user"></i>
													<span>
														Add Candidate
													</span>
												</span>
											</a>										
									</div>
									
								</div>
								
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->

								<!--end: Search Form -->
								<!--begin: Datatable -->
								<!-- <a href="javascript:void(0)" onclick="reset_table()">reset</a> -->
								
								
									
									<div class="m-form__group form-group row">
										<label class="col-2 col-form-label"><b>Show</b></label>
										<div class="col-9">
											<div class="m-checkbox-inline">
												<label class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
													<input type="checkbox" id="unqualified"> Unqualified
													<span></span>
												</label>

												<label class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
													<input type="checkbox" id="not_interested"> Not Interested
													<span></span>
												</label>
											
												<label class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
													<input type="checkbox" id="offer_declined"> Offer Declined
													<span></span>
												</label>
											
												<label class="m-checkbox m-checkbox--solid m-checkbox--state-success">
													<input type="checkbox" id="joined"> Joined
													<span></span>
												</label>

												<label class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
													<input type="checkbox" id="didntappear"> Didn't Appear
													<span></span>
												</label>
											</div>
										</div>
									</div>

									
								
								<div class="m_datatable" id="ajax_data"></div>
								<!--end: Datatable -->
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
											<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
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
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->

		<!-- Modal -->

<!-- Interview  model -->
<div class="modal fade show" id="exam_model" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-xlg" role="document">
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
							<label for="m_datepicker_2" class="form-control-label">Date Of Joining </label>
							<input type="text" name="joining_date" class="form-control" id="m_datepicker_joindate2" placeholder="Select date">
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group m-form__group ">
							<label>Notes:</label>
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


<!-- Edit interview model -->
<div class="modal fade show"  role="dialog" aria-labelledby="exampleModalLabel" id="edit_exam_modal" class="m-scrollable m-scroller ps ps--active-y ps--active-x" data-scrollbar-shown="true" data-scrollable="true" data-height="200" >
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
				<div class="modal-body ">
					<div class="m-scrollable m-scroller ps">
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
								<input class="form-control m-input" id="resume_update" type="file" name="resume">
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
									<b>Notes</b>
									<p  id="comments_updated" class="form-control m-input" ></p>
									<br>
								<label>Comments:</label>
								<div class="row">
									<div class="col-md-10">
										<textarea id="newComment" class="form-control m-input"></textarea>
									</div>
									<div class="col-md-2">
										<button id="btnAddNewComment" type="button" class="btn btn-info btn-block" style="    margin-top: 14px;">
											Add
										</button>
									</div>
								</div>
								<br >
								<div id="allCommentsView">
								</div>
								<br>
								
							</div>
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

		
				
	<!--  JD Skill set updater model  -->
		<?php include_once('chat_widget.php') ?>
		<!--begin::Base Scripts -->
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Resources -->
<!--		<script src="<?php echo base_url();?>assets/vendor/base/data-table.js" type="text/javascript"></script>-->
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>assets/js/tabulator.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<!--end::Page Resources -->
		
		<script type="text/javascript">
$('#btnAddNewComment').click(function(){
	var comment			= $('#newComment').val();
	var candidate_id	= $('#candidate_id_hidden').val();
	if(comment=="" ){
		alert("Cannot commit empty comment!");
		return;
	}
$.ajax({
					dataType:'json',
					url:"<?php echo base_url('cron/add_new_comment');?>",
					type:'post',
					data:{comment,candidate_id},
					success:function(data){	
						if(data.status==true){
							$.notify({
						title: '<strong>Alert!</strong>',
						message:"Comment updated!"
						},{
							type: 'success',
							z_index: 10000,
					});
					$('#newComment').val("");
						$("#allCommentsView").prepend(`						
						<div class="form-control m-input">
										<p><b>`+data.data.comment.replace(/\n/g,"<br>")+`<b></p>
										<b class="text-info">`+data.data.name+` </b> | <small class="text-info">`+data.data.time+`</small>
									</div> <br >`);
									$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/candidates_data");		

					}else{
						$.notify({
						title: '<strong>Alert!</strong>',
						message:"something went wrong!"
						},{
							type: 'danger',
							z_index: 10000,
					});
					}							
					}	    
				});
});
			var block_unqualified = 1;
			var block_declined = 1;
			var block_ntinterested =1;
			var block_joined = 1;
			var block_didntappear = 1;

			var table_data;
 $( function() {


	// 	$(window).on("resize", function(){
	// 	// console.log("redraw")
	// 	$(".tabulator").tabulator("redraw");
	// });

		var printIcon = function(value, data, cell, row, options){ //plain text value
			return "<i class='fa fa-print' style='vertical-align:middle; padding:2px 0;'></i> "
		};

			Tabulator.extendExtension("sort", "sorters", {
				datetime:function(a, b){
					a = moment(a, "DD/MM/YYYY hh:mm");
					b = moment(b, "DD/MM/YYYY hh:mm");
					return a - b;
				},
			});


			Tabulator.extendExtension("format", "formatters", {
				file:function(cell, formatterParams){
					var value = cell.getValue();
					return value ? "<img class='fileicon' src='/images/fileicons/" + value + ".png' style='height:15px; vertical-align:middle;'></img>" : "";
				},

			    //clickable anchor tag
			    link:function(cell, formatterParams){
			    	var value = this.sanitizeHTML(cell.getValue());
			    	return "<a href='" + value + "' style='text-decoration:none; color:#c3262e;' target='blank'>" + this.emptyToSpace(value) + "</a>";
			    },

			    //tick formatted cell
			    buttonTick:function(cell, formatterParams){
			    	return "<i class='fa fa-check' style='color:#3D9322; font-size:1.2em;'></i>";
			    },

			    //cross formatted cell
			    buttonCross:function(cell, formatterParams){
			    	return "<i class='fa fa-times' style='color:#C00; font-size:1.2em;'></i>";
			    },

			    //link lookup list
			    linklookup:function(cell, formatterParams){
			    	var data = cell.getRow().getData();
			    	var value = Links.get(data.link_id, data.link_type).search_title

			    	// cell.data("value", Links.get(data.link_id, data.link_type).search_title);
			    	data.link_title = value;
			    	// row.data("data", data);

			    	return value;
			    },

			    podraft:function(cell, formatterParams){
			    	var value = cell.getValue();

			    	if(value.toString().indexOf("D") === 0){
			    		return "<i class='fa fa-pencil'  style='margin-right:5px; color:#548CFF;'></i>" + value;
			    	}

			    	return value;
			    },

			    anytick:function(cell, formatterParams){
			    	var tick = '<i class="fa fa-check" style="color:#2DC214; font-weight:bold; font-size:1.2em;"></i>';

			    	if(cell.getValue()){
			    		return tick;
			    	}
			    },

			    anytickCross:function(cell, formatterParams){
			    	var tick = '<i class="fa fa-check" style="color:#2DC214; font-weight:bold; font-size:1.2em;"></i>';
			    	var cross = "<i class='fa fa-times' style='color:#C00; font-weight:bold; font-size:1.2em;'></i>";

			    	return cell.getValue() ? tick : cross;
			    },

			    //format icons for po status
			    postatus:function(cell, formatterParams){
			    	var data = cell.getRow().getData();
			    	var queried = data.queried ? "<i class='fa fa-question' style='margin-right:5px; color: #F39316;'></i>" : "";
			    	var confidential = data.confidential ? "<i class='fa fa-user-secret' style='margin-right:5px; color:#382A8D;'></i>" : "";

			    	return queried + confidential + cell.getValue();
			    },

			    postatuscol:function(cell, formatterParams){
			    	var value = cell.getValue();
			    	var col = "#000";

			    	switch(value.toLowerCase()){
			    		case "draft":
			    		col = "#2918A7";
			    		break;

			    		case "submitted":
			    		col = "#DB7700";
			    		break;

			    		case "approved":
			    		col = "#0F8000";
			    		break;

			    		case "logged":
			    		col = "#5C1482";
			    		break;

			    		case "closed":
			    		col = "#000";
			    		break;

			    		case "cancelled":
			    		col = "#000";
			    		break;

			    		case "rejected":
			    		col = "#910E0E";
			    		break;
			    	}

			    	return "<div style='display:inline-block; height:10px; width:10px; margin-left:5px; margin-right:10px; background:" + col + ";'></div>" + value;
			    },
			});

			Tabulator.extendExtension("edit", "editors", {
				date:function(cell, onRendered, success, cancel, editorParams){

					//create and style input
					var input = $("<input type='text'/>");

					input.datepicker({
						changeMonth: true,
						changeYear: true,
						dateFormat: "dd/mm/yy",
					});
					input.css({
						"border":"1px",
						"background":"transparent",
						"padding":"4px",
						"width":"100%",
						"box-sizing":"border-box",
					})
					.val(cell.getValue());


					onRendered(function(){
						input.focus();
					});

					var inputBlur = function(e){
						if(e.target != input[0]){
							if( $(e.target).closest(".ui-datepicker").length == 0){
								$(document).off("mousedown", inputBlur);
								success(input.val());
							}
						}
					}

					$(document).on("mousedown", inputBlur);

					//submit new value on blur
					input.on("change", function(e){
						$(document).off("mousedown", inputBlur);
						success(input.val());
					});

					input.on("click", function(e){e.stopPropagation()});

					//submit new value on enter
					input.on("keydown", function(e){
						if(e.keyCode == 13){
							$(document).off("mousedown", inputBlur);
							success(input.val());
						}
					});

					return input;

				},
				money:function(cell, onRendered, success, cancel, editorParams){
					//create and style input
					var input = $("<input type='text'/>");
					input.css({
						"padding":"4px",
						"width":"100%",
						"box-sizing":"border-box",
						"text-align":"right",
					})
					.val(cell.getValue());

					onRendered(function(){
						input.focus();
					})

					input.inputmask("currency");

					//submit new value on blur
					input.on("blur", function(e){
						success(input.val());
					});

					//submit new value on enter
					input.on("keydown", function(e){
						if(e.keyCode == 13){
							success(input.val());
						}
					});

					return input;
				},
			});


			$.widget("ui.tabulator", $.ui.tabulator, {
				options: {
					addRowPos:"top",

					movableRowHandle:"<div style='margin:0 15%; width:70%; height:2px; background:#777; margin-top:3px;'></div><div style='margin:0 15%; width:70%; height:2px; background:#777; margin-top:3px;'></div><div style='margin:0 15%; width:70%; height:2px; background:#777; margin-top:3px;'></div>", //handle for movable rows

					loader:"<div style='display:inline-block; box-shadow: 0 0 7px 0 rgba(0,0,0,.8); border:4px solid #aaa; border-radius:10px; background:#fff; font-weight:bold; font-size:22px; color:#000; padding:10px 20px;'><div>Loading Data</div><div style='text-align:center;  font-size:2em; margin-top:5px;'><i class='fa fa-spinner fa-pulse' style='color:#d00;'</i></div></div>", //loader element
					loaderError:"<div style='display:inline-block; box-shadow: 0 0 5px 0 rgba(0,0,0,.6); border:4px solid #b00; border-radius:10px; background:#fff; font-weight:bold; font-size:22px; color:#b00; padding:10px 20px;'>Error Loading Data</div>", //loader element
				},
			});

			
			
			//signout
			$("#ajax_data").tabulator({
				height:"50%",
				sortBy:"date",
				sortDir:"desc",
				responsiveLayout:true,
				layout:"fitDataFill",
			  	//pagination:"local",
				  //paginationSize:20,
				 // paginationSizeSelector:[10, 25, 50, 100],
			  	//layout:"fitColumns",
			  	// dataLoaded:function(data){



			  	//    var firstRow = $("#example-table").tabulator("getRows")[0];

			  	//    console.log("rows", firstRow)
			  	//    // setTimeout(function(){
			  	//    if(firstRow){
			  	//        console.log("froxen", firstRow);
			  	//        firstRow.freeze();
			  	//    }
 
			  	//    // }, 2000);

			  	// },
			  	 placeholder:"NO CANDIDATE HERE",
			  	// groupBy:"destination",
			  	 //pagination:"remote", //enable local pagination.
			  	 ajaxURL:"<?php echo base_url();?>Admin/candidates_data",
			  	//data:tabledata,

			  	columns:[
                    
                  {title: "Interview Date", field: "exam_date", width:150, headerFilter:true, headerFilterPlaceholder:"Date", sorter:"alphanum", sortable: true, bottomCalc:"count"},
                  {title: "Name", field: "candidate_name", width:180, headerFilter:true, headerFilterPlaceholder:"Name", sorter:"alphanum", sortable: true, bottomCalc:"count",formatter:function(cell, formatterParams){
			  		
			  		// var notice_period = '<span style="float: right;" class="m-badge m-badge--danger m-badge--wide">NP</span>';
			  		if(cell.getData().priority == 0){
			  			return '<a href="javascript:;" onClick="view_interview_details('+cell.getRow().getData().id+')" <span >'+cell.getRow().getData().candidate_name +'</span></a>';
			  		}else{
			  			return '<a href="javascript:;" onClick="view_interview_details('+cell.getRow().getData().id+')" <span  style="color:red;font-weight:bold;">'+cell.getRow().getData().candidate_name+'</span><a/>';
			  		}

			  	}},
                    
				{title: "Position", field: "position", width:200, headerFilter:true, headerFilterPlaceholder:"Position", sorter:"alphanum", sortable: true, bottomCalc:"count"},
			  	{title: "CTC", field: "current_salary", width:100,headerFilter:true, headerFilterPlaceholder:"CTC", sorter:"alphanum",sortable: true},
                {title: "ETC", field: "expected_salary", width:200,headerFilter:true, headerFilterPlaceholder:"ETC", sorter:"alphanum",sortable: true},
                {title: "Phone", field: "candidate_phone", width:140, headerFilter:true, headerFilterPlaceholder:"Phone", sorter:"num", sortable: true, bottomCalc:"count"},
				{title: "Notice Period", field: "notice_period", width:160, headerFilter:true, headerFilterPlaceholder:"Notice Period", sorter:"alphanum",sortable: true},
				{title: "Status", field: "status", width:180,headerFilter:true,headerFilterPlaceholder:"Status", sorter:"alphanum", sortable: true, formatter:function(cell, formatterParams){
			  		
			  		// var notice_period = '<span style="float: right;" class="m-badge m-badge--danger m-badge--wide">NP</span>';
			  		if(cell.getData().status == "1st interview scheduled"){
						return '<span  style="color:#730000;font-weight:bold;">'+cell.getRow().getData().status+'</span>';
			  		}else if(cell.getData().status == "2nd interview scheduled"){
						return '<span  style="color:#730000;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "unavailable" || cell.getData().status == "not interested" || cell.getData().status == "didn't appear" || cell.getData().status == "unqualified" || cell.getData().status == "declined" ){
						return '<span  style="color:orange;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "offered"){
						return '<span  style="color:green;font-weight:bold;">'+' DOJ : '+cell.getRow().getData().joining_date+'</span>';
			  		}else if(cell.getData().status == "on hold"){
						return '<span  style="color:#000;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "interviewed"){
						return '<span  style="color:#e300e3;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}
					else if(cell.getData().status == "for review"){
						return '<span  style="color:#34bfa3;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "review done"){
						return '<span  style="color:blue;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "selected"){
						return '<span  style="color:#0079ff;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}else if(cell.getData().status == "open"){
						return '<span  style="color:#808080;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}
					  else if(cell.getData().status == "schedule 2nd round"){
						return '<span  style="color:red;font-weight:bold;">'+cell.getRow().getData().status +'</span>';
			  		}
					else{
						return '<span>'+cell.getRow().getData().status +'</span>';
					}

			  	}},
				  
			  	{title: "Actions", field: "PE", width:80, formatter:function(cell, formatterParams){
					return '<a href="javascript:;" onClick="cancel_exam('+cell.getRow().getData().id+')"  class="actionbtn" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
						</div>\
					';

				  }},
				  ],
  
				  
			  	dataLoading:function(data){
			  		table_data = data;
			  	},
			  	rowFormatter: function(row){
			  			// console.log('row deleting')
			  		// console.log('block_resigners: '+block_resigners); 
			  		if((row.getData().status == 'unqualified') && (block_unqualified == 1)){
			  			row.delete();
			  			// return 
					  }
					  
					else if((row.getData().status == 'declined') && (block_declined == 1)){
			  			row.delete();
			  			// return 
					  }
					  
					else if((row.getData().status == 'not interested') && (block_ntinterested == 1)){
						row.delete();
			  			// return 
					  }
					  
					else if((row.getData().status == 'joined') && (block_joined == 1)){
						row.delete();
			  			// return 
					  }
					  
					  else if((row.getData().status == `didn't appear`) && (block_didntappear == 1)){
						row.delete();
			  			// return 
			  		}
			  		
			  	},
			  	columnVisibilityChanged:function(column, visible){
			  	       //column - column component
			  	       //visible - is column visible (true = visible, false = hidden)
			  	      // console.log("vis", column.getField(), visible);
			  	   },
			  });

			

			$("#refresh").click(function(){
				$("#ajax_data").tabulator("toggleColumn", "fullname");
				//var currentDate = $( "#datepicker" ).datepicker( "getDate" );
				//alert($( "#datepicker" ).datepicker( "getDate" ).getDate());
				$("#ajax_data").tabulator("<?php echo base_url();?>Admin/userdata");
			})

  } );

	function timeConverter(UNIX_timestamp){
	  	var a = new Date(UNIX_timestamp * 1000);
	  	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	  	var year = a.getFullYear();
	  	var month = months[a.getMonth()];
	  	var date = a.getDate();
	  	var hour = a.getHours();
	  	var min = a.getMinutes();
	  	var sec = a.getSeconds();
	  	var time = date + ' ' + month + ' ' + year ;
	  	return time;
	}
	
	
	$("#unqualified").on('click', function(){
			
		if($("#unqualified").is(':checked')){
			block_unqualified = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "status", "like", "unqualified");
		}else{
			block_unqualified = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "status", "like", "unqualified");
		}
	});

	$("#not_interested").on('click', function(){
			
		if($("#not_interested").is(':checked')){
			block_ntinterested = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "status", "like", "not interested");
		}else{
			block_ntinterested = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "status", "like", "not interested");
		}
	});

		
	$("#offer_declined").on('click', function(){
		
		if($("#offer_declined").is(':checked')){
			block_declined = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "status", "like", "declined");
		}else{
			block_declined = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "status", "like", "declined");
		}
	});

	$("#joined").on('click', function(){
		
		if($("#joined").is(':checked')){
			block_joined = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "status", "like", "joined");
		}else{
			block_joined = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "status", "like", "joined");
		}
	});

	$("#didntappear").on('click', function(){
		
		if($("#didntappear").is(':checked')){
			block_didntappear = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "status", "like", "didn't appear");
		}else{
			block_didntappear = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "status", "like", "didn't appear");
		}
	});


	

  function manage_user_warning(id){
  	// warning_level

  	$.ajax({
		url:"./view_data/"+id,
		type: "POST",
		dataType:'json',
		success: function(data){
			//console.log(data);
			$("#user_id").val(id);
			$("#warning_level").val(data.warning_level);
  			$("#warningModel").modal('show');
		}
	});
  }

  $('#warning_user_form').ajaxForm({
  	dataType:'json',
		success: function(response, status, xhr, $form) {
			//console.log(response);
			if(response.status == true){
				$.notify({
					title: '<strong>Success!</strong>',
					message:response.message
				},{
					type: 'success',
					z_index: 10000,
				});
				$("#warningModel").modal('toggle');
			}else{
				$.notify({
					title: '<strong>Success!</strong>',
					message:response.message
				},{
					type: 'danger',
					z_index: 10000,
				});
			}
		}
  });

  function edituser(id){

	$.ajax({
		url:"./view_data/"+id,
		type: "POST",
		dataType:'json',
		success: function(data){
			//console.log(data);
			//alert(data.user_id);
			//datatable.load();
			if(data.notice_period == 1){
				$("#notice_period").attr('checked', true);
			}else{
				$("#notice_period").attr('checked', false);
			}

			if(data.no_wfh == 1){
				$("#wfh").attr('checked', true);	
			}else{
				$("#wfh").attr('checked', false);	
			}

			//console.log(data.core);
			if(data.core == 1){
				$("#core_employee").attr('checked', true);
			}else{
				$("#core_employee").attr('checked', false);
			}

			var certificate_str = data.cert_list;
			// var certificate_a = certificate_str.split(", ");

			$('#fullname').val(data.fullname);
			$('#user_id').val(data.user_id);
			$('#empid').val(data.emp_id);
			$('#email').val(data.email);
			$('#phone').val(data.phone);
			$('#dob').val(data.dob);
			$('#date_of_join').val(data.date_of_join);
			$("#dept").val(data.dep_id); 
			$("#team").val(data.team_id);
			$("#designation").val(data.desgn_id);
			$("#cert_list").val(data.cert_list);
			/*$(certificate_a).each(function(){
				console.log(this);
				$("#cert_opt_"+this).attr('selected', 'true');
			});*/
		
			$('input[name=gender][value='+data.gender+']').attr('checked', true); 
			$('#myModalLabel').html('Update Details');
			$("#updateModel").modal('show');
				}
			});
}
function addNew(){
	$('#user_id').val('');
	$('#fullname').val('');
	$('#empid').val('');
	$('#user_id').val();
	$('#email').val('');
	$('#phone').val('');
	$('#dob').val('');
	$('#date_of_join').val('');
	$("#dept").val('');
	$("#team").val('');	
	$("#designation").val('');
	$('#myModalLabel').html('Add new Employee');
	$("#updateModel").modal('show');
}
function deleteuser(id){
	if (confirm('Are you sure you want to delete this user?'))	{
		$.ajax({
				url:"./delete_emp/"+id,
				type: "POST",
				success: function(data){
					alert("deleted ");
					$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userdata");
					//datatable.load();
				}
			});
	}
}
	$('#updateuser').ajaxForm({
		dataType:'json',
		success: function(response, status, xhr, $form) {
			if(response.status==1){	
			$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userdata");							
		$.notify({
				title: '<strong>Success!</strong>',
				message:response.msg
			},{
				type: 'success',
				z_index: 10000,
			});
			}
			else if(response.status==2){	
			$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userdata");			
						$.notify({
				title: '<strong>Success!</strong>',
				message:response.msg
			},{
				type: 'success',
				z_index: 10000,
			});	
		}
		if(response.status==0){
			$.notify({
				title: '<strong>Error!</strong>',
				message:response.msg
			},{
				type: 'danger',
				z_index: 10000,
			});
		}
		}

    }); 
    
    function cancel_exam(id){
	var result = confirm("Are you sure? You want to delete this interview?");
	if(result == true){
		$.ajax({
			type: 'POST',
			data: {interview_id:id},
			dataType:'json',
			url:'./cancel_interview',
			success:function(result){
				//console.log(result);
				if(result.status == true){
                    $("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/candidates_data");	
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'success',
						z_index: 10000,
					});
				}
				else{
					$.notify({
						title: '<strong>Sorry!</strong>',
						message:result.message
					},{
						type: 'danger',
						z_index: 10000,
					});
				}
				$('#edit_exam_modal').modal('hide');
				$('#exam_list_model').modal('show');
				search_interview(0);
			}
		});
	}
}


// add interview ajax-form
$('#exam_form').ajaxForm({
	dataType:'json', 
		success: function(response, status, xhr, $form){
			//console.log(response);
			if(response.status == true){
                $("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/candidates_data");
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

/** exam form/ interview form update */
$('#update_interview').ajaxForm({
	dataType:'json', 
		success: function(response, status, xhr, $form){
			//console.log(response);
			if(response.status == true){
                $("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/candidates_data");
				$("#edit_exam_modal").modal('toggle');
				$.notify({
					title: '<strong>Success!</strong>',
					message:response.message
				},{
					type: 'success',
					z_index: 10000,
				});
				
			}else{
				$.notify({
					title: '<strong>Failed!</strong>',
					message:response.message
				},{
					type: 'danger',
					z_index: 10000,
				});
			}

			$('#exam_list_model').modal('show');
			search_interview(0);
		}
});

		
	
	
	
			</script>
	</body>
    <!-- end::Body -->
    
    <script src="<?php echo base_url();?>assets/js/dropdown.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
    
    <!-- <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('.select2').select2();
    </script>
	
	</html>