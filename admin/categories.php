<?php include"incudes/header.php" ?>

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
                           <form action="" method="">
                               <div class="form-group">
                                   <label for="cat_title">Add Category</label>
                                   <input type="text" class="form-control" name="cat_title">
                               </div>
                               <div class="form-group">
                                   <input type="submit" name="submit" class="btn btn-primary" value="Add Category">

                               </div>

                           </form>
                       </div>
                        <div class="col-xs-8">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Id category</th>
                                    <th>   Category Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Bootstrap</td>
                                    <td>Java</td>
                                </tr>
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

<?php include"incudes/footer.php" ?>