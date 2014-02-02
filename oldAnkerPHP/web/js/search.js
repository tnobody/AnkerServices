function kid_in_json(needle, haystack){
    for(i=0;i<haystack.length;i++){        
        if(haystack[i].id == needle) {
            return haystack[i];
        }
    }
    return false;
} 

$(document).ready(function()
    {   
        $('#search input[type="submit"]').hide();
               
        $.getJSON('suggest', function(data) {
            // insert items if query param is prepopulated            
            strParamName = "query";
            // is there a param "query""
            if (window.location.search.search(strParamName) > -1 ){
                qString = window.location.search.
                    substr(1,window.location.search.length).split("&");
            } else {
                qString = null;
            }
            
            // if so add tokenitems foreach single item in "query"
            str = null; 
            if (qString != null) {                
                for (var i=0; i < qString.length; i++) {
                    if (escape(unescape(qString[i].split("=")[0])) == strParamName){
                        returnVal = qString[i].split("=")[1];
                        break;
                    }
                } 
                
                if(returnVal.length > 0) {
                    elements = returnVal.match(/([k]{1,2}_\d+)/g);
                    // if there are matching ids in the parameter
                    if(elements && elements.length) {
                        // build prepopulate string
                        str = "["                
                        for(var item in elements) {
                            if(data_item = kid_in_json(elements[item], data)) {
                                str += '{"id": "' + data_item.id + '", "name": "' + data_item.name + '"},';
                            } else {
                                // item is not in list
                            }
                        }
                        // more than the initial "["
                        if(str.length > 1) {
                            str = str.substr(0, str.length-1) 
                        }                        
                        str += "]";  
                    }                                  
                }              
            } 
            
            $('#search_keywords').tokenInput(data, {
                prePopulate: eval(str),
                onAdd: function() {
                    getContent();
                },
                onDelete: function() {
                    getContent();
                }
            });
            
            $('#search_keywords').focus();
           
           // fetch content if prepopulated
           if(str) {
               getContent();
           }           
           
        });

        function getContent() {
            $('#loader').show();
            var q = $('#search_keywords').val();

            $('#kompetenzen_results').load(
                $('#search form').attr('action'), {
                    query: q
                }, function() {
                    $('#loader').hide();
                    // take this in here to check also new content
                    listener();
                });
        }
        
        function listener() {
            $('div.profil_item_remember_this input[type="button"]').click(function() {
                elem = $('#' + this.id);
                id = this.id.split('_');
                id = id[id.length - 1];
                query = $('#search_keywords').val();
                if(query) {
                    $('#ajax-loader_' + id).show();
                    elem = $('#profil_item_remember_this_button_' + id);
                    elem.prop('value', 'Eintrag wird gespeichert');
                    elem.prop('disabled', true);
                    $.post(app + 'favoriten/add/' + id + '/' + query , function(data) {
                        if(data == true) {
                            elem.prop('value', 'In Merkliste gespeichert');
                        } else {
                            alert('Eintrag konnte nicht auf die Merkliste gesetzt werden');
                            elem.prop('value', 'Als Favorit markieren');
                            elem.prop('disabled', false);
                        }
                        $('#ajax-loader_' + id).hide();
                    });
                }                
            });
        }
        
        // execute it to activate it
        listener();
        
    });


