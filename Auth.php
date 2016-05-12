<?php
require_once 'Log.php';



class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt($username, $password){
        if($username == 'guest' && password_verify($password, self::$password)){

            $_SESSION['logged_in_user'] = $username;
            $fileName = new Log('cli');
            $fileName->logInfo("User $username logged in.");
            return true;
        } else {
            $fileName = new Log('cli');
            $fileName->logError("User $username failed to log in!");
            return false;
        }   
    }

    public static function check(){
        if(isset($_SESSION['logged_in_user'])){
            return true;
        }else {
            return false;
        }
    }

    public static function user()
    {
        $_SESSION['logged_in_user'];
    }

    public static function logout()
    {
        session_unset();
        // delete session data on the server and send the client a new cookie
        session_regenerate_id(true);    
    }
}