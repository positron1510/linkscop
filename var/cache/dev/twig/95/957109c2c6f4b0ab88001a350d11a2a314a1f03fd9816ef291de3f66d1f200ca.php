<?php

/* :auth:login.html.twig */
class __TwigTemplate_e914422b8ed3e3103aa9e03466cec0d8ca117ff5f4f5dcea582d4bf1dfb4ade4 extends Twig_Template
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
        $__internal_8ca4f497f1a75fd8e1609ee11ebf8b9e55c8cb114b714d5d7bb6fb590d7338b5 = $this->env->getExtension("native_profiler");
        $__internal_8ca4f497f1a75fd8e1609ee11ebf8b9e55c8cb114b714d5d7bb6fb590d7338b5->enter($__internal_8ca4f497f1a75fd8e1609ee11ebf8b9e55c8cb114b714d5d7bb6fb590d7338b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":auth:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8ca4f497f1a75fd8e1609ee11ebf8b9e55c8cb114b714d5d7bb6fb590d7338b5->leave($__internal_8ca4f497f1a75fd8e1609ee11ebf8b9e55c8cb114b714d5d7bb6fb590d7338b5_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_fa4b866283300e55be06cef4d5ff8e7790ca050d741734ec60e7ef82963085c6 = $this->env->getExtension("native_profiler");
        $__internal_fa4b866283300e55be06cef4d5ff8e7790ca050d741734ec60e7ef82963085c6->enter($__internal_fa4b866283300e55be06cef4d5ff8e7790ca050d741734ec60e7ef82963085c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Список заданий";
        
        $__internal_fa4b866283300e55be06cef4d5ff8e7790ca050d741734ec60e7ef82963085c6->leave($__internal_fa4b866283300e55be06cef4d5ff8e7790ca050d741734ec60e7ef82963085c6_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_d6a1c82843e491f51b4cd6179e20636f58ba0be544f60f0f7dd7c5421e217d54 = $this->env->getExtension("native_profiler");
        $__internal_d6a1c82843e491f51b4cd6179e20636f58ba0be544f60f0f7dd7c5421e217d54->enter($__internal_d6a1c82843e491f51b4cd6179e20636f58ba0be544f60f0f7dd7c5421e217d54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"col-md-12\">
        ";
        // line 7
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 8
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
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
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
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
        
        $__internal_d6a1c82843e491f51b4cd6179e20636f58ba0be544f60f0f7dd7c5421e217d54->leave($__internal_d6a1c82843e491f51b4cd6179e20636f58ba0be544f60f0f7dd7c5421e217d54_prof);

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
        return array (  72 => 13,  67 => 11,  64 => 10,  58 => 8,  56 => 7,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
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
