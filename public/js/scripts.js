(function($){
    
    var confirm_form = function(){
    
        var grader_field = $('input#grader_email'),
            grader_notify = $('select#notify_grader');

        $('#confirmMe').validate({
            rules: {
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
                level_italian : "Εφόσον έχετε επιλέξει τη γλώσσα Ιταλικά, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        
        $('#confirmAlpha-1').validate({
            rules: {
                why_not_educational : {
                    required: function(){
                        return $('select.is_educational-1').val() == 'no';
                    }
                }
            },
            messages:{
                why_not_educational: "Εφόσον έχετε επιλέξει ότι ο ιστότοπος δεν είναι εκπαιδευτικός, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmAlpha-2').validate({
            rules: {
                why_not_educational : {
                    required: function(){
                        return $('select.is_educational-2').val() == 'no';
                    }
                }
            },
            messages:{
                why_not_educational: "Εφόσον έχετε επιλέξει ότι ο ιστότοπος δεν είναι εκπαιδευτικός, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmAlpha-3').validate({
            rules: {
                why_not_educational : {
                    required: function(){
                        return $('select.is_educational-3').val() == 'no';
                    }
                }
            },
            messages:{
                why_not_educational: "Εφόσον έχετε επιλέξει ότι ο ιστότοπος δεν είναι εκπαιδευτικός, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmAlpha-4').validate({
            rules: {
                why_not_educational : {
                    required: function(){
                        return $('select.is_educational-4').val() == 'no';
                    }
                }
            },
            messages:{
                why_not_educational: "Εφόσον έχετε επιλέξει ότι ο ιστότοπος δεν είναι εκπαιδευτικός, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        
        $('#confirmCanEvaluate-1').validate({
            rules: {
                why_not : {
                    required: function(){
                        return $('select.can_evaluate-1').val() == 'no';
                    }
                }
            },
            messages:{
                why_not: "Εφόσον έχετε επιλέξει ότι ΔΕΝ επιθυμείτε να αξιολογήσετε τον Ιστότοπο, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmCanEvaluate-2').validate({
            rules: {
                why_not : {
                    required: function(){
                        return $('select.can_evaluate-2').val() == 'no';
                    }
                }
            },
            messages:{
                why_not: "Εφόσον έχετε επιλέξει ότι ΔΕΝ επιθυμείτε να αξιολογήσετε τον Ιστότοπο, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmCanEvaluate-3').validate({
            rules: {
                why_not : {
                    required: function(){
                        return $('select.can_evaluate-3').val() == 'no';
                    }
                }
            },
            messages:{
                why_not: "Εφόσον έχετε επιλέξει ότι ΔΕΝ επιθυμείτε να αξιολογήσετε τον Ιστότοπο, αυτό το πεδίο είναι υποχρεωτικό"
            }
        });
        $('#confirmCanEvaluate-4').validate({
            rules: {
                why_not : {
                    required: function(){
                        return $('select.can_evaluate-4').val() == 'no';
                    }
                }
            },
            messages:{
                why_not: "Εφόσον έχετε επιλέξει ότι ΔΕΝ επιθυμείτε να αξιολογήσετε τον Ιστότοπο, αυτό το πεδίο είναι υποχρεωτικό"
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
            
            var grader_last_name = $('#grader_last_name'),
                    grader_name = $('#grader_name'),
                    grader_district = $('#grader_district'),
                    grader_email = $('#grader_email');

            if(the_checkbox.is(':checked')){

                var contact_last_name_val = $('#contact_last_name').val(),
                    contact_name_val = $('#contact_name').val(),
                    district_id_val = $('#district_id').val(),
                    contact_email_val = $('#contact_email').val();

                if(contact_last_name_val.length > 0){
                    grader_last_name.val(contact_last_name_val).prop('readonly', true);
                }
                if(contact_name_val.length > 0){
                    grader_name.val(contact_name_val).prop('readonly', true);
                }
                if(district_id_val.length > 0){
                    grader_district.val(district_id_val).find('option:not(:selected)').attr('disabled', true);
                    
                }
                if(contact_email_val.length > 0){
                    grader_email.val(contact_email_val).prop('readonly', true);
                }
                
            } else {
                if(grader_last_name.val().length > 0){
                    grader_last_name.val('').prop('readonly', false);
                }
                if(grader_name.val().length > 0){
                    grader_name.val('').prop('readonly', false);
                }
                if(grader_email.val().length > 0){
                    grader_email.val('').prop('readonly', false);
                }
                if(grader_district.val().length > 0){
                    grader_district.val('').find('option:not(:selected)').attr('disabled', false);
                }
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
    
    var funky_charts = function(){
        var pie_pieces = [],
            rows = [],
            legend_items = [];
        
        $('.ct-chart-pie .ct-series').each(function(index){
            pie_pieces[index] = '.' + $(this).attr('class').replace(' ', '.');
        });
        pie_pieces.reverse();
        
        $('.stats-cats-row').each(function(index){
           rows[index] = $(this).attr('id');
        });
        
        $('.pie-legend-item').each(function(index){
            legend_items[index] = $(this).attr('id');
        });
        
        $('.pie-legend-item').on('mouseover', function(){
            var $this = $(this),
                legend_item_id = $this.attr('id'),
                the_index = legend_items.indexOf(legend_item_id);
            
            $(pie_pieces[the_index]).siblings('.ct-chart-pie .ct-series').css({'opacity':'.2'});
        });
        
        $('.pie-legend-item').on('mouseleave', function(){
            $('.ct-series').css({'opacity':'1'});
        });
        
        $('.stats-cats-row').on('mouseover', function(){
            var $this = $(this),
                row_id = $this.attr('id'),
                the_index = rows.indexOf(row_id);
            
            $(pie_pieces[the_index]).siblings('.ct-chart-pie .ct-series').css({'opacity':'.2'});
            
        });
        
        $('.stats-cats-row').on('mouseleave', function(){
            $('.ct-series').css({'opacity':'1'});
        });
        
        
    };
    
    var dynamic_grade = function(){
        
        var wrapper = $('.dynamic-criterion-grade-wrapper'),
            grade = $('.dynamic-criterion-grade'),
            grade_select = $('.criterion-wrapper select'),
            total_grade = 0,
            arr = [];
        
        wrapper.show();
        grade.text('0%');
        
        grade_select.on('change', function(){
            var $this = $(this),
                the_name = $this.attr('name'),
                the_label = $('label[for=' +the_name+ ']'),
                the_label_text = the_label.text(),
                the_value = $this.val(),
                the_number = the_label_text.substring(the_label_text.length-4, the_label_text.length-2);
            
            if(the_value == ''){
                the_value = 0;
            }
            
            arr[the_label_text] = the_value * the_number;
            
            total_grade += the_value * the_number;
            
        });
        
    };
    
    confirm_form();
    depandable_fields($('#received_permission_wrapper'), $('.site-form select#uses_private_data'), $('#received_permission'), 'yes');
    depandable_fields($('#restricted_access_details_wrapper'), $('.site-form select#restricted_access'), $('#restricted_access_details'), 'yes');

    langs($('#level_english_check'), $('#level_english'));
    langs($('#level_french_check'), $('#level_french'));
    langs($('#level_german_check'), $('#level_german'));
    langs($('#level_italian_check'), $('#level_italian'));

    checkbox_toggle_visibility($('[name=self_proposed]'), $('#why_self_proposed_wrapper'));
    
    propose_myself();
    
    //dynamic_grade();
    
    // Data tables
    $('#sites-table').dataTable({
        "dom": 'lfriptip',
        "language": {
            "sProcessing":   "Επεξεργασία...",
            "sLengthMenu":   "Εμφάνισε _MENU_ εγγραφές",
            "sZeroRecords":  "Δεν βρέθηκαν εγγραφές που να ταιριάζουν",
            "sInfo":         "Εμφανίζονται _START_ εως _END_ από _TOTAL_ εγγραφές",
            "sInfoEmpty":    "Εμφανίζονται 0 έως 0 από 0 εγγραφές",
            "sInfoFiltered": "(φιλτραρισμένες από _MAX_ συνολικά εγγραφές)",
            "sInfoPostFix":  "",
            "sSearch":       "Αναζήτηση:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Πρώτη",
                "sPrevious": "Προηγούμενη",
                "sNext":     "Επόμενη",
                "sLast":     "Τελευταία"
            }
        },
        "pageLength": 100
    }).columnFilter();
    
    $('#graders-table').dataTable({
        "dom": 'lfriptip',
        "language": {
            "sProcessing":   "Επεξεργασία...",
            "sLengthMenu":   "Εμφάνισε _MENU_ εγγραφές",
            "sZeroRecords":  "Δεν βρέθηκαν εγγραφές που να ταιριάζουν",
            "sInfo":         "Εμφανίζονται _START_ εως _END_ από _TOTAL_ εγγραφές",
            "sInfoEmpty":    "Εμφανίζονται 0 έως 0 από 0 εγγραφές",
            "sInfoFiltered": "(φιλτραρισμένες από _MAX_ συνολικά εγγραφές)",
            "sInfoPostFix":  "",
            "sSearch":       "Αναζήτηση:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Πρώτη",
                "sPrevious": "Προηγούμενη",
                "sNext":     "Επόμενη",
                "sLast":     "Τελευταία"
            }
        },
        "pageLength": 100
    }).columnFilter();

    $('.stats-table').dataTable({
        paging: false,
        searching: false,
        info: false
    });
    
    $('.admin-table tfoot tr').addClass('pure-form').insertAfter('.admin-table thead');
    $('.dataTables_filter').addClass('pure-form');
    
    $( window ).load(function() {
        funky_charts();
    });

})(jQuery);