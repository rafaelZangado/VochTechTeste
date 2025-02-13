<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlagRequest;
use App\Models\EconomicGroup;
use App\Models\Flag;
use App\Services\FlagsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

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
     * @return View
     */
    public function index(): View
    {
        return view('painel.flags.index', [
            'dados' => $this->flagModel::all(),
            'colunas' => ['id', 'name', 'created_at']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $economicGroups = $this->economicGroup::all();
        return view('painel.flags.create',compact('economicGroups'));
    }

    /**
     * Store a newly created resource in storage.
     * @param FlagRequest $request
     * @return RedirectResponse
     */
    public function store(FlagRequest $request): RedirectResponse
    {
        try {
            $dados = $request->validated();
            $this->flagsService->create($dados);
            return to_route('flags.create')
                ->with('success', 'Bandeira cadastrada com sucesso!');

        } catch (Exception $e) {
            return to_route('flags.create')
                ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *  @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $dados = $this->flagModel->find($id);
        $economicGroups = $this->economicGroup::all();
        return view('painel.flags.edit', compact('dados', 'economicGroups'));
    }

   /**
     * Show the form for editing the specified unit.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $dados = $this->flagModel::findOrFail($id);
        $economicGroups = EconomicGroup::all();
        return view('painel.flags.edit', compact('dados', 'economicGroups'));
    }

    /**
     * Update the specified unit.
     *
     * @param FlagRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(FlagRequest $request, int $id):RedirectResponse
    {
        try {
            $dados = $request->validated();
            $this->flagsService->update($dados, $id);
            return to_route('flags.show', ['flag' => $id])
                ->with('success', 'Grupo atualizado com sucesso!');

        } catch (Exception $e) {
            return to_route('flags.show' , ['flag' => $id])
                ->with('error', 'Erro ao cadastrar o grupo econômico: ' . $e->getMessage());
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
            $this->flagsService->delete($id);
            return to_route('flags.index')
                ->with('success', 'Bandeira excluído com sucesso!');
        } catch (Exception $e) {
            return to_route('flags.index')
                ->with('error', 'Erro ao excluir: ' . $e->getMessage());
        }
    }
}
