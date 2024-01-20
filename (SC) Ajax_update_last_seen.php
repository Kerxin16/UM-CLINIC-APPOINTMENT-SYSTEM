<?php  

session_start();

# check if the user is logged in
if (isset($_SESSION['email'])) {
	
	# database connection file
	include '(SC) dbConnection.php';

	# get the logged in user's username from SESSION
	$id = $_SESSION['user_id'];

	$sql = "UPDATE users SET user_last_seen = NOW() WHERE user_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

}