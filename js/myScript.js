$(document).ready(function(){

    $('.search-icon').click(function (e) { 
        e.preventDefault();
        $('input').css("opacity" , "1");
    });
})
$(document).ready(function(){
			
		  	 $("#button_down").click(function(){
				 var nhan= document.getElementById('text_number').value;
				var so = parseInt(nhan);
				if(so==0){
					so=1;
				}
    			document.getElementById('text_number').value = so-1;
  			});
  			$("#button_increate").click(function(){
				var nhan= document.getElementById('text_number').value;
				var so = parseInt(nhan);
    			document.getElementById('text_number').value = so+1});
		 });

