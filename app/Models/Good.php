<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Good.
 *
 * @author  Shaiful Azhar <shaifulazhartalib@gmail.com>
 *
 * @OA\Schema(
 *     title="Goods",
 *     description="Goods model",
 * )
 */
class Good extends Model
{
    /**
     * @OA\Property(
     *     description="game_infomation",
     *     title="game_infomation",
     * )
     *
     * @var string
     */
    private $game_infomation ;

    /**
     * @OA\Property(
     *     description="price",
     *     title="price",
     * )
     *
     * @var float
     */
    private $price ;


    /**
     * @OA\Property(
     *     description="game_keys",
     *     title="game_keys",
     * )
     *
     * @var string
     */
    private $game_keys ;

    /**
     * @OA\Property(
     *     description="updated_at",
     *     title="updated_at",
     * )
     *
     * @var dateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     description="created_at",
     *     title="created_at",
     * )
     *
     * @var dateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     description="id",
     *     title="id",
     * )
     *
     * @var int
     */
    private $id;

    protected $fillable = [
        'game_infomation', 
        'price',
        'game_keys'
    ];
}
