$("#pincode_area_id").autocomplete({source:base_url+'Customjs/'+'getareapincodelist'})
$("#area_id").autocomplete({source:function(request,response){$.getJSON(base_url+'Customjs/'+'getarealist',{term:request.term,city_id:$(my_city).val()},response);},minLength:1})
$(function(){setTimeout(function(){$("#successMessage").hide('blind',{},1000)},3000);});$(function(){setTimeout(function(){$("#successMessages").hide('blind',{},1000)},3000);});$('#my_country').change(function(){var country_id=$('#my_country').val();$('#my_state').empty();$('#my_district').empty();$('#my_subdistrict').empty();$('#my_city').empty();$("#state_Id").val("");$("#district_id").val("");$("#subdistrict_id").val("");$("#city_id").val("");$("#area_id").val("");var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_state').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_district').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_subdistrict').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_city').append(optn);if(country_id!=""){var post_url=base_url+'Customjs/'+'getstatelist/'+country_id;$.ajax({type:"POST",url:post_url,success:function(fetched_states)
{$.each(fetched_states,function(id,fetched_item)
{var opt=$('<option />');opt.val(id);opt.text(fetched_item);$('#my_state').append(opt);});}});}});$('#my_state').change(function(){var state_id=$('#my_state').val();$('#my_district').empty();$('#my_subdistrict').empty();$('#my_city').empty();$("#district_id").val("");$("#subdistrict_id").val("");$("#city_id").val("");$("#area_id").val("");var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_district').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_subdistrict').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_city').append(optn);if(state_id!=""){var post_url=base_url+'Customjs/'+'getdistrictlist/'+state_id;try{$.ajax({type:"POST",url:post_url,error:function(XMLHttpRequest,textStatus,errorThrown){},success:function(fetched_states)
{$.each(fetched_states,function(id,fetched_item)
{var opt=$('<option />');opt.val(id);opt.text(fetched_item);$('#my_district').append(opt);});}});}catch(err){}}});$('#my_district').change(function(){var district_id=$('#my_district').val();$('#my_subdistrict').empty();$('#my_city').empty();$("#subdistrict_id").val("");$("#city_id").val("");$("#area_id").val("");var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_subdistrict').append(optn);var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_city').append(optn);if(district_id!=""){var post_url=base_url+'Customjs/'+'getsubdistrictlist/'+district_id;$.ajax({type:"POST",url:post_url,success:function(fetched_states)
{$.each(fetched_states,function(id,fetched_item)
{var opt=$('<option />');opt.val(id);opt.text(fetched_item);$('#my_subdistrict').append(opt);});}});}});$('#my_subdistrict').change(function(){var subdistrict_id=$('#my_subdistrict').val();$('#my_city').empty();$("#city_id").val("");$("#area_id").val("");var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_city').append(optn);if(subdistrict_id!=""){var post_url=base_url+'Customjs/'+'getcitylist/'+subdistrict_id;$.ajax({type:"POST",url:post_url,success:function(fetched_states)
{$.each(fetched_states,function(id,fetched_item)
{var opt=$('<option />');opt.val(id);opt.text(fetched_item);$('#my_city').append(opt);});}});}});$('#my_city').change(function(){var city_id=$('#my_city').val();$('#my_area').empty();$("#city_id").val("");$("#area_id").val("");var optn=$('<option />');optn.val("");optn.text("---select---");$('#my_area').append(optn);if(city_id!=""){var post_url=base_url+'Customjs/'+'getarealist/'+city_id;$.ajax({type:"POST",url:post_url,success:function(fetched_states)
{$.each(fetched_states,function(id,fetched_item)
{var opt=$('<option />');opt.val(id);opt.text(fetched_item);$('#my_area').append(opt);});}});}});$('#my_city').change(function(){$("#area_id").val("");});$(document).ready(function(){$('#my_country').select2();$('#my_state').select2();$('#my_district').select2();$('#my_subdistrict').select2();$('#my_city').select2();});