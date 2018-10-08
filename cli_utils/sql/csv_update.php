<?php

class CsvUpdate {
    public $mysqli=null;
    public $db_user="ocart3";
    public $db_password="r75sc13";
    public $db_name="ocart3";
    public $a_csv = [];

    public function __construct( $a_params ){

    	$this->link = new mysqli( "localhost", $this->db_user, $this->db_password, $this->db_name );	
		$this->link->set_charset('utf8');
		$this->link->query("SET collation_connection = utf8_general_ci");
		if ( $this->link->connect_error ) {
	    	die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);	
		}

		// CSV file
		$handle = @fopen( $a_params['csv_file'], "r");
		if ($handle) {
		    while (($buffer = fgets($handle, 4096)) !== false) {
		        $result = $this->product_update( str_getcsv($buffer, ";", '"', '\"') );
		        if( !$result ){
		        	var_dump( str_getcsv($buffer, ";", '"', '\"'));
		        	echo str_getcsv($buffer, ";", '"', '\"')[0] . "\n";
		        	die();
		        }
		    }
		    if (!feof($handle)) {
		        die("Ошибка: fgets() неожиданно потерпел неудачу\n");
		    }
		    fclose($handle);
		}

    }

    private function product_update( $a_row ){
    	$s_sql_update = 'UPDATE oc_product_description SET description="' . $a_row[2] . '" WHERE product_id="' . $a_row[0] . '" ';
    	//echo $s_sql_update . "\n";;
    	$result = $this->link->query( $s_sql_update );
    	return $result;
    }

}

$a_params = [];

foreach ($argv as $value) {
	$a_data = explode("=", $value);
	switch ($a_data[0]) {
		case '--csv-file':
			$a_params['csv_file'] = $a_data[1];
			break;
		default:
			break;
	}
}

$app = new CsvUpdate( $a_params );

$app->run();

