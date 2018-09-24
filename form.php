<?php
 include 'top.php';
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// We print out the post array so that we can see our form is working.
// if ($debug){  // uncomment later if necessary
    print '<p>Post Array:</p><pre>';
    print_r($_POST);
    print '</pre>';
// } 

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.

$thisURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form

$name = "";
$email = "";
$phone = "";
$message = "";
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$nameERROR = false;
$emailERROR = false;
$phoneERROR = false;
$messageERROR = false;
////%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

//array used to hold form values that will be written to a CSV file
$dataRacord = array();

// Have we mailed the information to the user?
$mailed = false;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck($thisURL)) {
        $msg = '<p>Sorry you cannot access this page. ';
        $msg .= 'Security breach detected and reported. </p>';
        die($msg);
    }
    
    
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.
    $name = filter_var($_POST["txtName"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["intPhone"], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST["txtMessage"], FILTER_SANITIZE_STRING);
    $dataRacord[] = $name . $email . $phone . $message;
    
    
    
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.
    //name
    if($name == "") {
        $errorMsg[] .= "Please enter your name.";
        $nameERROR = true;
    }elseif(!verifyAlphaNum($name)){
        $errorMsg[] = "Your name appears to have extra characters.";
        $nameERROR = true;
    }
    // email 
    if ($email == "") {    
        $errorMsg[] .= 'Please enter your email address.';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] .= 'Your email address appears to be incorrect.';
        $emailERROR = true;
    }
    //Phone number
    if ($phone == "") {
        $errorMsg[] .= "Please enter your phone number.";
        $phoneERROR = true;
    }
    //Message
    if ($message == "") {
        $errorMsg[] .= "Please enter a quick description of your project.";
        $messageERROR = true;
    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //    
    if (!$errorMsg){
        if ($debug)
            print PHP_EOL . "<p>Form is valid</p>";
    
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.
    
    $myFolder = 'data/';
    
    $myFileName = 'registration';
    
    $fileExt = '.csv';
    
    $filename = $myFolder . $myFileName . $fileExt;
    if ($debug) print PHP_EOL . '<p>filename is ' . $filename;
    
    //now open the file for append
    $file = fopen($filename, 'a');
    
    //write the form information
    fputcsv($file, $dataRacord);
    
    //close the file;
    fclose($file);
    
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2f Create message
    //
    // build a message to display on the screen in section 3a and to mail
    // to the person filling out the form (section 2g).
    
    $message = '<h2>Your information.</h2>';
    
    foreach ($_POST as $htmlName => $value){
        
        $message .= '<p>';
        // breaks up the form names into words. for example
        // txtFirstName becomes First Name
        $camelCase = preg_split('/(?=[A-Z])/', substr($htmlName, 3));

        foreach ($camelCase as $oneWord) {
            $message .= $oneWord . ' ';
        }
     
        $message .= ' = ' . htmlentities($value, ENT_QUOTES, "UTF-8") . '</p>';
    }

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g Mail to user
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $to = $email;  // the person who filled out the form
        $cc = '';
        $bcc = '';
        
        $from = 'Matt Halligan <halligan@webdesigns.com>';
        
        $subject = "Thank You for Contacting Halligan's Web Design!";
        
        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
    
    
    } // end for is valid
    
    
} // ends if form was submitted.


//#############################################################################
//
// SECTION 3 Display Form
//
?>

<article id="main">
    <h2>My Form</h2>
    <?php
    //####################################
    //
    // SECTION 3a. 
    // 
    // If its the first time coming to the form or there are errors we are going
    // to display the form.
    if (isset($_POST['btnSubmit']) AND empty($errorMsg)) {  
        print '<h2>Thank you for getting in contact.  Expect to hear back soon.</h2>';
        
        print '<p> For your records a copy of this data has ';
        
        if (!$mailed) {
            print "not ";
        }
        
        print 'been sent:</p>';
        print '<p>To: ' . $email . '</p>';
        
        print $message;        
    } else {
        print '<h2>Contact</h2>';
        
        //####################################
        //
        // SECTION 3b Error Messages
        //
        // display any error messages before we print out the form
        
        if ($errorMsg) {
            print '<div id="errors">' . PHP_EOL;
            print '<h2>Your form has the following errors that need to be fixed.</h2>'.PHP_EOL;
            print '<ol>' .PHP_EOL;
            
            foreach ($errorMsg as $err) {
                print '<li>' . $err . '</li>' . PHP_EOL;
            }
            
            print '</ol>' . PHP_EOL;
            print '</div>' . PHP_EOL;
        }
        
        //####################################
        //
        // SECTION 3c html Form
        //
        /* Display the HTML form. note that the action is to this same page. $phpSelf
            is defined in top.php
            NOTE the line:
            value="<?php print $email; ?>
            this makes the form sticky by displaying either the initial default value (line ??)
            or the value they typed in (line ??)
            NOTE this line:
            <?php if($emailERROR) print 'class="mistake"'; ?>
            this prints out a css class so that we can highlight the background etc. to
            make it stand out that a mistake happened here.
       */
        
    ?> 
    
    <form action="<?php print $phpSelf; ?>"
          id="frmRegister"
          method="post">
            
        <fieldset class="contact">
            <legend>Contact Information</legend>
            
            <p>
                <label class="required" for="txtName"></label>
                <input 
                    <?php if ($nameERROR)print 'class="mistake';?>
                    id="txtName"
                    maxlength="45"
                    name='txtName'
                    onfocus="this.select()"
                    placeholder="Name*"
                    tabindex="120"
                    type="text"
                    value="<?php print $name; ?>"
                >
            </p>
            <p>
                <label class="required"></label>
                <input
                   <?php if ($emailERROR)print 'class="mistake';?>
                    id="txtEmail"
                    maxlength="100"
                    name="txtEmail"
                    placeholder="Email*"
                    tabindex="121"
                    type="email"
                    value="<?php print $email; ?>"
                >
            </p>
            
            <p>
                <label class='required'></label>
                <input
                    <?php if ($phoneERROR)print 'class="mistake';?>
                    id="txtPhone"
                    maxlength="12"
                    name="intPhone"
                    placeholder="Phone / numbers only"
                    tabindex="122"
                    type="tel"
                    value="<?php print $phone; ?>"
                >   
            </p>
            <p>
                <label class='required'></label>
                <textarea
                    <?php if ($messageERROR)print 'class="mistake';?>
                    id="txtMessage"
                    maxlength="2000"
                    name="txtMessage"
                    placeholder="Message*"
                    tabindex="123"
                    
                    
                    > </textarea>
            </p>
            
            
        </fieldset><!-- ends contact-->
        
        
  
        
        <fieldset class="buttons">
            <legend></legend>
            <input class="button" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Send" >
        </fieldset> <!-- ends buttons -->
    </form>
    
    <?php
    }
    ?>
    
    
</article>


<?php    include 'footer.php';?>


</body>
</html>


    
 