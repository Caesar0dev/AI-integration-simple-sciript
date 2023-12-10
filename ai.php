<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\OpenAI;

class OpenAIController extends Controller
{
    public function index()
    {
        $openai = new OpenAI();
        
        $completion = $openai->chat->completions->create([
            'messages' => [
                {
                    'role' => 'system',
                    'content' => 'Create a proposal for a web development project based on the provided job details.',
                },
                {
                    'role' => 'user',
                    'content' => 'Web Development Project Proposal',
                },
                {
                    'role' => 'system',
                    'content' => 'I am seeking a freelancer to help me create a simple \'mad-libs word game\' webpage. Languages will be used: HTML, CSS, and Javascript. Examples; https://gr2m.github.io/Mad-Libs-Forms/ https://www.madtakes.com/libs/187.html I will share the details once you bid.',
                },
            ],
            'model' => 'gpt-3.5-turbo',
        ]);
          
        echo $completion->choices[0]->message->content;
    }
}