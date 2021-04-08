(function ($) {
    $(document).ready(function () {
        $(document).on('click', '.js-slots-filter', function (e) {
            e.preventDefault();

            var category = $(this).data('category');

            $.ajax({
                url: wp_ajax.ajax_url,
                data: { action: 'filters', category: category },
                type: 'POST',
                beforeSend: function () {
                    $("#slots-loader").show();
                    $(".slots-list").hide();
                    $(".slots-pagination").hide();
                },

                success: function (result) {
                    $('.slots-list').html(result);
                },

                complete: function (data) {
                    $("#slots-loader").hide();
                    $(".slots-list").show();
                },

                error: function (result) {
                    console.warn(result);
                }
            });
        });
    });

})(jQuery);




