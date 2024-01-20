<?php


// Create connection
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the content from the request
$data = json_decode(file_get_contents('php://input'));
$content = $data->content;

// Insert the content into the database
$sql = "INSERT INTO home_info(home_info_content) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $content);


if ($stmt->execute()) {
    echo"alert('Infomation is added successfully.');window.location.href='(HOME) MS_AddInfo.php'; ";
} else {
    echo"try";
    $response = array("success" => false);
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>