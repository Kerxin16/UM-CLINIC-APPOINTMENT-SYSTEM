
<?php

function lastChat($id_1, $id_2, $conn){
    $sql = "SELECT message FROM chats WHERE (from_id=? AND to_id=?) OR (to_id=? AND from_id=?) ORDER BY chat_id DESC LIMIT 1";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("iiii", $id_1, $id_2, $id_1, $id_2);

    // Execute the statement
    $stmt->execute();

    // Store the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $chat = $result->fetch_assoc();
        return $chat['message'];
    } else {
        return ''; // Return an empty string when no chat is found
    }

}
