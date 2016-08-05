<?php

   
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://it.cmtc.ac.th/web_service/test3_op4/test3.json');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    ;

    $exec = curl_exec($curl);
    curl_close($curl);

    //print_r(json_decode($exec));
     $data=json_decode($exec);     
 
	foreach($data as $key => $value)
	{
	echo 'ภาพยนต์เรื่อง-'.$value->title;
	echo '<br>';

	echo 'รหัสหนัง-'.$value->imdbId;
	echo '<br>';

	echo 'ออกฉายในประเทศ-'.$value->releaseCountry;
	echo '<br>';
	
	echo 'ออกฉายเมื่อ-'.$value->releaseYear."/".$value->releaseMonth."/".$value->releaseDay;
	echo '<hr>';

	
	}
	



	//echo var_dump(json_decode($exec));

?>