<?
include "../cors.php";

$servername = "rdbms.strato.de";
$username = "dbu1393290";
$password = "nTwmj5JYgReNe@e";
$dbname = "dbs12868937";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $exception) {
    die($exception);
}

if ($conn->connect_error) {
    die("Connection failed!");
}

$id = $_GET["id"];
$uuid = $_GET["uuid"];

$sql = 'SELECT * FROM `sessions` WHERE uuid="' . $uuid . '"';
try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e . "<br/><br/>";
}

// Niks doen
if(!mysqli_num_rows($result)) {
    return false;
} else {
    if((int)$current_timestamp > (int)$expires_at)
        return false;
}

// Get all web content
$sql = 'DELETE FROM `contentblocks` WHERE id=' . $id;
try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e . "<br/><br/>";
}