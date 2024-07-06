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

class Webcontent
{
    public $id;
    public $content;
    public $contentType;
    public $route;
    function __construct($id, $content, $contentType, $route)
    {
        $this->id = $id;
        $this->content = $content;
        $this->contentType = $contentType;
        $this->route = $route;
    }
}

$id = $_GET["id"];
$priority = $_GET["priority"];

// Get all web content
$sql = 'UPDATE `contentblocks` SET priority=' . $priority . ' WHERE id=' . $id;
try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e . "<br/><br/>";
}