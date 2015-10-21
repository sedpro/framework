<?php

namespace Framework;

class View
{
    protected $title;
    protected $meta = [];

    /**
     * Get fully qualified path to template file using templates base directory
     * @param  string $template The template file pathname relative to templates base directory
     * @return string
     */
    public function getTemplatePathname($template)
    {
        return '../App/view' . DIRECTORY_SEPARATOR . trim($template, DIRECTORY_SEPARATOR) . '.phtml';
    }

    public function display($data, $template, $useLayout=true)
    {
        $content = $this->render($data, $template);

        echo $useLayout
            ? $this->render(['content' => $content], 'layout')
            : $content;
    }

    protected function render($data, $template)
    {
        $templatePathname = $this->getTemplatePathname($template);

        if (!is_file($templatePathname)) {
            throw new Exception\BaseException("View cannot render `$template` because the template does not exist");
        }

        if (!is_null($data)) {
            extract($data);
        }

        ob_start();

        require $templatePathname;

        return ob_get_clean();
    }

    protected function setTitle($title)
    {
        $this->title = $title;
    }

    protected function getTitle()
    {
        return $this->title;
    }

    protected function setMeta($name, $content)
    {
        $this->meta[$name] = $content;
    }

    protected function getMeta()
    {
        return $this->meta;
    }

    protected function getMetaHtml()
    {
        $html = '';
        foreach ($this->getMeta() as $name => $content) {
            $html .= '<meta content="' . $content . '"' . ' name="' . $name . '">';
        }

        return $html;
    }
}