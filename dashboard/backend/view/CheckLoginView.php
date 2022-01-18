<?php
class CheckLoginView
{
    public function getInfoUser($values)
    {
        if (isset($values) && !empty($values)) {
            $id = isset($values[0]->id) ? $values[0]->id : 0;

            $final = array("id" => $id);

            return $final;
        }
    }

    public function check($validate)
    {
        if (isset($validate) && !empty($validate)) {
            // Caso onde é verdadeiro.
            $id_usuario = isset($validate[0]->id_usuario) ? $validate[0]->id_usuario : "";
            $chave_secreta = isset($validate[0]->chave_secreta) ? $validate[0]->chave_secreta : "";
            $tem_acesso = isset($validate[0]->tem_acesso) ? $validate[0]->tem_acesso : 0;
            $tipo_conta = isset($validate[0]->tipo_conta) ? $validate[0]->tipo_conta : 0;
            $token = isset($validate[0]->token) ? $validate[0]->token : "";

            if (
                isset($_SESSION['id_usuario']) && isset($_SESSION['chave_secreta']) && isset($_SESSION['token']) &&
                $id_usuario == $_SESSION['id_usuario'] && $chave_secreta == $_SESSION['chave_secreta'] &&
                $token == $_SESSION['token']
            ) {
                if ($_SESSION['tem_acesso'] != false && $_SESSION['tem_acesso'] != null && $tem_acesso == $_SESSION['tem_acesso']) {
                    $diretorios = $_SERVER["REQUEST_URI"];
                    $list = explode("/", $diretorios);

                    if (in_array("app", $list)) {
                        switch ($tipo_conta) {
                            case 1:
                                // Tipo conta adm/pro:
                                if (in_array("pro", $list)) {
                                    // Esta no dashboard correto:
                                    echo "<script>console.log('Session iniciada.');</script>";
                                    return $this->getInfoUser($validate);
                                } else {
                                    // Esta no lugar da app incorreto, faz redirect:
                                    header("Location: ../../../pages/home/");
                                    exit();
                                }
                                break;

                            case 2:
                                // Tipo conta usuario:
                                if (in_array("usuario", $list)) {
                                    // Esta no dashboard correto:
                                    echo "<script>console.log('Session iniciada.');</script>";
                                    return $this->getInfoUser($validate);
                                } else {
                                    // Esta no lugar da app incorreto, faz redirect:
                                    header("Location: ../../../pages/home/");
                                    exit();
                                }
                                break;

                            default:
                                // Tipo de conta não definida
                                session_destroy();
                                header("Location: ../../../../index.php?msg=sem-acesso");
                                exit();
                                break;
                        }
                    } else {
                        switch ($tipo_conta) {
                            case 1:
                                // Tipo conta adm/pro:
                                // Esta no dashboard incorreto, faz redirec:t
                                header("Location: app/pages/home/");
                                exit();
                                break;

                            case 2:
                                // Tipo conta usuario:
                                // Esta no dashboard incorreto, faz redirect:
                                header("Location: app/pages/home/");
                                exit();
                                break;

                            default:
                                // Tipo de conta não definida
                                session_destroy();
                                header("Location: index.php?msg=sem-acesso");
                                exit();
                                break;
                        }
                    }
                } else {
                    session_destroy();
                    $diretorios = $_SERVER["REQUEST_URI"];
                    $list = explode("/", $diretorios);
                    if (in_array("app", $list)) {
                        header("Location: ../../../index.php?msg=sem-acesso");
                        exit();
                    } else {
                        header("Location: index.php?msg=sem-acesso");
                        exit();
                    }
                }
            } else {
                session_destroy();
                $diretorios = $_SERVER["REQUEST_URI"];
                $list = explode("/", $diretorios);
                if (in_array("app", $list)) {
                    header("Location: ../../../index.php?msg=token-invalido");
                    exit();
                } else {
                    header("Location: index.php?msg=token-invalido");
                    exit();
                }
            }
        } else {
            session_destroy();
            $diretorios = $_SERVER["REQUEST_URI"];
            $list = explode("/", $diretorios);
            if (in_array("app", $list)) {
                header("Location: ../../../index.php?msg=sem-token");
                exit();
            } else {
                header("Location: index.php?msg=sem-token");
                exit();
            }
        }
    }

