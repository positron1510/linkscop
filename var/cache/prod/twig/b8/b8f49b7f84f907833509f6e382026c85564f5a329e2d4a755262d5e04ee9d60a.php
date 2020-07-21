<?php

/* :default:list.html.twig */
class __TwigTemplate_3c2f082ecd5dc492ae3c021e07d5658d2d6094d15ce9633302b7875381f42370 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":default:list.html.twig", 1);
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
        <a class=\"btn btn-success\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("create_task");
        echo "\">Создать задачу</a>
    </div>
    <div class=\"col-md-12 top20\">
        <table id=\"task\" class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Задача</th>
                    <th>Дата обработки</th>
                    <th>Состояние</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id=\"checkRemove\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
            <div class=\"modal-dialog modal-sm\">
                <div class=\"modal-content\">
                    <div class=\"modal-body\">
                        <p class=\"text-danger\">Вы действительно хотите удалить этот анализ?</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button id=\"remove-task\" type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">
                            <span class=\"glyphicon glyphicon-ok\"></span>
                        </button>
                        <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">
                            <span class=\"glyphicon glyphicon-remove\"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 46
    public function block_javascripts($context, array $blocks = array())
    {
        // line 47
        echo "    <script src=\"https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js\" type=\"application/javascript\"></script>
    <script src=\"https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/status-tasks.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return ":default:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 49,  92 => 47,  89 => 46,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
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
/*         <a class="btn btn-success" href="{{ path('create_task') }}">Создать задачу</a>*/
/*     </div>*/
/*     <div class="col-md-12 top20">*/
/*         <table id="task" class="table table-striped">*/
/*             <thead>*/
/*                 <tr>*/
/*                     <th>Задача</th>*/
/*                     <th>Дата обработки</th>*/
/*                     <th>Состояние</th>*/
/*                     <th></th>*/
/*                     <th></th>*/
/*                 </tr>*/
/*             </thead>*/
/*             <tbody></tbody>*/
/*         </table>*/
/*         <div id="checkRemove" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">*/
/*             <div class="modal-dialog modal-sm">*/
/*                 <div class="modal-content">*/
/*                     <div class="modal-body">*/
/*                         <p class="text-danger">Вы действительно хотите удалить этот анализ?</p>*/
/*                     </div>*/
/*                     <div class="modal-footer">*/
/*                         <button id="remove-task" type="button" class="btn btn-success" data-dismiss="modal">*/
/*                             <span class="glyphicon glyphicon-ok"></span>*/
/*                         </button>*/
/*                         <button type="button" class="btn btn-danger" data-dismiss="modal">*/
/*                             <span class="glyphicon glyphicon-remove"></span>*/
/*                         </button>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="application/javascript"></script>*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="application/javascript"></script>*/
/*     <script src="{{ asset('public/js/status-tasks.js') }}" type="application/javascript"></script>*/
/* {% endblock %}*/
