<?php
include ("db_connection.php");
if(!isset($_SESSION['user_name']) OR $_SESSION['user_name'] == ''){
    header("location: login.php");
}
$msg = '';
if(isset($_GET['id'])){
    echo $id = $_GET['id'];
    $delete_query = "DELETE FROM `category` WHERE id = '{$id}'";
    $run_delete = mysqli_query($conn, $delete_query);

    if($run_delete){
        $msg = '<div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Successfully ! </strong> Your category is deleted.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }else{
        $msg = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your category is not deleted.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }
}


if(isset($_POST['add_cat'])){
    $prod_cat_name = $_POST['prod_cat_name'];
    $insert_query = "INSERT INTO `category`(`name`, `status`) VALUES ('{$prod_cat_name}', 1)";
    $run_query = mysqli_query($conn, $insert_query);

    if($run_query){
        $msg = '<div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Successfully ! </strong> Your category is inserted.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }else{
        $msg = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your category is not inserted
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }
}
if(isset($_POST['update_cat'])){
    $prod_cat_name = $_POST['prod_cat_name'];
    $prod_cat_id = $_POST['prod_cat_id'];
    $insert_query = "UPDATE `category` SET `name`='{$prod_cat_name}' WHERE id = '{$prod_cat_id}'";
    $run_query = mysqli_query($conn, $insert_query);

    if($run_query){
        $msg = '<div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Successfully ! </strong> Your category is updated.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }else{
        $msg = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your category is not updated
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
    }
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
    <title>Add Product Category</title>
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
                            <h3>Add Product Category</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="product_cat.php">Add Product Category</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Page Body Start -->
                <?=$msg?>
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Product Category</h5>
                    </div>
                    <form method="post" class="form theme-form">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Product Category Name</label>
                                        <input class="form-control"  type="text" name="prod_cat_name" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" name="add_cat" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Product Category List </h5>
                            </div>
                            <div class="card-block row">
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $select_query = "SELECT * FROM `category`";
                                                $run_select_query = mysqli_query($conn, $select_query);
                                                $fetch_select_query = mysqli_fetch_assoc($run_select_query);
                                                $i = 1;
                                                do{
                                                    if($fetch_select_query['status'] == 1){
                                                        $status_text = '<div class="span badge rounded-pill pill-badge-success">Active</div>';
                                                    }elseif($fetch_select_query['status'] == 0){
                                                        $status_text = '<div class="span badge rounded-pill pill-badge-secondary">De-Active</div>';
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$i?></th>
                                                        <td><?=$fetch_select_query['name']?></td>
                                                        <td><?=$status_text?></td>
                                                        <td>
                                                            <button
                                                                class="btn btn-primary btn-xs edit_cat"
                                                                type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target=".bd-example-modal-lg"
                                                                data-cat_id = "<?=$fetch_select_query['id']?>"
                                                                data-cat_name = "<?=$fetch_select_query['name']?>"
                                                            >Edit</button>
                                                            <a href="product_cat.php?id=<?=$fetch_select_query['id']?>" class="btn btn-danger btn-xs" >Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }while ($fetch_select_query = mysqli_fetch_assoc($run_select_query));
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Page Body End -->
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form theme-form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Product Category Name</label>
                                            <input class="form-control"  type="text" name="prod_cat_name" id="prod_cat_name" >
                                            <input class="form-control"  type="hidden" name="prod_cat_id" id="prod_cat_id" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" name="update_cat" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer start-->
        <?php include ("include/footer.php")?>
    </div>
</div>
<?php include ("include/js.php")?>


<script>
    $(document).ready(function (){
        $('.edit_cat').click(function (){
            var cat_id = $(this).data('cat_id')
            var cat_name = $(this).data('cat_name')


            $('#prod_cat_name').val(cat_name);
            $('#prod_cat_id').val(cat_id);
        })
    })
</script>
</body>
</html>