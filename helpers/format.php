<?php
class format{
  public function formatDate($date){
    echo date('F j,Y,g:i a',strtotime($date));
  }
  public function textShorten($text,$limit = 400){
    $text = $text." ";
    $text = substr($text,0,$limit);
    $text = substr($text,0,strrpos($text," "));
    $text = $text."...";
    echo $text;
  }
  public function inputTextValidation($data){
    $data = trim($data);
    $data = htmlentities($data);
    $data = stripcslashes($data);
    return $data;
  }
  public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path,".php");
    if($title == "index"){
      $title = "Home Page";
    }else if($title == "contact"){
      $title = "contact Page";
    }else if($title == "about"){
      $title = "about Page";
    }
    return $title = ucwords($title);
  }
}
?>