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


$('#user_form').validate({
 	rules:{
 		full_name:{
 			required:true,
 			minlength:2,
 			maxlength:100,
 		},
 		business_name:{
 			required:true,
 			minlength:2,
 			maxlength:100,
 		},
 		country_code:{
 			required:true,
 		},
 		phone_number:{
 			required:true,
 		},
 		email:{
 			required:true,
 		},
 		password:{
 			required:true,
 		},
 		gender:{
 			required:true,
 		},
 		dob:{
 			required:true,
 		},
 		street_name:{
 			required:true,
 		},
 		city:{
 			required:true,
 		},
 		state:{
 			required:true,
 		},
 		country:{
 			required:true,
 		},
 		status:{
 			required:true,
 		},
 		years_of_experience:{
 			required:true,
 		},
 	}
 });


$('#chef_form').validate({
    rules:{
        name:{
            required:true,
            minlength:2,
            maxlength:100,
        },
        email:{
            required:true,
        },
        password:{
            required:true,
        },
        phone_number:{
            required:true,
        },
        gender:{
            required:true,
        },
        status:{
            required:true,
        },
        
    }
 });
