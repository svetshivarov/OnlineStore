<?php

echo"
<html>
<head>
    <title>" . $data['productData']->title . "</title>
</head>
<h1> " . $data['productData']->title . "</h1>
<h4>" . $data['productData']->prd_type . "</h4>
<p><img width='300px' src='" . IMG_PATH . $data['productData']->thumbnail . "'></p>
<p>" . $data['productData']->description . "</p>
<p>  Gender: " . $data['productData']->gender . "</p>
<p>  Available Size: " . $data['productData']->size_from . " to " . $data['productData']->size_to . "</p>
<p>  Price: $ " . $data['productData']->price . "</p>
<form action='" . APPLICATION_PATH . "index.php?controller=products&action=update&product_id=" . $data['productData']->id . "' method='post'>
    <button class='update_product-btn'>Update</button>
</form>";

echo"
<form action='" . APPLICATION_PATH . "index.php?controller=orders&action=create&order_id=" . $data['productData']->id . "' method='post'>
    <button type='submit' value='submit' name='submit' class='product_orderNow-btn'>Order Now!</button>
</form>
";

if(!empty($_SESSION) && !empty(($_SESSION["uid"]))) {
    echo "<h3>Comments</h3>
<input type='text' id='message' placeholder='I love this product...'>
<button type='submit' id='addComment' name='addComment' class='addComments-btn'>Comment</button>
    <div id='comments'>
    </html>
    ";
}
foreach ($data['comments'] as $cmnt) {
    echo "<p>" . $cmnt->username . ": " . $cmnt->comment . " " . $cmnt->created_at . "</p>";
}

echo "</div>";

echo "
<script type='application/javascript'>
async function postData(url = 'http://localhost/mvc/api/Api.php', data = {}) {
    // Default options are marked with *
    const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(data) // body data type must match 'Content-Type' header
    });
    return response.json(); // parses JSON response into native JavaScript objects
}
const button = document.getElementById('addComment');
button.onclick = async () => {
    let message = document.getElementById('message').value;
    await postData('http://localhost/mvc/api/Api.php', {
        token: 'abc123',
        action: 'comment',
        data: {
            user_id: ";
if (!empty($_SESSION["uid"])) echo $_SESSION["uid"];
echo ",
           comment: message,
            product_id: " . $data["productData"]->id . "
        }
    })
    
    const date = new Date();
    let month = (date.getMonth() + 1 < 10) ? '0' + (date.getMonth() + 1)  : (date.getMonth() + 1);
    let full_date = date.getFullYear() + '-' + month + '-' + date.getDate();
    let element = document.createElement('p');
    let text_for_comment = '" . $_SESSION['username'] . "' + ': ' + message + ' ' + full_date;
    let content = document.createTextNode(text_for_comment);
    element.appendChild(content);
    document.getElementById('comments').appendChild(element);
    
    document.getElementById('message').value = '';
};
</script>
";
