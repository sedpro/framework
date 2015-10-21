<?php

namespace Framework\Exception;

class NotFoundException extends BaseException
{
    public function __construct($message="Page not found", $code = 404) {
        parent::__construct($message, $code);
    }
}