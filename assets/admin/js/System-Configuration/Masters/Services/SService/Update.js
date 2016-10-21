
	
	$("#sservice_id").autocomplete({
		source: base_url +'Customjs/'+ 'getsservicelist'})	
	
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
 
 
$(document).ready(function() {
	
	$("#mservice_id").select2();
	$("#sservice_id").select2();

	});








	