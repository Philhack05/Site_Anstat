<?php

namespace App\Libraries;

use Config\Services;

class AnstatApi
{
     public function getDistricts()
    {
        $client = Services::curlrequest();
        try {
            $response = $client->get('http://api.anstat.ci:8000/api/v1/districts', [
                'query' => [
                    'annee' => '2021',
                    'pagination' => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M'
                ]
            ]);

         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getOneDistrict($id)
    {
        $client = Services::curlrequest();
        try { 
             $response = $client->post('http://api.anstat.ci:8000/api/v1/single-districts', [
                'json' => [  
                    'code_district' => $id, 
                    'annee'         => '2021',
                    'pagination'    => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);

         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getRegions($code_dist)
    {
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->post('http://api.anstat.ci:8000/api/v1/regions', [
                'json' => [  
                    'cod_dist'  => $code_dist,
                    'annee'     => '2021',
                    'pagination'=> 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);

            return json_decode($response->getBody(), true)['results'];

        } catch (\Exception $e) {
            return \Config\Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function getOneRegion($CodReg)
    {
        $client = Services::curlrequest();
        try { 
             $response = $client->post('http://api.anstat.ci:8000/api/v1/single-regions', [
                'json' => [  
                    'cod_reg'  => $CodReg, 
                    'annee'     => '2021',
                    'pagination'=> 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);

         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getDepartements($CodReg)
    {
        $client = Services::curlrequest();
        try { 
            $response = $client->post('http://api.anstat.ci:8000/api/v1/departements', [
                'json' => [  
                    'cod_reg'  => $CodReg,
                    'annee'     => '2021',
                    'pagination'=> 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);
 
           return json_decode($response->getBody(), true)['results'];

        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function getOneDept($CodDep)
    {
        $client = Services::curlrequest();
        try { 
            $response = $client->post('http://api.anstat.ci:8000/api/v1/single-departements', [
                'json' => [  
                    'cod_dep'       => $CodDep, 
                    'annee'         => '2021',
                    'pagination'    => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]); 

         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getSousp($CodDept)
    {
        $client = Services::curlrequest();

        try { 

            $response = $client->post('http://api.anstat.ci:8000/api/v1/sous-prefectures', [
                'json' => [  
                    'cod_dep'  => $CodDept,
                    'annee'     => '2021',
                    'pagination'=> 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);
           return json_decode($response->getBody(), true)['results'];

            

        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function getAllSousp()
    {
        $client = Services::curlrequest();

        try { 

            $response = $client->post('http://api.anstat.ci:8000/api/v1/sous-prefectures', [
                'json' => [   
                    'annee'     => '2021',
                    'pagination'=> 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);
           return json_decode($response->getBody(), true)['results'];

            

        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function getOneSp($CodDep,$CodSp)
    {
        $client = Services::curlrequest();
        try { 
            $response = $client->post('http://api.anstat.ci:8000/api/v1/single-sous-prefectures', [
                'json' => [  
                    'cod_dep'       => $CodDep,
                    'cod_sp'        => $CodSp,
                    'annee'         => '2021',
                    'pagination'    => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]); 

         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getLocalite($CodDep,$CodSp)
    {
        $client = Services::curlrequest();

        try { 

            $response = $client->post('http://api.anstat.ci:8000/api/v1/localites', [
                'json' => [  
                    'cod_dep'        => $CodDep,
                    'cod_sp'        => $CodSp,
                    'annee'         => '2021',
                    'pagination'    => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);
            return json_decode($response->getBody(), true)['results'];

           

        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function getOneLoc($CodLoc,$CodDep,$CodSp)
    {
        $client = Services::curlrequest();
        try { 

             $response = $client->post('http://api.anstat.ci:8000/api/v1/single-localites', [
                'json' => [  
                    'cod_dep'       => $CodDep,
                    'cod_sp'       => $CodSp,
                    'cod_loc'       => $CodLoc,
                    'annee'         => '2021',
                    'pagination'    => 'non'
                ],
                'headers' => [
                    'Authorization' => 'Api-Key Vs529JMp.7G6oQYifU2bxCVpbDCM1EUxwx3jGR27M',
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json'
                ]
            ]);


         return json_decode($response->getBody(), true)['results'];
 
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
