<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = htmlspecialchars($_GET['edit']);

            $query = "SELECT * FROM categories WHERE cat_id={$cat_id}";
            global $connection;
            $select_categories_edit = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_edit)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                ?>
                <input value="<?php if (isset($cat_title)) {
                    echo $cat_title;
                } ?>"
                       type="text" class="form-control" name="cat_title">


                <?php

            }  }?>
        <?php
        if(isset($_POST['update_cat'])) {


            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories set cat_title = ' {$the_cat_title}' WHERE cat_id ={$cat_id}";
            global $connection;
            $update_categories = mysqli_query($connection, $query);
            if (!$update_categories) {
                die('query failed' . mysqli_error($update_categories));
            }
        };



        ?>




    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="update_cat">Edit Category</button>
    </div>

</form>