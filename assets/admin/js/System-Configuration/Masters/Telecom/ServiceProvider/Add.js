
	
	
	
	$("#service_BrandName").autocomplete({
    source: base_url +'Customjs/'+ 'getbrandnamelist'
	});

	$("#service_Code").autocomplete({
    source: base_url +'Customjs/'+ 'getcodelist'
	});

	$("#service_ServiceProvider").autocomplete({
    source:base_url +'Customjs/'+ 'getserviceproviderlist'
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
 
 










	