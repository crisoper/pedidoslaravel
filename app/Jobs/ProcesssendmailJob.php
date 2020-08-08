<?php

namespace App\Jobs;

use App\User as UserModel;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\Publico\ActivarcuentaempresaMail;

class ProcesssendmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( UserModel $user )
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        try {
            Mail::to( $this->user->email )
            ->cc("pedidosapp.pe@gmail.com")
            ->send( new  ActivarcuentaempresaMail( $this->user ) );
        } catch (\Exception $e) {
            return null;
        }
        
    }
}
