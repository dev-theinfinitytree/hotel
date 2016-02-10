 /*$("#login-button").click(function(event){
		 event.preventDefault();
	 
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});*/

$(document).ready(function() {
		// validate login form on keyup and submit
		$("#loginForm").validate({
			rules: {
				user_name: {
					required: true,
					minlength: 5,
					maxlenth:20
				},
				user_password: {
					required: true,
					minlength: 5,
					maxlenth: 50
				}			},
			messages: {
				user_name: {
					required: "Please enter your username",
					minlength: "Your username must consist of at least 5 characters"
				},
				user_password: {
					required: "Please enter your password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
		});
	});
