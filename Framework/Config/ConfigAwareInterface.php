<?php

namespace Framework\Config;

interface ConfigAwareInterface
{
    public function setConfig($config);

    public function getConfig();
}