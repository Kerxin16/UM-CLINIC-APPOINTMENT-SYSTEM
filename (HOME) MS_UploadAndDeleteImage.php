<?php
$Title='Home';
include_once("(1) NavBar(MS).php");
?>

<!DOCTYPE html>
<html>
<head>
	<style>
     /*Background Color */
     .body{
      background-color:#c2d6d6;
    }
    
    /*Make whole document center*/
    .centered {
      padding: 0;  
      margin-left: 50px;  
      margin-right: 50px;  
      box-sizing: border-box;  
  }

  
 /* Back button*/
 .btn{
    background:#669999;
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:20px;
    height:40px;
    border-radius: 100px;
    width:150px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

  /*Input Field*/
  .chooseFile{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
        font-size: 18px;
		color:white;
      }

	  .uploadFile{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
        font-size: 18px;
      }

	  .uploadFileBackgrounf{
      background-color:#669999;
   }


   .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    }

	/*Display Image*/
	.album {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
			background-color:#a3c2c2;
		}
		.alb {
			width: 550px;
			height: 500px;
			padding: 5px;
		}
		.alb img {
			width: 95%;
			height: 85%;
		}
		a {
			text-decoration: none;
			color: black;
		}

		/*Delete Button */
		.red{
    color:#dc3545;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #dc3545;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
}

.red:hover{
    border: 1px solid black;
    color:black;
}

/*Reminder */
.reminder{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
  font-size: 20px;
  color:black;
  background-color:#d9f2e6; 
  border-radius:20px;
  border:1px solid #b30000;
  height:60px;
  display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      width:1850px;

      position: absolute;
            left: 50%;
            transform: translate(-50%, 0%);
}

	</style>
</head>
<body class="body">
<br><br><br>
<div class="centered">
	<!--Back Button-->
<form id="form" action="(HOME) MS_BackHomePage.php" method="post"  >
	<br>
  <button type="submit"   class="btn" name="back" id="back" style="      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:20px;border-radius: 100px;cursor: pointer; width:150px;">Back</button>
</form>
<br>
	<br>
	  <!--Reminder-->
<div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: Only the latest 9 images will be shown in the homepage.
</div>
	<br>
	<br>
	<br>
	<br>

	<!--Upload Image-->
    <form action="(HOME) c.upload.php" method="post"enctype="multipart/form-data" class="uploadFileBackgrounf">
	<table>
		<tr style="height:20px"></tr>
		<tr class="Upload">
			<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
      <td><input type="file" id="myImageInput" class="chooseFile" name="my_image" onchange="checkFile()"></td>           
      <td><input type="submit" id="submitBtn" class="uploadFile" name="submit" value="Upload" disabled></td>	</tr>
	<tr style="height:20px"></tr>
	</table>
     </form>

	 <!--Display and delete image-->
	<div class="album">
	 <?php 
          $sql = "SELECT * FROM img ORDER BY id DESC";
          $res = mysqli_query($conn,  $sql);
		  $i=0;
          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  
				$i++;
				?>
             <div class="alb">
             	<img src="ClinicImages/<?=$images['img']?>">
               <?php
                echo "<br><br><div class='headerCentered'><a class='red' href='#' onclick=\"confirmDelete('".$images['img']."')\">Delete</a></div>";
                ?>
							  
				</div>
				 
			 <br>
    <?php } }else{
		echo "<span style=\"color:#669999;font-size:20px;        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Image has been uploaded</b></span>";


	}?>
			</div>
			<br><br>  <br><br>  
</div>
</body>
</html>


<script>
function checkFile() {
  var fileInput = document.getElementById('myImageInput');
  var submitButton = document.getElementById('submitBtn');

  // Enable the submit button if a file is selected, otherwise disable it
  submitButton.disabled = !fileInput.value;
}


function confirmDelete(imgUrl) {
  var result = confirm("Are you sure you want to delete this image?");
  if (result) {
    // If the user clicks "OK", redirect to the delete page
    window.location.href = "(HOME) c.deleteImage.php?img=" + imgUrl;
  }
}
</script>
