<?php $title = 'Contact'; ?>
<?php include 'header-v2.php'; ?>
<?php include 'email_handler.php';?>

            <main class="main flex-1 d-flex justify-content-center">
                <div class="contact-container">

                    <div class="contact-item-1 padding-1rem">
                        <p>Thank you for your interest in my services
                        In your message be sure to leave a few details about the site's
                        purpose and what you would like to accomplish by having this site made.
                        I'll be in contact shortly after receiving your message</p>
                    </div>


                    <div class="contact-item-2 padding-1rem">
                        <form class="width-100" action="contact.php" method="post">
                            <input type="hidden" name="sendmail" value="1">
                            <div class="contact-input-wrapper">
                                <input type="text" class="contact-form-input-element" name="name" placeholder="Your Name">
                            </div>

                            <div class="contact-input-wrapper">
                                <input type="email" class="contact-form-input-element" name="email" placeholder="Your Email">
                            </div>

                            <div class="contact-input-wrapper">
                                <input type="text" class="contact-form-input-element" name="phone" placeholder="Your Phone">
                            </div>

                            <div class="contact-input-wrapper">
                                <textarea class="contact-form-input-element" name="message" placeholder="Your Message"></textarea>
                            </div>

                            <div class="contact-form-submit-wrapper contact-input-wrapper">
                                <input type="submit" class="contact-form-submit-button" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            <?php include 'footer.php'; ?>

    </body>
</html>