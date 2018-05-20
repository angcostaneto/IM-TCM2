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
    if (messageText.length < 3) {
        return false;
    }

    // Build POST data and make AJAX request
    var param = { message: messageText };
    $.post(url, param).success(sendMessageSuccess);

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
    el.find('.message-body').html(data.text);
    el.find('.author').text(data.username);
    el.find('.avatar img').attr('src', data.avatar)

    var messages = $('#messages');
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

var pusher = new Pusher(appKey, {
    cluster: appCluster
});

var channel = pusher.subscribe(chatChannel);
channel.bind('new-message', addMessage);