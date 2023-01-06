
<?php

function upload_image()
{
    if (isset($_FILES["image"])) {
        $extension = explode('.', $_FILES['image']['name']);
        $new_name = rand() . '.' . $extension[1];
        $destination = '../../upload/./users/' . $new_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        return $new_name;
    }
}
function get_image_name($id)
{
    include('../connect.php');
    $statement = $connection->prepare("SELECT image FROM users WHERE id = '$id'");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row["image"];
    }
}



?>

