<?php
 //include('user.php');
 //marcarFalla('182');
 include('../models/database.php');
 $sql = "SELECT idPrograma FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["idPrograma"]. "<br>";
        var_dump($row['idPrograma']);
    }
} else {
    echo "0 results";
}
