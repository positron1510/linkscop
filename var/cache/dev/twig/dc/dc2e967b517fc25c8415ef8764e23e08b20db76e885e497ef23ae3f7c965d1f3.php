<?php

/* base.html.twig */
class __TwigTemplate_91fbcb4e0673a511a43b9d6532159a4c6c5b394185ef6466d4ac35b9a65c289c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'style' => array($this, 'block_style'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f50d40ee2f847e04e74ded247e0381499729e5647cced2cc8ab0ea058a916345 = $this->env->getExtension("native_profiler");
        $__internal_f50d40ee2f847e04e74ded247e0381499729e5647cced2cc8ab0ea058a916345->enter($__internal_f50d40ee2f847e04e74ded247e0381499729e5647cced2cc8ab0ea058a916345_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    <!-- Bootstrap -->
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/css/ie10-viewport-bug-workaround.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    ";
        // line 17
        $this->displayBlock('style', $context, $blocks);
        // line 18
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src=\"public/js/ie-emulation-modes-warning.js\"></script><![endif]-->
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/ie-emulation-modes-warning.js"), "html", null, true);
        echo "\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>
    <!-- Fixed navbar -->
    <nav class=\"navbar navbar-default navbar-fixed-top\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("list_task");
        echo "\">Ссылкоскоп</a>
            </div>
            ";
        // line 44
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 45
            echo "            <div id=\"navbar\" class=\"navbar-collapse collapse\">
                <ul class=\"nav navbar-nav\">
                    <li ";
            // line 47
            if (array_key_exists("isList", $context)) {
                echo "class=\"active\"";
            }
            echo "><a href=\"";
            echo $this->env->getExtension('routing')->getPath("list_task");
            echo "\">Список задач</a></li>
                    ";
            // line 48
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 49
                echo "                        <li ";
                if (array_key_exists("isUser", $context)) {
                    echo "class=\"active\"";
                }
                echo ">
                            <a href=\"";
                // line 50
                echo $this->env->getExtension('routing')->getPath("list_user");
                echo "\">Пользователи</a>
                        </li>
                    ";
            }
            // line 53
            echo "                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                    <li><a href=\"";
            // line 55
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Выйти</a></li>
                </ul>
            </div><!--/.nav-collapse -->
            ";
        }
        // line 59
        echo "        </div>
    </nav>
    <div class=\"container\">
        <div class=\"row\">
            ";
        // line 63
        $this->displayBlock('body', $context, $blocks);
        // line 64
        echo "        </div>
    </div>

    <footer class=\"footer\">
        <div class=\"container\">
            <p class=\"text-muted\"><span class=\"glyphicon glyphicon-copyright-mark\"></span> Все права защищены Все права защищены Element Group ";
        // line 69
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " </p>
        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/ie10-viewport-bug-workaround.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 79
        $this->displayBlock('javascripts', $context, $blocks);
        // line 80
        echo "</body>
