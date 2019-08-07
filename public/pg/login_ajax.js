/**	CONTACT FORM
*************************************************** **/
	jQuery("#loginSubmit").bind("click", function(e) {
		e.preventDefault();

		var instructor_user 			= jQuery("#instructor_user").val(),			// required
			instructor_password 			= jQuery("#instructor_password").val(),			// required
			_action					= jQuery("#login").attr('action'),	// form action URL
			_method					= jQuery("#login").attr('method'),	// form method
			_err					= false;									// status

		

		// Name Check
		if(instructor_user == '' || instructor_password=='') {
			
			var _err = true;
		}

		
		// Stop here, we have empty fields!
		if(_err === true) {
			return false;
		}


		// SEND MAIL VIA AJAX
		$.ajax({
			url: 	_action,
			data: 	{ajax:"true",  instructor_user:instructor_user, instructor_password:instructor_password},
			type: 	_method,
			error: 	function(XMLHttpRequest, textStatus, errorThrown) {

				alert('Server Internal Error'); // usualy on headers 404

			},

			success: function(data) {
				data = data.trim(); // remove output spaces


				

				// VALID EMAIL
				if(data == '_sent_ok_') {
                                    
                                    swal("Thank You!", "Your message successfully sent!", "success"); 
					// append message and show ok alert

					// reset form
					jQuery("#instructor_user, #instructor_password").val('');

				} else {

					// PHPMAILER ERROR
					swal("Failed!", "Please complete all mandatory (*) fields!", "error"); 
                                        
                                        

				}
			}
		});

	});