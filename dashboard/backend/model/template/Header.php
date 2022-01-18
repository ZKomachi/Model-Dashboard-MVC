<?php
class Header
{
    // Atributos:
    private $usuario;
    private $addNew;
    private $foto;
    private $company;

    // Métodos especiais:
    public function __construct($usuario = "Sem nome", $foto = "../../../assets/images/avatars/user.jpeg", $company = "Sem nome", $addNew = "")
    {
        $this->setUsuario($usuario);
        $this->setFoto($foto);
        $this->setAddNew($addNew);
        $this->setCompany($company);
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
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     */
    public function setFoto($foto): self
    {
        $this->foto = validateValue($foto);

        return $this;
    }

    /**
     * Get the value of company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     */
    public function setCompany($company): self
    {
        $this->company = $company;

        return $this;
    }
}
