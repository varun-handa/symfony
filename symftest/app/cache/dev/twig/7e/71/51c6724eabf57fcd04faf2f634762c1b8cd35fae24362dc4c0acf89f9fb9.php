<?php

/* AcmeAdminBundle:Log:index.html.twig */
class __TwigTemplate_7e7151c6724eabf57fcd04faf2f634762c1b8cd35fae24362dc4c0acf89f9fb9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Log Details</h1>

    <div class=\"row\">
        <form action=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("log_upload");
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
            <div class=\"form-group\">
                <label for=\"exampleInputFile\">Choose log file to upload</label>
                <input name=\"log_file\" type=\"file\" id=\"exampleInputFile\">
            </div>
            <div class=\"form-group\">
                <button type=\"submit\" class=\"btn btn-success\">Upload</button>
            </div>
        </form>
    </div>


    <table class=\"table records_list\" id=\"myTable\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Time</th>
                <th>Ip</th>
                <th>Url</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 31
            echo "            <tr>
                <td><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("log_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
                <td>";
            // line 33
            if ($this->getAttribute($context["entity"], "time", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "time", array()), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "ip", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "url", array()), "html", null, true);
            echo "</td>
                <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("log_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("log_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">edit</a>
                    </li>
                </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "        </tbody>
    </table>

        <ul>
        <li>
            <a href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("log_new");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>


    <script>
        \$(document).ready(function(){
            \$('#myTable').DataTable();
        });
    </script>
    ";
    }

    public function getTemplateName()
    {
        return "AcmeAdminBundle:Log:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 53,  110 => 48,  98 => 42,  92 => 39,  85 => 35,  81 => 34,  75 => 33,  69 => 32,  66 => 31,  62 => 30,  36 => 7,  31 => 4,  28 => 3,);
    }
}
