var querystate = 1 ; //1. start, 2. query sent n waiting, 3. response got, 4. aborted


var timetaken = 0;  
function add_table_highlight_event(target) {
    var elm = document.getElementsByTagName('td');
    for (var i = 0; i < elm.length; i++) {
        if (window.addEventListener) { //Firefox, Chrome, Safari, IE 10
            elm[i].addEventListener('mouseover', function(d){
                if (this.className == 'suggestions_right') {
                    this.className = 'suggestions_right_highlight' ;
                }
            }, false);
            elm[i].addEventListener('mouseout', function(d){
                if (this.className == 'suggestions_right_highlight') {
                    this.className = 'suggestions_right' ;
                }
            }, false);
            elm[i].addEventListener('mousedown', function(d){
                //replace word
                if (this.className == 'suggestions_right_highlight') {
                   // alert("REPLACE WORD");
                    //var target = document.getElementById('spell_check_result') ;
                    if (target.nodeName == 'A'){
                        var temphtml = target.innerHTML ;
                        target.innerHTML = this.innerHTML.trim() ;
                        this.innerHTML = temphtml ;
                    }
                    else {
                        remove_element('suggestion_container');
                    }
                }
            },false);
        } 
        else if (window.attachEvent) { //IE < 9
            elm[i].attachEvent('mouseover', function(d){
                if (this.className == 'suggestions_right') {
                    this.className = 'suggestions_right_highlight' ;
                }
            });
            elm[i].attachEvent('mouseout', function(d){
                if (this.className == 'suggestions_right_highlight') {
                    this.className = 'suggestions_right' ;
                }
            });
        }
    }
}   


function ajax_post(callback){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "getdatawordink.php";
    var textinput = document.getElementById("spell_check_text").value;
    var vars = "textinput="+textinput;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    var return_data;
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) { // 4- request is done, 200- successfully
		  //  querystate = 3 ;
            callback(hr.responseText);
//			document.getElementById("spell_check_result").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request    
   document.getElementById("loadingimg").style.display = "block" ;
}

function ajax_feedback_send(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "sendfeedback.php";
    var sender = document.getElementById("contact_sender").value;
    var subject = document.getElementById("contact_subject").value ;
    var message = document.getElementById("contact_message").value ;
    var vars = "contact_sender="+sender+"&contact_subject="+subject+"&contact_message="+message;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
   /* hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) { // 4- request is done, 200- successfully
            callback(hr.responseText);
        }
    }
    */
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}

