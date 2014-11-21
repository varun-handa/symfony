<?php

/* AcmeAdminBundle:Default:log.html.twig */
class __TwigTemplate_528a234fab56db6ce1aff768d569ccbfbe67725c038fcbba402afb3f54974546 extends Twig_Template
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
    <form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("admin_upload_log");
        echo "\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"exampleInputFile\">Choose log file to upload</label>
            <input type=\"log_file\" id=\"exampleInputFile\">
        </div>
    </form>
</div>


";
    }

    public function getTemplateName()
    {
        return "AcmeAdminBundle:Default:log.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,);
    }
}
