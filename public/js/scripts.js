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

                        if($('#confirmMe').valid() == true) {
                            e.preventDefault();
                            $("#dialog-confirm").dialog('open');
                        }

        });
        
    };
    
    var districts = function(){
        
        var district_text = $('.district_text'),
            district_text_input = $('#district_text'),
            districts_select = $('.site-form select#district_id');
        
        district_text.hide();
        
        districts_select.on('change', function(){
            if(districts_select.val() == 14){
                district_text.fadeIn();
            } else {
                district_text_input.val('');
                district_text.hide();
            }
        });
        
    };
    
    confirm_form();
    districts();
    
})(jQuery);