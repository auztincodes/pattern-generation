$(document).ready(function(){
	$("#newpat").click(function(){
		$.post("../includes/patternTwo.php",{
			"Result":$("#name").val()
		},

		function(data){
			$("#response").html(data)
		});

		$("#patternForm").submit(function(){
			return false;
		});
	});
	
});