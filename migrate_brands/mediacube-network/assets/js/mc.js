$(function () {
	/*[404][:]*/
	enquire.register("screen and (max-width: 700px)", {
		match: function() {
			$(window).on('resize.error', function() {
				var	w_height = $(window).outerHeight(),
					h_height = $('.top').outerHeight(),
					f_height = $('.footer').outerHeight();
				$('.main-heading.__type-404').css({
					minHeight: w_height - (h_height + f_height + 10)
				});
			}).trigger('resize.error');
		},
		unmatch: function() {
			$(window).off('resize.error');
			$('.main-heading.__type-404').css({minHeight: ''});
		}
	});
	/*[404][;]*/

	/*[blog][:]*/
	$('.blog-more__link').on('click', function(e) {
		var $this = $(this),
			$more = $('.blog-more'),
			urn = $this.attr('href'),
			$loader = $('.blog-loader');
		$.ajax({
			url: urn,
			type: 'post',
			beforeSend: function() {
				$more.fadeOut('fast', function() {
					$loader.fadeIn('fast');
				});
			},
			success: function(data) {
				$loader.fadeOut('fast', function() {
					$('.articles-list').append(data);
					$more.fadeIn('fast');
				});
			},
			error: function() {
				setTimeout(function() {
					$loader.fadeOut('fast', function() {
						$more.fadeIn('fast');
					});
				}, 600);
			}
		});
		return false;
	});
	/*[blog][;]*/

	/*[filters][:]*/
	if ($('.blog-filters').length) {
		(function () {
			var $frame = $('.blog-filters__frame'),
				index = $('.blog-filters__list-item.__active').index();

			function createSlider() {
				$frame.sly({
					speed: 600,
					smart: true,
					startAt: index,
					scrollBy: false,
					itemNav: 'basic',
					horizontal: true,
					dragHandle: true,
					releaseSwing: true,
					mouseDragging: true,
					touchDragging: true,
					dynamicHandle: true,
					elasticBounds: true,
					activateMiddle: true,
					easing: 'easeOutExpo',
					prevPage: $('.blog-filters-prev'),
					nextPage: $('.blog-filters-next')
				});
			};
			$('.blog-filters-prev, .blog-filters-next').on('click', function(e) {
				$frame.sly('reload');
				return false;
			});

			var resizeTimeout;
			enquire.register("screen and (max-width: 1024px)", {
				match: function() {
					createSlider();

					$(window).on('resize.filters', function () {
						clearTimeout(resizeTimeout);
						resizeTimeout = setTimeout(function() {
							$frame.sly('reload');
						}, 200);
					});
				},
				unmatch: function() {
					$(window).off('resize.filters');
					clearTimeout(resizeTimeout);
					$frame.sly('destroy');
				}
			});
		}());
	};
	/*[filters][;]*/

	/*[birthday][:]*/
	if ($('#birthday').length) {
		$('#birthday').mask('99.99.9999');
	};
	/*[birthday][;]*/

});



