<?php
class HeadController
{
    // Function que vai chamar o tipo da view:
    public function gerarHead($tipoconta, $titulo = "", $addConfig = "", $ruta = '../../../', $checkLogin = true)
    {
        $view = new HeadView();
        $model = new Head($titulo, $addConfig);
        $title = $model->getTitle();
        $addNew = $model->getAddNew();
        switch ($tipoconta) {
            case "admin":
                $view->generateAdmin($title, $addNew, $ruta, $checkLogin);
                break;

            case "usuario":
                $view->generateUsuario($title, $addNew, $ruta, $checkLogin);
                break;

            default:
                // Tipo de conta não valida, não retorna nada
                break;
        }
    }
}
