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

$username = $_GET["username"];
$password = $_GET["password"];

// Get all web content
$sql = 'SELECT * FROM `users` WHERE name="' . $username . '" LIMIT 1';

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
        if(password_verify($password, $password_from_db)) {
            $user_id = $row["id"];
            $expires_at = strtotime("+7 Days");
            $nowtime =  date('Y-m-d H:i:s', $timestamp);

            $sql = 'DELETE FROM `sessions` WHERE user_id=' . $user_id;
            try {
                $result = mysqli_query($conn, $sql);
            } catch(Exception $e) {
                echo $e;
            }

            $uuid = uniqid();
            $sql = 'INSERT INTO `sessions` VALUES(NULL, ' . $user_id . ', "' . $expires_at . '", "' . $uuid . '")';
            try {
                $result = mysqli_query($conn, $sql);
            } catch(Exception $e) {
                echo $e;
            }
            echo json_encode([
                "validate_login" => true,
                "user_id" => $uuid,
            ]);
        } else {
            echo json_encode([
                "validate_login" => false
            ]);
        }
    }
}
