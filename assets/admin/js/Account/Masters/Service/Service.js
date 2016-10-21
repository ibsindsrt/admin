function getDefaultservice(ID,event) {
	var DefaultService = $(event.target).prop('checked');
	var Status = $(event.target).prop('checked');
 
	if(ID != 0)
	var post_url = "";
	var  post_url = base_url +'Customjs/'+ 'getDefaultservice/' + ID + "/"+DefaultService+ "/"+Status;
        $.ajax({
		
            type: "POST",

            url: post_url,
            success: function(fetched_states) 
            {
						
            } 
			
         }); 

	}

 
	function getStatusservice(ID,event) {
	
	var Status = $(event.target).prop('checked');
 
	if(ID != 0)
	var post_url = "";
	var  post_url = base_url +'Customjs/'+ 'getStatusservice/' + ID + "/"+Status;
        $.ajax({
		
            type: "POST",
            url: post_url,
            success: function(fetched_states) 
            {
							
            } 
			
         }); 

	}

