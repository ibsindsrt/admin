
	
	$("#MSeriesNo").autocomplete({
    source: base_url +'Customjs/'+ 'getseriesnolist'
	});

	$(document).ready(function() {
    $('#MTechnology').select2();
  	$("#CircleID").select2();
	$("#BrandID").select2();
	});

	

$(function() {
    setTimeout(function() {
        $("#successMessage").hide('blind', {}, 1000)
    }, 3000);
});		
		
$(function() {
    setTimeout(function() {
        $("#successMessages").hide('blind', {}, 1000)
    }, 3000);
});	
 
 










	