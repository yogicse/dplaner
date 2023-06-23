<?php

if(!isset($_SESSION)){
    session_start();
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$path = realpath(__DIR__.'/../');

// require $path.'/PHPMailer/src/Exception.php';
// require $path.'/PHPMailer/src/PHPMailer.php';
// require $path.'/PHPMailer/src/SMTP.php';

function send_email($sender_information,$receiver_information,$subject,$message, $cc = '') {

    global $connection;
    $mail = new PHPMailer(true);

    $query = "SELECT * FROM settings";
    $get_user_query = pg_query($connection, $query);

    while ($row = pg_fetch_assoc($get_user_query)) {
        $host = $row['email_host'];
        $username = $row['email_username'];
        $password = $row['email_password'];
        $port = $row['email_port'];

    }

    $ccEmails = array_filter(explode(',', $cc));

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                    //SMTP username
    $mail->Password   = $password;                              //SMTP password
    $mail->Port       = $port;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($sender_information['email'], $sender_information['firstname']); 
    $mail->addAddress($receiver_information['email'], $receiver_information['firstname']);     //Add a recipient


    if (count($ccEmails) > 0) {
        foreach($ccEmails as $_email) {
            $mail->addCC($_email);
        }
    }

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC($cc['email']);
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return true;
} catch (Exception $e) {

    echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";

    return false;
}

}


$timezone = date_default_timezone_get();
$date = gmdate("YY-m-d");
$time = date('H:i:s');
$datetime = $date . "&nbsp" . $time;

function get_option($option, $default = false)
{
    global $connection;

    $option = trim($option);
    if (empty($option)) {
        return false;
    }
}

function sql2date($format, $date, $translate = true)
{
    if (empty($date)) {
        return false;
    }

    $datetime = date_create($date, timezone());

    if (false === $datetime) {
        return false;
    }

    // Returns a sum of timestamp with timezone offset. Ideally should never be used.
    if ('G' === $format || 'U' === $format) {
        return $datetime->getTimestamp() + $datetime->getOffset();
    }

    if ($translate) {
        return date($format, $datetime->getTimestamp());
    }

    return $datetime->format($format);
}


function current_datetime()
{
    return new DateTimeImmutable('now', timezone());
}

function timezone()
{
    return new DateTimeZone(timezone_string());
}
function timezone_string()
{
    $timezone_string = get_option('timezone_string');

    if ($timezone_string) {
        return $timezone_string;
    }

    $offset  = (float) get_option('gmt_offset');
    $hours   = (int) $offset;
    $minutes = ($offset - $hours);

    $sign      = ($offset < 0) ? '-' : '+';
    $abs_hour  = abs($hours);
    $abs_mins  = abs($minutes * 60);
    $tz_offset = sprintf('%s%02d:%02d', $sign, $abs_hour, $abs_mins);

    return $tz_offset;
}

