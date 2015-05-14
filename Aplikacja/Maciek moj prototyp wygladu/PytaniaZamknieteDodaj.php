     <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">

        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />


        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">


        <!-- jQuery Load -->
        <script src="assets/js/jquery-min.js"></script>

		
		<style type="text/css">
			#fixme { 
			margin-left: 40%;
			display:inline-block;
			vertical-align:top;
			position: absolute; 
			left: 0px; 
			top: 0px; 
		}
		#fixmetoo { 
			position: absolute; 
			right: 0px; 
			bottom: 0px; 
		}
		div > div#fixme { position: fixed; }
		div > div#fixmetoo { position: fixed; }
		
		pre.fixit { 
			overflow:auto;
			border-left:1px dashed #000;
			border-right:1px dashed #000;
			padding-left:2px; }

		</style>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>


<!-- Tutaj dynamicznie tworze pola do dodawania pytan -->
  <script>
  var x;
  $(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	 var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_open"); //Add button ID
	 var add_button2      = $(".add_closed"); //Add button ID

	 
	 var i=67;  //kod asci znaku od ktorego zaczynam numerowac odpowiedzi tutaj 65 = A 
	 

    var x = 3; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			var litera = String.fromCharCode(i);
		i++;
		$(wrapper).append('<p><div><input type="text"  class="form-control" placeholder="Odp '+ litera +'" name="odp_1" name="odp_'+ x +'"/><a href="#" class="remove_field">Usun</a></div></p>' ); //add input box
		window.scrollTo(0,document.body.scrollHeight); //scrolluje do dolu strony
        }
		else alert('Mozna dodac maksymalnie ' + max_fields + ' odpowiedzi');
    });
	
	
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--; i--;
		e.preventDefault(); $(this).parent('p').remove(); 
    }
	
	
	)
});</script>


<!-- kod html, ktory wyswietlam na stronie -->
<form action="PytaniaZamknieteDodaj_action.php " method="POST">
<div class="input_fields_wrap">
	<div class="guziki"	id="fixme">
		<button style="fixed" id="sidebar" class="btn btn-success add_open fixed">Dodaj więcej odpowiedzi</button>  <!-- przycisk oprogramowany w js, aby dodac kolejen pole -->
		<input name="submit" type="submit" class="btn btn-primary " value="Przeslij">  <!--przycisk do wyslania zapytania -->
		<br></br>
	</div>
		<br></br>
		<div class="form-group has-feedback">
			<label  class="control-label">Pytanie</label>
			<input type="text" required class="form-control"  placeholder="Treść pytania" name="trescZamkniete" />
			<i class="glyphicon glyphicon-question-sign form-control-feedback"></i>
		</div>
	
		<strong>Odpowiedzi: </strong><br><input type="text"  required class="form-control" placeholder="Odp A" name="odp_1"/></p>
															<input type="text"  required class="form-control" placeholder="Odp B" name="odp_2"/></p>
	
</div>

</form>





