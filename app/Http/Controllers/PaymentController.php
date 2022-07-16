<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Good;
use Exception;
use phpDocumentor\Reflection\Types\Null_;

class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/payment",
     *      summary="Get list of Payments",
     *      description="Returns list of payments",
     *      tags={"payments"},
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Payment")
     *          )
     *       )
     * )
     */



    public function index()
    {
        return Payment::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/payment",
     *      summary="New Payment",
     *      tags={"payments"},
     * 
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="good_id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="credit_card",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="buyer_email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="float"
     *                      
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     * 
     *     @OA\Response(
     *          response=400,
     *          description="Input required",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=false),
     *              @OA\Property(property="message", type="string", example="Validation errors"),
     *              @OA\Property(property="data",
     *                  @OA\Property(property="good_id",type="array",@OA\Items(type="string", example="The good id field is required.")),
     *                  @OA\Property(property="credit_card",type="array",@OA\Items(type="string", example="The credit card field is required.")),
     *                  @OA\Property(property="buyer_email",type="array",@OA\Items(type="string", example="The buyer email field is required.")),
     *                  @OA\Property(property="price",type="array",@OA\Items(type="string", example="The price field is required.")),
     * 
     *              ),
     * 
     * 
     *          )
     *     )
     * )
     */


    public function store(StorePaymentRequest $request)
    {

        try {
            $good = Good::find($request->good_id);

            if ($good == null) {
                throw new Exception('Good not exist');
            }
            if ($this->validateCC($request->credit_card) == false) {
                throw new Exception('Not Valid Credit Card');
            }
            $payment = Payment::create($request->all());
            return $payment;
        } catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 404);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/payment/{id}",
     *      summary="Get Payment by Id",
     *      description="Return payment by id",
     *      tags={"payments"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id to return",
     *         required=true,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 format="int64"
     *             )
     *         )
     *     ),
     * 
     *      @OA\Response(
     *          response=404,
     *          description="Payment Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Payment Not Found")
     * 
     *          )
     *          
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Payment")
     *          
     *       ),
     * 
     * )
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        if (empty($payment)) {
            return response()->json([
                "message" => "Payment Not Found"
            ], 404);
        }


        return  $payment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }


    function validateCC(string $number): bool
    {
        $sum = 0;
        $flag = 0;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $add = $flag++ & 1 ? $number[$i] * 2 : $number[$i];
            $sum += $add > 9 ? $add - 9 : $add;
        }

        return $sum % 10 === 0;
    }
}
