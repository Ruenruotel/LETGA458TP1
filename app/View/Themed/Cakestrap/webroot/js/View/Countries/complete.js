(function ($) {
    $('#autocomplete').autocomplete({
        source: function (request, response)
        {
            $.ajax(
                    {
                        url: "../../missionaries/complete",
                        data: {
                            term: request.term,
                        },
                        dataType: "json",
                        success: function (data)
                        {
                            response($.map(data, function (item)
                            {
                                return{
                                    label: item.Country.name,
                                    value: item.Country.name
                                };
                            }));
                        }
                    });
        }, minLength: 1
    });
})(jQuery);

