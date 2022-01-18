<?php
class FooterController
{
    // Function que vai chamar o tipo da view:
    public function gerarFooter($tipoconta, $addConfig = "", $ruta = '../../../')
    {
        $view = new FooterView();
        $model = new Footer($addConfig);
        $addNew = $model->getAddNew();
        switch($tipoconta) {
            case "admin": 
                $view->generateAdmin($ruta, $addNew);
                break;
                
            case "usuario":
                $view->generateUsuario($ruta, $addNew);
                break;

            default:
                // Tipo de conta não valida, não retorna nada
                break;
        }
    }
}
