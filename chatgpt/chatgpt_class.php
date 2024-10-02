<?php
session_start();

// Import constants 
include(__DIR__ . '/chatgpt_configure.php');

class chatgpt {

    // If chat_history is not set then create the SESSION when class is initiated
    function __construct() {
        if (!isset($_SESSION['chat_history'])) {
            $_SESSION['chat_history'] = array(
                array(
                    "role" => "system",
                    "content" => "Du är en AI-assistent med kunskap om Pontus 28år gammal, som är en nyfiken och driven junior webbutvecklare med en examen från Changemaker Educations. 
                    Pontus har praktisk erfarenhet inom webbprogrammering, inklusive HTML, React, JavaScript, WordPress, PHP, CSS och SQL, 
                    samt erfarenhet av att arbeta med både frontend och backend. Pontus är motiverad att fortsätta lära sig och växa inom webbutveckling 
                    och programmering som helhet. På fritiden spenderar Pontus gärna tid med sin sambo Louise och sin hund Viggo. Han gillar naturen och har även ett intresse för fotboll. 
                    Pontus jobbar idag som webbutvecklare på Talex. Han har även arbetat mycket med design på Talex, han har designat kunders ehandelssidor och implementerat designen genom kodning. 
                    Ge kortfattade, informativa svar och uppskattar humor relaterad till programmering."
                )
            );
        }
    }

    function display_chatbox () { ?>
        <div id="ai-chat-circle">
            <img src="img/pontus-bot.png">
        </div>
        <div id="chatbox">
            <div class="chat-header">
            <div>
                <h2>Chatta med Pontus AI Bot</h2>
                <img src="img/close-chat.svg" class="close-chat">
            </div>
            </div>
            <div class="chat-dialog">
                <p class="text-writer">Pontus AI Bot</p>
                <p class="botMessage">Hej! Jag är Pontus AI Bot – här för att svara på dina frågor om Pontus… eller åtminstone försöka! 
                    Jag är fortfarande under uppbyggnad, så jag har inte all info än. Och ibland, när jag inte vet svaret, kan jag hitta på lite egna grejer 
                    – så ta mina svar med en rejäl nypa salt! &#128516;</p>
            </div>
            <div class="user-chat-input">
                <input type="text" id="prompt" name="prompt" placeholder="Fråga mig något om Pontus">
                <button id="submit-prompt"><img src="img/bi_send-fill.svg" alt="Send message icon"></button>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            // Display chatbox on chat icon click
            $('#ai-chat-circle').click(function () {
                $('#chatbox').css('display', 'flex');
            });

            $('.close-chat').click(function () {
                $('#chatbox').css('display', 'none');
            });

            // To enable user to send message by clicking Enter
            $(".user-chat-input input").on("keyup", function(event) {
                if (event.key === "Enter") {
                    submitPrompt();
                }
            });

            // To enable user to send message by clicking the send icon
            $('#submit-prompt').click(submitPrompt);

            // Function that submits the prompt through a AJAX-request
            function submitPrompt () {
                console.log('Submit');
                var prompt = $('#prompt').val();
                if(prompt !== '') {
                    // Add user message to the chat box
                    $('.chat-dialog').append('<div class="text-writer">Du</div><p class="userMessage">' + prompt + '</p>');
                    // Clear the input field
                    $('#prompt').val('');
                    $.ajax({
                        type: 'POST',
                        url: '/chatgpt/chatgpt_call.php',
                        data: {prompt: prompt},
                        success: function(response) {
                            // Add the response to the chatbox
                            $('.chat-dialog').append('<div class="text-writer">Pontus AI Bot</div><p class="botMessage">' + response + '</p>');
                            // Scroll to the bottom of the chat box
                            $('#chatbox').scrollTop($('.chat-dialog')[0].scrollHeight);
                        }
                    });
                } else {
                    alert('Please enter a message.');
                }
            }
        });
        </script>
    <?php
    }

    function ask($prompt) { 
        // Append the new user message to the session's conversation history
        $_SESSION['chat_history'][] = array(
            "role" => "user",
            "content" => $prompt
        );
        
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => $_SESSION['chat_history']
        );

        $ch = curl_init(CHATGPT_ENDPOINT . 'completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . CHATGPT_APIKEY
        ));

       curl_setopt($ch, CURLOPT_VERBOSE, true);
       $verbose_handle = fopen('debug.log', 'w');
       curl_setopt($ch, CURLOPT_STDERR, $verbose_handle);
       curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $decoded_response = json_decode($response, true);

        // Append the API's response to the session's chat history
        if (isset($decoded_response['choices'][0]['message']['content'])) {
            $_SESSION['chat_history'][] = array(
                "role" => "assistant",
                "content" => $decoded_response['choices'][0]['message']['content']
            );
        }

        echo ($decoded_response['choices'][0]['message']['content']); ?>
        <script type="text/javascript">
          $(".chat-dialog").animate({ scrollTop: $('.chat-dialog').prop("scrollHeight")}, 1000);
        </script>
        <?php
    }
}
?>
