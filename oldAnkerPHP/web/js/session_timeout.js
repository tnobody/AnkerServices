$(document).ready(function() { 

    // setup the dialog
    $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        height: 230,
        closeOnEscape: false,
        draggable: false,
        resizable: false,
        buttons: {
            'Ja, weiter arbeiten': function(){
                $(this).dialog('close');
            },
            'Nein, ausloggen': function(){
                // fire whatever the configured onTimeout callback is.
                // using .call(this) keeps the default behavior of "this" being the warning
                // element (the dialog in this case) inside the callback.
                $.idleTimeout.options.onTimeout.call(this);
            }
        }
    });

    // cache a reference to the countdown element so we don't have to query the DOM for it on each ping.
    var $countdown = $("#dialog-countdown");

    $.idleTimeout('#dialog', 'div.ui-dialog-buttonpane button:first', {
    //$.idleTimeout('#idletimeout', '#idletimeout a', {
        idleAfter: 900,
        pollingInterval: 60,
        keepAliveURL: app + 'keepalive',
        serverResponseEquals: 'OK',
        onTimeout: function(){
            //$(this).slideUp();
            window.location = app + 'logout/inactive';
        },
        onIdle: function(){
            //$(this).slideDown(); // show the warning bar
            $(this).dialog("open");
        },
        onCountdown: function( counter ){
            //$(this).find("span").html( counter ); // update the counter
            $countdown.html(counter); // update the counter
        },
        onResume: function(){
            $(this).slideUp(); // hide the warning bar
        }
    });

});