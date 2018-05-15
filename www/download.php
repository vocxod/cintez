<?php

//var_dump( $_GET );
if(array_key_exists('doc', $_GET)){
	$filename = '../storage/download/' . $_GET['doc'];
	// 939_svid.pdf.577bdbd6de9cd338eafdca26c550dea7
	if(file_exists($filename)) { 
//		$s_data = file_get_contents($filename);
		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    // header('Content-Disposition: attachment; filename="' . basename($filename).'"');
	    header('Content-Disposition: attachment; filename="document.pdf"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($filename));
	    readfile($filename);
	    exit;
	} else {
		var_dump("check");
	}	
}


