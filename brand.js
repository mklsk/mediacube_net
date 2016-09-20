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


function animation_timer() {
	var i;
	var r = document.getElementsByClassName("red_rect");

    for (i = 0; i < r.length; i++) {
   			r[i].className += " red_rect_anim";

       }
}

setTimeout(animation_timer, 1600);