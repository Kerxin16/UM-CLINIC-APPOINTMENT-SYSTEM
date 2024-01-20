<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <style>
    /* Make whole document located at center*/
    .centered {
      margin: auto;
      width: 60%;
      padding: 30px;
      background-color: #373f49;
;
    }

    /*Table Space for registration*/
    .TableSpace{
      padding-left: 15px;
      padding-bottom: 10px;
    }


    /* Registration Text*/
    .headerCentered {
      text-align: center;
      position: relative;
      font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
    }

    /* Table Center*/
    table {
      margin-left: auto; 
      margin-right: auto;

    }


    /*Make the input box corner round*/
    .rcornerhalf {
      border-radius: 25px;
      border-color: whitesmoke;
      padding: 20px; 
      width:300px;
      height: 15px; 
      background-color:#b6bec8;
      color: black;
    }

    .rcornerOneThird{
      border-radius: 25px;
      border-color: whitesmoke;
      padding: 20px; 
      width:200px;
      height: 15px; 
      background-color:#b6bec8;
      color: black;
    }

    .rcorner{
      border-radius: 25px;
      border-color: whitesmoke;
      padding: 20px; 
      width:600px;
      height: 15px; 
      background-color:#b6bec8;
      color: black;
    }

    .rcornerforSelectorHalf{
      border-radius: 25px;
      border-color: whitesmoke;
      width:300px;
      height: 40px;
      padding-left: 20px;  
      color: black;
      background-color: #b6bec8;
    }

    .rcornerforSelector{
      border-radius: 25px;
      border-color: whitesmoke;
      width:600px;
      height: 40px;
      padding-left: 20px;  
      color: black;
      background-color: #b6bec8;
    }

    .try{
      border-radius: 25px;
      border-color: whitesmoke;
      width:600px;
      height: 40px;
      padding-left: 20px;  
      color: #476b6b;
      background-color: #b6bec8;
    }

    /*Color Of Placeholder */
    input[type="text"]::placeholder{
      color: #476b6b;
     
    }

    input[type="email"]::placeholder{
      color: #476b6b;
    }

    input[type="password"]::placeholder{
      color: #476b6b;
    }

    /*Focus */
    input[type="text"]:focus{
      background-color : #424b57; 
      color: white;
      border-color: white;

    }

    input[type="email"]:focus{
      background-color : #424b57; 
      color: white;
      border-color: white;
    }

    select:focus{
      background-color : #424b57; 
      color: white;
      border-color: white;
    }
    
    input[type="submit"]:focus{
      background-color : #424b57; 
      color: white;
      border-color: white;
    }

    input[type="password"]:focus{
      background-color : #424b57; 
      color: white;
      border-color: white;
    }


    /*Button*/
    .btn{
      background: #7c8a9c;
      outline:none;
      cursor: pointer;
      font-size:22px;
      font-weight: 500;
      border-radius: 30px;
      font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
      color: white;
    }
  
</style>  
<title>University Malaya Healthcare Registration</title>
    <link rel="icon" href="/images/UniversityOfMalaya.jpg">
</head>

<body class="centered">
<!--Registration Form For UM Community-->

<form action="(1) C.Registration-UM Community.php" method="post">
<header >
    <h1 class= headerCentered style="color:#c2d6d6" > REGISTRATION</h1>
</header>
<br>
<br>

<!--Content-->
<table class="center" style="color:#c2d6d6">

<tr >
  <td class=TableSpace ><span style="color:#527a7a">1.</span>Full Name </td>
</tr>
<tr>
  <td>
    <input type="text" class="rcorner"  id ="UM_Community_FullName" name="UM_Community_FullName" placeholder="Enter Full Name" required></td>
</tr>

<!--Create Space between rowa-->
<tr height=30px>
  </tr>

  <tr>
<td class=TableSpace ><span style="color:#527a7a">2.</span> Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span style="color:#527a7a">3.</span> Phone Number</td>


<tr>
  <td>
  <input type="email" class="rcornerhalf"  id ="age" name="UM_Community_Email" placeholder="Enter Email Address" required>
  <input type="text" class="rcornerhalf"  id ="age" name="UM_Community_Phone" placeholder="Enter Phone Number" required></td>
</tr>

<tr height=30px>
  </tr>

  <td class=TableSpace ><span style="color:#527a7a">4.</span> Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span style="color:#527a7a">5.</span> Birthday</td>


<tr>
  <td>
  <select class="rcornerforSelectorHalf" name="UM_Community_Gender" required>
  <option  disabled selected value>Select Your Gender</option>   
    <option id="Male" value="Male"><label for="Male" >Male</label></option>
    <option id="Female" value="Female" ><label for="Female" >Female</label></option>
  </select>
  <input type="date" class="rcornerhalf" name="UM_Community_Birthdate" id="UM_Community_Birthdate" placeholder="Enter Age"required/>      
</td>
</tr>

<tr height=30px>
  </tr>

  <td class=TableSpace ><span style="color:#527a7a">6.</span> Address </td>
</tr>
<tr>
  <td><input type="text" class="rcorner"  id ="UM_Community_Address" name="UM_Community_Address" placeholder="Enter Address" required></td>
</tr>

<tr height=30px>
  </tr>

<tr >
<td class=TableSpace ><span style="color:#527a7a">7.</span> Nationality</td>
</tr>
<tr>
  <td>
  <input type="text" class="rcorner"  id ="UM_Community_Nationality" name="UM_Community_Nationality" placeholder="Enter Nationality" required></td>
</tr>

<tr height=30px>
  </tr>

  <tr >
<td class=TableSpace ><span style="color:#527a7a">8.</span>Identity Card Number / Passport Number (Foreigner)</td>
</tr>
<tr>
  <td>
  <input type="text" class="rcorner"  id ="UM_Community_IC" name="UM_Community_IC" placeholder="Enter Identification Credential" required></td>
</tr>

<tr height=30px>
  </tr>

<tr >
<td class=TableSpace ><span style="color:#527a7a">9.</span> Select Role</td>
</tr>
<tr><td>
  <select class="rcornerforSelector" name="UM_Community_Role" required>
    <option  disabled selected value>Select Role</option>   
    <option id="University Of Malaya Student" value="University Of Malaya Student"><label for="University Of Malaya Student" >University Of Malaya Student</label></option>
    <option id="University Of Malaya Staff" value="University Of Malaya Staff"><label for="University Of Malaya Staff" >University Of Malaya Staff</label></option>
  </select></td>
</tr>

<tr height=30px>
  </tr>


<tr>
<td class=TableSpace ><span style="color:#527a7a">10.</span> Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span style="color:#527a7a">11.</span> Password Confirmation</td>


<tr>
  <td>
  <input type="password" class="rcornerhalf"  id ="UM_Community_Password" name="UM_Community_Password" placeholder="Enter Password" required>
  <input type="password" class="rcornerhalf"  id ="UM_Community_Password_Confirmation" name="UM_Community_Password_Confirmation" placeholder="Password Confirmation" required></td>
</tr>

<tr height=30px>
  </tr>



</table>
<br>
<br>
<div class="d-grid gap-2 col-3 mx-auto">
  <button type="submit" class=btn name="Registration Of UM Community" id="Registration Of UM Community">Register</button>
</div>

</form>

<br>

</body>
</html>

