<?php include'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <?php
                    if(isset($_REQUEST['p_id'])){
                        $p_id = $_REQUEST['p_id'];
                    }
                    if(empty($p_id)){
                        header("location:includes/404.php");

               }


                    ?>

                    <?php
                    $query ="SELECT * FROM posts WHERE post_id ={$p_id}";
                    global $connection;
                    $db_posts = mysqli_query($connection,$query);
                    while($row =mysqli_fetch_assoc($db_posts)):
                        $post_id = $row['post_id'];
                        $post_title =$row['post_title'];
                        $post_author =$row['post_author'];
                        $post_date =$row['post_date'];
                        $post_image =$row['post_image'];
                        $post_content =$row['post_content'];


                        ?>
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
<!--                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                        <hr>

                    <?php endwhile; ?>
                    <!-- Blog Comments -->

                    <!-- Comments Form -->
                    <div class="well">
                        <?php
                        if (isset($_POST['submit'])) {
                            $comment_post_id = htmlspecialchars($_GET['p_id']);
                            $comment_author = htmlspecialchars($_POST['comment_author']);
                            $comment_email = htmlspecialchars($_POST['comment_email']);
                            $comment_content = htmlspecialchars($_POST['comment_content']);

                            $query = "insert into Comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES
                                     ('$comment_post_id','$comment_author','$comment_email','$comment_content','Unaproved',now()) ";

                            $insert_all_comments = mysqli_query($connection, $query);
                            if (!$insert_all_comments) {
                                die('query failed' . mysqli_error($connection));
                            }
                        }


                        ?>

                        <h4>Leave a Comment:</h4>

                        <form role="form" method="post">

                            <div class="form-group">
                                <label for="comment_author"> Author</label>
                                <input type="text" class="form-control" name="comment_author">
                            </div>
                            <div class="form-group">
                                <label for="comment_mail"> Email</label>

                                <input type="email" class="form-control" name="comment_email">
                            </div>
                            <div class="form-group">
                                <label for="comment_content"> Your Comment</label>

                                <textarea class="form-control" name="comment_content" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->




                    <!-- Comment -->
                    <div class="media">
                        <?php
                        $query="Select * from comments WHERE comment_post_id ={$p_id} AND comment_status = 'approve'";
                        $display_comments=mysqli_query($connection,$query);
                        if(!$display_comments){
                            die("query failed".mysqli_error($connection));
                        }

                        while($row =mysqli_fetch_assoc($display_comments)){
                            $comment_author = $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_content = $row['comment_content'];






                        ?>
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo"$comment_author"; ?>
                                <small><?php echo"$comment_date"; ?></small>
                            </h4>
                            <?php echo"$comment_content"; ?>
                        </div>


            <?php  } ?>
                    </div>

                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                            <?php
                            $query ="SELECT * FROM categories";
                            global $connection;
                            $db_sidebar = mysqli_query($connection,$query);
                            ?>
                            <h4>Blog Categories</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled">
                                        <?php
                                        while($row =mysqli_fetch_assoc($db_sidebar)) {
                                            $cat_title = $row['cat_title'];
                                            echo "<li>
                    <a href='#'>{$cat_title}</a></li>";
                                        }

                                        ?>

                                    </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "includes/widget.php"; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
