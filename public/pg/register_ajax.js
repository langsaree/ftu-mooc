/**	CONTACT FORM
*************************************************** **/
	jQuery("#regSubmit").bind("click", function(e) {
		e.preventDefault();

		var instructor_name 			= jQuery("#instructor_name").val(),			// required
			instructor_username 			= jQuery("#instructor_username").val(),			// required
			instructor_password 		= jQuery("#instructor_password").val(),			// optional
			instructor_citicenid	 		= jQuery("#instructor_citicenid").val(),			// optional
			instructor_email 		= jQuery("#instructor_email").val(),			// required
			instructor_phone 		= jQuery("#instructor_phone").val(),			// required
                        instructor_birthday 		= jQuery("#instructor_birthday").val(),		
                        instructor_edu 		= jQuery("#instructor_edu").val(),	
                        instructor_skill 		= jQuery("#instructor_skill").val(),	
                        instructor_detail 		= jQuery("#instructor_detail").val(),	// required
			_action					= jQuery("#InsertRegister").attr('action'),	// form action URL
			_method					= jQuery("#InsertRegister").attr('method'),	// form method
			_err					= false;									// status

		// Remove error class
		//jQuery("input, textarea").removeClass('err');

		// Name Check
		if(instructor_name == '') {
			jQuery("#instructor_name_g").addClass('col-sm-4 m-b-20 form-group has-error');
			var _err = true;
		}

		// Email Check
		if(instructor_username == '') {
			jQuery("#instructor_username_g").addClass('col-sm-4 m-b-20 form-group has-error');
			var _err = true;
		}

		// Comment Check
		if(instructor_password == '') {
			jQuery("#instructor_password_g").addClass('col-sm-4 m-b-20 form-group has-error');
			var _err = true;
		}
                
                if(instructor_citicenid == '') {
			jQuery("#instructor_citicenid_g").addClass('col-sm-3 m-b-20 form-group has-error');
			var _err = true;
		}
                if(instructor_email == '') {
			jQuery("#instructor_email_g").addClass('col-sm-3 m-b-20 form-group has-error');
			var _err = true;
		}
                if(instructor_phone == '') {
			jQuery("#instructor_phone_g").addClass('col-sm-3 m-b-20 form-group has-error');
			var _err = true;
		}
                if(instructor_birthday == '') {
			jQuery("#instructor_birthday_g").addClass('col-sm-3 m-b-20 form-group has-error');
			var _err = true;
		}

		// Stop here, we have empty fields!
		if(_err === true) {
			return false;
		}


		// SEND MAIL VIA AJAX
		$.ajax({
			url: 	_action,
			data: 	{ajax:"true",  instructor_name:instructor_name, instructor_username:instructor_username, instructor_password:instructor_password, instructor_citicenid:instructor_citicenid,
                            instructor_email:instructor_email, instructor_phone:instructor_phone, instructor_birthday:instructor_birthday, instructor_edu:instructor_edu,instructor_skill:instructor_skill,instructor_detail:instructor_detail},
			type: 	_method,
			error: 	function(XMLHttpRequest, textStatus, errorThrown) {

				alert('Server Internal Error'); // usualy on headers 404

			},

			success: function(data) {
				data = data.trim(); // remove output spaces


				

				// VALID EMAIL
				if(data == '_sent_ok_') {
                                    
                                    swal("ลงทะเบียนเรียบร้อย", "ลงทะเบียนเป็นผู้สอนเรียบร้อย กรุณารอการอนุมัติจากเจ้าหน้าที่ภายใน 24 ชัวโมง", "success"); 
					// append message and show ok alert
					
                                        $('.btn-primary').on('click', function () {
                                            window.location="https://mooc.rmu.ac.th/instructor/signin"
                                        });

					// reset form
					jQuery("#instructor_name, #instructor_username, #instructor_password, #instructor_citicenid, #instructor_email,#instructor_phone,#instructor_birthday,#instructor_edu,#instructor_detail").val('');
                                       // window.location="https://mooc.rmu.ac.th/Instructor/signin"
				} else {

					// PHPMAILER ERROR
					swal("เกิดข้อผิดพลาด!", "เกิดข้อผิดพลาดในการบันทึกข้อมูล", "error"); 
                                        
                                        

				}
			}
		});

	});