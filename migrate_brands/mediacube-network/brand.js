console.log('7');


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
        dots: true,
        arrows: false,
        speed: 1000,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 700,
        cssEase: 'cubic-bezier(0,-0.01,.19,.9)',
        customPaging: function(slider, i) {
          return '<div class="button_circle"></div>';
        }
      });
    });




var keys = {37: 1, 38: 1, 39: 1, 40: 1};
var slide_count;
var first_arrival = true;
var dir;

function slides_down () {

    slide_count = $('.users').slick('slickCurrentSlide');
    console.log(slide_count);

    if(slide_count < 2)
    {
        if(slide_count == 0 )
        {
            setTimeout(function() {
                $('.users').slick('slickNext');
            }, 2000);

        }

        else {

             $('.users').slick('slickNext');
        }
    }

    else
    {
        $('.users').on('afterChange', function(event, slick, currentSlide, nextSlide){
        restart_slides();
        }); 
    }
}

function slides_up () {

    slide_count = $('.users').slick('slickCurrentSlide');
    console.log(slide_count);

    if(slide_count > 0)
    {
        if(slide_count == 2 )
        {
            setTimeout(function() {
                $('.users').slick('slickPrev');
            }, 2000);

        }

        else {

             $('.users').slick('slickPrev');
        }
    }

    else
    {
        $('.users').on('afterChange', function(event, slick, currentSlide, nextSlide){
        restart_slides();
        }); 
    }
}


function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false; 
  console.log('direction is ' + dir);

  if (dir == 'down')
  {
    slides_down();  
  }
  else
  {
    slides_up();
  }
  
          
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {


  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
  document.onkeydown  = preventDefaultForScrollKeys;


}

function enableScroll() {
        
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}


function restart_slides() {

    enableScroll();
}


// var slide_scroll = new Waypoint.Inview({
//   element: $(".interest"),
//   enter: function(direction) {
    
//     dir = direction;
//     disableScroll();
    
//   }

// });
