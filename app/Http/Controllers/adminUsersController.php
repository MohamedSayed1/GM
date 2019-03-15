<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 3/13/2019
 * Time: 12:26 AM
 */

namespace App\Http\Controllers;


use App\gm\users\Model\user_group;
use App\gm\users\Services\UserServices;
use Illuminate\Http\Request;

class adminUsersController extends Controller
{
    // connected with User Serivice

    private $userServices;

    public function __construct()
    {
        $this->userServices = new UserServices();
    }

    public function viewUser()
    {
        $users = $this->userServices->getAllUsers();

        return view('admin.user.index')
            ->with('users', $users)
            ->with('title', 'إداره المستخدمين');
    }

    // add view
    public function addView()
    {
        $groups = user_group::get();

        return view('admin.user.add')
            ->with('groups', $groups)
            ->with('title', 'اضافه مستخدم جديد');
    }

    public function processAdd(Request $request)
    {
        $data = $request->all();

        if ($this->userServices->addNewUser($data))
            return redirect('dashboard/admin/users')
                ->with('$massage', 'تم اضافه مستخدم بنجاح');


        $errors = $this->userServices->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

    public function updatedView($id)
    {
        $users = $this->userServices->getuserByid($id);

        if (!empty($users)) {
            $groups = user_group::get();
            return view('admin.user.updated')
                ->with('groups', $groups)
                ->with('users', $users)
                ->with('title', 'تعديل المستخدم');
        }

        return redirect()
            ->back()
            ->with('$errors', ' برجاء اختيار مستخدم موجود بالفعل حتي نتمكن من مساعدتك');
    }

    public function updatedProcess(Request $request)
    {
        $data = $request->all();

        if($this->userServices->updated($data))
            return redirect('dashboard/admin/users')
                ->with('$massage','تم تعديل المستخدم بنجاح');



        $errors = $this->userServices->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

    public function updatedPassView($id)
    {
        $users = $this->userServices->getuserByid($id);

        if (!empty($users)) {
            return view('admin.user.updatedpassword')
                ->with('users', $users)
                ->with('title', 'تعديل كلمه مرور المستخدم');
        }

        return redirect()
            ->back()
            ->with('$errors', ' برجاء اختيار مستخدم موجود بالفعل حتي نتمكن من مساعدتك');
    }

    public function updatedPassProcess(Request $request)
    {
        $data = $request->all();

        if($this->userServices->updatedPassw($data))
            return redirect('dashboard/admin/users')
                ->with('$massage','تم تعديل المستخدم بنجاح');



        $errors = $this->userServices->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

}