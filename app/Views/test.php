<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
</head>
<body>
	<div id="content">

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: '/Test/viewHasil',
				type: 'GET',
				dataType: 'html',
				success: function(data){
					$('#content').text(data);
				}
			})
		});
	</script>
</body>
</html>