<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BudgetMailler extends Mailable
{
    use Queueable, SerializesModels;

    public $dateNow;
    public $formData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dateNow, $formData)
    {
        $this->dateNow = $dateNow;
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido de orçamento enviado pelo website')
                    ->from('graficafalcaoba@gmail.com')
                    ->view('mail.budget');
    }
}
