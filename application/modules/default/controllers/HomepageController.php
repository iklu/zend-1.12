<?php

class HomepageController extends Saffron_AbstractController
{

    public function indexAction()
    {
        $this->view->headTitle('Hello WoOrld');
        $this->view->current_date_and_time = date('M d, Y, Y - H:i:s');
    }
}
