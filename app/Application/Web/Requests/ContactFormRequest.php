<?php

namespace App\Application\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validasi untuk form kontak.
 * Terpisah dari controller — clean validation principle.
 */
class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Form publik, semua orang boleh kirim
    }

    /**
     * Aturan validasi.
     */
    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * Pesan error kustom dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'name.required'    => __('messages.contact.validation_name_required'),
            'name.max'         => __('messages.contact.validation_name_max'),
            'email.required'   => __('messages.contact.validation_email_required'),
            'email.email'      => __('messages.contact.validation_email_email'),
            'email.max'        => __('messages.contact.validation_email_max'),
            'phone.max'        => __('messages.contact.validation_phone_max'),
            'subject.required' => __('messages.contact.validation_subject_required'),
            'subject.max'      => __('messages.contact.validation_subject_max'),
            'message.required' => __('messages.contact.validation_message_required'),
            'message.max'      => __('messages.contact.validation_message_max'),
        ];
    }
}
