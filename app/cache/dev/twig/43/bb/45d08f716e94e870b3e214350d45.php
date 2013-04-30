<?php

/* SdzBlogBundle:Article:ajouter.html.twig */
class __TwigTemplate_43bb45d08f716e94e870b3e214350d45 extends Twig_Template
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
        echo " - Ajouter un Article";
    }

    // line 5
    public function block_sdzblog_content($context, array $blocks = array())
    {
        // line 6
        echo "        <h2>Créer votre article</h2>
        ";
        // line 7
        $this->env->loadTemplate("SdzBlogBundle:Article:formulaire.html.twig")->display($context);
        // line 8
        echo "        
        <p>
            <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_accueil"), "html", null, true);
        echo "\" class=\"btn\">
                <i class=\"icon-chevron-left\"></i>
                Retour à l'accueil
            </a>
        </p>
    ";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Article:ajouter.html.twig";
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
