function sendMailClick(){

	//Setting mail --> https://symfony.com/doc/current/email.html

	var email = $("#email").val();
	var name = $("#name").val();
	var obj = $("#subject").val();
	var msg = $("#message").val();
	var pj = $('#pj')[0].files[0];

	var pjName = '';
	if (typeof pj != 'undefined') {
		pjName = $('#pj')[0].files[0].name;	
	}

	var formData = new FormData();
	var myFormData = $('#pj')[0].files;
	formData.append('uploadFiles', myFormData);
	

	if (email !== null && name !== null && obj !== null && msg !== null ) {

		$.ajax({
	    type: "POST",
	    url: "/box-racing-v2/public/sendmail",
	    data: {
		    	email: email,
	            name: name,
	            obj: obj,
	            msg: msg,
	            attachment: pj,
	            nameFile: formData
	    	},
	    cache: false,
	    processData: false,
		contentType: false
		})
		.done(function(data){

		    if (typeof data.status != "undefined" && data.status != "undefined")
		    {
		        // At this point we know that the status is defined,
		        // so we need to check for its value ("OK" in my case)
		        if (data.status == "OK")
		        {
		        	
		            document.getElementById("alert-mail").style.visibility= 'visible' ;
		        }
		    }
		});

	} else {
		//Add response her if error
	}

}