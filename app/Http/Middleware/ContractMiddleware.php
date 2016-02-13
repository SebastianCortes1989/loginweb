<?php

namespace App\Http\Middleware;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use Closure, \Auth;

class ContractMiddleware
{
    protected $contract;
    protected $employee;

    public function __construct(Contract $contract, Employee $employee)
    {
        $this->contract = $contract;
        $this->employee = $employee;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $contracts = $this->contract->whereClientId(Auth::user()->client_id)
                        ->whereStatus('Vigente')
                        ->lists('employee_id');
        $employees = $this->employee->whereClientId(Auth::user()->client_id)
                        ->whereIn('id', $contracts)->orderBy('name')
                        ->lists('name', 'id');

        if(count($employees) == 0)
        {
            abort(403, 'No existen trabajadores con contrato vigente.');
        }

        return $next($request);
    }
}
