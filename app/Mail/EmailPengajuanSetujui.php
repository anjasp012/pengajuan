<?php

namespace App\Mail;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPengajuanSetujui extends Mailable
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
            ->from($this->pengajuan->manager->email)
            ->to($this->pengajuan->user->email)
            ->subject('Pengajuan Disetujui '.$this->pengajuan->manager->user_name. ' atas produk ' .$this->pengajuan->produk->nama_produk)
            ->view('email.pengajuansetujui')->with('data', $this->pengajuan);
    }
}
