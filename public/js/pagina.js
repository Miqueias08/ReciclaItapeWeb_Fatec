 $(document).ready(function(){
  $.ajax({
    type: "GET",
    url: 'admin/pontos',
    success: function(data){
     $('#dados').html(data); 
   }
 });
});
 /*Pagina*/
$(".pagina").click(function(){
	var url = this.id;
	$.ajax({
		type: "GET",
	  	url: url,
	  	success: function(data){
    		$('#dados').html(data); 
  		}	
	});
});