<?php  

$MySQL_HOST = "localhost";
		$MySQL_PORT = "3306";
		$MySQL_USER = "toutpour_user";
		$MySQL_PASSWORD = "AAbbccddee774411223344";
		$MySQL_DATABASE = "toutpour_db";
		$MySQL_ERROR_CONNECT = "Erreur avec la base de données";
		$MySQL_ERROR_DATABASE = "La base de donnée -> <b>".$MySQL_DATABASE."</b> est introuvable.";
	    $MySQL_AUTORIZE = 1;
		
		if($MySQL_AUTORIZE == 1)
			{
				mysql_connect("".$MySQL_HOST.":".$MySQL_PORT."","".$MySQL_USER."","".$MySQL_PASSWORD."") or die("".$MySQL_ERROR_CONNECT."");
				mysql_select_db("".$MySQL_DATABASE."") or die("".$MySQL_ERROR_DATABASE."");
			}
			
			?>