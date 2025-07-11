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

/* core/modules/navigation/layouts/navigation.html.twig */
class __TwigTemplate_c3a5d1360d276dfd29d76ec8849f1bc8 extends Template
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
        // line 20
        $context["control_bar_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 21
        yield "
<div ";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["control_bar_attributes"] ?? null), "addClass", ["admin-toolbar-control-bar"], "method", false, false, true, 22), "setAttribute", ["data-drupal-admin-styles", ""], "method", false, false, true, 22), "html", null, true);
        yield ">
  <div class=\"admin-toolbar-control-bar__content\">
    ";
        // line 24
        yield from $this->load("navigation:toolbar-button", 24)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "aria-controls" => "admin-toolbar", "type" => "button"]), "icon" => ["icon_id" => "burger"], "text" => t("Expand sidebar"), "modifiers" => ["small-offset"], "extra_classes" => ["admin-toolbar-control-bar__burger"]]));
        // line 33
        yield "  </div>
</div>

<aside
  ";
        // line 37
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["admin-toolbar"], "method", false, false, true, 37), "setAttribute", ["id", "admin-toolbar"], "method", false, false, true, 37), "setAttribute", ["data-drupal-admin-styles", true], "method", false, false, true, 37), "html", null, true);
        yield "
>
  ";
        // line 40
        yield "  <div class=\"admin-toolbar__displace-placeholder\"></div>

  <div class=\"admin-toolbar__scroll-wrapper\">
    ";
        // line 43
        $context["title_menu"] = \Drupal\Component\Utility\Html::getUniqueId("admin-toolbar-title");
        // line 44
        yield "    ";
        // line 45
        yield "    <nav ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "content", [], "any", false, false, true, 45), "setAttribute", ["id", "menu-builder"], "method", false, false, true, 45), "addClass", ["admin-toolbar__content"], "method", false, false, true, 45), "setAttribute", ["aria-labelledby", ($context["title_menu"] ?? null)], "method", false, false, true, 45), "html", null, true);
        yield ">
      <h3 id=\"";
        // line 46
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_menu"] ?? null), "html", null, true);
        yield "\" class=\"visually-hidden\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Administrative toolbar content"));
        yield "</h3>
      ";
        // line 48
        yield "      <div class=\"admin-toolbar__header\">
        ";
        // line 49
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "hide_logo", [], "any", false, false, true, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 50
            yield "          <a class=\"admin-toolbar__logo\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
            yield "\">
            ";
            // line 51
            if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_path", [], "any", false, false, true, 51))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "              <img alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Navigation logo"));
                yield "\" src=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_path", [], "any", false, false, true, 52), "html", null, true);
                yield "\" loading=\"eager\" width=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_width", [], "any", true, true, true, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_width", [], "any", false, false, true, 52), 40)) : (40)), "html", null, true);
                yield "\" height=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_height", [], "any", true, true, true, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["settings"] ?? null), "logo_height", [], "any", false, false, true, 52), 40)) : (40)), "html", null, true);
                yield "\">
            ";
            } else {
                // line 54
                yield "              ";
                yield from $this->load("@navigation/logo.svg.twig", 54)->unwrap()->yield(CoreExtension::toArray(["label" => t("Navigation logo")]));
                // line 57
                yield "            ";
            }
            // line 58
            yield "          </a>
        ";
        }
        // line 60
        yield "        ";
        yield from $this->load("navigation:toolbar-button", 60)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["data-toolbar-back-control" => true, "tabindex" => "-1"]), "extra_classes" => ["admin-toolbar__back-button"], "icon" => ["icon_id" => "arrow-left"], "text" => t("Back")]));
        // line 66
        yield "        ";
        yield from $this->load("navigation:toolbar-button", 66)->unwrap()->yield(CoreExtension::toArray(["action" => t("Collapse sidebar"), "attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-controls" => "admin-toolbar", "tabindex" => "-1", "type" => "button"]), "extra_classes" => ["admin-toolbar__close-button"], "icon" => ["icon_id" => "cross"]]));
        // line 72
        yield "      </div>

      ";
        // line 74
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "content_top", [], "any", false, false, true, 74), "html", null, true);
        yield "
      ";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "content", [], "any", false, false, true, 75), "html", null, true);
        yield "
    </nav>

    ";
        // line 78
        $context["title_menu_footer"] = \Drupal\Component\Utility\Html::getUniqueId("admin-toolbar-footer");
        // line 79
        yield "    <nav ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "footer", [], "any", false, false, true, 79), "setAttribute", ["id", "menu-footer"], "method", false, false, true, 79), "addClass", ["admin-toolbar__footer"], "method", false, false, true, 79), "setAttribute", ["aria-labelledby", ($context["title_menu_footer"] ?? null)], "method", false, false, true, 79), "html", null, true);
        yield ">
      <h3 id=\"";
        // line 80
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_menu_footer"] ?? null), "html", null, true);
        yield "\" class=\"visually-hidden\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Administrative toolbar footer"));
        yield "</h3>
      ";
        // line 81
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "footer", [], "any", false, false, true, 81), "html", null, true);
        yield "
      <button aria-controls=\"admin-toolbar\" class=\"admin-toolbar__expand-button\" type=\"button\">
        ";
        // line 83
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\IconsTwigExtension']->getIconRenderable("navigation", "chevron", ["class" => "admin-toolbar__expand-button-chevron", "size" => 16]), "html", null, true);
        yield "
        <span class=\"visually-hidden\" data-toolbar-text>";
        // line 84
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Collapse sidebar"));
        yield "</span>
      </button>
    </nav>
  </div>
</aside>
<div class=\"admin-toolbar-overlay\" aria-controls=\"admin-toolbar\" data-drupal-admin-styles></div>
<script>
  if (localStorage.getItem('Drupal.navigation.sidebarExpanded') !== 'false' && (window.matchMedia('(min-width: 1024px)').matches)) {
    document.documentElement.setAttribute('data-admin-toolbar', 'expanded');
  }
</script>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "region_attributes", "settings", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/layouts/navigation.html.twig";
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
        return array (  163 => 84,  159 => 83,  154 => 81,  148 => 80,  143 => 79,  141 => 78,  135 => 75,  131 => 74,  127 => 72,  124 => 66,  121 => 60,  117 => 58,  114 => 57,  111 => 54,  99 => 52,  97 => 51,  92 => 50,  90 => 49,  87 => 48,  81 => 46,  76 => 45,  74 => 44,  72 => 43,  67 => 40,  62 => 37,  56 => 33,  54 => 24,  49 => 22,  46 => 21,  44 => 20,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/layouts/navigation.html.twig", "/var/www/html/web/core/modules/navigation/layouts/navigation.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 20, "include" => 24, "if" => 49];
        static $filters = ["escape" => 22, "t" => 27, "clean_unique_id" => 43, "default" => 52];
        static $functions = ["create_attribute" => 20, "path" => 50, "icon" => 83];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'include', 'if'],
                ['escape', 't', 'clean_unique_id', 'default'],
                ['create_attribute', 'path', 'icon'],
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
