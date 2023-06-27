<?php

if(!isset($_SESSION)){
    session_start();
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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


function checkEmail($user_email,$column = 'username'){
    global $connection;
    $query = "SELECT username FROM users WHERE ".$column."='{$user_email}'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
        else{
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
        $activePage = str_replace("_", " ", ucfirst($source)) . " " ;
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

        die("QUERY FAILED ." . mysqli_error($connection));
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

function share_icon()
{
    return '<i class="fa fa-share" aria-hidden="true"></i>';
}

function view_icon()
{
    return '<i class="fa fa-eye" aria-hidden="true"></i>';
}

function delete_icon()
{
    return '<i class="fa fa-trash"></i>';
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
                href="<?php if($page <= 1){ echo '#'; } else { echo $page_url."&page=" . $prev; } ?>">Previous</a>
        </li>
        <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="<?=$page_url?>&page=<?= $i; ?>"> <?= $i; ?> </a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
            <a class="page-link"
                href="<?php if($page >= $total_pages){ echo '#'; } else {echo $page_url."&page=". $next; } ?>">Next</a>
        </li>
    </ul>
    </nav>
<?php    
}


function listing_per_page()
{
    return 10;
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