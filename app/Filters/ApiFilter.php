<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    // query eg -> /api/customers?postalCode[lt]=10000
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    /**
     * @param Request $request
     * @return array
     * Will return [column,operator,value]
     */
    public function transform(Request $request): array
    {
        $eloquentQuery = [];
        foreach($this->safeParams as $param => $operators) {
            // For context, $request->query() would give
            // ["postalCode" => ["gt" => "10000"]] and
            //  $request->query('postalCode') would give ["gt" => "10000"]

            $query = $request->query($param);
            if(isset($query)){
                $column = $this->columnMap[$param] ?? $param;
                foreach ($operators as $operator) {
                    if (isset($query[$operator])){
                        $eloquentQuery[] = [$column, $this->operatorMap[$operator],$query[$operator]];

                    }
                }
            }

        }
        return $eloquentQuery;
    }

}
