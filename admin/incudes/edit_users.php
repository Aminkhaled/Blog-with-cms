<?php
if (isset($_GET['p_id'])) {
    $p_id = htmlspecialchars($_GET['p_id']);


    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];


        $query = "update users set ";
        $query .= " username ='{$username}', ";
        $query .= " user_firstname = '{$first_name }', ";
        $query .= " user_lastname = '{$last_name}', ";
        $query .= " user_email = '{$user_email}', ";
        $query .= " user_password ='{$user_password}' where user_id ='{$p_id}' ";


        global $connection;
        $insert_into_user = mysqli_query($connection, $query);
        if (!$insert_into_user) {
            die("query failed" . mysqli_error($connection));
        }

    }
}
$query = "select * from users";
global $connection;
$select_all_user = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_user)) {
    $user_name = $row['username'];
    $FirstName = $row['user_firstname'];
    $LastName = $row['user_lastname'];
    $email = $row['user_email'];
    $password = $row['user_password'];


}
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $user_name ?>" id="username" placeholder="Username" name="username"
               class="form-control">
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
        <input type="text" id="first_name" value="<?php echo $FirstName ?>" placeholder="FirstName" name="first_name"
               class="form-control">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" value="<?php echo $LastName ?>" placeholder="LastName" name="last_name"
               class="form-control">
    </div>

    <div class="form-group">
        <label for="post_email">User Email</label>
        <input type="text" id="user_email" value="<?php echo $email ?>" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" id="user_password" value="<?php echo $password ?>" name="user_password"
               class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>
