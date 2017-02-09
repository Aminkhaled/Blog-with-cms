<?php require "func.php"; ?>

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

                    <table class="table table-bordered table-hover">
                        <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Author</th>
                                  <th>Title</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Image</th>
                                  <th>Tags</th>
                                  <th>Comments</th>
                                  <th>Date</th>
                              </tr>
                        </thead>
                        <tr>
                            <td>10</td>
                            <td>boots</td>
                            <td>Cms</td>
                            <td>Java</td>
                            <td>Single</td>
                            <td>Course</td>
                            <td> Course</td>
                            <td>this is good course</td>
                            <td>22/10/2017</td>
                        </tr>
                    </table>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include"incudes/admin_footer.php" ?>