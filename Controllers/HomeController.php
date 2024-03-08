<?php

declare(strict_types=1);
class HomeController extends BaseController
{
    public function index()
    {
        $check = Auth::requireLogin();
        return $this->view('frontend.index',['check' => $check]);
    }
}