    public function sessionUserConfig($validate, $tipoUsuario)
    {
        if (isset($validate) && !empty($validate)) {
            // Caso onde é verdadeiro.
            $id_usuario = isset($validate[0]->id_usuario) ? $validate[0]->id_usuario : "";
            $chave_secreta = isset($validate[0]->chave_secreta) ? $validate[0]->chave_secreta : "";
            $tem_acesso = isset($validate[0]->tem_acesso) ? $validate[0]->tem_acesso : false;
            $tipo_conta = isset($validate[0]->tipo_conta) ? $validate[0]->tipo_conta : 0;
            $token = isset($validate[0]->token) ? $validate[0]->token : "";

            if (
                isset($_SESSION['id_usuario']) && isset($_SESSION['chave_secreta']) && isset($_SESSION['token']) &&
                $id_usuario == $_SESSION['id_usuario'] && $chave_secreta == $_SESSION['chave_secreta'] &&
                $token == $_SESSION['token']
            ) {
                if ($_SESSION['tem_acesso'] != false && $_SESSION['tem_acesso'] != null && $tem_acesso == $_SESSION['tem_acesso']) {
                    // Verifica tipo de conta:
                    switch ($tipo_conta) {
                        case 1:
                            // Tipo conta adm/pro:
                            if ($tipoUsuario == "pro") {
                                return 200;
                            } else {
                                return 400;
                            }
                            break;

                        case 2:
                            // Tipo conta usuario:
                            if ($tipoUsuario == "usuario") {
                                return 200;
                            } else {
                                return 400;
                            }
                            break;

                        default:
                            // Tipo de conta não definida
                            return 400;
                            break;
                    }
                } else {
                    // sem acesso:
                    return "sem-acesso";
                }
            } else {
                // invalid:
                return "token-invalido";
            }
        } else {
            // no token:
            return "sem-token";
        }
    }

    public function loginCheck($validate)
    {
        if (isset($validate) || !empty($validate)) {
            // Caso onde é verdadeiro.
            $id_usuario = isset($validate[0]->id_usuario) ? $validate[0]->id_usuario : "";
            $chave_secreta = isset($validate[0]->chave_secreta) ? $validate[0]->chave_secreta : "";
            $tem_acesso = isset($validate[0]->tem_acesso) ? $validate[0]->tem_acesso : 0;
            $tipo_conta = isset($validate[0]->tipo_conta) ? $validate[0]->tipo_conta : 0;
            $token = isset($validate[0]->chave_secreta) ? $validate[0]->token : "";

            if (
                isset($_SESSION['id_usuario']) && isset($_SESSION['chave_secreta']) && isset($_SESSION['token'])
                && $id_usuario == $_SESSION['id_usuario'] && $chave_secreta == $_SESSION['chave_secreta']
                && $token == $_SESSION["token"] && $id_usuario != "" && $chave_secreta != ""
            ) {
                // Caso onde a sessão está iniciada, verifica se ele tem acesso:
                if (
                    $_SESSION['tem_acesso'] != false && $_SESSION['tem_acesso'] != null 
                    && $tem_acesso == $_SESSION['tem_acesso']
                ) {
                    // Verifica o tipo de conta para ver para qual dashboard vai ser redirecionado:
                    switch ($tipo_conta) {
                        case 1:
                            // Tipo conta adm/pro:
                            // Esta no dashboard incorreto, faz redirect
                            header("Location: pages/home/");
                            exit();
                            break;

                        case 2:
                            // Tipo conta usuario:
                            // Esta no dashboard incorreto, faz redirect:
                            header("Location: pages/home/");
                            exit();
                            break;

                        default:
                            // Tipo de conta não definida
                            session_destroy();
                            header("Location: index.php?msg=semacesso");
                            exit();
                            break;
                    }
                }
            }
        }
    }
}
