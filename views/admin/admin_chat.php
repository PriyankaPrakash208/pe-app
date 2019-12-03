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
		<link href="<?php echo base_url();?>assets/assets/select2/dist/css/select2.min.css">
		
<!--		test codes-->
 
 
  

<!--		test codes-->
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/user/favicon.ico"/>
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
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
											<img width="170" alt="" src="<?php echo base_url();?>assets/media/logos/logo-2.png"/>
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
												<a href="<?php echo base_url();?>admin/home" class="m-nav__link">
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


			<!--						Project Room -->
	<div class="row">
		<div class="col-md-12" style="padding: 0 50px">
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
								<div class="inner-right-side">
									<!-- <i class="la la-group" style="padding: 8px 10px;background: #e4e4e4;color: #07b958;"></i> <strong>PROJECT ROOMS</strong> -->
									<hr style="margin-top: 0;background: #f3fcff;" />
									<div class="m-demo__preview" id="listAllRooms" >

									</div>
									<!-- <div class="m-demo__preview" id="TeamRooms" >

									</div> -->
								</div>
								<br />
								<div class="inner-right-side">
									<!-- <i class="la la-group" style="padding: 8px 10px;background: #e4e4e4;color: #07b958;"></i> <strong>CHAT ROOMS</strong> -->
									<hr style="margin-top: 0;background: #f3fcff;" />
									<div class="m-demo__preview" id="listAllTeamRooms" >

									</div>
									<!-- <div class="m-demo__preview" id="TeamRooms" >

									</div> -->
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php include_once('chat_widget.php') ?>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/vendor/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/form-controls.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/user_custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/chat-widget.js" type="text/javascript"></script>
		<!-- <Iframe style="display: none;" src="<?php echo base_url();?>firebase.php" width="300" height="600"></Iframe> -->
		<!-- <div >
			<?php require_once('firebase.php') ?>
		</div> -->	
	
	<!-- end::Body -->


