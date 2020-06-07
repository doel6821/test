<?php


$nama= $_POST['nama'];
$hp= $_POST['hp'];
$pesan= $_POST['pesan'];
$usermail= $_POST['email'];
$body= "
Nama : $nama <br/>
HP : $hp <br/>
Email: $usermail <br/>
Pesan: $pesan <br/>

Pesan anda telah kami terima. <br/>
Terima kasih telah menghubungi kami. <br/>";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';



$usermail= $_POST['usermail'];
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth = true; // SMTP authentication
$mail->Host= "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SetFrom("pendidikanitupenting1@gmail.com","email sender");
$mail->Username = "pendidikanitupenting1@gmail.com"; // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "Bismill@h609018"; // Password email
$mail->SetFrom($usermail, 'user');
$mail->AddReplyTo($usermail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($usermail);
if(!$mail->Send())
return false;
else
return true;

}

$to = "abdullah.smg1105@gmail.com"; //email tujuan
$subject = "New email from website Pendidikan ITU Penting"; // subject email
echo"<br/><br/><center><h3>Pesan anda telah terkirim</h3></center>";
Send_Mail($to,$subject,$body);
?>
