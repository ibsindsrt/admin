
//change time for logout  insted of 1800000
//this file must be included in all the pages to support locked page after a fixed time out.
//this file also needed to close a session when full browser is closed.
$(function() {
    setTimeout(function() {
$.ajax({url: base_url + "login/check_timeout/?url=" + window.location.href, success: function(result){
location.reload();
}});
    }, 30000000);
});	

window.unload  = function (){
$.ajax({url: base_url + "login/logout/", success: function(result){
}});
 }














		
	
