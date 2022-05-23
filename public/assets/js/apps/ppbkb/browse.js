$(document).ready(function() {
	var controls = {
		leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
		rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
	}
	$('.datepicker').datepicker({
		language: "id",
		format: "yyyy-mm-dd",
		orientation: "bottom right",
		todayHighlight: true,
		templates: controls
	});
});