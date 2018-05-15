@extends('layouts.app')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Daily active users <small>Sessions</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <ul class="list-unstyled timeline">
                @foreach ($mensagens as $mensagem) 
                    <li class="mensagem-chat">
                        <div class="block">
                            <div class="tags">
                                <a href="#" class="tag">
                                    <span>{{ $mensagem['remetente']->name }} </span>
                                </a>
                            </div>
                            <div class="block_content">
                                <p class="excerpt">{{ $mensagem['mensagem'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="input-group">
            <input type="text" class="form-control input-message" name="mensagem" placeholder="Mensagem">
            <span class="input-group-btn">
                <button class="btn btn-success send-message" type="button">Enviar</button>
            </span>
        </div>
  </div>

    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    
    <script id="chat_message_template" type="text/template">
        <li class="mensagem-chat">
            <div class="block">
                <div class="tags">
                    <a href="#" class="tag">
                        <span class="nome"></span>
                    </a>
                </div>
                <div class="block_content">
                    <p class="excerpt mensagem"></p>
                </div>
            </div>
        </li>
    </script>
  
    <script>

        // Added Pusher logging
        Pusher.log = function(msg) {
            console.log(msg);
        };
    
        function init() {
            // send button click handling
            $('.send-message').click(sendMessage);
            $('.input-message').keypress(checkSend);
        }
    
        // Send on enter/return key
        function checkSend(e) {
            if (e.keyCode === 13) {
                return sendMessage();
            }
        }
    
        // Handle the send button being clicked
        function sendMessage() {
            var messageText = $('.input-message').val();
            if(messageText.length < 3) {
                return false;
            }
    
            // Build POST data and make AJAX request
            var param = {message: messageText, chat: '{{ $chatChannel }}'};
            $.post("{{route('enviaMensagemChat')}}", param).success(sendMessageSuccess);
    
            // Ensure the normal browser event doesn't take place
            return false;
        }
    
        // Handle the success callback
        function sendMessageSuccess() {
            $('.input-message').val('')
            console.log('message sent successfully');
        }
    
        // Build the UI for a new message and add to the DOM
        function addMessage(data) {
            // Create element from template and set values
            var el = createMessageEl();
            el.find('.mensagem').html(data.text);
            el.find('.nome').html(data.nome);
            
            var messages = $('.mensagem-chat');
            messages.append(el)
            
            // Make sure the incoming message is shown
            messages.scrollTop(messages[0].scrollHeight);
        }
    
        // Creates an activity element from the template
        function createMessageEl() {
            var text = $('#chat_message_template').text();
            var el = $(text);
            return el;
        }
    
        $(init);
    
        var pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
            authEndpoint: '{{ route("mensagemAuth") }}',
            cluster: '{{env("PUSHER_APP_CLUSTER")}}',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        });
    
        var channel = pusher.subscribe('{{$chatChannel}}');
        channel.bind('nova-mensagem', addMessage);
    
    </script>

@endsection

