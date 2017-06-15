$('document').ready(function()
{ 		 		
		
		 var numeregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validnume", function( value, element ) {
		     return this.optional( element ) || numeregex.test( value );
		 });

		 
		 
		 
		 
		 
		 $("#register_form").validate({
					
		  rules:
		  {
				first_name: {
					required: true,
					validnume: true,
					minlength: 3
				},
				last_name: {
					required: true,
					validnume: true,
					minlength: 3
				},
				gender: {
					required: true,
				},
				country : {
				required : true
				},
				email : {
				required : true
				},
				phone : {
				required : true,
				number: true
				},
				password: {
					required: true,
					minlength: 8
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
				remember: {
					required: true
				},
				date_of_birth: {
					required: true
				},
		   },
		   messages:
		   {
			    
				first_name: {
					required: "Numele este necesar",
					validnume: "Numele trebuie sa contina doar litere",
					minlength: "Numele este prea scurt"
		    	},
			    last_name: {
					required: "Prenumele este necesar",
					validnume: "Prenumele trebuie sa contina doar litere ",
					minlength: "Prenumele este prea scurt"
			    },
				gender : {
				required : "Selectati sex-ul"
				},
				country : {
				required : "Selectati tara"
				},
				email : {
				required : "Scrieti email-ul dumneavoastra"
				},
				phone: {
					required: "Telefonul este necesar",
					number: "Telefonul trebuie sa contina doar litere ",
					minlength: "Telefonul este prea scurt"
			    },
				password:{
					required: "Parola este necesara",
					minlength: "Parola trebuie sa contina minim 8 caractere"
			    },
				cpassword:{
					required: "Rescrieti parola",
					equalTo: "Parolele nu corespund !"
		        },
		        remember:{
					required: "Acceptati termenii si conditile"
		        },
		        date_of_birth:{
					required: "Selectati data "
		        },
	
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   	
				submitHandler: submitForm
				
		   }); 
		   
		   
	
		   
		   
		   function submitForm(){
			   
			   $.ajax({
				
				      type : 'POST',
					  async: true,
					  url  : 'register.php',
					  data : $('#register_form').serialize(),
					  dataType : 'json',
					 			  
					  success : function(data){
						  
						  
							  console.log(data);
							  
							  
							  
							   
							   setTimeout(function(){
								   
								   if ( data.status==='success' ) {
									   
									   $('#errorDiv').slideDown(200, function(){
											$('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
											$('#errorDiv').delay(3000).slideUp(100);
											$("#register_form")[0].reset();
											
							   	  	   });
									   
								   } else {
									   
									    $('#errorDiv').slideDown(200, function(){
											 $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
											 $('#errorDiv').delay(3000).slideUp(100);
											 
										});
								   }
								  
							   },3000);
							   
							   
					  },
					  error: function(){alert('Error!')}
				   
			   });
			   
			   return false;
		   }
});