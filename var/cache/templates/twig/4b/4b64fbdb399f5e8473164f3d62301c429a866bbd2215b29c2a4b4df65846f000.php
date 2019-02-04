<?php

/* __string_template__61f1789aa6f34c96ad1cb51deda124d9f4e1bec22ac81ff3da42fd6fa0050921 */
class __TwigTemplate_8f0906b6aa5821ea888756c7ab36ab5745bf01746b3172bc261ec3e92c0731de extends Twig_Template
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
        echo "<table width=\"100%;\" style=\"min-width: 800px; font-family: Helvetica, Arial, sans-serif; border-collapse: separate;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
<tbody>
<tr style=\"vertical-align: top;\">
    <td>
        <table width=\"100%;\" cellspacing=\"0\" border=\"0\" style=\"border-collapse: separate; font-family: Helvetica, Arial, sans-serif;\">
        <tbody>
        <tr>
            <td width=\"66%\" style=\"padding-bottom: 40px; vertical-align: top; font-family: Helvetica, Arial, sans-serif;\"><img src=\"";
        // line 8
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "logos", array()), "mail", array()), "image", array()), "image_path", array());
        echo "\" alt=\"";
        echo $this->getAttribute((isset($context["company_data"]) ? $context["company_data"] : null), "company_name", array());
        echo "\">
            </td>
            <td width=\"34%\" style=\"padding-bottom: 40px; -webkit-print-color-adjust: exact; font-family: Helvetica, Arial, sans-serif;\">
                <p style=\"color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 3px; margin: 0px;\">
                    <span style=\"color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase; line-height: 20px;\">";
        // line 12
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "invoice_id_text", array());
        echo "</span>
                </p>

                <p style=\"color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;\">
                    <span style=\"color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;\">";
        // line 16
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "order_date");
        echo "</span>  ";
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "timestamp", array());
        echo "
                </p>
                <p style=\"color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;\">
                    <span style=\"color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;\">";
        // line 19
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "payment");
        echo "</span>  ";
        echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "payment", array());
        echo "
                </p>
                <p style=\"color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;\">
                    <span style=\"color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;\">";
        // line 22
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "shipping");
        echo "</span>  ";
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "shippings_method", array());
        echo "
                </p>
                ";
        // line 24
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "tracking_number", array())) {
            // line 25
            echo "                <p style=\"color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;\">
                    <span style=\"color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;\">";
            // line 26
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "tracking_number");
            echo "</span>  ";
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "tracking_number", array());
            echo "
                </p>
                ";
        }
        // line 29
        echo "            </td>
        </tr>
        </tbody>
        </table>
    </td>
</tr>
<tr>
    <td colspan=\"2\">
        <table width=\"100%;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\" border-collapse: separate; font-family: Helvetica, Arial, sans-serif;\">
        <tbody>
        <tr>
            <td style=\"vertical-align: top; background-color: #f7f7f7; color: #444444; padding: 20px 10px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif; -webkit-print-color-adjust: exact;\" width=\"30%\">
                <h1 style=\"margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #444444; margin-bottom: 20px;\">";
        // line 41
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "store");
        echo "</h1>
                <p style=\"margin: 0px; padding-bottom: 10px;\"><strong>";
        // line 42
        echo $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "name", array());
        echo "</strong>
                </p>
                ";
        // line 44
        echo $this->env->getExtension('tygh.core')->snippetFunction($this->env, $context, "company_address");
        echo "
            </td>
            <td style=\"vertical-align: top; padding: 20px 30px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif;\" width=\"36%\">
                ";
        // line 47
        echo $this->env->getExtension('tygh.core')->snippetFunction($this->env, $context, "bill_to");
        echo "
            </td>
            <td style=\"vertical-align: top; padding: 20px 0px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif;\" width=\"34%\">
                ";
        // line 50
        echo $this->env->getExtension('tygh.core')->snippetFunction($this->env, $context, "ship_to");
        echo "
            </td>
        </tr>
        </tbody>
        </table>
    </td>
