<?php
	$id = $_GET['id'];

   
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://it.cmtc.ac.th/json/course_detail_'.$id.'.json');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    ;

    $exec = curl_exec($curl);
    curl_close($curl);

    //print_r(json_decode($exec));
     $data=json_decode($exec);     
 
	foreach($data as $key => $value)
	{
	echo 'COURSE ID:'.$value->course_id;
	echo '<br>';

	echo 'COURSE TITLE:'.$value->ch_title;
	echo '<br>';

	echo 'COURSE DATE:'.$value->ch_dateadd;
	echo '<br>';

	echo 'COURSE TIME:'.$value->ch_timetotal;
	echo '<hr>';

	}
	



	//echo var_dump(json_decode($exec));

?>
<a href="request_cmtc.php">กลับหน้าแรก</a>