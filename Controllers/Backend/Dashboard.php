<?php

class Dashboard extends BaseController{

    public function index()
    {
        return $this->view('backend.dashboard.index');
    }
}