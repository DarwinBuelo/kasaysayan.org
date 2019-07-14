<?php
/**
 * Class Container
 * @author Darwin Buelo dbuelo@gmail.com
 * @since 14/07/2019
 * @version 1.0
 */


class Container {
    protected $css = [];
    protected $head;
    protected $headEnd ;
    protected $js =[];
    protected $favicon;

    /**
     * @TODO refactor this code.
     * could be better
     */

    /**
     * this render the header
     */
    public function header(){
        $this->setHead();
        echo $this->head;
        $list = $this->css;
        if(!isset($this->favicon)){
            echo "<link rel=\"icon\" 
      type=\"image/png\" 
      href=\"/res/images/logo.png\">";
        }
        if(count($list) > 0){
            foreach ($list as $file){
                echo sprintf('<link rel="stylesheet" href="%s">',$file);
            }
        }
        echo '</head><body>';
        $this->nav();
    }

    /**
     * @TODO create a function that will render html tags with attributes
     * and also provide nested element
     */
    public function render($element,$attributes,$value = null){
        echo sprintf('<%s ',$element);
        //render attributes
        if(count($attributes) > 0){
            foreach ($attributes as $key => $value) {
                echo $key . '="' .$value .'"';
            }
        }
        echo ">";
    }

    /**
     * @TODO refactor this code to utilize the render function in line 33
     */
    public function nav(){
        $html = '<nav class="navbar navbar-expand-sm bg-dark navbar-dark"><ul class="navbar-nav"><li class="nav-item active"><a class="nav-link" href="#">Active</a></li><li class="nav-item"><a class="nav-link" href="#">Link</a></li><li class="nav-item"><a class="nav-link" href="#">Link</a></li><li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li></ul></nav><div class="container-fluid" >';
        echo $html;
    }

    protected function setHead($data = null)
    {
        if(empty($data)){
            $data = '<!DOCTYPE html><html lang="tl"><head><title>' . COMPANY_NAME . '</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        }

        $this->head = $data;
    }

    public function addCss($filePath)
    {
        $this->css[] = $filePath;
    }

    public function getCss()
    {
        return $this->css;
    }

    public function addJS($filePath)
    {
        $this->js[] =  $filePath;
    }

    public function getFavIcon(){
        return $this->favicon;
    }

    public function setFavIcon($file){
        $this->favicon = $file();
    }




}