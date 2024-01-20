<?php
 $Title='Home';
 include_once("(1) NavBar(MS).php");
 
// Connect to the database (modify the connection parameters)
$conn = mysqli_connect('localhost:3307','root','1234','um_healthcare_system') or die("Could not Connect My Sql");

$email=$_SESSION['email'];

//Fetch UserName
$queryName = "SELECT * FROM clinic_staff WHERE Clinic_Staff_Email = '$email'";
$retrieveName = mysqli_query($conn,  $queryName);
$Name = mysqli_fetch_assoc($retrieveName);

// Fetch image data from the database
$query ="SELECT * FROM img ORDER BY id DESC limit 9";
$res = mysqli_query($conn,  $query);

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

  .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    }
  
    /* Add your CSS styles here */
.slideshow-container {
    max-width: 100%;
    position: relative;
    margin: auto;
    background-color:#a3c2c2;
}

.mySlides {
    display: none;
    text-align: center;
}

.img {
    max-width: 100%;
    height: 500px;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: #333;
    font-weight: bold;
    font-size: 30px;
}

.prev {
    left: 0;
}

.next {
    right: 0;
}

.prev:hover, .next:hover {
  color: white;
  text-decoration: none;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #a6a6a6;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

 /*Edit button */
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

  /*Display Images */

		.alb {
			width: 1900px;
			height: 500px;
			padding: 5px;
      padding-left:400px;
      padding-right:400px;
		}
		.alb img {
			width: 90%;
			height: 100%;
		}

    /*Information Corner */
    .corner{
      border: 15px solid  #424b57
    }
  
    .marquee{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
font-size: 20px;
direction:left;
width:400px;
border: 2px solid #424b57;
border-radius: 20px;
}

</style>
</head>
<body class="body">
<br><br><br><br>
<div class="headerCentered">
<marquee class="marquee" scrolldelay="150"> Welcome <?php echo"".$Name['Clinic_Staff_Name'].""?>&nbsp;
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5M7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5"/>
</svg>
</marquee> </div><br>
    <div class="slideshow-container">

    <form action="(HOME) MS_UploadAndDeleteImage.php" method="POST">
    <div class="centered">
        <br>
<button type="submit" class="btn" name="edit">Edit</button>
</div>
</form>

        <br> 
        <div >
        <br>
        <?php 
         if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)){?>
            <div class="mySlides alb">
            <img class="img" src="ClinicImages/<?= $images['img']?>" >
        </div>
        <?php } }?>
          <br>
        <div style="text-align:center">
      <?php for($i=0; $i<mysqli_num_rows($res);$i++){?>
  <span class="dot" onclick="currentSlide(1)"></span> 
  <?php } ?>
  <br> <br>
</div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
       
    </div>
      </div>
      <br><br><br>

   <script>
    var slideIndex = 1;

showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";

    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  dots[slideIndex-1].className += " active";
}
    </script>

<br>
<!--Information Board-->
<form action="(HOME) MS_AddInfo.php" method="POST">

<div class="centered">
        <br>
<button type="submit" class="btn" name="addinfomation">Add Info</button>
<br>
</div>

</form>


<div class="headerCentered">
<Header class=headerCentered>
  <h2 style=" font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><b>Information Corner</b></h2>
  </Header>
<iframe  class="corner" src="(HOME) MS_DisplayInfo.php" width="1850px" height="600px"></iframe> 
</div>


</body>
</html>
