<?php
class HeadView
{
    public function generateAdmin($title, $addConfig, $ruta, $checkLogin)
    {
        /*
        if ($checkLogin) {
            //Implementa a verificação do login do dashboard dentro do sistema
            $session = new CheckLoginController();
            $session->check();
        }
        */
        echo "
        <!doctype html>
        <html lang=\"pt-br\">
        
            <head>
                <!-- Required meta tags -->
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <!--favicon-->
                <link rel=\"icon\" href=\"" . $ruta . "assets/images/logo.png\" type=\"image/png\" />
                <!-- TITLE -->
                <title>$title</title>
                <!-- Jquery -->
                <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
                <!-- ADD CONFIG -->
                $addConfig
            </head>
        ";
    }

    public function generateUsuario($title, $addConfig, $ruta, $checkLogin)
    {
        /*
        if ($checkLogin) {
            //Implementa a verificação do login do dashboard dentro do sistema
            $session = new CheckLoginController();
            $session->check();
        }
        */
        echo "
        <!doctype html>
        <html lang=\"pt-br\">
        
            <head>
                <!-- Required meta tags -->
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <!--favicon-->
                <link rel=\"icon\" href=\"" . $ruta . "assets/images/logo.png\" type=\"image/png\" />
                <!-- TITLE -->
                <title>$title</title>
                <!-- Jquery -->
                <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
                <!-- ADD CONFIG -->
                $addConfig
            </head>
        ";
    }
}
