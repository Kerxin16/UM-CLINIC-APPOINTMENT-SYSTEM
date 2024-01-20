<?php

function opened($id_1, $conn, $chats){
    // Prepare the update statement outside the loop
    $sql = "UPDATE chats SET opened = 1 WHERE from_id=? AND chat_id = ?";
    $stmt = $conn->prepare($sql);

    foreach ($chats as $chat) {
        if ($chat['opened'] == 0) {
            $opened = 1;
            $chat_id = $chat['chat_id'];

            // Bind parameters and execute the statement inside the loop
            $stmt->bind_param("ii", $id_1, $chat_id);
            $stmt->execute();
        }
    }
}
?>