function ajax_get(callback,$item){
    // Create our XMLHttpRequest object
    if (!window.XMLHttpRequest) {
            //window.XMLHttpRequest = function() {
            window.XMLHttpRequest = function() {
            return new ActiveXObject('Microsoft.XMLHTTP');
        };
    }
    var hr = new XMLHttpRequest();

    // Create some variables we need to send to our PHP file
    var url = "getnavcontent.php?navitem=";
    url = url.concat($item);
   // var item = document.getElementById("spell_check_text").value;
   // var vars = "?navitem=" + item ;
    hr.open("GET", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    var return_data;
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) { // 4- request is done, 200- successfully
          //  querystate = 3 ;
            callback(hr.responseText);
//          document.getElementById("spell_check_result").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request

}

function addListeners_responsetext(callback_xyPosiion){
        document.getElementById('spell_check_result').onclick = function(e) {
            e = e || event  ;
            var target = e.target || e.srcElement ;
            if (target.nodeName == 'A'){
                //alert(e.clientX + " , " + e.clientY);
                var pos = Array(e.pageX,e.pageY);
               // alert("IN addListeners_responsetext - " + target.innerHTML);
                callback_xyPosiion(pos,target.rel.substr(1, target.rel.length-1),target);
                return false // prevent url change;
            }
            else {
                remove_element('suggestion_container');
            }
        }  

        document.getElementById('head').onclick = function(e) {
            remove_element('suggestion_container');
        }
        document.getElementById('foot').onclick = function(e) {
            remove_element('suggestion_container');
        }
}

// event listener for buttons
function addListeners(){
    if(window.addEventListener) {
        document.getElementById('spell_check_button').addEventListener("click",spellcheckbutton,false);
        document.getElementById('resume_button').addEventListener("click",resumebutton,false);
        addnavigation_event("rest");
        document.getElementById("lightbox_close_xl").addEventListener("click",closenavbox,false);
        //alert("coming after closenavbox");
       // document.getElementById("send_contact_request_button").addEventListener("click",feedback_send,false);
    } else if (window.attachEvent){ // Added For Inetenet Explorer versions previous to IE9
        document.getElementById('spell_check_button').attachEvent("onclick", spellcheckbutton);
        document.getElementById('resume_button').attachEvent("onclick",resumebutton);
        document.getElementById("lightbox_close_xl").attachEvent("onclick",closenavbox);
        addnavigation_event("IE");
       // document.getElementById("send_contact_request_button").attachEvent("onclick",feedback_send);
    }
    //window.addEventListener('resize', function(event){
    //    setstyle_size();
    //});
    if(window.addEventListener) {
      window.addEventListener('resize', function(event){  
                  setstyle_size();
            }
      );
    }
    else if (window.attachEvent){ // Added For Inetenet Explorer versions previous to IE9
          window.attachEvent('resize', function(event){  
                      setstyle_size();
                }
          );
    } 

    function addnavigation_event($browser){
        document.getElementById('navigation').onclick = function(e) {
            e = e || event  ;
            e.preventDefault();
            var target = e.target || e.srcElement ;
            if (target.nodeName == 'A'){
                show_nav(target.rel) ;
                return false // prevent url change;
            }
        } 
    }

    function show_nav(nav_element){
        //Get data
        ajax_get(show_content,nav_element);
        if(window.addEventListener) {
            document.getElementById("send_contact_request_button").addEventListener("click",feedback_send,false);
        }
        else if (window.attachEvent){ // Added For Inetenet Explorer versions previous to IE9
            document.getElementById("send_contact_request_button").attachEvent("onclick",feedback_send);
        }
        //showdata
        function show_content(nav_content){
            document.getElementById("lb_shadow").style.display = "block" ;
            document.getElementById("lightbox_content_xl").innerHTML = nav_content ;
            document.getElementById("lightbox_xl").style.display = "block" ;
        }        
    }

    function closenavbox(){
        document.getElementById("lb_shadow").style.display = "none" ;
        document.getElementById("lightbox_content_xl").innerHTML = "";
        document.getElementById("lightbox_xl").style.display = "none" ;
    }
    // Write your functions here
    function spellcheckbutton(){ 
        querystate = 2 ; 
        //var oldhtml = document.getElementById('spell_check_text').innerHTML ;
        //callback function
        function get_data(json_data) {
            var json_object = JSON.parse(json_data);
            var response_html   = json_object.html;
            var response_count  = json_object.syn_count;
            var response_time   = json_object.process_time;
            var response_language  = json_object.language;
            var response_syn_array =  json_object.synonyms; 

            timetaken = response_time ;
            
            document.getElementById('spell_check_text').style.display = "none";
            document.getElementById('spell_check_result').style.display = "block";
            document.getElementById("loadingimg").style.display = "none" ;
      //     alert(querystate);
            if(querystate != 4 ){
                insert_html(response_html);
                addListeners_responsetext(callback_xyPosiion);
                querystate = 3;
            }
           // if(querystate == 4){
           //     insert_html(oldhtml);
           // }
            function callback_xyPosiion(pos,wordhash,target){
                display_menu(pos[0],pos[1],wordhash,response_syn_array,target);
            }
        }
        ajax_post(get_data);
        document.getElementById("spell_check_text").readOnly = "true" ;

        document.getElementById('spell_check_button').style.display = "none" ;
        document.getElementById('resume_button').style.display = "block" ; 
        
        document.getElementById('spell_check_hint').style.display = "block";
    }

    function resumebutton(){
        if(querystate == 3){

            var result_text = document.getElementById('spell_check_result').innerHTML ;
            document.getElementById('spell_check_text').innerHTML = result_text ;
            result_text = result_text.replace(/<br>/ig, "\n");
            document.getElementById("spell_check_text").removeAttribute('readOnly');

            document.getElementById("spell_check_text").value = result_text.replace(/(<([^>]+)>)/ig,"") ;
            querystate = 1;
        }
        if(querystate == 2 ){
            //abort ajax request
            querystate = 4;
     //       alert("ABORTING");
            document.getElementById("spell_check_text").removeAttribute('readOnly');
        }

        document.getElementById("loadingimg").style.display = "none" ;
        document.getElementById('spell_check_result').style.display = "none";
        document.getElementById('spell_check_text').style.display = "block";
        document.getElementById('resume_button').style.display = "none" ;
        document.getElementById('spell_check_button').style.display = "block" ;
        document.getElementById("spell_check_result").innerHTML = "" ;
        remove_element('suggestion_container');
        document.getElementById('spell_check_hint').style.display = "none";

       // querystate = 1;

    }
}

function closenavbox_feedback(){
        document.getElementById("lb_shadow").style.display = "none" ;
        document.getElementById("lightbox_content_xl").innerHTML = "";
        document.getElementById("lightbox_xl").style.display = "none" ;

}
function feedback_send(){
    ajax_feedback_send();
    document.getElementById("lightbox_content_xl").innerHTML= "<div id=form_contact><p>Thank you for sending the message.<p><br /><p><strong>Your message is sent successfully.</strong></p></div>";
    setTimeout(function(){
            closenavbox_feedback();
        },3000);            
}

//Main()
window.onload = addListeners; 
document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        document.getElementById("lb_shadow").style.display = "none" ;
        document.getElementById("lightbox_content_xl").innerHTML = "";
        document.getElementById("lightbox_xl").style.display = "none" ;
    }
};
setstyle_size() ;
// End of Main()



