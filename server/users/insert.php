<?php
$conn = mysqli_connect("localhost", "osama", "0000", "crud");

    $name = $_POST['name'];
    $email = $_POST['email'];
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

?>
