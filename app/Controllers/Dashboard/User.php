<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;
use function App\Controllers\isAJAX;

class User extends BaseController
{
    public function __construct()
    {
        $this->User = new UserModel();
    }
    public function index()
    {
        $data['pageName'] = "User";
        return view('pages/user', $data);
    }
    public function test()
    {
        $data['data'] = $this->User->showUser();
        echo json_encode($data);
    }
    public function searchUser($id)
    {
        $data = $this->User->searchUser($id);
        echo json_encode($data);
    }
    public function addUser()
    {
        $data = array(
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'gender'    => $this->request->getPost('gender'),
            'status'    => $this->request->getPost('status'),
            'project'   => $this->request->getPost('project'),
        );
        $this->User->addUser($data);
        echo json_encode(array("status" => TRUE));
    }
    public function editUser()
    {
        $id = $this->request->getPost('id');
        $data = array(
            'id'        => $this->request->getPost('id'),
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'gender'    => $this->request->getPost('gender'),
            'status'    => $this->request->getPost('status'),
            'project'   => $this->request->getPost('project'),
            'updated_at'    => date('Y-m-d H:i:s'),
        );
        $query = $this->User->editUser(['id'=> $id],$data);
        dd($data);
        return redirect()->to(base_url('user'));
    }
    public function deleteUser($id)
    {
        $this->User->deleteUser($id);
        echo json_encode(array("status"=>true));
    }
}
