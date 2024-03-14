<?php

// Defina sua chave de API do GPT aqui


// URL da API do GPT
$url = 'https://api.openai.com/v1/engines/davinci-codex/completions';

// Texto de entrada para o GPT
$input_text = 'me dê três exemplos de metricas de codigo-fonte';

// Configuração da solicitação
$data = array(
    'prompt' => $input_text,
    'max_tokens' => 150, // Defina o número máximo de tokens gerados
    'temperature' => 0.7, // Defina a temperatura de amostragem (controla a criatividade)
);

// Configuração do cabeçalho da solicitação
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
);

// Inicializa a sessão cURL
$ch = curl_init();

// Configura as opções da sessão cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executa a solicitação
$response = curl_exec($ch);

// Verifica se ocorreu algum erro
if(curl_errno($ch)) {
    echo 'Erro ao enviar solicitação: ' . curl_error($ch);
} else {
    // Exibe a resposta
    echo $response;
}

// Fecha a sessão cURL
curl_close($ch);

?>