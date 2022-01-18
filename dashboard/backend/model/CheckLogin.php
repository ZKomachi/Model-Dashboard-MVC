<?php
class CheckLogin
{
    // Atributos:
    private $id_usuario;
    private $chave_secreta;
    private $tipo_usuario;
    private $token;

    // Metodos especiais
    public function __construct($id_usuario, $chave_secreta, $token = "", $tipo_usuario = 0)
    {
        $this->setIdUsuario($id_usuario);
        $this->setChaveSecreta($chave_secreta);
        $this->setToken($token);
        $this->setTipoUsuario($tipo_usuario);
    }

    /**
     * Get the value of id_usuario
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     */
    public function setIdUsuario($id_usuario): self
    {
        $this->id_usuario = validateValue($id_usuario);

        return $this;
    }

    /**
     * Get the value of chave_secreta
     */
    public function getChaveSecreta()
    {
        return $this->chave_secreta;
    }

    /**
     * Set the value of chave_secreta
     */
    public function setChaveSecreta($chave_secreta): self
    {
        $this->chave_secreta = validateValue($chave_secreta);

        return $this;
    }

    /**
     * Get the value of tipo_usuario
     */
    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * Set the value of tipo_usuario
     */
    public function setTipoUsuario($tipo_usuario): self
    {
        $this->tipo_usuario = validateValue($tipo_usuario);

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     */
    public function setToken($token): self
    {
        $this->token = validateValue($token);

        return $this;
    }

    // Métodos publicos:
    public function validateValues()
    {
        $id_usuario = $this->getIdUsuario();
        $chave_secreta = $this->getChaveSecreta();
        $token = $this->getToken();
        $tipo_usuario = $this->getTipoUsuario();

        if ($id_usuario && is_null($id_usuario)) {
            // validate id usuario:
            return 'Invalid id user';
        } else if ($chave_secreta && is_null($chave_secreta)) {
            // validate chave secreta
            return 'Invalid chave secreta';
        } else if ($token && is_null($token)) {
            // validate token
            return 'Invalid token';
        } else if ($tipo_usuario && is_null($tipo_usuario)) {
            // validate tipo_usuario
            return 'Invalid tipo_usuario';
        } else {
            return 200;
        }
    }

    // Function que vai fazer o request para a api para verificar dados
    public function checkApi()
    {
        $validate = $this->validateValues();
        if ($validate == 200) {
            // Valores são válidos, faz request para api
            // Recolhe dados 
            $id_usuario = $this->getIdUsuario();
            $chave_secreta = $this->getChaveSecreta();
            $token = $this->getToken();
            $tipo_usuario = $this->getTipoUsuario();

            // Monta valores em array para enviar na requisicao pra api
            $values = array("id_usuario" => $id_usuario, "chave_secreta" => $chave_secreta, "tipo_usuario" => $tipo_usuario);

            // Faz request na api:
            $request = new RequestApi("/url-check-usuario-sem-dominio", $values, "POST", $token);
            $sendApi = $request->sendCurl();
            return $sendApi;
        } else {
            return array();
        }
    }
}
