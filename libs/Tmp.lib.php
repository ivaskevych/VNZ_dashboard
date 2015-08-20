<?php
/**
 * @desc Template class
 */
class Tmp {
  public $ext;
  private $variables = array();
  public function __construct(){
  	//розширення шаблону
      $this->ext = ".tpl.php";
  }
  /**
   * Присвоєння змінних в шаблоні
   * @param $name <string>
   * @param $value <mixed>
   *
   */
  public function assign($name, $value){
      $this->variables[$name] = $value;
  }
  /**
   * Відображення шаблону
   */
  public function show_display($file_include){

      if(!file_exists(TMP.'/'.$file_include.$this->ext)){
          throw new Exception("Файл шаблону не знайдено!");
      }
      require_once TMP.'/'.$file_include.$this->ext;
  }
  public function __get($name){
     if(isset($this->variables[$name])){
         $variable = $this->variables[$name];

         return $variable;
     }
     return false;
  }
 

}

