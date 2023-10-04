<?php

namespace App\Http\Requests;

class ProductCatalogRequest extends CatalogRequest {

    protected $entity = [
        'name' => 'product',
        'table' => 'products'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return parent::rules();
    }

    protected function createItem() {
        $rules = [
            'category_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric',
                'min:1'
            ],
        ];
        return array_merge(parent::createItem(), $rules);
    }

    protected function updateItem() {
        $rules = [
            'category_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric',
                'min:1'
            ],
        ];
        return array_merge(parent::updateItem(), $rules);
    }
}
