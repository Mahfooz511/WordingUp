var moredata = {
	target: {},
	initialize: function(){
		$(".moredata_close").click(this.hidemoredata.bind(this));
	},
	moredata_getdata: function(target,pos,key){
		suggestionbox.hidesuggestion();
		parentobj = this;
		this.target = target ;
		var words = resultpad.mydata.synonyms[key].split(",");
		var word = words[0];
    	$.ajax({
	    	type: "POST",
	    	url: "./getmoredata.php/",
	    	data: "wordinput=" + word , 
	   		dataType: "json",
	   		success: function(data,status,ajxhr) {
	   			htmlstring = parentobj._get_moredata_html(data);
            	$("#moredata_content").html(htmlstring);
            	$("#moredata").css('top', pos[1]);
				$("#moredata").css('left', pos[0]);
				var htmlstring = '<a href="http://www.wordnik.com/words/' + word.toLowerCase() 
								 + '" target="_blank">' + word + '</a>' ;
				$("#moredata_title").html(htmlstring);
            	parentobj._moredata_word_click();
            	$("#moredata").show();
	   		}
		}) ; 
	},
	hidemoredata: function(){
		$("#moredata").hide();
	},
	_get_moredata_html: function(data) {
		htmlstring = "";
		if(data.SYNONYM.length != 0){
			htmlstring = htmlstring + "<p class=moredata_content_title>SYNONYM</p>" ;
			count = 0 ;
			data.SYNONYM.map( function(item) {
     			htmlstring = htmlstring + "<a class=moredata_content_word href=# >" + item + "</a>" ;
     			count++ ;
     			if((count % 4) == 0) htmlstring = htmlstring + "</br>";
			});
		}
		if(data.ANTONYM.length != 0){
			htmlstring = htmlstring + "<p class=moredata_content_title>ANTONYM</p>" ;
			count = 0 ;
			data.ANTONYM.map( function(item) {
     			htmlstring = htmlstring + "<a class=moredata_content_word href=# >" + item + "</a>" ;
     			count++ ;
     			if((count % 4) == 0) htmlstring = htmlstring + "</br>";
			});
		}
		if(data.HYPERNYM.length != 0){
			htmlstring = htmlstring + "<p class=moredata_content_title>HYPERNYM</p>" ;
			count = 0 ;
			data.HYPERNYM.map( function(item) {
     			htmlstring = htmlstring + "<a class=moredata_content_word href=# >" + item + "</a>" ;
     			count++ ;
     			if((count % 4) == 0) htmlstring = htmlstring + "</br>";
			});
		}
		if(data.DEFINITION.length != 0){
			htmlstring = htmlstring + "<p class=moredata_content_title>DEFINITION</p>" ;
			data.DEFINITION.map( function(item) {
     			htmlstring = htmlstring + "<p class=moredata_content_definition  >" + item + "</p></br>" ;
			});
		}
		return htmlstring ;
	},
	_moredata_word_click: function(){
		var parentobj = this;
	    var elm = jQuery('a') ;	
	    for (var i = 0; i < elm.length; i++) {
	            $(elm[i]).click(function(event){	
	            	event.preventDefault();
	                //replace word
	                if (this.className == 'moredata_content_word') {
	                    if (parentobj.target.nodeName == 'A'){
	                        var temphtml = $(parentobj.target).html() ;
	                        var newword  =  $(this).html().trim().replace(/<\/?[^>]+(>|$)/g, "")  ;
	                        $(parentobj.target).html( newword );
	                        suggestionbox.add_selectedwords(temphtml,newword);
	                        tools.wordschanged++ ;
	                    }
	                }
	            });
	    }
	},
};

var suggestionbox =  {
	target: {} ,
	initialize: function(target,pos,linknum) {		
		this.target = target ;
		this._table_highlight_event(target,pos,linknum) ;
		this._table_highlight_event(target,pos,linknum) ;
	},

	_table_highlight_event:  function (target,pos,linknum) {
		var parentobj = this;
	    var elm = jQuery('td') ;	
	    for (var i = 0; i < elm.length; i++) {
	    		$(elm[i]).mouseover(function(){
	                if (this.className == 'suggestions_right') {
	                    this.className = 'suggestions_right_highlight' ;
	                }
	            });
	            $(elm[i]).mouseout(function(){
	                if (this.className == 'suggestions_right_highlight') {
	                    this.className = 'suggestions_right' ;
	                }
	            });
	            $(elm[i]).mousedown(function(){
	                //replace word
	                if (this.className == 'suggestions_right_highlight') {
	                    if (target.nodeName == 'A'){
	                        var temphtml = $(target).html() ;
	                        var newword  =  $(this).html().trim().replace(/<\/?[^>]+(>|$)/g, "")  ;
	                        $(target).html( newword );
	                        parentobj.add_selectedwords(temphtml,newword);
	                        tools.wordschanged++ ;
	                    }
	                }
	                if(this.className == 'suggestions_ignore_container'){
	                	moredata.moredata_getdata(target,pos,linknum).bind(this);
	                }
	            });
	    }
	},
	
	add_selectedwords: function(word,newword){
		var loword = word.toLowerCase();
		var lonewword = newword.toLowerCase();
		var htmlstring = '<a href="http://www.wordnik.com/words/' 
						+ loword + '" target="_blank">' + word + '</a> <img  src="./img/rightarrow.gif"> '
						+ '<a href="http://www.wordnik.com/words/' 
						+ lonewword + '" target="_blank">' + newword + '</a></br>' ;
		if(loword  != newword) $("#selectedwords").append(htmlstring);
	},

	hidesuggestion: function(){
		$("#suggestion_container_tb").hide();
	},

} ;

