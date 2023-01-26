const LOGIN_API = "../api/login.php";

function login() {
    $.blockUI({ message: '<img src="../assets/loader.gif" width="100px" height="auto" />' }) //Block UI

    let loginCredentials = {
        username : $("#username").val(),
        password : $("#password").val()
    }

    $.ajax({
		"url" : LOGIN_API ,
        "type" : "POST",
        "data" : "auth=" + JSON.stringify(loginCredentials), //@var dont forget to change
        "success" : function(response) {
            $.unblockUI(); //Unblock UI

            let responseJSON = JSON.parse(response)
			
            if (responseJSON.code == 200) {
                window.location.href = "../admin";
				alert(responseJSON.description)

				return false;
            } else {
                alert(responseJSON.description)

                return false;
            }
			
        }
    })

	// console.log("Hello")
	return false;
}