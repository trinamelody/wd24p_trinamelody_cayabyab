const USERS_API =  "../../../api/users.php";
//@TODO Change api variable api path
//@var change variable name value
const DESTINATION_API =  "../../../api/destination.php";
const DESTINATION_UPLOAD_API =  "../../../api/upload_destination.php";

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
            $("#user_id").val(jsonParse.id)
            // console.log(jsonParse.name)
        }
    })
}


/**
 * index = get all informations
 * show?id = get 1 information only
 * store = saving new data or resource
 * destroy?id = delete a resource
 * update?id new resource = to update new resource
 */

//Get all informations
destination_index();
function destination_index()
{
    
    $("#side-products").addClass("active");
    $("#side-dashboard").removeClass("active");
    //@TODO
    //@var change variable
    $.ajax({
        "url" : DESTINATION_API + "?index",
        "success" : function(response) {
            
            let jsonParse = JSON.parse(response)
            let tr = '';

            for (var i = 0; i<jsonParse.records.length; i++) 
            {
                let delete_btn = "<button class='btn btn-danger' onclick='destroy(" +jsonParse.records[i].id+ ")'><i class='fas fa-trash-alt'></i></button>"
                let edit_btn = " <button type='button' class='btn btn-success mr-3'><i class='fas fa-edit'></i></button>"
                //@TODO Change display iterations
                //jsonParse.records[i].id
                tr += "<tr>" +
                    "<td><img src='../../../assets/destination/" + jsonParse.records[i].image + "' alt='destination' class='img-thumbnail'></td>" + 
                    "<td><strong>" + jsonParse.records[i].destination + "</strong></td>" + 
                    "<td>" + jsonParse.records[i].description + "</td>" + 
                    "<td><div class='btn-group'>"+ edit_btn + " " + delete_btn +" </div></td>" + 
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



function store() 
{
    
    let image = new FormData();
    image.append("image_file", $("#file")[0].files[0])
    image.append("data", "your value");


    /**
     * Same as ^
     * let image = {
     *  image_file =  $("#file")[0].files[0]
     * }
     */

     $.ajax({
        "url" : DESTINATION_UPLOAD_API ,
        "type" : "POST",
        "data" : image,
        "enctype" : "multipart/form-data",
        "cache" : false,
        "contentType" : false,
        "processData" : false,
        "success" : function(response) {
           

            destination_store()
            // console.log(response)

        }
    })
}

//Saving a record
function destination_store()
{
    /**
     * Change json collections
     */
    //@TODO change json collection
    let employeeForm = {
        destination : $("#destination").val(),
        file : $("#file").val().replace(/C:\\fakepath\\/i, ''),
		description : $("#description").val(),
        id : $("#user_id").val()
	}


    $.ajax({
        "url" : DESTINATION_API ,
        "type" : "POST",
        "data" : "store=" + JSON.stringify(employeeForm),
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {
                $('#modal-lg').modal('hide')

                $("#destination").val('')
                $("#file").val('')
                $("#description").val('')

                alert(responseJSON.description)
                destination_index();

                return false;
            } else {
                
                alert(responseJSON.description)

                return false;
            }
            
        }
    })

    return false;
}


function destroy(id)
{

    if (!confirm("Are you sure you want to delete?"))
    {
        return;
    }
    
    $.ajax({
        "url" : DESTINATION_API ,
        "type" : "POST",
        "data" : "destroy&id=" + id,
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {
                
                alert(responseJSON.description)

                destination_index();

                return false;
            } else {
                alert(responseJSON.description)

                return false;
            }
        }
    })
}
