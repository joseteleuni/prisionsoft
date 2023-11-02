<?php

namespace App\Modulos;

use RouterOS\Config;
use RouterOS\Query;
use RouterOS\Client;
use Illuminate\Support\Facades\Log;

class ConfigMikrotik{


    function __construct($data){
     
        $this->data = $data;
    }

    public function configuracion()  {
        
        //
        if($this->data['vpn']=='ok')

        {
            Log::info("Ejecutando config");
    
            $config = new Config([
                'host' => env('IP_API_MK'),
                'user' => env('USER_API_MK'),
                'pass' => env('PASS_API_MK'),
                'port' => (int)env('PORT_API_MK'),
            ]);
            
            $client = new Client($config);
            $comment_portwinbox=$this->data['nombre']."-MK-Winbox";
            $comment_pbxssh=$this->data['nombre']."-PBX-SSH";
            $comment_portserver=$this->data['nombre']."-PortServer";
        
            //Query 
            $query_portwinbox =(new Query('/ip/firewall/nat/print'))->where('comment', $comment_portwinbox);
            $query_pbxssh     =(new Query('/ip/firewall/nat/print'))->where('comment', $comment_pbxssh);
            $query_portserver     =(new Query('/ip/firewall/nat/print'))->where('comment', $comment_portserver);
        
            //Respuestas queries 
            $response_portwinbox = $client->query($query_portwinbox)->read();
            $response_pbxssh     = $client->query($query_pbxssh)->read();
            $response_portserver = $client->query($query_portserver)->read();

            //Recuperando valores
            Log::info("Cargando valores");
            $this->puerto_winbox = $response_portwinbox[0]["dst-port"];
            $this->puerto_pbx    = $response_pbxssh[0]["dst-port"];
            $this->puerto_portserver = $response_portserver[0]["dst-port"];
        }

        else {
            
            $this->puerto_winbox="8291";
            $this->puerto_pbx="32581";
            $this->puerto_portserver="771";
        }

        $this->dominio = "51-".$this->data['codigo'].".dyndns.org";

    }
    
    

}