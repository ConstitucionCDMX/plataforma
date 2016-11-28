(function($){

	"use strict";

	$(function(){

		if (document.getElementById("ubicacion_kiosko")) {
			var autocomplete = new google.maps.places.Autocomplete($("#ubicacion_kiosko")[0], {});

	        google.maps.event.addListener(autocomplete, 'place_changed', function() {
	       	 	var place = autocomplete.getPlace();

	       	 	$('#latitud_kiosko').val( place.geometry.location.lat() );
	       	 	$('#longitud_kiosko').val( place.geometry.location.lng() );

	       	 	var iframe = '<iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='+place.geometry.location.lat()+','+place.geometry.location.lng()+'&hl=es;z=14&amp;output=embed"></iframe>';
	       	 	$('.iframe-cont').empty().append(iframe);

	        });

		};

		if (document.getElementById("ubicacion_evento")) {
			var autocomplete = new google.maps.places.Autocomplete($("#ubicacion_evento")[0], {});

	        google.maps.event.addListener(autocomplete, 'place_changed', function() {
	       	 	var place = autocomplete.getPlace();

	       	 	$('#latitud_evento').val( place.geometry.location.lat() );
	       	 	$('#longitud_evento').val( place.geometry.location.lng() );

	       	 	var iframe = '<iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='+place.geometry.location.lat()+','+place.geometry.location.lng()+'&hl=es;z=14&amp;output=embed"></iframe>';
	       	 	$('.iframe-cont').empty().append(iframe);

	        });

		};

		$('.datepicker').datepicker({
	        dateFormat : 'yy-mm-dd'
	    });
		window.dateInicio = 0;
	    $('.date-ensayo').datepicker({
	        dateFormat : 'yy-mm-dd',
	        minDate: 0,
	        onSelect: function(dateText, inst) {
		      	window.dateInicio = dateText;
		      	$('.date-ensayo-fin').removeAttr("disabled");
		   }
	    });

	    $('.date-ensayo-fin').datepicker({
	        dateFormat : 'yy-mm-dd',
	        minDate: 0
	    });

	});

})(jQuery);