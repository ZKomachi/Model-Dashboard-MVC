<?php
class RequestApi
{
    // Atributos
    private $url;
    private $data;
    private $method;
    private $token;

    // Metodos especiais
    public function __construct($url = "", $data = array(), $method = "POST", $token = "")
    {
        $this->setUrl($url);
        $this->setData($data);
        $this->setMethod($method);
        $this->setToken($token);
    }
    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     */
    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     */
    public function setMethod($method): self
    {
        $this->method = sanitizarVarString($method);

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     */
    public function setToken($token): self
    {
        $this->token = sanitizarVarString($token);

        return $this;
    }

    // Metodos publicos
    // Function para request api curl:
    public function sendCurl()
    {
        $url = $this->getUrl();
        $data = $this->getData();
        $method = $this->getMethod();   // POST OR GET
        $token = $this->getToken();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "urldaminhaapi.com" . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "$method",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function fileGetCont()
    {
        $url = $this->getUrl();
        $data = $this->getData();
        $method = $this->getMethod();   // POST OR GET
        $token = $this->getToken();

        //Enviar pro model validar:
        //$json = file_get_contents("urldaminhaapi.com" . $url);
        //$values = json_decode($json);
        //return $values;

        $context = stream_context_create(array(
            'http' => array(
                'header' => "Authorization: " . $token,
            ),
        ));

        $json = file_get_contents($url, false, $context);
        if (isset($json)) {
            $result = json_decode($json);
        } else {
            $result = "";
        }

        return $result;
    }
}
