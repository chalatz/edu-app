(function($){
    
    var confirm_form = function(){
    
        var grader_field = $('input#grader_email'),
            grader_notify = $('select#notify_grader');

         $("#dialog-confirm").dialog({
            autoOpen: false,
            resizable: true,
            width: 500,
            height: 300,
            modal: true,
            buttons: {
                "Ναι, είμαι σίγουρος": function() {
                    console.log('click');
                    document.confirmMe.submit();
                },
               "Όχι ακόμα": function() {
                    $( this ).dialog( "close" );
                }
            }
        });

        $('#confirmMe').validate();
        
        $('#confirmMe').on('submit', function(e){

            if(grader_field.val().length > 0 && grader_notify.val() == 1){
                e.preventDefault();
                $("#dialog-confirm").dialog('open');
            }


        });
        
    };
    
    confirm_form();
    
})(jQuery);