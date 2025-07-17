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

/* core/modules/navigation/templates/navigation-menu.html.twig */
class __TwigTemplate_f380330560662c21786e2376902eeaa4 extends Template
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
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 2
        yield "<div class=\"admin-toolbar__item\">
  <h4 class=\"visually-hidden focusable\">";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</h4>
  <ul class=\"toolbar-block__list\">
    ";
        // line 5
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_items", $context, 5, $this->getSourceContext())->macro_menu_items(...[($context["items"] ?? null), ($context["attributes"] ?? null), 0]));
        yield "
  </ul>
</div>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "title", "items", "attributes", "menu_level", "v"]);        yield from [];
    }

    // line 9
    public function macro_menu_items($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "items" => $items,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 10
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                yield "
    ";
                // line 12
                $context["item_link_tag"] = "a";
                // line 13
                yield "
    ";
                // line 14
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 14), "isRouted", [], "any", false, false, true, 14)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 15
                    yield "      ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 15), "routeName", [], "any", false, false, true, 15) == "<nolink>")) {
                        // line 16
                        yield "        ";
                        $context["item_link_tag"] = Twig\Extension\CoreExtension::constant("\\Drupal\\Core\\GeneratedNoLink::TAG");
                        // line 17
                        yield "      ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 17), "routeName", [], "any", false, false, true, 17) == "<button>")) {
                        // line 18
                        yield "        ";
                        $context["item_link_tag"] = Twig\Extension\CoreExtension::constant("\\Drupal\\Core\\GeneratedButton::TAG");
                        // line 19
                        yield "      ";
                    }
                    // line 20
                    yield "    ";
                }
                // line 21
                yield "
    ";
                // line 22
                if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 22), "options", [], "any", false, false, true, 22), "attributes", [], "any", false, false, true, 22))) {
                    // line 23
                    yield "      ";
                    $context["item_link_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
                    // line 24
                    yield "    ";
                } else {
                    // line 25
                    yield "      ";
                    $context["item_link_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 25), "options", [], "any", false, false, true, 25), "attributes", [], "any", false, false, true, 25));
                    // line 26
                    yield "    ";
                }
                // line 27
                yield "
    ";
                // line 28
                $context["item_id"] = \Drupal\Component\Utility\Html::getUniqueId(("navigation-link--" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "original_link", [], "any", false, false, true, 28), "pluginId", [], "any", false, false, true, 28)));
                // line 29
                yield "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 30
                    yield "      ";
                    if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 30))) {
                        // line 31
                        yield "        <li id=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["item_id"] ?? null), "html", null, true);
                        yield "\" class=\"toolbar-block__list-item\">
          ";
                        // line 32
                        yield from $this->load("navigation:toolbar-button", 32)->unwrap()->yield(CoreExtension::toArray(["attributes" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 33
($context["item_link_attributes"] ?? null), "setAttribute", ["href", Twig\Extension\CoreExtension::default($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 33)), null)], "method", false, false, true, 33), "setAttribute", ["data-drupal-tooltip", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 33)], "method", false, false, true, 33), "setAttribute", ["data-drupal-tooltip-class", "admin-toolbar__tooltip"], "method", false, false, true, 33), "icon" => CoreExtension::getAttribute($this->env, $this->source,                         // line 34
$context["item"], "icon", [], "any", false, false, true, 34), "html_tag" =>                         // line 35
($context["item_link_tag"] ?? null), "text" => CoreExtension::getAttribute($this->env, $this->source,                         // line 36
$context["item"], "title", [], "any", false, false, true, 36), "modifiers" => Twig\Extension\CoreExtension::filter($this->env, ["collapsible", (((                        // line 39
($context["item_link_tag"] ?? null) == "span")) ? ("non-interactive") : (null))],                         // line 40
function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return  !(null === ($context["v"] ?? null)); })]));
                        // line 42
                        yield "        </li>
      ";
                    } else {
                        // line 44
                        yield "        <li id=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["item_id"] ?? null), "html", null, true);
                        yield "\" class=\"toolbar-block__list-item toolbar-popover\" data-toolbar-popover>
          ";
                        // line 45
                        yield from $this->load("navigation:toolbar-button", 45)->unwrap()->yield(CoreExtension::toArray(["action" => t("Extend"), "attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "aria-controls" =>                         // line 49
($context["item_id"] ?? null), "data-toolbar-popover-control" => true, "data-has-safe-triangle" => true]), "icon" => CoreExtension::getAttribute($this->env, $this->source,                         // line 53
$context["item"], "icon", [], "any", false, false, true, 53), "text" => CoreExtension::getAttribute($this->env, $this->source,                         // line 54
$context["item"], "title", [], "any", false, false, true, 54), "modifiers" => ["expand--side", "collapsible"], "extra_classes" => ["toolbar-popover__control"]]));
                        // line 63
                        yield "          <div class=\"toolbar-popover__wrapper\" data-toolbar-popover-wrapper inert>
            ";
                        // line 64
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 65
                            yield "              ";
                            yield from $this->load("navigation:toolbar-button", 65)->unwrap()->yield(CoreExtension::toArray(["attributes" => CoreExtension::getAttribute($this->env, $this->source,                             // line 66
($context["item_link_attributes"] ?? null), "setAttribute", ["href", $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 66))], "method", false, false, true, 66), "html_tag" =>                             // line 67
($context["item_link_tag"] ?? null), "text" => CoreExtension::getAttribute($this->env, $this->source,                             // line 68
$context["item"], "title", [], "any", false, false, true, 68), "modifiers" => ["large", "dark"], "extra_classes" => ["toolbar-popover__header"]]));
                            // line 77
                            yield "            ";
                        } else {
                            // line 78
                            yield "              ";
                            yield from $this->load("navigation:toolbar-button", 78)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "modifiers" => ["large", "dark", "non-interactive"], "extra_classes" => ["toolbar-popover__header"], "html_tag" => "span", "text" => CoreExtension::getAttribute($this->env, $this->source,                             // line 89
$context["item"], "title", [], "any", false, false, true, 89)]));
                            // line 91
                            yield "            ";
                        }
                        // line 92
                        yield "            <ul class=\"toolbar-menu toolbar-popover__menu\">
              ";
                        // line 93
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_items", $context, 93, $this->getSourceContext())->macro_menu_items(...[CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 93), ($context["attributes"] ?? null), 1]));
                        yield "
            </ul>
          </div>
        </li>
      ";
                    }
                    // line 98
                    yield "
    ";
                } elseif ((                // line 99
($context["menu_level"] ?? null) == 1)) {
                    // line 100
                    yield "      <li class=\"toolbar-menu__item toolbar-menu__item--level-";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["menu_level"] ?? null), "html", null, true);
                    yield "\">
        ";
                    // line 101
                    if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 101))) {
                        // line 102
                        yield "          ";
                        yield from $this->load("navigation:toolbar-button", 102)->unwrap()->yield(CoreExtension::toArray(["attributes" => CoreExtension::getAttribute($this->env, $this->source,                         // line 103
($context["item_link_attributes"] ?? null), "setAttribute", ["href", Twig\Extension\CoreExtension::default($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 103)), null)], "method", false, false, true, 103), "text" => CoreExtension::getAttribute($this->env, $this->source,                         // line 104
$context["item"], "title", [], "any", false, false, true, 104), "html_tag" =>                         // line 105
($context["item_link_tag"] ?? null), "extra_classes" => [(((                        // line 107
($context["item_link_tag"] ?? null) == "span")) ? ("toolbar-button--non-interactive") : (""))]]));
                        // line 110
                        yield "        ";
                    } else {
                        // line 111
                        yield "          ";
                        yield from $this->load("navigation:toolbar-button", 111)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "data-toolbar-menu-trigger" =>                         // line 114
($context["menu_level"] ?? null)]), "text" => CoreExtension::getAttribute($this->env, $this->source,                         // line 116
$context["item"], "title", [], "any", false, false, true, 116), "modifiers" => ["expand--down"]]));
                        // line 119
                        yield "          <ul class=\"toolbar-menu toolbar-menu--level-";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["menu_level"] ?? null) + 1), "html", null, true);
                        yield "\" inert>
            ";
                        // line 120
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_items", $context, 120, $this->getSourceContext())->macro_menu_items(...[CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 120), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)]));
                        yield "
          </ul>
        ";
                    }
                    // line 123
                    yield "      </li>
    ";
                } else {
                    // line 125
                    yield "      <li class=\"toolbar-menu__item toolbar-menu__item--level-";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["menu_level"] ?? null), "html", null, true);
                    yield "\">
        ";
                    // line 126
                    if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 126))) {
                        // line 127
                        yield "          ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 127), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 127), ["class" => ["toolbar-menu__link", ("toolbar-menu__link--" .                         // line 130
($context["menu_level"] ?? null))], "data-index-text" => Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source,                         // line 132
$context["item"], "title", [], "any", false, false, true, 132)))]), "html", null, true);
                        // line 133
                        yield "
        ";
                    } else {
                        // line 135
                        yield "          <button
            class=\"toolbar-menu__link toolbar-menu__link--";
                        // line 136
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["menu_level"] ?? null), "html", null, true);
                        yield "\"
            data-toolbar-menu-trigger=\"";
                        // line 137
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["menu_level"] ?? null), "html", null, true);
                        yield "\"
            aria-expanded=\"false\"
            data-index-text=\"";
                        // line 139
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 139))), "html", null, true);
                        yield "\"
          >
            <span data-toolbar-action class=\"toolbar-menu__link-action visually-hidden\">";
                        // line 141
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Extend"));
                        yield "</span>
            <span class=\"toolbar-menu__link-title\">";
                        // line 142
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 142), "html", null, true);
                        yield "</span>
            ";
                        // line 143
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\IconsTwigExtension']->getIconRenderable("navigation", "chevron", ["class" => "toolbar-menu__chevron", "size" => 16]), "html", null, true);
                        yield "
          </button>
          <ul class=\"toolbar-menu toolbar-menu--level-";
                        // line 145
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["menu_level"] ?? null) + 1), "html", null, true);
                        yield "\" inert>
            ";
                        // line 146
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_items", $context, 146, $this->getSourceContext())->macro_menu_items(...[CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 146), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)]));
                        yield "
          </ul>
        ";
                    }
                    // line 149
                    yield "      </li>
    ";
                }
                // line 151
                yield "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/templates/navigation-menu.html.twig";
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
        return array (  301 => 151,  297 => 149,  291 => 146,  287 => 145,  282 => 143,  278 => 142,  274 => 141,  269 => 139,  264 => 137,  260 => 136,  257 => 135,  253 => 133,  251 => 132,  250 => 130,  248 => 127,  246 => 126,  241 => 125,  237 => 123,  231 => 120,  226 => 119,  224 => 116,  223 => 114,  221 => 111,  218 => 110,  216 => 107,  215 => 105,  214 => 104,  213 => 103,  211 => 102,  209 => 101,  204 => 100,  202 => 99,  199 => 98,  191 => 93,  188 => 92,  185 => 91,  183 => 89,  181 => 78,  178 => 77,  176 => 68,  175 => 67,  174 => 66,  172 => 65,  170 => 64,  167 => 63,  165 => 54,  164 => 53,  163 => 49,  162 => 45,  157 => 44,  153 => 42,  151 => 40,  150 => 39,  149 => 36,  148 => 35,  147 => 34,  146 => 33,  145 => 32,  140 => 31,  137 => 30,  134 => 29,  132 => 28,  129 => 27,  126 => 26,  123 => 25,  120 => 24,  117 => 23,  115 => 22,  112 => 21,  109 => 20,  106 => 19,  103 => 18,  100 => 17,  97 => 16,  94 => 15,  92 => 14,  89 => 13,  87 => 12,  84 => 11,  79 => 10,  65 => 9,  54 => 5,  49 => 3,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/templates/navigation-menu.html.twig", "/var/www/html/web/core/modules/navigation/templates/navigation-menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 1, "macro" => 9, "for" => 10, "set" => 12, "if" => 14, "include" => 32];
        static $filters = ["escape" => 3, "clean_unique_id" => 28, "default" => 33, "render" => 33, "filter" => 40, "t" => 46, "lower" => 132, "first" => 132];
        static $functions = ["constant" => 16, "create_attribute" => 23, "link" => 127, "icon" => 143];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'for', 'set', 'if', 'include'],
                ['escape', 'clean_unique_id', 'default', 'render', 'filter', 't', 'lower', 'first'],
                ['constant', 'create_attribute', 'link', 'icon'],
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
