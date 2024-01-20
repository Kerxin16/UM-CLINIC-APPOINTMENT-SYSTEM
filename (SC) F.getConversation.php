
<?php

function getConversation($user_id, $conn){
    /**
      Getting all the conversations 
      for the current (logged-in) user
    **/
    $sql = "SELECT * FROM conversations
            WHERE user_1=? OR user_2=?
            ORDER BY conversation_id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $conversations = $result->fetch_all(MYSQLI_ASSOC);

        /**
          creating an empty array to 
          store the user conversation
        **/
        $user_data = [];
        
        # looping through the conversations
        foreach($conversations as $conversation){
            # if conversations user_1 row is equal to user_id
            $other_user_id = ($conversation['user_1'] == $user_id) ? $conversation['user_2'] : $conversation['user_1'];

            $sql2  = "SELECT *
                      FROM users WHERE user_id=?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("i", $other_user_id);
            $stmt2->execute();

            $result2 = $stmt2->get_result();

            $user_details = $result2->fetch_assoc();

            # pushing the data into the array 
            array_push($user_data, $user_details);
        }

        return $user_data;

    } else {
        $conversations = [];
        return $conversations;
    }  
}
?>