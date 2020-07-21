<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_fdc11dafad1aa35ba5800d7f0df4b4a420bdc8b71f114c24da23705d11a2cc79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a6980633cb5ab8d2b67c55c01da82e03c77ec5dd6e51d09dc38b302172d5f619 = $this->env->getExtension("native_profiler");
        $__internal_a6980633cb5ab8d2b67c55c01da82e03c77ec5dd6e51d09dc38b302172d5f619->enter($__internal_a6980633cb5ab8d2b67c55c01da82e03c77ec5dd6e51d09dc38b302172d5f619_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a6980633cb5ab8d2b67c55c01da82e03c77ec5dd6e51d09dc38b302172d5f619->leave($__internal_a6980633cb5ab8d2b67c55c01da82e03c77ec5dd6e51d09dc38b302172d5f619_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_e5a2c3a9c2cdae4dace2d8b437553b8e25292060f0947ad424a7d776eeefc86d = $this->env->getExtension("native_profiler");
        $__internal_e5a2c3a9c2cdae4dace2d8b437553b8e25292060f0947ad424a7d776eeefc86d->enter($__internal_e5a2c3a9c2cdae4dace2d8b437553b8e25292060f0947ad424a7d776eeefc86d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_e5a2c3a9c2cdae4dace2d8b437553b8e25292060f0947ad424a7d776eeefc86d->leave($__internal_e5a2c3a9c2cdae4dace2d8b437553b8e25292060f0947ad424a7d776eeefc86d_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_5823f4e839540e22f4786edb414091bf457b2c5496c521169ae67e00de5a7ee4 = $this->env->getExtension("native_profiler");
        $__internal_5823f4e839540e22f4786edb414091bf457b2c5496c521169ae67e00de5a7ee4->enter($__internal_5823f4e839540e22f4786edb414091bf457b2c5496c521169ae67e00de5a7ee4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_5823f4e839540e22f4786edb414091bf457b2c5496c521169ae67e00de5a7ee4->leave($__internal_5823f4e839540e22f4786edb414091bf457b2c5496c521169ae67e00de5a7ee4_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_c78149f024d8a68e5fc522182ee3921db95e473620a576845b8ca6e8b733a3a2 = $this->env->getExtension("native_profiler");
        $__internal_c78149f024d8a68e5fc522182ee3921db95e473620a576845b8ca6e8b733a3a2->enter($__internal_c78149f024d8a68e5fc522182ee3921db95e473620a576845b8ca6e8b733a3a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_c78149f024d8a68e5fc522182ee3921db95e473620a576845b8ca6e8b733a3a2->leave($__internal_c78149f024d8a68e5fc522182ee3921db95e473620a576845b8ca6e8b733a3a2_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
