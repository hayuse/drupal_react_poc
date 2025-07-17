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

/* core/modules/navigation/templates/top-bar.html.twig */
class __TwigTemplate_47a41369d7d2b3d2746747660d686046 extends Template
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
        // line 15
        $context["attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 16
        if (((($context["tools"] ?? null) || $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["context"] ?? null))) || $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["actions"] ?? null)))) {
            // line 17
            yield "  <aside ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["top-bar"], "method", false, false, true, 17), "setAttribute", ["data-drupal-admin-styles", ""], "method", false, false, true, 17), "setAttribute", ["aria-labelledby", "top-bar__title"], "method", false, false, true, 17), "setAttribute", ["data-offset-top", true], "method", false, false, true, 17), "html", null, true);
            yield ">
    <h3 id=\"top-bar__title\" class=\"visually-hidden\">";
            // line 18
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Administrative top bar"));
            yield "</h3>
    <div class=\"top-bar__content\">
      <div class=\"top-bar__tools\">";
            // line 21
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["tools"] ?? null), "html", null, true);
            // line 22
            yield "</div>
      <div class=\"top-bar__context\">";
            // line 24
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["context"] ?? null), "html", null, true);
            // line 25
            yield "</div>
      <div class=\"top-bar__actions\">";
            // line 27
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["actions"] ?? null), "html", null, true);
            // line 28
            yield "</div>
    </div>
  </aside>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["tools", "context", "actions"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/templates/top-bar.html.twig";
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
        return array (  70 => 28,  68 => 27,  65 => 25,  63 => 24,  60 => 22,  58 => 21,  53 => 18,  48 => 17,  46 => 16,  44 => 15,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/templates/top-bar.html.twig", "/var/www/html/web/core/modules/navigation/templates/top-bar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 15, "if" => 16];
        static $filters = ["render" => 16, "escape" => 17, "t" => 18];
        static $functions = ["create_attribute" => 15];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['render', 'escape', 't'],
                ['create_attribute'],
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
