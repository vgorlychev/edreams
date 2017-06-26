<?php

/* This is POST request in order to do a move
 * Coordinates:
 * A|B|C
 * D|E|F
 * G|H|I
 * example:
 * move.php?gameId=1&coordinate=A&token=rgdgdgdfgdgdgd
 */
include "db.php";
include "config.php";
include "functions.php";


if (isset($_GET["coordinate"]) && isset($_GET["token"]) && isset($_GET["gameId"])
        && $_GET["coordinate"] && $_GET["token"] && $_GET["gameId"]
) {
    $coordinate = strtoupper($_GET["coordinate"]);
    $token      = $_GET["token"];
    $gameId     = $_GET["gameId"];

    $sql    = "SELECT * FROM users WHERE token='" . $token . "'LIMIT 1";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
    $userId = $row["id"];
    if (!$userId) {
        echo "Incorrect user data";
        die();
    }
}
else {
    echo "Incorrect request";
    die();
}
checkTurn($gameId);
$column = "cuad" . $coordinate;
$sql    = "SELECT * FROM game WHERE id='" . $gameId . "'LIMIT 1";
$result = $conn->query($sql);
$row    = $result->fetch_assoc();
if ($row["status"] == 2) {
    echo "This game is finished";
    die();
}
if ($row[$column]) {
    echo "This coordinate is not empty";
    die();
}

if ($row["playerX"] == $userId) {
    $symbol = "X";
}
elseif ($row["playerO"] == $userId) {
    $symbol = "O";
}

if ($symbol != checkTurn($gameId)) {
    echo "This is not your turn";
    die();
}
$column = "cuad" . $coordinate;
$sql    = "UPDATE game SET " . $column . "='" . $symbol . "' WHERE id=" . $gameId;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
else {
    echo "Error updating record: " . $conn->error;
}


checkGameState($gameId);

$conn->close();
?>
