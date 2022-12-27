<?php

namespace App\Http\Controllers;


use App\Models\vehicules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\HasApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\remote_server;

use Validator;
use DB;


class VehiculesController extends Controller
{
    use HasApiResponse;


    public function Create(Request $request){
        $response = "";
        $validator = Validator::make($request->all(), [
            'marque' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        //..........................................................

        $utilisation        = $request['utilisation'];
        $genre              = $request['genre'];
        $energie            = $request['energie'];
        $puissance_fiscale  = $request['puissance_fiscale'];
        $fk_proprietaire    = $request['fk_proprietaire'];

        $type_proprietaire  = $request['type_proprietaire'];
        $marque             = $request['marque'];
        $modele             = $request['modele'];
        $annee_fabrication  = $request['annee_fabrication'];
        $nombre_chevaux     = $request['nombre_chevaux'];

        $poid_vide          = $request['poid_vide'];
        $poid_charge        = $request['poid_charge'];
        $numero_chassis     = $request['numero_chassis'];
        $numero_moteur      = $request['numero_moteur'];
        $couleur            = $request['couleur'];

        $provenance         = $request['provenance'];
        $date_mec_initiale  = $request['date_mec_initiale'];
        $status             = $request['status'];

        $obj = new vehicules;
        
        $obj->utilisation       = $utilisation ;
        $obj->genre             = $genre ;
        $obj->energie           = $energie ;
        $obj->puissance_fiscale = $puissance_fiscale ;
        $obj->fk_proprietaire   = $fk_proprietaire ;

        $obj->type_proprietaire = $type_proprietaire ;
        $obj->marque            = $marque ;
        $obj->modele            = $modele ;
        $obj->annee_fabrication = $annee_fabrication ;
        $obj->nombre_chevaux    = $nombre_chevaux ;

        $obj->poid_vide         = $poid_vide ;
        $obj->poid_charge       = $poid_charge ;
        $obj->numero_chassis    = $numero_chassis ;
        $obj->numero_moteur     = $numero_moteur ;
        $obj->couleur           = $couleur ;

        $obj->provenance        = $provenance ;
        $obj->date_mec_initiale = $date_mec_initiale ;
        $obj->status            = $status ;



        
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

        $marque             = $request['marque'];
        $numero_chassis     = $request['numero_chassis'];
        $annee_fabrication  = $request['annee_fabrication'];
        
        $response = array();
        $post   = new vehicules;
        $values = $post;

        if(isset($marque)){
            if($marque =="any" ){
                $marque = "%";
            }
            $values = $values->where("marque","LIKE","%".$marque."%","AND");
        }

        if(isset($numero_chassis)){
            if($numero_chassis =="any" ){
                $numero_chassis = "%";
            }
            $values = $values->where("numero_chassis","LIKE","%".$numero_chassis."%","AND");
        }

        if(isset($annee_fabrication)){
            if($annee_fabrication =="any" ){
                $annee_fabrication = "%";
            }
            $values = $values->where("annee_fabrication","LIKE","%".$annee_fabrication."%","AND");
        }

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
        /*$ids = base64_decode($ids);
        $ids = json_decode($ids);

        $services = array();

        for($i=0; $i< sizeof($ids) ;$i++){
            $id     = $ids[$i];
            $list   = DB::table('dgi_ms__parametrage_services.dbo.services');
            $list   = $list->select("id","designation");
            $list   = $list->where("id","=",$id);
            $list   = $list->get();
            $id     = $list[0]->id;
            $services[$id] = $list[0];
        }
        $services = json_encode($services);
        $services = json_decode($services);

        return $services; */
    }


    
    public function View($id,Request $request){
        $response = array();
        $post   = new vehicules;
        $values = $post;
        $values = $values->where("id","=",$id);

        /*if(isset($search)){
            if($search =="any" ){
                $search = "%";
            }
            $values = $values->where("fk_contribuable","LIKE",$search);
        }*/

        $values = $values->get();
        $values = json_decode(json_encode($values));
        
        $values = json_encode($values,JSON_UNESCAPED_UNICODE);
        return response($values, 200)->header('Content-Type', 'text/JSON');       
    }

    
    public function Update($id,Request $request){
        
        $obj = vehicules ::find($id);
        if($obj){   
            $response = "";
            $validator = Validator::make($request->all(), [
                //'designation'   => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            //..........................................................
            
            $utilisation        = $request['utilisation'];
            $genre              = $request['genre'];
            $energie            = $request['energie'];
            $puissance_fiscale  = $request['puissance_fiscale'];
            $fk_proprietaire    = $request['fk_proprietaire'];
    
            $type_proprietaire  = $request['type_proprietaire'];
            $marque             = $request['marque'];
            $modele             = $request['modele'];
            $annee_fabrication  = $request['annee_fabrication'];
            $nombre_chevaux     = $request['nombre_chevaux'];
    
            $poid_vide          = $request['poid_vide'];
            $poid_charge        = $request['poid_charge'];
            $numero_chassis     = $request['numero_chassis'];
            $numero_moteur      = $request['numero_moteur'];
            $couleur            = $request['couleur'];
    
            $provenance         = $request['provenance'];
            $date_mec_initiale  = $request['date_mec_initiale'];
            $status             = $request['status'];
    
            
            $obj->utilisation       = $utilisation ;
            $obj->genre             = $genre ;
            $obj->energie           = $energie ;
            $obj->puissance_fiscale = $puissance_fiscale ;
            $obj->fk_proprietaire   = $fk_proprietaire ;
    
            $obj->type_proprietaire = $type_proprietaire ;
            $obj->marque            = $marque ;
            $obj->modele            = $modele ;
            $obj->annee_fabrication = $annee_fabrication ;
            $obj->nombre_chevaux    = $nombre_chevaux ;
    
            $obj->poid_vide         = $poid_vide ;
            $obj->poid_charge       = $poid_charge ;
            $obj->numero_chassis    = $numero_chassis ;
            $obj->numero_moteur     = $numero_moteur ;
            $obj->couleur           = $couleur ;
    
            $obj->provenance        = $provenance ;
            $obj->date_mec_initiale = $date_mec_initiale ;
            $obj->status            = $status ;
    
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
    public function sendError($error, $errorMessages = [], $code = 200)
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
