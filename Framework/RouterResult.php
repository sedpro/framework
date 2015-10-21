<?php

namespace Framework;

class RouterResult
{
    /** @var null|string */
    private $action = null;

    /** @var null|string */
    private $actionName = null;

    /** @var null|string */
    private $params = [];

    /** @var null|string */
    private $controller = null;

    /** @var null|string */
    private $controllerName = null;

    /**
     * @return null|string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param null|string $action
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param null|string $action
     * @return self
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;

        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return self
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param null|string $controller
     * @return self
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @param null|string $controllerName
     * @return self
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }
}