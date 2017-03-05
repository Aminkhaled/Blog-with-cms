<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];


    $query = "INSERT INTO users(username,user_firstname, user_lastname,user_email,user_password,user_role ) VALUES ('$username','$first_name','$last_name','$user_email','$user_password','$user_role')";


    global $connection;
    $insert_into_user = mysqli_query($connection, $query);
    if (!$insert_into_user) {
        die("query failed" . mysqli_error($connection));
    }


}


?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Username" name="username" class="form-control">
    </div>
    <div class="form-group">
        <select name="user_role">
            <option>Select Option</option>
            <option value="admin">
                Admin
            </option>
            <option value="subscriber">
                Subscriber
            </option>

        </select>
    </div>


    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" placeholder="FirstName" name="first_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" placeholder="LastName" name="last_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_email">User Email</label>
        <input type="text" id="user_email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_password">User Email</label>
        <input type="text" id="user_password" name="user_password" class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>