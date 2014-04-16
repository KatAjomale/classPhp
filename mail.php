<?php
/*Mail Script Page*/

//Set SMTP mail server to send email local testing only remove in production
ini_set('SMTP','mail.british-study.com'); //TODO: Remove when deployed

//Check to see if form has been submitted if not redirect back to form:
if(isset($_GET['submit'])){ /*so if the form has been filled out, all of the following will be performed up to the corresponding closing bracket at the bottom of page*/

//Collect data from form
$name = $_GET['name'];
$email = $_GET['email'];
$gender = $_GET['gender'];
$comment = $_GET['comment'];

//Process data to form variable that can be mailed : $to, $subject, $message and $headers

$to = 'k.ajomale@hotmail.com';
$subject = 'Website comment';
$message = "$name has send a comment. They are $gender and they commented that: $comment";
//message method 1: easiest one to use - the answers in the form are substituted where the variables are.

/*
 $message = $name. 'has send a comment. They are '.$gender.' and they commented that: '.$comment;
*/
//message method 2: the . joins the variables to the message text that's inside single quote marks. need to use it when doing HTML formatting in the email, as you need to use single quotation marks.

/*
$message = $name;
$message .= 'has sent a comment. They are ';
$message .= $gender;
$message .= ' and they commented that';
$message .= $comment;
*/
//message option 3: joins each part of the message onto the last bit of it. only really used when we need to loop the information together

$header = "From: $email";
//when we receive the email, it will tell us who it's from, and if we reply it will go to their email not back to the website

/*to make the page they see when they've submitted the form look the same as the rest of site, add the include files*/
include('assets/includes/top.inc');

include('assets/includes/header.inc');



//Send data (all of these are compulsory except the header one which is optional)
if(mail($to,$subject,$message,$header)){
    //If data sent ok say thank you
    echo '<h2>Thank you for your comment</h2>';
}
    //If data not sent say there is a problem
else{
    echo '<h2>Sorry there has been an error. Please try again.</h2>';
}
} else{
    header('location: contact.php'); /*so if the form has NOT been submitted, the user will be redirected back to the contact page to fill the form again*/
}
include('assets/includes/footer.inc');
?>