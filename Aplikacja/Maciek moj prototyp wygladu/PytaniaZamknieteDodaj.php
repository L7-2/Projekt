

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>


<!-- Tutaj dynamicznie tworze pola do dodawania pytan -->
  <script>
  var x;
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	 var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_open"); //Add button ID
	 var add_button2      = $(".add_closed"); //Add button ID

	 
	 var i=66;
	 

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			var litera = String.fromCharCode(i);
		i++;
		$(wrapper).append('<p><div>Odp '+ litera +')<input type="text" name="odp_'+ x +'"/><a href="#" class="remove_field">Usun</a></div></p>' ); //add input box
		
        }
		else alert('Mozna dodac maksymalnie 10 odpowiedzi');
    });
	
	
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--; i--;
		e.preventDefault(); $(this).parent('p').remove(); 
    }
	
	
	)
});</script>


<!-- kod html, ktory wyswietlam na stronie -->
<form action="b_Action.php" method="POST">
<div class="input_fields_wrap">
    <button class="add_open">Dodaj wiecej odpowiedzi</button>  <!-- przycisk oprogramowany w js, aby dodac kolejen pole -->
	<input name="submit" type="submit" value="Przeslij">  <!--przycisk do wyslania zapytania -->
	<br></br>
	<p>Treść pytania <input type="text" name="trescZamkniete"/></p>
	
		<strong>Odpowiedzi: </strong><br>Odp A)<input type="text" name="odp_1"/></p>
	
</div>

</form>





