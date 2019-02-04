<?php

/* __string_template__a53eb038ffcfb95e138f8e33e838a9d4fa24030536bacdaa0bb7f0e54c79cd24 */
class __TwigTemplate_c07d385ee6119726682056d68a38d56daab1636dc38203684ff9b158a91caa8e extends Twig_Template
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
        echo "<h2 style=\"margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #e8e8e8; margin-bottom: 20px;\">";
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "bill_to");
        echo "</h2>
        <p style=\"margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;\">
            <strong>";
        // line 3
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_firstname", array());
        echo " ";
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_lastname", array());
        echo "</strong>
        </p>
        <p style=\"margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;\">
            ";
        // line 6
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_address", array());
        echo " <br>";
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_address_2", array());
        echo "
        </p>
        <p style=\"margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;\">
            ";
        // line 9
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_city", array());
        echo ", ";
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_state_descr", array());
        echo " ";
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_zipcode", array());
        echo "
        </p>
        <p style=\"margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;\">
            ";
        // line 12
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_country_descr", array());
        echo "
        </p>
        <p style=\"margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;\">
            <bdi>";
        // line 15
        echo $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "b_phone", array());
        echo "</bdi>
        </p>
";
    }

    public function getTemplateName()
    {
        return "__string_template__a53eb038ffcfb95e138f8e33e838a9d4fa24030536bacdaa0bb7f0e54c79cd24";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 15,  51 => 12,  41 => 9,  33 => 6,  25 => 3,  19 => 1,);
    }
}
/* <h2 style="margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #e8e8e8; margin-bottom: 20px;">{{__("bill_to")}}</h2>*/
/*         <p style="margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">*/
/*             <strong>{{u.b_firstname}} {{u.b_lastname}}</strong>*/
/*         </p>*/
/*         <p style="margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">*/
/*             {{u.b_address}} <br>{{u.b_address_2}}*/
/*         </p>*/
/*         <p style="margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">*/
/*             {{u.b_city}}, {{u.b_state_descr}} {{u.b_zipcode}}*/
/*         </p>*/
/*         <p style="margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">*/
/*             {{u.b_country_descr}}*/
/*         </p>*/
/*         <p style="margin: 0px; padding-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">*/
/*             <bdi>{{u.b_phone}}</bdi>*/
/*         </p>*/
/* */
