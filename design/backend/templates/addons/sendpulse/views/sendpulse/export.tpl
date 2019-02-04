
{capture name="mainbox"}

        {capture name="tabsbox"}
                {assign var="p_id" value=$pattern.pattern_id}
                <div id="content_{$p_id}">
                        {include file="common/subheader.tpl" title=__("general")}
                        <form action="{""|fn_url}" method="post" name="sendpulse_export" class="form-horizontal form-edit">
                                <div class="control-group">
                                        <label class="control-label">{__("sp.address_book")}</label>
                                        <div class="controls">
                                                {if $book_list}
                                                        <select name="sendpulse_book_id" id="sendpulse_book_id">
                                                                {foreach from=$book_list key=book_id item=book_name}
                                                                <option value="{$book_id}" value={{$book_id}}>{$book_name}</option>
                                                                {/foreach}
                                                        </select>
                                                {else}
                                                        <p class="lowercase">{__("no_items")}</p>
                                                {/if}
                                        </div>
                                </div>
                                <div class="control-group">
                                        <label class="control-label">{__("sp.export_name")}</label>
                                        <div class="controls">
                                                <input type="checkbox" id="one_name" name="one_name">
                                        </div>
                                </div>
                                {include file="views/exim/components/selectboxes.tpl" items=$export_fields assigned_ids=$assigned_ids left_name="selected_field" left_id="pattern"}
                        </form>
        {/capture}

        {include file="common/tabsbox.tpl" content=$smarty.capture.tabsbox}
        {capture name="buttons"}
                {dropdown content=$smarty.capture.tools_list}
                <div class="cm-tab-tools pull-right shift-left" id="tools_{$p_id}">
                        {include file="buttons/button.tpl" but_text="Експорт" but_name="dispatch[sendpulse.export]" but_role="submit-link" but_target_form="sendpulse_export" but_meta="cm-tab-tools cm-comet"}
                </div>
        {/capture}

{/capture}

{include file="common/mainbox.tpl" title="SendPulse" buttons=$smarty.capture.buttons content=$smarty.capture.mainbox}


