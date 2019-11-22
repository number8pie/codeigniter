<?php
class Pages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    // controller and model all follow this naming convention CI_
    public function view($page = 'home')
    // Set default page parameter as home.php file extension is omiited 
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        // if the page requested does not exist
        {
            // no page show 404
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        // load header, page content and footer
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}