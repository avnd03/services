<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function index()
    {
        return view('auth/login');
    }

    public function loginCheck(){
      $username = trim($this->request->getPost('username'));
      $password = trim($this->request->getPost('password'));
      $user = model(UserModel::class);
  		$thisUser = $user->where('username', $username)->first();
      if(!$thisUser) {
        echo '901';
        exit;
      }
      if ($thisUser['status'] != '1') {
        echo '902';
        exit;
      }
      if ( ! password_verify($password, $thisUser['password']) )
  		{
        echo '903';
        exit;
  		}
      $session = session();
      $session->set('isLoggedIn', true);
      $session->set('userData', [
        'id'    => $thisUser["id"],
        'name' 	=> $thisUser["username"],
        'role' 	=> $thisUser["role_id"]
      ]);
      echo '900';
    }

    public function logout(){
      $session = session();
      $session->remove('isLoggedIn');
      $session->remove('userData');
      return redirect()->route('login');
    }
}
