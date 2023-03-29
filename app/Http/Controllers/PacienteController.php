<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PacienteService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{

    private $pacienteService;

    public function __construct(PacienteService $pacienteService){
        $this->pacienteService = $pacienteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $pacientes = $this->pacienteService->getPacientes();
            DB::commit();
            return response()->json($pacientes);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json('Ocorreu um problema na solicitação!');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $validateSavePaciente = $this->pacienteService->validateSavePaciente($request->all());

            if(!$validateSavePaciente && !is_array($validateSavePaciente)){
                return response()->json($validateSavePaciente);
            }
            $this->pacienteService->savePaciente($request->all());
            DB::commit();
            return response()->json(['return' => 'Paciente cadastrado com sucesso!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            Log::error($th);
            return response()->json('Ocorreu um problema na solicitação!');
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

        try {
            DB::beginTransaction();
            if(!$id){
                throw new \Exception('Campo ID necessário para a busca');
            }
            $paciente = $this->pacienteService->getPacienteById($id);
            DB::commit();
            return response()->json($paciente);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json('Ocorreu um problema na solicitação!');
        }

        
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
        try {
            DB::beginTransaction();

            $validateSavePaciente = $this->pacienteService->validateSavePaciente($request->all());

            if(!$validateSavePaciente && !is_array($validateSavePaciente)){
                return response()->json($validateSavePaciente);
            }
            $this->pacienteService->updatePaciente($request->all(), $id);
            DB::commit();
            return response()->json(['return' => 'Paciente atualizado com sucesso!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            Log::error($th);
            return response()->json('Ocorreu um problema na solicitação!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            if(!$id){
                throw new \Exception('Campo ID necessário para a exclusão');
            }
            $this->pacienteService->deletePaciente($id);
            DB::commit();
            return response()->json(['return' => 'Paciente excluido com sucesso!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            Log::error($th);
            return response()->json('Ocorreu um problema na solicitação!');
        }
    }
}
