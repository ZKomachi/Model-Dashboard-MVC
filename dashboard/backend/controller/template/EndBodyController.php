<?php
class EndBodyController
{
    // Classe que vai chamar o tipo da view:
    public function gerarEndBody($tipoconta, $addConfig = "", $ruta = '../../../')
    {
        $view = new EndBodyView();
        $model = new EndBody($addConfig);
        $addNew = $model->getAddNew();
        switch ($tipoconta) {
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
