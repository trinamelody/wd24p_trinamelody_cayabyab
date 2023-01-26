//@TODO Change api variable api path
//@var change variable name value
const USERS_API =  "../../../api/admin.php";

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
    
    $("#side-admin").addClass("active");
    $("#side-dashboard").removeClass("active");
    //@TODO
    //@var change variable
    $.ajax({
        "url" : USERS_API + "?index",
        "success" : function(response) {
            
            let jsonParse = JSON.parse(response)
            let tr = '';

            for (var i = 0; i<jsonParse.records.length; i++) 
            {
                let level = jsonParse.records[i].level
                let status = jsonParse.records[i].status

                let level_sub = "<span class='text-success'>"+level+"</span>"
                let status_sub = "<strong class='text-danger'>Deactivated</strong>"
                let delete_btn = "<button class='btn btn-danger' onclick='destroy(" +jsonParse.records[i].id+ ")'><i class='fas fa-trash-alt'></i> DELETE</button>"
                let edit_btn = " <button type='button' class='btn btn-success'><i class='fas fa-user-edit'></i> EDIT</button><button type='button' class='btn btn-success dropdown-toggle dropdown-icon' data-toggle='dropdown'><span class='sr-only'>Toggle Dropdown</span></button><div class='dropdown-menu' role='menu'><a class='dropdown-item' onclick='activate(" +jsonParse.records[i].id+ ")' style='cursor: pointer;'>Activate</a><a class='dropdown-item' onclick='deactivate(" +jsonParse.records[i].id+ ")' style='cursor: pointer;'>Deactivate</a></div>"

                if(level === 'super admin') {
                    level_sub = "<strong class='text-primary'>"+level+"</strong>"
                    delete_btn = "<button class='btn btn-secondary' disabled><i class='fas fa-trash-alt'></i> DELETE</button>"
                    edit_btn = "<button class='btn btn-dark'disabled><i class='fas fa-user-edit'></i> EDIT</button>"
                }
                if(status === 0) {
                    status_sub = "<strong class='text-success'>Active</strong>"
                }
                //@TODO Change display iterations
                //jsonParse.records[i].id
                tr += "<tr>" +
                    "<td>" + jsonParse.records[i].name + "</td>" + 
                    "<td>" + jsonParse.records[i].username + "</td>" + 
                    "<td>" + jsonParse.records[i].email + "</td>" + 
                    "<td>" + level_sub + "</td>" + 
                    "<td>" + status_sub + "</td>" + 
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

//Saving a record
function store()
{

    /**
     * Change json collections
     */
    //@TODO change json collection
    let employeeForm = {
        fname : $("#fname").val(),
        mname : $("#mname").val(),
        lname : $("#lname").val(),
        username : $("#username").val(),
        email : $("#email").val(),
        password : $("#password").val(),
		confirm_password : $("#confirm_password").val()
	}


    $.ajax({
        "url" : USERS_API ,
        "type" : "POST",
        "data" : "store=" + JSON.stringify(employeeForm),
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {

                $('#modal-lg').modal('hide')

                $("#fname").val('')
                $("#mname").val('')
                $("#lname").val('')
                $("#username").val('')
                $("#email").val('')
                $("#password").val('')
                $("#confirm_password").val('')

                alert(responseJSON.description)
                index();

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
        "url" : USERS_API ,
        "type" : "POST",
        "data" : "destroy&id=" + id,
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {
                
                alert(responseJSON.description)

                index();

                return false;
            } else {
                alert(responseJSON.description)

                return false;
            }
        }
    })
}

function activate(id)
{

    if (!confirm("Are you sure you want to activate?"))
    {
        return;
    }
    
    $.ajax({
        "url" : USERS_API ,
        "type" : "POST",
        "data" : "activate&id=" + id,
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {
                
                alert(responseJSON.description)

                index();

                return false;
            } else {
                alert(responseJSON.description)

                return false;
            }
        }
    })
}


function deactivate(id)
{

    if (!confirm("Are you sure you want to deactivate?"))
    {
        return;
    }
    
    $.ajax({
        "url" : USERS_API ,
        "type" : "POST",
        "data" : "deactivate&id=" + id,
        "success" : function(response) {

            let responseJSON = JSON.parse(response)

            if(responseJSON.code === 200) {
                
                alert(responseJSON.description)

                index();

                return false;
            } else {
                alert(responseJSON.description)

                return false;
            }
        }
    })
}