<?php
 
   require_once 'mail.php';
   session_start();
        include "connect.php";
        $polaczenie = mysql_connect("$host","$db_user","$db_password");
mysql_select_db("$db_name");
if(!isset($_SESSION['zalogowany']))
{
        header('Location: menu.php');
        exit();
}
 
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="style.css" type="text/css"/>
        <title>Zaproś znajomych</title>
</head>
 
<body>

<?php
 
        $query="SELECT * FROM uzytkownicy";
        $result=mysql_query($query);  // wyswietlanie uzytkowników w liście wyboru:
        $ilu_userow = mysql_numrows($result);
		$id=0;
                               
                                $i=0;
										echo '<div id = "center"> '; 
										echo '<div id = "content"> '; 
										echo '<b> Użytkownicy:</b><br />';
										echo '<FORM  METHOD="get" action = "" >';
										echo      ' <SELECT NAME="lista[]" MULTIPLE>';
									
                                for($i = 1; $i<=$ilu_userow; $i++)
                                {
									$wiersz = mysql_fetch_assoc($result);
									$_SESSION['Login'] = $wiersz['Login'];
									$_SESSION['Adres_email'] = $wiersz['Adres_email'];
									
                                        echo      '<OPTION VALUE=',$i,'>',$wiersz['Login'], '</OPTION>';
								}
									
														
									echo
									' <input type="hidden" name=""/>',
									'<td><br /><b>Temat:</b></td>',
									 ' <input type="text" name="Temat"/><br /><br />',
									'</tr><tr>';
									echo									'<tr>
									  <b>Treść zaproszenia:</b><br />
									 
									  <textarea name="wiad"></textarea><br /><br />
									</tr><tr>';
										
										echo '</SELECT>';
                            echo    '<INPUT TYPE="SUBMIT" name = "go">',
                               ' </form>',
                                       ' <pre>';
									   mysql_free_result($result);
													if (isset($_GET['go'])) { 
			
														$temat = $_GET['Temat'];
														$wiad = $_GET['wiad'];
														
																
									   $maile = $_GET['lista'];
									  
									   foreach($maile as $id)
									   {
										  
										   $query = "SELECT Adres_email FROM uzytkownicy WHERE idUsers =  '".$id."' ;";
										   $result=mysql_query($query);
										   if (!$result) { 
											echo "Could not successfully run query ($query) from DB: " . mysql_error(); 
												exit; 
													}
												else {
										   
														
														while ($row = mysql_fetch_row($result)) {
														
															
																$adres = $row[0];
															smtp_mail($adres,$temat,$wiad);
															
												}}
									   }	
									  
											}
																					
echo '</pre>';
echo "Aby zaznaczyć kilku użytkowników przytrzymaj CTRL";
echo '<div id = "footer">';
echo  '<a href="menu.php">';
 echo "Wróć do strony głównej </a>";
			  
			  echo '</div>';
			  echo '</div>';
			  
            


   ?>

 


</body>
</html>