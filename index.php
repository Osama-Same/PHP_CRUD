<html>

<head>
    <title>How To CRUD Image Upload Using Ajax in PHP?</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
    </style>
</head>

<body>
    <div class="container mt-5 pt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h1>How To CRUD Image Upload Using Ajax in PHP?</h1>
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" id="add_button" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-success btn-lg m-1"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="15%">Image</th>
                            <th width="15%">Name</th>
                            <th width="15%">Email</th>
                            <th width="15%">Password</th>
                            <th width="15%">Phone</th>
                            <th width="15%">Authorization</th>
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </thead>
                    <tbody id='tbody'>
                        <?php
                        include("./server/users/delete.php");
                        $conn = mysqli_connect("localhost", "osama", "0000", "crud");
                        $sql = "select * from users";
                        $res = $conn->query($sql);
                        $src = "./upload/users/";
                        while ($row = $res->fetch_assoc()) {
                            echo "
                    <tr uid='{$row["id"]}'>
                      <td>{$row["id"]}</td>
                      <td>{$row["name"]}</td>
                      <td>{$row["email"]}</td>
                      <td>{$row["password"]}</td>
                      <td>{$row["phone"]}</td>
                      <td><img src=" . $src . "/" . $row['image'] . " style='width: 90px; height: 60px;' /></td>
                      <td>{$row["authorization"]}</td>
                      <td><a href='#' class='btn btn-primary  btn-sm edit'>Edit</a></td>
                      <td><a href='#' class='btn btn-danger  btn-sm delete '>Delete</a></td>
                    </tr>
                           ";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type='hidden' name='action' id='action' value='Insert'>
                            <input type='hidden' name='id' id='id_u' value='0'>
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" />
                    </div>
                    <div>
                        <label>Authorization</label>
                        <input type="tel" name="authorization" id="authorization" class="form-control" />
                    </div>

                    <div>
                        <label>Select User Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <span id="user_uploaded_image"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
            var current_row = null;
    $(document).ready(function() {
        $('#add_button').click(function() {
            $('#user_form')[0].reset();
            $('.modal-title').text("Add User");
            $('#action').val("Add");
            $('#operation').val("Add");
            $('#user_uploaded_image').html('');
        });


        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            $.ajax({
                url: "./server/users.php",
                type: "post",
                data: new FormData(this),
                dataa: $("#user_form").serialize(),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#user_form").find("input[type='submit']").val('Loading...');
                },
                success: function(res) {
                    if (res) {
                        if ($("#uid").val() == "0") {
                            $("#tbody").append(res);
                        } else {
                            $(current_row).html(res);
                        }
                    } else {
                        alert("Failed Try Again");
                    }
                    $("#user_form").find("input[type='submit']").val('Submit');
                    $("#userModal").modal('hide');
                }

            });
        });

        $(document).on('click', '.update', function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "fetch_single.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#userModal').modal('show');
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('.modal-title').text("Edit User");
                    $('#user_id').val(user_id);
                    $('#user_uploaded_image').html(data.user_image);
                    $('#action').val("Edit");
                    $('#operation').val("Edit");
                }
            })
        });

        $(document).on('click', '.delete', function() {
            let id = $(this).attr("uid");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "/server/users/delete.php",
                    method: "delete",
                    data: {
                        uid: id
                    },
                    success: function(data) {
                        alert(data);
                        dataTable.ajax.reload();
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>