<?php

namespace App\Http\Requests\Horensou;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorensouRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'doc_no' => 'required',
            'department' => 'required',
            'section' => 'required',
            'shop' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'part_name' => 'required',
            'point_problem' => 'required',
            'detail_problem' => 'required',
            // 'request_by' => 'required',
            // 'approve_by' => 'required',
            // 'shop_status' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rule.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function messages(): array
    {
        return  [
            'department.required' => 'Department belum dipilih',
            'section.required' => 'Section belum dipilih',
            'shop.required' => 'Shop belum dipilih',
            'category.required' => 'Kategori belum dipilih',
            'priority.required' => 'Skala prioritas belum dipilih',
            'part_name.required' => 'Part name tidak boleh kosong',
            'point_problem.required' => 'Point problem tidak boleh kosong',
            'detail_problem.required' => 'Detail problem tidak boleh kosong',
            // 'request_by.required' => 'required',
            // 'approve_by.required' => 'required',
            // 'shop_status.required' => 'required',
        ];
    }
}
