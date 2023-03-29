<?php

namespace App\Http\Controllers;


use App\Models\dgi_avis;
use App\Models\TestChart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\HasApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\remote_server;

use Validator;
use DB;


class AvisController extends Controller
{
    use HasApiResponse;


    public function Create(Request $request){
        $response = "";
        $validator = Validator::make($request->all(), [
            //'marque' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        //..........................................................

        $obj = new dgi_avis;

        $obj->type                      = $request['type'];
        $obj->intitule                  = $request['intitule'];
        $obj->numero                    = $request['numero'];
        $obj->status                    = $request['status'];
        $obj->fk_agentCloture           = $request['fk_agentCloture'];
        $obj->dateCloture               = $request['dateCloture'];
        $obj->fk_agentDestinataire      = $request['fk_agentDestinataire'];
        $obj->docContent                = $request['docContent'];

        
        $saved = $obj->save();
                    
        if($saved){
            return response( ["status"=>true, "message"=>"saved successfully","id"=>$obj->id], 200)->header('Content-Type', 'text/JSON');
        }else{
            return response( ["status"=>false,"message"=>"saving failure"], 200)->header('Content-Type', 'text/JSON');
        }
        
        //$tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        //print_r($tojson);
        
    }


    public function List(Request $request){

        $cookie_name = "utilisateur";
        $cookie_value = "Sir_Sulabel";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($cookie_name, "", time() - 3600, "/"); // 86400 = 1 day

        /*$marque           = $request['marque'];
        $numero_chassis     = $request['numero_chassis'];
        $annee_fabrication  = $request['annee_fabrication'];
        */
        $response   = array();
        $post       = new dgi_avis;
        $values     = $post;

        $values = $values->get();
        $values = json_decode(json_encode($values));

        $tmp            = new \stdClass();
        $tmp->content   = $values;
        $tmp->info      = NULL;
        $values         = $tmp;
        
        $values = json_encode($values,JSON_UNESCAPED_UNICODE);
        return response($values, 200)->header('Content-Type', 'text/JSON');       
    }


    public function View($id,Request $request){
        $response = array();
        $post   = new dgi_avis;
        $values = $post;
        $values = $values->where("id","=",$id);
        $values = $values->get();
        $values = $values[0];
        $values = json_decode(json_encode($values));

        $tmp            = new \stdClass();
        $tmp->content   = $values;
        $tmp->info      = NULL;
        $values         = $tmp;

        $values = json_encode($values,JSON_UNESCAPED_UNICODE);
        return response($values, 200)->header('Content-Type', 'text/JSON');  
             
    }
  

    public function Update($id,Request $request){
        
        $obj = dgi_avis ::find($id);
        if($obj){   
            $response = "";
            $validator = Validator::make($request->all(), [
                //'designation'   => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            //..........................................................
            $obj->type                      = $request['type'];
            $obj->intitule                  = $request['intitule'];
            $obj->numero                    = $request['numero'];
            $obj->status                    = $request['status'];
            $obj->fk_agentCloture           = $request['fk_agentCloture'];
            $obj->dateCloture               = $request['dateCloture'];
            $obj->fk_agentDestinataire      = $request['fk_agentDestinataire'];
            $obj->docContent                = $request['docContent'];
    

            if(isset($intitule)){
                $obj->intitule      = $intitule;
            }

            $saved = $obj->save();
                        
            if($saved){
                return response( ["status"=>true, "message"=>"saved successfully"], 200)->header('Content-Type', 'text/JSON');

            }else{
                return response( ["status"=>false,"message"=>"saving failure"], 200)->header('Content-Type', 'text/JSON');
            
            }
            
        }else{
            return response( ["status"=>false,"message"=>"saving failure","detail"=>"reccord not found"], 200)->header('Content-Type', 'text/JSON');
        
        }   
        
        
        //$tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        //print_r($tojson);
        
    }


    public function Update_Content($id,Request $request){
        
        $obj = dgi_avis ::find($id);
        if($obj){   
            $response = "";
            $validator = Validator::make($request->all(), [
                //'designation'   => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            //..........................................................
            
            $obj->docContent    = $request['docContent'];

            //$obj->doc_content   = $doc_content;

            $saved = $obj->save();
                        
            if($saved){
                return response( ["status"=>true, "message"=>"saved successfully"], 200)->header('Content-Type', 'text/JSON');

            }else{
                return response( ["status"=>false,"message"=>"saving failure"], 200)->header('Content-Type', 'text/JSON');
            
            }
            
        }else{
            return response( ["status"=>false,"message"=>"saving failure","detail"=>"reccord not found"], 200)->header('Content-Type', 'text/JSON');
        
        }   
        
        
        //$tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        //print_r($tojson);
        
    }



    
    


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 200){
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
