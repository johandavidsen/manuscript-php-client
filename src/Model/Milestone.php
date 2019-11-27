<?php

namespace Fjakkarin\Manuscript\Model;

/**
 * Class Milestone
 * @package Fjakkarin\Manuscript\Model
 */
class Milestone
{
    private $project;

    private $milestone;

    /**
     * Milestone constructor.
     * @param array $item
     */
    public function __construct(array $item)
    {
        if (!isset($item["fRallyDeleted"])) {
            $this->project = isset($item["sProject"]) ? $item["sProject"] : null;
            $this->milestone = isset($item["sFixFor"]) ? $item["sFixFor"] : null;
        }
    }
}