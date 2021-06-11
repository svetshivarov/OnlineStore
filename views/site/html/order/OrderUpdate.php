<?php

echo "
<form action='" . APPLICATION_PATH . "index.php?controller=orders&action=update&order_id=$data->id' method='post' enctype='multipart/form-data'>
    <input style='display: none'type='number' name='id' value='$data->id'>
    <label>Title</label>
    <input type='text' name='title' value=''><br>
    <label>Type</label>
    <input type='text' name='prd_type' value='quantity'><br>
    <label>Price</label>
    <input type='text' name='price' value='$data->price'><br>
    <label>City</label>
    <input type='number' name='city' value='city'><br>
    <label>Address</label>
    <input type='text' name='address' value='address'><br>
    
    <button name='update' value='true' type='submit'>Update</button>
</form>
";