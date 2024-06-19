<?
$servername = "localhost";
$username = "lash_admin";
$password = "HB8z6xZ9T";
$dbname = "lash_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed!");
}

class Webcontent
{
    public $id;
    public $heading;
    public $content;
    public $show_on_website;

    function __construct($id, $heading, $content, $show_on_website)
    {
        $this->id = $id;
        $this->heading = $heading;
        $this->content = $content;
        $this->show_on_website = $show_on_website;
    }
}

// Get all web content
$id = $_POST['id'];
$webcontent = $_POST['webcontent'];

// Change \n to linebreaks
$order = array("\r\n", "\n", "\r");
$webcontent = str_replace($order, "<br />", $webcontent);

$sql = "UPDATE webcontents SET content='$webcontent' WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

$conn->close();
?>