<?php 
$conn = mysqli_connect("localhost", "osama", "0000", "crud");
$id = $_POST['uid'];
$sql = "delete from users where id='{$id}'";
if ($conn->query($sql)) {
    echo "true";
} else {
    echo "false";
}
?>