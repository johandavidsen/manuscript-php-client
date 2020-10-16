<?php

namespace Fjakkarin\Manuscript\Model;

class Filter
{
    private $type;

    private $id;

    private $name;

    public function __construct(array $properties)
    {
        $this->type = $properties["type"];
        $this->id = $properties["sFilter"];
        $this->name = isset($properties["#cdata-section"]) ? $properties["#cdata-section"] : $properties["#text"] ;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}