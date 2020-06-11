$(document).ready(function(){
	// onclick sign up, hide login form  and show registration form
	$("#signup").click(function() {
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});
	// onclick sign up, hide login form  and show registration form
	$("#signin").click(function() {
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});
});