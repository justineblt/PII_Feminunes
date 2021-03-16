<?php 

class Session{
    public function __construct(){
        session_start();
    }
public function setFlash($message){
    $_SESSION['flash'] = $message;
}

public function flash() {
if(isset($_SESSION['flash'])){
    ?> 
    <div class="alert alert-danger">
        <a class="close"> x </a>
        <?php echo $_SESSION['flash']; ?>
    </div>
    <?php
    unset($_SESSION['flash']);
        }
    }
}


function msg_erreur($title, $message)
{
  $showmodalerror=true;
}
?>



