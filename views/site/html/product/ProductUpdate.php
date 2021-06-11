<?php

echo "
<head>
    <link rel='icon' type='img/png' href='/OnlineStore/views/img/la_lakers.png'>
</head>
<div class='product-container'>
<form action='" . APPLICATION_PATH . "index.php?controller=products&action=update&product_id=$data->id' method='post' enctype='multipart/form-data'>
    <input type='number' name='id' value='$data->id'>
    <label>Title</label>
    <input type='text' name='title' value='$data->title'><br>
    <label>Type</label>
    <input type='text' name='prd_type' value='$data->prd_type'><br>
    <label>Description</label>
    <input type='text' name='description' value='$data->description'><br>
    <label>Gender</label>   
    <input type='text' name='gender' value='$data->gender'><br>
    <label>Available size: </label>
    <select id='size_from' name='size_from'>
        <option value='S'>S</option>
        <option value='M'>M</option>
        <option value='L'>L</option>
        <option value='XL'>XL</option>
        <option value='XXL'>XXL</option>
  </select>    
  <label> to </label>
    <select id='size_to' name='size_to'>
        <option value='S'>S</option>
        <option value='M'>M</option>
        <option value='L'>L</option>
        <option value='XL'>XL</option>
        <option value='XXL'>XXL</option>
  </select> <br>
    <label>Price</label>
    <input type='text' name='price' value='$data->price'><br>
    <label>Thumbnail</label>
    <input type='file' name='file_to_upload' value='$data->thumbnail'><br>
    <button name='update' value='true' type='submit'>Update</button>
</form>
</div>
";