var resultpad = {	
	mydata: {},
	initialize: function() {
		$("#resume_button").click(this._resume_button_click.bind(this));
		this._listener();
	},

	_htmlEnDeCode: function(value) {
	    var charToEntityRegex,
	        entityToCharRegex,
	        charToEntity,
	        entityToChar;
	    function resetCharacterEntities() {

	        charToEntity = {};
	        entityToChar = {};
	        // add the default set
	        addCharacterEntities({
	            '&amp;'     :   '&',
	            '&gt;'      :   '>',
	            '&lt;'      :   '<',
	            '&quot;'    :   '"',
	            '&#39;'     :   "'"
	        });
	    }

	    function addCharacterEntities(newEntities) {
	        var charKeys = [],
	            entityKeys = [],
	            key, echar;
	        for (key in newEntities) {
	            echar = newEntities[key];
	            entityToChar[key] = echar;
	            charToEntity[echar] = key;
	            charKeys.push(echar);
	            entityKeys.push(key);
	        }
	        charToEntityRegex = new RegExp('(' + charKeys.join('|') + ')', 'g');
	        entityToCharRegex = new RegExp('(' + entityKeys.join('|') + '|&#[0-9]{1,5};' + ')', 'g');
	    }

	    function htmlDecode(value) {
        	var htmlDecodeReplaceFn = function(match, capture) {
          	  return (capture in entityToChar) ? entityToChar[capture] : String.fromCharCode(parseInt(capture.substr(2), 10));
        	};

        	return (!value) ? value : String(value).replace(entityToCharRegex, htmlDecodeReplaceFn);
    	}

	    resetCharacterEntities();

	    return htmlDecode(value);
	} ,
	
	_resume_button_click: function(){
			var result_text = $("#synonym_check_result").html();
			result_text = result_text.replace(/<br>/ig, "\n");		
			result_text = result_text.replace(/(<([^>]+)>)/ig,"") ;
			result_text = this._htmlEnDeCode(result_text);
			$("#synonym_check_result").html("");			
			$("#synonym_check_text").val(result_text) ;
			$("#synonym_check_text").attr("readonly",false);
            $("#synonym_check_result").hide();
            $("#synonym_check_button, #synonym_check_text").show();
            suggestionbox.hidesuggestion();
            moredata.hidemoredata();
            $("#resume_button, #check_hint").hide();
            tools.colorin();
	}, 

	_listener: function() {
		var parentobj = this ;
		$("#synonym_check_result").click(function(event){					
			event.preventDefault();
			var target = event.target ;
			if(target.nodeName == 'A'){
    			var linkval = $(target).attr('rel') ;
    			var linknum = linkval.substr(1, linkval.length-1) ; //w0 w1
    			var pos = Array(event.pageX, event.pageY);
				var menuhtml =  parentobj._getmenuhtml(linknum);
    			parentobj._add_element('suggestion_container',menuhtml,pos[0],pos[1],target);
    			suggestionbox.initialize(target,pos,linknum) ;
    			moredata.hidemoredata();
			}
            else {            	
        		suggestionbox.hidesuggestion();
        		moredata.hidemoredata();

    	    }
    	});
    },

    _getmenuhtml: function(key) {
	    var htmltext = {};
	    htmltext = '<table class="suggestions" classname="suggestions">' ;
	    htmltext = htmltext.concat('<tbody>');
	    var leftstr ='<td class="suggestions_left" classname="suggestions_left"><img src="img/icon_bullet_green.gif" width="10" height="10"></td>';
	    var rightstr = '<td class="suggestions_right" classname="suggestions_right">';

	    var words = this.mydata.synonyms[key].split(",");
	    for(var i=0;i<=words.length -1 ;i++){
	       htmltext = htmltext.concat('<tr>');
	       htmltext = htmltext.concat(leftstr);
	       htmltext = htmltext.concat(rightstr);
	       if(i == 0 ) {
	       	htmltext = htmltext + "<strong>" + words[i] + "</strong>" ;
		   }else{
	       	htmltext = htmltext.concat(words[i]);
	   	   }
	       htmltext = htmltext.concat('</td>');
	       htmltext = htmltext.concat('</tr>');
	    }
	    htmltext = htmltext +  '<td colspan="2" class="suggestions_ignore_container" classname="suggestions_ignore_container"> <span class="suggestions_ignore">More of the Word "<span style="color: #F69">' + words[0] +'</span>"</span> </td>' ;
	    htmltext = htmltext.concat('</tbody></table>');
	    return htmltext ;
	},

	_add_element: function (matchClass, content, xPos,yPos,target) {
		//var elems = document.getElementsByTagName('*'), i ;
	   /* for (i in elems) {
	        if((' ' + elems[i].className + ' ').indexOf(' ' + matchClass + ' ')> -1) {
	            elems[i].innerHTML = content;
	            elems[i].style.display = 'block';
	            elems[i].style.left = xPos + 'px' ;
	            elems[i].style.top  = yPos + 'px' ;
	        }
	    }
	    */
	    $("#suggestion_container_tb").html(content);
	    $("#suggestion_container_tb").css('left', xPos);
	    $("#suggestion_container_tb").css('top' , yPos);
	    $("#suggestion_container_tb").show();

	},
};

