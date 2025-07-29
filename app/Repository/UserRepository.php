<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use App\Common\Notification;

class UserRepository
{

    public $notification;

    public function __construct()
    {
        $this->notification = new Notification();
    }
    public function GetPageUser(Request $request)
    {
        $parper = 5;
        $page = $request->input('page', 1);

        $List = $this->filterUser($request);
        $count = $List->count();

        $User = $List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil($count / $parper);

        return view('admin.User.ListUser', [
            'User' => $User,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);
    }
    public function GetPageStaff(Request $request)
    {
        $parper = 5;
        $page = $request->input('page', 1);

        $List = $this->filterAdmin($request);
        $count = $List->count();

        $User = $List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil($count / $parper);

        return view('admin.User.ListUser', [
            'User' => $User,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);

    }

    public function LockAcount($id)
    {
        $id = User::findOrFail($id);
        if ($id) {
            $id->update([
                'status' => 'Lock'
            ]);
            if ($id->role == config('contast.Admin')) {
                return redirect()->route('GetPageUser');
            } else {
                return redirect()->route('GetPageStaff');
            }
        }

    }
    public function UnLockAcount($id)
    {
        $id = User::findOrFail($id);
        if ($id) {
            $id->update([
                'status' => 'active'
            ]);
            if ($id->role == config('contast.User')) {
                return redirect()->route('GetPageUser');
            } else {
                return redirect()->route('GetPageStaff');
            }
        }
    }


    public function DetailAcount($id)
    {
        $IdAccount = User::findOrFail($id);
        return view('admin.User.EditAcccount', compact('IdAccount'));
    }



    static function filterUser(Request $request)
    {
        $user = User::query()->orderByDesc('created_at')->where('role', 'user');
        if ($request->input('status')) {
            $user->where('status', $request->input('status'));

        }
        return $user;
    }

    static function filterAdmin(Request $request)
    {
        $user = User::query()->orderByDesc('created_at')->where('role', 'admin');
        if ($request->input('status')) {
            $user->where('status', $request->input('status'));

        }
        return $user;
    }

    public function UpdateAccount(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        if ($user) {
            $user->update([
                'status' => $request->input('status')
            ]);
            if ($user->role == config('contast.User')) {
                return $this->notification->Success('GetPageUser', 'cập nhật thành công');
            } else {
                return $this->notification->Success('GetPageStaff', 'cập nhật thành công');
            }

        } else {
            return $this->notification->Error('GetPageUser', 'tài khoản không tồn tại');
        }
    }
}