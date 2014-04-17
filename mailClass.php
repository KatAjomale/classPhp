

<?php
    class MailClass{
        public $name;
        public $email;
        public $gender;
        public $comment;
        public $to;
        public $subject;
        public function __construct(){
            ini_set('SMTP','mail.british-study.com');
            //Collect form data
            $this->name = $_GET['name'];
            $this->email = $_GET['email'];
            $this->gender = $_GET['gender'];
            $this->comment = $_GET['comment'];
    }
        public function sendEmail(){
    //Prepare to send email
    $this->to = 'daniel.stewart93@gmail.com';
    $this->subject = 'Web Site Comment';
    $this->headers = "From: $this->email";
    $this->message = "$this->name has sent a comment. They are $this->gender and they commented that: $this->comment";

    //Send email
    if(mail($this->to,$this->subject,$this->message,$this->headers)){
        $this->response = '<h3>Thank you for your comment, we will contact you shortly.</h3>';
    }else{
        $this->response = '<h3>Sorry there has been an error. Please <a href="javascript:history.back()">try again</a></h3>';
    }
    return $this->response;
    }
}
?>
