(function(_, $){
    $.expr[':'].contains_case_insensitive = $.expr.createPseudo(function(arg) {
        return function( elem ) {
            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });

    $.expr[':'].not_contains_case_insensitive = $.expr.createPseudo(function(arg) {
        return function( elem ) {
            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) < 0;
        };
    });

    $.ceEvent('on', 'ce.commoninit', function(context) {
        context.find('#sdek_office_search').autocomplete({
            source: function (request, response) {
                var str_search = $('#sdek_office_search').val();
                
                $('.ty-sdek-list-office .ty-sdek-office:contains_case_insensitive("' + str_search + '")')
                    .each(function (i, elm) {
                        $(elm).toggleClass('ty-sdek-office__apply', true);
                    });

                $('.ty-sdek-list-office .ty-sdek-office:not_contains_case_insensitive("' + str_search + '")')
                    .each(function (i, elm) {
                        $(elm).toggleClass('ty-sdek-office__apply', false)
                    });
            }
        });

        $('#sdek_office_search').keyup(function(){
            var str_search = $('#sdek_office_search').val();
            if (!str_search) {
                $('.ty-sdek-list-office .ty-sdek-office')
                    .each(function (i, elm) {
                        $(elm).toggleClass('ty-sdek-office__apply', true);
                    });
            }
        });

        $('#sdek_show_all').on('click', function() {
            getSdekOffices($(this).attr('href'));
        });
    });

    function getSdekOffices(url) {
        $.ceAjax('request', url, {
            method: 'get',
            result_ids: 'sdek_offices',
            append: false,
            caching: false,
            callback: function (data) {
                $('#sdek_office_search').focus();
                $('.ty-sdek-office-search')
                    .toggleClass('ty-sdek-office-search-disabled', false)
                    .toggleClass('ty-sdek-office-search-expanded', true)
            }
        });
    }
})(Tygh, Tygh.$);

