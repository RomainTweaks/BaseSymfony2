<?php

/* SdzBlogBundle:Article:voir.html.twig */
class __TwigTemplate_d1645d9aad463fef9346ef940834eefc extends Twig_Template
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Voir un Article - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_sdzblog_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h2>
    ";
        // line 9
        if ((!(null === $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "image")))) {
            // line 10
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "image"), "url"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "image"), "alt"), "html", null, true);
            echo "\" />
    ";
        }
        // line 12
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "titre"), "html", null, true);
        echo " 
    </h2>
    <i>Par ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "auteur"), "html", null, true);
        echo ", le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "date"), "d/m/y"), "html", null, true);
        echo "</i>
    <br />
    <i>
        ";
        // line 17
        if (($this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "categories"), "count") > 0)) {
            // line 18
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "categories"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
                // line 19
                echo "                <button class=\"btn-mini btn-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
                echo "</button>
                ";
                // line 20
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last"))) {
                    echo " - ";
                }
                // line 21
                echo "            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 22
            echo "        ";
        }
        // line 23
        echo "    </i>
    
    <div class=\"well\">
        ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "contenu"), "html", null, true);
        echo "
    </div>
    <div id=\"competences\">
      ";
        // line 29
        if ((twig_length_filter($this->env, (isset($context["liste_articleCompetences"]) ? $context["liste_articleCompetences"] : $this->getContext($context, "liste_articleCompetences"))) > 0)) {
            // line 30
            echo "        <div>
          Compétences utilisées dans cet article :
          <ul class=\"breadcrumb\">
            ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_articleCompetences"]) ? $context["liste_articleCompetences"] : $this->getContext($context, "liste_articleCompetences")));
            foreach ($context['_seq'] as $context["_key"] => $context["articleCompetence"]) {
                // line 34
                echo "              <li>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articleCompetence"]) ? $context["articleCompetence"] : $this->getContext($context, "articleCompetence")), "competence"), "nom"), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleCompetence"]) ? $context["articleCompetence"] : $this->getContext($context, "articleCompetence")), "niveau"), "html", null, true);
                echo "<span class=\"divider\">/</span></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articleCompetence'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 36
            echo "          </ul>
        </div>
      ";
        }
        // line 39
        echo "    </div>
    <p>
        <a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_accueil"), "html", null, true);
        echo "\" class=\"btn\">
            <i class=\"icon-chevron-left\"></i>
            Retour à la liste
        </a>
        <a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_modifier", array("slug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "slug"))), "html", null, true);
        echo "\" class=\"btn\">
            <i class=\"icon-edit\"></i>
            Modifier l'article
        </a>
        <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_supprimer", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"))), "html", null, true);
        echo "\" class=\"btn\">
            <i class=\"icon-trash\"></i>
            Supprimer l'article
        </a>
    </p>
    
    <hr />

    <div id=\"zone_com\">
        ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "commentaires"));
        foreach ($context['_seq'] as $context["_key"] => $context["com"]) {
            // line 59
            echo "            <div class=\"commentaire\">
                <div class=\"\">
                    ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : $this->getContext($context, "com")), "auteur"), "html", null, true);
            echo "
                </div>
                <div class=\"\">
                    <i>";
            // line 64
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : $this->getContext($context, "com")), "date"), "d/m/y"), "html", null, true);
            echo "</i>
                    <div class=\"well\">
                        ";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : $this->getContext($context, "com")), "contenu"), "html", null, true);
            echo "
                    </div>
                </div>
            </div>
            <hr />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['com'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 72
        echo "    </div>
  ";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Article:voir.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 72,  199 => 66,  194 => 64,  188 => 61,  184 => 59,  180 => 58,  168 => 49,  161 => 45,  154 => 41,  150 => 39,  145 => 36,  134 => 34,  130 => 33,  125 => 30,  123 => 29,  117 => 26,  112 => 23,  109 => 22,  95 => 21,  91 => 20,  86 => 19,  68 => 18,  66 => 17,  58 => 14,  52 => 12,  44 => 10,  42 => 9,  39 => 8,  36 => 7,  29 => 5,);
    }
}
