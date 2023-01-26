
//@TODO Change api variable api path
//@var change variable name value
const INQUIRY_API =  "api/send.php";
const BOOKING_API =  "api/booking.php";
const DESTINATION_API =  "api/destination.php";


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
            let portfolio = '';
            let modal = '';

            for (var i = 0; i<jsonParse.records.length; i++) 
            {

                portfolio += "<div class='col-lg-4 col-sm-6 mb-4'>" +
                   "<div class='portfolio-item'>" +
                           " <a class='portfolio-link' data-bs-toggle='modal' href='#portfolioModal" + i + "'>"+
                                "<div class='portfolio-hover'>" +
                                    "<div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>" +
                                "</div>"+
                                "<img class='img-fluid' src='assets/destination/"+ jsonParse.records[i].image + "' alt='destination' />" +
                            "</a> " +
                            "<div class='portfolio-caption'>" +
                                "<div class='portfolio-caption-heading'>" + jsonParse.records[i].destination + "</div>" +
                            "</div>" +
                        "</div> " +
                    "</div>";

                modal += "<div class='portfolio-modal modal fade' id='portfolioModal" + i + "' tabindex='-1' role='dialog' aria-hidden='true'> " +
                                "<div class='modal-dialog justify-content-center'>" +
                                   " <div class='modal-content'> " +
                                       " <div class='close-modal' data-bs-dismiss='modal'><img src='assets/img/close-icon.svg' alt='Close modal' /></div> " +
                                       " <div class='container'> " +
                                           " <div class='row justify-content-center'> " +
                                              "  <div class='col-lg-8'> " +
                                                  "  <div class='modal-body'> " +
                                                      "  <h2 class='text-uppercase'>" + jsonParse.records[i].destination + "</h2> " +
                                                      "  <img class='img-fluid d-block mx-auto' src='assets/destination/"+ jsonParse.records[i].image + "' alt='destination' /> " +
                                                      "  <p>" + jsonParse.records[i].description + "</p> " +       
                                                       " <div class='col-md-12 d-flex justify-content-center pt-5'> " +
                                                           " <form class='form-group mb-3 col-md-12' onsubmit='return preBooking(" + jsonParse.records[i].id + ")'> " +
                                                               " <div class='input-group'>" +
                                                                   " <strong class='text-black google-fonts mb-2'>Your Email <span class='text-danger'>*</span></strong>" +
                                                                   " <div class='input-group'>" +
                                                                   " <input type='email' class='form-control' id='customer_email' aria-describedby='basic-addon3' minlength='10' maxlength='35' required />" +
                                                                   " </div> " +
                                                               " </div> " +
                                                                "<button class='btn btn-primary btn-xl text-uppercase mt-2' data-bs-dismiss='modal' type='submit'> " +
                                                                "    Book Now " +
                                                               " </button> " +
                                                           " </form> " +
                                                       " </div> " +
                                                 "   </div>" +
                                              "  </div>" +
                                           " </div>" +
                                       " </div>" +
                                   " </div>" +
                               " </div>" +
                           " </div>";

                // console.log(jsonParse.records[i].destination)
            }

            /**
             * Change element to be display
             * @var change records to your html id
             */
            $("#records").html(portfolio)
            $("#div_modals").html(modal)
        }
    })
}

// Pre-Booking Method
function preBooking(id) {
    $.blockUI({ message: '<img src="assets/loader.gif" width="100px" height="auto" />' }) //Block UI
    
    /**
     * Change json collections
     */
    //@TODO change json collection
    //@var change variable name and value
    let jsonInputs = {
        email : $("#customer_email").val(),
        id : id
	}

    $.ajax({
        "url" : BOOKING_API ,
        "type" : "POST",
        "data" : "pre_book=" + JSON.stringify(jsonInputs), //@var dont forget to change
        "success" : function(response) {
           

            let responseJSON = JSON.parse(response)
            
            if(responseJSON.code === 200) {
                
                alert(responseJSON.description)
                
                if($("#customer_email").val('')) {
                    
                    $.unblockUI(); //Unblock UI

                    return false;
                }

            }else {
                $.unblockUI(); //Unblock UI
                alert(responseJSON.description)

                return false;
            }
            
        }
    })

    return false;
}

// Inguiry Method
function submitEmail() {
    $.blockUI({ message: '<img src="assets/loader.gif" width="100px" height="auto" />' }) //Block UI
    
    /**
     * Change json collections
     */
    //@TODO change json collection
    //@var change variable name and value
    let formDetails = {
		name : $("#name").val(),
        email : $("#email").val(),
        phoneNumber : $("#phone").val(),
        message : $("#message").val(),
        recaptcha : grecaptcha.getResponse()
	}

    $.ajax({
        "url" : INQUIRY_API ,
        "type" : "POST",
        "data" : "store=" + JSON.stringify(formDetails), //@var dont forget to change
        "success" : function(response) {
           
            

            let responseJSON = JSON.parse(response)
            
            if(responseJSON.code === 200) {

                alert(responseJSON.description)

                if($("#name").val('')) {

                    $("#email").val('')
                    $("#phone").val('')
                    $("#message").val('')
                    grecaptcha.reset()

                    $.unblockUI(); //Unblock UI

                }

                return false;
            } else {
                $.unblockUI(); //Unblock UI
                alert(responseJSON.description)

                return false;
            }
            
            
        }
    })

    return false;

}