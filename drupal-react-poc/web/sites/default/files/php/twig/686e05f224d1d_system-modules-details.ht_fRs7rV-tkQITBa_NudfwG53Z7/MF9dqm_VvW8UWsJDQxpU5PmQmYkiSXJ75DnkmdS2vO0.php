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

/* core/modules/system/templates/system-modules-details.html.twig */
class __TwigTemplate_3ee181feba9bb945060ad8333b6d143e extends Template
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
        // line 27
        yield "<table class=\"responsive-enabled\">
  <thead>
    <tr>
      <th class=\"checkbox visually-hidden\">";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Installed"));
        yield "</th>
      <th class=\"name visually-hidden\">";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Name"));
        yield "</th>
      <th class=\"description visually-hidden priority-low\">";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Description"));
        yield "</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["modules"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 37
            yield "      ";
            $context["zebra"] = Twig\Extension\CoreExtension::cycle(["odd", "even"], CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 37));
            // line 38
            yield "      <tr";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, true, 38), "addClass", [($context["zebra"] ?? null)], "method", false, false, true, 38), "html", null, true);
            yield ">
        <td class=\"checkbox\">
          ";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "checkbox", [], "any", false, false, true, 40), "html", null, true);
            yield "
        </td>
        <td class=\"module\">
          <label id=\"";
            // line 43
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, true, 43), "html", null, true);
            yield "\" for=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 43), "html", null, true);
            yield "\" class=\"module-name table-filter-text-source\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, true, 43), "html", null, true);
            yield "</label>
        </td>
        <td class=\"description expand priority-low\">
          <details class=\"js-form-wrapper form-wrapper\" id=\"";
            // line 46
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 46), "html", null, true);
            yield "-description\">
            <summary aria-controls=\"";
            // line 47
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "enable_id", [], "any", false, false, true, 47), "html", null, true);
            yield "-description\" role=\"button\" aria-expanded=\"false\"><span class=\"text module-description\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, true, 47), "html", null, true);
            yield "</span></summary>
            <div class=\"details-wrapper\">
              <div class=\"details-description\">
                <div class=\"requirements\">
                  <div class=\"admin-requirements\">";
            // line 51
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Machine name: <span dir=\"ltr\" class=\"table-filter-text-source\">@machine-name</span>", ["@machine-name" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "machine_name", [], "any", false, false, true, 51)]));
            yield "</div>
                  ";
            // line 52
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "version", [], "any", false, false, true, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 53
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Version: @module-version", ["@module-version" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "version", [], "any", false, false, true, 53)]));
                yield "</div>
                  ";
            }
            // line 55
            yield "                  ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "requires", [], "any", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Requires: @module-list", ["@module-list" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "requires", [], "any", false, false, true, 56)]));
                yield "</div>
                  ";
            }
            // line 58
            yield "                  ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 59
                yield "                    <div class=\"admin-requirements\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Required by: @module-list", ["@module-list" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "required_by", [], "any", false, false, true, 59)]));
                yield "</div>
                  ";
            }
            // line 61
            yield "                </div>
                ";
            // line 62
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "links", [], "any", false, false, true, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 63
                yield "                  <div class=\"links\">
                    ";
                // line 64
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(["help", "permissions", "configure"]);
                foreach ($context['_seq'] as $context["_key"] => $context["link_type"]) {
                    // line 65
                    yield "                      ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "links", [], "any", false, false, true, 65)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[$context["link_type"]] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "links", [], "any", false, false, true, 65), $context["link_type"], [], "array", false, false, true, 65)), "html", null, true);
                    yield "
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['link_type'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                yield "                  </div>
                ";
            }
            // line 69
            yield "              </div>
            </div>
          </details>
        </td>
      </tr>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        yield "  </tbody>
</table>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["modules", "loop"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/system/templates/system-modules-details.html.twig";
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
        return array (  193 => 75,  174 => 69,  170 => 67,  161 => 65,  157 => 64,  154 => 63,  152 => 62,  149 => 61,  143 => 59,  140 => 58,  134 => 56,  131 => 55,  125 => 53,  123 => 52,  119 => 51,  110 => 47,  106 => 46,  96 => 43,  90 => 40,  84 => 38,  81 => 37,  64 => 36,  57 => 32,  53 => 31,  49 => 30,  44 => 27,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/system/templates/system-modules-details.html.twig", "/var/www/html/web/core/modules/system/templates/system-modules-details.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 36, "set" => 37, "if" => 52];
        static $filters = ["t" => 30, "escape" => 38];
        static $functions = ["cycle" => 37];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['t', 'escape'],
                ['cycle'],
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
