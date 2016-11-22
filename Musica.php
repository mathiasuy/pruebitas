<?

	$directorio = getcwd().'/video';
	$ficheros  = scandir($directorio);
	// $ficheros2  = scandir($directorio, 1);

	$dir = opendir(".");
echo "<ul>";
while($archivo = readdir($dir))
    {    
        if(is_dir($archivo))
        {
            echo "<li>".$archivo."</li>";
        }
    }

echo "</ul>";

closedir($dir);  	
	
	$array = array (00,10,20,30,40,50);
	
	echo count($array);
	
	echo "<br>";
	echo "<br>";
	
	$mp3 = preg_grep('~\.(mp3|mp4|dir)$~', scandir($directorio));
	
	foreach($mp3 as $value){
		print_r($value.'<br>');
	}
	
	// print_r($ficheros1);
	// print_r($ficheros2);
?> 