<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    public function getUsers($role)
    {
        return  user::get()->where("role",$role);
    }
    public function getUserById($id)
    {
        return   user::find($id);
    }
    public function createUser($re,$role){
        $image = $re->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $imageName, 'public');
        $st = array_merge($re->toArray(), ['image' => $imageName] );
        $st['role'] = $role;
        user::create($st);
    }
    public function updateUser($id, $re){
        $user = user::find($id);
        $imageName = $user->image;
        if($re->file('image')){
            $image = $re->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if ($imageName && Storage::disk('public')->exists('images/' .$user->image)) {
                Storage::disk('public')->delete('images/' . $user->image);
            }
            $image->storeAs('images', $imageName, 'public');
        }
        $pass =  $user->password;
        if($re->password != null ) $pass = $re->password;
        $st = array_merge($re->toArray(), ['image' => $imageName,'password' => $pass] );
        $user->update($st);
    }
    public function deleteUser($id)
    {
       return $this->getUserById($id)->delete();
    }
}
