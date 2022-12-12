<?php
class Response{
    function redirect($url=''){
        if(!preg_match('~^(http||https)~is',$url)){
            $new_url = $url;
        }else{
            $new_url = _WEB_ROOT.'/'.$url;
        }
        header("Location: ".$new_url);
        exit;
    }
}
?>