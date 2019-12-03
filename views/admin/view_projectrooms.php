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
		<link href="<?php echo base_url();?>assets/assets/select2/dist/css/select2.min.css">
		
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
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">

						<div class="m-content">
							<!--begin:: Widgets/Stats-->
							<div class="m-portlet">
								<div class="row" >
									
								
						<!--	new div -->
						<div id="new-div-admin"  class="col-xl-12">


										<div class="m-section">
											
											<div class="m-section__content">
												
<!--							month picker-->
						<div>
					       <table class='table table-striped m-table'>
							   <tr>
								<th>Project Name</th>
								<th>Project Descriptions</th>
								<th>Created By</th>
								<th>Users</th>
								<th>Actions</th>
							  </tr>
							   <?php 
								
				foreach($res as $proj_details){
					echo "<tr><td>".$proj_details['pr_name']."</td>
							<td>".$proj_details['pr_description']."</td>
							<td>".$proj_details['pr_createdby']."</td><td>";
							
						$unserial = unserialize($proj_details['pr_userids']);
					    foreach($unserial as $users){
							echo $users['name'].", ";				
						}
					
//					echo "</td><td><a onclick ='get_project_det(".$proj_details['pr_id'].")' href='#projectroom_edit' data-toggle='modal'><i class='la la-edit'></i></a>";
					echo "</td><td><a onclick ='get_project_det(".$proj_details['pr_id'].")' href='#projectroom_edit' data-toggle='modal'><i class='la la-edit'></i></a>";			
					echo "</td></tr> ";
				}
								?>
							</table>
						</div>
							
<!--	close month picker-->
											</div>
										</div>

										<!--end::Section-->
								
									<!--end::Section-->
<!--								</div>-->
									</div>
						
								</div>
								
								<div class="row">
									<div class="m-portlet__body col-sm-12" id="new-div-weekstat"></div>
									<div class="m-portlet__body col-sm-12" id="new-div-weekstat2"></div>
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
		<!--edit project room modal	-->


<div class="modal fade show" id="projectroom_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								
									<form id="edit_projectroom" action="<?php echo base_url('Admin/edit_projectroom');?>" method="post">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Edit Project Room  
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
													<input id="project_id" type="hidden" name="proj_id" value="">
													</div> 
												</div>
											
												<!-- <div class="form-group m-form__group">
													<label for="serial-number" class="form-control-label">
														Add Users
													</label>

													<input list="project_users"
														name="emps_dataflex" 
														type="text" 
														id="emp_input_dtflx" 
														placeholder="Select employees" 
														class="flexdatalist"  
														multiple="multiple",  
														data-min-length="1">

													<div id="user_list"></div>
												<datalist id="project_users"  name="users_datalist">
											    <?php 
													foreach($employees as $emps){ 
												?>
												
												  <option value="<?php echo $emps['user_id']?>"><b><?php echo $emps['fullname'];?></b></option>
												  <?php 
														
													} 
													?>
													
												</datalist>
												
												</div> -->
												<!-- <div class="">
													<select class="form-control select2" multiple="">
														<option value="1">1</option>
														<option value="2">2</option>
                                    				</select>
												</div> -->

												<div class="form-group m-form__group">
													<label for="emp_input_dtflx" class="form-control-label">
														Add Users
													</label>
													<select id="emp_input_dtflx" name="emp_input_dtflx[]" class="form-control select2" multiple="" style="width: 100%">
														<!-- <?php 
															foreach($employees as $emps){ 
														?>
														<option value="<?php echo $emps['user_id']?>"><?php echo $emps['fullname'];?></option>
														<?php } ?> -->
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
										<button  onclick = "edit_project()" type="submit" class="btn btn-primary">
											Save Changes
										</button> 
									</div>
									
									</form>
								</div>
							</div>
						</div>
<!-- edit project room modal	-->
	
		


<!--		close testing add jd-->

<!--		close view status
		-->
		<?php include_once('chat_widget.php') ?>
		<!-- begin::Scroll Top -->
		<script type="text/javascript">
			var base_url = "<?php echo base_url(); ?>"
		</script>
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/dropdown.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<link href="<?php echo base_url();?>assets/assets/select2/dist/js/select2.full.min.js">
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->
	<script type="text/javascript">
		/*$('.flexdatalist').flexdatalist({
		     minLength: 1,
			 valueProperty:'value'
		});*/
		$('.select2').select2()
	</script>
</html>