<script>

	var chatRoom_a = [];
	var scrollFlag = false;
	var globalPage = 1;
	var chatType;
	var chatImage_a = [];
	var chatImageNull_a = [];
	var selectedChat;

	/*RefreshProjectRoom();
	doUpdate();*/
	var listElm = document.querySelector('.inner-left-side');
	var page = globalPage;
	listElm.addEventListener('scroll', function() {
		if (listElm.scrollTop  == 0 && (globalPage !=0 && scrollFlag == true)) {
			console.log("listElm.scrollHeight:"+listElm.scrollTop);
			page = globalPage+9;
			doUpdate(page);
			// $(".m-project").scrollTop(10);
		}
	});

	
	function newMessageFromGroup(data){
		console.log(data);

		var audio = new Audio('<?php echo base_url(); ?>assets/sound/notify.mp3');
		audio.play();

		if(selectedChat != data.room_id){
			return false;
		}

		var thumbnail = "<?php echo base_url(); ?>assets/img/user/avatar.png";

		if((chatImage_a.includes(data.emp_id) == false) && (chatImageNull_a.includes(data.emp_id) == false))
		{
			if(file_exists("<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg") == true){
				chatImage_a.push(data.emp_id);
				thumbnail = "<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg";
			}else{
				chatImageNull_a.push(data.emp_id);
			}
		}else if(chatImageNull_a.includes(data.emp_id) == false){
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

	function FetchAllRooms(tab){
		saveToken();
		/*$(".inner-right-side").hide();
		$("#"+tab).show();*/
		$(".m-project").html('<div class="cssload-container"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></div></div>');
		$('#listAllRooms').html('<div class="cssload-container"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></div></div>');
			 		$.ajax({type:'POST',	url:'<?php echo base_url(); ?>Project_room/getallrooms',dataType:'json',success:function(data) {
						 console.log(data);
			 			$('#listAllRooms').html('');
			 			$('#listAllTeamRooms').html('');
			 			var count_flag = 1;
			 			var dataLength = data.prRoom.length;
						data.prRoom.forEach(function(entry) {
							chatRoom_a.push(entry.pr_id);
							var color="45b0c3";
							if(entry.pru_status==1){
								$('.prroomid').val(entry.pr_id);
								color="2cca4f";
								// ChangeRoom(entry.pr_id, entry.type);	
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
					 		
					 		/*if(count == dataLength){

					 		}*/
    					 						 	
						});

						data.teRoom.forEach(function(entry) {
							var color="45b0c3";
							unread_count = '';
							if((entry.unread_count == null) || (entry.unread_count == 0)){
								unread_count = '<i class="la la-yelp"></i>';
							}else{
								unread_count = '<span class="m-badge m-badge--danger">'+entry.unread_count+'</span>';

							}
							var type = "'"+entry.type+"'";
							$('#listAllTeamRooms').append('<p><a href="javascript:;" id="chat-room-'+entry.team_id+'" style="color:#'+color+'" onclick="ChangeRoom('+entry.team_id+','+ type+')" > '+unread_count+'  &nbsp; <b> '+entry.name+' </b></a></p>');  
							ChangeRoom(entry.team_id, entry.type);
						});
						// $(".m-project").html('');
						// doUpdate(0); // call doUpdate only after load openedChatRoom.
				RefreshProjectRoom();
    						} // process results here       
			
   		  });
			
		// doUpdate();	
	}

	function ChangeRoom(pr_id, type){
		selectedChat = pr_id;
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
		 
	function doUpdate(page){		
		var pr_id=$('.prroomid').val();
				globalPage = page;
				globalPage++;
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
	    					var fullname = '';
	    					if(entry.fullname == null){
	    						fullname = entry.admin_name
	    					}else{
	    						fullname = entry.fullname;
	    					}
	    					 $('.m-project').prepend('\
	    					 	<div class="chats-others m-alert--icon m-alert alert alert-dismissible fade show" role="alert">\
	    					 		<div class="m-alert__icon">\
	    					 			<img src="'+thumbnail+'" alt="" class="mCS_img_loaded">\
	    					 		</div>\
	    					 		<div class="msg-body">\
	    					 			'+getEnableDeleteBtn(entry.pd_id, entry.own_message)+'\
	    					 			<p><strong>'+fullname+' | <small style="color: #93d1e4;">'+timeConverter(entry.pd_date)+'</small></strong>\
	    					 			</p>\
	    					 			<span style="line-height: 1.2;font-size: 13px;">'+msg+'</span>\
	    					 		</div>\
	    					 	</div>'); 

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
    				// ssetInterval(checkForNewMessage, 2000);
    				  // setTimeout(doUpdate,2000);
    						} // process results here       
			
   		  });
	/*    if($(".m-project > div").length<1){
	  	$(".m-project").html("<p >No history found</p>");
	  }*/
	    
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

							if((chatImage_a.includes(data.emp_id) == false) && (chatImageNull_a.includes(data.emp_id) == false))
							{
								if(file_exists("<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg") == true){
									chatImage_a.push(data.emp_id);
									thumbnail = "<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg";
								}else{
									chatImageNull_a.push(data.emp_id);
								}
							}else if(chatImageNull_a.includes(data.emp_id) == false){
								thumbnail = "<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg";
							}

	    					msg = entry.pd_msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
	    					var fullname = '';
	    					if(entry.fullname == null){
	    						fullname = entry.admin_name
	    					}else{
	    						fullname = entry.fullname;
	    					}
	    					 $('.m-project').append('\
	    					 	<div class="chats-others m-alert--icon m-alert alert alert-dismissible fade show" role="alert">\
	    					 		<div class="m-alert__icon">\
	    					 			<img src="'+thumbnail+'" alt="" class="mCS_img_loaded">\
	    					 		</div>\
	    					 		<div class="msg-body">\
	    					 			'+getEnableDeleteBtn(entry.pd_id, entry.own_message)+'\
	    					 			<p><strong>'+fullname+' | <small style="color: #93d1e4;">'+timeConverter(entry.pd_date)+'</small></strong>\
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
    				var thumbnail = "<?php echo base_url(); ?>assets/img/user/avatar.png";
	    					
					if(file_exists("<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg") == true){
						thumbnail = "<?php echo base_url(); ?>assets/img/user/"+data.emp_id+".jpg";
					}
    			msg = data.pd_msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
       		 $('.m-project').append('<div class="m-messenger__message m-messenger__message--in"><div class="m-messenger__message-pic"><img src="'+thumbnail+'" alt="" class="mCS_img_loaded"></div><div class="m-messenger__message-body">	<div class="m-messenger__message-arrow"></div><div class="m-messenger__message-content"><div class="m-messenger__message-username"><b>'+data.fullname+' </b><span class="m-link m-link--state m-link--info">Now</span></div><div class="m-messenger__message-text">'+msg+'</div></div></div></div>'); 
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

	$(document).ready(FetchAllRooms());
</script>

<script type="text/javascript">
	
	var Notification = {
		saveToken (token){

			if(token === null){
				Notification.loadFirebase();
				return false;
			}

			$.ajax({
	            type:'POST',
	            url:'<?php echo base_url(); ?>Project_room/saveNotification',
				data:{token: token},
	            dataType: "json",
	            contentType: "application/json",
	            success: Notification.successSaveToken,
	            error: Notification.apiError
	        });
		},

		successSaveToken(results){
			console.log(results);
		},

		apiError(error){
			console.log(error);
		},

		loadFirebase(){
			
			
			// console.log('loaded');
			// $("#firebase").load('firebase.html');
		}
	}
</script>
</body>
</html>
