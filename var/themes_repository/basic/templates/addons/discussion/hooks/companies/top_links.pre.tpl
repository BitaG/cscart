{if $company_data.discussion && $company_data.discussion.type != "D"}
    <span id="average_rating_{$object_type}_{$object_id}">
        {assign var="rating" value="rating_`$obj_id`"}{$smarty.capture.$rating nofilter}
        {if $company_data.discussion.search.total_items}
            <a class="cm-external-click" data-ca-scroll="content_discussion" data-ca-external-click-id="discussion">{$company_data.discussion.search.total_items} {__("reviews", [$company_data.discussion.search.total_items])}</a>
        {/if}
        {if !$company_data.discussion.disable_adding}
            <a class="cm-external-click cm-dialog-opener cm-dialog-auto-size" data-ca-external-click-id="discussion" data-ca-target-id="new_post_dialog_{$obj_id}">{__("write_review")}</a>
        {/if}
    <!--average_rating_{$object_type}_{$object_id}--></span>
{/if}
