<?php 
  $Title='Support Chat';
  include_once("(1) NavBar(Patient).php");
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

  $email=$_SESSION['email']; 
  $id=$_SESSION['user_id'];


  if (isset($email)) {
    //include '(SC) F.getUser.php';
    include '(SC) F.getConversation.php';
	include '(SC) F.last_chat.php';
	include '(SC) F.timeAgo.php';

  	# Getting User data data
  	//$user = getUser($email, $conn);

	//Get user info
	$query = "SELECT * FROM users WHERE user_email='$email'";
	$run = mysqli_query($conn,$query); 
	$user = mysqli_fetch_assoc($run);
	
  	# Getting User conversations
  	$conversations = getConversation($user['user_id'], $conn);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

/*Input Field*/
.inputField{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
        font-size: 16px;
         border-radius: 15px;
         border:1px ;
         height:35px;
         background-color: #e6e6e6;
      }

/*Focus */
input[type="text"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
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

.online {
	width: 10px;
	height: 10px;
	background: green;
	border-radius: 50%;
}

.notification{
  float:right;
  color: white;
  background-color: red;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:20px;
    border-radius: 50%;
    text-align: center;
    line-height: 30px;
    width: 30px; /* Set a fixed width */
}


</style>
</head>
<body class="body">

	<div class="centered">
		<br><br><br>

		<div class="content">
			<br><br>
		
		<!--Name-->
    <h3 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; "><b>&nbsp;<?=$user['username']?></b></h3> <br>

		<!--Search-->
    		<div>
    			<input type="text" placeholder="Search with IC/name" id="searchText" style="  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:910px; height:40px;;" class="inputField">
    			<button class="btn btn-primary" id="searchBtn"><i class="fa fa-search"></i>	</button>       
    		</div>
			<br>
			
    		<ul id="chatList" class="list-group mvh-50 overflow-auto">
				
    			<?php if (!empty($conversations)) { 
    			    foreach ($conversations as $conversation){ ?>
	    			<li class="list-group-item">
	    				<a href="(SC) PatientChat.php?user=<?=$conversation['user_email']?>">
						
	    					    <h3 class="text">
	    					    	<?=$conversation['username']?>
                      <div class="notification">
                      <?php
                      $queryNotification= "SELECT * FROM chats WHERE from_id=".$conversation['user_id']." AND to_id=".$user['user_id']." AND opened=0";
                      $runNotification = mysqli_query($conn,$queryNotification); 
                      $i=0;  
                      if ($numNotification = mysqli_num_rows($runNotification)>0) {  
                       while ($notice= mysqli_fetch_assoc($runNotification)) {
                          $i++;
                        }
                        echo"&nbsp;$i&nbsp;";
                      }
                        ?>
                        </div>
                      <br>
                      </h3>  </a>              
                      <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:14px;color:#8c8c8c">
                        <?php 
                          echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                        ?>
                      </span>
        	

	    					<?php if (last_seen($conversation['user_last_seen']) == "Active") { ?>
		    					<div title="online">
		    						<div class="online"></div>
		    					</div>
	    					<?php } ?>
	    				</a>
	    			</li>
    			    <?php } 
    					}
					else{ ?>
    				<div class="alert alert-info text-center">
						<div class="text">
					   <i class="fa fa-comments d-block fs-big"></i>
                       No messages yet, Start the conversation
					</div>
					</div>
    			<?php } ?>
				<br>
				<br>
    		</ul>
 
	  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){

       // Search using the button
       $("#searchBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('(SC) Patient_Ajax_search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
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

    });
</script>
</div>
</div>
</body>
</html>
<?php
  }
 ?>