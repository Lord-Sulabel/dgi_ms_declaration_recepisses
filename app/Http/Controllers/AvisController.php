<?php

namespace App\Http\Controllers;


use App\Models\avis;

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


        $type       = $request['type'];
        $intitule   = $request['intitule'];
        $numero     = $request['numero'];
        $status     = $request['status'];
        $fk_agent_cloture   = $request['fk_agent_cloture'];
        $date_cloture       = $request['date_cloture'];
        $fk_agent_destinataire = $request['fk_agent_destinataire'];
        $doc_content    = $request['doc_content'];

        $obj = new avis;
        
        $obj->type      = $type;
        $obj->intitule  = $intitule;
        $obj->numero    = $numero;
        $obj->status    = $status;
        $obj->fk_agent_cloture  = $fk_agent_cloture;
        $obj->date_cloture      = $date_cloture;
        $obj->fk_agent_destinataire = $fk_agent_destinataire;
        $obj->doc_content   = $doc_content;
        
        $saved = $obj->save();
                    
        if($saved){
            return response( ["status"=>true, "message"=>"saved successfully","id"=>$obj->id], 200)->header('Content-Type', 'text/JSON');
        }else{
            return response( ["status"=>false,"message"=>"saving failure"], 200)->header('Content-Type', 'text/JSON');
        }
        
        $tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        print_r($tojson);
        
    }


    public function List(Request $request){

        /*$marque             = $request['marque'];
        $numero_chassis     = $request['numero_chassis'];
        $annee_fabrication  = $request['annee_fabrication'];
        */
        $response = array();
        $post   = new avis;
        $values = $post;
        /*
        if(isset($marque)){
            if($marque =="any" ){
                $marque = "%";
            }
            $values = $values->where("marque","LIKE","%".$marque."%","AND");
        }

        */

        $values = $values->get();
        $values = json_decode(json_encode($values));

        
        /*if(is_array($values)){
            foreach($values as $val){
                $nif = $val->fk_contribuable;
                $all_nifs[] = $nif;

                $val->montant_recoupe  *= 1; //APPEND
                $val->montant_declare  *= 1; //APPEND

                $montant_recoupe = $val->montant_recoupe;
                $montant_declare = $val->montant_declare;
                $montant_elude  = 0 ;

                if($montant_recoupe > $montant_declare){
                    $montant_elude   = $montant_recoupe - $montant_declare;
                }
                $val->montant_elude = $montant_elude; //APPEND
                $penalite_assiette  = $montant_elude;

                $taux_assiette          = $val->taux_assiette;
                $penalite_assiette      = $taux_assiette * $montant_elude / 100;
                $val->penalite_assiette = $penalite_assiette; //APPEND

                $taux_recouvrement          = $val->taux_recouvrement;
                $penalite_recouvrement      = $taux_recouvrement * $montant_elude / 100;
                $val->penalite_recouvrement = $penalite_recouvrement; //APPEND
                
                $penalite_total     = $penalite_assiette + $penalite_recouvrement;
                $val->penalite_total= $penalite_total; //APPEND
                $montant_total      = $penalite_total + $montant_elude;
                $val->montant_total = $montant_total; //APPEND
                $part_tresor      = $montant_elude + ($penalite_total/2);
                $val->part_tresor = $part_tresor; //APPEND
                $part_dgi       = $penalite_total/2;
                $val->part_dgi  = $part_dgi; //APPEND

            }

            $all_nifs = base64_encode(json_encode($all_nifs));
            $remote_server = new remote_server;
            $all_contribuables = $remote_server->GetData("http://localhost/dgi_ms_gestion_contribuable/public/api/for_nifs_v2/".$all_nifs);
            $all_contribuables = json_decode($all_contribuables);
            unset($all_nifs);

            foreach($values as $val){
                $nif = $val->fk_contribuable;
                $val->contribuable    = $all_contribuables->$nif;
                unset($val->fk_contribuable);
            }
        }*/
        
        $values = json_encode($values,JSON_UNESCAPED_UNICODE);
        return response($values, 200)->header('Content-Type', 'text/JSON');       
    }

 
    public function ListForIds($ids){
        //echo "on";
        $ids = base64_decode($ids);
        $ids = json_decode($ids);

        $vehicules = array();

        for($i=0; $i< sizeof($ids) ;$i++){
            $id     = $ids[$i];
            $list   = DB::table('dgi_ms__vehicule_vehicules.dbo.vehicules');
          //$list   = $list->select("id","designation");
            $list   = $list->where("id","=",$id);
            $list   = $list->get();
            $id     = $list[0]->id;
            $vehicules[$id] = $list[0];
        }
        $vehicules = json_encode($vehicules);
        $vehicules = json_decode($vehicules);

        return $vehicules; 
    }
    

    public function View($id,Request $request){
        $response = array();
        $post   = new avis;
        $values = $post;
        $values = $values->where("id","=",$id);
        $values = $values->get();
        $values = $values[0];
        $values = json_decode(json_encode($values));

        //$doc_content = $values->doc_content;
        //$doc_content = json_decode($doc_content);
        //print_r($doc_content);




        //$values = $values[0];
       /*
        $type_proprietaire  = $values->type_proprietaire;
        $fk_proprietaire    = $values->fk_proprietaire;
        $remote = new remote_server;
        if($type_proprietaire === "contribuable"){
            $url    = "http://localhost/dgi_ms_gestion_contribuable/public/api/contribuable/".$fk_proprietaire;
        }else{
            $url    = "http://localhost/dgi_ms_vehicule_autre_proprietaires/public/api/proprietaire/".$fk_proprietaire;
        }
        $resp   = $remote->GetData($url);
        $values->proprietaire = json_decode($resp);
           */
        $values = json_encode($values,JSON_UNESCAPED_UNICODE);
        return response($values, 200)->header('Content-Type', 'text/JSON');  
             
    }
  

    public function Update($id,Request $request){
        
        $obj = avis ::find($id);
        if($obj){   
            $response = "";
            $validator = Validator::make($request->all(), [
                //'designation'   => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            //..........................................................
            $type       = $request['type'];
            $intitule   = $request['intitule'];
            $numero     = $request['numero'];
            $status     = $request['status'];
            $fk_agent_cloture = $request['fk_agent_cloture'];
            $date_cloture   = $request['date_cloture'];
            $fk_agent_destinataire = $request['fk_agent_destinataire'];


            

            $obj->type      = $type;
            $obj->intitule  = $intitule;
            $obj->numero    = $numero;
            $obj->status    = $status;
            $obj->fk_agent_cloture = $fk_agent_cloture;
            $obj->date_cloture  = $date_cloture;
            $obj->fk_agent_destinataire = $fk_agent_destinataire;


            
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
        
        
        $tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        print_r($tojson);
        
    }


    public function Update_Content($id,Request $request){
        
        $obj = avis ::find($id);
        if($obj){   
            $response = "";
            $validator = Validator::make($request->all(), [
                //'designation'   => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            //..........................................................
            
            $doc_content    = $request['doc_content'];

            $obj->doc_content   = $doc_content;

            $saved = $obj->save();
                        
            if($saved){
                return response( ["status"=>true, "message"=>"saved successfully"], 200)->header('Content-Type', 'text/JSON');

            }else{
                return response( ["status"=>false,"message"=>"saving failure"], 200)->header('Content-Type', 'text/JSON');
            
            }
            
        }else{
            return response( ["status"=>false,"message"=>"saving failure","detail"=>"reccord not found"], 200)->header('Content-Type', 'text/JSON');
        
        }   
        
        
        $tojson = json_encode($response,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE);
        print_r($tojson);
        
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
