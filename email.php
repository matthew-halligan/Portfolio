<?php
/**
 * Created by PhpStorm.
 * User: rootmaster
 * Date: 11/10/18
 * Time: 04:49 AM
 */
$to      = 'msamuelurias@gmail.com';
$subject = 'the subject 2';
$message = 'hello from php';
$headers = 'From: test@evimus.com' . "\r\n" .
    'Reply-To: test@evimus.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo '<div>Done</div>';
echo phpinfo();