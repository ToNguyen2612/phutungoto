<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');


class Controller {
    protected $view = NULL;
    protected $model = NULL;
    protected $register = NULL;
    protected $config = NULL;


    public function __construct($is_controller = true) {
        //Load config
        require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';

        $this->config = new Config_Loader();
        $this->config->load('config');

        //Load library
        require_once PATH_SYSTEM . '/core/loader/Library_Loader.php';
        $this->library = new Library_Loader();


        //load helper
        require_once PATH_SYSTEM . '/core/loader/Helper_Loader.php';
        $this->helper = new Helper_Loader();

        //load view
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader();


    }

}

?>