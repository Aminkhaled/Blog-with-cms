<?php
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

        $query = "INSERT INTO posts (post_category_id, post_title, post_author,
             post_date, post_image, post_content, post_tags, post_comment_count,post_status) ";
        $query .= "VALUES ('$post_category_id','$post_title',
            ' $post_author ',now(),'$image','$post_content','$post_tags','$post_comment_count','$post_status')";

        global $connection;
        $insert_into_post = mysqli_query($connection , $query);
        if (!$insert_into_post) {
            die("query failed" . mysqli_error($connection));
        }

    }





}



?>



<form action=""method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" id="post_title" placeholder="post title" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php
            $query ="SELECT * from categories";
            global $connection;
            $select_categories = mysqli_query($connection,$query);
            if(!$select_categories){
                die('query failed'.mysqli_error($connection));
            }
            while($row =mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo"<option>$cat_title</option>";
            }



            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post author</label>
        <input type="text" id="post_author" placeholder="post author" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" id="post_status"  name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <input type='file' name='file'><br>

    </div>

    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" id="post_tags"  name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>