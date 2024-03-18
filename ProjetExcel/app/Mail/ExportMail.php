<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;

class ExportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $excelPath;
    public $pdfPath;
    public $firstName;
    public $lastName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($excelPath, $pdfPath, $firstName, $lastName)
    {
        $this->excelPath = $excelPath;
        $this->pdfPath = $pdfPath;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->view('Client.export')
            ->subject('Fichiers exportés pour ' . $this->firstName . ' ' . $this->lastName);

        if ($this->excelPath) {
            $excelContents = file_get_contents($this->excelPath);
            $message->attachData($excelContents, 'exportExcel.xlsx', [
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ]);
        }

        if ($this->pdfPath) {
            $pdfContents = file_get_contents($this->pdfPath);
            $message->attachData($pdfContents, 'exportPdf.pdf', [
                'mime' => 'application/pdf'
            ]);
        }

        return $message;
    }
}
