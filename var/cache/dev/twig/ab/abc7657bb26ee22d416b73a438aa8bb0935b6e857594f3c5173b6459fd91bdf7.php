<?php

/* :default:project_new.html.twig */
class __TwigTemplate_1aefed37f72946a906ccd7630c45e44f04707c24abad98a7697554167bf76cae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":default:project_new.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'style' => array($this, 'block_style'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7661a8d2d7307ea9d8ed10f0d3d7a0fa8e0c0d4e37dad7c96c4010dd21478110 = $this->env->getExtension("native_profiler");
        $__internal_7661a8d2d7307ea9d8ed10f0d3d7a0fa8e0c0d4e37dad7c96c4010dd21478110->enter($__internal_7661a8d2d7307ea9d8ed10f0d3d7a0fa8e0c0d4e37dad7c96c4010dd21478110_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":default:project_new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7661a8d2d7307ea9d8ed10f0d3d7a0fa8e0c0d4e37dad7c96c4010dd21478110->leave($__internal_7661a8d2d7307ea9d8ed10f0d3d7a0fa8e0c0d4e37dad7c96c4010dd21478110_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_37dc9cc4dad9c7166aa5824c08c80c64b954620f43e71959ad19ac63a421b9c2 = $this->env->getExtension("native_profiler");
        $__internal_37dc9cc4dad9c7166aa5824c08c80c64b954620f43e71959ad19ac63a421b9c2->enter($__internal_37dc9cc4dad9c7166aa5824c08c80c64b954620f43e71959ad19ac63a421b9c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Список заданий";
        
        $__internal_37dc9cc4dad9c7166aa5824c08c80c64b954620f43e71959ad19ac63a421b9c2->leave($__internal_37dc9cc4dad9c7166aa5824c08c80c64b954620f43e71959ad19ac63a421b9c2_prof);

    }

    // line 5
    public function block_style($context, array $blocks = array())
    {
        $__internal_251bcdcbdb8cbb5e858cd4431c54faea6070eb262d85a79d31485d953de5903c = $this->env->getExtension("native_profiler");
        $__internal_251bcdcbdb8cbb5e858cd4431c54faea6070eb262d85a79d31485d953de5903c->enter($__internal_251bcdcbdb8cbb5e858cd4431c54faea6070eb262d85a79d31485d953de5903c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "style"));

        // line 6
        echo "    <link href=\"https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css\" rel=\"stylesheet\" />
";
        
        $__internal_251bcdcbdb8cbb5e858cd4431c54faea6070eb262d85a79d31485d953de5903c->leave($__internal_251bcdcbdb8cbb5e858cd4431c54faea6070eb262d85a79d31485d953de5903c_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_ad7c25ac0e7fa22dca7c6b7f4753cd7466ac6e6d92f7dc3e71c550a8c40b11da = $this->env->getExtension("native_profiler");
        $__internal_ad7c25ac0e7fa22dca7c6b7f4753cd7466ac6e6d92f7dc3e71c550a8c40b11da->enter($__internal_ad7c25ac0e7fa22dca7c6b7f4753cd7466ac6e6d92f7dc3e71c550a8c40b11da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "    <div class=\"col-md-12\">
        <a class=\"btn btn-danger\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("list_task");
        echo "\">Назад</a>
        <h2 class=\"text-muted\"><span class=\"text-success\">Название задачи:</span> ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "task", array(), "array"), "html", null, true);
        echo "</h2>
        <p class=\"text-muted\">
            <strong class=\"text-success\">Регион:</strong> ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "region", array(), "array"), "html", null, true);
        echo "
            <strong class=\"text-success\">Топ:</strong> ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "top", array(), "array"), "html", null, true);
        echo "
        </p>
    </div>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "pages", array(), "array"));
        foreach ($context['_seq'] as $context["url"] => $context["page"]) {
            // line 19
            echo "        <div class=\"col-md-12\">
            <p><strong class=\"text-success\">Страница:</strong> <a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $context["url"], "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp($context["url"]), "html", null, true);
            echo "</a></p>
        </div>
        <div class=\"col-md-6 bottom20\">
            <table class=\"table task-words\">
                <thead>
                <tr>
                    <th>Запрос</th>
                    <th>!Wordstat</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["page"], "phrases", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["phrase"]) {
                // line 32
                echo "                    <tr>
                        <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["phrase"], "phrase", array(), "array"), "html", null, true);
                echo "</td>
                        <td class=\"text-muted\">";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($context["phrase"], "wordstat", array(), "array"), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phrase'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                </tbody>
            </table>
        </div>
        <div class=\"col-md-6 bottom20\">
            <table class=\"table task-domain\">
                <thead>
                <tr>
                    <th>Сайт</th>
                    <th>Видимость</th>
                    <th>Доменов</th>
                    <th>Ссылок</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["page"], "domains", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["topDomains"]) {
                // line 52
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp($this->getAttribute($context["topDomains"], "domain", array(), "array")), "html", null, true);
                echo "\" target=\"_blank\">
                                ";
                // line 55
                if ((twig_length_filter($this->env, $this->getAttribute($context["topDomains"], "domain", array(), "array")) > 40)) {
                    // line 56
                    echo "                                    ";
                    if (($this->env->getExtension('cut_sharp_extension')->cutSharp($this->getAttribute($context["topDomains"], "domain", array(), "array")) == $this->env->getExtension('cut_sharp_extension')->cutSharp($context["url"]))) {
                        // line 57
                        echo "                                        <strong>";
                        echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp(twig_slice($this->env, $this->getAttribute($context["topDomains"], "domain", array(), "array"), 0, 40)), "html", null, true);
                        echo "...</strong>
                                    ";
                    } else {
                        // line 59
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp(twig_slice($this->env, $this->getAttribute($context["topDomains"], "domain", array(), "array"), 0, 40)), "html", null, true);
                        echo "...
                                    ";
                    }
                    // line 61
                    echo "                                ";
                } else {
                    // line 62
                    echo "                                    ";
                    if (($this->env->getExtension('cut_sharp_extension')->cutSharp($this->getAttribute($context["topDomains"], "domain", array(), "array")) == $this->env->getExtension('cut_sharp_extension')->cutSharp($context["url"]))) {
                        // line 63
                        echo "                                        <strong>";
                        echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp($this->getAttribute($context["topDomains"], "domain", array(), "array")), "html", null, true);
                        echo "</strong>
                                    ";
                    } else {
                        // line 65
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('cut_sharp_extension')->cutSharp($this->getAttribute($context["topDomains"], "domain", array(), "array")), "html", null, true);
                        echo "
                                    ";
                    }
                    // line 67
                    echo "                                ";
                }
                // line 68
                echo "                            </a>
                        </td>
                        <td class=\"text-muted\">";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["topDomains"], "visible", array(), "array"), "html", null, true);
                echo "</td>
                        <td>
                            <a class=\"text-info\" target=\"_blank\" href=\"https://ru.majestic.com/reports/site-explorer/referring-domains?folder=&q=";
                // line 72
                echo twig_escape_filter($this->env, $this->env->getExtension('www_url_extension')->urlFilter($this->getAttribute($context["topDomains"], "domain", array(), "array"), $this->getAttribute($context["topDomains"], "is_www", array(), "array")), "html", null, true);
                echo "&oq=";
                echo twig_escape_filter($this->env, $this->env->getExtension('www_url_extension')->urlFilter($this->getAttribute($context["topDomains"], "domain", array(), "array"), $this->getAttribute($context["topDomains"], "is_www", array(), "array")), "html", null, true);
                echo "&IndexDataSource=F\">
                                ";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["topDomains"], "domains", array(), "array"), "html", null, true);
                echo "
                            </a>
                        </td>
                        <td>
                            <a class=\"text-warning\" target=\"_blank\" href=\"https://ru.majestic.com/reports/site-explorer/top-domains?folder=&q=";
                // line 77
                echo twig_escape_filter($this->env, $this->env->getExtension('www_url_extension')->urlFilter($this->getAttribute($context["topDomains"], "domain", array(), "array"), $this->getAttribute($context["topDomains"], "is_www", array(), "array")), "html", null, true);
                echo "&oq=";
                echo twig_escape_filter($this->env, $this->env->getExtension('www_url_extension')->urlFilter($this->getAttribute($context["topDomains"], "domain", array(), "array"), $this->getAttribute($context["topDomains"], "is_www", array(), "array")), "html", null, true);
                echo "&IndexDataSource=F\">
                                ";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute($context["topDomains"], "hrefs", array(), "array"), "html", null, true);
                echo "
                            </a>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topDomains'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "                </tbody>
            </table>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['url'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_ad7c25ac0e7fa22dca7c6b7f4753cd7466ac6e6d92f7dc3e71c550a8c40b11da->leave($__internal_ad7c25ac0e7fa22dca7c6b7f4753cd7466ac6e6d92f7dc3e71c550a8c40b11da_prof);

    }

    // line 89
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4dea8191a2435c3778858416beca899f8e8c3a68ef5bd98a2b33dac9cc5bf04a = $this->env->getExtension("native_profiler");
        $__internal_4dea8191a2435c3778858416beca899f8e8c3a68ef5bd98a2b33dac9cc5bf04a->enter($__internal_4dea8191a2435c3778858416beca899f8e8c3a68ef5bd98a2b33dac9cc5bf04a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 90
        echo "    <script src=\"https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js\" type=\"application/javascript\"></script>
    <script src=\"https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/task.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
";
        
        $__internal_4dea8191a2435c3778858416beca899f8e8c3a68ef5bd98a2b33dac9cc5bf04a->leave($__internal_4dea8191a2435c3778858416beca899f8e8c3a68ef5bd98a2b33dac9cc5bf04a_prof);

    }

    public function getTemplateName()
    {
        return ":default:project_new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 92,  259 => 90,  253 => 89,  239 => 83,  228 => 78,  222 => 77,  215 => 73,  209 => 72,  204 => 70,  200 => 68,  197 => 67,  191 => 65,  185 => 63,  182 => 62,  179 => 61,  173 => 59,  167 => 57,  164 => 56,  162 => 55,  158 => 54,  154 => 52,  150 => 51,  134 => 37,  125 => 34,  121 => 33,  118 => 32,  114 => 31,  98 => 20,  95 => 19,  91 => 18,  85 => 15,  81 => 14,  76 => 12,  72 => 11,  69 => 10,  63 => 9,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Список заданий{% endblock %}*/
/* */
/* {% block style %}*/
/*     <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" />*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <div class="col-md-12">*/
/*         <a class="btn btn-danger" href="{{ path('list_task') }}">Назад</a>*/
/*         <h2 class="text-muted"><span class="text-success">Название задачи:</span> {{ task['task'] }}</h2>*/
/*         <p class="text-muted">*/
/*             <strong class="text-success">Регион:</strong> {{ task['region'] }}*/
/*             <strong class="text-success">Топ:</strong> {{ task['top'] }}*/
/*         </p>*/
/*     </div>*/
/*     {% for url,page in task['pages'] %}*/
/*         <div class="col-md-12">*/
/*             <p><strong class="text-success">Страница:</strong> <a href="{{ url }}" target="_blank">{{ url|cut_sharp }}</a></p>*/
/*         </div>*/
/*         <div class="col-md-6 bottom20">*/
/*             <table class="table task-words">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     <th>Запрос</th>*/
/*                     <th>!Wordstat</th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% for phrase in page['phrases'] %}*/
/*                     <tr>*/
/*                         <td>{{ phrase['phrase'] }}</td>*/
/*                         <td class="text-muted">{{ phrase['wordstat'] }}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*                 </tbody>*/
/*             </table>*/
/*         </div>*/
/*         <div class="col-md-6 bottom20">*/
/*             <table class="table task-domain">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     <th>Сайт</th>*/
/*                     <th>Видимость</th>*/
/*                     <th>Доменов</th>*/
/*                     <th>Ссылок</th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% for topDomains in page['domains'] %}*/
/*                     <tr>*/
/*                         <td>*/
/*                             <a href="{{ topDomains['domain']|cut_sharp }}" target="_blank">*/
/*                                 {% if topDomains['domain']|length > 40 %}*/
/*                                     {% if topDomains['domain']|cut_sharp == url|cut_sharp %}*/
/*                                         <strong>{{ topDomains['domain']|slice(0, 40)|cut_sharp }}...</strong>*/
/*                                     {% else %}*/
/*                                         {{ topDomains['domain']|slice(0, 40)|cut_sharp }}...*/
/*                                     {% endif %}*/
/*                                 {% else %}*/
/*                                     {% if topDomains['domain']|cut_sharp == url|cut_sharp %}*/
/*                                         <strong>{{ topDomains['domain']|cut_sharp }}</strong>*/
/*                                     {% else %}*/
/*                                         {{ topDomains['domain']|cut_sharp }}*/
/*                                     {% endif %}*/
/*                                 {% endif %}*/
/*                             </a>*/
/*                         </td>*/
/*                         <td class="text-muted">{{ topDomains['visible'] }}</td>*/
/*                         <td>*/
/*                             <a class="text-info" target="_blank" href="https://ru.majestic.com/reports/site-explorer/referring-domains?folder=&q={{ topDomains['domain']|wwwUrl(topDomains['is_www']) }}&oq={{ topDomains['domain']|wwwUrl(topDomains['is_www']) }}&IndexDataSource=F">*/
/*                                 {{ topDomains['domains'] }}*/
/*                             </a>*/
/*                         </td>*/
/*                         <td>*/
/*                             <a class="text-warning" target="_blank" href="https://ru.majestic.com/reports/site-explorer/top-domains?folder=&q={{ topDomains['domain']|wwwUrl(topDomains['is_www']) }}&oq={{ topDomains['domain']|wwwUrl(topDomains['is_www']) }}&IndexDataSource=F">*/
/*                                 {{ topDomains['hrefs'] }}*/
/*                             </a>*/
/*                         </td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*                 </tbody>*/
/*             </table>*/
/*         </div>*/
/*     {% endfor %}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="application/javascript"></script>*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="application/javascript"></script>*/
/*     <script src="{{ asset('public/js/task.js') }}" type="application/javascript"></script>*/
/* {% endblock %}*/