var textpad = {
	initialize: function() {
		$( "#synonym_check_button" ).click(this._synonym_button_click.bind(this)) ;
	},

	_synonym_button_click: function() {
        this.textinput =  $("#synonym_check_text").val();

		$.ajax({
	    	type: "POST",
	    	url: "./getdatawordink.php/",
	    	data: "textinput=" + encodeURIComponent(this.textinput),
	   		dataType: "json",
	   		success: function(data,status,ajxhr) {
	   			//data = {html,syn_count, process_time, language, synonyms}
            	misc_tools.timetaken = data.process_time ;
            	$("#synonym_check_text, #loadingimg").hide();
            	$("#synonym_check_result").show();
               	$("#synonym_check_result").html(data.html);
               	resultpad.mydata = data ; 
	   		}
		}) ; 
        $( "#synonym_check_text" ).attr('readonly','readonly');
        $( "#synonym_check_button").hide();
        $( "#resume_button, #check_hint, #loadingimg" ).show();        
        tools.wordschanged = 0 ;
        tools.grayout();
    }
} ;

var misc_tools = {
	initialize: function() {
		this._timecheck_clicked();
		this._escapekey();
	},

	timetaken: 0,
	_timecheck_clicked: function(){
		var parent = this;
		$("#tmcheck").click(function(){
			alert(parent.timetaken);
		});
	},

	_escapekey : function() {
		var parent = this ;
		$(document).keyup(function(event){
	    	if (event.keyCode === 27) {
        		navigation.hide_nav();
        		suggestionbox.hidesuggestion(); 
        		moredata.hidemoredata();
        		tools.hide_info();    	
        		$("#lightbox_moredata").hide();
    		}
		});
	},
};

var navigation = {
	initialize : function() {
		$('#navigation').click(this._navlistener.bind(this));
		$("#lightbox_close_xl").click(this.hide_nav.bind(this));
	},
	_navlistener : function(event) {
		event.preventDefault();
        var target = event.target ;
        if (target.nodeName == 'A'){
	        this._show_nav(target.rel) ;
        }
	},

	_show_nav: function(nav_element){
        $.ajax({
	    	type: "GET",
	    	url: "./getnavcontent.php",
	    	data: "navitem=" + nav_element,
	   		success: function(data,status,ajxhr) {
	   			$("#lightbox_content_xl").html("");
	   			if(nav_element == "about") {
	   				$("#lightbox_title_xl").html("About");
	   			} else if(nav_element == "tos") {
	   				$("#lightbox_title_xl").html("Disclaimer");
	   			} else if(nav_element == "privacy") {
	   				$("#lightbox_title_xl").html("Privacy");
	   			} else if(nav_element == "contact"){
	   				$("#lightbox_title_xl").html("Contact");
	   			} ;
            	$("#lightbox_content_xl").html(data);
            	$("#lightbox_content_xl, #lb_shadow, #lightbox_xl").show();
	   		}
		}) ;    
    },

    hide_nav: function(){
		$("#lb_shadow, #lightbox_content_xl, #lightbox_xl" ).hide();
	}

};

