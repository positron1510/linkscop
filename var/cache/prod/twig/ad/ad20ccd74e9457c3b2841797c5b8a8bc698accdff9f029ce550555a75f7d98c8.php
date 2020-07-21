<?php

/* :auth:login.html.twig */
class __TwigTemplate_a7d21be8197d6764c9359476ee7f4b043c4667325e2549f65b621c9e459690b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":auth:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Список заданий";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"col-md-12\">
        ";
        // line 7
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 8
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageData", array()), "security"), "html", null, true);
            echo "</div>
        ";
        }
        // line 10
        echo "
        <form action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\" method=\"post\" class=\"form-signin\">
            <h4 class=\"form-signin-heading\">Пожалуйста авторизуйтесь</h4>
            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" placeholder=\"Логин\" required autofocus />
            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Пароль\" required />
            <div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked /> Запомнить меня
                </label>
            </div>
            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Войти</button>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return ":auth:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 13,  52 => 11,  49 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Список заданий{% endblock %}*/
/* */
/* {% block body %}*/
/*     <div class="col-md-12">*/
/*         {% if error %}*/
/*             <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>*/
/*         {% endif %}*/
/* */
/*         <form action="{{ path('login') }}" method="post" class="form-signin">*/
/*             <h4 class="form-signin-heading">Пожалуйста авторизуйтесь</h4>*/
/*             <input type="text" class="form-control" id="username" name="_username" value="{{ last_username }}" placeholder="Логин" required autofocus />*/
/*             <input type="password" class="form-control" id="password" name="_password" placeholder="Пароль" required />*/
/*             <div class="checkbox">*/
/*                 <label>*/
/*                     <input type="checkbox" id="remember_me" name="_remember_me" checked /> Запомнить меня*/
/*                 </label>*/
/*             </div>*/
/*             <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>*/
/*         </form>*/
/*     </div>*/
/* {% endblock %}*/
/* */
