<?php

namespace app\models;

use app\core\Model;


class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $message = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'message' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10]],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Your email',
            'message' => 'Enter your message',
        ];
    }

    public function send(): bool
    {
        return true;
    }
}
