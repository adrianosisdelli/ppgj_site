<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';?>


<section class="candidatar">  
  <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header text-left">
          <a href="trabalheconosco.php"><i class="fa fa-close pull-right text-danger" aria-hidden="true"></i></a>
          Candidatar-se a esta vaga
        </div>
        <div class="card-body">
          <h6 class="card-text text-left">Insira as informações para iniciar a candidatura para a posição de....</h6>
          <h6 class="card-text text-left">* Informações obrigatórias - (Contato com prazo determinado)</h6>

          
           <form>
            <div class="form-row">
              <div class="col">
                  <input type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Nome Completo">
              </div>
             
            </div>
            <br>
              <p class="text-left"><b>Currículo</b></p>
              <input type="file" name="curriculo" class="text-danger pull-left">
              <button type="submit" class="btn btn-danger pull-right">Enviar</button>
          </form>
        </div>

        <div class="card-footer text-muted text-left">
          <h6>O GRUPO PASQUALI coleta informações fornecidas com o único propósito de considerar seu interesse na vaga oferecida.</h6>
          <a href="trabalheconosco.php" class="text-danger pull-right">Cancelar</a>
        </div>
      </div> 


    </div>
    <div class="col-md-3">      
    </div> 
</section>



<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


<?php include 'inc/footer.php';?>