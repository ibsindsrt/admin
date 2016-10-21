


$(document).ready(function() {

	
	$('#MService_ID').select2();
	$("#SService_ID").select2();
	$("#SServiceID").select2();
	$("#PType").select2();
	$("#RenewalMap").select2();
	
	
	});

$(document).ready(function() {
	if(typeof PackageRecieved != 'undefined'){
	$.each(PackageRecieved, function(index, value) {
	$.each(value,function(varid, varval){
	var temp = {
      id: varid,
    }

	$("#RenewalMap").select2("trigger", "select", {
    data: temp
	});

	});
    });

	if($("#PType").val() != "2" && $("#PType").val() != "3" && $("#PType").val() != "4") 
	$("#renwalpackage").addClass("hidden");
	else
	$("#renwalpackage").removeClass("hidden");

	} 
	});
 
 
 
 
	
$("#PName").autocomplete({
    source: base_url +'Customjs/'+ 'getpackagenamelist'
	});
			

 $('#MService_ID').change(function(){
	var MService_ID = $('#MService_ID').val();
	$('#SService_ID').empty();
	$('#RenewalMap').empty();
	$("#SService_ID").val("");
  
  		 var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#SService_ID').append(optn);

	
	
	 if (MService_ID != ""){
        var post_url =  base_url +'Customjs/'+ 'getServicelist/' + MService_ID;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#SService_ID').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX
    }
	  
	}); 

	$("#PType").change(function() {
	if($("#PType").val() != "2" && $("#PType").val() != "4" && $("#PType").val() != "3") 
	$("#renwalpackage").addClass("hidden");
	else
	$("#renwalpackage").removeClass("hidden");
	var PType = $('#PType').val();
	var Sid = $('#SService_ID').val();
	
	$("#RenewalMap").empty();
	$("#RenewalMap").val("");
  
  		 var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#RenewalMap').append(optn);

	
	var post_url ="";
	 if($("#PType").val() == "2" || $("#PType").val() == "4"){
        post_url = base_url +'Customjs/'+ 'getpackagelist/' + PType +"/" +Sid;
			 $("#RenewalMap").select2({
				 maximumSelectionLength:10
			});
	 }
	 else{
		  post_url = base_url +'Customjs/'+ 'getsmpboxpackage';
	 $("#RenewalMap").select2({
				 maximumSelectionLength:1
			});
			}
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#RenewalMap').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX
		 
    });


	$("#SService_ID").change(function() {
	var PType = $('#PType').val();
	var Sid = $('#SService_ID').val();

	$("#RenewalMap").empty();
	$("#RenewalMap").val("");
  
  		 var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#RenewalMap').append(optn);

	
	
	 if (SService_ID != ""){
               var post_url = base_url +'Customjs/'+ 'getpackagelist/' + PType +"/" +Sid;

        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#RenewalMap').append(opt);
                });
			
            } //end success
         }); //end AJAX
    }

	});


	$('#Cost_Per').change(function(){
	var test = $('#Credits').val()*$('#Cost_Per').val();

	$('#Total_cost').val("Rs "+test);

	}); 

	$('#Credits').change(function(){
	var test = $('#Credits').val()*$('#Cost_Per').val();
	$('#Total_cost').val("Rs "+test);
	});


	