function show_time(){
    alert(timetaken);
}


function insert_html(response_text){
    document.getElementById("spell_check_result").innerHTML = response_text;
}

function suggestion_menu_html(response_syn_array,key){
    var htmltext = {};
    htmltext = '<table class="suggestions" classname="suggestions">' ;
    htmltext = htmltext.concat('<tbody>');
    var leftstr ='<td class="suggestions_left" classname="suggestions_left"><img src="img/icon_bullet_green.gif" width="10" height="10"></td>';
    var rightstr = '<td class="suggestions_right" classname="suggestions_right">';

    var words = response_syn_array[key].split(",");
    for(var i=0;i<=words.length -1 ;i++){
       htmltext = htmltext.concat('<tr>');
       htmltext = htmltext.concat(leftstr);
       htmltext = htmltext.concat(rightstr);
       htmltext = htmltext.concat(words[i]);
       htmltext = htmltext.concat('</td>');
       htmltext = htmltext.concat('</tr>');
    }
    htmltext = htmltext.concat('</tbody></table>');
    return htmltext ;
}


function add_element(matchClass, content, xPos,yPos,target) {
    var elems = document.getElementsByTagName('*'), i;
    for (i in elems) {
        if((' ' + elems[i].className + ' ').indexOf(' ' + matchClass + ' ')> -1) {
            elems[i].innerHTML = content;
            elems[i].style.display = 'block';
            elems[i].style.left = xPos + 'px' ;
            elems[i].style.top  = yPos + 'px' ;
        }
    }
    add_table_highlight_event(target);
}

function remove_element(matchClass){
    var elems = document.getElementsByTagName('*'), i;
    for (i in elems) {
        if((' ' + elems[i].className + ' ').indexOf(' ' + matchClass + ' ')> -1) {
            elems[i].innerHTML = "" ;
            elems[i].style.display = 'none';
        }
    }
}

function display_menu(xPos,yPos,wordhash,syn_array,target){
    menuhtml = suggestion_menu_html(syn_array,wordhash);
    add_element('suggestion_container',menuhtml,xPos,yPos,target);
}


function getViewPort () {
    return document.body.offsetWidth ? {
            width: document.body.offsetWidth,
            height: document.body.offsetHeight
        }
         : {
            width: window.innerWidth,
            height: window.innerHeight
        }
}


function setstyle_size () {
    var a = getViewPort();
    var availableHeight = document.getElementById("head").offsetHeight + document.getElementById("foot").offsetHeight ;
    var availableWidth =  document.getElementById("tools").offsetWidth + document.getElementById("column").offsetWidth ;    
    //Events.observe(window, 'resize', this._setSize.bind(this))
    var d = a.height - availableHeight;
    d = (d < 0) ? 0 : d;
    document.getElementById("dynamic_area").style.height = d + 'px' ;
    var c = a.width  - availableWidth  - 34,
        e = a.height - availableHeight - 18,
        b = a.height - availableHeight - 14,
        f = a.width  - availableWidth  - 10;
    c = (c < 0) ? 0 : c;
    e = (e < 0) ? 0 : e;
    f = (f < 0) ? 0 : f;
    e = (b < 0) ? 0 : b;

    document.getElementById("spell_check_text").style.width     = f + 'px' ;
    document.getElementById("spell_check_text").style.height    = b + 'px' ;
    document.getElementById("spell_check_result").style.width   = f + 'px' ;
    document.getElementById("spell_check_result").style.height  = b + 'px' ;
}


