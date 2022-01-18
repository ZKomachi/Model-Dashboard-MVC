<?php
class Head
{
    // Atributos:
    private $addNew;
    private $title;

    // Metodos especiais:
    public function __construct($title, $addNew = "")
    {
        $this->setTitle($title);
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

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = validateValue($title);

        return $this;
    }
}
