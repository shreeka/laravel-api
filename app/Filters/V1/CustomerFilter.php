<?php

namespace App\Services\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends ApiFilter
{
    // query eg -> /api/customers?postalCode[lt]=10000
   protected $safeParams = [
       'name' => ['eq'],
       'type' => ['eq'],
       'email' => ['eq'],
       'address' => ['eq'],
       'city' => ['eq'],
       'state' => ['eq'],
       'postalCode' => ['eq','gt','lt','gte','lte']
       ];

   protected $columnMap = [
       'postalCode' => 'postal_code'
   ];

   protected $operatorMap = [
     'eq' => '=',
     'gt' => '>',
     'lt' => '<',
     'gte' => '>=',
     'lte' => '<='
   ];

}
