const initAutocomplete = () => {
    $('.js-autocomplete').each(function (_, el) {
        $(el).select2({
            theme: 'bootstrap4',
            allowClear: $(el).data('clear'),
            placeholder: {
                id: '',
                placeholder: ''
            },
            ajax: {
                url: $(el).data('url'),
                data: function (params) {
                    return {
                        id: $(el).val(),
                        term: params.term
                    };
                },
                processResults: function (data) {
                    var results = data.map(function (result) {
                        result.text = result.name;
                        return result;
                    });
                    return {
                        results: results
                    };
                }
            }
        });
    });
};

export default initAutocomplete;
