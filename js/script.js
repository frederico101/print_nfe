$( document ).ready(function() {
    
    $('.card').hide();
    


   $('#prod').on('keyup', function(){
       
       
       
          var pedido = $('#prod').val();
          if(pedido){
            $('.card').show();
        
        $.ajax({
            method: "GET",
            url: "./examples/search.php",
            async: true,
            //dataType: 'json',
            data: { pedido }
            })
            .done(function( msg ) {

                obj = JSON.parse(msg);
                 
                $('.card-body').html( "Serie: "+ obj.serie + "<br>" + "Numero: "+obj.pedido );
               
              
            });
        }else{

            $('.card').hide();
        }





   }),$('#reset').on('click', function(){
  
      $('.card').hide();
      $(':input')
      .not(':button, :submit, :reset, :hidden')
      .val('')

})
 
  

   
   
    
});// end of main function