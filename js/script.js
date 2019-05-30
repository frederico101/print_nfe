$( document ).ready(function() {
    
    $('#table').hide();
    console.log( "ready!" );
     
    var produto = $('#prod').val();
    $('#sub').click(function(){
        
    

        $.ajax({
        method: "POST",
        url: "../examples/getXml.php",   //testaDanfe.php",
        data: { produto }
        })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
           
        });

      
      
     console.log("ajax reading"); 

     }); //end of submit button
    
});// end of main function