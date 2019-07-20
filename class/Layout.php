<?php

/**
 * Class Layout
 * this will hold everything about the layout
 */
class Layout
{
    protected $css =[];
    protected $js = [];
    protected $companyName = 'Test Company';
    protected $companyDesc =  'Test Description';
    protected $logo;

    function __construct($companyName,$companyDesc = null, $css = null, $js = null)
    {
        $this->setCompanyName($companyName);
        if(!empty($companyDesc)){
            $this->$companyDesc = $companyDesc;
        }
        if(!empty($css)){
            $this->addCSS($css);
        }
        if(!empty($js)){
            $this->addJS($js);
        }

    }

    /**
     * Create the header of the system
     */
    public function header($page = null)
    {
        /**
         * @TODO add favicon
         */
        ?>
            <!DOCTYPE HTML>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <?php
                    if(isset($this->logo)){
                        ?>
                        <link rel="icon" href="<?= $this->logo ?>" type="image/x-icon"/>
                        <link rel="shortcut icon" href="<?= $this->logo ?>" type="image/x-icon"/>
                        <?php
                    }
                    foreach ($this->css as $css){
                        ?>
                        <link rel="stylesheet" href="<?= $css ?>">
                        <?php
                    }
                ?>
                <title><?=  isset($page)? $page .'-' : null ?><?= $this->companyName ?></title>
            </head>
            <body><?php
    }

    /**
     * Create the footer and include the JS needed in the system
     */
    public function footer()
    {
        $this->generateJS();
        ?></body></html><?php

    }

    public function generateJS(){
        if(count($this->js) > 0 ){
            foreach ($this->js as $js) {
                ?><script src="<?= $js ?>"></script><?php
            }
        }
    }

    /**
     * @param $path string / array
     */
    public function addCSS($path)
    {
        if(is_array($path)){
            foreach ($path as $file){
                $this->css[] = $file;
            }
        }else{
            $this->css[] = $path;
        }

    }

    /**
     * @param $path string /array
     */
    public function addJS($path)
    {
        if(is_array($path)){
            foreach ($path as $file){
                $this->js[] =  $file;
            }
        } else {
            $this->js[] = $path;
        }

    }

    /**
     * @param $name string
     */
    public function setCompanyName($name)
    {
        $this->companyName = $name;
    }

    /**
     * @param $desc string
     */
    public function setCompanyDescription($desc)
    {
        $this->companyDesc =  $desc;
    }

    /**
     * @return array
     */
    public function getCSS()
    {
        return $this->css;
    }

    /**
     * @return array
     */
    public function getJS()
    {
        return $this->js;
    }

    /**
     * @return string
     */
    public function getCompanyName(){
        return $this->companyName;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($path){
        $this->logo = $path;
    }
}