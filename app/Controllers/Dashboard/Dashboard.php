<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $data['pageName'] = "Dashboard";
        return view('pages/home', $data);
    }

    public function user()
    {
        $data['pageName'] = "User";
        return view('pages/user', $data);
    }

    public function project()
    {
        $data['pageName'] = "Project";
        return view('pages/project', $data);
    }
}
