<?php if(!defined('AVACARE_VERSION')) die('Fatal Error');

if(!class_exists('AVACARE')){

    class AVACARE{

        public $css = [
            'chat-style'
        ];

        public $js = [
            'socket.io-1.4.5',
            'chat-script',
        ];
        public $cssadmin = [
            // 'chat-style',
            // 'chat-style-admin'
        ];
        public $jsadmin = [
            // 'socket.io-1.4.5',
            // 'chat-script-admin',
        ];

        public function __CONSTRUCT(){
            add_action('wp_enqueue_scripts',[&$this,'assets']);
            if(is_admin()):
                $this->renderUIAdmin();
            else:
                $this->renderUI();
            endif;
        }

        public function assets(){

            wp_register_script('vue-js','https://vuejs.org/js/vue.js',[],true);
            if(is_admin()){
                foreach ($this->cssadmin as $file) {
                    wp_enqueue_style( 'avacare-assets-' . $this->slugify($file), AVACARE_PLUGIN_URL . 'assets/'.$file.'.css',[],true);
                }
                foreach ($this->jsadmin as $file) {
                    wp_enqueue_script( 'avacare-assets-' . $this->slugify($file), AVACARE_PLUGIN_URL . 'assets/'.$file.'.js',['vue-js'],true,true);
                }
            }
            else{

                foreach ($this->css as $file) {
                    wp_enqueue_style( 'avacare-assets-' . $this->slugify($file), AVACARE_PLUGIN_URL . 'assets/'.$file.'.css',[],true);
                }
                foreach ($this->js as $file) {
                    wp_enqueue_script( 'avacare-assets-' . $this->slugify($file), AVACARE_PLUGIN_URL . 'assets/'.$file.'.js',['vue-js'],true,true);
                }
            }
        }

        public function slugify($text)
        {
            $text = strtolower(preg_replace('~-+~', '-', trim(preg_replace('~[^-\w]+~', '', iconv('utf-8', 'us-ascii//TRANSLIT', preg_replace('~[^\pL\d]+~u', '-', $text))), '-')));

            if (empty($text)) {
                return false;
            }

            return $text;
        }

        public function renderUI(){
            add_filter( 'wp_footer' , function(){
                include AVACARE_PLUGIN_DIR . 'partials/view-client.php';
            });
        }

        public function renderUIAdmin(){
            // add_filter( 'admin_footer' , function(){
            //     include DM_BTC_PLUGIN_DIR . 'partials/module-chat-server.php';
            // });
        }

    }

}
