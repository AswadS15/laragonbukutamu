<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengunjungRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'instansi' => 'required',
            'alamat' => 'required',
            'hp' => ['required', 'regex:/^08[0-9]{9,}$/'],
            'divisi' => 'required',
            'data' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Kolom Nama wajib diisi.',
            'instansi.required' => 'Kolom Instansi wajib diisi.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
            'hp.required' => 'Kolom Nomor HP wajib diisi.',
            'hp.regex' => 'Format Nomor HP tidak valid. Pastikan dimulai dengan 08 dan memiliki minimal 9 digit angka.',
            'divisi.required' => 'Kolom Divisi wajib diisi.',
            'data.required' => 'Kolom Data wajib diisi.'
        ];
    }
}
