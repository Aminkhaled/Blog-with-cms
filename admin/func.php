<?php

function add_cat_names()
{

    if (isset($_POST['submit'])) {
        $cat_title = htmlspecialchars($_POST['cat_title']);

        if ($cat_title == "" || empty($cat_title)) {
            echo "This input should not be empty";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}')";
            global $connection;
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die('Query Failed' . mysqli_error($connection));
            }
        }
    }


}

function delete_cat(){
    if (isset($_REQUEST['delete'])) {
        $the_cat_id = htmlspecialchars($_REQUEST['delete']);
        $query = "delete from categories WHERE cat_id = {$the_cat_id}";
        global $connection;
        $delete_all_categories = mysqli_query($connection, $query);
        header("location: categories.php");
    }
}