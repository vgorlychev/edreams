<?php

function checkGameState($gameId) {
    global $conn;

    $sql    = "SELECT * FROM game WHERE id='" . $gameId . "' LIMIT 1";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
    if ($row["cuadA"] == $row["cuadB"] && $row["cuadA"] == $row["cuadC"] &&
            $row["cuadA"] && $row["cuadB"] && $row["cuadC"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadA"];
    }

    if ($row["cuadD"] == $row["cuadE"] && $row["cuadD"] == $row["cuadF"] &&
            $row["cuadD"] && $row["cuadE"] && $row["cuadF"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadD"];
    }

    if ($row["cuadG"] == $row["cuadH"] && $row["cuadG"] == $row["cuadI"] && $row["cuadG"]
            && $row["cuadH"] && $row["cuadI"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadG"];
    }

    if ($row["cuadA"] == $row["cuadD"] && $row["cuadA"] == $row["cuadG"] && $row["cuadA"]
            && $row["cuadD"] && $row["cuadG"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadA"];
    }

    if ($row["cuadB"] == $row["cuadE"] && $row["cuadB"] == $row["cuadH"] && $row["cuadB"]
            && $row["cuadE"] && $row["cuadH"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadB"];
    }

    if ($row["cuadC"] == $row["cuadF"] && $row["cuadC"] == $row["cuadI"] && $row["cuadC"]
            && $row["cuadF"] && $row["cuadI"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadC"];
    }

    if ($row["cuadA"] == $row["cuadE"] && $row["cuadA"] == $row["cuadI"] && $row["cuadA"]
            && $row["cuadE"] && $row["cuadI"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadA"];
    }

    if ($row["cuadC"] == $row["cuadE"] && $row["cuadC"] == $row["cuadG"] && $row["cuadC"]
            && $row["cuadE"] && $row["cuadG"]) {
        echo "The game " . $gameId . " is finished. ";
        $symbolWon = $row["cuadC"];
    }

    if ($symbolWon == "X") {
        echo "Won userId " . $row["playerX"];
    }
    if ($symbolWon == "O") {
        echo "Won userId " . $row["playerO"];
    }

    if ($symbolWon) {
        $sql = "UPDATE game SET status = 2 WHERE id=" . $gameId;

        if ($conn->query($sql) === TRUE) {
            echo "The game is closed successfully";
        }
        else {
            echo "Error on closing the game: " . $conn->error;
        }
    }
}

function checkTurn($gameId) {
    global $conn;
    $sql    = "SELECT * FROM game WHERE id='" . $gameId . "' LIMIT 1";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
    $turnX  = 0;
    $turnO  = 0;
    if ($row["cuadA"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadA"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadB"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadB"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadC"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadC"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadD"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadD"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadE"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadE"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadF"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadF"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadG"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadG"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadH"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadH"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($row["cuadI"] == "X") {
        $turnX = $turnX + 1;
    }
    elseif ($row["cuadI"] == "O") {
        $turnO = $turnO + 1;
    }
    if ($turnX == $turnO) {
        return "X";
    }
    if ($turnX == ($turnO + 1)) {
        return "O";
    }
}

function board($gameId) {

}

?>
