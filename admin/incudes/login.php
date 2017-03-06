<?php
include('../../includes/db.php');

?>
<?php session_start() ?>


<?php
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password = md5($password);

    $query = "Select * from users where username = '$username'";
    global $connection;
    $login_users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($login_users)) {
        $db_user_id = $row['user_id'];
        $db_user_name = $row['username'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_password = $row['user_password'];
        $role = $row['user_role'];

    }
    if ($username !== $db_user_name && $password !== $db_user_password) {
        header('Location:../../index.php');

    } else if ($username == $db_user_name && $password == $db_user_password) {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $role;


        header('Location:../index.php');

    } else {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $role;
        header('Location:../index.php');

    }


}
?>