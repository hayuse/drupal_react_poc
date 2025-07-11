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

/* core/modules/navigation/templates/top-bar-page-actions.html.twig */
class __TwigTemplate_fce41210ba2f8e28f0098ee541e6d060 extends Template
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
        // line 11
        $context["dropdown_id"] = \Drupal\Component\Utility\Html::getUniqueId("top-bar-page-actions");
        // line 12
        yield "
";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["featured_page_actions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["featured_page_action"]) {
            // line 14
            yield "  ";
            $context["link"] = (($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["featured_page_action"], "page_action", [], "any", false, false, true, 14)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#link"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["featured_page_action"], "page_action", [], "any", false, false, true, 14), "#link", [], "array", false, false, true, 14));
            // line 15
            yield "  ";
            yield from $this->load("navigation:toolbar-button", 15)->unwrap()->yield(CoreExtension::toArray(["text" => (($_v1 =             // line 16
($context["link"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#title"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["link"] ?? null), "#title", [], "array", false, false, true, 16)), "html_tag" => "a", "attributes" => CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "setAttribute", ["href", Twig\Extension\CoreExtension::default($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((($_v2 =             // line 18
($context["link"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#url"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["link"] ?? null), "#url", [], "array", false, false, true, 18))), null)], "method", false, false, true, 18), "modifiers" => ["primary"], "icon" => CoreExtension::getAttribute($this->env, $this->source,             // line 20
$context["featured_page_action"], "icon", [], "any", false, false, true, 20)]));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['featured_page_action'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        yield "
";
        // line 24
        yield from $this->load("navigation:toolbar-button", 24)->unwrap()->yield(CoreExtension::toArray(["icon" => ["icon_id" => "dots"], "action" => t("More actions"), "attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "aria-controls" =>         // line 30
($context["dropdown_id"] ?? null), "data-drupal-dropdown" => "true"])]));
        // line 35
        yield "
<div class=\"toolbar-dropdown__menu\" id=";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["dropdown_id"] ?? null), "html", null, true);
        yield ">
  <ul class=\"toolbar-dropdown__list\">
    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["page_actions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["page_action"]) {
            // line 39
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["page_action"], "html", null, true);
            yield "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page_action'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        yield "  </ul>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["featured_page_actions", "page_actions"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/templates/top-bar-page-actions.html.twig";
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
        return array (  93 => 41,  84 => 39,  80 => 38,  75 => 36,  72 => 35,  70 => 30,  69 => 24,  66 => 23,  60 => 20,  59 => 18,  58 => 16,  56 => 15,  53 => 14,  49 => 13,  46 => 12,  44 => 11,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/templates/top-bar-page-actions.html.twig", "/var/www/html/web/core/modules/navigation/templates/top-bar-page-actions.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 11, "for" => 13, "include" => 15];
        static $filters = ["clean_unique_id" => 11, "default" => 18, "render" => 18, "t" => 26, "escape" => 36];
        static $functions = ["create_attribute" => 18];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'include'],
                ['clean_unique_id', 'default', 'render', 't', 'escape'],
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
