
	
	
	$("#CName").autocomplete({
    source: base_url +'Customjs/'+ 'gettelecomnamelist'
});


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

				$('#customer_databasetable').dataTable({

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


	






function addcirclelist() {

	if($('#my_state').val() != "" && $('#my_district').val() != "" && $('#my_subdistrict').val() != "" && $('#my_city').val() != "")  
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
        var post_url = base_url +'Customjs/'+ 'getdistrictlist/' + state_id;
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
        var post_url = base_url +'Customjs/'+ 'getsubdistrictlist/' + district_id;
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
        var post_url = base_url +'Customjs/'+ 'getcitylist/' + subdistrict_id;
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

	



	$(document).ready(function() {

 $('#my_state').select2();
 $('#my_district').select2();
 $('#my_subdistrict').select2();
 $('#my_city').select2();

$('#Basic_StateID').select2();

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
 
 











	