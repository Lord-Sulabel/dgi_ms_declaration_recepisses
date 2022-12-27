<?php

namespace App\Http\Controllers\RAPPORT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class MainController extends Controller
{
    //
    public $date_exigibilite = "";
    public $impot = "";

    public function Assujettis_List(Request $request){
 
         $response = array();
 
         $validator = Validator::make($request->all(), [
             "date_exigibilite"=> 'required',
         ]);
         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }
         $impot   = 1; 
         $date_exigibilite   = $request['date_exigibilite'];
 

        //echo $date_exigibilite;
         
 
        $response = array();
 
        $late = DB::table('dgi_ms__gestion_impot_tva.dbo.assujettissements')->select('nif','assujettissement_debut','assujettissement_fin');
        $this->date_exigibilite = $date_exigibilite;
        $this->impot = $impot;

        $late = $late->where(
                    function($query){
                        $query->where('fk_impot', '=', $this->impot)
                                ->where('assujettissement_debut', '<=', $this->date_exigibilite);
                                    }
                            );
        $late = $late->where(
                function($query){
                        $query->where("assujettissement_fin","=",null)
                            ->orWhere("assujettissement_fin",">=",$this->date_exigibilite);
                                }
                            );
        // echo $late->tosql();
        $late = $late->get();
        $response = json_decode($late); 
         
        
        $is_api_request = $request->route()->getPrefix() === 'api';
        if($is_api_request){
            $tojson = json_encode($response,JSON_UNESCAPED_UNICODE); //JSON_FORCE_OBJECT|
            print_r($tojson);
 
        }else{
 
            return view('RAPPORTS/contribuables_assujettis_tva',['response' => $response] );
        }
        
 
 
     }


    public function contribuables_assujettis_tva(Request $request){
       // echo "loaded";


        $response = array();

        $validator = Validator::make($request->all(), [
            "annee"=> 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $impot   = 1; // $request['impot'];
        $annee   = $request['annee'];

        $tdates = array();

        for($i=1;$i<13;$i++){
            $month = $i;
            if($month < 10){
                $month = "0".$month;
            }
            $tdates[$i] = $annee."-".$month."-15";
        }

        $response = array();

       for($i=1; $i <= sizeof($tdates) ;$i++){
            $t_date = $tdates[$i];

            $list = DB::table('dgi_ms__gestion_impot_tva.dbo.assujettissements')
                        ->select('nif','assujettissement_debut','assujettissement_fin');
            $list = $list->where("fk_impot","=",$impot,"and");
            $list = $list->where("assujettissement_fin",null,"or");
            $list = $list->where("assujettissement_fin",">=",$t_date,"or");
            $list = $list->where("assujettissement_debut","<=",$t_date,"and");
            $list_b = $list->get()->count();
            $response[$i] = $list_b;
            
        }

        //print_r($response);

        
       // $response = json_decode($list_b); 
        
        $is_api_request = $request->route()->getPrefix() === 'api';
        if($is_api_request){
            $tojson = json_encode($response,JSON_UNESCAPED_UNICODE); //JSON_FORCE_OBJECT|
            print_r($tojson);

        }else{

            return view('RAPPORTS/contribuables_assujettis_tva',['response' => $response] );
        }



    }


    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
