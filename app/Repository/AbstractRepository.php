<?php

 namespace App\Repository;

 use Illuminate\Database\Eloquent\Model;

 abstract class AbstractRepository
 {
     public function __construct(private Model $model)
     {
         $this->model = $model;
     }

     public function selectConditions($conditions = null)
     {
         $expressions = explode(';', $conditions);

         foreach ($expressions as $e) {
             $exp = explode(':', $e);

             $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
         }
     }

     public function selectFiltro($filters)
     {
         $this->model = $this->model->selectRaw($filters);
     }

     public function getResult($order = 'inventory')
     {
         return $this->model->orderByDesc($order);
     }
 }
