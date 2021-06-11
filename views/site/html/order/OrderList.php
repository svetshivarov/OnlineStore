<?php

echo"
<section>
        <h1>Product</h1>
        <form action='" . APPLICATION_PATH . "index.php?controller=orders&action=listAll' method='post'>
            <input type='text' name='topic'>
            <button type='submit' name='search' value='true'>Search</button>
        </form>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>City</th>
                    <th>First and Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>";


if (is_array($data)) {
    foreach ($data as $order) {
        echo "
<table>
    <tr>
            <thead> <th>Title</th> </thead>
            <td>$order->prd_name</td>

        <thead> <th>Quantity</th> </thead>
            <td>$order->quantity</td> 

        <thead> <th>prd_size</th> </thead>
            <td>$order->prd_size</td> 

        <thead> <th>Person Name</th> </thead>
            <td>$order->person_name</td> 
            
            <thead> <th>Email</th> </thead>
            <td>$order->email</td> 
            
            <thead> <th>City</th> </thead>
            <td>$order->city</td> 
            
            <thead> <th>Address</th> </thead>
            <td>$order->address</td>             

       </tr>
       </table>
";

    }
}
echo "  </tbody>
            </table>
    </section>";