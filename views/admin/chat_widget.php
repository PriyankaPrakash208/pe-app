	
	<!-- BOF Chat Widget -->
	<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
		<div class="m-quick-sidebar__content m--hide">
			<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
				<i class="la la-close"></i>
			</span>
			<div style="display: inline-block;">
				<ul style="" id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link " id="message-tab-link" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">
							<!-- Messages -->
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" onclick="Chat.getAllUsers()" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">
							Users
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link active" onclick="Chat.listChatHistory()" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">
							Chat History
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
					<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
						<small><p align="center" id="open-chat-person"></p></small>
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
								<textarea style="resize:none;" id="new-message" placeholder="Type here..." class="m-messenger__form-input"></textarea>
							</div>
							<div class="m-messenger__form-tools">
								<a href="javascript:void(0)" onclick="Chat.doSend()" class="m-messenger__form-attachment">
									<i class="flaticon-paper-plane"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane  " id="m_quick_sidebar_tabs_settings" role="tabpanel">
					

					<div class="m-list-timeline__items m-scrollable" id="users-list">
						<div class="m-list-settings__group">
							<a href="javascript:void(0)" class="m-list-settings__heading">
							</a>
						</div>
					</div>

					<div class="m-messenger__seperator"></div>
					
					<div class="users-list-search-container" >
						<div class="user-search" style="">
							<hr />
							<input type="text" id="search-user-widget" class="form-control" name="" style="width: 100%">
						</div>
					</div>

				</div>
				<div class="tab-pane active  m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">
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
	<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"; </script>
	<?php require_once('firebase.php') ?>
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
	<script type="text/javascript">

		function refreshChat(payload){
			console.clear();
			console.log(payload);
			var data = payload.data;
			
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

		function saveToken (){
			var tokenLocal = localStorage.getItem('token');

		    $.ajax({
    			type:'POST',
    			url:'<?php echo base_url(); ?>Project_room/saveNotification',
    			data:{token: tokenLocal},
    			dataType:'json', 
    			success:function(data) {
    				console.log(data);

				} // process results here       
			
   		 	});
		}
	
		
</script>