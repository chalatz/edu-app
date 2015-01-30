(function($){
    
    var confirm_form = function(){
    
        var grader_field = $('input#grader_email'),
            grader_notify = $('select#notify_grader');

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
            },

            messages:{
                grader_district_text : "Εφόσον έχετε επιλέξει Άλλη... περιφέρεια, αυτό το πεδίο είναι υποχρεωτικό",
                district_text : "Εφόσον έχετε επιλέξει Άλλη... περιφέρεια, αυτό το πεδίο είναι υποχρεωτικό",
                restricted_access_details: "Εφόσον έχετε επιλέξει ότι ο ιστότοπος έχει περιορισμένη πρόσβαση, αυτό το πεδίο είναι υποχρεωτικό",
                received_permission: "Εφόσον έχετε επιλέξει Ναι στο προηγούμενο πεδίο, αυτό το πεδίο είναι υποχρεωτικό",
                level_english : "Εφόσον έχετε επιλέξει τη γλώσσα Αγγλικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_french : "Εφόσον έχετε επιλέξει τη γλώσσα Γαλλικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_german : "Εφόσον έχετε επιλέξει τη γλώσσα Γερμανικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_italian : "Εφόσον έχετε επιλέξει τη γλώσσα Ιταλικά, αυτό το πεδίο είναι υποχρεωτικό",
            }
        });

        $('#confirmMeGrader').validate({
            rules: {
                grader_district_text : {
                    required: function(){
                        return $('select#grader_district_id').val() == 14;
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
            },

            messages:{
                level_english : "Εφόσον έχετε επιλέξει τη γλώσσα Αγγλικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_french : "Εφόσον έχετε επιλέξει τη γλώσσα Γαλλικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_german : "Εφόσον έχετε επιλέξει τη γλώσσα Γερμανικά, αυτό το πεδίο είναι υποχρεωτικό",
                level_italian : "Εφόσον έχετε επιλέξει τη γλώσσα Ιταλικά, αυτό το πεδίο είναι υποχρεωτικό",
                grader_district_text : "Εφόσον έχετε επιλέξει Άλλη... περιφέρεια, αυτό το πεδίο είναι υποχρεωτικό"
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

    var checkbox_toggle_visibility = function(thebox, wrapper) {
        wrapper.hide();

        if($(this).is(':checked')){
            wrapper.show();
        }

        thebox.on('click', function(){
            if($(this).is(':checked')){
                wrapper.fadeIn();
            } else {
                wrapper.fadeOut();
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
    depandable_fields($('#grader_district_text_wrapper'), $('.grader-form select#grader_district_id'), $('#grader_district_text'), 14);
    depandable_fields($('#grader_district_text_wrapper'), $('.site-form select#grader_district'), $('#grader_district_text'), 14);
    depandable_fields($('#received_permission_wrapper'), $('.site-form select#uses_private_data'), $('#received_permission'), 'yes');
    depandable_fields($('#restricted_access_details_wrapper'), $('.site-form select#restricted_access'), $('#restricted_access_details'), 'yes');

    langs($('#level_english_check'), $('#level_english'));
    langs($('#level_french_check'), $('#level_french'));
    langs($('#level_german_check'), $('#level_german'));
    langs($('#level_italian_check'), $('#level_italian'));

    checkbox_toggle_visibility($('[name=self_proposed]'), $('#why_self_proposed_wrapper'));
    
    propose_myself();

})(jQuery);