</html>
";
        
        $__internal_f50d40ee2f847e04e74ded247e0381499729e5647cced2cc8ab0ea058a916345->leave($__internal_f50d40ee2f847e04e74ded247e0381499729e5647cced2cc8ab0ea058a916345_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_d8f2fef46f1ffc4220b58eadb283dfbaec9ce78c8b42848c780393b9995a36e8 = $this->env->getExtension("native_profiler");
        $__internal_d8f2fef46f1ffc4220b58eadb283dfbaec9ce78c8b42848c780393b9995a36e8->enter($__internal_d8f2fef46f1ffc4220b58eadb283dfbaec9ce78c8b42848c780393b9995a36e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_d8f2fef46f1ffc4220b58eadb283dfbaec9ce78c8b42848c780393b9995a36e8->leave($__internal_d8f2fef46f1ffc4220b58eadb283dfbaec9ce78c8b42848c780393b9995a36e8_prof);

    }

    // line 17
    public function block_style($context, array $blocks = array())
    {
        $__internal_56fce173f6ce2b8696915fd7b10c197ab74933ebfab800c2fc19fedec570f6f7 = $this->env->getExtension("native_profiler");
        $__internal_56fce173f6ce2b8696915fd7b10c197ab74933ebfab800c2fc19fedec570f6f7->enter($__internal_56fce173f6ce2b8696915fd7b10c197ab74933ebfab800c2fc19fedec570f6f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "style"));

        
        $__internal_56fce173f6ce2b8696915fd7b10c197ab74933ebfab800c2fc19fedec570f6f7->leave($__internal_56fce173f6ce2b8696915fd7b10c197ab74933ebfab800c2fc19fedec570f6f7_prof);

    }

    // line 63
    public function block_body($context, array $blocks = array())
    {
        $__internal_0d80418be5e14e5e02437924fe3882df00a97bb56b27e4a26eba97ea8f16fd70 = $this->env->getExtension("native_profiler");
        $__internal_0d80418be5e14e5e02437924fe3882df00a97bb56b27e4a26eba97ea8f16fd70->enter($__internal_0d80418be5e14e5e02437924fe3882df00a97bb56b27e4a26eba97ea8f16fd70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_0d80418be5e14e5e02437924fe3882df00a97bb56b27e4a26eba97ea8f16fd70->leave($__internal_0d80418be5e14e5e02437924fe3882df00a97bb56b27e4a26eba97ea8f16fd70_prof);

    }

    // line 79
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_118513eb2f58c0b13ca84e345be6174d1b4eeb83c309459b22dd509e6f481ec0 = $this->env->getExtension("native_profiler");
        $__internal_118513eb2f58c0b13ca84e345be6174d1b4eeb83c309459b22dd509e6f481ec0->enter($__internal_118513eb2f58c0b13ca84e345be6174d1b4eeb83c309459b22dd509e6f481ec0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_118513eb2f58c0b13ca84e345be6174d1b4eeb83c309459b22dd509e6f481ec0->leave($__internal_118513eb2f58c0b13ca84e345be6174d1b4eeb83c309459b22dd509e6f481ec0_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 79,  201 => 63,  190 => 17,  179 => 8,  170 => 80,  168 => 79,  164 => 78,  159 => 76,  149 => 69,  142 => 64,  140 => 63,  134 => 59,  127 => 55,  123 => 53,  117 => 50,  110 => 49,  108 => 48,  100 => 47,  96 => 45,  94 => 44,  89 => 42,  66 => 22,  58 => 18,  56 => 17,  51 => 15,  45 => 12,  40 => 10,  35 => 8,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->*/
/*     <title>{% block title %}{% endblock %}</title>*/
/* */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     <!-- Bootstrap -->*/
/*     <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">*/
/* */
/*     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->*/
/*     <link href="{{ asset('public/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">*/
/* */
/*     {% block style %}{% endblock %}*/
/*     <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->*/
/*     <!--[if lt IE 9]><script src="public/js/ie-emulation-modes-warning.js"></script><![endif]-->*/
/*     <script src="{{ asset('public/js/ie-emulation-modes-warning.js') }}"></script>*/
/* */
/*     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/*     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* </head>*/
/* <body>*/
/*     <!-- Fixed navbar -->*/
/*     <nav class="navbar navbar-default navbar-fixed-top">*/
/*         <div class="container">*/
/*             <div class="navbar-header">*/
/*                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">*/
/*                     <span class="sr-only">Toggle navigation</span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                 </button>*/
/*                 <a class="navbar-brand" href="{{ path('list_task') }}">Ссылкоскоп</a>*/
/*             </div>*/
/*             {% if app.user %}*/
/*             <div id="navbar" class="navbar-collapse collapse">*/
/*                 <ul class="nav navbar-nav">*/
/*                     <li {% if isList is defined %}class="active"{% endif %}><a href="{{ path('list_task') }}">Список задач</a></li>*/
/*                     {% if is_granted('ROLE_ADMIN') %}*/
/*                         <li {% if isUser is defined %}class="active"{% endif %}>*/
/*                             <a href="{{ path('list_user') }}">Пользователи</a>*/
/*                         </li>*/
/*                     {% endif %}*/
/*                 </ul>*/
/*                 <ul class="nav navbar-nav navbar-right">*/
/*                     <li><a href="{{ path('logout') }}">Выйти</a></li>*/
/*                 </ul>*/
/*             </div><!--/.nav-collapse -->*/
/*             {% endif %}*/
/*         </div>*/
/*     </nav>*/
/*     <div class="container">*/
/*         <div class="row">*/
/*             {% block body %}{% endblock %}*/
/*         </div>*/
/*     </div>*/
/* */
/*     <footer class="footer">*/
/*         <div class="container">*/
/*             <p class="text-muted"><span class="glyphicon glyphicon-copyright-mark"></span> Все права защищены Все права защищены Element Group {{ "now"|date("Y") }} </p>*/
/*         </div>*/
/*     </footer>*/
/* */
/*     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->*/
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/*     <!-- Include all compiled plugins (below), or include individual files as needed -->*/
/*     <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>*/
/*     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->*/
/*     <script src="{{ asset("public/js/ie10-viewport-bug-workaround.js") }}"></script>*/
/*     {% block javascripts %}{% endblock %}*/
/* </body>*/
/* </html>*/
/* */
