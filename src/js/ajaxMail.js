function sendMailClick(){

	//Setting mail --> https://symfony.com/doc/current/email.html

	var email = $("#email").val();
	var name = $("#name").val();
	var obj = $("#subject").val();
	var msg = $("#message").val();
	var pj = $("#pj").val();

	if (email !== null && name !== null && obj !== null && msg !== null ) {

		$.ajax({
	    type: "POST",
	    url: "/public/sendmail",
	    data: {
		    	email: email,
	            name: name,
	            obj: obj,
	            msg: msg,
	            pj: pj
	    	}
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