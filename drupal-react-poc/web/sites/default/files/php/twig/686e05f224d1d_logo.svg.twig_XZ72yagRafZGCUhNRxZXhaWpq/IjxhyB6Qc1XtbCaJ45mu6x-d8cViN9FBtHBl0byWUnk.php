<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @navigation/logo.svg.twig */
class __TwigTemplate_35436e818fa8936b0889a5b388f03d9b extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"40\" height=\"40\" viewBox=\"0 0 32 32\" role=\"img\" aria-label=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        yield "\">
  <rect fill=\"";
        // line 2
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("bg_color", $context)) ? (Twig\Extension\CoreExtension::default(($context["bg_color"] ?? null), "#347efe")) : ("#347efe")), "html", null, true);
        yield "\" width=\"32\" height=\"32\" rx=\"8\"/>
  <path fill=\"";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("fg_color", $context)) ? (Twig\Extension\CoreExtension::default(($context["fg_color"] ?? null), "#fff")) : ("#fff")), "html", null, true);
        yield "\" d=\"M19,10.3C17.67,9,16.38,7.68,16,6.23,15.62,7.67,14.33,9,13,10.3c-2,2-4.31,4.31-4.31,7.74a7.32,7.32,0,0,0,14.64,0C23.32,14.61,21,12.32,19,10.3Zm-7.22,9.44c-.45,0-2.11-2.87,1-5.91l2,2.22a.18.18,0,0,1,0,.25h0A19.3,19.3,0,0,0,12,19.6C11.92,19.75,11.83,19.74,11.79,19.74ZM16,23.51A2.52,2.52,0,0,1,13.48,21a2.56,2.56,0,0,1,.63-1.66c.45-.56,1.89-2.12,1.89-2.12s1.41,1.59,1.89,2.11A2.5,2.5,0,0,1,18.52,21,2.52,2.52,0,0,1,16,23.51Zm4.82-4.09c-.06.12-.18.32-.35.33s-.32-.14-.55-.47c-.48-.71-4.67-5.09-5.46-5.94s-.09-1.27.18-1.55L16,10.44a35.72,35.72,0,0,1,4.25,4.8A4.5,4.5,0,0,1,20.82,19.42Z\"/>
</svg>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["label", "bg_color", "fg_color"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@navigation/logo.svg.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  53 => 3,  49 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@navigation/logo.svg.twig", "/var/www/html/web/core/modules/navigation/templates/logo.svg.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 1, "default" => 2];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 'default'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
