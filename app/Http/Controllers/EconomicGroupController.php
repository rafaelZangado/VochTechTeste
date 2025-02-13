<?php

namespace App\Http\Controllers;

use App\Http\Requests\EconomicGroupRequest;
use App\Models\EconomicGroup;
use App\Services\EconomicGroupService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class EconomicGroupController extends Controller
{
    private EconomicGroupService $economicGroupService;

    public function __construct(EconomicGroupService $economicGroupService)
    {
        $this->economicGroupService = $economicGroupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $economicGroups = EconomicGroup::all();

        return view('painel.groups.index', [
            'dados' => $economicGroups,
            'colunas' => ['id', 'name', 'created_at']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('painel.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EconomicGroupRequest $request
     * @return RedirectResponse
     */
    public function store(EconomicGroupRequest $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();
            $this->economicGroupService->create($validatedData);

            return to_route('groups.create')
                ->with('success', 'Grupo econômico cadastrado com sucesso!');
        } catch (Exception $e) {
            return to_route('groups.create')
                ->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $economicGroup = EconomicGroup::findOrFail($id);

        return view('painel.groups.edit', compact('economicGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $economicGroup = EconomicGroup::findOrFail($id);

        return view('painel.groups.edit', compact('economicGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EconomicGroupRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EconomicGroupRequest $request, int $id): RedirectResponse
    {
        try {
            $validatedData = $request->validated();
            $this->economicGroupService->update($validatedData, $id);

            return to_route('groups.show', ['group' => $id])
                ->with('success', 'Grupo atualizado com sucesso!');
        } catch (Exception $e) {
            return to_route('groups.show', ['group' => $id])
                ->with('error', 'Erro ao atualizar o grupo econômico: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->economicGroupService->delete($id);

            return to_route('groups.index')
                ->with('success', 'Grupo excluído com sucesso!');
        } catch (Exception $e) {
            return to_route('groups.index')
                ->with('error', 'Erro ao excluir o grupo econômico: ' . $e->getMessage());
        }
    }
}
