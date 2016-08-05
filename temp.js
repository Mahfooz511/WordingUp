_moredata_word_click:  function (target) {
		var parentobj = this;
	    var elm = jQuery('td') ;	
	    for (var i = 0; i < elm.length; i++) {
	            $(elm[i]).mousedown(function(){
	                //replace word
	                if (this.className == 'moredata_content') {
	                    if (target.nodeName == 'A'){
	                        var temphtml = $(target).html() ;
	                        var newword  =  $(this).html().trim().replace(/<\/?[^>]+(>|$)/g, "")  ;
	                        $(target).html( newword );
	                        parentobj._add_selectedwords(temphtml,newword);
	                        tools.wordschanged++ ;
	                    }
	                }
	            });
	    }
	},


_moredata_word_click: function() {
		var parentobj = this ;
		$("#moredata_content").click(function(event){					
			event.preventDefault();
			var target = event.target ;
			if(target.nodeName == 'A'){
    			var linkval = $(target).attr('rel') ; //to add this
    			var linknum = linkval.substr(1, linkval.length-1) ; //w0 w1
    			//var pos = Array(event.pageX, event.pageY);
				var menuhtml =  parentobj._getmenuhtml(linknum);
    			parentobj._add_element('suggestion_container',menuhtml,pos[0],pos[1],target);
    			suggestionbox.initialize(target,pos,linknum) ;
    			suggestionbox.hidemoredata();
			}
            else {            	
        		suggestionbox.hidesuggestion();
        		suggestionbox.hidemoredata();

    	    }
    	});
    },	