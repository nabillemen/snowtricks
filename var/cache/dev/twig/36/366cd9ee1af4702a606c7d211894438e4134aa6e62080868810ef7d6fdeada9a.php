<?php

/* @WebProfiler/Profiler/header.html.twig */
class __TwigTemplate_fce9fe72597f64b8aec2a1727605f7cdc43eee1850c98cb42a71bebb59b63336 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b1b946532f1fcda6ec0c43925ee2e1bfc45a2cb9fa64f555940148ede50fea3c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b1b946532f1fcda6ec0c43925ee2e1bfc45a2cb9fa64f555940148ede50fea3c->enter($__internal_b1b946532f1fcda6ec0c43925ee2e1bfc45a2cb9fa64f555940148ede50fea3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        $__internal_511a7cd0f060eb136743542ad128f9eec650044be5b672e711d3558ea5589ab2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_511a7cd0f060eb136743542ad128f9eec650044be5b672e711d3558ea5589ab2->enter($__internal_511a7cd0f060eb136743542ad128f9eec650044be5b672e711d3558ea5589ab2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        // line 1
        echo "<div id=\"header\">
    <div class=\"container\">
        <h1>";
        // line 3
        echo twig_include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
        echo " Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
";
        
        $__internal_b1b946532f1fcda6ec0c43925ee2e1bfc45a2cb9fa64f555940148ede50fea3c->leave($__internal_b1b946532f1fcda6ec0c43925ee2e1bfc45a2cb9fa64f555940148ede50fea3c_prof);

        
        $__internal_511a7cd0f060eb136743542ad128f9eec650044be5b672e711d3558ea5589ab2->leave($__internal_511a7cd0f060eb136743542ad128f9eec650044be5b672e711d3558ea5589ab2_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"header\">
    <div class=\"container\">
        <h1>{{ include('@WebProfiler/Icon/symfony.svg') }} Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
", "@WebProfiler/Profiler/header.html.twig", "C:\\Users\\nabil\\OpenClassrooms\\symfony\\snowtricks\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Profiler\\header.html.twig");
    }
}
