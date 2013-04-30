<?php

/* ::layout.html.twig */
class __TwigTemplate_27fadb491d18f0a8c300acbab6867907 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div class=\"container\">
            <div id=\"header\" class=\"hero-unit\">
                <h1>Mon projet Symfony 2</h1>
                <p>Grâce à Symfony 2 et au tutoriel du site du zéro j'ai déployé un blog surpuissant</p>
                <p><a class=\"btn btn-primary btn-large\" href=\"http://www.siteduzero.com\">
                        Le SDZ - Site Officiel
                </a></p>
            </div>
            
            <div class=\"row\">
                <div id=\"menu\" class=\"span3\">
                    <h3>Le Blog</h3>
                    <ul class=\"nav nav-pills nav-stacked\">
                        <li><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_accueil"), "html", null, true);
        echo "\">Accueil</a></li>
                        <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Sdzblog_ajouter"), "html", null, true);
        echo "\">Ajouter Un Article</a></li>
                    </ul>
                    
                    ";
        // line 32
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("SdzBlogBundle:Article:menu", array("nombre" => 3)));
        echo "
                </div>
                <div class=\"span9\" id=\"content\">
                    ";
        // line 35
        $this->displayBlock('body', $context, $blocks);
        // line 37
        echo "                </div>
            </div>
                
            <hr>
            
            <footer>
                <p>Copyright - Gandiol Romain, Développeur Symfony 2 - © 2012 and beyond</p>
            </footer>
        </div>
        ";
        // line 46
        $this->displayBlock('javascripts', $context, $blocks);
        // line 114
        echo "    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Tweakz";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
            <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        ";
    }

    // line 35
    public function block_body($context, array $blocks = array())
    {
        // line 36
        echo "                    ";
    }

    // line 46
    public function block_javascripts($context, array $blocks = array())
    {
        // line 47
        echo "            <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\">
                \$(document).ready(function() {
                  // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
                  var \$container = \$('div#sdz_blogbundle_articletype_categories');

                  // On ajoute un lien pour ajouter une nouvelle catégorie
                  var \$lienAjout = \$('<a href=\"#\" id=\"ajout_categorie\" class=\"btn\">Ajouter une catégorie</a>');
                  \$container.append(\$lienAjout);

                  // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
                  \$lienAjout.click(function(e) {
                    ajouterCategorie(\$container);
                    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                    return false;
                  });

                  // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
                  var index = \$container.find(':input').length;

                  // On ajoute un premier champ directement s'il n'en existe pas déjà un (cas d'un nouvel article par exemple).
                  if (index == 0) {
                    ajouterCategorie(\$container);
                  } else {
                    // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
                    \$container.children('div').each(function() {
                      ajouterLienSuppression(\$(this));
                    });
                  }

                  // La fonction qui ajoute un formulaire Categorie
                  function ajouterCategorie(\$container) {
                    // Dans le contenu de l'attribut « data-prototype », on remplace :
                    // - le texte \"__name__label__\" qu'il contient par le label du champ
                    // - le texte \"__name__\" qu'il contient par le numéro du champ
                    var \$prototype = \$(\$container.attr('data-prototype').replace(/__name__label__/g, 'Catégorie n°' + (index+1))
                                                                        .replace(/__name__/g, index));

                    // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
                    ajouterLienSuppression(\$prototype);

                    // On ajoute le prototype modifié à la fin de la balise <div>
                    \$container.append(\$prototype);

                    // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
                    index++;
                  }

                  // La fonction qui ajoute un lien de suppression d'une catégorie
                  function ajouterLienSuppression(\$prototype) {
                    // Création du lien
                    \$lienSuppression = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a>');

                    // Ajout du lien
                    \$prototype.append(\$lienSuppression);

                    // Ajout du listener sur le clic du lien
                    \$lienSuppression.click(function(e) {
                      \$prototype.remove();
                      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                      return false;
                    });
                  }
                });
            </script>
        ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 48,  123 => 47,  120 => 46,  116 => 36,  113 => 35,  107 => 10,  102 => 9,  99 => 8,  93 => 7,  87 => 114,  85 => 46,  74 => 37,  72 => 35,  66 => 32,  60 => 29,  56 => 28,  36 => 12,  34 => 8,  30 => 7,  23 => 2,);
    }
}
