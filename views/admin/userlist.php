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
		<link href="<?php echo base_url();?>assets/vendor/base/style.bundle.css" rel="stylesheet" type="text/css" />
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
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<div class="m-content" style="padding: 0px 0;">

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title" style="width: 100%">
										<h3 class="m-portlet__head-text">
											Employee List
<!--
											<small>
											 	Employees list
											</small>
-->
										</h3>
											<a style="float: right;margin-top: 15px;" href="javascript:;" onclick="addNew();"  class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-user"></i>
													<span>
														Add Employee 
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
								
								<div class="m-form__group form-group">
							
									<div class="m-checkbox-list">
										<label class="m-checkbox">
											<input type="checkbox" id="resigned_employees"> Show Resigned Employees
											<span></span>
										</label>
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



		<div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<form  id="updateuser" class="m-form " action="./updateuser" method="post" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">
							Update Details 
						</h4>
					</div>
					<div class="modal-body row ">
					<input name="userid" type="hidden"  id="user_id"/>
					 <div class="col-md-6">
						<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Full Name
						</label>
						<input type="text" class="form-control m-input m-input--air" id="fullname" name="fullname" aria-describedby="emailHelp" placeholder="">	
						</div>
						<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							EMP ID
						</label>
						<input type="number" class="form-control m-input m-input--air" id="empid"name="empid" aria-describedby="emailHelp" placeholder="">	
						</div>
						<div class="m-form__group form-group ">
							<label for="">
								Gender 
							</label>
							<div class="m-radio-inline">
								<label class="m-radio">
									<input type="radio" name="gender" value="male">
									Male
									<span></span>
								</label>
								<label class="m-radio">
									<input type="radio" name="gender" value="female">
									Female
									<span></span>
								</label>
							</div>
						</div>
						<div class="form-group m-form__group ">
							<label for="exampleInputEmail1">
								Designation
							</label>
							<select class="form-control m-input m-input--air" id="designation" name="desgnn">
							     <option value=""></option>
								<?php foreach($designation_det as $desgn){ ?>
								  <option value="<?php echo $desgn->desg_id; ?>"><?php echo $desgn->designation; if($desgn->others)echo "(".$desgn->others.")"; ?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group m-form__group ">
							<label for="exampleInputEmail1">
								Team
							</label>
							<select class="form-control m-input m-input--air" id="team" name="team">
								<?php foreach($team as$tem){ ?>
								<option value="<?php echo $tem->team_id; ?>"><?php echo $tem->name; ?> </option>
								<?php } ?>
							</select>
						</div>
						
						<div class="form-group m-form__group ">
						<label for="exampleInputEmail1">
							Department
						</label>
						<select class="form-control m-input m-input--air" id="dept" name="dept">
						<?php foreach($dept as$dep){ ?>
							<option value="<?php echo $dep->dep_id; ?>"><?php echo $dep->dep_name; ?> </option>
							<?php } ?>
						</select>
						</div>

						<div class="form-group m-form__group">
							<label for="exampleSelect2">Select Certifications</label>
							<input type="text" name="cert_list" id="cert_list" class="form-control m-input m-input--air m-input--pill">
							<!-- <select multiple="multiple" class="form-control m-input m-input--air m-input--pill" id="cert_list" name="cert_list[]">
								<?php
									foreach ($certifications as $key => $value) {
										echo '<option id="cert_opt_'.$value->id.'" value="'.$value->id.'">'.$value->certificate.'</option>';
									}
								?>
							</select> -->
						</div>
						
						
						
					  </div>
					  <div class="col-md-6">
						<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Email 
						</label>
						<input type="email" class="form-control m-input m-input--air" id="email"  name="email" aria-describedby="emailHelp" placeholder="">											
						</div>
						<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Password
						</label>
					<input type="password" class="form-control m-input m-input--air" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter password">	
						</div>
						<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Phone
						</label>
						<input type="text" class="form-control m-input m-input--air" id="phone" name="phone" aria-describedby="emailHelp" placeholder="">	
						</div>
							<div class="form-group m-form__group ">
						<label for="exampleInputEmail1">
							Date of Join 
						</label>
						<input type="date" class="form-control m-input m-input--air" id="date_of_join" name="date_of_join" aria-describedby="emailHelp" placeholder="">	
						</div>
						<div class="form-group m-form__group ">
						<label for="exampleInputEmail1">
							DOB 
						</label>
						<input type="date" class="form-control m-input m-input--air" id="dob" name="dob" aria-describedby="emailHelp" placeholder="">	
						</div>


						<div class="m-form__group form-group">
							
							<div class="m-checkbox-list">
								<label class="m-checkbox">
									<input type="checkbox" id="core_employee"> Core Employee
									<span></span>
								</label>
							</div>
						</div>

						<div class="m-form__group form-group">
							
							<div class="m-checkbox-list">
								<label class="m-checkbox">
									<input type="checkbox" id="notice_period"> Notice Period
									<span></span>
								</label>
							</div>
						</div>

						<div class="m-form__group form-group">
							
							<div class="m-checkbox-list">
								<label class="m-checkbox">
									<input type="checkbox" id="wfh"> Limit Work From Home
									<span></span>
								</label>
							</div>
						</div>

						<div class="form-group m-form__group ">
							<label for="exampleInputEmail1">
								Buddy Assigned 
							</label>
							<input type="text" class="form-control m-input m-input--air" id="buddy_assigned" name="buddy_assigned">	
						</div>

					  </div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Save 
						</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	<!--  JD Skill set updater model  -->
	<div class="modal fade" id="skill_updater" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header" style="padding: 10px;font-size: 13px;">
					Update Skill set
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
					</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form  id="add_new_skill" class="m-form " action="./addNewSkill" method="post" >
								<input type="hidden" name="user_id" class="form-control" id="skill_user_id">
									<div class="form-group">
										<label class="control-label"style="font-size: 13px;">Add skill</label>
											<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-asterisk"></i>
												</span>
												<input type="text" class="form-control" id="skill_name" name="skillname" placeholder="Mention skill here....">
											</div>
									</div>
									<div class="form-group text-right">
										<button type="submit" style="font-size: 13px;" class="btn btn-default">+ add</button>
									</div>
								</form>
								<h6 style="border-bottom: 1px solid #22a6fb;padding-bottom: 4px;">Skills added</h6>
								<div id="skill_added"></div>
							</div>
							<div class="col-md-6" style="border-left: 1px solid #f1f1f1;">
								<h6 style="border-bottom: 1px solid #fbdc22; padding-bottom: 4px;">Added for Review</h6>
								<div id="skill_review"></div>
								<h6 style="border-bottom: 1px solid #22fbec; padding-bottom: 4px;" sty>Skills Completed</h6>
								<div id="skill_completed"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					</div>
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
		<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>assets/js/tabulator.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<!--end::Page Resources -->
		
		<script type="text/javascript">

			var block_resigners = 1;
			var table_data;
 $( function() {


	// 	$(window).on("resize", function(){
	// 	// console.log("redraw")
	// 	$(".tabulator").tabulator("redraw");
	// });

		var printIcon = function(value, data, cell, row, options){ //plain text value
			return "<i class='fa fa-print' style='vertical-align:middle; padding:2px 0;'></i> "
		};


			// $("#example-table-demo").tabulator({
			// 	height:"320px",

			// 	columns:[
			// 	// {formatter:printIcon, width:40, align:"center",onClick:function(e, cell, val, data){alert("Printing row data for: " + data.name)} },
			// 	{title:"Name", field:"name", sorter:"string", width:300, tooltipHeader:"Custom Header Tooltip",},

			// 	{title:"Age", field:"age", sorter:"number", align:"left", width:300},
			// 	{title:"Gender", field:"gender", width:300, sorter:"string", onClick:function(e, val, cell, data){console.log("cell click - " + val, cell)}},

			// 	{title:"Height", field:"height", align:"center", sorter:"number", width:200},
			// 	{title:"Favourite Color", field:"col", sorter:"string", sortable:false, width:200},


			// 	{title:"Date Of Birth", field:"dob", sorter:"date", align:"center", width:200},
			// 	{title:"id", field:"id", sorter:"number"},
			// 	],
			// });

			//custom aditional degaults to the tabulator package



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


			/** Tabulator : listing userdatas admin  */
			$("#ajax_data").tabulator({
				height:"50%",
				sortBy:"date",
				sortDir:"desc",
				responsiveLayout:true,
				layout:"fitDataFill",
			  	//pagination:"local",
			  	//paginationSize:20,
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
			  	// placeholder:"NO ITEMS HERE",
			  	// groupBy:"destination",
			  	// pagination:"local", //enable local pagination.
			  	 ajaxURL:"<?php echo base_url();?>Admin/userdata",
			  	//data:tabledata,

			  	columns:[
			  	{title: "ID", field: "emp_id", width:70, sortable: true},
			  	{title: "Name", field: "fullname", width:180, headerFilter:true, headerFilterPlaceholder:"Name", sorter:"alphanum", sortable: true, bottomCalc:"count",formatter:function(cell, formatterParams){
			  		
			  		// var notice_period = '<span style="float: right;" class="m-badge m-badge--danger m-badge--wide">NP</span>';
			  		if(cell.getData().notice_period == 0){
			  			return '<a target="_blank" href="./gouser/'+cell.getRow().getData().user_id+'"  class="actionbtn">'+cell.getRow().getData().fullname +'</a>';
			  		}else{
			  			return '<a target="_blank" href="./gouser/'+cell.getRow().getData().user_id+'"  class="actionbtn" style="color:red;font-weight:bold;">'+cell.getRow().getData().fullname+'</a>';
			  		}

			  	}},
				{title: "Designation", field: "designation", width:100, headerFilter:true, headerFilterPlaceholder:"Designation", sorter:"alphanum", sortable: true, bottomCalc:"count"},
			  	{title: "Team", field: "name", width:180,headerFilter:true, headerFilterPlaceholder:"Team Name", sorter:"alphanum",sortable: true},
					{title: "Dept", field: "dep_name", width:180,headerFilter:true, headerFilterPlaceholder:"Dept Name", sorter:"alphanum",sortable: true},
			  	// {title: "MH", field: "WFH", width:60,sortable: true,align:"center"},
			  //	{title: "Phone", field: "phone", width:150, sorter:"alphanum", sortable: true, bottomCalc:"count"},
				 // {title: "Email", field: "email", width:200,headerFilter:true, headerFilterPlaceholder:"email", sorter:"alphanum", sortable: true, bottomCalc:"count"},
				  {title: "PE", field: "PE", width:55, formatter:function(cell, formatterParams){
	  		return "<div style='text-align:center'>" +cell.getRow().getData().PE +"</div>";
			  	}},
			  	{title: "CE", field: "CE", width:55, formatter:function(cell, formatterParams){
	  		return "<div style='text-align:center'>" + cell.getRow().getData().CE + "</div>";
				  }},
				  {title: "IE", field: "IE", width:55, sortable: true,align:"center"},
				  {title: "LOP", field: "LOP", width:65, sortable: true,align:"center"},
				  {title: "WFH", field: "WFH", width:70, sortable: true,align:"center"},
				  {title: "SW", field: "SWAP", width:55, sortable: true,align:"center"},
				  {title: "HT", field: "handled", width:55, sortable: true,align:"center"},
				  {title: "RT", field: "resolved", width:55, sortable: true,align:"center"},
				  {title: "PT", field: "pending", width:55, sortable: true,align:"center"},
				  {title: "SLA", field: "sla", width:65, sortable: true,align:"center"},
				  {title: "EH", field: "extra_hours", width:100, sortable: true,align:"center"},
					{title: "MH", field: "mandatory_hours", width:100, sortable: true,align:"center"},


				  {title: "DOJ", field: "date_of_join", width:110, sortable: true,align:"center", formatter:function(cell, formatterParams){
				  	var data = cell.getData();
				  	var doj = timeConverter(data.date_of_join);
				  	return doj;
				  }
				  },
			  	{title: "Actions", field: "PE", width:160, formatter:function(cell, formatterParams){
					return '\<div style="text-align:center"><a href="./performance/'+cell.getRow().getData().user_id+'"   class="actionbtn" title="Performance">\
							<i  class="la la-tachometer"></i>\
						</a>\
						\<a href="javascript:;" onClick="addSkills('+cell.getRow().getData().user_id+')"  class="actionbtn" title="Skill Improvement">\
							<i  class="la la-star"></i>\
						</a>\
						\<a href="javascript:;" onClick="edituser('+cell.getRow().getData().user_id+')" class="actionbtn" title="Edit details">\
							<i  class="la la-edit"></i>\
						</a>\
						<a href="javascript:;" onClick="deleteuser('+cell.getRow().getData().user_id+')"  class="actionbtn" title="Delete">\
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
			  		if((row.getData().name == 'Resigned') && (block_resigners == 1)){
			  			row.delete();
			  			// return 
			  		}
			  		/*else if((row.getData().name  != 'Resigned') && (block_resigners == 0)){
			  			row.delete();
			  		}*/
			  		// row.delete();
			  	},
			  	columnVisibilityChanged:function(column, visible){
			  	       //column - column component
			  	       //visible - is column visible (true = visible, false = hidden)
			  	       console.log("vis", column.getField(), visible);
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
	
	/** Show resigned employees */
	$("#resigned_employees").on('click', function(){
		if($("#resigned_employees").is(':checked')){
			block_resigners = 0;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("setFilter", "name", "like", "Resigned");
		}else{
			block_resigners = 1;
			var data = table_data;
			$("#ajax_data").tabulator("setData", data);
			$("#ajax_data").tabulator("removeFilter", "name", "like", "Resigned");
		}
	});

	

  function manage_user_warning(id){
  	// warning_level

  	$.ajax({
		url:"./view_data/"+id,
		type: "POST",
		dataType:'json',
		success: function(data){
			console.log(data);
			$("#user_id").val(id);
			$("#warning_level").val(data.warning_level);
  			$("#warningModel").modal('show');
		}
	});
  }

  $('#warning_user_form').ajaxForm({
  	dataType:'json',
		success: function(response, status, xhr, $form) {
			console.log(response);
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
			console.log(data);
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

			console.log(data.core);
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

	$("#core_employee").on('click', function(){
		var user_id = $("#user_id").val();
		if($("#core_employee").is(':checked')){
			var confirmation = confirm("Do you want to make this employee as Core Employee?");
			if(confirmation == true){
				manage_core_employee(user_id, 1)
			}
		}else{
			var confirmation = confirm("Do you want to remove this employee from Core Employee?");
			if(confirmation == true){
				manage_core_employee(user_id, 0)
			}
		}
	});

	function manage_core_employee(user_id, core_status){
		// alert(core_status);
		$.ajax({
			url: './make_core_employee',
			dataType: 'json',
			data: {user_id, core_status},
			type: 'POST',
			success: function(result){
				if(result.status == true){
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'success',
						z_index: 10000,
					});	
				}else{
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'danger',
						z_index: 10000,
					});
				}
			}
		})
	}

	$("#notice_period").on('click', function(){
		var user_id = $("#user_id").val();
		if($("#notice_period").is(':checked')){
			var confirmation = confirm("Do you want to activate notice period to this Employee?");
			if(confirmation == true){
				activate_notice_period(user_id);
			}
		}else{
			var confirmation = confirm("Do you want to deactivate notice period from this Employee?");
			if(confirmation == true){
				deactivate_notice_period(user_id);
			}
		}
	});


	$("#wfh").on('click', function(){
		var user_id = $("#user_id").val();
		if($("#wfh").is(':checked')){
			var confirmation = confirm("Do you want to limit WFH to this Employee?");
			if(confirmation == true){
				manage_wfh(user_id, 1);
			}
		}else{
			var confirmation = confirm("Do you want to remove WFH limit from this Employee?");
			if(confirmation == true){
				manage_wfh(user_id, 0);
			}
		}
	});

	function manage_wfh(user_id, wfh){
		$.ajax({
			url: './manage_wfh',
			dataType: 'json',
			data: {user_id, wfh},
			type: 'POST',
			success: function(result){
				if(result.status == true){
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'success',
						z_index: 10000,
					});	
				}else{
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'danger',
						z_index: 10000,
					});
				}
			}
		})
	}

	function activate_notice_period(user_id){
		var notice_period = 1;
		$.ajax({
			url:'./activate_notice_period',
			dataType:'json',
			data:{user_id, notice_period},
			type:'POST',
			success:function(result){ 
				if(result.status == true){
					$.notify({
						title: '<strong>Success!</strong>',
						message:'Notice period activated'
					},{
						type: 'success',
						z_index: 10000,
					});	
				}else{
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'danger',
						z_index: 10000,
					});
				}
			}
		});
	}

	function deactivate_notice_period(user_id){
		var notice_period = 0;
		$.ajax({
			url:'./activate_notice_period',
			dataType:'json',
			data:{user_id, notice_period},
			type:'POST',
			success:function(result){ 
				if(result.status == true){
					$.notify({
						title: '<strong>Success!</strong>',
						message:'Notice period deactivated'
					},{
						type: 'success',
						z_index: 10000,
					});	
				}else{
					$.notify({
						title: '<strong>Success!</strong>',
						message:result.message
					},{
						type: 'danger',
						z_index: 10000,
					});
				}
			}
		});
	}
	function addSkills(user_id){
		$("#skill_added,#skill_review,#skill_completed").html("<div style='background: #eee;padding: 6px;margin: 8px 0px;'><i class='fa fa-spinner fa-spin'></i></div>");
		$("#skill_user_id").val(user_id);
		$.ajax({
			url:"./getEmployeeSkillSet",
			type:"POST",
			dataType:'json',
			data:{user_id},
			success:function(data){
				if(data.added){
					var added = data.added;
					var htmladded="";
					added.forEach(function(skill) {
						htmladded +="<div class='skill skill"+skill.skill_id+"'><div class='skill-left'>"+skill.skill_name+"</div><div class='skill-right'><button onclick='removeSkill("+skill.skill_id+")' class='btn btn-sm'><i class='fa fa-trash'></i></button></div></div>";
					});
					$("#skill_added").html(htmladded);
				}else{
					$("#skill_added").html("<div style='background: #eee;padding: 6px;margin: 8px 0px;'>No record found...</div>");
				}
				if(data.review){
					var review=data.review;
					var htmlreview="";
					review.forEach(function(skill) {
						htmlreview +="<div class='skill skill"+skill.skill_id+"'><div class='skill-left'>"+skill.skill_name+"</div><div class='skill-right'><button onclick='addToComplete("+skill.skill_id+")' class='btn btn-sm'><i class='fa fa-check'></i></button> <button onclick='removeFromReview("+skill.skill_id+")' class='btn btn-sm'><i class='fa fa-times'></i></button></div></div>";
					});
					$("#skill_review").html(htmlreview);
				}else{
					$("#skill_review").html("<div style='background: #eee;padding: 6px;margin: 8px 0px;'>No record found...</div>");
				}
				if(data.completed){
					var completed=data.completed;
					var htmlcompleted="";
					completed.forEach(function(skill) {
						htmlcompleted +="<div class='skill skill"+skill.skill_id+"'><div class='skill-left' style='color: #37c1da;'>"+skill.skill_name+"</div><div class='skill-right'><button onclick='removeFromComplete("+skill.skill_id+")' class='btn btn-sm'><i class='fa fa-times'></i></button></div></div>";
					});
					$("#skill_completed").html(htmlcompleted); 
				}else{
					$("#skill_completed").html("<div style='background: #eee;padding: 6px;margin: 8px 0px;'>No record found...</div>");
				}
			}
		});
		$("#skill_updater").modal('show');
	}
	$('#add_new_skill').ajaxForm({
  		dataType:'json',
		success: function(response, status, xhr, $form){
			if(response.status==1){
					$.notify({
					title: '<strong>Success!</strong>',
					message:'added successfully!'
					},{
						type: 'success',
						z_index: 10000,
					});	
					$("#skill_added").prepend("<div class='skill skill"+response.skill_id+"'><div class='skill-left'>"+response.skill_name+"</div><div class='skill-right'><button onclick='removeSkill("+response.skill_id+")' class='btn btn-sm'><i class='fa fa-trash'></i></button></div></div>");

				}else{
					$.notify({
						title: '<strong>Error!</strong>',
						message:'Please try again!'
					},{
						type: 'danger',
						z_index: 10000,
					});	
				}
				$("#skill_name").val("");
		}
		
	});
	function removeSkill(skill_id){
		$.ajax({
			type:"POST",
			url:"./removeSkill",
			data:{skill_id},
			dataType:"json",
			success:function(res){
				if(res.status==1){
					$.notify({
					title: '<strong>Success!</strong>',
					message:'Deleted successfully!'
					},{
						type: 'success',
						z_index: 10000,
					});	
					$(".skill"+skill_id).fadeOut().remove();
				}else{
					$.notify({
						title: '<strong>Error!</strong>',
						message:'Please try again!'
					},{
						type: 'danger',
						z_index: 10000,
					});	
				}
			}
		});
	}
	function addToComplete(skill_id){
		var skill_update_status=1;
		var skill_verify_status =1;
		$.ajax({
			type:"POST",
			url:"./changeSkillStatus",
			data:{skill_id,skill_update_status,skill_verify_status},
			dataType:"json",
			success:function(res){
				if(res.status==1){
					$.notify({
					title: '<strong>Success!</strong>',
					message:'Updated successfully!'
					},{
						type: 'success',
						z_index: 10000,
					});	
					var skillName=$(".skill"+skill_id+" .skill-left").text();
					$(".skill"+skill_id).fadeOut().remove();
					if($('#skill_completed').find('div.skill').length == 0){
						$("#skill_completed").html("");
					}
					$("#skill_completed").append("<div class='skill skill"+skill_id+"'><div class='skill-left' style='color: #37c1da;'>"+skillName+"</div><div class='skill-right'><button onclick='removeFromComplete("+skill_id+")' class='btn btn-sm'><i class='fa fa-times'></i></button></div></div>").fadeIn();
				}else{
					$.notify({
						title: '<strong>Error!</strong>',
						message:'Please try again!'
					},{
						type: 'danger',
						z_index: 10000,
					});	
				}
			}
		});
	}
	function removeFromReview(skill_id){
		var skill_update_status=0;
		var skill_verify_status =0;
		$.ajax({
			type:"POST",
			url:"./changeSkillStatus",
			data:{skill_id,skill_update_status,skill_verify_status},
			dataType:"json",
			success:function(res){
				if(res.status==1){
					$.notify({
					title: '<strong>Success!</strong>',
					message:'Updated successfully!'
					},{
						type: 'success',
						z_index: 10000,
					});						
					var skillName=$(".skill"+skill_id+" .skill-left").text();
					$(".skill"+skill_id).fadeOut().remove();
					if($('#skill_added').find('div.skill').length == 0){
						$("#skill_added").html("");
					}
					$("#skill_added").append("<div class='skill skill"+skill_id+"'><div class='skill-left' style='color: #37c1da;'>"+skillName+"</div><div class='skill-right'><button onclick='removeSkill("+skill_id+")' class='btn btn-sm'><i class='fa fa-trash'></i></button></div></div>").fadeIn();
				}else{
					$.notify({
						title: '<strong>Error!</strong>',
						message:'Please try again!'
					},{
						type: 'danger',
						z_index: 10000,
					});	
				}
			}
		});
	}
	function removeFromComplete(skill_id){
		var skill_update_status=1;
		var skill_verify_status =0;
		$.ajax({
			type:"POST",
			url:"./changeSkillStatus",
			data:{skill_id,skill_update_status,skill_verify_status},
			dataType:"json",
			success:function(res){
				if(res.status==1){
					$.notify({
					title: '<strong>Success!</strong>',
					message:'Updated successfully!'
					},{
						type: 'success',
						z_index: 10000,
					});			
					var skillName=$(".skill"+skill_id+" .skill-left").text();	
					$(".skill"+skill_id).fadeOut().remove();
					if($('#skill_review').find('div.skill').length == 0){// if empty remove no records comment
						$("#skill_review").html("");
					}
					$("#skill_review").append("<div class='skill skill"+skill_id+"'><div class='skill-left' style='color: #37c1da;'>"+skillName+"</div><div class='skill-right'><button onclick='addToComplete("+skill_id+")' class='btn btn-sm'><i class='fa fa-check'></i></button> <button onclick='removeFromReview("+skill_id+")' class='btn btn-sm'><i class='fa fa-times'></i></button></div></div>").fadeIn();
				}else{
					$.notify({
						title: '<strong>Error!</strong>',
						message:'Please try again!'
					},{
						type: 'danger',
						z_index: 10000,
					});	
				}
			}
		});
	}
			</script>
	</body>
	<!-- end::Body -->
	
	</html>