/** ********************************************** **
	Your Custom Javascript File
	Put here all your custom functions
*************************************************** **/



/** Remove Panel
	Function called by app.js on panel Close (remove)
 ************************************************** **/

	function _closePanel(panel_id) {
		/** 
			EXAMPLE - LOCAL STORAGE PANEL REMOVE|UNREMOVE

			// SET PANEL HIDDEN
			localStorage.setItem(panel_id, 'closed');
			
			// SET PANEL VISIBLE
			localStorage.removeItem(panel_id);
		**/	
	}
	
	function pathofdatatables() {
	return 'http://admin.ibsind.com/Datatables/';
	}
	
	function site_url() {
	return 'http://admin.ibsind.com/';
	}

	function server_path() {
	return 'http://admin.ibsind.com/Customjs/';
	}
	
	
	$("#country_id").autocomplete({
		source: server_path() + 'getcountrylist'})
		
	
		
		
		
    $("#state_Id").autocomplete({
		source: function(request, response) {
    $.getJSON( server_path() + "getstatelist", {term: request.term, country_id : $('#my_country').val() }, 
              response);
  },
    minLength: 1

		})
		
		
		
		
			
    $("#district_id").autocomplete({
		source: function(request, response) {
    $.getJSON(server_path() + "getdistrictlist", { term: request.term ,  state_id : $('#my_state').val()}, 
              response);
  },
    minLength: 1

		})
		
				
    $("#subdistrict_id").autocomplete({
		source: function(request, response) {
    $.getJSON(server_path() + "getsubdistrictlist", { term: request.term ,  district_id : $('#my_district').val()}, 
              response);
  },
    minLength: 1

		})
		
		
					
    $("#city_id").autocomplete({
		source: function(request, response) {
    $.getJSON(server_path() + "getcitylist", { term: request.term ,  subdistrict_id : $('#my_subdistrict').val()}, 
              response);
  },
    minLength: 1

		})
		
		
		
					
    $("#area_id").autocomplete({
		source: function(request, response) {
    $.getJSON(server_path() + "getarealist", { term: request.term ,  city_id : $(my_city).val()}, 
              response);
  },
    minLength: 1

		})
		
		
		
		

$('#my_country').change(function(){
	
	    var country_id = $('#my_country').val();
	
	
	
  $('#my_state').empty();
 $('#my_district').empty();
 $('#my_subdistrict').empty();
 $('#my_city').empty();
  
  
  
  $("#state_Id").val("");
  $("#district_id").val("");
  $("#subdistrict_id").val("");
  $("#city_id").val("");
  $("#area_id").val("");

  		 var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_state').append(optn);

					
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_district').append(optn);
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_subdistrict').append(optn);
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_city').append(optn);
	
	
	
	
	 if (country_id != ""){
        var post_url = server_path() + "getstatelist/" + country_id;
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
                    $('#my_state').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX
    }
	  
}); 









		

