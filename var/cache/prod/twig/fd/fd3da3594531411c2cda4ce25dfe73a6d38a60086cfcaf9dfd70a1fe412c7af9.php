<?php

/* :default:project_new.html.twig */
class __TwigTemplate_ff7540c26dfb707a0a3b0f7078f8b949d7d2b5b1967a8ca2661c46a180a2551c extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Список заданий";
    }

    // line 5
    public function block_style($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css\" rel=\"stylesheet\" />
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"col-md-12\">
        <a class=\"btn btn-danger\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("list_task");
        echo "\">Назад</a>
        <h2 class=\"text-muted\"><span class=\"text-success\">Название задачи:</span> ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task", array(), "array"), "html", null, true);
        echo "</h2>
        <p class=\"text-muted\">
            <strong class=\"text-success\">Регион:</strong> ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "region", array(), "array"), "html", null, true);
        echo "
            <strong class=\"text-success\">Топ:</strong> ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "top", array(), "array"), "html", null, true);
        echo "
        </p>
    </div>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "pages", array(), "array"));
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
            echo "                ";
            if (twig_in_filter($context["url"], (isset($context["urls"]) ? $context["urls"] : null))) {
                // line 84
                echo "                    <tr>
                        <td>
                            <strong>
                                ";
                // line 87
                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array())) > 40)) {
                    // line 88
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), 0, 40), "html", null, true);
                    echo "...</a>
                                ";
                } else {
                    // line 90
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                    echo "...</a>
                                ";
                }
                // line 92
                echo "                            </strong>
                        </td>
                        <td class=\"text-muted\">";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "visible", array()), "html", null, true);
                echo "</td>
                        <td><a href=\"https://ru.majestic.com/reports/site-explorer/referring-domains?folder=&q=";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                echo "&oq=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                echo "&IndexDataSource=F\" target=\"_blank\" class=\"text-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "domains", array()), "html", null, true);
                echo "</a></td>
                        <td><a href=\"https://ru.majestic.com/reports/site-explorer/top-domains?folder=&q=";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                echo "&oq=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "page", array()), "html", null, true);
                echo "&IndexDataSource=F\" target=\"_blank\" class=\"text-info\" class=\"text-warning\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["kostyl"]) ? $context["kostyl"] : null), $context["url"], array(), "array"), "links", array()), "html", null, true);
                echo "</a></td>
                    </tr>
                ";
            }
            // line 99
            echo "                </tbody>
            </table>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['url'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 105
    public function block_javascripts($context, array $blocks = array())
    {
        // line 106
        echo "    <script src=\"https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js\" type=\"application/javascript\"></script>
    <script src=\"https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/task.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
";
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
        return array (  288 => 108,  284 => 106,  281 => 105,  270 => 99,  260 => 96,  252 => 95,  248 => 94,  244 => 92,  236 => 90,  228 => 88,  226 => 87,  221 => 84,  218 => 83,  207 => 78,  201 => 77,  194 => 73,  188 => 72,  183 => 70,  179 => 68,  176 => 67,  170 => 65,  164 => 63,  161 => 62,  158 => 61,  152 => 59,  146 => 57,  143 => 56,  141 => 55,  137 => 54,  133 => 52,  129 => 51,  113 => 37,  104 => 34,  100 => 33,  97 => 32,  93 => 31,  77 => 20,  74 => 19,  70 => 18,  64 => 15,  60 => 14,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
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
/*                 {% if url in urls %}*/
/*                     <tr>*/
/*                         <td>*/
/*                             <strong>*/
/*                                 {% if kostyl[url].page|length > 40 %}*/
/*                                     <a href="{{ kostyl[url].page }}" target="_blank">{{ kostyl[url].page|slice(0, 40) }}...</a>*/
/*                                 {% else %}*/
/*                                     <a href="{{ kostyl[url].page }}" target="_blank">{{ kostyl[url].page }}...</a>*/
/*                                 {% endif %}*/
/*                             </strong>*/
/*                         </td>*/
/*                         <td class="text-muted">{{ kostyl[url].visible }}</td>*/
/*                         <td><a href="https://ru.majestic.com/reports/site-explorer/referring-domains?folder=&q={{ kostyl[url].page }}&oq={{ kostyl[url].page }}&IndexDataSource=F" target="_blank" class="text-info">{{ kostyl[url].domains }}</a></td>*/
/*                         <td><a href="https://ru.majestic.com/reports/site-explorer/top-domains?folder=&q={{ kostyl[url].page }}&oq={{ kostyl[url].page }}&IndexDataSource=F" target="_blank" class="text-info" class="text-warning">{{ kostyl[url].links }}</a></td>*/
/*                     </tr>*/
/*                 {% endif %}*/
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
