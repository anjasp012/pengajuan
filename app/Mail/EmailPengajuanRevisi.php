<?php

namespace App\Mail;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPengajuanRevisi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pengajuan $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->pengajuan->user->email)
            ->to($this->pengajuan->manager->email)
            ->subject('Revisi Pengajuan discount '.$this->pengajuan->user->user_name. ' atas produk ' .$this->pengajuan->produk->nama_produk)
            ->view('email.pengajuan')->with('data', $this->pengajuan);
    }
}
