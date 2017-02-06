<?php require "functions.php"; ?>

<?php include "incudes/admin_header.php"; ?>

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
                           //add function

                           add_cat_names(); ?>

                           <form action="" method="post">
                               <div class="form-group">
                                   <label for="cat_title">Add Category</label>
                                   <input type="text" class="form-control" name="cat_title">
                               </div>
                               <div class="form-group">
                                <button class="btn btn-primary" name="submit">Add Category</button>
                               </div>

                           </form>
                           <form action="" method="post">
                               <div class="form-group">
                                   <label for="cat_title">Edit Category</label>
                                   <?php
                                   //edit function

                                   edit_cat();
                                   ?>
                               </div>
                               <div class="form-group">
                                   <button class="btn btn-primary" name="submit">Edit Category</button>
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
                                    <th class="text-center"> Category Name</th>
                                    <th class="text-center">Delete Category</th>
                                    <th class="text-center">Edit Category</th>


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

                                    <?php echo "<td class='text-center'><a href='categories.php?delete={$cat_id}'>Delete</a></td>" ?>
                                    <?php echo "<td class='text-center'><a href='categories.php?edit={$cat_id}'>Edit</a></td>" ?>

                                </tr>
                                <?php endwhile; ?>
                                <?php
                                //delete function
                                delete_cat();


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


