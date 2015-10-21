<?php

namespace Framework\Config;

trait ConfigAware
{
    protected $config = null;

    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * If $key is null, returns all config, if $key is defined, returns an entry from config
     *
     * @param null|string $key
     * @return null|string|array
     * @throws \Framework\Exception\BaseException
     */
    public function getConfig($key = null)
    {
        if (is_null($key)) {
            return $this->config;
        }

        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        throw new \Framework\Exception\BaseException('no entry in config with key ' . $key);
    }
}
