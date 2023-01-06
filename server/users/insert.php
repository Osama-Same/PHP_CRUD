<?php

include  "../connect.php";
include "./function.php";

if (isset($_POST['save_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $authorization = $_POST['authorization'];
    if ($_FILES["image"]["name"] != '') {
        $image = upload_image();
    }
    if ($name == NULL || $email == NULL || $phone == NULL || $authorization == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO users (name,email,password,phone,image,authorization) 
    VALUES ('$name','$email','$password','$phone','$image','$authorization')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        $res = [
            'status' => 200,
            'message' => 'user Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}
