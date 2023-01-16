<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Transaction;
use App\Models\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            //DB::table('recent_users')->delete();
            $trans = Transaction::where('date_end','<', now())->where('status',0)->get();
            foreach($trans as $tran){
                //insert notif
                Notification::firstOrCreate(
                    ['transaction_id'=>$tran->id, 
                     'member_id'=>$tran->member_id,
                     'message' => 'Peminjaman buku melebihi batas waktu'
                    ]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
