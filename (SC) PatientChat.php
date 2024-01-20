<?php 
   $Title='Support Chat';
	include_once("(1) NavBar(Patient).php");
 	 $email=$_SESSION['email']; 


  if (isset($email)) {
	$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');


  	//include '(SC) F.getUser.php';
  	include '(SC) F.chat.php';
  	include '(SC) F.opened.php';
  	include '(SC) F.timeAgo.php';

  	if (!isset($_GET['user'])) {
  		header("Location: (SC) PatientHome.php");
  		exit;
  	}

	  $A=$_GET['user'];

		//Get user info
		$query = "SELECT * FROM users WHERE user_email='$A'";
		$run = mysqli_query($conn,$query); 
		$chatWith = mysqli_fetch_assoc($run);

  	# Getting User data 
  	//$chatWith = getUser($_GET['user'], $conn);

  	if (empty($chatWith)) {
  		header("Location: (SC) PatientHome.php");
  		exit;
  	}

  	$chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);


  	opened($chatWith['user_id'], $conn, $chats);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	/*Background Color */
	.body{
      background-color:#c2d6d6;
    }

    /*Make whole document center*/
    .centered{
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);
      }

/*Background of the form*/
  .content {
   padding: 0 18px;
   background-color: #a3c2c2;
   width:1000px;

   }

/*Search and reset button */
.btn{
    background:#424b57;
    color:#c2d6d6;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:18px;
    height:40px;
    border-radius: 0px;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;
  }

  .text{
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:18px;
  }
  
a {
	text-decoration: none;
}

.online {
	width: 10px;
	height: 10px;
	background: green;
	border-radius: 50%;
}


small {
	color: #bbb;
	text-align: right;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:11px;
}
.chat-box {
	overflow-y: auto;
	overflow-x: hidden;
	max-height: 50vh;
}
.rtext {
	width: 55%;
	background: #f8f9fa;
	color: #444;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:18px;
}

.ltext {
	width: 55%;
	background: rgb(107, 167, 181);
	color: #fff;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:18px;
}

/* width */
*::-webkit-scrollbar {
  width: 6px;
}

/* Track */
*::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
  background: #aaa;
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
  background: #3289c8;
}

textarea {
	resize: none;
}

/*message_status*/
</style>
</head>
<body class="body">
<div class="centered">
<br><br><br><br>
    <div class="content">
    	<a href="(SC) PatientHome.php" class="fs-4 link-dark" ><span style="font-size:35px;">&#8592;</span></a>

               <div class="text">
               	  <?=$chatWith['username']?> <br>
               	  <div class="d-flex align-items-center" title="online">
               	    <?php
                        if (last_seen($chatWith['user_last_seen']) == "Active") {
               	    ?>
               	        <div class="online"></div>
               	        <small class="d-block p-1">Online</small>
               	  	<?php }else{ ?>
               	         <div style="	  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:15px;color:#424b57">
               	         	Last seen:
               	         	<?=last_seen($chatWith['user_last_seen'])?>
					</div>
               	  	<?php } ?>
               	  </div><br>
					</div>
	
				<div class="shadow p-4 rounded d-flex flex-column mt-2 chat-box"
    	        id="chatBox">
    	        <?php 
                     if (!empty($chats)) {
                     foreach($chats as $chat){
                     	if($chat['from_id'] == $_SESSION['user_id'])
                     	{ ?>
						<p class="rtext align-self-end border rounded p-2 mb-1">
						    <?=$chat['message']?> 
						    <small class="d-block">
						    	<?=$chat['created_at']?>
						    </small>      	
						</p>
                    <?php }else{ ?>
					<p class="ltext border 
					         rounded p-2 mb-1">
					    <?=$chat['message']?> 
					    <small class="d-block">
					    	<?=$chat['created_at']?>
					    </small>      	
					</p>
                    <?php } 
                     }	
    	        }else{ ?>
				<div class="text">
               <div class="alert alert-info text-center">
				   <i class="fa fa-comments d-block fs-big"></i>
	               No messages yet, Start the conversation
			   </div>
				</div>
    	   	<?php } ?>
    	   </div>
    	   <div class="input-group mb-3">
    	   	   <textarea style="font-size:16px;height:40px;" cols="3" id="message" class="form-control"></textarea>
    	   	   <button class="btn btn-primary" id="sendBtn">
    	   	   	  <i class="fa fa-paper-plane"></i>
    	   	   </button>
    	   </div><br>

    </div>
    </div>
</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("(SC) Ajax_insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("(SC) Ajax_update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("(SC) Ajax_getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
 </body>
 </html>
<?php
  }
 ?>