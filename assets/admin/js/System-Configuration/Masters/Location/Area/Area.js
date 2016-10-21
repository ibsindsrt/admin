function pathofdatatables(){return base_url+'Datatables/';}
loadScript(plugin_path+"datatables/js/jquery.dataTables.min.js",function(){loadScript(plugin_path+"datatables/dataTables.bootstrap.js",function(){loadScript(plugin_path+"select2/js/select2.full.min.js",function(){if(jQuery().dataTable){function restoreRow(oTable,nRow){var aData=oTable.fnGetData(nRow);var jqTds=$('>td',nRow);for(var i=0,iLen=jqTds.length;i<iLen;i++){oTable.fnUpdate(aData[i],nRow,i,false);}
oTable.fnDraw();}
function editRow(oTable,nRow){var aData=oTable.fnGetData(nRow);var jqTds=$('>td',nRow);jqTds[0].innerHTML='<input type="text" class="form-control input-small" value="'+aData[0]+'">';jqTds[1].innerHTML='<input type="text" class="form-control input-small" value="'+aData[1]+'">';jqTds[2].innerHTML='<a class="edit" href="">Save</a>';jqTds[3].innerHTML='<a class="cancel" href="">Cancel</a>';}
function saveRow(oTable,nRow){var jqInputs=$('input',nRow);var par=jqInputs[0].value;var val=jqInputs[1].value;var editer="<a class=\"edit\" href=\"\">Edit</a>"+"<input type='hidden' name='Parameter[]' value='"+par+"'/>";var deleter="<a class=\"delete\" href=\"\">Delete</a>"+"<input type='hidden' name='Value[]' value='"+val+"'/>";oTable.fnUpdate(par,nRow,0,false);oTable.fnUpdate(val,nRow,1,false);oTable.fnUpdate(editer,nRow,2,false);oTable.fnUpdate(deleter,nRow,3,false);oTable.fnDraw();}
function cancelEditRow(oTable,nRow){var jqInputs=$('input',nRow);oTable.fnUpdate(jqInputs[0].value,nRow,0,false);oTable.fnUpdate(jqInputs[1].value,nRow,1,false);oTable.fnUpdate('<a class="edit" href="">Edit</a>',nRow,2,false);oTable.fnDraw();}
var table=$('#my_table');var oTable=table.dataTable({"lengthMenu":[[5,15,20,-1],[5,15,20,"All"]],"pageLength":-1,"language":{"lengthMenu":" _MENU_ records"},"columnDefs":[{'orderable':false,'targets':[0]},{"searchable":false,"targets":[0]}],"order":[[0,"asc"]]});$('#area_databasetable').DataTable({"lengthMenu":[[5,15,25,50,-1],[5,15,25,50,"All"]],"pageLength":10,"language":{"lengthMenu":" _MENU_ records"},"columnDefs":[{'orderable':false,'targets':[0]},{"searchable":false,"targets":[0]}],"order":[[0,"asc"]],"serverSide":true,"sAjaxSource":pathofdatatables()+"area","fnRowCallback":function(nRow,aData,iDisplayIndex,iDisplayIndexFull){var test="";test=test+"<a class='fa fa-eyedropper' style='color: #FFFFFF' href='"+base_url+"System-Configuration/Masters/Location/Area/Update/"+aData[0]+"'></a>";$('td:eq(0)',nRow).addClass("text-center");$('td:eq(0)',nRow).css("background-color","#C52F33");$('td:eq(0)',nRow).html(test);}});var tableWrapper=$("#my_table_wrapper");tableWrapper.find(".dataTables_length select").select2({showSearchInput:false});var nEditing=null;var nNew=false;$('#my_table_new').click(function(e){e.preventDefault();if(nNew&&nEditing){if(confirm("Previose row not saved. Do you want to save it ?")){saveRow(oTable,nEditing);$(nEditing).find("td:first").html("Untitled");nEditing=null;nNew=false;}else{oTable.fnDeleteRow(nEditing);nEditing=null;nNew=false;return;}}
var aiNew=oTable.fnAddData(['','','','']);var nRow=oTable.fnGetNodes(aiNew[0]);editRow(oTable,nRow);nEditing=nRow;nNew=true;});table.on('click','.delete',function(e){e.preventDefault();var nRow=$(this).parents('tr')[0];oTable.fnDeleteRow(nRow);});table.on('click','.cancel',function(e){e.preventDefault();if(nNew){oTable.fnDeleteRow(nEditing);nNew=false;}else{restoreRow(oTable,nEditing);nEditing=null;}});table.on('click','.edit',function(e){e.preventDefault();var nRow=$(this).parents('tr')[0];if(nEditing!==null&&nEditing!=nRow){restoreRow(oTable,nEditing);editRow(oTable,nRow);nEditing=nRow;}else if(nEditing==nRow&&this.innerHTML=="Save"){saveRow(oTable,nEditing);nEditing=null;}else{editRow(oTable,nRow);nEditing=nRow;}});}});});});