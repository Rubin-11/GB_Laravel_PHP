<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Models\User;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Http\Request;
//
//class ProfileController extends Controller
//{
//    public function update(Request $request, User $users)
//    {
//        $user = Auth::user();
//        if($request->isMethod('post')) {
//            $this->validate($request, $this->validateRules(), [], $this->attributesName());
//dd($wq = $users->find($request->post('users')));
//            $errors = [];
//            if (Hash::check($request->post('password'), $user->password)) {
//                $user->fill([
//                    'name' => $request->post('name'),
//                    'password' => Hash::make($request->post('newPassword')),
//                    'email' => $request->post('email'),
//                    'is_admin' => $request->post('is_admin'),
//                ]);
//                dd($user);
//                $user->save();
//            } else {
//
//                $errors['password'][] = 'Неверно введенный пароль';
//            }
//
//            return redirect()->route('updateProfile')->withErrors($errors);
//        }
////        dd($users->all());
//        return view('admin.profile', [
//            'user' => $users->all(),
//        ]);
//    }
//    protected function validateRules()
//    {
//        return [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255',],
//            'password' => ['required'],
//            'newPassword' => ['required', 'string', 'min:8'],
//        ];
//    }
//    protected function attributesName()
//    {
//        return [
//            'newPassword' => 'Новый пароль'
//        ];
//    }
//}
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributesName());

            $errors = [];
            if (Hash::check($request->password, $user->password)) {
                $selectedUserId = $request->user_id;
                $selectedUser = User::find($selectedUserId);
                if ($selectedUser) {
                    $selectedUser->name = $request->name;
                    $selectedUser->email = $request->email;
                    $selectedUser->is_admin = $request->is_admin;
                    if ($request->newPassword) {
                        $selectedUser->password = Hash::make($request->newPassword);
                    }
                    $selectedUser->save();
                } else {
                    $errors['user_id'][] = 'Пользователь не найден';
                }
            } else {
                $errors['password'][] = 'Неверно введенный пароль';
            }

            if (count($errors) > 0) {
                return redirect()->back()->withErrors($errors);
            } else {
                return redirect()->back()->with('success', 'Данные пользователя успешно обновлены');
            }
        }

        $users = User::all();

        return view('admin.profile', [
            'users' => $users,
        ]);
    }

    protected function validateRules()
    {
        return [
            'user_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
            'newPassword' => ['nullable', 'string', 'min:8'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    protected function attributesName()
    {
        return [
            'newPassword' => 'Новый пароль',
            'is_admin' => 'Роль пользователя',
        ];
    }
}
