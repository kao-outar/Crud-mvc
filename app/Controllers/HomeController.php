<?php


class HomeController
{
    public function index()
    {
        // $data['title']='Home Page';
        // $data['content']='Home Page Content';
        // View::load('home',$data);
        // echo "this class is :".__class__."and method is :".__method__; 
        view::load('home');
    }
}