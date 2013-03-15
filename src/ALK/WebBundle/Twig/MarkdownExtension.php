<?php
namespace ALK\WebBundle\Twig;
require 'markdown.php';
require 'markdown.addons.php';

class MarkdownExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'MarkdownFilter'),
        );
    }

    public function MarkdownFilter($text)
    {
        $text = Markdown($text);
        $text = MarkdownAddons($text);
        return $text;
    }

    public function getName()
    {
        return 'markdown_extension';
    }
}

?>