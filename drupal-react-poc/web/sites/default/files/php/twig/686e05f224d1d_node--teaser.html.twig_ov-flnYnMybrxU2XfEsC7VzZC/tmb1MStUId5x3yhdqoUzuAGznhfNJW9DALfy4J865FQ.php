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

/* core/themes/olivero/templates/content/node--teaser.html.twig */
class __TwigTemplate_6730fcd8ed487cc7f8a9714a15115b33 extends Template
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
        // line 62
        yield "
";
        // line 64
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 66
($context["node"] ?? null), "bundle", [], "any", false, false, true, 66))), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 67
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--promoted") : ("")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 68
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--sticky") : ("")), (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source,         // line 69
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--unpublished") : ("")), (((($tmp =         // line 70
($context["view_mode"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 73
        yield "

";
        // line 75
        yield from $this->load("core/themes/olivero/templates/content/node--teaser.html.twig", 75, "188142955")->unwrap()->yield(CoreExtension::toArray(["attributes" => CoreExtension::getAttribute($this->env, $this->source,         // line 76
($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 76), "author_attributes" =>         // line 77
($context["author_attributes"] ?? null), "author_name" =>         // line 78
($context["author_name"] ?? null), "content" =>         // line 79
($context["content"] ?? null), "date" =>         // line 80
($context["date"] ?? null), "display_submitted" =>         // line 81
($context["display_submitted"] ?? null), "label" =>         // line 82
($context["label"] ?? null), "metadata" =>         // line 83
($context["metadata"] ?? null), "title_attributes" =>         // line 84
($context["title_attributes"] ?? null), "title_prefix" =>         // line 85
($context["title_prefix"] ?? null), "title_suffix" =>         // line 86
($context["title_suffix"] ?? null), "read_more" =>         // line 87
($context["read_more"] ?? null), "url" =>         // line 88
($context["url"] ?? null)]));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "author_attributes", "author_name", "content", "date", "display_submitted", "label", "metadata", "title_attributes", "title_prefix", "title_suffix", "read_more", "url"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/olivero/templates/content/node--teaser.html.twig";
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
        return array (  71 => 88,  70 => 87,  69 => 86,  68 => 85,  67 => 84,  66 => 83,  65 => 82,  64 => 81,  63 => 80,  62 => 79,  61 => 78,  60 => 77,  59 => 76,  58 => 75,  54 => 73,  52 => 70,  51 => 69,  50 => 68,  49 => 67,  48 => 66,  47 => 64,  44 => 62,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/olivero/templates/content/node--teaser.html.twig", "/var/www/html/web/core/themes/olivero/templates/content/node--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 64, "embed" => 75];
        static $filters = ["clean_class" => 66];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'embed'],
                ['clean_class'],
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


/* core/themes/olivero/templates/content/node--teaser.html.twig */
class __TwigTemplate_6730fcd8ed487cc7f8a9714a15115b33___188142955 extends Template
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

        $this->blocks = [
            'prefix' => [$this, 'block_prefix'],
            'meta' => [$this, 'block_meta'],
            'image' => [$this, 'block_image'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 75
        return "olivero:teaser";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("olivero:teaser", 75);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title_prefix", "title_suffix", "display_submitted", "author_attributes", "author_name", "date", "metadata", "content", "label", "page", "title_attributes", "url"]);    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_prefix(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 91
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
    ";
        // line 92
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 94
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 95
        yield "    ";
        if ((($tmp = ($context["display_submitted"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 96
            yield "      <div class=\"node__meta\">
        <span";
            // line 97
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_attributes"] ?? null), "html", null, true);
            yield ">
          ";
            // line 98
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("By"));
            yield " <span class=\"node__author\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_name"] ?? null), "html", null, true);
            yield "</span>, ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["date"] ?? null), "html", null, true);
            yield "
        </span>
        ";
            // line 100
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["metadata"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 103
        yield "  ";
        yield from [];
    }

    // line 104
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 104), "html", null, true);
        yield from [];
    }

    // line 105
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 106
        yield "    ";
        if ((($context["label"] ?? null) &&  !($context["page"] ?? null))) {
            // line 107
            yield "      <h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["node__title", "teaser__title"], "method", false, false, true, 107), "html", null, true);
            yield ">
        <a href=\"";
            // line 108
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
            yield "\" rel=\"bookmark\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "</a>
      </h2>
    ";
        }
        // line 111
        yield "  ";
        yield from [];
    }

    // line 112
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 113
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_image", "links"), "html", null, true);
        yield "
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/olivero/templates/content/node--teaser.html.twig";
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
        return array (  279 => 113,  272 => 112,  267 => 111,  259 => 108,  254 => 107,  251 => 106,  244 => 105,  233 => 104,  228 => 103,  222 => 100,  213 => 98,  209 => 97,  206 => 96,  203 => 95,  196 => 94,  189 => 92,  184 => 91,  177 => 90,  165 => 75,  71 => 88,  70 => 87,  69 => 86,  68 => 85,  67 => 84,  66 => 83,  65 => 82,  64 => 81,  63 => 80,  62 => 79,  61 => 78,  60 => 77,  59 => 76,  58 => 75,  54 => 73,  52 => 70,  51 => 69,  50 => 68,  49 => 67,  48 => 66,  47 => 64,  44 => 62,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/olivero/templates/content/node--teaser.html.twig", "/var/www/html/web/core/themes/olivero/templates/content/node--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["extends" => 75, "if" => 95];
        static $filters = ["escape" => 91, "t" => 98, "without" => 113];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['extends', 'if'],
                ['escape', 't', 'without'],
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
