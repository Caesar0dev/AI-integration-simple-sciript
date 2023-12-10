<?php

function createProposal($title, $details, $instructions)
{
    $apiKey = 'YOUR_OPENAI_API_KEY'; // Replace with your OpenAI API key
    $apiUrl = 'https://api.openai.com/v1/chat/completions'; // URL for the OpenAI API

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ];

    $postData = [
        'model' => 'gpt-3.5-turbo', // Replace with the appropriate model identifier if needed
        'messages' => [
            ['role' => 'system', 'content' => $instructions],
            ['role' => 'user', 'content' => $title],
            ['role' => 'system', 'content' => $details]
        ]
    ];

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse['choices'][0]['message']['content'] ?? 'No response';
}

// Example usage
$instructions = `Create a proposal for a web development project based on the provided job details.`;
$title = `Web Development Project Proposal`;
$jobDetails = `I am seeking a freelancer to help me create a simple 'mad-libs word game' webpage. Languages will be used: HTML, CSS, and Javascript. Examples; https://gr2m.github.io/Mad-Libs-Forms/ https://www.madtakes.com/libs/187.html I will share the details once you bid.`;
$content = createProposal($title, $jobDetails, $instructions);

echo $content;
?>