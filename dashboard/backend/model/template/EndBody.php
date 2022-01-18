<?php
// Aqui vamos gerar o modelo para criar o script no final do body das páginas:
class EndBody
{
    // Atributos:
    private $addNew;

    // Metodos especiais:
    public function __construct($addNew = "")
    {
        $this->setAddNew($addNew);
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
}
