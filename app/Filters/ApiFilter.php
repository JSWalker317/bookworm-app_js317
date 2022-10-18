<?php

namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilter {
    protected $safeParms = [];

    protected $columMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '<>'
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }
            $column = $this->columMap[$parm] ?? $parm;

            foreach($operators as $operator) {
                if(isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
 
}