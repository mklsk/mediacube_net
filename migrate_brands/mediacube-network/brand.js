console.log('15');


//prevent red blocks from disapearring after initial animation
function animation_timer() {
    var i;
    var r = document.getElementsByClassName("red_rect");

    for (i = 0; i < r.length; i++) {
            r[i].className += " red_rect_anim";

       }
}

setTimeout(animation_timer, 1000);


//triggers for animation when a cetain div is reached
var typing = new Waypoint.Inview({

    element: $('.search_bar'),
    enter: function(direction){

        $(function(){
          $(".fill_text").typed({
            strings: ["Вторая в мире поисковая система после Google"],
            typeSpeed: 0
                });

        });

        typing.destroy();
    }
});


//scrolling up numbers animation
var anim_nums = new Waypoint.Inview({

    element: $('.content_sect'),
    enter: function(direction){

        $("#sixfour").html('64');
        $("#twoseven").html('27');
        $("#fournine").html('49');

        anim_nums.destroy();
    }
});

var anim_graphs = new Waypoint.Inview({

    element: $(".graph.one .fig"),
    enter: function(direction){

        $(".graph.one .fig").animate({
        height: '334px'
        }, 900);

        $(".graph.two .fig").animate({
        height: '248px'
        }, 900);

        $(".graph.three .fig").animate({
        height: '232px'
        }, 900);

        $(".graph.four .fig").animate({
        height: '152px'
        }, 900);

        $(".graph.five .fig").animate({
        height: '128px'
        }, 900);

        $(".graph.six .fig").animate({
        height: '128px'
        }, 900);

        $(".graph.seven .fig").animate({
        height: '128px'
        }, 900);

        anim_graphs.destroy();
    }
});

//initialise parallax
var s = skrollr.init();

//initialise carousel
$(document).ready(function(){
    $('.users').slick({
        draggable: false,
        dots: false,
        arrows: false,
        speed: 1000,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 700,
        customPaging: function(slider, i) {
          return '<div class="button_circle"></div>';
        }
    });

    $( "#prev_slick" ).css( "visibility", "hidden" );    
    
});


var keys = {37: 1, 38: 1, 39: 1, 40: 1};
var slide_count;
var first_arrival = true;
var dir;


$('#next_slick').click( function() {

    $('.users').slick('slickNext');
});

$('#prev_slick').click( function() {

    $('.users').slick('slickPrev');
});

$('.users').on('afterChange', function(event, slick, currentSlide, nextSlide) {

    var slide = $('.users').slick('slickCurrentSlide');

    console.log( slide );

     if(slide == 0)
    {
        $( "#prev_slick" ).css( "visibility", "hidden" );     
    }
    else 
    {
        $( "#prev_slick" ).css( "visibility", "visible" );        
    }

    if(slide == 2)
    {
        $( "#next_slick" ).css( "visibility", "hidden" );   
    }
    else 
    {
        $( "#next_slick" ).css( "visibility", "visible" );      
    }
        
});