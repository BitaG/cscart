<?php

/* __string_template__3c887da17084f44e10cf458e4fed0f1b59cf4ddd4f9fbc08801f5ed9f9079a51 */
class __TwigTemplate_8187a5d8f88f7a1d62beb1a17f4448ca29f8e582a7f7f5492cc94a650283121e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<p style=\"text-align: center; font-family: Helvetica, Arial, sans-serif;\"><strong style=\"font-weight:600;\">";
        echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "amount", array());
        echo "</strong></p>";
    }

    public function getTemplateName()
    {
        return "__string_template__3c887da17084f44e10cf458e4fed0f1b59cf4ddd4f9fbc08801f5ed9f9079a51";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <p style="text-align: center; font-family: Helvetica, Arial, sans-serif;"><strong style="font-weight:600;">{{ p.amount }}</strong></p>*/
