<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Test task ",
 *      description="Game keys marketplace"
 * )
 * @OA\Tag(
 *     name="goods",
 *     description="Goods operation",
 * )
 * 
* @OA\Tag(
 *     name="payments",
 *     description="Payments transaction",
 * )
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
