<?php

if(isset($_REQUEST['p_id'])){
    $update = $_REQUEST['p_id'];
}
$query = "select * from posts";
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


?>



<form action=""method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" value="<?php echo$post_title ?>" id="post_title" placeholder="post title" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post category id</label>
        <input type="text" id="post_category_id" value="<?php echo$post_category_id ?>" placeholder="post category id" name="post_category_id" class="form-control">
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
        <input type='file'  name='file'><br>

    </div>

    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" id="post_tags" value="<?php echo$post_tags ?>"  name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea name="post_content" id="post_content" value="<?php echo$post_content ?>" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>