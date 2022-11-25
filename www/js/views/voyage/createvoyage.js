/* Javascript for createvoyage_view.php */



 
$('#voyidusr_text').typeahead({
	source: function (query, process) {
		return $.get(base_url()+'index.php/user/listusersjson/findLike_usrlbnom/'+query,
		{ /*query: no more parameters*/ }, function (dataIN_str) {
			data = new Array();
			var dataIN = JSON.parse(dataIN_str);
			for (i in dataIN) {
				var group;
				group = {
					id: dataIN[i].usridusr,
					name: dataIN[i].usrlbnom,
					toString: function () {
						return JSON.stringify(this);
					},
					toLowerCase: function () {
						return this.name.toLowerCase();
					},
					indexOf: function (string) {
						return String.prototype.indexOf.apply(this.name, arguments);
					},
					replace: function (string) {
						var value = '';
						value +=  this.name;
						if(typeof(this.level) != 'undefined') {
							value += ' <span class="pull-right muted">';
							value += this.level;
							value += '</span>';
						}
						return String.prototype.replace.apply('<div>' + value + '</div>', arguments);
					}
				};

				data.push( group );
			}
			return process(data);
		});
	},
	updater: function (item) {
		var item = JSON.parse(item);
		$('#voyidusr').val(item.id);
		return item.name;
	}

});








//$("#voyidvoy").get(0).setCustomValidity('Champ requis');
//$("#voylbnom").get(0).setCustomValidity('Champ requis');
//$("#voyidusr_text").get(0).setCustomValidity('Champ requis');
