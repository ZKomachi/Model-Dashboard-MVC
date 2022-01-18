<?php
class CheckLoginController
{
    // Function check que vai fazer a verificação dos dados e montar o model:
    public function check()
    {
        $view = new CheckLoginView();
        if (
            $_SESSION['id_usuario'] && $_SESSION['chave_secreta'] && $_SESSION['token'] &&
            $_SESSION['id_usuario'] != "" && $_SESSION['chave_secreta'] != "" && isset($_SESSION['tem_acesso'])
        ) {
            // Invoca model para verificar e fazer request na api:
            $model = new CheckLogin($_SESSION["id_usuario"], $_SESSION["chave_secreta"], $_SESSION["token"]);
            $apivalues = $model->checkApi();
            if (isset($apivalues) && !empty($apivalues)) {
                // Check dos valores pela api tem retorno (não é null) então manda para view:
                return $view->check($apivalues);
            } else {
                // Não tem nenhum retorno da api:
                $view->check("");
            }
        } else {
            // Nem tem session iniciada:
            $view->check("");
        }
    }

    public function checkTipoUsuario($tipo)
    {
        $view = new CheckLoginView();
        $tipousuario = existValue($tipo);
        if (
            $_SESSION['id_usuario'] && $_SESSION['chave_secreta'] && $_SESSION['token'] &&
            $_SESSION['id_usuario'] != "" && $_SESSION['chave_secreta'] != "" &&
            isset($_SESSION['tem_acesso']) && $tipousuario != ""
        ) {
            // Invoca model para verificar e fazer request na api:
            $model = new CheckLogin($_SESSION["id_usuario"], $_SESSION["chave_secreta"], $_SESSION["token"]);
            $apivalues = $model->checkApi();
            $model->setTipoUsuario($tipousuario);
            $tipousuario = $model->getTipoUsuario();
            if (isset($apivalues) && !empty($apivalues)) {
                // Check dos valores pela api tem retorno (não é null) então manda para view:
                return $view->sessionUserConfig($apivalues, $tipousuario);
            } else {
                // Não tem nenhum retorno da api:
                return $view->sessionUserConfig("", "");
            }
        } else {
            // Nem tem session iniciada:
            return $view->sessionUserConfig("", "");
        }
    }

    public function getValuesSession()
    {
        $view = new CheckLoginView();
        $tipousuario = existValue("");
        if ($_SESSION['id_usuario'] && $_SESSION['chave_secreta'] && $_SESSION['id_usuario'] != "" && $_SESSION['chave_secreta'] != "") {
            // Invoca model para verificar e fazer request na api:
            $model = new CheckLogin($_SESSION["id_usuario"], $_SESSION["chave_secreta"], $_SESSION["token"]);
            $apivalues = $model->checkApi();
            if (isset($apivalues) && !empty($apivalues)) {
                // Check dos valores pela api tem retorno (não é null) então manda para view:
                return $view->getInfoUser($apivalues);
            } else {
                // Não tem nenhum retorno da api:
                return $view->getInfoUser("");
            }
        } else {
            // Nem tem session iniciada:
            return $view->getInfoUser("");
        }
    }

    // Function check que vai fazer a verificação dos dados e montar o model, só que em caso de false, não faz redirect:
    public function checkLogin()
    {
        $view = new CheckLoginView();
        if (
            isset($_SESSION['id_usuario']) && isset($_SESSION['chave_secreta']) && isset($_SESSION['token'])
            && $_SESSION['id_usuario'] != "" && $_SESSION['chave_secreta'] != ""
        ) {
            // Encaminha os valores para o model para que seja feita a verificação e envio de dados para api
            $model = new CheckLogin($_SESSION["id_usuario"], $_SESSION["chave_secreta"], $_SESSION["token"]);
            $apivalues = $model->checkApi();
            if (isset($apivalues) && !empty($apivalues)) {
                return $view->loginCheck($apivalues);
            } else {
                echo "<script>console.log('Faça login!');</script>";
            }
        } else {
            echo "<script>console.log('Faça login!!');</script>";
        }
    }
}
