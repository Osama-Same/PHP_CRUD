<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud PHP Ajax </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD using jquery ajax without page reload</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

</head>

<body>
    <!-- Add User -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveUser" enctype="multipart/form-data" method="post">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStudent" enctype="multipart/form-data" method="post">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none" ></div>

                        <input type="hidden" name="id" id="id">

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="u_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="u_email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="u_phone" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" id="u_password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Authorization</label>
                            <input type="text" name="authorization" id="u_authorization" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">image</label>
                            <input type="file" name="image" id="u_image" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Student Modal -->
    <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p id="view_name" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <p id="view_email" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <p id="view_phone" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <p id="view_password" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Authorization</label>
                        <p id="view_authorization" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">image</label>
                        <p id="view_image" class="form-control"></p>
                        <img src="./upload/users/view_image" id="view_image"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP Ajax CRUD without page reload using Bootstrap Modal

                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                                Add Student
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Authorization</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'>
                                <?php
                                include "./server/connect.php";
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
                                <td><button type='button' value='{$row['id']}' class='viewStudentBtn btn btn-info btn-sm'>View</button></td>
                                <td><button type='button' value='{$row['id']}' class='editUserBtn btn btn-primary btn-sm'>Edit</button></td>
                                <td> <button type='button' value='{$row['id']}' class='deleteUserBtn btn btn-danger btn-sm'>Delete</button></td>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        // Add User
        $(document).on('submit', '#saveUser', function() {

            let formData = new FormData(this);
            formData.append("save_user", true);
            $.ajax({
                type: 'post',
                url: "./server/users/insert.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let res = jQuery.parseJSON(response);

                    if (res === 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    } else if (res.status === 200) {
                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveUser')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#myTable').load(location.href + " #myTable");
                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            })
        })

        // Delete User
        $(document).on('click', '.deleteUserBtn', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this data?')) {
                let id = $(this).val()
                console.log(id)
                $.ajax({
                    type: "post",
                    url: "./server/users/delete.php",
                    data: {
                        'delete_user': true,
                        'id': id
                    },
                    success: function(response) {
                        let res = jQuery.parseJSON(response)
                        if (res.status === 500) {
                            alert(res.message);
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                })
            }
        })

        // update User
        $(document).on('submit', '#updateStudent', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            formData.append("update_user", true);

            $.ajax({
                type: "POST",
                url: "./server/users/update.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    let res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#studentEditModal').modal('hide');
                        $('#updateStudent')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });
        $(document).on('click', '.editUserBtn', function() {

            let id = $(this).val();

            $.ajax({
                type: "GET",
                url: "./server/users/view.php?id=" + id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {
                       $('#id').val(res.data.id);
                        $('#u_name').val(res.data.name);
                        $('#u_email').val(res.data.email);
                        $('#u_password').val(res.data.password);
                        $('#u_phone').val(res.data.phone);
                        $('#u_authorization').val(res.data.authorization);
                        $('#u_image').html(res.data.image);
                        $('#studentEditModal').modal('show');
                    }

                }
            });

        });

        // view User
        $(document).on('click', '.viewStudentBtn', function() {

            let id = $(this).val();
            $.ajax({
                type: "GET",
                url: "./server/users/view.php?id=" + id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#view_name').text(res.data.name);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_password').text(res.data.password);
                        $('#view_authorization').text(res.data.authorization);
                        $('#view_image').find(res.data.image);
                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });
    </script>
</body>

</html>