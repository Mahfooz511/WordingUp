<?php 


function get_variable($name=NULL, $value=false, $option="default")
{
    $option=false; // Old version depricated part
    $content=(!empty($_GET[$name]) ? trim($_GET[$name]) : (!empty($value) && !is_array($value) ? trim($value) : false));
    if(is_numeric($content))
        return preg_replace("@([^0-9])@Ui", "", $content);
    else if(is_bool($content))
        return ($content?true:false);
    else if(is_float($content))
        return preg_replace("@([^0-9\,\.\+\-])@Ui", "", $content);
    else if(is_string($content))
    {
        if(filter_var ($content, FILTER_VALIDATE_URL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_EMAIL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_IP))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_FLOAT))
            return $content;
        else
            return preg_replace("@([^a-zA-Z0-9\+\-\_\*\@\$\!\;\.\?\#\:\=\%\/\ ]+)@Ui", "", $content);
    }
    else false;
    
}  

	$navitem = get_variable("navitem") ;
write_log($navitem) ;
	$navcontent = array() ;
	$navcontent["about"] = '<div id=about><h3>About The Site:</h3><p>   I created this site to fulfill my own need. There are many occasions when we need to make our documents, email, status updates etc. more effective with alternate stronger words. There are sites and tools available to check misspelling and get synonyms for a single word but they are not very convenient. Using this website you can just copy-paste or type in your text and click the button. Within seconds all those words for which Synonyms are found will be highlighted. Now, just click those words you think should be replaced with better word and select the appropriate word from the menu.</p>
	<br />
	<h3>About The Creator:</h3><p>    My name is Mahfooz. I am an IT professional with a high level of enthusiasm for technology. I have more than 12 years of experience in IT. I have experience in various fields of IT like Developement, Business Analyst, Project Management, Networking, System Admin etc. 
	<br /><br />You can contact me on <a href="https://www.facebook.com/mahfooz.khan.54" target="_   blank" rel="me">Facebook</a>, <a href="https://twitter.com/mahfoozk" target="_blank" rel="me">Twitter</a>, <a href="https://www.linkedin.com/pub/mahfooz-khan/19/21b/325" target="_blank" rel="me">LinkedIn</a>. Or just send email to <a href="mailto:mail@wordingup.com">mail@wordingup.com</a>.</p>
	<br />
	<h3>Hints:</h3><p>    1. In background we have not implemented any linguistic intelligence. The synonyms you see comes from the database and they can be out of context.
	<br />    2. Some words do not get synonym because they are not in their simple form. For example word "climbed" would not get any synonym but word "climb" would. Similarly, word "beautifully" wont get any synonym but word "beautiful" will get. Edit words just to get synonyms and then change your text later.
	<br />    3. We do not check spelling. Spell check option is enabled and it totally depends on the browser you are using.
	<br />    4. We are aware about some bugs this tool has and we are working to rectify them. At the moment this site has some issues in IE 8 and prion versions.</p></div>'; 
	
	$navcontent["tos"] = '<div id=tos><h3>Liability for Content</h3><p>We try our best to keep the content on our Web site as accurate as possible, but accept no liability whatsoever for the content provided. We do not monitor third party information provided or stored on our Web site. We shall promptly remove any content upon becoming aware that it violates the law. Our liability in such an instance shall commence at the time we become aware of the respective violation.</p><h3>Liability for Links</h3><p>Our site contains links to third-party Web sites. We have no influence whatsoever on the information on these Web sites and accept no guaranty for its correctness. The content of such third-party sites is the responsibility of the respective owners/providers. We shall promptly delete a link upon becoming aware that it violates the law.</p>
	<h3>Copyright</h3><p>The content and works provided on these Web pages are governed by the copyright laws. Duplication, processing, distribution, or any form of commercialization of such material beyond the scope of the copyright law shall require the prior written consent of its respective author or creator.</p></div>';
	
	$navcontent["privacy"] = '<div id=privacy><h3>Wording Up Input Text</h3><p>We DO NOT store your input text as it is on our servers, but we do store individual words temporarily for performance enhancement purposes only.</p>
	<h3>Server Log Files</h3><p>Like other webistes, we gather certain information automatically and store it in log files. This information includes IP addresses, browser type, referring pages, operating system, date/time stamp.</p></div>' ;

	$navcontent["contact"] = '<form  method=post id=form_contact> 
	<h3>Send us feedback or suggestion</h3> 
	<p>Fill the form below and send us your feedback, comment, and suggestions. Or send email to <a href="mailto:mail@wordingup.com">mail@wordingup.com</a>.
	</p> 
	<label for=contact_sender>Sender (E-Mail, Twitter ID, Facebook ID etc.):</label> 
	<input type=text name=contact_sender value="" id=contact_sender maxlength=100 tabindex=50/> 
	<label for=contact_subject>Subject:</label> 
	<input type="text" name="contact_subject" value=" " id=contact_subject maxlength=100 tabindex=51 /> 
	<label for=contact_message>Message:</label> 
	<textarea id=contact_message name=contact_message tabindex=52></textarea> 
	<button id=send_contact_request_button  onclick="feedback_send()" tabindex=53> 
	<span><strong>Send</strong></span> 
	</button>
	</form>' ;

	echo $navcontent[$navitem] ;


	function write_log($message){
		$now = date("H:i:s.u");
		file_put_contents("./my-errors-content.log", "\n$now :$message", FILE_APPEND | LOCK_EX);
	}		

?>