$('#my_state').change(function(){
	
	    var state_id = $('#my_state').val();
	
	
	
 $('#my_district').empty();
 $('#my_subdistrict').empty();
 $('#my_city').empty();
  
  
  
  $("#district_id").val("");
  $("#subdistrict_id").val("");
  $("#city_id").val("");
  $("#area_id").val("");

  		
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_district').append(optn);
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_subdistrict').append(optn);
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_city').append(optn);
	
	
	
	
	 if (state_id != ""){
        var post_url = server_path() + "getdistrictlist/" + state_id;
        try {
	$.ajax({
            type: "POST",
            url: post_url,
 		error: function(XMLHttpRequest, textStatus, errorThrown) { 
   			 }   , 
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#my_district').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX 
		}catch(err) {
}
    }
	  
}); 




$('#my_district').change(function(){
	
var district_id = $('#my_district').val();
 $('#my_subdistrict').empty();
 $('#my_city').empty();
  $("#subdistrict_id").val("");
  $("#city_id").val("");
  $("#area_id").val("");

  		
					
	var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_subdistrict').append(optn);
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_city').append(optn);
	
	
	
	
	 if (district_id != ""){
        var post_url = server_path() + "getsubdistrictlist/" + district_id;
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
                    $('#my_subdistrict').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX
    }
	  
}); 







$('#my_subdistrict').change(function(){
	
var subdistrict_id = $('#my_subdistrict').val();
	
	
	
 $('#my_city').empty();
  
  
  
  $("#city_id").val("");
  $("#area_id").val("");

  		
					
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_city').append(optn);
	
	
	
	
	 if (subdistrict_id != ""){
        var post_url = server_path() + "getcitylist/" + subdistrict_id;
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
                    $('#my_city').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX
    }
	  
}); 




$('#my_city').change(function(){
  $("#area_id").val("");	  
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
 
 $(document).ready(function() {
$('#my_country').select2();
 $('#my_state').select2();
 $('#my_district').select2();
 $('#my_subdistrict').select2();
 $('#my_city').select2();
$('#my_service').select2();

$('#Boxlcr').select2();
 });



 $(document).ready(function() {

if(typeof BOXConnectivityrecived != 'undefined'){
    this.datas = [];
    var self = this;

 $.each(BOXConnectivityrecived, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
      text: varval
    }
        self.datas.push(temp);
});
    });


$('#BOXConnectivity').select2({
data: this.datas
});




$.each(BOXConnectivityrecived, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
    }

$("#BOXConnectivity").select2("trigger", "select", {
    data: temp
});

});
    });
} else{
$('#BOXConnectivity').select2();
}
 });





function addtabledetails() {

if($('#Parameter').val() != "" && $('#Value').val() != "")  
	{

var par = $('#Parameter').val();
var val = $('#Value').val();
var editer = "<a class='edit' href=' javascript:;'>Edit </a>" + "<input type='hidden' name='Parameter[]' value='" + $('#Parameter').val() +"'/>";
var deleter ="<a class='delete' href='javascript:;'>Delete </a>" + "<input type='hidden' name='Value[]' value='" + $('#Value').val() +"'/>";


var table = $('#my_table').DataTable();
table.row.add([ par, val,editer,deleter ]).draw();

$('#Parameter').val("") ;
$('#Value').val("");

} 
}














$("#mservice_id").autocomplete({
		source: server_path() + 'getmservicelist'})

$("#sservice_id").autocomplete({
		source: server_path() + 'getsservicelist'})
		
$("#pincode_city_id").autocomplete({
		source: server_path() + 'getcitypincodelist'})

$("#pincode_area_id").autocomplete({
		source: server_path() + 'getareapincodelist'})
  

$("#department_name_id").autocomplete({
		source: server_path() + 'getdepartmentlist'})
		
$("#department_code_id").autocomplete({
		source: server_path() + 'getdepartmentcodelist'})
	
		
$("#designation_name_id").autocomplete({
		source: server_path() + 'getdesignationlist'})
		
$("#designation_code_id").autocomplete({
		source: server_path() + 'getdesignationcodelist'})
	
		


function getparamvalues(event) {
   
var itemclicked = $(event.target).text();

 var post_url = server_path() + "getparamvalues/" + itemclicked;
        $.ajax({
		Async:false,
            type: "POST",
            url: post_url,
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                   


		var data = "<tr><td>" + id +  "</td><td>" + fetched_item + "</td></tr>";
		if(id != "" && fetched_item != "")  
			{
			$("#idmodaltable").append(data);
				}





                });
				
				
		
            } //end success
         }); //end AJAX


}



   function getcirclestatedistricts(districtd,circled) {
var post_url = "";
if(districtd != 0)
 post_url = server_path() + "getcircledistricts/" + districtd;
else
 post_url = server_path() + "getcirclestate/" + circled;
        $.ajax({
		Async:false,
            type: "POST",
            url: post_url,
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
					var data = "<tr><td>" + fetched_states + "</td></tr>";	
             


		var data = "<tr><td>" + fetched_states + "</td></tr>";
		if(fetched_states != "")  
			{
			$("#idforcirclemodal").append(data);
				}
               
				
				
		
            } //end success
         }); //end AJAX



}

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

	console.log(remape);

