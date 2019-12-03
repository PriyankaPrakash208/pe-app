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
											All Requests
<!--
											<small>
											 	Employees list
											</small>
-->
										</h3>
																					
									</div>
									
								</div>
								
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-9 order-2 order-xl-1">
											<div class="form-group m-form__group row align-items-center">
												
												<div class="col-md-4">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label class="m-label m-label--single">
																Status:
															</label>
														</div>
														<div class="m-form__control">
															<select name="name" class="form-control  m-input" id="m_form_name">
																<option value=""> All</option>
																<option value="0">Pending</option>
																<option value="1">Approved</option>
																<option value="2">Rejected</option>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
												
											</div>
										</div>
										<div class="col-xl-3 order-1 order-xl-2 m--align-right">
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
								<!--end: Search Form -->
								<!--begin: Datatable -->
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
								  <option value="<?php echo $desgn->desg_id; ?>"><?php echo $desgn->designation; ?> </option>
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


			//signout
			$("#ajax_data").tabulator({
				height:"50%",
				sortBy:"date",
				sortDir:"desc",
				responsiveLayout:true,
				layout:"fitDataFill",
			  	//pagination:"local",
			  	//paginationSize:20,
			  	//layout:"fitColumns",
			  	// placeholder:"NO ITEMS HERE",
			  	// groupBy:"destination",
			  	// pagination:"local", //enable local pagination.
			  	 ajaxURL:"<?php echo base_url();?>Admin/userRequests",
			  	//data:tabledata,

			  	columns:[
			  	{title: "#", field: "lv_aply_date", width:100, sortable:true,sorter:"date",formatter:function(cell,formatterParams){
	  		      return "<span style='text-align:center'>"+cell.getRow().getData().lv_aply_date +"</span>";
			  	}},
			  	{title: "Type", field: "lv_title", width:100, headerFilter:true, headerFilterPlaceholder:"Type", sorter:"alphanum", sortable: true, bottomCalc:"count"},
				{title: "Fullname", field: "fullname", width:180, headerFilter:true, headerFilterPlaceholder:"Fullname", sorter:"alphanum", sortable: true, bottomCalc:"count",formatter:function(cell, formatterParams){

			  	return '<a target="_blank" href="./gouser/'+cell.getRow().getData().user_id+'"  class="actionbtn">'+cell.getRow().getData().fullname +'</a>';

			  	}},
			  	{title: "Consent Of", field: "approvedby", width:180,headerFilter:true, headerFilterPlaceholder:"Consent of", sorter:"alphanum",sortable: true},
			  	{title: "Message", field: "lv_purpose", width:150, sorter:"alphanum", sortable: true, bottomCalc:"count",formatter:function(cell, formatterParams){
				    msg = cell.getRow().getData().lv_purpose.replace(/\n/g,"<br>");
				    return '<span class="m--font-bold m--font-Online">' +msg+ '</span>';
			  	}
				
				},
			  	{title: "Dates Requested", field: "lv_date", width:150,headerFilter:true, headerFilterPlaceholder:"Dates Requested", sorter:"alphanum", sortable: true, bottomCalc:"count", formatter:function(cell, formatterParams){
					return '<span class="m-badge m-badge--wide">' +cell.getRow().getData().lv_date+ '<br/> to <br/>'+cell.getRow().getData().lv_date_to+'</span><br/><span class="m-badge m-badge--warning text-center" style="-webkit-padding-start: 10px;-webkit-padding-end: 10px;" >No.Days: <b>'+cell.getRow().getData().lv_no+' </b></span>'; 

			  	}},
				{title: "Files", field: "lv_img", width:70, formatter:function(cell, formatterParams){
						if(cell.getRow().getData().lv_img){
						var dat='<a href="/assets/userfiles/'+cell.getRow().getData().lv_img+'" target="_blank"  class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="download">\
							<i class="fa fa-download"></i>\
						</a>\
						';
					}else{
						var dat=' ';
					}
				
				return dat;
			  	}},
			  	{title: "Status", field: "lv_status", width:150,formatter:function(cell, formatterParams){
	  		       var status = {
						0: {'title': 'Pending', 'class': 'm-badge--primary'},
						2: {'title': 'Rejected by', 'class':' m-badge--danger'},
						1: {'title': 'Approved by', 'class': ' m-badge--success'}						
					};
					return '<span id="'+cell.getRow().getData().lv_id+'" class="m-badge ' + status[cell.getRow().getData().lv_status].class + ' m-badge--wide">' + status[cell.getRow().getData().lv_status].title + ' '+cell.getRow().getData().appr_person+'</span>';
			  	}}, 
			  	{title: "Actions", field: "Actions", width:150, formatter:function(cell, formatterParams){

					return '\<a  href="javascript:;" onClick="requestapprove('+cell.getRow().getData().lv_id+')"  class="m-portlet__nav-link btn m-btn btn-success m-btn--icon m-btn--icon-only m-btn--pill" title="Approve">\
							<i class="fa fa-check-square-o"></i>\
						</a>\
						\<a href="javascript:;" onClick="requestreject('+cell.getRow().getData().lv_id+')" class="m-portlet__nav-link btn m-btn btn-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Reject">\
							<i class="fa fa-ban"></i>\
						</a>\
						<a href="javascript:;" onClick="deleterequest('+cell.getRow().getData().lv_id+')"  class="m-portlet__nav-link btn m-btn btn-metal  m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';

			  	}}
			  	],
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
				$("#ajax_data").tabulator("<?php echo base_url();?>Admin/userRequests");
			})

  } );
  function edituser(id){

	$.ajax({
		url:"./view_data/"+id,
		type: "POST",
		dataType:'json',
		success: function(data){
			//alert(data.user_id);
			//datatable.load();
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
					$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userRequests");
					//datatable.load();
				}
			});
	}
}
	$('#updateuser').ajaxForm({ 
		dataType:'json',
		success: function(response, status, xhr, $form) {
			if(response.status==1){	
			$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userRequests");							
		$.notify({
				title: '<strong>Success!</strong>',
				message:response.msg
			},{
				type: 'success',
				z_index: 10000,
			});
			}
			else if(response.status==2){	
			$("#ajax_data").tabulator("setData", "<?php echo base_url();?>Admin/userRequests");			
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
			
			
	function requestapprove(id){ 
		
			
			var result = confirm("Are you sure you want to approve this request?");
			if (result){
			var approve_per = "<?php echo $adminname?>";
			if(approve_per != ""){
//				alert(approve_per);
				$.ajax({
					url:'../TestMail/requestapprove',
					type:'POST', 
					data:{id,approve_per},
					success:function(data){			
						if(data==1){								
							$.notify({
								title: '<strong>Success!</strong>',
								message:"Updated!"
							},{
								type: 'success',
								z_index: 10000,
							});
							location.reload();
						}

					else{
							$.notify({
								title: '<strong>Error!</strong>',
								message:"Something went wrong!"
							},{
								type: 'danger',
								z_index: 10000,
							});
						}
					}
			});
			
		}
		else{
			alert("Please enter your name ");
		}
				}//end confirm
	}

		function requestreject(id){ 	
			
			//Start Confirmation
	var result = confirm("Are you sure you want to reject this request?");
			if(result){
				
			var rejected_per = "<?php echo $adminname?>";
			if(rejected_per != ""){
//				alert(rejected_per);
				 $.ajax({
						url:'../TestMail/requestreject',
						type:'POST', 
						data:{id,rejected_per},
						success:function(data){			
							if(data==1){								
								$.notify({
									title: '<strong>Success!</strong>',
									message:"Updated!"
								},{
									type: 'success',
									z_index: 10000,
								});
								location.reload();
							}

						else{
								$.notify({
									title: '<strong>Error!</strong>',
									message:"Something went wrong!"
								},{
									type: 'danger',
									z_index: 10000,
								});
							}
						}
				});
				
			}
				
			else{
				alert('Please enter your name');
			}
			}
		}		
			
	function deleterequest(id){ 	
	
			$.ajax({
			url:'deleterequest',
			type:'POST', 
			data:{id},
			success:function(data){			
				if(data==1){								
		$.notify({
				title: '<strong>Success!</strong>',
				message:"Deleted!"
			},{
				type: 'success',
				z_index: 10000,
			});
			location.reload();
			}
		
		else{
			$.notify({
				title: '<strong>Error!</strong>',
				message:"Something went wrong!"
			},{
				type: 'danger',
				z_index: 10000,
			});
		}
			}
			});
		}
	
			
	/** Getting request as status change */
			
		$('#m_form_name').on('change', function () {
			// shortcode to datatable.getDataSourceParam('query');
			lv_status = $(this).val();
			if(lv_status ==''){
				 $("#ajax_data").tabulator("clearFilter");
			}
			else{
				$("#ajax_data").tabulator("setFilter", "lv_status",'=',lv_status);
			}
			
		});		
			
	
			
			
			
	$(document).ready(function(){
       $('[data-toggle="m-popover"]').popover(); 
    });		 
			
			</script>
	</body>
	<!-- end::Body -->
	
	</html>