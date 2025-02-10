<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlagRequest;
use App\Models\EconomicGroup;
use App\Models\Flag;
use App\Services\FlagsService;

class FlagController extends Controller
{
    protected $flagModel;
    protected $flagsService;
    protected $economicGroup;

    public function __construct(
        Flag $flagModel,
        EconomicGroup $economicGroup,
        FlagsService $flagsService,
    )
    {
        $this->flagModel = $flagModel;
        $this->economicGroup = $economicGroup;
        $this->flagsService = $flagsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('painel.flags.index', [
            'dados' => $this->flagModel::all(),
            'colunas' => ['id', 'name', 'created_at']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $economicGroups = $this->economicGroup::all();
        return view('painel.flags.create',compact('economicGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlagRequest $request)
    {

        try {
            $dados = $request->validated();
            $this->flagsService->create($dados);
            return redirect()->route('flags.create')
                ->with('success', 'Bandeira cadastrada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('flags.create')
                ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados = $this->flagModel->find($id);
        $economicGroups = $this->economicGroup::all();
        return view('painel.flags.edit', compact('dados', 'economicGroups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = $this->flagModel::findOrFail($id);
        $economicGroups = EconomicGroup::all();
        return view('painel.flags.edit', compact('dados', 'economicGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlagRequest $request, int $id)
    {
        try {
            $dados = $request->validated();
            $this->flagsService->update($dados, $id);
            return to_route('flags.show', ['flag' => $id])
                ->with('success', 'Grupo atualizado com sucesso!');

        } catch (\Exception $e) {
            return to_route('flags.show' , ['flag' => $id])
                ->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->flagsService->delete($id);
            return redirect()->route('flags.index')
                ->with('success', 'Bandeira excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('flags.index')
                ->with('error', 'Erro ao excluir: ' . $e->getMessage());
        }
    }
}
