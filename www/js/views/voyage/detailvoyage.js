

$('#ajouteItineraire').click(function(e) {
	e.preventDefault();
	var url = $(this).attr('href');

	if( $("#modal_itineraire") ){
		$("#modal_itineraire").remove();
	}
	$.get(url, function(data) {
		$('<div class="modal" id="modal_itineraire">' + data + '</div>').modal('show');
	}).success(function() { $('input:text:visible:first').focus();
		$("#modal_itineraire").show();
	})

});

$('#partageVoyage').click(function(e) {
	e.preventDefault();
	var url = $(this).attr('href');

	if( $("#modal_partage") ){
		$("#modal_partage").remove();
	}
	$.get(url, function(data) {
		$('<div class="modal" id="modal_partage">' + data + '</div>').modal('show');
	}).success(function() { $('input:text:visible:first').focus();
		$("#modal_partage").show();
	})

});