$("#idmodaltable").empty();
$("#idforcirclemodal").empty();
$("#idforpackageemodal").empty();

	 
               var post_url = server_path() + "ChangeRemap";

        $.ajax({
            type: "POST",
			 data: {remape:remape},
            url: post_url,
            success: function(fetched_states) 
            {
							
            } //end success
         }); //end AJAX

	
	
}
loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
	loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
		loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

			if (jQuery().dataTable) {				

				function restoreRow(oTable, nRow) {
					var aData = oTable.fnGetData(nRow);
					var jqTds = $('>td', nRow);

					for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
						oTable.fnUpdate(aData[i], nRow, i, false);
					}

					oTable.fnDraw();
				}
				function editRow(oTable, nRow) {
					var aData = oTable.fnGetData(nRow);
					var jqTds = $('>td', nRow);
					jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
					jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
					
					jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
					jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
				}
				
				function saveRow(oTable, nRow) {
					var jqInputs = $('input', nRow);
					var par = jqInputs[0].value;
					var val = jqInputs[1].value;
					var editer = "<a class=\"edit\" href=\"\">Edit</a>" + "<input type='hidden' name='Parameter[]' value='" + par +"'/>";
					var deleter= "<a class=\"delete\" href=\"\">Delete</a>"+ "<input type='hidden' name='Value[]' value='" + val +"'/>";
					oTable.fnUpdate(par, nRow, 0, false);
					oTable.fnUpdate(val, nRow, 1, false);
					oTable.fnUpdate(editer, nRow, 2, false);
					oTable.fnUpdate(deleter, nRow, 3, false);
					oTable.fnDraw();
				}

				function cancelEditRow(oTable, nRow) {
					var jqInputs = $('input', nRow);
					oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
					oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
					oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
					oTable.fnDraw();
				}

				var table = $('#my_table');

				var oTable = table.dataTable({

					"lengthMenu": [
						[5, 15, 20, -1],
						[5, 15, 20, "All"] // change per page values here
					],
					// set the initial value
					"pageLength": -1,

					"language": {
						"lengthMenu": " _MENU_ records"
					},
					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					] // set first column as a default sort by asc
				});
    $('#sample_2').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 	
    });
    $('#country_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "country",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/Country/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });
$('#state_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "state",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/State/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });



$('#district_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "district",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/District/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });


$('#subdistrict_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "subdistrict",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/SubDistrict/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });



$('#city_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "city",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/City/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });

$('#area_databasetable').DataTable({
	"lengthMenu": [
						[5, 15, 25,50,-1],
						[5, 15, 25,50,"All"] // change per page values here
					],

					// set the initial value
					"pageLength": 10,

					"language": {
						"lengthMenu": " _MENU_ records"
					},

					"columnDefs": [{ // set default column settings
						'orderable': false,
						'targets': [0]
					}, {
						"searchable": false,
						"targets": [0]
					}],
					"order": [
						[0, "asc"]
					],
 			"serverSide": true,
        		"sAjaxSource": pathofdatatables() + "area",
 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 var test = "";
test = test + "<a class='fa fa-eyedropper' style='color: #FFFFFF' href='" + site_url() + "System-Configuration/Masters/Location/Area/Update/" + aData[0] + "'></a>"; 
     	$('td:eq(0)', nRow).addClass("text-center");   
	$('td:eq(0)', nRow).css("background-color","#C52F33");    
     	$('td:eq(0)', nRow).html( test );       
    }
 	
    });
				var tableWrapper = $("#my_table_wrapper");
				tableWrapper.find(".dataTables_length select").select2({
					showSearchInput: false //hide search box with special css class
				}); // initialize select2 dropdown

				var nEditing = null;
				var nNew = false;

				$('#my_table_new').click(function (e) {
					e.preventDefault();

					if (nNew && nEditing) {
						if (confirm("Previose row not saved. Do you want to save it ?")) {
							saveRow(oTable, nEditing); // save
							$(nEditing).find("td:first").html("Untitled");
							nEditing = null;
							nNew = false;

						} else {
							oTable.fnDeleteRow(nEditing); // cancel
							nEditing = null;
							nNew = false;
							
							return;
						}
					}

					var aiNew = oTable.fnAddData(['', '',  '', '']);
					var nRow = oTable.fnGetNodes(aiNew[0]);
					editRow(oTable, nRow);
					nEditing = nRow;
					nNew = true;
				});

				table.on('click', '.delete', function (e) {
					e.preventDefault();
					var nRow = $(this).parents('tr')[0];
					oTable.fnDeleteRow(nRow);
				});

				table.on('click', '.cancel', function (e) {
					e.preventDefault();

					if (nNew) {
						oTable.fnDeleteRow(nEditing);
						nNew = false;
					} else {
						restoreRow(oTable, nEditing);
						nEditing = null;
					}
				});

				table.on('click', '.edit', function (e) {
					e.preventDefault();

					/* Get the row as a parent of the link that was clicked on */
					var nRow = $(this).parents('tr')[0];

					if (nEditing !== null && nEditing != nRow) {
						/* Currently editing - but not this row - restore the old before continuing to edit mode */
						restoreRow(oTable, nEditing);
						editRow(oTable, nRow);
						nEditing = nRow;
					} else if (nEditing == nRow && this.innerHTML == "Save") {
						/* Editing this row and want to save it */
						saveRow(oTable, nEditing);
						nEditing = null;

					} else {
						/* No edit in progress - let's start one */
						editRow(oTable, nRow);
						nEditing = nRow;
					}
				});

			}
			

		});
	});
});
function changeoperatordetails() {
 var oname = $('#OName').val();
  $("#Address").val("");
  $("#Salesmanager").val("");
  $("#Mobile").val("");
  $("#Email").val("");
  $("#Support").val("");
  $("#OperatorID").val("");	
	 if (oname != ""){
        var post_url = server_path() + "getoperatordetails/" + oname;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_states) 
            {			
                $.each(fetched_states,function(id,fetched_item)
                {
                 $('#' + id).val(fetched_item);
                });		
            } //end success
         }); //end AJAX
    }
}



