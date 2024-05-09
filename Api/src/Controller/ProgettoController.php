<?php
require('../src/Tabelle/Progetto.php');
    class ProgettoController{
        private $db;
        private $requestMethod;
        private $userId;
    
        private $Progetto;
    
        public function __construct($db, $requestMethod, $userId)
        {
            $this->db = $db;
            $this->requestMethod = $requestMethod;
            $this->userId = $userId;
    
            $this->Progetto = new Progetto($db);
        }
    
        public function processRequest()
        {
            switch ($this->requestMethod) {
                case 'GET':
                    if ($this->userId) {
                        $response = $this->getProgetto($this->userId);
                    } else {
                        $response = $this->getAllProgetti();
                    };
                    break;
                case 'POST':
                    $response = $this->createProgettoFromRequest();
                    break;
                case 'PUT':
                    $response = $this->updateProgettoFromRequest($this->userId);
                    break;
                case 'DELETE':
                    $response = $this->deleteProgetto($this->userId);
                    break;
                default:
                    $response = $this->notFoundResponse();
                    break;
            }
            header($response['status_code_header']);
            if ($response['body']) {
                echo $response['body'];
            }
        }
    
        private function getAllProgetti()
        {
            $result = $this->Progetto->findAll();
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($result);
            return $response;
        }

        private function getProgetto($id)
        {
            $result = $this->Progetto->find($id);
            if (! $result) {
                return $this->notFoundResponse();
            }
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($result);
            return $response;
        }
        
    
        private function createProgettoFromRequest()
        {
            $input = (array) json_decode(file_get_contents('php://input'), TRUE);
            if (! $this->validateProgetto($input)) {
                return $this->unprocessableEntityResponse();
            }
            $this->Progetto->insert($input);
            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = null;
            return $response;
        }
    
        private function updateProgettoFromRequest($id)
        {
            $result = $this->Progetto->find($id);
            if (! $result) {
                return $this->notFoundResponse();
            }
            $input = (array) json_decode(file_get_contents('php://input'), TRUE);
            if (! $this->validateProgetto($input)) {
                return $this->unprocessableEntityResponse();
            }
            $this->Progetto->update($id, $input);
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = null;
            return $response;
        }
    
        private function deleteProgetto($id)
        {
            $result = $this->Progetto->find($id);
            if (! $result) {
                return $this->notFoundResponse();
            }
            $this->Progetto->delete($id);
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = null;
            return $response;
        }
    
        private function validateProgetto($input)
        {
            if (! isset($input['firstname'])) {
                return false;
            }
            if (! isset($input['lastname'])) {
                return false;
            }
            return true;
        }
    
        private function unprocessableEntityResponse()
        {
            $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
            $response['body'] = json_encode([
                'error' => 'Invalid input'
            ]);
            return $response;
        }
    
        private function notFoundResponse()
        {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = null;
            return $response;
        }
    }

?>