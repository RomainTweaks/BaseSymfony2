<?php

/* SdzBlogBundle:Article:modifier.html.twig */
class __TwigTemplate_b36d1c1f3feb6029c588ae0934a3d11d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SdzBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sdzblog_content' => array($this, 'block_sdzblog_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SdzBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Modifier un Article";
    }

    // line 5
    public function block_sdzblog_content($context, array $blocks = array())
    {
        // line 6
        echo "        <h2>Modifier un article</h2>
        ";
        // line 7
        $this->env->loadTemplate("SdzBlogBundle:Article:formulaire.html.twig")->display($context);
        // line 8
        echo "        
        <p>
            <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_voir", array("slug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "slug"))), "html", null, true);
        echo "\" class=\"btn\">
                <i class=\"icon-chevron-left\"></i>
                Retour à l'article
            </a>
        </p>
    ";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Article:modifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  44 => 8,  42 => 7,  39 => 6,  36 => 5,  29 => 4,);
    }
}
