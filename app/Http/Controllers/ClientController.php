<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClient;
use App\Http\Requests\UpdateClient;
use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::where('branch_id', auth()->user()->branch_id)->get();

        return view('client.index', compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * @param StoreClient $request
     * @return mixed
     */
    public function store(StoreClient $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->data();

            $client = Client::create($data);
        });

        return redirect()->route('client.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Client' ]));
    }

    /**
     * @param Client $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Client $client)
    {
        if ($client->branch_id == auth()->user()->branch_id)
        {
            return view('client.edit', compact('client'));
        }
        else
        {
            return view('client.index');
        }
    }

    /**
     * @param UpdateClient $request
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateClient $request, Client $client)
    {
        if ($client->branch_id == auth()->user()->branch_id)
        {
            DB::transaction(function () use ($request, $client) {
                $data = $request->data();

                $client->update($data);
            });

            return redirect()->route('client.index')->with('success', trans('messages.update_success', [ 'entity' => 'Client' ]));
        }
        else
        {
            return redirect()->route('client.index')->with('warning', trans('messages.update_success', [ 'entity' => 'Client' ]));
        }
    }

    /**
     * @param Client $client
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Client' ]));
    }

    /**
     * @param int $user_branch
     * @return mixed
     */
    public function clientList($user_branch = 1)
    {
        return DataTables::of(Client::where('branch_id', $user_branch)->get()->flatten())
            ->addColumn('actions', function ($item)
            {
                $actions = '<a role="button" class="btn btn-xs btn-flat btn-primary"  href="' . route('client.edit', $item->id) . '" target="_blank">Edit</a>';
                $actions .= '<a role="button" class="btn btn-xs btn-flat btn-primary item-delete" href="' . route('client.destroy', $item->id) . '" target="_blank">DELETE</a>';

                return $actions;
            })->make(true);
    }
}
