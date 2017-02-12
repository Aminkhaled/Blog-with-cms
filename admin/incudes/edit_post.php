<?php

if(isset($_REQUEST['p_id'])){
    $update = $_REQUEST['p_id'];
}

if(empty($_REQUEST['p_id'])){
    unset($update);
}

$query = "select * from posts WHERE post_id ={$update}";
global $connection;
$update_all_posts_id = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($update_all_posts_id)) {
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


}
if(isset($_FILES['file'])) {
    $image = $_FILES['file']['name'];
    $image_temp = $_FILES['file']['tmp_name'];
    $image_size = $_FILES['file']['size'];
    $image_type = $_FILES['file']['type'];

    ?>

    <?php
    if (isset($_POST['submit'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_author = $_POST['post_author'];
        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];

        $post_comment_count = 4;


        move_uploaded_file($image_temp, "../images/$image");

        $query = "UPDATE posts SET ";
        $query.="post_title = '{$post_title}', ";
        $query.="post_category_id = '{$post_category_id}', ";
        $query.="post_author = '{$post_author}', ";
        $query.="post_date = now(), ";
        $query.="post_content = '{$post_content}', ";
        $query.="post_status = '{$post_status}', ";
        $query.="post_tags = '{$post_tags}', ";
        $query.="post_image = '{$image}' ";
        $query.=" WHERE post_id = '{$post_id}'";

        $select_posts_edit = mysqli_query($connection,$query);

        if(!$select_posts_edit){
            die("query failed".mysqli_error($connection));
        }

    }
}


?>


<form action=""method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" value="<?php echo$post_title ?>" id="post_title" placeholder="post title" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php
            $query ="SELECT * from categories ";
            $select_categories = mysqli_query($connection,$query);
            if(!$select_categories){
                die('query failed'.mysqli_error($connection));
            }
            while($row =mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];
                $cat_post = $row['cat_title'];

                echo"<option value='$cat_id'>$cat_post</option>";
            }



            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post author</label>
        <input type="text" id="post_author" value="<?php echo$post_author ?>" placeholder="post author" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" id="post_status" value="<?php echo$post_status ?>"  name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <img src="../images/<?php echo$post_image ?>" height="100px" width="100px" alt="">
        <br>
        <input type="file" name="file">
    </div>

    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" id="post_tags" value="<?php echo$post_tags ?>"  name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10">
            <?php echo$post_content ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>