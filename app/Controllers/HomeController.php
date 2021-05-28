<?php


namespace App\Controllers;


class HomeController
{
    public function index()
    {
        $data = [
            'mooooz' => 'amir',
        ];

        view('admin.articles.index', $data);
    }
}