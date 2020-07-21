<?php

/* :default:create.html.twig */
class __TwigTemplate_74e528024edc13d6736605ef19ab8d39af3f1912d7d472b0023f99000a4ee1e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":default:create.html.twig", 1);
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
        echo "Создать задачу";
    }

    // line 5
    public function block_style($context, array $blocks = array())
    {
        // line 6
        echo "    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css\">
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "    <div class=\"col-md-12\">
        <a class=\"btn btn-danger\" href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("list_task");
        echo "\">Назад</a>
    </div>
    <div class=\"col-md-12\">
        <h3 class=\"text-muted\">Новая задача</h3>
        ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
            ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
            <div class=\"form-group\">
                ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors');
        echo "
                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "region", array()), 'errors');
        echo "
                ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "region", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\" data-toggle=\"buttons\">
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "top", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["top"]) {
            // line 28
            echo "                    <label class=\"btn btn-primary ";
            if (($this->getAttribute($this->getAttribute($context["top"], "vars", array()), "checked", array()) == true)) {
                echo "active";
            }
            echo "\">
                        ";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["top"], 'widget');
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["top"], "vars", array()), "label", array()), "html", null, true);
            echo "
                    </label>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['top'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "            </div>
            ";
        // line 33
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array(), "any", true, true)) {
            // line 34
            echo "                <div class=\"form-group\">
                    <p class=\"alert alert-";
            // line 35
            if (array_key_exists("errorWords", $context)) {
                echo "danger";
            } else {
                echo "info";
            }
            echo "\">
                        <strong>Выберите один из способов загрузки слов для анализа !!!</strong>
                    </p>
                </div>
                <div class=\"form-group\">
                    <p class=\"text-";
            // line 40
            if (array_key_exists("errorWords", $context)) {
                echo "danger";
            } else {
                echo "muted";
            }
            echo "\">
                        <strong>1. Из Файла</strong>
                    </p>
                    <p class=\"alert alert-";
            // line 43
            if (array_key_exists("errorImport", $context)) {
                echo "danger";
            } else {
                echo "warning";
            }
            echo "\">
                        <strong>CSV файл для импорта запросов (запрос; !wordstat; страница).</strong><br>
                        Колонка !Wordstat не обязательна.
                        Если она пустая, то !Wordstat собирается сервисом.
                    </p>
                    ";
            // line 48
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'errors');
            echo "
                    ";
            // line 49
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'widget');
            echo "
                </div>
            ";
        }
        // line 52
        echo "            <div class=\"form-group\">
                ";
        // line 53
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array(), "any", true, true)) {
            // line 54
            echo "                    <p class=\"text-";
            if (array_key_exists("errorWords", $context)) {
                echo "danger";
            } else {
                echo "muted";
            }
            echo "\">
                        <strong>2. Вручную</strong>
                    </p>
                    <p class=\"alert alert-";
            // line 57
            if (array_key_exists("errorImport", $context)) {
                echo "danger";
            } else {
                echo "warning";
            }
            echo "\">
                        <strong>
                            Кластеры должны быть разделены пустой стркой.<br>
                            Пример:
                        </strong><br><br>
                        <b>Страница</b><br>
                        <i>
                            Запрос<br>
                            Запрос<br>
                            Запрос<br>
                        </i><br>
                        <b>Страница</b><br>
                        <i>
                            Запрос<br>
                            Запрос<br>
                            Запрос
                        </i>
                    </p>
                ";
        }
        // line 76
        echo "                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "textarea", array()), 'errors');
        echo "
                ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "textarea", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                ";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "save", array()), 'widget');
        echo "
            </div>
        ";
        // line 82
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
";
    }

    // line 86
    public function block_javascripts($context, array $blocks = array())
    {
        // line 87
        echo "    <!-- Latest compiled and minified JavaScript -->
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js\"></script>
    <script src=\"http://gregpike.net/demos/bootstrap-file-input/bootstrap.file-input.js\"></script>
    <script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/add-task.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return ":default:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 90,  230 => 87,  227 => 86,  220 => 82,  215 => 80,  209 => 77,  204 => 76,  178 => 57,  167 => 54,  165 => 53,  162 => 52,  156 => 49,  152 => 48,  140 => 43,  130 => 40,  118 => 35,  115 => 34,  113 => 33,  110 => 32,  99 => 29,  92 => 28,  88 => 27,  82 => 24,  78 => 23,  72 => 20,  68 => 19,  63 => 17,  59 => 16,  52 => 12,  49 => 11,  46 => 10,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Создать задачу{% endblock %}*/
/* */
/* {% block style %}*/
/*     <!-- Latest compiled and minified CSS -->*/
/*     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <div class="col-md-12">*/
/*         <a class="btn btn-danger" href="{{ path('list_task') }}">Назад</a>*/
/*     </div>*/
/*     <div class="col-md-12">*/
/*         <h3 class="text-muted">Новая задача</h3>*/
/*         {{ form_start(form) }}*/
/*             {{ form_errors(form) }}*/
/*             <div class="form-group">*/
/*                 {{ form_errors(form.name) }}*/
/*                 {{ form_widget(form.name) }}*/
/*             </div>*/
/*             <div class="form-group">*/
/*                 {{ form_errors(form.region) }}*/
/*                 {{ form_widget(form.region) }}*/
/*             </div>*/
/*             <div class="form-group" data-toggle="buttons">*/
/*                 {% for top in form.top %}*/
/*                     <label class="btn btn-primary {% if top.vars.checked == true %}active{% endif %}">*/
/*                         {{ form_widget(top) }} {{ top.vars.label }}*/
/*                     </label>*/
/*                 {% endfor %}*/
/*             </div>*/
/*             {% if form.file is defined %}*/
/*                 <div class="form-group">*/
/*                     <p class="alert alert-{% if errorWords is defined %}danger{% else %}info{% endif %}">*/
/*                         <strong>Выберите один из способов загрузки слов для анализа !!!</strong>*/
/*                     </p>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                     <p class="text-{% if errorWords is defined %}danger{% else %}muted{% endif %}">*/
/*                         <strong>1. Из Файла</strong>*/
/*                     </p>*/
/*                     <p class="alert alert-{% if errorImport is defined %}danger{% else %}warning{% endif %}">*/
/*                         <strong>CSV файл для импорта запросов (запрос; !wordstat; страница).</strong><br>*/
/*                         Колонка !Wordstat не обязательна.*/
/*                         Если она пустая, то !Wordstat собирается сервисом.*/
/*                     </p>*/
/*                     {{ form_errors(form.file) }}*/
/*                     {{ form_widget(form.file) }}*/
/*                 </div>*/
/*             {% endif %}*/
/*             <div class="form-group">*/
/*                 {% if form.file is defined %}*/
/*                     <p class="text-{% if errorWords is defined %}danger{% else %}muted{% endif %}">*/
/*                         <strong>2. Вручную</strong>*/
/*                     </p>*/
/*                     <p class="alert alert-{% if errorImport is defined %}danger{% else %}warning{% endif %}">*/
/*                         <strong>*/
/*                             Кластеры должны быть разделены пустой стркой.<br>*/
/*                             Пример:*/
/*                         </strong><br><br>*/
/*                         <b>Страница</b><br>*/
/*                         <i>*/
/*                             Запрос<br>*/
/*                             Запрос<br>*/
/*                             Запрос<br>*/
/*                         </i><br>*/
/*                         <b>Страница</b><br>*/
/*                         <i>*/
/*                             Запрос<br>*/
/*                             Запрос<br>*/
/*                             Запрос*/
/*                         </i>*/
/*                     </p>*/
/*                 {% endif %}*/
/*                 {{ form_errors(form.textarea) }}*/
/*                 {{ form_widget(form.textarea) }}*/
/*             </div>*/
/*             <div class="form-group">*/
/*                 {{ form_widget(form.save) }}*/
/*             </div>*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <!-- Latest compiled and minified JavaScript -->*/
/*     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>*/
/*     <script src="http://gregpike.net/demos/bootstrap-file-input/bootstrap.file-input.js"></script>*/
/*     <script src="{{ asset('public/js/add-task.js') }}" type="application/javascript"></script>*/
/* {% endblock %}*/
