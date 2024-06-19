<?php
$servername = "localhost";
$username = "lash_admin";
$password = "HB8z6xZ9T";
$dbname = "lash_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "<p>Verwijderen van een afspraak</p>";

if ($conn->connect_error) {
    die("Connection failed!");
}

$id = $_POST["id"];
$result = mysqli_query($conn, "DELETE FROM appointments WHERE id LIKE '%$id%'");

while ($row = $result->fetch_assoc()) {
    echo "Afspraak geannuleerd";
}

$conn->close();
?>