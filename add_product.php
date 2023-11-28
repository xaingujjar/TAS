<?php
include ("db_connection.php");
if(!isset($_SESSION['user_name']) OR $_SESSION['user_name'] == ''){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Add Product</title>
    <?php include("include/style.php") ?>
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php include ('include/topbar.php')?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <?php include ("include/sidebar.php"); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add Product</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="add_product.php">Add Product</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <!-- Page Body Start -->

                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Product Details</h5>
                    </div>
                    <form class="form theme-form">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword2">Product Category</label>
                                        <select class="form-select digits" name="prod_cat">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword2">Product Sub-Category</label>
                                        <select class="form-select digits" name="prod_sub_cat">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Name</label>
                                        <input class="form-control"  type="text" name="product_name" >
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Size</label>
                                        <select class="form-select digits" name="prod_size">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Color</label>
                                        <input class="form-control"  type="text" name="product_color" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Weight</label>
                                        <input class="form-control"  type="number" name="product_weight" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Image 1</label>
                                        <input class="form-control"  type="file" name="image_1[]" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Image 2</label>
                                        <input class="form-control"  type="file" name="image_1[]" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Image 3</label>
                                        <input class="form-control"  type="file" name="image_1[]" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Default Price</label>
                                        <input class="form-control"  type="number" name="product_price" >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Season</label>
                                        <select class="form-select digits" name="prod_season">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success" style="margin-top: 25px">
                                            <input id="checkbox-primary" type="checkbox" name="featured">
                                            <label for="checkbox-primary">Featured</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <input class="btn btn-light" type="reset" value="Cancel">
                        </div>
                    </form>
                </div>


            <!-- Page Body End -->
            </div>
        </div>
        <!-- footer start-->
        <?php include ("include/footer.php")?>
    </div>
</div>
<?php include ("include/js.php")?>
</body>
</html>