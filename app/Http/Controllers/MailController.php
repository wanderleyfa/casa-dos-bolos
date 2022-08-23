<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Cake;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $cake;
    public function __construct(Cake $cake)
    {
        $this->cake = $cake;
    }

    public function sendEmail(): void
    {
        if ($this->cake->inventory > 0) {
            foreach ($this->cake->leads as $lead) {
                $email = $lead->email;

                $mailData = [
                'title' => 'O '.$this->cake->name.' voltou ao estoque!',
                'people' => $lead->name,
                'cake' => $this->cake->name,
                'value' => $this->cake->value
            ];
                Mail::to($email)->queue(new SendMail($mailData));
            }
        }
    }
}
