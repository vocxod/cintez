<?php

echo "Maintenance operation\n";

/*
Login to API
curl -X POST -d "username=scanner85&key=bJ8JqL40gL4ahl3wllCU2Zpm6JjuWfD2oSUZYi55tPsqNUw6gEgwrLb4RolhfkAp8XhZVwYF4WfgLIOjhcHcK4u6fejGjhT5gmovZfI6MlqgDf3GlONhy2Q3teiggql4euLgm2m55Lj0Gxh6Yar5EzTqeYOfOCkwhLTixID5LBYojMQbgHbkqCrYrKIiEwDsmue6KCGkW2tgrloEGeUvY6vqsjrcAc2BrbluFMser6maGZNAY2FyH0ktZdgJpXxw"  "http://vkartel.dev/index.php?route=api/login&username=scanner85&api_token=bJ8JqL40gL4ahl3wllCU2Zpm6JjuWfD2oSUZYi55tPsqNUw6gEgwrLb4RolhfkAp8XhZVwYF4WfgLIOjhcHcK4u6fejGjhT5gmovZfI6MlqgDf3GlONhy2Q3teiggql4euLgm2m55Lj0Gxh6Yar5EzTqeYOfOCkwhLTixID5LBYojMQbgHbkqCrYrKIiEwDsmue6KCGkW2tgrloEGeUvY6vqsjrcAc2BrbluFMser6maGZNAY2FyH0ktZdgJpXxw"

Response:
{"success":"API \u0441\u0435\u0441\u0441\u0438\u044f \u0443\u0441\u043f\u0435\u0448\u043d\u043e \u0437\u0430\u043f\u0443\u0449\u0435\u043d\u0430!","api_token":"9fa67f6958316f622495f607f2"}


Next request:
curl -X POST -d "username=scanner85"  "http://vkartel.dev/index.php?route=api/category_tree&api_token=9fa67f6958316f622495f607f2"

curl "http://vkartel.dev/index.php?route=api/category_tree&api_token=9fa67f6958316f622495f607f2&username=scanner85"
*/
if($argc==2) {
	// Получить все фильтры

	//
	echo "Обработка из CSV " . $argv[1] . "\n";
	$sFilename = $argv[1];
	if (($handle = fopen( $sFilename, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $num = count($data);
	        echo "$num полей в строке $row:\n";
	        $row++;
	        for ($c=0; $c < $num; $c++) {
	            echo $data[$c] . ":";
	        }
	        echo "\n";
	    }
	    fclose($handle);
	}
}
