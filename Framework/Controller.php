<?php

namespace Framework;

abstract class Controller
{
    protected $params = [];
    protected $useLayout = true;
    protected $useTemplate = true;

    public function setParams($params)
    {
        $this->params = $params;
    }

    protected function getParam($param)
    {
        return isset($this->params[$param])
            ? $this->params[$param]
            : null;
    }

    protected function redirect($url, $code=302)
    {
        header("Location: " . $url, true, $code);
        die;
    }

    protected function setUseLayout($useLayout)
    {
        $this->useLayout = $useLayout;
    }

    public function getUseLayout()
    {
        return $this->useLayout;
    }

    protected function setUseTemplate($useTemplate)
    {
        $this->useTemplate = $useTemplate;
    }

    public function getUseTemplate()
    {
        return $this->useTemplate;
    }
}