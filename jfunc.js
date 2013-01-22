$(function() 
{

	var x;
	var y;
  
  	//On rend l'image déplaçable à l'aide de JQUERY UI
  	$('.image').draggable({

  	drag: function(event, ui) 
  	{
		// Show the current dragged position of image
        var currentPos = $(this).position();
        x = currentPos.left;
        y = currentPos.top;
    }
  });

//Dès que l'on clique sur le bouton submit, on passe les valeurs de x et y en GET
$('#button').click(function()
{
	window.location = "index.php?x="+x+"&y="+y;     		 			      
});

//On charge l'image sur la page
$('.img').show();

});
