<?php
include '../connect.php';
include "./function.php";
if (isset($_POST['update_user'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $authorization = $_POST['authorization'];
    $image = '';
    if ($_FILES["image"]["name"] != '') {
        $image = upload_image();
    } 

    if ($name == NULL || $email == NULL || $phone == NULL || $password == NULL || $authorization == null) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE users SET name='$name', email='$email',password = '$password', phone='$phone', image='$image' , authorization = '$authorization' 
            WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'user Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'user Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
