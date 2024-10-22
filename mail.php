<?php
    $errors = '';
    $myemail = 'onstyle134@gmail.com'; //<-----Put Your email address here.
    $email = $_POST['person-email'];

    $to = $myemail;
    $email_subject = "Реклама или Сотрудничество";
    $email_body = "E-mail с сайта для связи по рекламе или сотрудничеству: $email";
    mail($to,$email_subject,$email_body);
    
    //redirect to the 'thank you' page
    
    header("Location: ./success.html");
?>