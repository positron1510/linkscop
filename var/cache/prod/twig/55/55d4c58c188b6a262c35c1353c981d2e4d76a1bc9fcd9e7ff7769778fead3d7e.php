<?php

/* :user:list.html.twig */
class __TwigTemplate_6fdee196219e034a6dddac401d1885aedb1ed231ddc57e259aba57e8fcfb3d8b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":user:list.html.twig", 1);
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
        echo $this->env->getExtension('routing')->getPath("registration");
        echo "\">Добавить пользователя</a>
    </div>
    <div class=\"col-md-12 top20\">
        <table id=\"user\" class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Роль</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 24
            echo "                    <tr id=\"user-list-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\">
                        <td>
                            <button type=\"button\" class=\"btn btn-primary show-user\" data-user=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\" data-toggle=\"modal\" data-target=\"#modal-user\">
                                ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "
                            </button>
                        </td>
                        <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "rolesUsers", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 32
            if (($this->getAttribute($context["user"], "id", array()) != 1)) {
                // line 33
                echo "                            <button class=\"btn btn-danger remove-user\" data-user=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                echo "\" type=\"button\" data-toggle=\"modal\" data-target=\"#checkRemove\">
                                Удалить
                            </button>
                            ";
            }
            // line 37
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "            </tbody>
        </table>
        <div id=\"checkRemove\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
            <div class=\"modal-dialog modal-sm\">
                <div class=\"modal-content\">
                    <div class=\"modal-body\">
                        <p class=\"text-danger\">Вы действительно хотите удалить пользователя?</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button id=\"remove-user\" type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">
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
    <div id=\"modal-user\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title\">Пользователь</h4>
                </div>
                <div class=\"modal-body\">
                    <p class=\"text-muted\">
                        <strong class=\"text-success\">Пользователь:</strong> <span class=\"username\"></span>
                    </p>
                    <p class=\"text-muted\">
                        <strong class=\"text-success\">Роль:</strong> <span class=\"user-role\"></span>
                    </p>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        // line 84
        echo "    <script src=\"https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js\" type=\"application/javascript\"></script>
    <script src=\"https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("public/js/list-user.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return ":user:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 86,  157 => 84,  154 => 83,  109 => 40,  101 => 37,  93 => 33,  91 => 32,  86 => 30,  80 => 27,  76 => 26,  70 => 24,  66 => 23,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
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
/*         <a class="btn btn-success" href="{{ path('registration') }}">Добавить пользователя</a>*/
/*     </div>*/
/*     <div class="col-md-12 top20">*/
/*         <table id="user" class="table table-striped">*/
/*             <thead>*/
/*                 <tr>*/
/*                     <th>Пользователь</th>*/
/*                     <th>Роль</th>*/
/*                     <th></th>*/
/*                 </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*                 {% for user in users %}*/
/*                     <tr id="user-list-{{ user.id }}">*/
/*                         <td>*/
/*                             <button type="button" class="btn btn-primary show-user" data-user="{{ user.id }}" data-toggle="modal" data-target="#modal-user">*/
/*                                 {{ user.username }}*/
/*                             </button>*/
/*                         </td>*/
/*                         <td>{{ user.rolesUsers.name }}</td>*/
/*                         <td>*/
/*                             {% if user.id != 1 %}*/
/*                             <button class="btn btn-danger remove-user" data-user="{{ user.id }}" type="button" data-toggle="modal" data-target="#checkRemove">*/
/*                                 Удалить*/
/*                             </button>*/
/*                             {% endif %}*/
/*                         </td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </tbody>*/
/*         </table>*/
/*         <div id="checkRemove" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">*/
/*             <div class="modal-dialog modal-sm">*/
/*                 <div class="modal-content">*/
/*                     <div class="modal-body">*/
/*                         <p class="text-danger">Вы действительно хотите удалить пользователя?</p>*/
/*                     </div>*/
/*                     <div class="modal-footer">*/
/*                         <button id="remove-user" type="button" class="btn btn-success" data-dismiss="modal">*/
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
/*     <div id="modal-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">*/
/*         <div class="modal-dialog">*/
/*             <div class="modal-content">*/
/*                 <div class="modal-header">*/
/*                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                     <h4 class="modal-title">Пользователь</h4>*/
/*                 </div>*/
/*                 <div class="modal-body">*/
/*                     <p class="text-muted">*/
/*                         <strong class="text-success">Пользователь:</strong> <span class="username"></span>*/
/*                     </p>*/
/*                     <p class="text-muted">*/
/*                         <strong class="text-success">Роль:</strong> <span class="user-role"></span>*/
/*                     </p>*/
/*                 </div>*/
/*                 <div class="modal-footer">*/
/*                     <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="application/javascript"></script>*/
/*     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="application/javascript"></script>*/
/*     <script src="{{ asset('public/js/list-user.js') }}" type="application/javascript"></script>*/
/* {% endblock %}*/
