<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_0a49730a4415c52dbae0bde59acb7a1499983a905e405c913fd1a90537bf38c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_f99c0428b04a2710928531fcdf7d5387f7d070d6efdca9c2e84b0eb16cd58c2f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f99c0428b04a2710928531fcdf7d5387f7d070d6efdca9c2e84b0eb16cd58c2f->enter($__internal_f99c0428b04a2710928531fcdf7d5387f7d070d6efdca9c2e84b0eb16cd58c2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_3096f2e219977fe9105ecf2717f6b7b3776f8cc602df2d6e360d72bfbdbfc92c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3096f2e219977fe9105ecf2717f6b7b3776f8cc602df2d6e360d72bfbdbfc92c->enter($__internal_3096f2e219977fe9105ecf2717f6b7b3776f8cc602df2d6e360d72bfbdbfc92c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f99c0428b04a2710928531fcdf7d5387f7d070d6efdca9c2e84b0eb16cd58c2f->leave($__internal_f99c0428b04a2710928531fcdf7d5387f7d070d6efdca9c2e84b0eb16cd58c2f_prof);

        
        $__internal_3096f2e219977fe9105ecf2717f6b7b3776f8cc602df2d6e360d72bfbdbfc92c->leave($__internal_3096f2e219977fe9105ecf2717f6b7b3776f8cc602df2d6e360d72bfbdbfc92c_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_5da690c0922018d39f24f2e3a4d0d6631f3b037c3e898cac76dbede9be79f636 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5da690c0922018d39f24f2e3a4d0d6631f3b037c3e898cac76dbede9be79f636->enter($__internal_5da690c0922018d39f24f2e3a4d0d6631f3b037c3e898cac76dbede9be79f636_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_09987c6fc797c6bd1c49fc0531197e736b61f417d2575fd58820b724819f3d26 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_09987c6fc797c6bd1c49fc0531197e736b61f417d2575fd58820b724819f3d26->enter($__internal_09987c6fc797c6bd1c49fc0531197e736b61f417d2575fd58820b724819f3d26_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_09987c6fc797c6bd1c49fc0531197e736b61f417d2575fd58820b724819f3d26->leave($__internal_09987c6fc797c6bd1c49fc0531197e736b61f417d2575fd58820b724819f3d26_prof);

        
        $__internal_5da690c0922018d39f24f2e3a4d0d6631f3b037c3e898cac76dbede9be79f636->leave($__internal_5da690c0922018d39f24f2e3a4d0d6631f3b037c3e898cac76dbede9be79f636_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_1452793df32ac9ee645063fb0e342d6eaf73d4d920fa76dc9fe6e1ac61b7043f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1452793df32ac9ee645063fb0e342d6eaf73d4d920fa76dc9fe6e1ac61b7043f->enter($__internal_1452793df32ac9ee645063fb0e342d6eaf73d4d920fa76dc9fe6e1ac61b7043f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_ff77f1860c117e62669808fdca46e6128ab57cbde546d096adcdb182a5d04ca5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ff77f1860c117e62669808fdca46e6128ab57cbde546d096adcdb182a5d04ca5->enter($__internal_ff77f1860c117e62669808fdca46e6128ab57cbde546d096adcdb182a5d04ca5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ff77f1860c117e62669808fdca46e6128ab57cbde546d096adcdb182a5d04ca5->leave($__internal_ff77f1860c117e62669808fdca46e6128ab57cbde546d096adcdb182a5d04ca5_prof);

        
        $__internal_1452793df32ac9ee645063fb0e342d6eaf73d4d920fa76dc9fe6e1ac61b7043f->leave($__internal_1452793df32ac9ee645063fb0e342d6eaf73d4d920fa76dc9fe6e1ac61b7043f_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_2bf7a67c6f05b77cd63c3a217127f8f523cdb76d9606a0154a13468f39a98e1f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2bf7a67c6f05b77cd63c3a217127f8f523cdb76d9606a0154a13468f39a98e1f->enter($__internal_2bf7a67c6f05b77cd63c3a217127f8f523cdb76d9606a0154a13468f39a98e1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_a75832abd2809d7ffac36564e11229feec1b3efe251a76c8927b457246751fd8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a75832abd2809d7ffac36564e11229feec1b3efe251a76c8927b457246751fd8->enter($__internal_a75832abd2809d7ffac36564e11229feec1b3efe251a76c8927b457246751fd8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_a75832abd2809d7ffac36564e11229feec1b3efe251a76c8927b457246751fd8->leave($__internal_a75832abd2809d7ffac36564e11229feec1b3efe251a76c8927b457246751fd8_prof);

        
        $__internal_2bf7a67c6f05b77cd63c3a217127f8f523cdb76d9606a0154a13468f39a98e1f->leave($__internal_2bf7a67c6f05b77cd63c3a217127f8f523cdb76d9606a0154a13468f39a98e1f_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\Users\\nabil\\OpenClassrooms\\symfony\\snowtricks\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
