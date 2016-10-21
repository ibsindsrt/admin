
	
	$("#MSeriesNo").autocomplete({
    source: base_url +'Customjs/'+ 'getseriesnolist'
	});

	
	$(document).ready(function() {
    $('#MTechnology').select2();
  	$("#CircleID").select2();
	$("#BrandID").select2();
	});











	