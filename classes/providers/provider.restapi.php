<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.restapicallbacks.php";

if(!class_exists("RBFWpStarterTheme_ProviderRestApi")){
    class RBFWpStarterTheme_ProviderRestApi
    {
        private $callbacks;

        public function __construct()
        {
            $this->callbacks = new RBFWpStarterTheme_ProviderRestApiCallbacks();

            $this->example_get();
            $this->example_post();
            $this->example_multiple();
            $this->example_error();
        }

        public function example_get()
        {
            register_rest_route('example/v1', 'get', [
                'methods' => ['GET'],
                'callback' => [$this->callbacks, 'example_get'],
                'permission_callback' => '__return_true'
            ]);
        }

        public function example_post()
        {
            register_rest_route('example/v1', 'post', [
                'methods' => ['POST'],
                'callback' => [$this->callbacks, 'example_post'],
                'permission_callback' => '__return_true'
            ]);
        }

        public function example_multiple()
        {
            register_rest_route('example/v1', 'multi', [
                'methods' => ['GET', 'POST'],
                'callback' => [$this->callbacks, 'example_multiple'],
                'permission_callback' => '__return_true'
            ]);
        }

        public function example_error()
        {
            register_rest_route('example/v1', 'error', [
                'methods' => ['GET', 'POST'],
                'callback' => [$this->callbacks, 'example_error'],
                'permission_callback' => '__return_true'
            ]);
        }
    }
}
