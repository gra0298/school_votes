<?php

namespace App\Http\Controllers;
use App\Models\{TpAuxWhiteVote};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tools\ResponseApi;

class TpAuxWhiteVoteController extends Controller
{
    protected $arrayValidate = [
        // //validate input data.
            'id_white_vote'   => 'required',
            'id_matric'   => 'required',


    ];

    public function __construct()
    {
    }




    public function create(Request $request)
    {



        $validate = Validator::make($request->all(), $this->arrayValidate);
        if ($validate->fails())
            return response()->json(ResponseApi::json($validate->errors()->toArray(), 'error', 'fallo'), 400);
        try {


            $white_vote = TpAuxWhiteVote::create($request->all());
            return response()->json(ResponseApi::json([$white_vote], 'Creación exitosa'), 201);


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al crear, # ", $e. $e->getCode()]), 400);
        }



    }

     public function view(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'id' => 'required'
        ]);
        if($validate->fails())
            return response()->json(ResponseApi::json(["id no enviado"], 'error', 'fallo', 202));


        try {
            $white_vote = TpAuxWhiteVote::find($request->id);
            if($white_vote)
                return response()->json(ResponseApi::json([$white_vote], 'Éxito al mostrar', 201));
            return response()->json(ResponseApi::json(["registro no encontrado"], 'error', 'fallo', 202));


        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
    public function list(Request $request)
    {
        try {

            $white_vote = TpAuxWhiteVote::select('id', 'id_white_vote','id_matric')->get()->toArray();
                return response()->json(ResponseApi::json([$white_vote], 'Éxito al mostrar', 201));

        } catch (\PDOException $e) {
            return response()->json(ResponseApi::json(["Error al mostrar, # ", $e .  $e->getCode()], 202));
        }


    }
}
