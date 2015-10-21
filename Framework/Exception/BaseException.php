<?php

namespace Framework\Exception;

class BaseException extends \Exception
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}