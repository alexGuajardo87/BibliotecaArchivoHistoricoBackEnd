<?php

namespace App\Traits;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PersonalAccessToken;
use Str;


trait ApiResponser
{
    /**
     *  Build a success response
     * @param string|array $data
     * @param int $code
     * @param Illuminate\Http\JsonResponse
     */

    public function successResponse($data,$code = Response::HTTP_OK)
    {
        $response = Response()->json(['datos' => $data], $code);
        return $response->getContent();
    }

    /**
     *
     * @param string $message
     * @param int $code
     * @param Illuminate\Http\JsonResponse
     */

    public function errorResponse($mensaje,$code)
    {
      if($code == 401 ||  $code == 404){
         $response = Response()->json(['error' => $mensaje ,'code' => $code], $code);
      }

      $response = Response()->json(['error' => $mensaje,'code' => $code], $code);

      return $response->getContent();
    } 


}

?>
