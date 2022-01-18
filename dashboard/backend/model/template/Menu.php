<?php
class Menu
{
    // Atributos:
    private $usuario;
    private $idusuario;
    private $addNew;
    private $ativo;

    // Métodos especiais:
    public function __construct($ativo, $idusuario, $usuario = "Visitante", $addNew = "")
    {
        $this->setAtivo($ativo);
        $this->setUsuario($usuario);
        $this->setAddNew($addNew);
        $this->setIdusuario($idusuario);
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario): self
    {
        $this->usuario = validateValue($usuario);

        return $this;
    }

    /**
     * Get the value of addNew
     */
    public function getAddNew()
    {
        return $this->addNew;
    }

    /**
     * Set the value of addNew
     */
    public function setAddNew($addNew): self
    {
        $this->addNew = $addNew;

        return $this;
    }

    /**
     * Get the value of ativo
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     */
    public function setAtivo($ativo): self
    {
        $this->ativo = validateValue($ativo);

        return $this;
    }

    /**
     * Get the value of idusuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     */
    public function setIdusuario($idusuario): self
    {
        $this->idusuario = validateValue($idusuario);

        return $this;
    }
}
