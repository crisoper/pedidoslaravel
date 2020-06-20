<?php

namespace App\Jobs;

use App\User as UserModel;
use App\Mail\Publico\ActivarcuentaempresaMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendcorreonuevousuarioJob implements ShouldQueue
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
            ->cc("gilbertofores@gmail.com")
            ->send( new  ActivarcuentaempresaMail( $this->user ) );
        } catch (\Exception $e) {
            Log::error('message', $e);
            return null;
        }
    }
}
