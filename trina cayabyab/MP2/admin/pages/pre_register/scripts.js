//@TODO Change api variable api path
//@var change variable name value
const ITEMS_API =  "../../../api/booking.php";

/** Actual Functions */

/**
 * index = get all informations
 * show?id = get 1 information only
 * store = saving new data or resource
 * destroy?id = delete a resource
 * update?id new resource = to update new resource
 */

//Get all informations
index();
function index()
{
    $("#side-customer").addClass("active");
    $("#side-dashboard").removeClass("active");
    //@TODO
    //@var change variable
    $.ajax({
        "url" : ITEMS_API + "?index",
        "success" : function(response) {
            
            let jsonParse = JSON.parse(response)
            let tr = '';

            for (var i = 0; i<jsonParse.records.length; i++) 
            {
                //@TODO Change display iterations
                //jsonParse.records[i].id
                tr += "<tr>" +
                    "<td>" + jsonParse.records[i].email + "</td>" + 
                    "<td>" + jsonParse.records[i].date + "</td>" + 
                    "<td>" + jsonParse.records[i].token + "</td>" + 
                    "<td><button class='btn btn-danger' onclick='destroy(" +jsonParse.records[i].id+ ")'>DELETE</button></td>" + 
                "</tr>";
            }

            /**
             * Change element to be display
             * @var change records to your html id
             */
            $("#records").html(tr)
        }
    })
}


function destroy(id)
{

    if (!confirm("Are you sure you want to delete?"))
    {
        return;
    }

    $.ajax({
        "url" : ITEMS_API ,
        "type" : "POST",
        "data" : "destroy&id=" + id,
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            alert(responseJSON.description);

            index();
            
            return false;
        }
    })
}