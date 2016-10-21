function cleartable() {
	i=0;
	var PakageID="";
	var remape = new Array();
	while (typeof PakageID != 'undefined') {
	var PakageID = $('#'+i).val();
	if (typeof PakageID != 'undefined')
	//alert("helo");
   remape[i]=PakageID;
   else remape[i]=$('#0').attr('class');

    i++;
}


$("#idmodaltable").empty();
$("#idforcirclemodal").empty();
$("#idforpackageemodal").empty();

	 
               var post_url = base_url +'Customjs/'+ 'ChangeRemap';

        $.ajax({
            type: "POST",
			 data: {remape:remape},
            url: post_url,
            success: function(fetched_states) 
            {
							
            } //end success
         }); //end AJAX

	
	
}

function getpackageMapping(PakageID,event) {

	var statusss = $(event.target).prop('checked');
	var post_url = "";
	if(PakageID != 0)
	post_url = base_url +'Customjs/'+ 'getpackageMapping/' + PakageID + "/"+statusss;
        $.ajax({
		Async: false,
            type: "POST",

            url: post_url,
            success: function(fetched_states) 
            {
		if(fetched_states != null){
			$.each(fetched_states[0],function(id,fetched_item)
                {
					if(statusss == false){
		var data = "<tr><td>" + fetched_item +"<select id="+id+" class="+fetched_states[2]+">"; 
		data = data + "<option value=''>--Selected--</option>";

					$.each(fetched_states[1],function(id2,fetched_item2)
					{

			data = data + "<option value="+id2+">"+ fetched_item2 + "</option>";
					
					});
               if(fetched_item != "")  
			{	
			data = data+ "</td></tr></select>";
			$("#idforpackageemodal").append(data);
			
			}
									$('.modal').modal('show');

				}
				

                });
			}			
            } //end success
         }); //end AJAX


	}
	
	function cleartablewithoutanycall() {
	
	$("#idforpackageemodal").empty();
	
	}