</tr>
<tr>
    <td style=\"font-family: Helvetica, Arial, sans-serif;\">
        ";
        // line 59
        echo $this->env->getExtension('tygh.core')->snippetFunction($this->env, $context, "products_table");
        echo "
    </td>
</tr>
<tr>
    <td style=\"border-top: 3px solid #444444; padding-top: 10px; font-family: Helvetica, Arial, sans-serif;\">
        <table width=\"100%\" style=\"border-collapse: separate; font-family: Helvetica, Arial, sans-serif;\">
        <tbody>
        <tr>
            <td width=\"66%\" style=\"font-size: 14px; font-family: Helvetica, Arial, sans-serif; line-height: 21px; color: #444444; padding-right: 30px; vertical-align:top;\">
                ";
        // line 68
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "notes", array())) {
            // line 69
            echo "                <h2 style=\"margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #e8e8e8; margin-bottom: 10px;\">";
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "customer_notes");
            echo "</h2>
                ";
            // line 70
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "notes", array());
            echo "
                                ";
        }
        // line 72
        echo "            </td>
            <td width=\"34%\" style=\"vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                <table width=\"100%;\" style=\"font-size: 14px; color: #444; font-family: Helvetica, Arial, sans-serif;\">
                <tbody>
                <tr style=\" vertical-align: top;\">
                    <td align=\"left\" style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\">";
        // line 77
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "subtotal");
        echo "
                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 79
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "display_subtotal", array());
        echo "
                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\" style=\"padding-bottom: 20px; text-transform: uppercase; font-family: Helvetica, Arial, sans-serif;\">";
        // line 83
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "tax_name", array());
        echo "
                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 85
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "tax_total", array());
        echo "
                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\" style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\">";
        // line 89
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "shipping");
        echo "
                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 91
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "display_shipping_cost", array());
        echo "
                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 95
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "payment_surcharge", array())) {
            // line 96
            echo "                        <div style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\"> ";
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "payment_surcharge");
            echo " </div> ";
        }
        // line 97
        echo "                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 98
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "payment_surcharge", array())) {
            echo " ";
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "payment_surcharge", array());
            echo " ";
        }
        echo "<br>
                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\">";
        // line 102
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "coupon_code", array())) {
            echo " <div style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\"> ";
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "coupon");
            echo " </div> ";
        }
        // line 103
        echo "                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 104
        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "coupon_code", array())) {
            echo " ";
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "coupon_code", array());
            echo " ";
        }
        // line 105
        echo "                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 108
        if ($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "raw", array()), "discount", array())) {
            echo " <div style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\"> ";
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "including_discount");
            echo " </div> ";
        }
        // line 109
        echo "                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 110
        if ($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "raw", array()), "discount", array())) {
            echo " ";
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "discount", array());
            echo " ";
        }
        // line 111
        echo "                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-family: Helvetica, Arial, sans-serif;\">
                    <td align=\"left\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 114
        if ($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "raw", array()), "subtotal_discount", array())) {
            echo " <div style=\"padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;\"> ";
            echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "order_discount");
            echo " </div> ";
        }
        // line 115
        echo "                    </td>
                    <td align=\"right\" style=\"font-family: Helvetica, Arial, sans-serif;\">";
        // line 116
        if ($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "raw", array()), "subtotal_discount", array())) {
            echo " ";
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "subtotal_discount", array());
            echo " ";
        }
        // line 117
        echo "                    </td>
                </tr>
                <tr style=\" vertical-align: top; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: 600;\">
                    <td align=\"left\" style=\"padding-top: 20px; border-top: 1px solid #e8e8e8; font-size: 22px; font-family: Helvetica, Arial, sans-serif; \">";
        // line 120
        echo $this->env->getExtension('tygh.core')->translateFunction($this->env, $context, "total");
        echo "
                    </td>
                    <td align=\"right\" style=\"padding-top: 20px; border-top: 1px solid #e8e8e8; font-size: 22px; font-family: Helvetica, Arial, sans-serif; \">";
        // line 122
        echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "total", array());
        echo "
                    </td>
                </tr>
                </tbody>
                </table>
            </td>
        </tr>
        </tbody>
        </table>
    </td>
