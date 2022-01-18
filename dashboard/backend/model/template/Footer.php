<?php
class Footer
{
    // Atributos:
    private $addNew;

    // Métodos especiais:
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
