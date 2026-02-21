<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestBookEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'title' => 'required|max:255',
            'message' => 'required',
            'source' => 'required|in:google,woltlab,bewerbung',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Der Name ist erforderlich.',
            'username.max' => 'Der Name darf nicht länger als 255 Zeichen sein.',

            'email.required' => 'Die E-Mail ist erforderlich.',
            'email.email' => 'Die E-Mail muss eine gültige E-Mail-Adresse sein.',
            'email.max' => 'Die E-Mail darf nicht länger als 255 Zeichen sein.',

            'title.required' => 'Der Titel ist erforderlich.',
            'title.max' => 'Der Titel darf nicht länger als 255 Zeichen sein.',

            'message.required' => 'Die Nachricht ist erforderlich.',

            'source.required' => 'Die Quelle muss angegeben werden. (Entweder Google, WoltLab oder Bewerbung)',
        ];
    }
}