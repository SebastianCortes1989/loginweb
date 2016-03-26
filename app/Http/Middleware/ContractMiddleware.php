<?php

namespace App\Http\Middleware;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use Closure, \Auth;

class ContractMiddleware
{
    protected $employee;

    public function __construct(Employee $employee)
    {
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
        $employees = $this->employee->getCmb();    

        if(count($employees) == 0)
        {
            abort(403, 'No existen trabajadores con contrato vigente.');
        }

        return $next($request);
    }
}
