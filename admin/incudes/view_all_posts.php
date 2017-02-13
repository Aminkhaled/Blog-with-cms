
<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Delete</th>
        <th>Edit</th>

    </thead>


        <?php

        $query = "select * from posts";
        global $connection;
        $select_all_posts = mysqli_query($connection,$query);
        while($row= mysqli_fetch_assoc($select_all_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];



            ?>
            <?php
            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";
            ?>



                <?php

            echo "<td>$post_status</td>";
            echo "<td><img src='../images/$post_image' alt='$post_image' height='50px' width='50px' ></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo" <td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo" <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";




        };
        $sql ="select * from categories WHERE cat_id ={$post_category_id}";

        $table_of_category =mysqli_query($connection,$sql);
        if(!$table_of_category){
            die('query failed'.mysqli_error($connection));
        }
        while($result = mysqli_fetch_assoc($table_of_category)){
            $cat_id = $result['cat_id'];
            $cat_title = $result['cat_title'];

            echo"<td>.$cat_title.</td>";

        }
        echo"</tr>";


        ?>
<?php


?>


</table>

<?php


if(isset($_REQUEST['delete'])){
    $delete = $_REQUEST['delete'];


    $query = "Delete from posts WHERE post_id = $delete ";
    $delete_post = mysqli_query($connection,$query);

    if(!$delete_post){
        die("query failed" .mysqli_error($connection));
    }
}
if(empty($_REQUEST['delete'])){
    unset($delete);
}



?>