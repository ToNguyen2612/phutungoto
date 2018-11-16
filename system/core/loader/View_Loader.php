<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/29/2018
 * Time: 11:09 AM
 */

    class View_Loader {
        private $__content = array();

        public function load($view, $data ) {
            //Chuyển dữ liệu thành biến
            extract($data);

            // Chuyển nội dung view thành biến thay vì in ra bằng cách dùng ab_start()
            ob_start();
            require_once PATH_APPLICATION . '/view/' . $view . '.php';

            $content = ob_get_contents();
            ob_end_clean();

            // Gán nội dung vào danh sách view đã load
            $this->__content[] = $content;
        }
        public function show()
        {
            foreach ($this->__content as $html){
                echo $html;
            }
        }

    }
?>