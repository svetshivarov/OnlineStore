<?php
require_once "navigation.php";


    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != '') {

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            //submit the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "svetlinshivarov@abv.bg";
            $body = "";

            $body .= "From :".$name. "\r\n";
            $body .= "Email :".$email. "\r\n";
            $body .= "Message :".$message. "\r\n";

             mail($to,$subject,$body);

            if($message_sent = true) {
                echo "<p class='submit-successful'><i>Thank you for submitting the form! We will contact you as soon as possible.</i></p>";
            }
        }
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Contacts</title>
        <link rel='stylesheet' type='text/css' href='/OnlineStore/views/css/style.css'>
    </head>
    <body>
    <div class="contacts-info">
        <p>You can also find us in Staples Cener in LA, California</p>
        <p>Address: 1111 S Figueroa St, Los Angeles, CA 90015, USA</p>
        <p>If you have any quations, feel free to contact us via the contact form below!</p>
        <a href="https://www.google.com/maps/place/%D0%A1%D1%82%D0%B5%D0%B9%D0%BF%D1%8A%D0%BB%D1%81+%D0%A6%D0%B5%D0%BD%D1%82%D1%8A%D1%80/
        @34.0441412,-118.281797,14.41z/data=!4m9!1m2!2m1!1sstaples+center!3m5!1s0x80c2c7b85dea2a93:0x1ff47c3ceb7bb2d5!8m2!3d34.0430175!4d-118.2672541!
        15sCg5zdGFwbGVzIGNlbnRlcloQIg5zdGFwbGVzIGNlbnRlcpIBBWFyZW5hmgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJKZEZsWWRUWjNSUkFC" name="map" class="map">MAP</a>
    </div>
    <div class="contacts-container">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name <span class="required-field">*</span> </label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required-field">*</span> </label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
            </div>
            <div class="form-group">
                <label for="question">Message <span class="required-field">*</span> </label>
                <textarea type="text" class="form-control" id="message" placeholder="Enter your message here" name="message" required></textarea>
            </div>
            <div class="div-btn-submit">
            <button type="submit" onclick="SubmitAlert()" class="btn btn-primary btn-submit">Submit</button>
            </div>
<!--            След попълване и натискане на бутона Submit ще се изпраща имейл-->
        </form>
        <p>The fields marked with <span class="required-field">*</span> are mandatory!</p>
    </div>
    </body>
</html>
    <script>

        function SubmitAlert() {
            var submit_alert;
            if (confirm("Send the contact form?")) {
                submit_alert = "Contact form was sent successfully";
            } else {
                submit_alert = "Contact form was not sent";
            }
            document.getElementsByClassName("btn-submit").innerHTML = submit_alert;
        }
    </script>




<?php
require_once "footer.php";