var tools = {
	initialize: function(){
		$("#info").click(this._info.bind(this));
		$("#mail").click(this._mail.bind(this));
		$("#tweet").click(this._tweet.bind(this));
		$("#lightbox_close_m").click(this.hide_info.bind(this));
	},

	chars:  0,
	words:  0,
	sentances:  0,
	lines:  0,
	wordschanged:  0 ,

	_calctextinfo: function(){
		var text = $("#synonym_check_text").val() ;		
		this.chars = text.length ;
        this.words = this._countwords(text) ;
        this.sentances = this._countsentances(text);
        this.lines = (text == '') ? 0 : (text.split('\n').length) ;
	},

	_countsentances: function(s){
		if(s == "") return 0;
		s = s.replace(/[\!\?]/gi,".");
		return s.split('.').length -1;
	},
	_countwords: function(s){
		if(s == "") return 0;
	    s = s.replace(/(^\s*)|(\s*$)/gi,"");
		s = s.replace(/\n/," ");
		s = s.replace(/[ ]{2,}/gi," ");//2 or more space to 1
	    return s.split(' ').length ; 
	},
	
	_info: function(){
		this._calctextinfo();
		var htmltext = ""; 
		htmltext = htmltext + "<dl><dt>Words Replaced:</dt><dd>" + this.wordschanged + "</dd></dl>" ;
		htmltext = htmltext + "<dl><dt>Characters:</dt>    <dd>" + this.chars + "</dd></dl>" ;
		htmltext = htmltext + "<dl><dt>Words:</dt>         <dd>" + this.words + "</dd></dl>" ;
		htmltext = htmltext + "<dl><dt>Sentences:</dt>     <dd>" + this.sentances + "</dd></dl>" ;
		htmltext = htmltext + "<dl><dt>Lines:</dt>         <dd>" + this.lines + "</dd></dl>" ;

		$("#lightbox_content_m").html(htmltext);
		$("#lightbox_title_m").html("Text Info");
		$("#lb_shadow, #lightbox_content_m, #lightbox_m").show();
	},

	hide_info: function(){
		$("#lb_shadow, #lightbox_content_m, #lightbox_m").hide();
	},
	
	_mail: function() {
		var text = $("#synonym_check_text").val().replace(/\n/ig, "%0D%0A");
		$(location).attr('href','mailto:?body='+text);
	},
	
	_tweet: function() {
		var text = $("#synonym_check_text").val().replace(/\n/ig, "%0D%0A"); 
		var tw_url = "https://twitter.com/intent/tweet?text=" + text;   
      	var windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes',
      		width = 550,
      		height = 420,
      		winHeight = screen.height,
      		winWidth = screen.width;
    	var m, left, top;
        left = Math.round((winWidth / 2) - (width / 2));
        top = 0;
        if (winHeight > height) {
          top = Math.round((winHeight / 2) - (height / 2));
        }
        window.open(tw_url, 'intent', windowOptions + ',width=' + width +
                            ',height=' + height + ',left=' + left + ',top=' + top);
   	},

	grayout: function(){
		$("#info, #mail, #tweet").hide();
		$("#info_gray, #mail_gray, #tweet_gray").fadeTo(1,0.4);
		$("#info_gray, #mail_gray, #tweet_gray").css('cursor', 'not-allowed');
		$("#info_gray, #mail_gray, #tweet_gray").show();
	},
	colorin: function() {
		$("#info_gray, #mail_gray, #tweet_gray").hide();
		$("#info, #mail, #tweet").show();
	},
};

var Size = {
	initialize: function() {
        this._setSize();
        $(window).resize(this._setSize.bind(this));
	},
	_setSize: function() {
		var a = this._getViewPort();
	    var availableHeight = $( "#head" ).height() + $( "#foot" ).height() ; 
	    var availableWidth =  $( "#tools" ).width() + $( "#column" ).width() ; 
	    var d = a.height - availableHeight;
	    d = (d < 0) ? 0 : d;
	    $( "#dynamic_area" ).height(d); 
	    var b = a.height - availableHeight - 14,
	        f = a.width  - availableWidth  - 10;
	    f = (f < 0) ? 0 : f;
    	$("#synonym_check_text").width(f);	
	    $("#synonym_check_text").height(b);
	    $("#synonym_check_result").width(f);
	    $("#synonym_check_result").height(b);
   },
	_getViewPort: function () {
      /*return document.body.offsetWidth ? {
           // width: document.body.offsetWidth,
           //height: document.body.offsetHeight
           width: $(window).width(),
           height: $(window).height()
        }
         : {
            width: window.innerWidth,
            height: window.innerHeight
        }*/
        return {
        	width: $(window).width(), 
        	height: $(window).height()
        }
	},
};

var wordingup = { };
wordingup.initialize = function(){
	Size.initialize();
	textpad.initialize();
	misc_tools.initialize();
	resultpad.initialize();
	moredata.initialize();
	navigation.initialize();
	tools.initialize();
};

$(document).ready(function(){
	wordingup.initialize();
});

