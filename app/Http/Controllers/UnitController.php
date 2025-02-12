<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Flag;
use App\Models\Unit;
use App\Services\UnitService;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitService;
    protected $unitModel;
    protected $flagModel;

    public function __construct(
        Unit $unitModel,
        Flag $flagModel,
        UnitService $unitService
    )
    {
        $this->unitModel = $unitModel;
        $this->flagModel = $flagModel;
        $this->unitService = $unitService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('painel.units.index', [
            'dados' => $this->unitModel::all(),
            'colunas' => [
                'id',
                'trade_name',
                'corporate_name',
                'cnpj',
                'flag_id',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flags = $this->flagModel::all();
        return view('painel.units.create', compact('flags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request)
    {
        try {
            $dados = $request->validated();
            $this->unitModel->create($dados);
            return to_route('units.create')
                ->with('success', 'Unidade cadastrada com sucesso!');
        }catch (\Exception $e) {
            return to_route('units.create')
                ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados = $this->unitModel->with('flag')->findOrFail($id);
        $flags = $this->flagModel::all();

        return view(
            'painel.units.edit',
            compact(
                'dados',
                'flags'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = $this->unitModel->find($id);
        $flags = $this->flagModel::all();
        return view(
            'painel.units.edit',
            compact(
                'dados',
                'flags'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, string $id)
    {
        try {
            $dados = $request->validated();
            $this->unitService->update($dados, $id);

            return to_route('units.show', ['unit' => $id])
                ->with('success', 'Unidade atualizada com sucesso!');

        } catch (\Exception $e) {
            return to_route('units.edit', ['unit' => $id])
                ->with('error', 'Erro ao atualizar a unidade: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->unitService->delete($id);
            return to_route('units.index')
                ->with('success', 'Unidade excluído com sucesso!');
        } catch (\Exception $e) {
            return to_route('units.index')
                ->with('error', 'Erro ao excluir: ' . $e->getMessage());
        }
    }
}
