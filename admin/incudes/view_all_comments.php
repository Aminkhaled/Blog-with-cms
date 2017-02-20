<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Content</th>
        <th>Status</th>
        <th>date</th>
        <th>Delete</th>
        <th>Edit</th>

    </thead>


    <?php

    $query = "select * from comments";
    global $connection;
    $select_all_comments = mysqli_query($connection, $query);
    if (!$select_all_comments) {
        die('query failed' . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($select_all_comments)) {
        $comment_id = $row['comment_id'];

        $comment_post_id = $row['comment_post_id'];
        $comment_email = $row['comment_email'];
        $comment_author = $row['comment_author'];
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];


        ?>
        <?php
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_email</td>";

        echo "<td>$comment_author</td>";
        ?>


        <?php

        echo "<td>$comment_content</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_date</td>";
        echo " <td><a href='comment.php?delete={$comment_id}'>Delete</a></td>";
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


    $query = "Delete from comments WHERE comment_id = $delete ";
    $delete_post = mysqli_query($connection, $query);

    if (!$delete_post) {
        die("query failed" . mysqli_error($connection));
    }
}
if (empty($_REQUEST['delete'])) {
    unset($delete);
}


?>