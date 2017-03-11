  <HTML>
<HEAD>

  <script src="script/intro.js"></script>
<TITLE>INICIO</TITLE>



</HEAD>

<BODY>
	<? 
		function getRealIP() {
			if (!empty(getenv("HTTP_CLIENT_IP")))//getenv
			return getenv("HTTP_CLIENT_IP");

			if (!empty(getenv("HTTP_X_FORWARDED_FOR")))
			return getenv("HTTP_X_FORWARDED_FOR");

			return getenv("REMOTE_ADDR");
		}
		date_default_timezone_set('America/Montevideo');
		
		$ipadress = getRealIP();
		$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipadress));
		$latitud = $meta['geoplugin_latitude'];
		$longitud = $meta['geoplugin_longitude'];
		$ciudad = $meta['geoplugin_city'];
		$pais = $meta['geoplugin_countryName'];
		$region = $meta['geoplugin_regionName'];
		$fecha = date('d/m/Y G:i');
		$navegador = getenv('HTTP_USER_AGENT');
		$localizado = " $ciudad/$region - $pais ($latitud;$longitud)";
		$lineas = file("contador.txt");
		$contador = $lineas[0];
		$contador++;
		
				
		$fp = fopen("contador.txt","w+"); 
		fwrite($fp, $contador); 
		fclose($fp); 
		
		echo "Su dirección IP es: ".$ipadress."  --  La fecha de hoy es: ".$fecha;  
		echo "<br>Usted se encuentra en $localizado<br>";		
		$file = @fopen("data.txt","a");
		$linea = " (".$contador." - ".$fecha." - ".$ipadress." - ".$localizado." )  $navegador".chr(13);
		fwrite($file,$linea);
		fclose($file);

		$equipos = 0;
		$fp = fopen("iplist.txt", "r");
		while(!feof($fp)) {
					$linea = fgets($fp);
					$equipos++;
				}
		fclose($fp);			
		
		echo '<br/>Esta página ha sido visitada <a href="data.txt">'.$contador.'</a> veces desde <a href="iplist.txt">'.$equipos.'</a> equipos "distintos".';
		echo '<CENTER><br><br><a href="Javascript.html">PRUEBA Javascript</a>   --  <a href="#">FTP FING</a>   --  <a href="#">www</a>  </CENTER>';
	
	
	
		echo '<CENTER><a href="Musica.php">Listar directorio</a></CENTER>';
	echo "<br><center>-- Bufón - La octava de octavio --</center>";
	echo '<center><br><audio src="a0.mp3" autoplay  controls ><p>auqui iria el audio</p></audio></center>';		
		
		$existe = false;
		$fp = fopen("iplist.txt", "r");
		
		while(!feof($fp) && !$existe) {
					$linea = fgets($fp);
					if ((strcmp (trim($linea) , trim($ipadress.$localizado) ) == 0)){
						$existe = true;
					}
				}
				echo "<br>"."Usted ".($existe?"":"no")." visitó este sitio en las últimas horas.";
				fclose($fp);	
		if (!$existe){
			$fp = fopen("iplist.txt","a");
			fwrite($fp,$ipadress.$localizado.chr(10));
			fclose($fp);
		}
		if (!$fp){
			echo "Ha ocurrido un pequeño error. No se pudo cargar la lista. ";
		}
		//$listaftp =  ftp_nlist( "ftp://mathiasuy.ddns.net:21" , "/fing" );

	echo '<br><center><video src="v1.mp4" controls   >HTML5 Video</video> </center>';

	
	
	
	
	
	
	
	$creditos = $meta['geoplugin_credit'];
	echo '<br><br><div align="right">Su navegador y sistema operativo son: '.$navegador."</div>";
	echo '<br><div align="right">'.$creditos."</div>";
?>
<br/>
<div align="right"><a href="http://mathiasuy.96.lt/..">mathiasuy.96.lt</a></div>
</body>
</html>

