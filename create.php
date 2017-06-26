<?php

/* This is POST request in order to create a new user
 *
 */
include "db.php";
include "config.php";


if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["token"])
        && $_POST["email"] && $_POST["password"] && $_POST["token"]
) {
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $token    = $_POST["token"];
}
else {
    echo "Incorrect request";
    die();
}


if ($token == $mastertoken) {
    $sql    = "SELECT * FROM users WHERE email='" . $email . "'LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "User exists";
    }
    else {
        $usertoken = md5(time());
        $sql       = "INSERT INTO users (email, password, token)
VALUES ('$email', '$password', '$usertoken')";

        if ($conn->query($sql) === TRUE) {
            echo "New user created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
else {
    echo "Incorrect token";
}
$conn->close();
?>
