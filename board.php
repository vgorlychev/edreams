<?php
/*
 * board.php?id=1
 */
include "db.php";
include "functions.php";

if (isset($_GET["id"])) {
    $gameId = $_GET["id"];
}
else {
    echo "What is game ID?";
    die();
}
$sql    = "SELECT * FROM game WHERE id='" . $gameId . "'LIMIT 1";
$result = $conn->query($sql);
$row    = $result->fetch_assoc();
?>
<html><body>
        <table border="1"  class="fixed">
            <col width="40px" />
            <col width="40px" />
            <col width="40px" />
            <tr height="40px">
                <td><?php echo $row["cuadA"]; ?></td>
                <td><?php echo $row["cuadB"]; ?></td>
                <td><?php echo $row["cuadC"]; ?></td>
            </tr>
            <tr height="40px">
                <td><?php echo $row["cuadD"]; ?></td>
                <td><?php echo $row["cuadE"]; ?></td>
                <td><?php echo $row["cuadF"]; ?></td>
            </tr>
            <tr height="40px">
                <td><?php echo $row["cuadG"]; ?></td>
                <td><?php echo $row["cuadH"]; ?></td>
                <td><?php echo $row["cuadI"]; ?></td>
            </tr>
        </table>
    </body></html>
