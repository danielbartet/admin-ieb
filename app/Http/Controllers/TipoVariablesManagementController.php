<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;
use App\Logic\User\CaptureIp;
use App\Http\Requests;
use App\Models\TipoVariable;


use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;

use Validator;
use Gravatar;
use Input;

class TipoVariablesManagementController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Users Management Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "Show Users", "Edit Users",
	| and "Create User" pages. This class also
    | has the method to delete a user.
    |
	*/

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

	/**
	 * Show the Users Management Main Page to the Admin.
	 *
	 * @return Response
	 */
	public function showDataCalculadorasMainPanel()
	{
        $tipos = TipoVariable::all();
        $total_tipos = \DB::table('tipo_variable')->count();

        return view('admin.pages.show-tipos', [
        		'tipos'	          => $tipos,
        		'total_tipos'      => $total_tipos
        	]
        );
	}

    
    /**
     * Get a validator for an incoming update user request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'tipo'         	=> 'required',
            'description'          => ''
        ]);
    }

    /**
     * Get a validator for an incoming create user request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create_new_validator(array $data)
    {
        return Validator::make($data, [
            'tipo'          	=> 'required',
            'description'          => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET THE VARIABLE
        $tipo           = TipoVariable::find($id);
        
        return view('admin.pages.edit-tipo', [
                'tipo' => $tipo
            ]
        )->with('status', 'Successfully updated tipo!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            'tipo'             => 'required',
        );

        $validator = $this->validator($request->all(), $rules);
        
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $tipo 				    = TipoVariable::find($id);
            $tipo->tipo            = $request->input('tipo');
            $tipo->descripcion      = $request->input('descripcion');
            $tipo->save();

            return redirect('/tipo_variable')->with('status', 'Successfully updated the tipo variable!');

        }
    }

    /**
     * Show the form for creating a new User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create-tipo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $create_new_validator = $this->create_new_validator($request->all());

        if ($create_new_validator->fails()) {
            $this->throwValidationException(
                $request, $create_new_validator
            );
        }
        else
        {
            $tipo                   = new TipoVariable;
            $tipo->tipo            = $request->input('tipo');
            $tipo->descripcion       = $request->input('descripcion');
            
            // SAVE THE USER
            $tipo->save();

            // THE SUCCESSFUL RETURN
            return redirect('/tipo_variable')->with('status', 'Successfully created tipo variable!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	// GET VARIABLE
        $tipo = TipoVariable::find($id);

        return view('admin.pages.show-tipos')->withVariable($tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE VARIABLE
        $tipo = TipoVariable::find($id);
        $tipo->delete();

        return redirect('/tipo_variable')->with('status', 'Successfully deleted the tipo variable!');
    }

}
