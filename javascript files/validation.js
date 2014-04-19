$(document).ready(function(){
$("#form").validate({
	  
	  errorElement: 'div',
	  errorPlacement: function(error, element) {
      error.insertAfter( element );
    },
	
rules: {
	// to validate product
    product: {
        required: true,
        minlength: 4,
		regex: /^[a-zA-Z0-9- ]+$/,
    },
	price: {
        required: true,
		digits: true,
    },
	description: {
		regex: /^[a-zA-Z0-9- ,.!?():;'"]+$/,
    },
	// to validate account
	username: {
		required: true,
		minlength: 6,
		regex: /^[a-zA-Z0-9]+$/,
	},
	password: {
		required: true,
		minlength: 6,
		regex: /^[a-zA-Z0-9]+$/,
	},
	email: {
        required: "#csub:checked",
        email: true
    },
	oldemailaddress: {
        required: "#csub:checked",
        email: true
    },
	newemailaddress: {
        required: "#csub:checked",
        email: true
    },
	oldpassword: {
		required: true,
		minlength: 6,
		regex: /^[a-zA-Z0-9]+$/,
	},
	newpassword: {
		required: true,
		minlength: 6,
		regex: /^[a-zA-Z0-9]+$/,
	},
	search: {
		required: true,
		regex: /^[a-zA-Z0-9 ]+$/,
	},
	// to validate reservation
    firstname: {
        required: true,
        minlength: 2,
		regex: /^[a-zA-Z0-9]+$/
    },
	lastname: {
        required: true,
        minlength: 2,
		regex: /^[a-zA-Z0-9]+$/
    },
	address: {
		required: true,
		minlength: 5,
		regex: /^[a-zA-Z0-9 ]+$/
	},
	zipcode: {
		required: true,
		digits: true,
		minlength: 5
	},
	shippingspeed: {
		required: true
	},
	date: {
		required: true
	},
},
messages: {
    product: {
        required: "Please enter the product name",
        minlength: jQuery.format("You need to use at least {0} characters for the product name"),
		regex: jQuery.format("Please enter a correct name without special characters"),
    },
	price: {
        required: "Please enter the price",
    },
	description: {
		regex: jQuery.format("Please enter a correct description without html characters"),
    },
	username: {
        required: "Please enter your username",
        minlength: jQuery.format("You need to use at least {0} characters for your username"),
		regex: jQuery.format("Please enter a correct username without space or special characters"),
    },
	password: {
        required: "Please enter your password",
        minlength: jQuery.format("You need to use at least {0} characters for your password"),
		regex: jQuery.format("Please enter a correct password without space or special characters"),
    },
	email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address"
    },
	oldemailaddress: {
        required: "Please enter your email address",
        email: "Please enter a valid email address"
    },
	newemailaddress: {
        required: "Please enter your email address",
        email: "Please enter a valid email address"
    },
	oldpassword: {
        required: "Please enter your password",
        minlength: jQuery.format("You need to use at least {0} characters for your password"),
		regex: jQuery.format("Please enter a correct password without space or special characters"),
    },
	newpassword: {
        required: "Please enter your password",
        minlength: jQuery.format("You need to use at least {0} characters for your password"),
		regex: jQuery.format("Please enter a correct password without space or special characters"),
    },
	search: {
        required: "Please enter the product name",
        minlength: jQuery.format("You need to use at least {0} characters for your search"),
		regex: jQuery.format("Please enter a correct product name without special characters"),
    },
	firstname: {
        required: "Please enter your first name",
        minlength: jQuery.format("You need to use at least {0} characters for your first name"),
		regex: jQuery.format("Please enter a correct name without special characters")
    },
	lastname: {
        required: "Please enter your last name",
        minlength: jQuery.format("You need to use at least {0} characters for your last name"),
		regex: jQuery.format("Please enter a correct name without special characters")
    },
	address: {
		required: "Please enter the date you want your order to be delivered",
		minlength: jQuery.format("You need to use at least {0} characters for your address"),
		regex: jQuery.format("Please enter a correct address without special characters")
	},
	zipcode: {
		required: "Please enter 5 digits for your zipcode",
		minlength: jQuery.format("You need to use at least {0} digits for your zipcode"),
		digits: jQuery.format("Please enter 5 digits for your zipcode")
	},
	shippingspeed: {
		required: "Please enter your Shipping Speed"
	},
	date: {
		required: "Please enter the date you want your order to be delivered"
	},
}

});
	$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var check = false;
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "No special Characters allowed here."
	);
});