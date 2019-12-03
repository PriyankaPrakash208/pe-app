<!DOCTYPE html>
<html>
	<head>
	</head>
	<body >
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js">
		</script>
     
      
     <div>
        <form id="test_form" type="POST" action="./getAllAttendDet">
     		<div id="users_list"><input onclick="viewall_users()" placeholder="select Users"></div>
     		<div>	 
			<p>
   				Date From: <input type="text" id="datepicker1" name="from_date">
    		</p>
    		<p>
   				Date To: <input type="text" id="datepicker2" name="to_date">
    		</p>
     		</div>
     		<button onclick="get_all_det()">Submit</button>
     	</form>
     	<br/>
     	<div id="details"></div>
     </div>
	
	<script>
		$( "#datepicker1" ).datepicker({
		dateFormat: "dd-mm-yy"}).datepicker("setDate", new Date());
		$( "#datepicker2" ).datepicker({
		dateFormat: "dd-mm-yy"}).datepicker("setDate", new Date());
		
		
//Starts drop down for userlist
		function viewall_users(){ 
			$.ajax({
				url:'getUsers',
				type:'post',
				dataType:'json',
				success:function(data){
					//console.log(data.users[0].user_id);
					list   = '';
//					list   = '<select>';
					list  += "<select name='users'><option>Select Users</option>";
					for(var i=0,len = data.users.length;i<len;i++){
						list  += "<option value="+data.users[i].user_id+">"+data.users[i].fullname+"</option>";
					}
					list  += "</select>";
					$('#users_list').html(list);
				}
			});
			
		}
//ends drop down for userlist
		
//Form submit starts
function get_all_det(){
	$('#test_form').ajaxForm({
	type:'post',
	dataType:'json',
	success:function(response, status, xhr, $form){ 
//		console.log(response.users[0].user_id); 
		console.log(response); 
//		alert(response.users);
		
		$('#details').html(response);
	}
});
}

//Form submit ends
	</script>
	</body>
</html>

