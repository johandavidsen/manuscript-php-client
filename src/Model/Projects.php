<?php

namespace Fjakkarin\Manuscript\Model;

/**
 * Class Projects
 * @package Fjakkarin\Manuscript\Model
 */
class Projects
{
    private $id;
    private $title;
    private $deleted;

    /**
     * Projects constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->id = isset($items["ixProject"]) ? $items["ixProject"] : null;
        $this->title = isset($items["sProject"]) ? $items["sProject"] : null;
        $this->deleted = isset($items["fDeleted"]);
    }
}