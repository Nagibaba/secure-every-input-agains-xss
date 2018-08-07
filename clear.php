function clearPOST($post){
    foreach( $post as $attr => $val ) 
    {
        if(is_array($val)){
            $post[$attr] = clearPOST($val);
        } else {
            $post[$attr] = Yii::$app->base->clearXcc($val);
        }
    }
    return $post;
}
if (isset($_POST)) {
    $_POST = clearPOST($_POST);
}
