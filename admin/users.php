`<?php require "func.php"; ?>

<?php include "incudes/admin_header.php"; ?>


<?php ob_start(); ?>

<div id="wrapper">


    <!-- Navigation -->
    <?php include "incudes/admin_nav.php" ?>

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
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case"add_users":
                            include 'incudes/add_users.php';
                            break;
                        case"edit_users":
                            include 'incudes/edit_user.php';

                            break;

                        default:
                            include 'incudes/view_all_users.php';
                            break;
                    }

                    ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "incudes/admin_footer.php" ?>