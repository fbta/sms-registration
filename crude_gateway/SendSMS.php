<?php

   $url       = "textghana.com/smsconf.php";

   $username = 'freesms007';
   $password = 'freesms';
   $sender   = 'TextGhana';
   $messagetype = 'longSMS';
   $messagetext = $_POST['body'];
   $yourname = $_POST['fname'];
   $gsm = $_POST['phone'];
   $signout = "Free SMS from www.TextGhana.com - A product of Silky I.T. Production";
   $submit = "Send SMS";
    $fields    = array( "username" => $username,
                        "password" => $password,
                        "sender"=>$sender,
                        "messagetype"=>$messagetype,
                        "messagetext"=>$messagetext,
                        "yourname"=> $yourname,
                        "gsm"=> $gsm,
                        "signout"=>$signout,
                        "submit"=>$submit
                        //"type"=> $type,
                       // "bookmark"=>$bookmark
                );

    //url-ify the data for the POST
    foreach($fields as $key=>$value) {
        $fields_string .= $key.'='.$value.'&';
    }
    rtrim($fields_string,'&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_POST,count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

    //execute post
    $result = curl_exec($ch);

    $referer = $_SERVER['HTTP_HOST']."/templates/notification.html";
    header("Location: $referer");
    //close connection
    curl_close($ch);
    
?>