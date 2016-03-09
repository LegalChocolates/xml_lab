<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class MY_Controller extends CI_Controller {

    protected $data = array();      // parameters for view components

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
        parent::__construct();

        $this->load->library('parser');

        $this->data = array();
        $this->data['pagetitle'] = 'Schedule';
    }

    /**
     * Render this page
     */
    function render()
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */