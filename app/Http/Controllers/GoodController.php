<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodRequest;
use App\Models\Good;
use Illuminate\Http\Request;



class GoodController extends Controller

{
    /**
     * @OA\Get(
     *      path="/api/goods",
     *      summary="Get list of Goods",
     *      description="Returns list of goods",
     *      tags={"goods"},
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Good")
     *          )
     *       )
     * )
     */
    public function index()
    {
        return Good::all();
    }
    /**
     * @OA\Post(
     *      path="/api/goods",
     *      summary="Add new Goods",
     *      tags={"goods"},
     * 
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="game_infomation",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="float"
     *                 ),
     *                 @OA\Property(
     *                     property="game_keys",
     *                     type="string"
     *                 ),
     *                 example={"game_infomation": "Ancient Of Noobs", "price": 199.99, "game_keys": "SDFEJ123323213JJS"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/Good")
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Input required",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=false),
     *              @OA\Property(property="message", type="string", example="Validation errors"),
     *              @OA\Property(property="data",
     *                  @OA\Property(property="game_infomation",type="array",@OA\Items(type="string", example="The game infomation field is required.")),
     *                  @OA\Property(property="price",type="array",@OA\Items(type="string", example="The price field is required.")),
     *                  @OA\Property(property="game_keys",type="array",@OA\Items(type="string", example="The game keys field is required.")),
     * 
     *              ),
     * 
     * 
     *          )
     *     )
     * )
     */


    public function store(GoodRequest $request)
    {
        $good = Good::create($request->all());
        return $good;
    }

    /**
     * @OA\Get(
     *      path="/api/goods/{id}",
     *      summary="Find Good by id",
     *      tags={"goods"},
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
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/Good")
     *     ),
     * 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *         @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Good Not Found")
     * 
     *         )
     *     ),
     * )
     */

    public function show($id)
    {
        $good = Good::find($id);
        if (!empty($good)) {
            return response()->json($good);
        } else {
            return response()->json([
                "message" => "Good not found"
            ], 404);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/goods/{id}",
     *      summary="Update Good by id",
     *      tags={"goods"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="integer",
     *                 format="int64"
     *             )
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="game_infomation",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="float"
     *                 ),
     *                 @OA\Property(
     *                     property="game_keys",
     *                     type="string"
     *                 ),
     *                 example={"game_infomation": "Ancient Of Noobs", "price": 199.99, "game_keys": "SDFEJ123323213JJS"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/Good")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *         @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Good Not Found")
     * 
     *         )
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Input required",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=false),
     *              @OA\Property(property="message", type="string", example="Validation errors"),
     *              @OA\Property(property="data",
     *                  @OA\Property(property="game_infomation",type="array",@OA\Items(type="string", example="The game infomation field is required.")),
     *                  @OA\Property(property="price",type="array",@OA\Items(type="string", example="The price field is required.")),
     *                  @OA\Property(property="game_keys",type="array",@OA\Items(type="string", example="The game keys field is required.")),
     * 
     *              ),
     * 
     * 
     *          )
     *     )
     * )
     */

    public function update(GoodRequest $request, $id)
    {
        if (Good::where('id', $id)->exists()) {
            $good = Good::find($id);
            $good->game_infomation = is_null($request->game_infomationgame_infomation) ? $good->game_infomation : $request->game_infomation;
            $good->price = is_null($request->price) ? $good->price : $request->price;
            $good->game_keys = is_null($request->game_keys) ? $good->game_keys : $request->game_keys;
            $good->save();
            return response()->json([
                "message" => "good Updated.",
                "good" => $good
            ], 200);
        } else {
            return response()->json([
                "message" => "Good Not Found."
            ], 400);
        }
    }

    public function destroy($id)
    {
        if (Good::where('id', $id)->exists()) {
            $good = Good::find($id);
            $good->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "Good not found."
            ], 404);
        }
    }
}
