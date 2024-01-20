<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>


  .text{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:18px;
  }



</style>
</head>
<body>
<?php
session_start();
$email=$_SESSION['email'];

# check if the user is logged in
if (isset($_SESSION['email'])) {
    # check if the key is submitted
    if(isset($_POST['key'])){
       # database connection file
	   include '(SC) dbConnection.php';

	   # creating simple search algorithm :) 
	   $key = "%{$_POST['key']}%";  

       $sql = "SELECT * FROM users WHERE username LIKE ? OR user_IC LIKE ?";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$key,$key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {
         	if ($user['user_id'] == $_SESSION['user_id']) continue;
       ?>
       <li class="list-group-item">
		<a href="(SC) chat.php?user=<?=$user['user_email']?>"
		   class="d-flex justify-content-between align-items-center p-2">
			<div class="d-flex align-items-center">

			    <h3 class="text">
					<?=$user['username']?>
			    </h3>  

			</div>
		 </a>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           The user "<?=htmlspecialchars($_POST['key'])?>"is  not found.
		</div>
    <?php }
    }

}
?><br><br>
</body>
</html>