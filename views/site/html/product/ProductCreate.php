
<?php

echo "
<head>

    <link rel='stylesheet' type='text/css' href='/OnlineStore/views/css/style.css'>
</head>
<body>
<div class='product-container'>
<form action='" . APPLICATION_PATH . "index.php?controller=products&action=create' method='post' enctype='multipart/form-data'>
<h3>Add a product</h3>
    <label>Title</label>
    <input type='text' name='title'><br>
    <label>Type</label>
    <input type='text' name='prd_type'><br>
    <label>Description</label>
    <input type='text' name='description'><br>
    <label>Gender</label>
    <input type='text' name='gender'><br>
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
    <input type='text' name='price'><br>
    <label>Thumbnail</label>
    <input type='file' name='file_to_upload'><br>
    <button name='create' value='true' class='product-create-btn'>Create</button>
</form>
</div>
</body>
";