$(document).ready(function(){
	var timeSlider = 5000;
	var timeAnimacao = null;

	init_slider();

	function init_slider() {

		clearInterval(timeAnimacao);
		timeAnimacao = setInterval(timeout_slider, timeSlider);
	}

	function stop_slider() {
		clearInterval(timeAnimacao);
	}

	function timeout_slider() {
		
	}

	$("#controls li").click(function(){
		$("#slider li").stop();
		$("#slider li").clearQueue();

		var index = $(this).index();

		$("#slider li").fadeOut("slow");
		$("#slider li").eq(index).fadeIn("slow");

		return false;
	});

	$("#questions li").click(function(){
		var curHeight = $(this).height();
		$(this).css("height", "auto");
		var autoHeight = $(this).height();

		$(this).css("overflow", "visible");
		$(this).height(curHeight).animate({"height": autoHeight}, 700, "easeOutQuart");


		return false;
	});
});