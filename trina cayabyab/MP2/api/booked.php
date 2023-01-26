<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include_once ("config.php");

// PHP Mailer
require_once ('../plugins/mailer/src/Exception.php');
require_once ('../plugins/mailer/src/PHPMailer.php');
require_once ('../plugins/mailer/src/SMTP.php');

define("TABLE_NAME", "booking");

// if($_SERVER['SERVER_NAME'] === 'localhost') {
//     $server_root = 'localhost/travel';
// } else {
//     $server_root = $_SERVER['DOCUMENT_ROOT'];
// }
/**
 * This code is for selecting all informations 
 */
if (isset($_GET['index']))
{
    $database->orderBy("id", "DESC");
    $users = $database->get(TABLE_NAME);
    $data['records'] = $users;
    $data['total_rows'] = count($users);

    echo parseResponse(SUCCESS, "Successful", null, $data);
}

if(isset($_POST['booked'])) {

    $data = json_decode($_POST['booked']);

    $response = array(
        "code" => INPUT_ERROR,
        "description" => "Input Error!"
    );

    $booking_values = array(
        "destination_id" => $data->destination,
        "package_id" => $data->package,
        "email" => $data->email,
        "contact" => $data->contact,
        "first_name" => $data->fname,
        "last_name" => $data->lname,
        "address" => $data->address
    );

    $query_booking = $database->insert(TABLE_NAME, $booking_values);

    if($query_booking) {
       
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shaikram02@gmail.com'; // Your gmail
        $mail->Password = 'amrqksusxooylkkp'; //Your gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('shaikram02@gmail.com'); //Your gmail

        $mail->addAddress($data->email);

        $mail->isHTML(true);

        $mail->Subject = "Booked";
        // $mail->Body = "Hello World";
        $mail->Body = 
        "
            <center>
                <div class='container'
                style='
                width: 80%;
                height:auto;
                min-height: 500px;
                background-color: #fff;
                border-radius: 5px;
                border: 1px solid #808080;
                '>
                    <h1 class='company_name'
                    style='
                    color: #4a2c58;
                    text-align: center;
                    '>
                    CK Travel and Tours</h1>
                    <div class='company_header_div' 
                    style='
                    width: auto;
                    height: auto;
                    padding: 10px;
                    background: #4a2c58;
                    '>
                        <h3 
                        style='
                        color: #fff;
                        text-align: center;
                        font-family: Arial, Helvetica, sans-serif;
                        '>
                        Proceed to your payment</h3>
                    </div>
                    <div class='message_content' 
                    style='
                    width: 90%;
                    height: auto;
                    min-height: 200px;
                    padding: 5%;
                    color: gray;
                    margin-top: 20px;
                    margin-bottom: 30px;
                    '>
                    <table width='100%' height='auto'>
                        <tr>
                            <td>
                                <p 
                                style='
                                    text-align: left;
                                    float: left;
                                '>
                                Thank you for choosing CK Travel and tours Online Booking Form.
                                <br><br><br>
                                To proceed with your payment, please click on the button below to verify your email:
                                </p>
        
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href='#' 
                                style='
                                font-weight: bold;
                                text-decoration: none;
                                color: white;
                                font-size: 20px;
                                padding: 10px;
                                background: #0b70df;
                                border-radius: 5px;
                                border: 1px solid #064386;
                                '>
                                Proceed to payment
                                </a>
                                <br><br>
                            </td>
                        </tr>
                        
                    </table>

                    </div>

                    <div class='company_footer_div'
                    style='
                    width: auto;
                    height: auto;
                    padding: 10px;
                    background: #4a2c58;
                    '>
                        <span 
                        style='
                        color: #fefefe;
                        text-align: center;
                        font-size: 15px;
                        '>Contact: +63 955 294 6691 | Email: customer@cktravel.com</span><br>
                        <span 
                        style='
                        color: #fefefe;
                        text-align: center;
                        font-size: 15px;
                        '>CK Travel and Tours ©  All Rights Reserved</span>
                    </div>
                </div>
            </center>
        ";


        $mail->send();

            $response = array(
                "code" => SUCCESS,
                "description" => "Success, Please check your email to verify your account."
            );
        
    }
    echo json_encode($response);
}

