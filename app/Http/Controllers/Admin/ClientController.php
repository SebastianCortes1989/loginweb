<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;
use App\Models\Admin\Region;
use App\Models\Admin\City;
use App\Models\Admin\Commune;
use App\Models\Admin\Compensacion;
use App\Models\Admin\Complementary;
use App\Models\Admin\Insurance;

use App\Models\Admin\User;

use \Hash;

class ClientController extends Controller
{
    protected $client;
    protected $user;

    public function __construct(Client $client, User $user)
    {
        $this->client = $client;
        $this->user = $user;
    }


    /**
     *listar clientes
     *
     *return Response
    */
    public function index()
    {
        $clients = $this->client->orderBy('name')->get();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     *crear cliente
     *
     *return Response
    */
    public function create()
    {
        $regions = Region::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        $compensacions = Compensacion::lists('name', 'id');
        $complementaries = Complementary::lists('name', 'id');
        $insurances = Insurance::lists('name', 'id');

    	return view('admin.clients.create', compact('regions', 'cities', 'communes', 'compensacions', 'complementaries', 'insurances'));
    }

    /**
     *editar cliente
     *
     *return Response
    */
    public function edit($clientId)
    {
    	return view('admin.clientes.edit');
    }


    public function store(Request $request)
    {
        $client = $this->client->create($request->except('_token'));

        $data['password'] = Hash::make($request->input('password'));
        $data['client_id'] = $client->id;
        $data['email'] = $client->email;
        $data['name'] = $client->name;
        $data['type_id'] = 1;

        $user = $this->user->create($data);

        return redirect()->back();
    }
}
