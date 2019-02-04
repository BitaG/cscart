<?php

/* __string_template__fdb90067f650691dc86f3d073d7b3c0e2ea29ebf4bb5e58b1c952f936fde2824 */
class __TwigTemplate_b4923a943b5b2fdc758bd18c2e957cb1ecf4b990613acb31f4be39933a74485e extends Twig_Template
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
        echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "discount", array());
        echo "</strong></p>";
    }

    public function getTemplateName()
    {
        return "__string_template__fdb90067f650691dc86f3d073d7b3c0e2ea29ebf4bb5e58b1c952f936fde2824";
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
/* <p style="text-align: center; font-family: Helvetica, Arial, sans-serif;"><strong style="font-weight:600;">{{ p.discount }}</strong></p>*/
