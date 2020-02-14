<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: .././controllers/pe_login.php");
   }
?>