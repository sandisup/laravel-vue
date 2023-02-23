<?php

namespace App\Console;
use App\Console\Carbon;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->call(function () {
            // DB::table('recent_users')->delete();
            $trans = Transaction::where('date_end','<',Carbon::now())->where('status',0)->get(); 
            foreach($trans as $tran){ 
                //insert notif 
                Notification::create( ['member_id'=>$tran->member_id, 'message' => 'Peminjaman buku melebihi batas waktu' ]); 
            } 
        })->dailyAt('08:00');
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
