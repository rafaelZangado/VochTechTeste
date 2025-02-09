<?php

namespace App\Http\Controllers;

use App\Http\Requests\EconomicGroupRequest;
use App\Models\EconomicGroup;
use App\Services\EconomicGroupService;
use Illuminate\Http\Request;

class EconomicGroupController extends Controller
{
    protected $economicGroupServices;

    public function __construct(EconomicGroupService $economicGroupServices)
    {
        $this->economicGroupServices = $economicGroupServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = EconomicGroup::all();

        return view('painel.groups.index', [
            'dados' => $grupos,
            'colunas' => ['id', 'name', 'created_at']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EconomicGroupRequest $request)
    {
        try {
            $dados = $request->validated();
            $this->economicGroupServices->create($dados);
            return redirect()->route('groups.create')
                ->with('success', 'Grupo econômico cadastrado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('groups.create')
                ->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $group = EconomicGroup::findOrFail($id);
        return view('painel.groups.edit', compact('group'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = EconomicGroup::findOrFail($id);
        return view('painel.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EconomicGroupRequest $request, int $id)
    {
        try {
            $dados = $request->validated();
            $this->economicGroupServices->update($dados, $id);
            return to_route('groups.show', ['group' => $id])
                ->with('success', 'Grupo atualizado com sucesso!');

        } catch (\Exception $e) {
            return to_route('groups.show' , ['group' => $id])
                ->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
       
        try {
            $this->economicGroupServices->delete($id);
            return redirect()->route('groups.index')
                ->with('success', 'Grupo excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('groups.index')
                ->with('error', 'Erro ao excluir o grupo econômico: ' . $e->getMessage());
        }
    }
}
