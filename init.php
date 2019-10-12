<?php

 ob_start();
session_start();
function logged_in() {
    
    if(isset($_SESSION['email'])) {
        return true;
            } else {
                return false;
            }
    
}




