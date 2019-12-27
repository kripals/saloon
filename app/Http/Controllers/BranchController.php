<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranch;
use App\Http\Requests\UpdateBranch;
use App\Model\Branch;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $branches = Branch::all();

        return view('branch.index', compact('branches'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('branch.create');
    }

    /**
     * @param StoreBranch $request
     * @return mixed
     */
    public function store(StoreBranch $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $branch = Branch::create($data);
        });
        return redirect()->route('branch.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Branch' ]));
    }

    /**
     * @param Branch $branch
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Branch $branch)
    {
        return view('branch.show',compact('branch'));
    }

    /**
     * @param Branch $branch
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Branch $branch)
    {
        return view('branch.edit',compact('branch'));
    }

    /**
     * @param UpdateBranch $request
     * @param Branch $branch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBranch $request, Branch $branch)
    {
        DB::transaction(function () use ($request, $branch)
        {
            $data = $request->data();

            $branch->update($data);
        });

        return redirect()->route('branch.index')->with('success', trans('messages.update_success', ['entity' => 'Branch']));
    }

    /**
     * @param Branch $branch
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Branch' ]));
    }
}
