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
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                       <div class="col-xs-4">
                           <?php
                           if(isset($_POST['submit'])){
                               $cat_title = htmlspecialchars($_POST['cat_title']);

                               if($cat_title == "" ||empty($cat_title)){
                                   echo"This input should not be empty";
                               }else{
                                   $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
                                   $create_category_query = mysqli_query($connection,$query);
                                   if(!$create_category_query){
                                       die('Query Failed'.mysqli_error($connection));
                                   }
                               }
                           }

                           ?>
                           <form action="" method="post">
                               <div class="form-group">
                                   <label for="cat_title">Add Category</label>
                                   <input type="text" class="form-control" name="cat_title">
                               </div>
                               <div class="form-group">
                                <button class="btn btn-primary" name="submit">Add Category</button>
                               </div>

                           </form>
                       </div>
                        <div class="col-xs-8">
                            <?php
                             $query =" SELECT * FROM categories ";
                            global $connection;
                             $select_categories = mysqli_query($connection,$query);


                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> Id category</th>
                                    <th class="text-center">   Category Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($select_categories)):


                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];






                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $cat_id ?></td>
                                    <td class="text-center"><?php echo $cat_title?></td>
                                    <?php echo"<td><a href='categories.php?delete=$cat_id'>Delete</a></td>" ?>


                                </tr>
                                <?php endwhile; ?>
                                <?php
                                if(isset($_GET['delete'])){
                                    $the_cat_id = htmlspecialchars($_GET['delete']);
                                    $query = "delete from categories WHERE cat_id = {$the_cat_id}";
                                    $delete_all_categories =mysqli_query($connection,$query) ;
                                    header("location: categories.php");
                                }


                                ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"incudes/admin_footer.php" ?>