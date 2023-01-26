//@TODO Change api variable api path
//@var change variable name value
const BOOKING_API =  "../../api/booking.php";

// Pre-Booking Method
function store() {
    $.blockUI({ message: '<img src="../../assets/loader.gif" width="100px" height="auto" />' }) //Block UI
   
    //@TODO change json collection
    //@var change variable name and value
    let jsonInputs = {
        email : $("#email").val(),
        contact : $("#contact").val(),
        fname : $("#fname").val(),
        lname : $("#lname").val(),
        address : $("#address").val(),
        destination : $("#destination").val(),
        package : $("#package").val()
	}

    // $.ajax({
    //     "url" : BOOKING_API ,
    //     "type" : "POST",
    //     "data" : "booked=" + JSON.stringify(jsonInputs), //@var dont forget to change
    //     "success" : function(response) {

    //         let responseJSON = JSON.parse(response)

    //         console.log(responseJSON)
    //         return false;
            
    //         // if(responseJSON.code === 200) {
    //         //     $("#customer_email").val('')
                
    //         //     alert(responseJSON.description)

    //         //     window.location.href = '../../'

    //         //     return false;
    //         // }else {
                alert(JSON.stringify(jsonInputs))

    //         //     return false;
    //         // }
            
    //     }
    // })

    return false;
}