$(function () {
    // $(window).on('scroll', function () {
    //     if ($(window).scrollTop() > parseInt($('.top').css('top'))) {
    //         $('.top').addClass('fixed');
    //         navigationHeight();
    //     } else {
    //         $('.top').removeClass('fixed');
    //         navigationHeight();
    //     }
    // });

    $(window).on('resize', function () {
        navigationHeight();
    });

    function navigationHeight() {
        if ($(window).width() < 1024) {
            $('.navigation__list').css({'height': ($(window).height() - parseInt($('.top').css('top')) - $('.top').height() - 20) + 'px'});
        } else {
            $('.navigation__list').css({'height': 'auto'});
        }
    }

    navigationHeight();

    $('.navigation-control').on('click', function () {
        $('body').toggleClass('__open-navigation');
        return false;
    });

    if ($('.anihov').length) {
        $('.anihov').append('<span class="anihov-eff"></span>');

        $('.anihov').hover(function (e) {
            var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;

            var wid = $(this).width();
            var wid = wid * 4;
            var hei = $(this).height();
            var hei = hei * 4;
            $(this).find('span.anihov-eff').css({width: wid, height: hei, top: relY, left: relX})
        }, function (e) {
            var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
            $(this).find('span.anihov-eff').css({width: 0, height: 0, top: relY, left: relX})
        });
    }

    if ($('.cs-select').length) {
        $('.cs-select').each(function () {
            new SelectFx(this);
        })
    }

    if ($('.how-it-works').length) {
        var $howitworks = $('.how-it-works'),
            $howitworksGallery = $('.how-it-works-slides', $howitworks);

        $howitworksGallery.flickity({
            cellAlign: 'left',
            resize: true,
            setGallerySize: false,
            percentPosition: true
        });

        $('.how-it-works__bg-item video', $howitworks).each(function () {
            $(this).get(0).play();
        });
    }

    if ($('.list-services').length) {
        var $list_services = $('.list-services');

        $('.list-services-list__item', $list_services).on('mouseenter', function () {
            var _this = $(this);
            if (Modernizr.mq('(min-width: 1024px)')) {
                if (!_this.hasClass('__active')) {
                    var getId = _this.data('item');
                    $('.__active', $list_services).removeClass('__active');
                    $('[data-item=' + getId + ']', $list_services).addClass('__active');
                }
            }
        });

        $('.list-services-list__item', $list_services).on('click', function () {
            var _this = $(this);
            if (Modernizr.mq('(max-width: 1024px)')) {
                if (!_this.hasClass('__active')) {
                    var getId = _this.data('item');
                    $('.__active', $list_services).removeClass('__active');
                    $('[data-item=' + getId + ']', $list_services).addClass('__active');
                }
            }
            return false;
        });
    }

    if ($('.forms').length) {
        var $forms = $('.forms'),
            $buttons = $forms.find(".btn-blog, .btn-contact, .btn-partners");

        $forms.addClass("forms-required");
        $buttons.addClass("disabled");

        $buttons.on('click', function (event) {
            var errorFields = $forms.find('input:invalid, textarea:invalid');
            if (errorFields.length) {
                event.preventDefault();
                errorFields.each(function () {
                    $(this).parent().addClass('i-p--alert');
                });
            }
        });

        $forms.find("input").on('input', function (event) {
            var errorFields = $forms.find('input:invalid, textarea:invalid');
            if (errorFields.length) {
                event.preventDefault();
                $forms.addClass("forms-required");
                $buttons.addClass("disabled");
            } else {
                $forms.removeClass("forms-required");
                $buttons.removeClass("disabled");
            }
        });

        $('.i-p__field', $forms).each(function () {
            if (this.value.trim() !== '') {
                $(this).parent().addClass('i-p--filled');
            }
        });
        $('.i-p__field', $forms).on('focus', function () {
            $(this).parent().removeClass("i-p--alert").addClass('i-p--filled');
        });
        $('.i-p__field', $forms).on('blur', function () {
            if (this.value.trim() === '') {
                $(this).parent().removeClass("i-p--alert").removeClass('i-p--filled');
            }
        });
    }

    $('input[type="text"]').attr('autocomplete', 'off');
    $('input[type="email"]').attr('autocomplete', 'off');
    $('input[type="tel"]').attr('autocomplete', 'off');



    $('.authors_list').find(".authors_list__item").each(function() {
        $(this).cycle({
            fx: "fade",
            pauseOnHover: true,
            slides: "> .authors_list__item__wrapper",
            timeout: (Math.floor(Math.random() * (9e3 - 5e3 + 1)) + 5e3)
        });
    });

    if ($('[data-toggle="collapse"]').length) {
        $('.collapse').on('shown.bs.collapse', function () {
            var $t = $(this),
                $c = $t.closest('.collapse-item'),
            // headingHeight = $('.collapse-item-heading', $c).outerHeight(),
            // headerHeight = $('.top').outerHeight(),
                collapseTop = $c.offset().top;
            $('html, body').animate({
                scrollTop: collapseTop - 100
            }, 500);
        })
    }
});
