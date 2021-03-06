<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twig
{
    private $CI;
    private $_twig;
    private $_template_dir;
    private $_cache_dir;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('twig');
        ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/Twig');
        require_once (string)'Autoloader.php';

        log_message('debug', "Twig Autoloader Loaded");

        Twig_Autoloader::register();

        if ($this->CI->uri->segment(1) == 'setup') {
            $this->_template_dir = $this->CI->config->item('template_dir').'/install';
        } else {
            $this->_template_dir = $this->CI->config->item('template_dir').'/'.get_active_theme();
        }
        $this->_cache_dir = $this->CI->config->item('cache_dir');

        $path_plugin_view = './plugins/views/';
        if (is_dir($path_plugin_view)) {
            $twig_template_dir = array($path_plugin_view, $this->_template_dir);
        } else {
            $twig_template_dir = array($this->_template_dir);
        }

        $loader = new Twig_Loader_Filesystem($twig_template_dir);

        $this->_twig = new Twig_Environment($loader, array(
                'cache' => $this->_cache_dir,
                'debug' => true,
            )
        );

        foreach(get_defined_functions() as $functions) {
            foreach($functions as $function) {
                $this->_twig->addFunction($function, new Twig_Function_Function($function));
            }
        }

        $filter = new Twig_SimpleFilter('raw_media', function ($string) {
            # untuk decode iframe youtube yang di encode
            if (strpos($string, "&lt;iframe src=\"http://www.youtube.com/embed/") !== false) {
                $string = str_replace('&lt;iframe src="http://www.youtube.com/embed/', '<iframe src="http://www.youtube.com/embed/', $string);
                $string = str_replace("&gt;&lt;/iframe>", "></iframe>", $string);
                $string = str_replace("&gt;&lt;/iframe&gt;", "></iframe>", $string);
            }

            # untuk audio
            if (strpos($string, "&lt;audio width=") !== false) {
                $string = str_replace("&lt;audio width=", "<audio width=", $string);
                $string = str_replace("&gt;&lt;/audio>", "></audio>", $string);
                $string = str_replace("&gt;&lt;/audio&gt;", "></audio>", $string);
            }

            # untuk video
            if (strpos($string, "&lt;video width=") !== false) {
                $string = str_replace("&lt;video width=", "<video width=", $string);
                $string = str_replace("&gt;&lt;/video>", "></video>", $string);
                $string = str_replace("&gt;&lt;/video&gt;", "></video>", $string);
            }

            # untuk object
            if (strpos($string, "&lt;object width=") !== false) {
                $string = str_replace("&lt;object width=", "<object width=", $string);
                $string = str_replace("&gt;&lt;/object>", "></object>", $string);
                $string = str_replace("&gt;&lt;/object&gt;", "></object>", $string);
            }

            # untuk decode iframe
            $base_url = base_url();
            if (strpos($string, "&lt;iframe src=\"{$base_url}") !== false) {
                $string = str_replace("&lt;iframe src=\"{$base_url}", "<iframe src=\"{$base_url}", $string);
                $string = str_replace("&gt;&lt;/iframe>", "></iframe>", $string);
                $string = str_replace("&gt;&lt;/iframe&gt;", "></iframe>", $string);
            }

            # ini untuk wiris
            if (strpos($string, "&lt;math xmlns=\"http://www.w3.org/1998/Math") !== false) {
                $string = str_replace("&lt;math xmlns=\"http://www.w3.org/1998/Math", "<math xmlns=\"http://www.w3.org/1998/Math", $string);
                $string = str_replace("/MathML\"&gt;", "/MathML\">", $string);
                $string = str_replace("&lt;/math&gt;", "</math>", $string);
            }
            return $string;
        });

        $this->_twig->addFilter($filter);

    }

    public function add_function($name)
    {
        $this->_twig->addFunction($name, new Twig_Function_Function($name));
    }

    public function render($template, $data = array())
    {
        $template = $this->_twig->loadTemplate($template);
        return $template->render($data);
    }

    public function display($template, $data = array())
    {
        # merge array data dengan default data
        $data = default_parser_item($data);

        $template = $this->_twig->loadTemplate($template);
        $this->CI->output->set_output($template->render($data));
    }
}
