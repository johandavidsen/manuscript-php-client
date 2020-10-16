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

    private $startDate;

    private $startNote;

    /**
     * Milestone constructor.
     * @param array $item
     */
    public function __construct(array $item)
    {
        $this->project = isset($item["sProject"]) ? $item["sProject"] : null;
        $this->milestone = isset($item["sFixFor"]) ? $item["sFixFor"] : null;
        $this->startDate = !is_null($item["dt"]) ? $item["dt"] : null;
        $this->startNote = !is_null($item["sStartNote"]) ? $item["sStartNote"] : null;
    }

    /**
     * @return mixed|null
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return mixed|null
     */
    public function getMilestone()
    {
        return $this->milestone;
    }

    /**
     * @return mixed|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed|null
     */
    public function getStartNote()
    {
        return $this->startNote;
    }
}