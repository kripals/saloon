<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Model\Branch;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('branch_id', auth()->user()->branch_id)->get();

        return view('user.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $branches = Branch::where('id', auth()->user()->branch_id)->pluck('location', 'id');

        return view('user.create', compact('branches'));
    }

    /**
     * @param StoreUser $request
     * @return mixed
     */
    public function store(StoreUser $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->data();

            $user = User::create($data);
        });

        return redirect()->route('user.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'User' ]));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ($user->branch_id == auth()->user()->branch_id)
        {
            $branches = Branch::where('id', auth()->user()->branch_id)->pluck('location', 'id');

            return view('user.edit', compact('user', 'branches'));
        }
        else
        {
            return view('user.index');
        }
    }

    /**
     * @param UpdateUser $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        if ($user->branch_id == auth()->user()->branch_id)
        {
            DB::transaction(function () use ($request, $user) {
                $data = $request->data();

                $user->update($data);
            });

            return redirect()->route('user.index')->with('success', trans('messages.update_success', [ 'entity' => 'User' ]));
        }
        else
        {
            return redirect()->route('user.index')->with('warning', trans('messages.update_success', [ 'entity' => 'User' ]));
        }
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'User' ]));
    }
}
