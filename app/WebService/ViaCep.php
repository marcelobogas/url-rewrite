<?php

namespace App\WebService;

class ViaCep
{
    /**
     * Método responsável por consultar um CEP no ViaCep
     *
     * @param string $cep
     *
     * @return array
     */
    public static function consultarCep($cep)
    {
        /* inicia o CURL */
        $curl = curl_init();

        /* configurações do CURL */
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/' . $cep . '/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        /* response */
        $response = curl_exec($curl);

        /* fecha a conexão aberta */
        curl_close($curl);

        /* converte o response em array */
        $array = json_decode($response, true);

        /* retorna o conteúdo em array */
        return isset($array['cep']) ? $array : null;
    }
    
    /**
     * Método responsável por retornar o nome do estado
     *
     * @param string $uf 
     *
     * @return string
     */
    public static function getEstado ($uf) {

        $estado = '';
        switch ($uf) {
            case 'AC': $estado = 'Acre';
                break;
            case 'AL': $estado = 'Alagoas';
                break;
            case 'AP': $estado = 'Amapá';
                break;
            case 'AM': $estado = 'Amazonas';
                break;
            case 'BA': $estado = 'Bahia';
                break;
            case 'CE': $estado = 'Ceará';
                break;
            case 'DF': $estado = 'Distrito Federal';
                break;
            case 'ES': $estado = 'Espirito Santo';
                break;
            case 'GO': $estado = 'Goiás';
                break;
            case 'MA': $estado = 'Maranhão';
                break;
            case 'MT': $estado = 'Mato Grosso';
                break;
            case 'MS': $estado = 'Mato Grosso do Sul';
                break;
            case 'MG': $estado = 'Minas Gerais';
                break;
            case 'PA': $estado = 'Pará';
                break;
            case 'PB': $estado = 'Paraíba';
                break;
            case 'PE': $estado = 'Pernambuco';
                break;
            case 'PI': $estado = 'Piauí';
                break;
            case 'RJ': $estado = 'Rio de Janeiro';
                break;
            case 'RN': $estado = 'Rio Grande do Norte';
                break;
            case 'RS': $estado = 'Rio Grande do Sul';
                break;
            case 'RO': $estado = 'Rondônia';
                break; 
            case 'RR': $estado = 'Rorâima';
                break;    
            case 'SC': $estado = 'Santa Catarina';
                break;
            case 'SP': $estado = 'São Paulo';
                break;
            case 'SE': $estado = 'Sergipe';
                break;
            case 'TO': $estado = 'Tocantins';
                break;
        }

        /* retorna o nome do estado */
        return $estado;
    }
}
