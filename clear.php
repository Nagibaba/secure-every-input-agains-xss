function clearXSS($data){
    $data = htmlentities($data,ENT_QUOTES,'utf-8');
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = strip_tags($data);
}

function clearPOST($post){
    foreach( $post as $attr => $val ) 
    {
        if(is_array($val)){
            $post[$attr] = clearPOST($val);
        } else {
            $post[$attr] = clearXSS($val);
        }
    }
    return $post;
}
if (isset($_POST)) {
    $_POST = clearPOST($_POST);
}