$("#OName").autocomplete({
		source: server_path() + 'getoperatorlist',
 	minLength: 1,
      change: function(event, ui) {
        if (ui.item) {
				changeoperatordetails();
        } else {

        }
    },
})


$("#ConnectivityName").autocomplete({
source: server_path() + 'getconnectivitylist',
change: function(event, ui) {
        if (ui.item) {
            $("#msgconnectivity").text("Name already exists, Please use another name.");
        } else {
            $("#msgconnectivity").text("");
        }
    },

})










$('#BOXChannel').change(function(){
	
	    var channel = $('#BOXChannel').val();
	
	
if(channel == "Promotion"){
$('.timePromotion').removeClass("hidden");
$('.timePromotion').removeClass("hidden");
$('.timeother').addClass("hidden");
$('.timeother').addClass("hidden");
$('#TimeFrompromotion').val("09 : 00");
$('#TimeTopromotion').val("20 : 55");

}else{
$('.timePromotion').addClass("hidden");
$('.timePromotion').addClass("hidden");
$('.timeother').removeClass("hidden");
$('.timeother').removeClass("hidden");
$('#TimeFrom').val("00 : 00");
$('#TimeTo').val("23 : 55");
}



  $('#BOXConnectivity').empty();
  $('#Boxlcr').empty();
  
 

  		 var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#BOXConnectivity').append(optn);

		var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#Boxlcr').append(optn);

					
	
	 if (channel != ""){
        var post_url = server_path() + "getconnectivityforchannel/" + channel;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_connectivity) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_connectivity,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#BOXConnectivity').append(opt);

                });
				
				
		
            } //end success
         }); //end AJAX

 	var post_url = server_path() + "getlcrforchannel/" + channel;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(fetched_lcr) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_lcr,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#Boxlcr').append(opt);

                });
				
				
		
            } //end success
         }); //end AJAX
    }
	  
}); 



 
loadScript(plugin_path + "timepicki/timepicki.min.js", function(){
	

$('#TimeFrom').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		step_size_minutes:5,
		disable_keyboard_mobile: true,
		start_time: ["00", "00"],
		on_change: checktimesettings
});

