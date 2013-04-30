<?php

/* SdzBlogBundle::layout.html.twig */
class __TwigTemplate_59d4d96e77aa2695cc18ef499cc9bd20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'sdzblog_content' => array($this, 'block_sdzblog_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Blog - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "    <h1>Bienvenu sur le blog</h1>
    <hr>
    ";
        // line 9
        $this->displayBlock('sdzblog_content', $context, $blocks);
    }

    public function block_sdzblog_content($context, array $blocks = array())
    {
        // line 10
        echo "        ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("SdzBlogBundle:Article:menu"));
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  44 => 9,  40 => 7,  37 => 6,  30 => 4,);
    }
}
