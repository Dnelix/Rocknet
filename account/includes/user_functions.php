<?php
//getting userr by id
function getuserdata($field = '') {
    global $link;
    $field = (empty($field)) ? '*' : mysqli_real_escape_string($field);
    $query = mysqli_query($link, "SELECT {$field} FROM users WHERE id ='" . $_SESSION['user_id'] . "' LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}

$user = getuserdata();

//getting user transactions
function getusertrans($field = '') {
    global $link;
    $field = (empty($field)) ? '*' : mysqli_real_escape_string($field);
    $query = mysqli_query($link, "SELECT {$field} FROM transaction WHERE user_id ='" . $_SESSION['user_id'] . "' ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}

//check for active user
function checkActive($id = '') {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM users WHERE id ='" . $id . "' LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}

//get Username given ID
function getUsername($id = '') {
    global $link;
    $query = mysqli_query($link, "SELECT username FROM users WHERE id ='" . $id . "' LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row['username'];
    }
}


//-------------------------------------------------------------
function regvalidate($opt = '',$choice = '') {
    global $link;
	//return $choice;
    $sql = "SELECT id FROM users WHERE {$opt}='{$choice}' LIMIT 1";
    $query = mysqli_query($link, $sql); 
    $check = mysqli_num_rows($query);
    if ($check == 0) {
	    return true;
    } else {
	    return false;
    }
}
//-------------------------------------------------------------
function resize($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
	//an additional line to ensure the height never goes beyond 350px
    ($newHeight > 350) ? $newHeight = 350 : $newHeight = $newHeight;
	//end
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile");
}
//---------------------------------------------------
// FOR DISPLAY
//---------------------------------------------------
function numRows($gettable) {
	global $link;
	$res = mysqli_query($link, "SELECT COUNT(id) FROM {$gettable}");
	$row = mysqli_fetch_array($res);
	return $row[0];
}
//---------------------------------------------------
function totalValue($table,$column) {
	global $link;
	$res = mysqli_query($link, "SELECT sum({$column}) FROM {$table}");
	$row = mysqli_fetch_array($res);
	return number_format($row[0]);
}
//---------------------------------------------------
function totalProfit($usr) {
	global $link;
	$res = mysqli_query($link, "SELECT sum(bonus) FROM transaction WHERE user_id='{$usr}'");
	$row = mysqli_fetch_array($res);
	return number_format($row[0]);
}
//---------------------------------------------------
function numRefs($usr) {
	global $link;
	$res = mysqli_query($link, "SELECT COUNT(id) FROM users WHERE referee='{$usr}'");
	$row = mysqli_fetch_array($res);
	return $row[0];
}
//---------------------------------------------------
function msgCount($who) {
	global $link;
	$res = mysqli_query($link, "SELECT COUNT(id) FROM inbox WHERE receiver='{$who}' OR receiver ='" . $_SESSION['username'] . "'");
	$row = mysqli_fetch_array($res);
	return $row[0];
}
//---------------------------------------------------
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

//---------------------------------------------------
?>