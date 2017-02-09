<?php
     if(isset($_POST['submit'])){
         $post_title = $_POST['post_title'];
         $post_category_id = $_POST['post_category_id'];
         $post_author = $_POST['post_author'];
         $post_date = date('d-m-y');
         $post_image = $_FILES['post_image']['name'];
         $post_image_temp = $_FILES['post_image']['tmp_name'];
         $post_content = $_POST['post_content'];
         $post_status  = $_POST['post_status'];
         $post_tags  = $_POST['post_tags'];
         $post_comment_count = 4;

         if(isset($post_image)){
             if(!empty($post_image)){
                 $location = "../images/";
                 if(move_uploaded_file($post_image_temp,$location.$post_image)){
                     echo 'File uploaded successfully';

                 }
             }else{
                 echo 'You should select a file to upload !!';

             }
         }


     }


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" id="post_title" placeholder="post title" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post category id</label>
        <input type="text" id="post_category_id" placeholder="post category id" name="post_category_id" class="form-control">
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
        <label for="post_image">Post image</label>
        <input type="file" name="post_image" >
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
        <label for="submit">Add</label>
        <input type="submit" name="submit" class="btn btn-default">

    </div>


</form>