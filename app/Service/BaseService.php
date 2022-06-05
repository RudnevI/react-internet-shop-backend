<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseService {

    private $model;


    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }

    public function getAll() {
        return ($this->getModel())::paginate(20);


    }

    public function filter($criteria) {

        return ($this->model)::where(function ($query) use($criteria) {
            $this->criteriaCallback($query, $criteria);
        })->paginate(20);
    }

    public function filterByRelationCriteria($relation, $criteria) {
        return ($this->model)::whereHas($relation, function($query) use($criteria) {
            $this->criteriaCallback($query, $criteria);
        });
    }

    private function criteriaCallback($query, $criteria) {
        foreach($criteria as $criteriaElement) {
            $query->where($criteriaElement['column'], $criteriaElement['operation'], $criteriaElement['value']);
        }
    }

    public function search($value) {
        return Product::where('product_name', 'like', '%'.$value.'%')->paginate(20);
    }


}
