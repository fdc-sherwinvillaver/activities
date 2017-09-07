<?php  

	$text = "HELLO WORLD";
	for($i = strlen($text)-1 ; $i > -1; $i--){
		$newstring[] = $text[$i];
	}
	foreach ($newstring as $string) {
		echo $string;
	}

	echo "<br>";
	$count = 0 ;
	$f1 = 0;
	$f2 = 1;
	echo $f1." ";
	echo $f2." ";
	while ($count < 10 )
	{
		$f3 = $f2 + $f1 ;
		echo $f3." ";
		$f1 = $f2 ;
		$f2 = $f3 ;
		$count = $count + 1;
	}
	echo "<br>";
	function chechArray($array1,$array2){
		for($i = 0; $i < sizeof($array2); $i++){
			if(in_array($array2[$i],$array1)){
				$rows[] = $array2[$i];
			}
		}
		echo json_encode($rows);
	}
	$array1 = array("alpha", "beta", "charlie", "delta", "foxtrot", "golf", "india");
	$array2 = array("alpha", "charlie", "india", "hotel", "test");
	chechArray($array1,$array2);
	echo "<br>";

	$data = false;

	echo gettype($data);

?>