<?php

namespace App\Http\Requests;

class BrandCatalogRequest extends CatalogRequest {

    protected $entity = [
        'name' => 'brand',
        'table' => 'brands'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return parent::authorize();
    }

    public function rules() {
        return parent::rules();
    }

    protected function createItem() {
        $rules = [];
        return array_merge(parent::createItem(), $rules);
    }

    protected function updateItem() {
        $rules = [];
        return array_merge(parent::updateItem(), $rules);
    }
}
