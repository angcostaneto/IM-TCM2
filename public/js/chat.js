// Ensure CSRF token is sent with AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Added Pusher logging
Pusher.log = function (msg) {
    console.log(msg);
};