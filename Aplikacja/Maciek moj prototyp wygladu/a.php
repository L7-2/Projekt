

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
  <script>
  var x;
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	 var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_open"); //Add button ID
	 var add_button2      = $(".add_closed"); //Add button ID

	
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment

	
		$(wrapper).append('<p><div>Pytanie nr '+ x +'&nbsp<input type="text" name="mytext[]"/><a href="#" class="remove_field">Usun</a></div></p>' ); //add input box
		
        }
		else alert('Mozna dodac maksymalnie 10 pytan');
    });
	
	
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		e.preventDefault(); $(this).parent('p').remove(); 
    }
	
	
	)
});</script>

<div class="input_fields_wrap">
    <button class="add_open">Dodaj wiecej pytan</button>

	<br></br>
	<p>Pytanie nr 1 <input type="text" name="mytext[]"/></p>
</div>

<?php
mysql_connect("localhost","root","");
mysql_select_db("mydb");
 
function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}
 

			mysql_query("INSERT INTO `pytania` (`idpytania`, `tresc`)
				VALUES ('".$x."',".$mytext[]" );
				

?>
