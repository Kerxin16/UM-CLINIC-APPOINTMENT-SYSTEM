<!--Insert Data Into Database For UM Community registration-->

<?php
$UM_Community_FullName = filter_input(INPUT_POST, 'UM_Community_FullName');
$UM_Community_Email = filter_input(INPUT_POST, 'UM_Community_Email');
$UM_Community_Phone = filter_input(INPUT_POST, 'UM_Community_Phone');
$UM_Community_Gender = filter_input(INPUT_POST, 'UM_Community_Gender');
$UM_Community_Birthdate = filter_input(INPUT_POST, 'UM_Community_Birthdate');
$UM_Community_Address = filter_input(INPUT_POST, 'UM_Community_Address');
$UM_Community_Nationality = filter_input(INPUT_POST, 'UM_Community_Nationality');
$UM_Community_IC = filter_input(INPUT_POST, 'UM_Community_IC');
$UM_Community_Role = filter_input(INPUT_POST, 'UM_Community_Role');
$UM_Community_Password = filter_input(INPUT_POST, 'UM_Community_Password');
$UM_Community_Password_Confirmation = filter_input(INPUT_POST, 'UM_Community_Password_Confirmation');


// Create connection
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

//  Check Email Validity
$validityEmail = mysqli_query($conn, "SELECT * FROM um_community WHERE UM_Community_Email = '$UM_Community_Email'");
$fetch = mysqli_fetch_assoc($validityEmail);
$num=mysqli_num_rows($validityEmail);

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else if ( $UM_Community_Password==$UM_Community_Password_Confirmation){

   if($num == 0){
      //Email Not Exist

      //um community
      $sql = "INSERT INTO um_community (UM_Community_FullName,UM_Community_Email,UM_Community_Phone,UM_Community_Gender,
      UM_Community_Birthdate,UM_Community_Address,UM_Community_Nationality,UM_Community_IC,UM_Community_Role,UM_Community_Password,UM_Community_Password_Confirmation)
      values ('$UM_Community_FullName','$UM_Community_Email','$UM_Community_Phone','$UM_Community_Gender','$UM_Community_Birthdate'
      ,'$UM_Community_Address','$UM_Community_Nationality','$UM_Community_IC','$UM_Community_Role','$UM_Community_Password','$UM_Community_Password_Confirmation')";

      //user
      $usersql = "INSERT INTO users (username,user_email,user_IC)
      values ('$UM_Community_FullName','$UM_Community_Email','$UM_Community_IC')";
   
         if ($conn->query($sql) && $conn->query($usersql) ){
         /*Pop up alert message and redirect to the login page */
         echo("<script> alert('Account Registered Successfully'); window.location.href='index.php'; </script>");
         } else{
            echo "Error: ". $sql ."
            ". $conn->error;
         }

          $conn->close();
      }else if($num>0){
         //Email Already Exist

         echo("<script> alert('Registration Not Success. Email Has Been Registered. Please Try Again With Another Email');window.location.href='(1) Registration-UM Community.php'; </script>");
         $conn->close();
      }
}else if ( $UM_Community_Password!=$UM_Community_Password_Confirmation){
   //Password Not Same Error
   echo("<script> alert('Password Not Same. Please Try Again');window.location.href='(1) Registration-UM Community.php'; </script>");

}
?>























