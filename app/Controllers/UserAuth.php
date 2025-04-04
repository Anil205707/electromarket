<?php namespace App\Controllers;

use App\Models\UserModel;

class UserAuth extends BaseController
{
    // Show register form
    public function register()
    {
        return view('auth/register');
    }

    // Handle register form submission
    public function registerSave()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_admin' => 0 // default to normal user
        ]);
        return redirect()->to('/login');
    }

    // Show login form
    public function login()
    {
        return view('auth/login');
    }

    // Handle login form submission
    public function loginCheck()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Only save the fields you need into the session
            session()->set([
                'user' => [
                    'id'       => $user['id'],
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'is_admin' => $user['is_admin'], // add this to session
                ]
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    // Handle logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
