<?php

namespace App\Console\Commands;

use App\Mail\SkripsiDeadlineNotification;
use App\Mail\SkripsiDeadlineNotification2;
use App\Models\Skripsi;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckSkripsiDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:kirim';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Mendapatkan tanggal sekarang
        $currentDate = Carbon::now();

        // Menghitung tanggal 4 bulan sebelumnya
        $deadlineDate = $currentDate->subMonths(4);

        // UNTUK MAHASISWA
        // Mendapatkan data skripsi dengan tgl_judul sebelum deadline dan file_skripsi masih null
        $skripsis = Skripsi::whereDate('tgl_judul', '<=', $deadlineDate)
            ->whereNull('file_skripsi')->where('email_mahasiswa', 0)
            ->get();

        foreach ($skripsis as $skripsi) {
            // Kirim email ke user yang terkait
            $mahasiswa = $skripsi->mahasiswa; // Ganti 'user' dengan relasi antara skripsi dan user di model Skripsi
            $dosen1 = $skripsi->pembimbing_1;
            $dosen2 = $skripsi->pembimbing_2;

            Mail::to($mahasiswa->email)->send(new SkripsiDeadlineNotification($skripsi));
            Mail::to($dosen1->email)->send(new SkripsiDeadlineNotification2($skripsi));
            Mail::to($dosen2->email)->send(new SkripsiDeadlineNotification2($skripsi));

            // update mail_mahasiswa ke true
            $skripsi->update(['email_mahasiswa' => 1]);
        }

        $this->info('Skripsi deadline check completed.');
    }
}
