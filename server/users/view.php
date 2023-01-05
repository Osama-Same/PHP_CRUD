<?php
include "../connect.php";


if(isset($_GET['id']))
{
    $id =$_GET['id'];

    $query = "SELECT * FROM users WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $user = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'users Fetch Successfully by id',
            'data' => $user
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'user Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}
?>