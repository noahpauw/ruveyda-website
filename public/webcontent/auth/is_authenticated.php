<?
include "../cors.php";

$servername = "rdbms.strato.de";
$username = "dbu1393290";
$password = "nTwmj5JYgReNe@e";
$dbname = "dbs12868937";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $exception) {
    echo "An error occured while connecting to the database!";
    die($exception);
}

if ($conn->connect_error) {
    echo "An error occured while connecting to the database!";
    die("Connection failed!");
}

$uuid = $_GET["user_id"];

// Get all web content
$sql = 'SELECT * FROM `sessions` WHERE uuid="' . $uuid . '"';

try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e;
}

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

$num_rows = mysqli_num_rows($result);

if($num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $password_from_db = $row["password"];
        $expires_at = $row["expires_at"];

        $current_timestamp = time();
        echo json_encode([
            "validate_login" => (int)$current_timestamp < (int)$expires_at,
        ]);
    }
}