$('#TimeTo').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		step_size_minutes:5,
		disable_keyboard_mobile: true,
		start_time: ["23", "55"],
		on_change: checktimesettings
});



$('#TimeFrompromotion').timepicki({
		show_meridian:false,
		min_hour_value:9,
		max_hour_value:20,
		step_size_minutes:5,
		disable_keyboard_mobile: true,
		start_time: ["09", "00"],
		on_change: checktimesettings
});

$('#TimeTopromotion').timepicki({
		show_meridian:false,
		min_hour_value:9,
		max_hour_value:20,
		step_size_minutes:5,
		disable_keyboard_mobile: true,
		start_time: ["20", "55"],
		on_change: checktimesettings
});


});


$('#Refundpolicy').change(function(){
if($('#Refundpolicy').prop('checked')){
$('#RefundpolicyName').removeClass("hidden");
}else{
$('#RefundpolicyName').addClass("hidden");
}
});
	
	
	
$('#ResendPolicy').change(function(){
if($('#ResendPolicy').prop('checked')){
$('#ResendpolicyName').removeClass("hidden");
}else{
$('#ResendpolicyName').addClass("hidden");
}
});

$('#DropSMSPolicy').change(function(){
if($('#DropSMSPolicy').prop('checked')){
$('#DropSMSpolicyName').removeClass("hidden");
}else{
$('#DropSMSpolicyName').addClass("hidden");
}
});

function checktimesettings() {



if($('#TimeFrompromotion').val() == "00 : 00" || $('#TimeTopromotion').val() == "00 : 00" || $('#TimeTo').val() == "00 : 00")
{
$('#TimeFrompromotion').val("09 : 00");
$('#TimeTopromotion').val("20 : 55");
$('#TimeTo').val("23 : 55");
}
if($('#TimeFrompromotion').val() >= $('#TimeTopromotion').val()){
alert("Open Time is more than to Close Time , please enter proper time");
$('#TimeFrompromotion').val("09 : 00");
$('#TimeTopromotion').val("20 : 55");
}
if($('#TimeFrom').val() >= $('#TimeTo').val()){
$('#TimeFrom').val("00 : 00");
$('#TimeTo').val("23 : 55");
alert("Open Time is more than to Close Time , please enter proper time");
}


}









 $(document).ready(function() {

if(typeof Lcrmobileserisrecived != 'undefined'){
    this.datas = [];
    var self = this;

 $.each(Lcrmobileserisrecived, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
      text: varval
    }
        self.datas.push(temp);
});
    });


$('#lcrmobileseris').select2({
data: this.datas
});




$.each(Lcrmobileserisrecived, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
    }

$("#lcrmobileseris").select2("trigger", "select", {
    data: temp
});

});
    });
} else{
$('#lcrmobileseris').select2();
}
 });











function formatselect2(repo) {
    return repo.text ;
    }

$(document).ready(function() {
	$('#blockedstates0').select2({
	disabled: true
	});

$("#lcrmobileseris").select2({
  ajax: {
    url: server_path() + 'getmobileserisforlcr',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 10) < data.total_count
        }
      };
    },
    cache: true
  },
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 3,
  templateResult: formatselect2, // omitted for brevity, see the source of this page
  templateSelection: formatselect2 // omitted for brevity, see the source of this page
});

});


$("#LcrName").autocomplete({
    source: server_path() + "getlcrnamelist",
	change: function(event, ui) {
        if (ui.item) {
            $("#msgconnectivity").text("Name already exists, Please use another name.");
        } else {
            $("#msgconnectivity").text("");
        }
    },
});





