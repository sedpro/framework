<?php

namespace App\Controller;

class Index extends \Framework\Controller implements
    \Framework\Config\ConfigAwareInterface
{
    use \Framework\Config\ConfigAware;

    public function indexAction()
    {
        return [
            'fromConfig' => $this->getConfig('some_key')
        ];
    }

    public function otherAction()
    {
        $this->setUseTemplate(false);

        echo 'param from url is ' . $this->getParam('some_param_from_url') . '<br>';
        echo 'no template here';
    }

}