<?php

echo"
<html>
<head>
    <title>All Products</title>
</head>
        <h2 class='products-page'>Products</h2>
<form action='" . APPLICATION_PATH . "index.php?controller=products&action=create' method='post'>
    <button class='create-btn'>Create</button>
 </form>
<section>
        <form action='" . APPLICATION_PATH . "index.php?controller=products&action=listAll' method='post'>
            <input type='text' name='topic'>
            <button type='submit' name='search' value='true' class='search-btn'>Search</button>
        </form>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Gender</th>
                    <th>Price</th>
                    <th>Thumbnail</th>
               </tr>
                </thead>
                <tbody>";

if (is_array($data)) {
    foreach ($data as $product) {
        echo "<tr>
                       <td>$product->title</td>
                       <td>$product->prd_type</td>
                       <td>$product->gender</td>
                       <td>$ $product->price</td>
                    <td><img width='100px' src='" . IMG_PATH . "$product->thumbnail'/></td>
                    <td>
                        <form action='" . APPLICATION_PATH . "index.php?controller=products&action=view' method='post'>
                            <button name='product_id' value='$product->id'class='product_id-btn'>View</button>
                        </form>
                                                <form action='" . APPLICATION_PATH . "index.php?controller=products&action=delete' method='post'>
                            <button name='product_id' value='$product->id' class='product_id-btn'>Delete</button>
                        </form>
                    </tr>";
    }
}
echo "  </tbody>
            </table>
    </section>
    </html>";