function lcronchange(){
var nextid  = parseInt($(this).parent().parent().parent().attr('id')) + 1;
var preid = nextid - 1 ;


this.a = "tesst";
var self = this;

$("#"+preid).find("select").each(function(){
if($(this).attr("id").indexOf("blockedstates") >= 0){
self.a = $(this).select2().val();
$(this).select2('destroy');
}
});


var cloned = $("#"+preid).clone(true,true);
cloned = cloned.attr("id",nextid);

	cloned.find("select").each(function(){

		var newid = $(this).attr("id").replace(/[0-9]+/, "");
		newid = newid + nextid ;

		$(this).attr("id",newid);

		var newname = $(this).attr("name").replace(/[0-9\[\]]+/, "");
		if (newid.indexOf("blockedstates") >= 0)
		{newname = newname + nextid +"[]" ;}
		else
		newname = newname + nextid ;
		$(this).attr("name",newname);
	}); 


cloned.insertAfter($("#"+preid));

$("#"+preid).find("select").each(function(){
if($(this).attr("id").indexOf("blockedstates") >= 0){
$(this).select2('');
$(this).prop("disabled", false);

}else{
$(this).unbind( "change", lcronchange);
}
}); 
$("#"+nextid).find("select").each(function(){

if($(this).attr("id").indexOf("blockedstates") >= 0){
$(this).select2('');
}
}); 

}


$('.dynamicforlcr').change(lcronchange);






 $(document).ready(function() {

if(typeof LCRcirclesrecived != 'undefined'){
  $('#LCRcircles').select2();
$.each(LCRcirclesrecived, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
    }

$("#LCRcircles").select2("trigger", "select", {
    data: temp
});

});
    });
} else{
$('#LCRcircles').select2();
}
 });





 $(document).ready(function() {

if(typeof alloperatorsrecived != 'undefined'){
   

 $.each(alloperatorsrecived, function(index, value) {
 
var test = "OperatorName" +  index; 
var test2 = "blockedstates" +  index; 
$("#"+ test).val(value).trigger("change");


 $.each(allstatesrecived[index], function(item, itemvalue) {

var temp = {
      id: itemvalue,
    }

$("#"+ test2).select2("trigger", "select", {
    data: temp
});



    });




    });
}

 });







/** ********************************************** **
	fenil's work
*************************************************** **/





$("#CName").autocomplete({
    source: server_path() + "gettelecomnamelist"
});



$("#my_type").change(function() {

$("#Basic_StateID").val(null).trigger("change",[ "Custom"]);
$("#my_state_tele").val(null).trigger("change");








    if ("Metro" == $("#my_type").val()) {
        $("#mystatetest").addClass("hidden");
        $("#mydistricttest").removeClass("hidden");
    } else {
        $("#mystatetest").removeClass("hidden");
        $("#mydistricttest").addClass("hidden");
    }
});



$("#Basic_StateID").change(function(e,a) {
$("#my_state_tele").val(null).trigger("change");

if(a != "Custom"){
var temp = {
      id: $("#Basic_StateID").val(),
    }

$("#my_state_tele").select2("trigger", "select", {
    data: temp
});

var state_id = $('#Basic_StateID').val();
	
}	
	
 $('#my_district').empty();

  		
					var optn = $('<option />'); // here we're creating a new select option for each group
                    optn.val("");
                    optn.text("---select---");
                    $('#my_district').append(optn);
					
	
	 if (state_id != ""){
        var post_url = server_path() + "getdistrictlist/" + state_id;
	$.ajax({
            type: "POST",
            url: post_url,
 		error: function(XMLHttpRequest, textStatus, errorThrown) { 
   			 }   , 
            success: function(fetched_states) //we're calling the response json array 'cities'
            {
				
                $.each(fetched_states,function(id,fetched_item)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(fetched_item);
                    $('#my_district').append(opt);
                });
				
				
		
            } //end success
         }); //end AJAX 
		
    }

	  
});


$(document).ready(function() {
	$('#Basic_StateID').select2();
    	$('#my_state_tele').select2();
    	$('#StateName').select2();
  	$("#my_service").select2();
	$('#MService_ID').select2();
	$("#SService_ID").select2();
		$("#RenewalMap").select2();
$("#renwalpackage").addClass("hidden");

});





