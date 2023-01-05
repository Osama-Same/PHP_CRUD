<?php
include("../database/connect.php");
$action = $_POST["action"];
if (isset($action) == "Insert") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $authorization = $_POST['authorization'];
    $image = $_FILES['image']["name"];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "./upload/users" . $image);
    $sql = "INSERT INTO users(name, email ,password ,phone , image ,authorization ) 
    VALUES('$name', '$email' ,'$password' ,' $phone', '$image' , '$authorization' )";
    if ($conn->query($sql)) {
        $id = $conn->insert_id;
        echo "
            <tr uid='{$id}'>
              <td>{$name}</td>
              <td>{$email}</td>
              <td>{$password}</td>
              <td>{$phone}</td>
              <td><img src='./upload/users' . $image style='width: 90px; height: 60px;' /></td>
              <td>{$authorization}</td>
              <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
              <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
            </tr>";
    } else {
        echo false;
    }
} else if ($action == "Update") {
    $id_user = mysqli_real_escape_string($conn, $_POST["id_user"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $img = $_FILES['img']["name"];
    $tmp_name = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name, "./uploadsUser/" . $img);
    $admin_user = mysqli_real_escape_string($conn, $_POST["admin_user"]);
    $sql = "update users SET name='{$name}',email='{$email}',password='{$password}',phone='{$phone}',img='{$img}',admin_user='{$admin_user}',country='$country' where id_user ='{$id_user}'";
    if ($conn->query($sql)) {
        echo "
            <td>{$id_user}</td>
            <td>{$name}</td>
            <td>{$email}</td>
            <td>{$password}</td>
            <td>{$phone}</td>
            <td><img src='./uploadsUser/'$tmp_name' style='width: 90px; height: 60px;' /></td>
            <td>{$admin_user}</td>
            <td>{$country}</td>
            <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
            <td><a href='#' class='btn btn-danger delete'>Delete</a></td>";
    } else {
        echo false;
    }
} 