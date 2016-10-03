function currentDiv(n) {
    var i;
    var x = document.getElementsByClassName("slide");
    var b = document.getElementsByClassName("button_circle");
   
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }

    x[n-1].style.display = "flex"; 

	for (i = 0; i < x.length; i++) {
        b[i].className = "button_circle"; 
    }    

    b[n-1].className += " active_button";
}

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

var anim_nums = new Waypoint.Inview({

	element: $('.content_sect'),
	enter: function(direction){

		$("#sixfour").html('64');
		$("#twoseven").html('27');
		$("#fournine").html('49');

	  	anim_nums.destroy();
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
        autoplay: true,
  		autoplaySpeed: 1000,
        cssEase: 'cubic-bezier(0,-0.01,.19,.9)',
        customPaging: function(slider, i) {
	      return '<div class="button_circle"></div>';
	    }
      });
    });



