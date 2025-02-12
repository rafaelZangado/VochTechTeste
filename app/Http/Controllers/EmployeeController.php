<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Unit;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected $employeesModel;
    protected $unitModel;
    protected $employeeService;

    public function __construct(
        Employee $employeesModel,
        Unit $unitModel,
        EmployeeService $employeeService,

    )
    {
        $this->employeesModel = $employeesModel;
        $this->unitModel = $unitModel;
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('painel.employees.index', [
            'dados' => $this->employeesModel::with('unit')->get(),
            'colunas' => [
                'name',
                'email',
                'cpf',
                'unit_name',
                'created_at',
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit = $this->unitModel::all();
        return view('painel.employees.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
       
        try {
            $dados = $request->validated();

            $this->employeesModel->create($dados);
            return to_route('employees.create')
                ->with('success', 'Unidade cadastrada com sucesso!');
        }catch (\Exception $e) {
            return to_route('employees.create')
                ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados = $this->employeesModel->with('unit')->findOrFail($id);
        $units = $this->unitModel::all();

        return view(
            'painel.employees.edit',
            compact(
                'dados',
                'units'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = $this->employeesModel->with('unit')->findOrFail($id);
        $units = $this->unitModel::all();
        return view(
            'painel.employees.edit',
            compact(
                'dados',
                'units'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        try {
            $dados = $request->validated();
            $this->employeeService->update($dados, $id);
            return to_route('employees.show', ['employee' => $id])
                ->with('success', 'Unidade atualizada com sucesso!');

        } catch (\Exception $e) {
            return to_route('employees.edit', ['employee' => $id])
                ->with('error', 'Erro ao atualizar a unidade: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->employeeService->delete($id);
            return to_route('employees.index')
                ->with('success', 'Unidade excluído com sucesso!');
        } catch (\Exception $e) {
            return to_route('employees.index')
                ->with('error', 'Erro ao excluir: ' . $e->getMessage());
        }
    }
}
