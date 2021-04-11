
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        class SendMail
        {
            public function send($title, $content, $nTo, $mTo, $diachicc ='')
            {
                include 'library.php'; // include the library file
                require 'vendor/autoload.php';        
                $mail = new PHPMailer(true);      
                               // Passing `true` enables exceptions
                try {
                    
                    //Server settings
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mail sử dụng SMTP
                    $mail->Host = 'smtp.gmail.com';  // Chỉ định máy chủ SMTP chính và dự phòng
                    $mail->SMTPAuth = true;                               // Kích hoạt xác thực SMTP
                    $mail->Username = 'sieunhankubetv@gmail.com';                 // SMTP username
                    $mail->Password = 'rrpjgzhhuslapzyy';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Kích hoạt mã TLS, `ssl` also accepted
                    $mail->Port = 587;                                 // Cổng TCP để kết nối với
                    // $mail->SMTPOptions = array(
                    //     'ssl' => array(
                    //         'verify_peer' => false,
                    //         'verify_peer_name' => false,
                    //         'allow_self_signed' => true
                    //     )
                    // );
        
                    //Recipients
                    $mail->setFrom('sieunhankubetv@gmail.com', 'Forgot Password');
                    $mail->addAddress($mTo, $nTo);     // Add a recipient
                    //$mail->addAddress('ellen@example.com');               // Name is optional
                    //$mail->addReplyTo('duocnguyenit1994@gmail.com', 'Information');
        
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject =  "=?utf-8?b?".base64_encode($title)."?=";
                    $mail->Body    = $content;
                    $mail->AltBody = '';
        
                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
        }
