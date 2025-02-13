<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Flag;
use App\Models\Unit;
use App\Services\UnitService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class UnitController extends Controller
{
    private UnitService $unitService;
    private Unit $unitModel;
    private Flag $flagModel;

    public function __construct(
        Unit $unitModel,
        Flag $flagModel,
        UnitService $unitService
    ) {
        $this->unitModel = $unitModel;
        $this->flagModel = $flagModel;
        $this->unitService = $unitService;
    }

    /**
     * Display a listing of the units.
     *
     * @return View
     */
    public function index(): View
    {
        $units = $this->unitModel::all();

        return view('painel.units.index', [
            'dados' => $units,
            'colunas' => [
                'id',
                'trade_name',
                'corporate_name',
                'cnpj',
                'flag_id',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    /**
     * Show the form for creating a new unit.
     *
     * @return View
     */
    public function create(): View
    {
        $flags = $this->flagModel::all();
        return view('painel.units.create', compact('flags'));
    }

    /**
     * Store a newly created unit.
     *
     * @param UnitRequest $request
     * @return RedirectResponse
     */
    public function store(UnitRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->unitService->create($data);

            return redirect()->route('units.create')
                ->with('success', 'Unidade cadastrada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('units.create')
                ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified unit.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $unit = $this->unitModel->with('flag')->findOrFail($id);
        $flags = $this->flagModel::all();

        return view('painel.units.edit', compact('unit', 'flags'));
    }

    /**
     * Show the form for editing the specified unit.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $unit = $this->unitModel->findOrFail($id);
        $flags = $this->flagModel::all();

        return view('painel.units.edit', compact('unit', 'flags'));
    }

    /**
     * Update the specified unit.
     *
     * @param UnitRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UnitRequest $request, string $id): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->unitService->update($data, $id);

            return redirect()->route('units.show', ['unit' => $id])
                ->with('success', 'Unidade atualizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('units.edit', ['unit' => $id])
                ->with('error', 'Erro ao atualizar a unidade: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified unit.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $this->unitService->delete($id);

            return redirect()->route('units.index')
                ->with('success', 'Unidade excluída com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('units.index')
                ->with('error', 'Erro ao excluir a unidade: ' . $e->getMessage());
        }
    }
}
