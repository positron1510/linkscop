<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_e17a5114c0b2d1e98d3bd7ed83ce2cee256d29459a94b881f3c9786b810427bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_681b068402d83baef646e5ba9f33668a41961ae81a98a0cf23f2f164b5ebdf46 = $this->env->getExtension("native_profiler");
        $__internal_681b068402d83baef646e5ba9f33668a41961ae81a98a0cf23f2f164b5ebdf46->enter($__internal_681b068402d83baef646e5ba9f33668a41961ae81a98a0cf23f2f164b5ebdf46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_681b068402d83baef646e5ba9f33668a41961ae81a98a0cf23f2f164b5ebdf46->leave($__internal_681b068402d83baef646e5ba9f33668a41961ae81a98a0cf23f2f164b5ebdf46_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d512c400df23326cc4d26d971a95d499bda76f9867850d36f6e1e22c61e06bb4 = $this->env->getExtension("native_profiler");
        $__internal_d512c400df23326cc4d26d971a95d499bda76f9867850d36f6e1e22c61e06bb4->enter($__internal_d512c400df23326cc4d26d971a95d499bda76f9867850d36f6e1e22c61e06bb4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_d512c400df23326cc4d26d971a95d499bda76f9867850d36f6e1e22c61e06bb4->leave($__internal_d512c400df23326cc4d26d971a95d499bda76f9867850d36f6e1e22c61e06bb4_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_a7c60edccb4550a8c7bed4586efdf6f60b60b582c3eeaa0cfd4014ad7e625d76 = $this->env->getExtension("native_profiler");
        $__internal_a7c60edccb4550a8c7bed4586efdf6f60b60b582c3eeaa0cfd4014ad7e625d76->enter($__internal_a7c60edccb4550a8c7bed4586efdf6f60b60b582c3eeaa0cfd4014ad7e625d76_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_a7c60edccb4550a8c7bed4586efdf6f60b60b582c3eeaa0cfd4014ad7e625d76->leave($__internal_a7c60edccb4550a8c7bed4586efdf6f60b60b582c3eeaa0cfd4014ad7e625d76_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_36163573ad4871d0c3c60cefdb87c567761dd304ad287eedcbf222f5780b265a = $this->env->getExtension("native_profiler");
        $__internal_36163573ad4871d0c3c60cefdb87c567761dd304ad287eedcbf222f5780b265a->enter($__internal_36163573ad4871d0c3c60cefdb87c567761dd304ad287eedcbf222f5780b265a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_36163573ad4871d0c3c60cefdb87c567761dd304ad287eedcbf222f5780b265a->leave($__internal_36163573ad4871d0c3c60cefdb87c567761dd304ad287eedcbf222f5780b265a_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
