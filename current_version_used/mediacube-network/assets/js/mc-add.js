$(function () {
    $('.content form, .subscribe-blog form').submit(function () {
        var that = this,
            type = $(this).find('input[name=type]').val();

        $.post('/wp-content/themes/mediacube-network/submit-form.php', $(this).serializeArray(), function(){
            $('.modal').modal();
            $(that).find('input, textarea').val('');
            $(that).find('.i-p--filled').removeClass('i-p--filled');
            $(that).addClass("forms-required");
            $(that).find('button').addClass("disabled");
        });

        return false;
    });

    $('.modal-close').on('click', function(){
        $('.modal').modal('hide');
    });

    var loadMore = $('.blog-loader');

    if (loadMore.length) {
        $.ias({
            container: loadMore.data('container'),
            item: loadMore.data('item'),
            pagination: loadMore.data('pagination'),
            next: loadMore.data('next'),
            loader: '<div class="blog-loader animate ias_loader"><div class="blog-loader__tp"></div><div class="blog-loader__bt"></div></div>',
            trigger: '<div class="blog-loader ias_trigger"><div class="blog-loader__tp"></div><div class="blog-loader__bt"></div></div>'
        });
    }
});
