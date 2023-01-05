<?php

include  "../connect.php";


 if (isset($_POST['save_user'])) { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $authorization = $_POST['authorization'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "../../upload/./users/" . $image);
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

/*     $name = $_POST['name'];
    $email = $_POST['email'];0
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $authorization = $_POST['authorization'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "../../upload/./users/" . $image);
    $sql = "INSERT INTO users(name,email , password,phone,image,authorization) 
    VALUES('$name','$email' ,'$password' ,' $phone','$image' , '$authorization')";
    if ($conn->query($sql)) {
        $id = $conn->insert_id;
        echo "
        <tr uid='{$row["id"]}'>
          <td>{$row["id"]}</td>
          <td><img src='./upload/users/{$row["image"]}' style='width: 100px; height: 50px'/></td>
          <td>{$row["name"]}</td>
          <td>{$row["email"]}</td>
          <td>{$row["password"]}</td>
          <td>{$row["phone"]}</td>
          <td>{$row["authorization"]}</td>
          <td><a href='#' class='btn btn-primary  edit'>Edit</a></td>
          <td><a href='#' class='btn btn-danger  delete '>Delete</a></td>
      </tr>
          ";
    } else {
        echo false;
    }
 */
