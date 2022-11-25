
/**
 * Fonction appelée quand on clique sur le bouton ou quand on clique sur la carte
 * 
 * @param latlon | null
 */
function ajouterEtape(latlon){
	var url = $('#ajouteEtape').attr('href');

	if( $("#modal_etape") ){
		$("#modal_etape").remove();
	}
	$.get(url, function(data) {
		$('<div class="modal" id="modal_etape">' + data + '</div>').modal('show');
	}).success(function() { 
		$("#modal_etape").show();
		if(latlon){
			$("#modal_etape").find("#etpnulatlon").val(latlon.lat() + ', ' + latlon.lng());
		}
		$("#modal_etape").find('input:text:visible:first').focus();
	})
}


function deplacerEtape(marker){
	var etpidetp = marker.id;
	var newLatLon = marker.getPosition();
	document.location.href = base_url() + "index.php/etape/editetape/setLatLon?etpidetp="+etpidetp+"&lat="+newLatLon.lat()+"&lon="+newLatLon.lng()
}

$('#ajouteEtape').click(function(e) {
	e.preventDefault();
	ajouterEtape();
});

function createItineraireDepuisEtape(itiidvoy, etpidetp){
	var url = base_url()+"index.php/itineraire/createitineraire/depuisEtape?itiidvoy="+itiidvoy+"&etpidetp="+etpidetp;
	if( $("#modal_itineraire") ){
		$("#modal_itineraire").remove();
	}
	$.get(url, function(data) {
		$('<div class="modal" id="modal_itineraire">' + data + '</div>').modal('show');
	}).success(function() { $('input:text:visible:first').focus();
		$("#modal_itineraire").show();
	})
}


/* GOOGLE MAP */
var apiKey = 'YOUR_API_KEY';
var map;

function initialize() {
	var depart = null;;
	var arrivee = null;
	for (var key in points){
		if(depart == null){
			depart = key;
		}
		arrivee = key;
	}
	/*
	if(depart == null){
		$('#map-container').hide();
		return;
	}*/
	
	
	var directionsDisplay = new google.maps.DirectionsRenderer();
	var directionsService = new google.maps.DirectionsService();
	var mapOptions = {
		zoom : 9,
		center : {
			lat : (depart==null)?(45.74644367422241):(points[depart].lat),
			lng : (depart==null)?(4.89715576171875):(points[depart].lon)
		},
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);
	directionsDisplay.setMap(map);
	
	var waypoints = [];
	var i=0;
	for(var etape in points){
		//console.log(etape);
		var marker = new google.maps.Marker({
			map: map,
			position: {
				lat : points[etape].lat,
				lng : points[etape].lon
			},
			title: points[etape].titre,
			draggable: true,
			id: points[etape].id,
			infoWindow: new google.maps.InfoWindow({
				content: "<b>"+points[etape].titre+"</b><br/>Etape #"+points[etape].ordre+"<br/>"+
				"<i>"+points[etape].lat+" , "+points[etape].lon+"</i><br/>"+
				"<a href='"+base_url()+"index.php/etape/listetapes/delete/"+points[etape].id+"'>Supprimer</a>"
			})
		});
		// ajoute le drag event sur chaque marker
		google.maps.event.addListener(marker, 'dragend', function() {
			deplacerEtape(this);
		});

		google.maps.event.addListener(marker, 'click', function() {
			console.log(this.infoWindow)
			this.infoWindow.open(map, this);
		});
		
		if(i>1){
			obj = {
				location:new google.maps.LatLng(points[etape].lat, points[etape].lon),
				stopover:false
				};
			waypoints.push( obj );
		}
		i++;
	}
	
	
	if(depart != null){
		var request = {
				origin : new google.maps.LatLng(points[depart].lat, points[depart].lon),
				destination : new google.maps.LatLng(points[arrivee].lat, points[arrivee].lon),
				travelMode : google.maps.TravelMode.DRIVING,
				waypoints: waypoints
			};
		directionsService.route(request, function(result, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(result);
				var distance = result.routes[0].legs[0].distance.text;
				var duration = result.routes[0].legs[0].duration.text;
				$("#distance").val(distance)
				$("#duration").val(duration);
				
				if(isAuteur){
					// envoyer les données calculées pour sauvegarde en BDD
					var data = {itiiditi: itiiditi,
							itinudst: distance,
							itilbdur: duration
						};
					var url = base_url() + "index.php/itineraire/updateitinerairejson/update";
					$.get(url, data);	
				}
			}
		});
	}
	
	
	// ajoute le click event sur la carte
	google.maps.event.addListener(map, 'click', function(e) {
		// ajouter une étape
		ajouterEtape(e.latLng);
	});
	
	
}

$(window).load(initialize);
