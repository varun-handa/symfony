<?php

/* AcmeAdminBundle:FosUser:index.html.twig */
class __TwigTemplate_b4b2950f995847c5ad2a7fd154ef3a39022ba1d87fabbe1cfbc06d2b6c4269de extends Twig_Template
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
        echo "<div class=\"row\">
        <div class=\"col-md-2\">
            <h3>User list</h3>
        </div>
        <div class=\"col-md-4\">
            <h3><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Logout</a></h3>
        </div>
    </div>


    <table class=\"table records_list\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 25
            echo "            <tr>
                <td><a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "username", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "email", array()), "html", null, true);
            echo "</td>
                <td>
                <ul class=\"nav nav-pills\">
                    <li role=\"presentation\" class=\"active\">
                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li  role=\"presentation\" class=\"active\">
                        <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
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
        // line 41
        echo "        </tbody>
    </table>

    <div class=\"row\">
        <a class=\"btn btn-primary\" href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("admin_new");
        echo "\">
            Create a new entry
        </a>

        <a class=\"btn btn-primary\" href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("log");
        echo "\">
            Vew Log data OR Upload Log File
        </a>
    </div>



    ";
    }

    public function getTemplateName()
    {
        return "AcmeAdminBundle:FosUser:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 49,  104 => 45,  98 => 41,  86 => 35,  80 => 32,  73 => 28,  69 => 27,  63 => 26,  60 => 25,  56 => 24,  38 => 9,  31 => 4,  28 => 3,);
    }
}
