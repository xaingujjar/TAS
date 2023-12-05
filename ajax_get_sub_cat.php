<?php
include ("db_connection.php");

if(isset($_POST['cat_id'])){
    $cat_id = $_POST['cat_id'];
    $select_cat = "SELECT * FROM sub_cat where fk_cat_id = '{$cat_id}'";
    $select_cat_run = mysqli_query($conn, $select_cat);
    $fetch_cat = mysqli_fetch_assoc($select_cat_run);
    $output = '';
    do{
        $output .='<option value="'.$fetch_cat['id'].'">'.$fetch_cat['name'].'</option>';
    }while($fetch_cat = mysqli_fetch_assoc($select_cat_run));

    echo $output;
}