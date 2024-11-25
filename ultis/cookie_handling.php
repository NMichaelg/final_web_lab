<?php
if (isset($_COOKIE['username'])) {
    echo "
        <style>
            #pre_login {
                display: none;
            }
            #post_login{

            }
        </style>
    ";
    if ($_COOKIE['username'] != 'admin'){
        echo "
        <style>
            #admin_only{
                display:none;
            }
        </style>
        ";
    }
    exit;
}
if (!isset($_COOKIE['username'])) {
    echo"
        <style>
            #post_login {
                display: none;
            }
            #pre_login{
                
            }
            #admin_only{
                display:none;
            }
        </style>
        
    ";

}
?>