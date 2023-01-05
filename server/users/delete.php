<?php
include "../connect.php";
if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'user Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'user Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
