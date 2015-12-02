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
use App\Models\Admin\File;

use App\Http\Requests\Admin\ClientFormRequest;

use \Hash;

class ClientController extends Controller
{
    protected $client;
    protected $user;
    protected $imageableType = 'App\Models\Admin\Client';

    public function __construct(Client $client, User $user, File $file)
    {
        $this->client = $client;
        $this->user = $user;
        $this->file = $file;
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


    public function store(ClientFormRequest $request)
    {
        $client = $this->client->create($request->except('_token'));

        $data['password'] = Hash::make($request->input('password'));
        $data['client_id'] = $client->id;
        $data['email'] = $client->email;
        $data['name'] = $client->name;
        $data['type_id'] = 1;

        $user = $this->user->create($data);

        $fileName = date('YmdHis').rand(1, 1000);
        $fileData['filename'] = $fileName;
        $fileData['name'] = $request->file('logo')->getClientOriginalName();
        $fileData['mime'] = $request->file('logo')->getClientMimeType();
        $fileData['size'] = $request->file('logo')->getClientSize();
        $fileData['imageable_id'] = $client->id;
        $fileData['imageable_type'] = $this->imageableType;

        if($request->file('logo')->move($this->file->destinationPath, $fileName)){
            //$file = $this->file->create($fileData);

            $file = $this->file;
            $file->name =  $fileData['name'];
            $file->filename =  $fileData['filename'];
            $file->mime =  $fileData['mime'];
            $file->size =  $fileData['size'];
            $file->imageable_id =  $fileData['imageable_id'];
            $file->imageable_type =  $fileData['imageable_type'];
            $file->save();
        }

        return redirect()->action('Admin\ClientController@index');
    }
}
