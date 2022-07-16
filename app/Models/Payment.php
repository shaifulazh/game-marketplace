<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Payment.
 *
 * @author  Shaiful Azhar <shaifulazhartalib@gmail.com>
 *
 * @OA\Schema(
 *     title="Payment",
 *     description="Payment Model",
 * )
 */

// {
//     "id": 1,
//     "good_id": "1",
//     "credit_card": "123455",
//     "buyer_email": "email@any.com",
//     "price": 12.3,
//     "created_at": "2022-07-15T13:13:24.000000Z",
//     "updated_at": "2022-07-15T13:13:24.000000Z"
//   },
class Payment extends Model
{
    /**
     * @OA\Property(
     *     description="id",
     *     title="id",
     * )
     *
     * @var int
     */
    private $id;
    /**
     * @OA\Property(
     *     description="good id",
     *     title="good id",
     * )
     *
     * @var string
     */
    private $good_id;


    /**
     * @OA\Property(
     *     description="credit_card",
     *     title="credit_card",
     * )
     *
     * @var string
     */
    private $credit_card;

    /**
     * @OA\Property(
     *     description="buyer_email",
     *     title="buyer_email",
     * )
     *
     * @var string
     */
    private $buyer_email;

    /**
     * @OA\Property(
     *     description="price",
     *     title="price",
     * )
     *
     * @var float
     */
    private $price;    

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
     *     description="updated_at",
     *     title="updated_at",
     * )
     *
     * @var dateTime
     */
    private $updated_at;  
    
    protected $fillable = [
        'good_id', 
        'credit_card',
        'buyer_email',
        'price'
    ];
}
