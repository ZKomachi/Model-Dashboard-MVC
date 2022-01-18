<?php
class MenuController
{
    // Function que vai chamar o tipo da view:
    public function gerarMenu($tipoconta, $ativo, $idusuario, $usuario, $addConfig = "", $ruta = '../', $rutaAssets = "../../../")
    {
        $view = new MenuView();
        $model = new Menu($ativo, $idusuario, $usuario, $addConfig);
        $addNew = $model->getAddNew();
        switch ($tipoconta) {
            case "admin":
                $view->generateAdmin($usuario, $ativo, $addNew, $ruta, $rutaAssets);
                break;

            case "usuario":
                $view->generateUsuario($usuario, $ativo, $addNew, $ruta, $rutaAssets);
                break;

            default:
                // Tipo de conta não valida, não retorna nada
                break;
        }
    }
}
