const USERS_API =  "../api/users.php";


/** Actual Functions */


index();
function index()
{
    //@TODO
    //@var change variable
    $.ajax({
        "url" : USERS_API + "?index",
        "success" : function(response) {
            
            let jsonParse = JSON.parse(response)

            $("#admin_name").text(jsonParse.name)
            // console.log(jsonParse.name)
        }
    })
}
