<?php

/* This is POST request in order to delete user
 *
 */
include "db.php";
include "config.php";

if (isset($_POST["email"]) && isset($_POST["token"]) && $_POST["email"] && $_POST["token"]
) {
    $email = $_POST["email"];
    $token = $_POST["token"];
}
else {
    echo "Incorrect request";
    die();
}


if ($token == $mastertoken) {
    $sql    = "SELECT * FROM users WHERE email = '" . $email . "' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row    = $result->fetch_assoc();
        $userId = $row["id"];
        $sql    = "DELETE FROM users WHERE id=" . $userId;

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully";
        }
        else {
            echo "Error deleting user: " . $conn->error;
        }
    }
    else {
        echo "No user found";
    }
}
else {
    echo "Incorrect token";
}
$conn->close();
?>
