<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;
use App\Logic\User\CaptureIp;
use App\Http\Requests;
use App\Models\DataCalculadoras;
use App\Models\TipoVariable;
use App\Models\TipoBono;
use App\Models\Cotizaciones;
use App\Models\Divisas;

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

class CalculadorasManagementController extends Controller {

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
        //$variables = \DB::table('data_calculadoras')->get();
        $variables = DataCalculadoras::all();
        $total_variables = \DB::table('data_calculadoras')->count();

        return view('admin.pages.show-calculadoras', [
        		'variables'	          => $variables,
        		'total_variables'      => $total_variables
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
            'tipo'          	=> 'required',
            'tipo_bono'          	=> '',
            'valor'         	=> 'required',
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
            'tipo_bono'          	=> '',
            'valor'         	=> 'required',
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
        $variable           = DataCalculadoras::find($id);
        
        return view('admin.pages.edit-variable', [
                'variable' => $variable
            ]
        )->with('status', 'Successfully updated variable!');

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
            'valor'              => 'required',
            'tipo'             => 'required',
            'tipo_bono'          	=> '',
        );

        $validator = $this->validator($request->all(), $rules);
        
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $variable 				    = DataCalculadoras::find($id);
            $variable->valor            = $request->input('valor');
            $variable->tipo_id          = $request->input('tipo');
            $variable->tipo_bono_id          = $request->input('tipo_bono');
            $variable->descripcion      = $request->input('descripcion');
            $variable->save();

            return redirect('/calculadoras')->with('status', 'Successfully updated the variable!');

        }
    }

    /**
     * Show the form for creating a new User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoVariable::pluck('tipo','id')->prepend('Select Tipo','');
        $tipos_bonos = TipoBono::pluck('tipo','id')->prepend('Select Tipo Bono','');
        return view('admin.pages.create-variable', [
            'tipos' => $tipos,
            'tipos_bonos' => $tipos_bonos
        ]);
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
            $tipo_bono = ($request->input('tipo_bono') == "") ? 2 : $request->input('tipo_bono');
            $variable                   = new DataCalculadoras;
            $variable->tipo_id          = $request->input('tipo');
            $variable->tipo_bono_id     = $tipo_bono;
            $variable->valor            = $request->input('valor');
            $variable->descripcion      = $request->input('descripcion');
            
            // SAVE THE USER
            $variable->save();

            // THE SUCCESSFUL RETURN
            return redirect('/calculadoras')->with('status', 'Successfully created variable!');

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
        $variable = DataCalculadoras::find($id);

        return view('admin.pages.show-variable')->withVariable($variable);
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
        try {
            $variable = DataCalculadoras::find($id);
            $variable->delete();
            return redirect('/calculadoras')->with('status', 'Successfully deleted the variable!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/calculadoras')->with('anError', 'No se puede eliminar esta variable, esta en uso!');
        }
    }

    public function showCalculadorasBonos(){
        $cotizaciones = \DB::table('cotizaciones_tiemporeal')->where('tipo', 'BONOS')->get();
        $tipoBonos = TipoBono::all();
        $tipoCalculos = \DB::table('data_calculadoras')->where('tipo_id', '10')->get();
        $monedas = \DB::table('data_calculadoras')->where('tipo_id', '3')->get();
        return view('admin.pages.calculadora-bono', [
            'cotizaciones' => $cotizaciones,
            'tipoCalculos' => $tipoCalculos,
            'tipoBonos' => $tipoBonos,
            'monedas' => $monedas
        ]);
    }

    public function showCalculadorasOpcion(){
        return view('admin.pages.calculadora-opcion');
    }

    public function showCalculadorasFuturos(){
        return view('admin.pages.calculadora-futuros');
    }

    public function showCalculadorasDivisas(){
        $divisas = Divisas::all();
        return view('admin.pages.calculadora-divisas',[
            'monedas' => $divisas
        ]);
    }

    public function showCalculadorasCubierto(){
        return view('admin.pages.calculadora-cubierto');
    }

    
    public function showCalculadorasBonosFrame(){
        $cotizaciones = \DB::table('cotizaciones_tiemporeal')->where('tipo', 'BONOS')->get();
        $tipoBonos = TipoBono::all();
        $tipoCalculos = \DB::table('data_calculadoras')->where('tipo_id', '10')->get();
        $monedas = \DB::table('data_calculadoras')->where('tipo_id', '3')->get();
        return view('admin.pages.calculadora-bono-frame', [
            'cotizaciones' => $cotizaciones,
            'tipoCalculos' => $tipoCalculos,
            'tipoBonos' => $tipoBonos,
            'monedas' => $monedas
        ]);
    }    

    public function showCalculadorasFuturosFrame(){
        return view('admin.pages.calculadora-futuros-frame');
    }

    public function showCalculadorasDivisasFrame(){
        $divisas = Divisas::all();
        return view('admin.pages.calculadora-divisas-frame',[
            'monedas' => $divisas
        ]);
    }

    public function showCalculadorasCubiertoFrame(){
        return view('admin.pages.calculadora-cubierto-frame');
    }

}
