

<?php

// Replace 'YOUR_API_KEY' with your actual OpenAI API key
$api_key = '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';

// Define the name you want to inquire about
$name_to_lookup = $_REQUEST['name'];

// Set up the OpenAI API endpoint
$endpoint = 'https://api.openai.com/v1/engines/text-davinci-002/completions';

// Create a request to the OpenAI API
$request_data = array(
    'prompt' => "What is the meaning of the name $name_to_lookup?",
    'max_tokens' => 50,  // You can adjust this based on the desired response length
);

$request_headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
);

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the request to the OpenAI API
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$response_data = json_decode($response, true);

// Extract the model's reply
$meaning_of_name = $response_data['choices'][0]['text'];

// Print the meaning
echo " $meaning_of_name";

?>
