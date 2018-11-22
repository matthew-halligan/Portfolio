<?php
// Email handling

$to      = 'matt@halliganwebdevelopment.com';
$subject = 'Page Contact';
$message = 'hello from php. '. $_POST['name'] . '<br>' .$_POST['email'] . '<br>'.$_POST['phone']. '<br>'.$_POST['message'];
$headers = 'From: matt@halliganwebdevelopment.com' . "\r\n" .
    'Reply-To: matt@halliganwebdevelopment.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>

<?php include 'header-v2.php'; ?>


            <main class="main flex-1 d-flex justify-content-center">
                <div class="thank-you-container">

                    <div>
                        Thank You
                    </div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ea facere fugit obcaecati provident rem reprehenderit sequi, soluta suscipit tempore?
                    </div>
                </div>
            </main>

            <?php include 'footer.php'; ?>

    </body>
</html>