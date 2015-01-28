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

        $('#confirmMe').validate({
            rules: {
                grader_district_text : {
                    required: function(){
                        return $('select#grader_district').val() == 14;
                    }
                },
                district_text : {
                    required: function(){
                        return $('select#district_id').val() == 14;
                    }
                },
                restricted_access_details : {
                    required: function(){
                        return $('select#restricted_access').val() == 'yes';
                    }
                },
                received_permission : {
                    required: function(){
                        return $('select#uses_private_data').val() == 'yes';
                    }
                },
                level_english : {
                    required: function(){
                        return $('#level_english_check').is(':checked') === true;
                    }
                },
                level_french : {
                    required: function(){
                        return $('#level_french_check').is(':checked') === true;
                    }
                },
                level_german : {
                    required: function(){
                        return $('#level_german_check').is(':checked') === true;
                    }
                },
                level_italian : {
                    required: function(){
                        return $('#level_italian_check').is(':checked') === true;
                    }
                }
            }
        });
        
        $('#confirmMe').on('submit', function(e){

//             if(grader_field.val().length > 0 && grader_notify.val() == 1){
//                 e.preventDefault();
//                 $("#dialog-confirm").dialog('open');
//             }

            if($('#confirmMe').valid() === true && grader_notify.val() == 'yes') {
                e.preventDefault();
                $("#dialog-confirm").dialog('open');
            }

        });
        
    };
    
    var depandable_fields = function(wrapper, depender, dependee, depender_value) {
        
        if(depender.val() != depender_value){
            wrapper.hide();
            //dependee.val('');
        }
        
        depender.on('change', function(){
            if(depender.val() == depender_value){
                wrapper.fadeIn();
            } else {
                //dependee.val('');
                wrapper.hide();
            }
        });
        
    };

    var propose_myself = function(){
        var the_checkbox = $('[name=proposes_himself]'),
            grader_last_name = $('#grader_last_name'),
            grader_name = $('#grader_name'),
            grader_district = $('#grader_district'),
            grader_email = $('#grader_email'),
            contact_last_name_val = $('#contact_last_name').val(),
            contact_name_val = $('#contact_name').val(),
            district_id_val = $('#district_id').val(),
            contact_email_val = $('#contact_email').val();

        the_checkbox.on('click', function(){

            if(the_checkbox.is(':checked')){

                var grader_last_name = $('#grader_last_name'),
                    grader_name = $('#grader_name'),
                    grader_district = $('#grader_district'),
                    grader_email = $('#grader_email'),
                    contact_last_name_val = $('#contact_last_name').val(),
                    contact_name_val = $('#contact_name').val(),
                    district_id_val = $('#district_id').val(),
                    contact_email_val = $('#contact_email').val();

                grader_last_name.val(contact_last_name_val);
                grader_name.val(contact_name_val);
                grader_district.val(district_id_val);
                grader_email.val(contact_email_val);
            } else {
                console.log('not checked');
            }

        });
    };

    var langs = function(thebox, theselect){

        theselect.on('change', function(){
            if(theselect.val() !== ''){
                thebox.prop('checked', true);
            } else {
                thebox.prop('checked', false);
            }
        });

    };
    
    confirm_form();
    depandable_fields($('#district_text_wrapper'), $('.site-form select#district_id'), $('#district_text'), 14);
    depandable_fields($('#grader_district_text_wrapper'), $('.site-form select#grader_district'), $('#grader_district_text'), 14);
    depandable_fields($('#received_permission_wrapper'), $('.site-form select#uses_private_data'), $('#received_permission'), 'yes');
    depandable_fields($('#restricted_access_details_wrapper'), $('.site-form select#restricted_access'), $('#restricted_access_details'), 'yes');

    langs($('#level_english_check'), $('#level_english'));
    langs($('#level_french_check'), $('#level_french'));
    langs($('#level_german_check'), $('#level_german'));
    langs($('#level_italian_check'), $('#level_italian'));        
    
    propose_myself();

})(jQuery);