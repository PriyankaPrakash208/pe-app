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
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
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


			            <div class="modal fade show" id="add_comment" tabindex="-1" role="dialog"
			                aria-labelledby="exampleModalLabel">
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



			            <div class="m-portlet m-portlet--mobile">
			                <div class="m-portlet__head">
			                    <div class="m-portlet__head-caption">
			                        <div class="m-portlet__head-title">
			                            <h3 class="m-portlet__head-text">
			                                Task Management Control Panel

			                            </h3>
			                        </div>
			                    </div>
			                    <div class="m-portlet__head-tools">


			                    </div>
			                </div>
			                <div class="m-portlet__body">
			                    <div class="row">

			                        <div class="col-md-6">
                                        <!--begin::Portlet-->
                                        <form id="add_task" enctype="multipart/form-data" action="/Tasks/addNewTask" method="POST">
										<h5 class="m-link m--font-boldest m--font-primary">Create Task</h5>
                                            <hr />
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="recipient-name" class="form-control-label">
                                                        Task Title:
                                                    </label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                                <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="form-control-label">
                                                            Assign to:
                                                        </label>
                                                        <select class="form-control" name="user_id">
                                                                <?php
                                                                    foreach ($employee_list as $key => $value) { 
                                                                       echo "<option value='$value->user_id'>$value->fullname</option>";
                                                                    }
                                                                ?>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="form-control-label">
                                                            Description:
                                                        </label>
                                                        <textarea class="form-control" name="body"></textarea>
                                                    </div>
                                                    </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="recipient-name" class="form-control-label">
                                                        Select Type:
                                                    </label>
                                                    <select class="form-control" name="period"
                                                        onchange="selectPeriod(this.value)">
                                                        <option value="ONE">One Time</option>
                                                        <option value="MONTH">Monthly</option>
                                                        <option value="WEEK">Weekly</option>
                                                        <option value="DAY">Daily</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 " id="datePick">
                                                    <label for="recipient-name" class="form-control-label">
                                                        Select Deadline:
                                                    </label>
                                                    <input type='date' name='date' class='form-control m-input' value='' id='datepick'
                                                        placeholder='dd/mm/yyyy' />
                                                </div>
												
												<div class="col-md-5">
													<div class="form-group m-form__group ">
														<label>Attach files</label>											
														<input class="form-control m-input" type="file" name="task_attachments[]" multiple>
													</div>
												</div>
												

                                            </div>
                                            <div class="row">

                                                <div class="form-group col-md-12 text-right">
                                                    <button class="btn btn-success" type="submit">Assign </button>
                                                </div>
                                            </div>
                                        </form>
                                        <h5 class="m-link m--font-boldest m--font-primary">Tasks list</h5>
                                        <hr />
                                            <div>
											<div class="m-section  m-scrollable" data-scrollable="true" style="height: 400px">
											<div class="m-section__content">
												<table style='table-layout: fixed;' class="table table-sm table-bordered m-table m-table--head-bg-primary">
													<thead class="thead-inverse">
														<tr>
															<th style='width:15px !important;overflow: hidden;'>Task</th>
															<th style='width:15px !important;overflow: hidden;'>Assignee</th>
															<th style='width:15px !important;overflow: hidden;'>Status</th>
															<th style='width:15px !important;overflow: hidden;'>Deadline</th>
															<th style='width:15px !important;overflow: hidden;' width=50>Attachments</th>
															<th style='width:15px !important;overflow: hidden;'>Actions</th>
															
														</tr>
													</thead>
													<tbody  id="added_list">
														
                                                    <?php
                                                    if(count($taskListOwn)>0){
                                                    foreach ($taskListOwn as $key => $value) {
														if($value->status == 1){
														 $status= "<i class='fa fa-circle text-green'></i>";
														}elseif($value->status == 0 && (($value->date) < (date("Y-m-d")) ) && $value->period=="ONE"){
															$status= "<i class='fa fa-circle text-black'></i>";
														   }else{
															$status="<i class='fa fa-circle text-danger'></i>";
														}
														$attachment	="";
														if($value->task_attachment != ""){
															foreach($value->task_attachment as $task_attach){ 
																$attachment	.=' <a target="_blank" href="'.base_url().'assets/tasks_attachments/'.$task_attach.'"><i class="fa fa-save text-success"></i></a>';
															}
														}
														else{
															$attachment = "";
														}
										
														echo "<tr class='task_$value->asgnmnt_id'>
														<td style='width:15px !important;overflow: hidden;'><a href='javascript:;' onclick='viewTaskDetails($value->asgnmnt_id)'>".$value->title."</a></td>
														<td style='width:15px !important;overflow: hidden;'>".$value->assignee."</td>
														<td style='width:15px !important;overflow: hidden;'>".$status."</td>
														<td style='width:15px !important;overflow: hidden;'>".date('d-M-Y', strtotime($value->date))."</td>
														<td style='width:15px !important;overflow: hidden;'>".$attachment."</td>
														<td style='width:15px !important;overflow: hidden;'>
														<a href='javascript:;' style='margin-left:10px' onclick='removeTask($value->asgnmnt_id)'><i class='fa fa-trash'></i></a></td>
													</tr>
												";
                                                    }
                                                }else{
													echo "<tr><td colspan='4'>No Tasks! </td></tr>";
                                                }
                                                ?>
												</tbody>
											</table>
										</div>
                                    
                                            </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6" style="border-left:1px solid rgba(0, 0, 0, 0.1);">
											<!--begin::Portlet-->
											<?php 	if($role==0){ ?>
                                            <h5 class="m-link m--font-boldest m--font-primary">Task Assigned by others</h5>
                                            <hr/>
                                            <div>

											
                                                    <div class="m-section m-scrollable" data-scrollable="true" style="height: 750px;">
													<!-- <div class="m-scrollable m-scroller ps ps--active-y" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="height: 500px; overflow: hidden;"> -->
                                                            <div class="m-section__content" style="overflow-x: scroll;">
                                                                <table style="table-layout: fixed;" class="table table-bordered table-sm m-table m-table--head-bg-primary">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <th style='width:15px !important;overflow: hidden;'>Task</th>
																			<th style='width:15px !important;overflow: hidden;'>Assigner</th>
                                                                            <th style='width:15px !important;overflow: hidden;'>Assignee</th>
                                                                            <th style='width:15px !important;overflow: hidden;'>Status</th>
																			<th style='width:15px !important;overflow: hidden;'>Deadline</th>
																			<th style='width:15px !important;overflow: hidden;'>Attachments</th>
                                                                            <th style='width:15px !important;overflow: hidden;'>Actions</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody  id="pending_task">
                                                                        
																	<?php
																	  
                                                                    if(count($tasklistOthers)>0){
                                                                    foreach ($tasklistOthers as $key => $value) {
																		if($value->creator_id==7){
																			$assigner ="Muneer";
																		}else{
																			$assigner=$value->assigner;
																		}
                                                                        if($value->status == 1){
																		 $status= "<i class='fa fa-circle text-green'></i>";
																		}elseif(
																			$value->status == 0 && (($value->date) < (date("Y-m-d")) ) && $value->period=="ONE")
																		{
																		$status= "<i class='fa fa-circle text-black'></i>";
														   				}else{
                                                                            $status="<i class='fa fa-circle text-danger'></i>";
                                                                        }
																		$attachment = ""; 
																		if($value->task_attachment != ""){
																			foreach($value->task_attachment as $task_attach){ 
																				$attachment	.=' <a target="_blank" href="'.base_url().'assets/tasks_attachments/'.$task_attach.'"><i class="fa fa-save text-success"></i></a>';
																			}
																		}
																		else{
																			$attachment = "";  
																		}
                                                                        echo "<tr class='task_$value->asgnmnt_id'>
																		<td style='width:15px !important;overflow: hidden;'><a href='javascript:;' onclick='viewTaskDetails($value->asgnmnt_id)'>".$value->title."</a></td>
																		<td style='width:15px !important;overflow: hidden;'>".$assigner."</td>
                                                                        <td style='width:15px !important;overflow: hidden;'>".$value->fullname."</td>
																		<td style='width:15px !important;overflow: hidden;'>".$status."</td>
																		<td style='width:15px !important;overflow: hidden;'>".date('d-m-Y', strtotime($value->date))."</td>
																		<td style='width:15px !important;overflow: hidden;' class='text-center'>".$attachment."</td> 
                                                                        <td style='width:15px !important;overflow: hidden;'>
                                                                        <a href='javascript:;'style='margin-left:10px' onclick='removeTask($value->asgnmnt_id)'><i class='fa fa-trash'></i></a></td>
                                                                    </tr>
                                                                ";
                                                                    }
                                                                }else{
                                                                    echo "<tr><td colspan='4'>No Tasks found! </td></tr>";
																}
															
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
														<!-- test -->
														<!-- </div> -->
														<!-- test -->
                                                            </div>
											</div>
											<?php } ?>
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

			<!-- Tasks model start-->
	<div class="modal fade" id="admintasks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xlg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal_title m--font-boldest m--font-danger text-center" id="task_title"></h5>
					
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

						<table class="table table-sm m-table m-table--head-bg-primary table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>Assignee</th>
									<th>Assigner</th>
									<th>Assigned Date</th>
									<th>Task</th>
									<th>Status</th>
									<th>Deadline</th>
									<th>Attachments</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="assigner"></td>
									<td id="assigned_to"></td>
									<td id="assigned_date"></td>
									<td id="tasktable_title" ></td>
									<td id="task_status"></td>
									<td id="task_deadline"></td>
									<td id="task_attachments"></td>
								</tr>
							</tbody>
						</table>
						<br/>

						<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded" style="margin-bottom:10px;">Task Description</span>
						<div id="task_details" style="margin-bottom:30px;"></div>

						<span class="m-badge m-badge--success m-badge--wide m-badge--rounded" style="margin-bottom:10px;">Conversation</span>
						<div id="task_comments"></div>
							
						</div>
					

					<form  id="update_task_comment" class="m-form " action="/Tasks/updateTaskComment" method="post" >
						<div class="form-group m-form__group col-md-12"><textarea name="comment" class="form-control m-input" id="text-comments" placeholder="Enter comments"></textarea> </div>
						
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
		

		<!--begin::Base Scripts -->
		<script>
			var base_url	=	"<?php echo base_url();?>";
		</script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript">
		</script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript">		</script>
		<script src="<?php echo base_url();?>assets/js/manageTask.js" type="text/javascript">		</script>

		<!--end::Base Scripts -->

	</body>
	<!-- end::Body -->

</html>