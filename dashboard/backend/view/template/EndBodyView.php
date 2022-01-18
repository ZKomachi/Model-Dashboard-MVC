<?php
class EndBodyView
{
    public function generateAdmin($ruta, $addConfig)
    {
        echo "
            <!-- JS CONFIG -->
            <script src=\"" . $ruta . "assets/js/main.js\"></script>
            $addConfig
        ";
    }

    public function generateUsuario($ruta, $addConfig)
    {
        echo "
            <!-- JS CONFIG -->
            <script src=\"" . $ruta . "assets/js/main.js\"></script>
            $addConfig
        ";
    }
}
