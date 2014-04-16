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





//Send data (all of these are compulsory except the header one which is optional)
if(mail($to,$subject,$message,$header)){
    //If data sent ok say thank you
    echo '<h2>Thank you for your comment</h2>';
}
    //If data not sent say there is a problem
else{
    echo '<h2>Sorry there has been an error. Please try again.</h2>';
}
}

else{
    include('assets/includes/top.inc');
    include('assets/includes/header.inc');
    echo '
    <h2>Contact Us</h2>

    <form action="redux.php" method="get" id="contact-form">
        <!--add form to collect information: name, email, gender and comment. Name and email are required. -->
        <p>
            <label for="name">Your name:</label>
            <input type="text" name="name" id="name" required />

        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required />

        </p>

        <p>
            <label>Gender:</label>
            Male:
            <input type="radio" name="gender" value="male" checked />
            Female:
            <input type="radio" name="gender" value="female" checked />

        </p>

        <p>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="8" cols="18"></textarea>

        </p>

        <p>
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Send Comment" />

        </p>
        <!-- use styleseet to put element into a table layout (tableless) -->
    </form>';
    }
/*this is a way of keeping the form and mail on one page - so if the submit button is not filled it takes you to the form but the same page. makes less to edit so easier*/
include('assets/includes/footer.inc');
?>