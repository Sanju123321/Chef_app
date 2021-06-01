var protocol = $(location).attr('protocol');
var hostname = $(location).attr('hostname');
var path     = protocol+'//'+hostname;
var host     = path+'/buyer_wiz/';

$('#personal_form').validate({
    rules:{
        name:{
            required:true
        },
        email:{
            required:true
        }
    }
})

$('#change_password_form').validate({
    rules:{
        current_password:{
            required:true
        },
        new_password:{
            required:true,
            minlength:6,
            maxlength:25
        },
        confirm_password:{
            required:true,
            equalTo:"#new_password"
        }
    }
});

// $('#add_user_form').validate({
// 	rules:{
// 		name:{
// 			required:true,
// 			minlength:2,
// 			maxlength:100,
// 			regex:/^[a-zA-Z ]+$/
// 		},
// 		email:{
// 			required:true,
// 			email:true,
// 		},
// 		passport_no:{
// 			required:true
// 		},
// 		mobile_no:{
// 			required:true,
// 			digits:true,
// 			minlength:5,
// 			maxlength:15,
// 			remote: host+"admin/validate/contact"
// 		},
// 		phone_no:{
// 			// required:true,
// 			digits:true,
// 			minlength:5,
// 			maxlength:20
// 		},
// 		image:{
// 			required:true,
// 			accept:"image/*"
// 		}
// 	},
// 	messages:{
// 		image:{
// 			accept:"File with 'jpg, jpeg or png' extension is allowed"
// 		},
// 		email:{
// 			remote:"This email is already registered"
// 		},
// 		mobile_no:{
// 			remote:"This mobile number is already registered",
// 			regex: "This field contains only digits.",
// 			minlength: "This field conatins minimum 5 digits.",
// 			maxlength: "This field conatins maximum 15 digits."	
// 		},
// 		phone_no:{
// 			minlength: "This field conatins minimum 5 digits.",
// 			maxlength: "This field conatins maximum 20 digits."	
// 		}
// 	}
// });

// $('#edit_user_form').validate({
// 	rules:{
// 		name:{
// 			required:true,
// 			minlength:2,
// 			maxlength:100,
// 			regex:/^[a-zA-Z ]+$/
// 		},
// 		passport_no:{
// 			required:true
// 		},
// 		mobile_no:{
// 			required:true,
// 			digits:true,
// 			minlength:5,
// 			maxlength:15,
// 			remote: {
//                 url: host+"admin/edit/validate/contact",
//                 type: "post",
//                 data: {
// 	                user_id: function() {
// 	                   return $( "#user_id" ).val();
// 	                }
//                 }
//             }
// 		},
// 		phone_no:{
// 			// required:true,
// 			digits:true,
// 			minlength:5,
// 			maxlength:20
// 		},
// 		image:{
// 			// required:true,
// 			accept:"image/*"
// 		}
// 	},
// 	messages:{
// 		image:{
// 			accept:"Files with 'jpg, jpeg and png' extensions are allowed"
// 		},
// 		mobile_no:{
// 			remote:"This mobile number is already registered",
// 			minlength: "This field conatins minimum 5 digits.",
// 			maxlength: "This field conatins maximum 15 digits."	
// 		},
// 		phone_no:{
// 			minlength: "This field conatins minimum 5 digits.",
// 			maxlength: "This field conatins maximum 20 digits."	
// 		}
// 	}
// })

$('#trip_form').validate({
	rules:{
		name_en:{
			required:true,
			minlength:2,
			maxlength:255,
			regex:/^[a-zA-Z ]+$/
		},
		name_sp:{
			required:true,
			minlength:2,
			maxlength:255
			// regex:/^[a-zA-Z ]+$/
		},
		start_date:{
			required:true
		},
		end_date:{
			required:true
		},
		location:{
			required:true,
			minlength:2,
			maxlength:255,
		}
	}
});