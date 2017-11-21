<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_e12506caa6aa0b489a5a6e3aed6a7d8b525d78ffcaed02e7eb56bb15cc405767 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_875b58a57eca2fbe3c5e1329230bd38523178cdc453debbefd258b3e36f2c9aa = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_875b58a57eca2fbe3c5e1329230bd38523178cdc453debbefd258b3e36f2c9aa->enter($__internal_875b58a57eca2fbe3c5e1329230bd38523178cdc453debbefd258b3e36f2c9aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_e482921b18f1406fc30e8fa5460e603595399c542437b96cdcf2aec56285d74c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e482921b18f1406fc30e8fa5460e603595399c542437b96cdcf2aec56285d74c->enter($__internal_e482921b18f1406fc30e8fa5460e603595399c542437b96cdcf2aec56285d74c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_875b58a57eca2fbe3c5e1329230bd38523178cdc453debbefd258b3e36f2c9aa->leave($__internal_875b58a57eca2fbe3c5e1329230bd38523178cdc453debbefd258b3e36f2c9aa_prof);

        
        $__internal_e482921b18f1406fc30e8fa5460e603595399c542437b96cdcf2aec56285d74c->leave($__internal_e482921b18f1406fc30e8fa5460e603595399c542437b96cdcf2aec56285d74c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_ab68913ae41daa2e02542a3dda3d6ee8165e6ba5a508706d36fd3a7af613d5b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ab68913ae41daa2e02542a3dda3d6ee8165e6ba5a508706d36fd3a7af613d5b6->enter($__internal_ab68913ae41daa2e02542a3dda3d6ee8165e6ba5a508706d36fd3a7af613d5b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_ed8a3c0c4f7bc4a93672afae26963310caaf7a890c235dd91819640d2c6b2ce1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ed8a3c0c4f7bc4a93672afae26963310caaf7a890c235dd91819640d2c6b2ce1->enter($__internal_ed8a3c0c4f7bc4a93672afae26963310caaf7a890c235dd91819640d2c6b2ce1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_ed8a3c0c4f7bc4a93672afae26963310caaf7a890c235dd91819640d2c6b2ce1->leave($__internal_ed8a3c0c4f7bc4a93672afae26963310caaf7a890c235dd91819640d2c6b2ce1_prof);

        
        $__internal_ab68913ae41daa2e02542a3dda3d6ee8165e6ba5a508706d36fd3a7af613d5b6->leave($__internal_ab68913ae41daa2e02542a3dda3d6ee8165e6ba5a508706d36fd3a7af613d5b6_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_53b5c427f946be9d390758ab754c3ca4cffd7672a43e0d109141cdec36af3940 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_53b5c427f946be9d390758ab754c3ca4cffd7672a43e0d109141cdec36af3940->enter($__internal_53b5c427f946be9d390758ab754c3ca4cffd7672a43e0d109141cdec36af3940_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_0f184f2e76db518c0280e9612b58d595ed0f809c52b45312018ce57047fbcf78 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0f184f2e76db518c0280e9612b58d595ed0f809c52b45312018ce57047fbcf78->enter($__internal_0f184f2e76db518c0280e9612b58d595ed0f809c52b45312018ce57047fbcf78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_0f184f2e76db518c0280e9612b58d595ed0f809c52b45312018ce57047fbcf78->leave($__internal_0f184f2e76db518c0280e9612b58d595ed0f809c52b45312018ce57047fbcf78_prof);

        
        $__internal_53b5c427f946be9d390758ab754c3ca4cffd7672a43e0d109141cdec36af3940->leave($__internal_53b5c427f946be9d390758ab754c3ca4cffd7672a43e0d109141cdec36af3940_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_f5653cb219fd0b08eb3406ee42318871e247121eff4e7da91780ac7cf17c5cad = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f5653cb219fd0b08eb3406ee42318871e247121eff4e7da91780ac7cf17c5cad->enter($__internal_f5653cb219fd0b08eb3406ee42318871e247121eff4e7da91780ac7cf17c5cad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_007f7a55553e55800ec71cf56acd61d4f4428c9c0d488c61dcee689f4bc3ca2b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_007f7a55553e55800ec71cf56acd61d4f4428c9c0d488c61dcee689f4bc3ca2b->enter($__internal_007f7a55553e55800ec71cf56acd61d4f4428c9c0d488c61dcee689f4bc3ca2b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_007f7a55553e55800ec71cf56acd61d4f4428c9c0d488c61dcee689f4bc3ca2b->leave($__internal_007f7a55553e55800ec71cf56acd61d4f4428c9c0d488c61dcee689f4bc3ca2b_prof);

        
        $__internal_f5653cb219fd0b08eb3406ee42318871e247121eff4e7da91780ac7cf17c5cad->leave($__internal_f5653cb219fd0b08eb3406ee42318871e247121eff4e7da91780ac7cf17c5cad_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "C:\\Users\\nabil\\OpenClassrooms\\symfony\\snowtricks\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\exception.html.twig");
    }
}
