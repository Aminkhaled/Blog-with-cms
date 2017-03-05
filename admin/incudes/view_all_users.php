<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>Username</th>
        <!--        <th>Image</th>-->

        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Role</th>
        <th>Delete</th>


    </thead>


    <?php

    $query = "select * from users";
    global $connection;
    $select_all_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_posts)) {
        $user_id = $row['user_id'];
        $user_name = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];

        $user_image = $row['user_image'];
        $user_role = $row['user_role'];


        ?>
        <?php
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td> $user_name</td>";
        ?>


        <?php

        echo "<td> $user_firstname </td>";
        echo "<td>$user_lastname </td>";
        echo "<td>$user_email</td>";
        echo "<td> $user_role</td>";

        echo " <td><a href='users.php?delete={$user_id}'>Delete</a></td>";
//        echo" <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";


    };

    echo "</tr>";


    ?>
    <?php


    ?>


</table>

<?php


if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];


    $query = "Delete from users WHERE user_id = $delete ";
    $delete_user = mysqli_query($connection, $query);

    if (!$delete_user) {
        die("query failed" . mysqli_error($connection));
    }
    header('location:users.php');
}
if (empty($_REQUEST['delete'])) {
    unset($delete);
}


?>