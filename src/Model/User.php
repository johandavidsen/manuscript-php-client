<?php

namespace Fjakkarin\Manuscript\Model;

class User
{
    private $id;
    private $name;
    private $email;
    private $phone;

    public function __construct(array $items)
    {
        $this->id = isset($items["ixPersonOwner"]) ? $items["ixPersonOwner"] : null;
        $this->name = isset($items["sPersonOwner"]) ? $items["sPersonOwner"] : null;
        $this->email = isset($items["sEmail"]) ? $items["sEmail"] : null;
        $this->phone = isset($items["sPhone"]) ? $items["sPhone"] : null;
    }
}