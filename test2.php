<script src='jquery.min.js'></script>


<script>

$(document).ready(function(){
			var username = 140301040;
			var password = '4176';
			var dataString = '&username='+username+'&password='+password+'&mode=191&isAccessDenied=null';
			$.ajax({
			type: 'POST',
			url: 'http://172.16.16.16/24online/servlet/E24onlineHTTPClient',
			data: dataString,
			dataType: 'json'
			});  
			//window.location = 'index.php';
});  

</script>

Logged In 

