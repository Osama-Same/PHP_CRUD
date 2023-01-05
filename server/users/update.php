<?php 

$conn = mysqli_connect("localhost", "osama", "0000", "crud");

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$authorization = mysqli_real_escape_string($conn, $_POST["authorization"]);
$image = $_FILES['image']["name"];
$tmp_name=$_FILES['image']['tmp_name'];
move_uploaded_file($tmp_name,"../../upload/./users/".$image);
    $sql = `
UPDATE users SET 
name='$name',
email='$email',
password='$password',
phone='$phone',
image='$image',
authorization='$authorization' 
WHERE id = '$id'`;
if ($conn->query($sql)) {
    echo "
        <td>{$id}</td>
        <td><img src='../../upload/./users/'$tmp_name' style='width: 90px; height: 60px;' /></td>
        <td>{$name}</td>
        <td>{$email}</td>
        <td>{$password}</td>
        <td>{$phone}</td>
        <td>{$authorization}</td>
        <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
        <td><a href='#' class='btn btn-danger delete'>Delete</a></td>";
} else {
    echo false;
}

