<?php

/* This is POST request in order to create a new game
 *
 */
include "db.php";
include "config.php";


if (isset($_POST["playerX"]) && isset($_POST["playerO"]) && isset($_POST["token"])
        && $_POST["playerX"] && $_POST["playerO"] && $_POST["token"]
) {
    $playerX = $_POST["playerX"];
    $playerO = $_POST["playerO"];
    $token   = $_POST["token"];
}
else {
    echo "Incorrect request";
    die();
}


if ($token == $mastertoken) {

    $sql = "INSERT INTO game (playerX, playerO)
VALUES ('$playerX', '$playerO')";

    if ($conn->query($sql) === TRUE) {
        echo "New game created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "Incorrect token";
}
$conn->close();
?>
