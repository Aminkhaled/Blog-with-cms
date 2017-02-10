`<?php require "func.php"; ?>

<?php include "incudes/admin_header.php"; ?>


<?php ob_start(); ?>

    <div id="wrapper">



    <!-- Navigation -->
    <?php include"incudes/admin_nav.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
<!--       view all posts by php              -->
                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }
                    switch($source){
                        case"add_post":
                            include'incudes/add_post.php';
                            break;

                        default:
                            include'incudes/view_all_posts.php';
                            break;
                    }

                    ?>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include"incudes/admin_footer.php" ?>