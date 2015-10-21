<?php

namespace Framework;

class App
{
    const DEVELOPMENT_ENVIRONMENT = 'dev';

    const PRODUCTION_ENVIRONMENT = 'prod';

    /** @var  array */
    private $config;

    /**
     * Constructor
     * @param  array $config Associative array of application settings
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    function run()
    {
        $router = new Router();

        try{
            /** @var RouterResult $result */
            $result = $router->process($this->config['routes']);

            $actionName = $result->getActionName();
            $controllerName = $result->getControllerName();
            $params = $result->getParams();

            /** @var Controller $controller */
            $controller = new $controllerName;
            $controller->setParams($params);

            if ($controller instanceof \Framework\Config\ConfigAwareInterface) {
                $controller->setConfig($this->config);
            }

            $viewData = $controller->$actionName();

            if ($controller->getUseTemplate()==true) {
                $template = $result->getController() . '/' . $result->getAction();
                $useLayout = $controller->getUseLayout();
                $view = new View();
                $view->display($viewData, $template, $useLayout);
            }
        } catch (Exception\NotFoundException $e) {
            header("HTTP/1.0 404 Not Found");

            $message = $this->config['environment'] === \Framework\App::DEVELOPMENT_ENVIRONMENT
                ? 'Page Not Found'
                : $e->getMessage();

            $view = new View();
            $view->display(['message' => $message], 'error/error');
        } catch (Exception\BaseException $e) {
            header("HTTP/1.0 500 Internal Server Error");

            $message = $this->config['environment'] === \Framework\App::DEVELOPMENT_ENVIRONMENT
                ? 'Internal Server Error'
                : $e->getMessage();

            $view = new View();
            $view->display(['message' => $message], 'error/error');
        }
    }
}