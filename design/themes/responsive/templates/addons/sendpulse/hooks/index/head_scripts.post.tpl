{$settings.sendpulse|fn_print_r}
{if $settings.sendpulse.sp_push.sp_push_js != NULL}
    {$settings.sendpulse.sp_push.sp_push_js nofilter}
{/if}