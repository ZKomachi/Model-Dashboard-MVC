<?php
class FooterView
{
    public function generateAdmin($ruta, $addConfig)
    {
        $ano = date("Y");

        echo "
        <footer>
            <!--<span>EMPRESA NOME - © $ano All Rights Reserved</span>
            $addConfig
        </footer>
        ";
    }

    public function generateUsuario($ruta, $addConfig)
    {
        $ano = date("Y");

        echo "
        <footer>
            <!--<span>EMPRESA NOME - © $ano All Rights Reserved</span>
            $addConfig
        </footer>
        ";
    }
}
