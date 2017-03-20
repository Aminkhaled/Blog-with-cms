<?php include"incudes/admin_header.php" ?>

    <div id="wrapper">



        <!-- Navigation -->
    <?php include"incudes/admin_nav.php" ?>


    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin:
                            <?php echo $_SESSION['username'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>
                            </li>
                        </ol>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <?php

                                            $query = "select * from posts";
                                            global $connection;
                                            $select_query = mysqli_query($connection, $query);
                                            if (!$select_query) {
                                                die('query failed' . mysqli_error($select_query));
                                            }

                                            $post_count = mysqli_num_rows($select_query)

                                            ?>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo $post_count ?></div>
                                                <div>Posts!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="posts.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php
                                                $query = "select * from users";
                                                global $connection;
                                                $select_query = mysqli_query($connection, $query);
                                                if (!$select_query) {
                                                    die('query failed' . mysqli_error($select_query));
                                                }

                                                $user_count = mysqli_num_rows($select_query)


                                                ?>


                                                <div class="huge"><?php echo $user_count ?></div>
                                                <div>Users!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-shopping-cart fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php
                                                $query = "select * from comments";
                                                global $connection;
                                                $select_query = mysqli_query($connection, $query);
                                                if (!$select_query) {
                                                    die('query failed' . mysqli_error($select_query));
                                                }

                                                $comment_count = mysqli_num_rows($select_query)


                                                ?>
                                                <div class="huge"><?php echo $comment_count ?></div>
                                                <div>Comments!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="comment.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-support fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php
                                                $query = "select * from categories";
                                                global $connection;
                                                $select_query = mysqli_query($connection, $query);
                                                if (!$select_query) {
                                                    die('query failed' . mysqli_error($select_query));
                                                }

                                                $cat_count = mysqli_num_rows($select_query)


                                                ?>
                                                <div class="huge"><?php echo $cat_count ?></div>
                                                <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include"incudes/admin_footer.php" ?>