</tr>
</tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "__string_template__61f1789aa6f34c96ad1cb51deda124d9f4e1bec22ac81ff3da42fd6fa0050921";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 122,  275 => 120,  270 => 117,  264 => 116,  261 => 115,  255 => 114,  250 => 111,  244 => 110,  241 => 109,  235 => 108,  230 => 105,  224 => 104,  221 => 103,  215 => 102,  204 => 98,  201 => 97,  196 => 96,  194 => 95,  187 => 91,  182 => 89,  175 => 85,  170 => 83,  163 => 79,  158 => 77,  151 => 72,  146 => 70,  141 => 69,  139 => 68,  127 => 59,  115 => 50,  109 => 47,  103 => 44,  98 => 42,  94 => 41,  80 => 29,  72 => 26,  69 => 25,  67 => 24,  60 => 22,  52 => 19,  44 => 16,  37 => 12,  28 => 8,  19 => 1,);
    }
}
/* <table width="100%;" style="min-width: 800px; font-family: Helvetica, Arial, sans-serif; border-collapse: separate;" cellspacing="0" cellpadding="0" border="0">*/
/* <tbody>*/
/* <tr style="vertical-align: top;">*/
/*     <td>*/
/*         <table width="100%;" cellspacing="0" border="0" style="border-collapse: separate; font-family: Helvetica, Arial, sans-serif;">*/
/*         <tbody>*/
/*         <tr>*/
/*             <td width="66%" style="padding-bottom: 40px; vertical-align: top; font-family: Helvetica, Arial, sans-serif;"><img src="{{c.logos.mail.image.image_path}}" alt="{{ company_data.company_name }}">*/
/*             </td>*/
/*             <td width="34%" style="padding-bottom: 40px; -webkit-print-color-adjust: exact; font-family: Helvetica, Arial, sans-serif;">*/
/*                 <p style="color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 3px; margin: 0px;">*/
/*                     <span style="color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase; line-height: 20px;">{{ o.invoice_id_text }}</span>*/
/*                 </p>*/
/* */
/*                 <p style="color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;">*/
/*                     <span style="color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;">{{__("order_date")}}</span>  {{o.timestamp}}*/
/*                 </p>*/
/*                 <p style="color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;">*/
/*                     <span style="color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;">{{__("payment")}}</span>  {{p.payment}}*/
/*                 </p>*/
/*                 <p style="color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;">*/
/*                     <span style="color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;">{{__("shipping")}}</span>  {{o.shippings_method}}*/
/*                 </p>*/
/*                 {% if o.tracking_number %}*/
/*                 <p style="color: #787878; font-size: 14px; font-family: Helvetica, Arial, sans-serif; padding-bottom: 5px; margin: 0px;">*/
/*                     <span style="color: #000000; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-transform: uppercase;">{{__("tracking_number")}}</span>  {{o.tracking_number}}*/
/*                 </p>*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*         </tbody>*/
/*         </table>*/
/*     </td>*/
/* </tr>*/
/* <tr>*/
/*     <td colspan="2">*/
/*         <table width="100%;" cellspacing="0" cellpadding="0" border="0" style=" border-collapse: separate; font-family: Helvetica, Arial, sans-serif;">*/
/*         <tbody>*/
/*         <tr>*/
/*             <td style="vertical-align: top; background-color: #f7f7f7; color: #444444; padding: 20px 10px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif; -webkit-print-color-adjust: exact;" width="30%">*/
/*                 <h1 style="margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #444444; margin-bottom: 20px;">{{__("store")}}</h1>*/
/*                 <p style="margin: 0px; padding-bottom: 10px;"><strong>{{c.name}}</strong>*/
/*                 </p>*/
/*                 {{ snippet("company_address") }}*/
/*             </td>*/
/*             <td style="vertical-align: top; padding: 20px 30px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif;" width="36%">*/
/*                 {{ snippet("bill_to") }}*/
/*             </td>*/
/*             <td style="vertical-align: top; padding: 20px 0px; color: #444444; font-size: 14px; font-family: Helvetica, Arial, sans-serif;" width="34%">*/
/*                 {{ snippet("ship_to") }}*/
/*             </td>*/
/*         </tr>*/
/*         </tbody>*/
/*         </table>*/
/*     </td>*/
/* </tr>*/
/* <tr>*/
/*     <td style="font-family: Helvetica, Arial, sans-serif;">*/
/*         {{ snippet("products_table") }}*/
/*     </td>*/
/* </tr>*/
/* <tr>*/
/*     <td style="border-top: 3px solid #444444; padding-top: 10px; font-family: Helvetica, Arial, sans-serif;">*/
/*         <table width="100%" style="border-collapse: separate; font-family: Helvetica, Arial, sans-serif;">*/
/*         <tbody>*/
/*         <tr>*/
/*             <td width="66%" style="font-size: 14px; font-family: Helvetica, Arial, sans-serif; line-height: 21px; color: #444444; padding-right: 30px; vertical-align:top;">*/
/*                 {% if o.notes %}*/
/*                 <h2 style="margin: 0px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #444444; text-transform: uppercase; padding-bottom: 20px; border-bottom: 3px solid #e8e8e8; margin-bottom: 10px;">{{ __("customer_notes") }}</h2>*/
/*                 {{ o.notes }}*/
/*                                 {% endif %}*/
/*             </td>*/
/*             <td width="34%" style="vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                 <table width="100%;" style="font-size: 14px; color: #444; font-family: Helvetica, Arial, sans-serif;">*/
/*                 <tbody>*/
/*                 <tr style=" vertical-align: top;">*/
/*                     <td align="left" style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;">{{ __("subtotal") }}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{{o.display_subtotal}}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left" style="padding-bottom: 20px; text-transform: uppercase; font-family: Helvetica, Arial, sans-serif;">{{o.tax_name}}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{{o.tax_total}}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left" style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;">{{ __("shipping") }}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{{ o.display_shipping_cost }}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left" style="font-family: Helvetica, Arial, sans-serif;">{% if o.payment_surcharge %}*/
/*                         <div style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;"> {{__("payment_surcharge")}} </div> {% endif %}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{% if o.payment_surcharge %} {{o.payment_surcharge}} {% endif %}<br>*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left">{% if o.coupon_code %} <div style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;"> {{ __("coupon") }} </div> {% endif %}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{% if o.coupon_code %} {{o.coupon_code}} {% endif %}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left" style="font-family: Helvetica, Arial, sans-serif;">{% if o.raw.discount %} <div style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;"> {{ __("including_discount") }} </div> {% endif %}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{% if o.raw.discount %} {{o.discount}} {% endif %}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-family: Helvetica, Arial, sans-serif;">*/
/*                     <td align="left" style="font-family: Helvetica, Arial, sans-serif;">{% if o.raw.subtotal_discount %} <div style="padding-bottom: 20px; font-family: Helvetica, Arial, sans-serif;"> {{ __("order_discount") }} </div> {% endif %}*/
/*                     </td>*/
/*                     <td align="right" style="font-family: Helvetica, Arial, sans-serif;">{% if o.raw.subtotal_discount %} {{o.subtotal_discount}} {% endif %}*/
/*                     </td>*/
/*                 </tr>*/
/*                 <tr style=" vertical-align: top; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: 600;">*/
/*                     <td align="left" style="padding-top: 20px; border-top: 1px solid #e8e8e8; font-size: 22px; font-family: Helvetica, Arial, sans-serif; ">{{ __("total") }}*/
/*                     </td>*/
/*                     <td align="right" style="padding-top: 20px; border-top: 1px solid #e8e8e8; font-size: 22px; font-family: Helvetica, Arial, sans-serif; ">{{o.total}}*/
/*                     </td>*/
/*                 </tr>*/
/*                 </tbody>*/
/*                 </table>*/
/*             </td>*/
/*         </tr>*/
/*         </tbody>*/
/*         </table>*/
/*     </td>*/
/* </tr>*/
/* </tbody>*/
/* </table>*/
