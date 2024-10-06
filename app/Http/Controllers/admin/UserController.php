<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $UserServices;
    public function __construct(UserServices $userServices){
        $this->UserServices = $userServices;
    }

    public function index($role)
    {
        return view('admin.users.index',['users'=>$this->UserServices->getUsers($role),'role'=>$role]);
    }
    public function create($role){
        return view("admin.users.edit",['role'=>$role]);
    }
    public function store(UserRequest $request, $role){
        $this->UserServices->createUser($request,$role);
        return redirect()->route('student.index',$role)->with('message','Successfully Created');
    }
    public function edit($role,$id)
    {
        return view("admin.users.edit",['student'=>$this->UserServices->getUserById($id),'role'=>$role]);
    }
    public function update($role,$id,UserRequest $re)
    {
        $this->UserServices->updateUser($id,$re);
        return redirect()->route('student.index',$role)->with('message','Successfully Updated');
    }
    function delete($role,$id)
    {
        $this->UserServices->deleteUser($id);
        return redirect()->route('student.index',$role)->with('message','Successfully Deleted');
    }
}