function checkUsername($user_username, $exclude_id = 0)
{
    if(empty($username)) {
        return false;
    }

    global $connection;
    $query = "SELECT username FROM users WHERE username='{$user_username}'";
    if ($exclude_id > 0) {
        $query = "SELECT username FROM users WHERE username='{$user_username}' AND uid <> " . $exclude_id;
    }
    $result = pg_query($connection, $query);
    if (pg_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function get_source()
{
    if (isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }

    return $source;
}

function getTitle($source = "")
{
    $activePage = basename($_SERVER['PHP_SELF']);
    $activePage = str_replace("_", " ", ucfirst(rtrim($activePage, "\.php")));

    if ($source) {
        $activePage = str_replace("_", " ", ucfirst($source)) . " " . $activePage;
    }

    return $activePage;
}





function message()
{
    $message = "";
    $type = "";

    if (isset($_GET['msg_success'])) {
        $message = $_GET['msg_success'];
        $type = "alert-success";
    } else if (isset($_GET['msg_error'])) {
        $message = $_GET['msg_error'];
        $type = "alert-danger";
    }

    if ($message) {
?>
        <div class="alert <?= $type ?>" role="alert">
            <?= $message ?>
        </div>

    <?php
    }
    ?>
<?php
}


function confirmQuery($result)
{

    global $connection;

    if (!$result) {

        die("QUERY FAILED ." . pgsql_error($connection));
    }
}

function form_check($var)
{
    return isset($_POST[$var]) ? $_POST[$var] : "";
}

function p($data, $exit = 0)
{
    print("<pre>");
    print_r($data);
    print("</pre>");

    if ($exit == 1) {
        exit();
    }
}

function get_current_date_time()
{
    $current_date_time = date('Y-m-d H:i:s');
    return $current_date_time;
}


function get_session_user_id()
{
    return $_SESSION['id'];
}

function encrypt_password($password)
{
    return password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
}

function edit_icon()
{
    return '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
}

function delete_icon()
{
    return '<i class="fa fa-trash"></i>';
}

function upload_documents($var,$company_id,$path = "")
{
    $target_dir = "uploads/".$path;
    $target_file = $target_dir .$company_id."-". basename($_FILES[$var]["name"]);    
    move_uploaded_file($_FILES[$var]["tmp_name"], $target_file);
    return $target_file;
}


function status_dropdown($status = 0)
{

    $dropdown = '<select name="status" class="form-control" required>
                    <option value="1" ' . ($status == 1 ? "selected" : "") . '>Enabled</option>
                    <option value="2" ' . ($status == 2 ? "selected" : "") . '>Disabled</option>
                    <option value="3" ' . ($status == 3 ? "selected" : "") . '>Archived</option>
                    </select>';

    return $dropdown;
}

function bulk_options_dropdown()
{
    $dropdown = '<select class="form-control" name="bulk_options" id="bulk_options_dropdown" required>
                    <option value="">Select Options</option>
                    <option value="1">Enabled</option>
                    <option value="2">Disabled</option>
                    <option value="3">Archived</option>
                    <option value="delete">Delete</option>
                </select>';

    return $dropdown;
}

function is_valid_status($status) 
{
    $status_array = array(1,2,3);

    if(in_array($status,$status_array)) {
        return 1;
    }

    return 0;
}

function status($status)
{
    $status_array = array();
    $status_array['css'] = "";
    $status_array['text'] = "";

    if($status == 1) {
        $status_array['text'] = "Enabled";
        $status_array['css'] = "enable_color";
    } else if($status == 2) {
        $status_array['text'] = "Disabled";
        $status_array['css'] = "disable_color";
    } else if($status == 3) {
        $status_array['text'] = "<i>Archived</i>";
        $status_array['css'] = "archive_color";
    }
    return $status_array;
}


function pagination($page,$total_pages,$prev,$next,$page_url) 
{
?> 
    <nav aria-label="Page navigation example mt-5">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
            <a class="page-link"
                href="<?php if($page <= 1){ echo '#'; } else { echo "&page=" . $prev; } ?>">Previous</a>
        </li>
        <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="<?=$page_url?>&page=<?= $i; ?>"> <?= $i; ?> </a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
            <a class="page-link"
                href="<?php if($page >= $total_pages){ echo '#'; } else {echo "&page=". $next; } ?>">Next</a>
        </li>
    </ul>
    </nav>
<?php    
}


function listing_per_page()
{
    return 10;
}

function is_admin() {

    $_SESSION['role'] = trim($_SESSION['role']);


    if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {
        header('Location:/login.php');
        exit();
    }

    if($_SESSION['role'] != "Administrator") {


        echo "You Don't have rights on this page";
        exit();
    }

}


function is_agent() {

    $_SESSION['role'] = trim($_SESSION['role']);

    if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {
        header('Location:/login.php');
        exit();
    }



    if($_SESSION['role'] != "Agent") {
        echo "You Don't have rights on this page";
        exit();
    }

}

function is_client() {

    $_SESSION['role'] = trim($_SESSION['role']);

    if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {
        header('Location:/login.php');
        exit();
    }

    $activePage = basename($_SERVER['PHP_SELF']);

    if($activePage != "accounts.php" && $activePage != "paypal.php") {

        
    $path = realpath(__DIR__.'/..');
    include_once $path.'/settings.php';
    $connection = pg_pconnect("host=" . DB_HOST .  " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS);
    

        $query = "SELECT * FROM users WHERE uid= '".$_SESSION['uid']."'";

   $result = pg_query($connection, $query);

   $balance = 0;
   while ($row = pg_fetch_assoc($result)) {
    $balance = $row['balance'];

   }

    
        if($balance < 1) {
            header("Location: /client/accounts.php?source=invoices&message=Do not have enough balance");
        }

    }

    if($_SESSION['role'] != "Client") {
        echo "You Don't have rights on this page";
        exit();
    }

}

function get_clients_by_agent_id($client_id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE agent_id=".$client_id;
    $result = pg_query($connection, $query);

    $agent_array = array();
    while ($row = pg_fetch_assoc($result)) {
        $agent_array[$row['uid']] = $row;
    }

    return $agent_array;
}

function get_user_info($user_id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE uid=".$user_id;
    $result = pg_query($connection, $query);

    $user = 0;
    while ($row = pg_fetch_assoc($result)) {
        $user = $row;
    }

    return $user;
}

function get_client_agent_id($client_id)
{
    global $connection;
    $query = "SELECT agent_id FROM users WHERE uid=".$client_id;
    $result = pg_query($connection, $query);

    $agent_id = 0;
    while ($row = pg_fetch_assoc($result)) {
        $agent_id = $row['agent_id'];
    }

    return $agent_id;
}


function get_client_info($client_id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE uid=".$client_id;
    $result = pg_query($connection, $query);

    $client_info = 0;
    while ($row = pg_fetch_assoc($result)) {
        $client_info = $row;
    }

    return $client_info;
}


function get_agents()
{
    global $connection;
    $query = "SELECT * FROM users WHERE role = 'Agent'";
    $result = pg_query($connection, $query);

    $agents = array();
    while ($row = pg_fetch_assoc($result)) {
        $agents[$row['uid']] = $row;
    }

    return $agents;
}


function get_clients($agent_id = 0)
{
    global $connection;

    if($agent_id > 0) {
        $query = "SELECT * FROM users WHERE role = 'Client' AND agent_id = ".$agent_id;
    } else {
        $query = "SELECT * FROM users WHERE role = 'Client'";
    }
    $result = pg_query($connection, $query);

    $clients = array();
    while ($row = pg_fetch_assoc($result)) {
        $clients[$row['uid']] = $row;
    }

    return $clients;
}


function get_client_data($client_id)
{
    global $connection;

    $query = "SELECT * FROM users WHERE role = 'Client' AND uid = ".$client_id;
    $result = pg_query($connection, $query);

    $name = "";
    while ($row = pg_fetch_assoc($result)) {
        $name = $row['firstname']." ".$row['lastname'];
    }

    return $name;
}


function get_user_cases($user_id)
{
    global $connection;

    $query = "SELECT * FROM cases WHERE client_id = ".$user_id;

    $result = pg_query($connection, $query);

    $clients = array();
    while ($row = pg_fetch_assoc($result)) {
        $clients[$row['id']] = $row;
    }

    return $clients;
}

function add_notification($type,$type_primary_id,$details) 
{
    global $connection;
    $session_user_id = get_session_user_id();
    $agent_id = get_client_agent_id($session_user_id);
    $current_date_time = get_current_date_time();

    $query = "INSERT INTO notifications (user_id,client_id,agent_id,type,type_primary_id,details_client,details_agent,details_admin,status,created_at,updated_at)";
    
    $query .= "VALUES('". $session_user_id ."','". $session_user_id ."','". $agent_id ."',
                      '" . $type . "',
                      '" . $type_primary_id . "',
                      '" . $details['client'] . "',
                      '" . $details['agent'] . "',
                      '" . $details['admin'] . "',
                      '1',
                      '" . $current_date_time . "',
                      '" . $current_date_time . "')";

    pg_query($connection, $query);

}


function get_last_inserted_id($add_record_query,$key = 'id') {

    $last_inserted_id = 0;
    while ($row_inserted_id = pg_fetch_assoc($add_record_query)) 
    {
        $last_inserted_id = ($row_inserted_id[$key]);

    }

    return $last_inserted_id;
}


function get_latest_notifications() 
{

}


function date_time_format($date) {
    
    if(empty($date)) {
        return "";
    }

    $exploded = explode("+",$date);
    $date = $exploded[0];

    $converted = strtotime($date);
    $converted = date("d-m-Y H:i:s", $converted);
    return $converted;
}