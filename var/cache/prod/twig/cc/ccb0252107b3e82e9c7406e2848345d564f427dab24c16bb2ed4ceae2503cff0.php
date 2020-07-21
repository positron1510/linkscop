<?php

/* base.html.twig */
class __TwigTemplate_7d3f1a16480cd8bd2b04b5122d5245c7cd19df20b602b1583b3c74a2c4603dd8 extends Twig_Template
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
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
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
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 17
    public function block_style($context, array $blocks = array())
    {
    }

    // line 63
    public function block_body($context, array $blocks = array())
    {
    }

    // line 79
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  188 => 79,  183 => 63,  178 => 17,  173 => 8,  167 => 80,  165 => 79,  161 => 78,  156 => 76,  146 => 69,  139 => 64,  137 => 63,  131 => 59,  124 => 55,  120 => 53,  114 => 50,  107 => 49,  105 => 48,  97 => 47,  93 => 45,  91 => 44,  86 => 42,  63 => 22,  55 => 18,  53 => 17,  48 => 15,  42 => 12,  37 => 10,  32 => 8,  23 => 1,);
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