$(document).ready(function() {
if(typeof StatesRecieved != 'undefined'){
    this.datas = [];
    var self = this;

 $.each(StatesRecieved, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
      text: varval
    }
        self.datas.push(temp);
});
    });


$('#my_state_tele').select2({
data: this.datas
});




$.each(StatesRecieved, function(index, value) {
 $.each(value,function(varid, varval){
var temp = {
      id: varid,
    }

$("#my_state_tele").select2("trigger", "select", {
    data: temp
});

});
    });
if($("#my_type").val() != "Metro") 
$("#mydistricttest").addClass("hidden");
else
$("#mystatetest").addClass("hidden");


} else{
$('#my_state_tele').select2();
}
 });

$(document).ready(function() {
    	$('#StateName').select2();
  	$("#my_service").select2();
});


$("#mservice_id").autocomplete({
    source: server_path() + "getmservicelist"
});

$("#sservice_id").autocomplete({
    source: server_path() + "getsservicelist"
});


$("#service_BrandName").autocomplete({
    source: server_path() + "getbrandnamelist"
});

$("#service_Code").autocomplete({
    source: server_path() + "getcodelist"
});

$("#service_ServiceProvider").autocomplete({
    source: server_path() + "getserviceproviderlist"
});



$("#MSeriesNo").autocomplete({
    source: server_path() + "getseriesnolist"
});



$('#Cost_Per').change(function(){
 var test = $('#Credits').val()*$('#Cost_Per').val();

$('#Total_cost').val("Rs "+test);



}); 

$('#Credits').change(function(){
 var test = $('#Credits').val()*$('#Cost_Per').val();

$('#Total_cost').val("Rs "+test);

});


$("#PName").autocomplete({
    source: server_path() + "getpackagenamelist"
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
        var post_url = server_path() + "getServicelist/" + MService_ID;
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
 if($("#PType").val() != "2" && $("#PType").val() != "4") 
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

	
	
	 if (PType != ""){
        var post_url = server_path() + "getpackagelistbypc/" + PType +"/" +Sid;
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
               var post_url = server_path() + "getpackagelistbypc/" + PType +"/" +Sid;

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

 if($("#PType").val() != "2" && $("#PType").val() != "4") 
$("#renwalpackage").addClass("hidden");
else
$("#renwalpackage").removeClass("hidden");

	
	 
} 
 });
 
 
 function getpackageMapping(PakageID,event) {

 var statusss = $(event.target).prop('checked');
 
 var post_url = "";
 if(PakageID != 0)
 post_url = server_path() + "getpackageMapping/" + PakageID + "/"+statusss;
        $.ajax({
		Async:false,
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
				}
				else
								  $( "#close" ).click();

                });
			}	else
								  $( "#close" ).click();		
            } //end success
         }); //end AJAX


}

function cleartablewithoutanycall() {

$("#idmodaltable").empty();
$("#idforcirclemodal").empty();
$("#idforpackageemodal").empty();
	
}

function addcirclelist() {

if($('#my_state').val() != "")  
	{

var state = $('#my_state option:selected').text();
var district = $('#my_district option:selected').text();
var subdistrict = $('#my_subdistrict option:selected').text();
var city = $('#my_city option:selected').text();

var deleter ="<a class='delete' href='javascript:;'>Delete </a>" + "<input type='hidden' name='my_state[]' value='" + $('#my_state').val() +"'/>" + "<input type='hidden' name='my_district[]' value='" + $('#my_district').val() +"'/>"+ "<input type='hidden' name='my_subdistrict[]' value='" + $('#my_subdistrict').val() +"'/>" + "<input type='hidden' name='my_city[]' value='" + $('#my_city').val() +"'/>";

var table = $('#my_table').DataTable();
table.row.add([ state,district,subdistrict,city,deleter]).draw();

$('#my_state').val("") ;
$('#my_district').val("");
$('#my_subdistrict').val("");
$('#my_city').val("");
} 
}


