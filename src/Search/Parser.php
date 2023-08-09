<?php
namespace App\Search;

class Parser
{
    private $regEx = '/^[0-9]+\s*x\s*[0-9]+$/';

    public function getRegEx(): string
    {
        return $this->regEx;
    }

    public function setRegEx(string $newRegEx)
    {
        $this->regEx = $newRegEx;
    }

    public function parse(string $value)
    {
        return \preg_match('/^[0-9]+\s*x\s*[0-9]+$/', $value);
    }
}
