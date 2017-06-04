<?php 

	echo "\n\n\nLinki yapistir: ";
	$handle = fopen ("php://stdin","r");
	$line = fgets($handle); 
	fclose($handle);
 
	$data = file_get_contents($line);
	
	preg_match_all("/\"magnet\:\?(.*?)\"/",$data,$out);
	$magnets = [];
	foreach($out[1] as $row){
		$magnets[] = "magnet:?".$row;
	}
	for($i = 0;$i<count($magnets);$i++){
		echo ($i + 1)."/".count($magnets)."\n";
		exec("start /b ".$magnets[$i]); 
		usleep(100);
	} 
	echo "Tamam...";