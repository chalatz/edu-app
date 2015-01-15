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

//             if(grader_field.val().length > 0 && grader_notify.val() == 1){
//                 e.preventDefault();
//                 $("#dialog-confirm").dialog('open');
//             }

            if($('#confirmMe').valid() == true && grader_notify.val() == 1) {
                e.preventDefault();
                $("#dialog-confirm").dialog('open');
            }

        });
        
    };
    
    var depandable_fields = function(wrapper, depender, dependee, depender_value) {
        
        if(depender.val() != depender_value){
            wrapper.hide();
            dependee.val('');
        }
        
        depender.on('change', function(){
            if(depender.val() == depender_value){
                wrapper.fadeIn();
            } else {
                dependee.val('');
                wrapper.hide();
            }
        });
        
    }
    
    confirm_form();
    depandable_fields($('#district_text_wrapper'), $('.site-form select#district_id'), $('#district_text'), 14);
    depandable_fields($('#restricted_access_details_wrapper'), $('.site-form select#restricted_access'), $('#restricted_access_details'), 1);
    
})(jQuery);