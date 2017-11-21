<?php

/* base.html.twig */
class __TwigTemplate_35a788ca461558bba9038e4c3f84ff08bc8c4a644fa3eb1893a42b9f45e0624c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b35042f01b9cf293937202ab6b59a5c74b02370701e693d61628db4b1ecfc77e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b35042f01b9cf293937202ab6b59a5c74b02370701e693d61628db4b1ecfc77e->enter($__internal_b35042f01b9cf293937202ab6b59a5c74b02370701e693d61628db4b1ecfc77e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_5482dc58e60ff80f9947e9ed52d993e2de207c375a2d934f38bec34ed513fb90 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5482dc58e60ff80f9947e9ed52d993e2de207c375a2d934f38bec34ed513fb90->enter($__internal_5482dc58e60ff80f9947e9ed52d993e2de207c375a2d934f38bec34ed513fb90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_b35042f01b9cf293937202ab6b59a5c74b02370701e693d61628db4b1ecfc77e->leave($__internal_b35042f01b9cf293937202ab6b59a5c74b02370701e693d61628db4b1ecfc77e_prof);

        
        $__internal_5482dc58e60ff80f9947e9ed52d993e2de207c375a2d934f38bec34ed513fb90->leave($__internal_5482dc58e60ff80f9947e9ed52d993e2de207c375a2d934f38bec34ed513fb90_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_cc049f72de4fd1e8e090d30ed49f577dfa1d0ef7bfe5274d29b0f6b7d0aa00d5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cc049f72de4fd1e8e090d30ed49f577dfa1d0ef7bfe5274d29b0f6b7d0aa00d5->enter($__internal_cc049f72de4fd1e8e090d30ed49f577dfa1d0ef7bfe5274d29b0f6b7d0aa00d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_bb9c818f5f422e75562691bf9bc96328e57de14c1fce9fe7b4e0d2a5fda4fbe9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bb9c818f5f422e75562691bf9bc96328e57de14c1fce9fe7b4e0d2a5fda4fbe9->enter($__internal_bb9c818f5f422e75562691bf9bc96328e57de14c1fce9fe7b4e0d2a5fda4fbe9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_bb9c818f5f422e75562691bf9bc96328e57de14c1fce9fe7b4e0d2a5fda4fbe9->leave($__internal_bb9c818f5f422e75562691bf9bc96328e57de14c1fce9fe7b4e0d2a5fda4fbe9_prof);

        
        $__internal_cc049f72de4fd1e8e090d30ed49f577dfa1d0ef7bfe5274d29b0f6b7d0aa00d5->leave($__internal_cc049f72de4fd1e8e090d30ed49f577dfa1d0ef7bfe5274d29b0f6b7d0aa00d5_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_978fbe23512f57705de73ba3c6b090a325296b55c59f12269a272003e6c80d2d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_978fbe23512f57705de73ba3c6b090a325296b55c59f12269a272003e6c80d2d->enter($__internal_978fbe23512f57705de73ba3c6b090a325296b55c59f12269a272003e6c80d2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_82fe2425a24368cffcdaf7ee2c2f11e71032d95b9ab39594f39a91e5d9839ad2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_82fe2425a24368cffcdaf7ee2c2f11e71032d95b9ab39594f39a91e5d9839ad2->enter($__internal_82fe2425a24368cffcdaf7ee2c2f11e71032d95b9ab39594f39a91e5d9839ad2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_82fe2425a24368cffcdaf7ee2c2f11e71032d95b9ab39594f39a91e5d9839ad2->leave($__internal_82fe2425a24368cffcdaf7ee2c2f11e71032d95b9ab39594f39a91e5d9839ad2_prof);

        
        $__internal_978fbe23512f57705de73ba3c6b090a325296b55c59f12269a272003e6c80d2d->leave($__internal_978fbe23512f57705de73ba3c6b090a325296b55c59f12269a272003e6c80d2d_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_41b517a47f3d498c122f7a03d819b1ca0f124e5447f7e66f054af97e3da6f7df = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_41b517a47f3d498c122f7a03d819b1ca0f124e5447f7e66f054af97e3da6f7df->enter($__internal_41b517a47f3d498c122f7a03d819b1ca0f124e5447f7e66f054af97e3da6f7df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_174d259caa465cf0a0f62a4113aa50daf6cee99a86ef8d630439543dce08ee92 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_174d259caa465cf0a0f62a4113aa50daf6cee99a86ef8d630439543dce08ee92->enter($__internal_174d259caa465cf0a0f62a4113aa50daf6cee99a86ef8d630439543dce08ee92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_174d259caa465cf0a0f62a4113aa50daf6cee99a86ef8d630439543dce08ee92->leave($__internal_174d259caa465cf0a0f62a4113aa50daf6cee99a86ef8d630439543dce08ee92_prof);

        
        $__internal_41b517a47f3d498c122f7a03d819b1ca0f124e5447f7e66f054af97e3da6f7df->leave($__internal_41b517a47f3d498c122f7a03d819b1ca0f124e5447f7e66f054af97e3da6f7df_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_13c3daa646e47560205dbd978eddac29ad59ece2fd1e7d74bb86cd16eb2f7579 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_13c3daa646e47560205dbd978eddac29ad59ece2fd1e7d74bb86cd16eb2f7579->enter($__internal_13c3daa646e47560205dbd978eddac29ad59ece2fd1e7d74bb86cd16eb2f7579_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6e4126ca36a720bbe4728aa2e4308f1874bc34a6ce858c49325e7eab672975e9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6e4126ca36a720bbe4728aa2e4308f1874bc34a6ce858c49325e7eab672975e9->enter($__internal_6e4126ca36a720bbe4728aa2e4308f1874bc34a6ce858c49325e7eab672975e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6e4126ca36a720bbe4728aa2e4308f1874bc34a6ce858c49325e7eab672975e9->leave($__internal_6e4126ca36a720bbe4728aa2e4308f1874bc34a6ce858c49325e7eab672975e9_prof);

        
        $__internal_13c3daa646e47560205dbd978eddac29ad59ece2fd1e7d74bb86cd16eb2f7579->leave($__internal_13c3daa646e47560205dbd978eddac29ad59ece2fd1e7d74bb86cd16eb2f7579_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 11,  100 => 10,  83 => 6,  65 => 5,  53 => 12,  50 => 11,  48 => 10,  41 => 7,  39 => 6,  35 => 5,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "C:\\Users\\nabil\\OpenClassrooms\\symfony\\snowtricks\\app\\Resources\\views\\base.html.twig");
    }
}
