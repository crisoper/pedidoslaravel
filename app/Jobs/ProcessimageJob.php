<?php

namespace App\Jobs;

use App\Models\Admin\Productofoto as ProductImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;

class ProcessimageJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  protected $imagen;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(ProductImage $image)
  {
    $this->imagen = $image;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $image = $this->imagen;
    $full_image_path = public_path('/images/' . $image->nombre);
    $resized_image_path = storage_path('app/public/img_productos') . '/' . $image->nombre;
    $img = Image::make($full_image_path)->resize(300, 270);
    $img->save($resized_image_path);
  }
}
