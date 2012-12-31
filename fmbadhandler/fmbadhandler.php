<?php
$FMBH_VERS = "1.21";		// script version

/* ex:set ts=4 sw=4:
 * FormMail PHP Bad Handler.  This script requires PHP 4 or later.
 * Copyright (c) 2004-2010 Open Concepts (Vic) Pty Ltd t/as Root Software.
 * All rights reserved.
 *
 * Visit us at http://www.tectite.com/
 * for updates and more information.
 *
 **** If you use this script, please support its development and other
 **** freeware products by putting the following link on your website:
 ****	Visit www.tectite.com for free <a href="http://www.tectite.com/">FormMail</a>.
 *
 * Author: Russell Robinson, 23rd April 2004
 *
 * Read this first
 * ~~~~~~~~~~~~~~~
 *	Intelligent user error handling for forms is difficult.
 *  This script does a lot of the work, but it's not magic.
 *	You *must* have a good knowledge of creating HTML forms to start.
 *	Don't even try to get FMBadHandler working unless you're comfortable
 *	with creating HTML forms.
 *	Note also the formatting requirements we've listed below.
 *
 *	We recommend you start by reading our HOW-TO guide here:
 *		http://www.tectite.com/fmhowto/adverror.php
 *
 *	Learn a lesson from software developers: if you've got 20 sub-tasks
 *	to perform to achieve something, don't try and do all 20 at once!
 *	It's a recipe for wasting huge amounts of time and getting into a big
 *	mess.  Instead, do sub-task 1.  When it's working, move onto sub-task 2,
 *	when it's working, move onto sub-task 3, and so on.
 *
 *	First, check that your hosting provider has a recent version of PHP.
 *	FMBadHandler and FormMail work on PHP version 4.0.x and above.
 *	FMBadHandler has been tested on PHP version 4.0.6, however, session
 *	variables don't seem to work reliably on 4.0.6 (this means you may
 *	have problems with forms with large amounts of data submitted).
 *
 *	There are 2 configuration values you will need to set.  See the
 *	CONFIGURATION section below.  These are necessary for security purposes.
 *
 *	We recommend the following steps:
 *		1. Confirm that your webserver accepts PHP and can send email from
 *		   PHP (see the sticky posts on our forums at www.tectite.com/vbforums).
 *		2. Create a basic HTML form, preferably using our sample form
 *		   as a base (see our download forums at www.tectite.com/vbforums).
 *		3. Get FormMail basically working with that form.  Get it sending you
 *		   mail from your form submissions.
 *		4. Get the "good_url" feature working.  Tell FormMail to redirect to
 *		   a page of your choosing on success.
 *		5. Install fmbadhandler.php on your server.  Configure it as described
 *		   below.  Specify its URL in your form as hidden field "bad_url".
 *		   Specify the form's own URL in the form as hidden field "this_form".
 *		6. Submit a form with an error (e.g. a missing field).  You should be
 *		   redirected to the default error page of fmbadhandler.php.  It should
 *		   provide a link to see the form again.  If you click that link, the
 *		   form should be re-displayed and all the fields you entered should
 *		   be filled in in the form.
 *		7. Finally, create a template for your errors and specify it as hidden
 *		   field "bad_template".  Use our sample "samplebadtemplate.htm" as
 *		   a starting point.
 *
 * Purpose
 * ~~~~~~~
 *	This script (FMBadHandler) is designed for use with our PHP FormMail
 *	(available from www.tectite.com).
 *	FMBadHandler is an intelligent script that you can use to provide
 *	good error handling for your users who submit forms with errors.
 *
 * Requirements
 * ~~~~~~~~~~~~
 *	This script requires PHP version 4.0.x or above.  It has been verified
 *	to work with PHP version 4.0.6, except for passing data in session
 *	variables. Therefore, if you have an old version of PHP, you may be
 *	restricted to small forms (i.e. small amount of data).
 *
 * What does this PHP script do?
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *	Once you've got FormMail working in a basic way, you may want to handle
 *	user errors in a more advanced way.
 *	FormMail has several error handling features built in, but this
 *	script (FMBadHandler) can be used to:
 *		-	display errors in a particular way, listing items
 *			in an HTML list
 *		-	use an HTML template of your design to format the error
 *			page the way you want
 *		-	provide a link that will show the form again with the fields
 *			that the user has previously entered filled in
 *
 * Formatting your form fields
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *	To display the form again, with the user's fields already filled in,
 *	FMBadHandler does this:
 *		1. opens the form's URL (that is, your server opens the form just
 *         like a browser does)
 *		2. reads the whole form into memory
 *		3. searches for the field definitions and modifies them
 *		4. outputs the changed HTML to the browser
 *
 *	In order for this to work reliably, you need to format your field
 *	definitions in a certain way. Here are the rules:
 *
 *		INPUT		these fields must have any "value" attribute after
 *					the "type" and "name" attributes.  The "type" and "name"
 *					attributes must be present but can be specified in
 *					either order.  Examples:
 *						<input type="text" name="realname" value="Jacque Smythe">
 *						<input name="realname" type="text" />
 *					Only "text", "password", "radio" and "checkbox" types
 *					are supported.
 *					For "radio" and "checkbox" types, any "checked" attribute
 *					must appear after "name", "type", and any "value" attribute.
 *					Examples:
 *						<input type="radio" name="qty" value="4" />
 *						<input type="radio" name="qty" value="5" checked />
 *					or (for XHTML compliance):
 *						<input type="radio" name="qty" value="5" checked="checked" />
 *					For checkboxes with multiple values assigned to the one
 *					field name, you must use "[]" with the field name:
 *						<input type="checkbox" name="fruit[]" value="apples">
 *						<input type="checkbox" name="fruit[]" value="oranges">
 *
 *                  Note that INPUT "text" fields generally don't have a value
 *                  attribute unless you're providing a default value for the
 *                  user to replace.  In you do provide a value attribute,
 *                  follow the instructions as above.
 *
 *		SELECT		select fields can be single or multiple selection.
 *					For multiple selection fields, ensure the name has
 *					"[]" appended.  Examples:
 *						<select name="animals[]" multiple>
 *							<option value="Dogs">Dogs</option>
 *							<option value="Cats">Cats</option>
 *							<option value="Horses">Horses</option>
 *						</select>
 *					If you use the "selected" attribute on any options, ensure
 *					that it appears *after* the "value" attribute, like this:
 *						<option value="Horses" selected>Horses</option>
 *					or (for XHTML compliance):
 *						<option value="Horses" selected="selected">Horses</option>
 *
 *      TEXTAREA    textarea fields have no specific formatting requirements,
 *                  except they must have a name to be usable on the form.
 *                  Examples:
 *                      <textarea name="comments"></textarea>
 *                      <textarea name="mesg" cols="40" rows="5"></textarea>
 *                      <textarea cols="40" rows="5" name="mesg"></textarea>
 *
 *		case sensitivity
 *					any names and values you use in your form should be unique
 *					in a case insensitive comparison.
 *					The following will cause problems:
 *						<input type="..." name="ANAME" ...>
 *						<input type="..." name="aname" ...>
 *
 *						<input type="..." name="field" value="AVALUE" ...>
 *						<input type="..." name="field" value="avalue" ...>
 *
 *					However, this is OK:
 *						<input type="..." name="field1" value="AVALUE" ...>
 *						<input type="..." name="field2" value="avalue" ...>
 *
 *		non-alphanumerics
 *					Use of non-alphabetic and non-numeric characters in names
 *					and values may cause problems.  Test thoroughly!
 *
 *		attribute values
 *					These must be enclosed in double quotes with no whitespace
 *					before or after the '='.  Single quotes are not supported
 *					as attribute delimiters.
 *
 * HTTP Authentication
 * ~~~~~~~~~~~~~~~~~~~
 *  If your form requires the user to authenticate themselves, FMBadHandler
 *  may have trouble accessing the form when the user clicks the
 *  return-to-form link.
 *
 *  HTTP Authentication is generally specified in Apache's .htaccess file.
 *  Other Web Server software will have similar mechanisms.
 *
 *  From version 1.11, FMBadHandler is designed to automatically
 *  authenticate itself using the user's own authentication.  For this to work
 *  you must be using FormMail version 7.05 or later, *and* formmail.php
 *  must be in the same authentication realm (i.e. controlled by the same
 *  authentication directives as the HTML form itself).
 *
 *  Put simply, this means you need to put formmail.php in the same
 *  directory or folder as your HTML form.  When your form POSTs to
 *  FormMail, FormMail retrieves the authentication details and passes
 *  them to FMBadHandler so it can use them too.
 *
 *  Also, FMBadHandler only supports the Basic authentication mechanism.
 *
 *  An alternative way to allow FMBadHandler to access your protected HTML form
 *  is to use directives in the .htaccess file.  You simply need to tell
 *  Apache that your server has unrestricted access to your HTML
 *  form (remember, FMBadHandler makes your server open the
 *  form just like a browser does).
 *
 *  These Apache directives can be added to your .htaccess file:
 *      Order allow,deny
 *      Allow from HOST 127.0.0.1
 *      Satisfy any
 *
 *  replacing HOST with the name of your server or its IP address.
 *  Note that a name must resolve to the IP address that your server will
 *  make requests from.  On shared hosting servers, that have many IP
 *  addresses, it might be tricky to find out what this IP address is!
 *
 *  See this post on our forums for more information:
 *      http://www.tectite.com/vbforums/showthread.php?p=3365#post3365
 *
 * Copying and Use
 * ~~~~~~~~~~~~~~~
 *	fmbadhandler.php is provided free of charge and may be freely distributed
 *	and used provided that you:
 *		1. keep this header, including copyright and comments,
 *		   in place and unmodified; and,
 *		2. do not charge a fee for distributing it, without an agreement
 *		   in writing with Root Software allowing you to do so; and,
 *		3. if you modify fmbadhandler.php before distributing it, you clearly
 *		   identify:
 *				a) who you are
 *				b) how to contact you
 *				c) what changes you have made
 *				d) why you have made those changes.
 *
 * Warranty and Disclaimer
 * ~~~~~~~~~~~~~~~~~~~~~~~
 *	fmbadhandler.php is provided free-of-charge and with ABSOLUTELY NO WARRANTY.
 *	It has not been verified for use in critical applications, including,
 *	but not limited to, medicine, defense, aircraft, space exploration,
 *	or any other potentially dangerous activity.
 *
 *	By using fmbadhandler.php you agree to indemnify Open Concepts (Vic) Pty Ltd
 *	t/as  Root Software, their agents, employees, and directors from any liability
 *  whatsoever.
 *
 * We still care
 * ~~~~~~~~~~~~~
 *	If you report problems to us, we will respond to your report and make
 *	endeavours to rectify any faults you've detected as soon as possible.
 *	To contact us, visit http://www.tectite.com/contacts.php.
 *
 * Version History
 * ~~~~~~~~~~~~~~~
 *
 **Version 1.20: 23-Sep-2009
 *
 * Improved some of the above comments and expanded instructions with regard
 * to formatting form fields.
 *
 * Improved to accept "this_form" and "bad_template" from the session.
 * This allows FMBadHandler to operate with version 8.19 (and later) of
 * FormMail and overcomes a problem caused by security settings on some
 * servers.
 *
 **Version 1.19: 17-Jul-2009
 *
 * Fixes potential Cross-Site Scripting (XSS) vulnerability when a failure
 * occurs in FMBadHandler (such as being unable to open an error template)
 * and it displays an error.
 *
 **Version 1.18: 20-Mar-2009
 *
 * Fixes a problem when the user has entered $123 or \123 in a field.
 * In this case in previous version, when they return to the form, the
 * value would be truncated when the field was re-filled.
 *
 **Version 1.17: 2-Dec-2008
 *
 * Fixes potential Cross-Site Scripting (XSS) vulnerabilities.
 *
 **Version 1.16: 23-Aug-2006
 *
 * Copied some useful code from FormMail.  This means you can now use
 * $REAL_DOCUMENT_ROOT in the configuration section.
 * This also adds $SET_REAL_DOCUMENT_ROOT to the configuration section.
 *
 **Version 1.15: 14-Mar-2006
 *
 * Fixed problems with encoding URLs.  The AddURLParam function
 * decoded the URL before adding the parameter, but didn't re-encode it!
 * AddURLParam no longer decodes the URL (it was not necessary because
 * the browser decodes it!)
 *
 **Version 1.14: 1-Mar-2006
 *
 * Re-implemented the session passing to use the standard SID
 * value in addition to the "sessid".  This should then cover
 * the case of use_trans_sid disabled and cookies enabled or disabled
 * in the browser.
 *
 * So, at the top of the script the code should now be:
 *      if ((bool) ini_get("session.use_trans_sid") == false)
 *          if (isset($_GET['sessid']) && $_GET['sessid'] !== "")
 *              session_id(urldecode($_GET['sessid']));
 *      session_name("<put your session name here>");   // optional
 *      session_start();
 *
 * Also, in case use_trans_sid is disabled in your PHP *and* the user's
 * browser has cookies disabled, then you need to put this in the
 * form:
 *         if ((bool) ini_get("session.use_trans_sid") == false)
 *             echo "<input type=\"hidden\" name=\"".session_name().
 *                    "\" value=\"".session_id()."\" />\n";
 *
 **Version 1.13: 27-Feb-2006
 *
 * Fixes a problem with encoding URL parameters (previously this
 * would have just been the User Agent and may not have caused any problems).
 *
 * When opening a URL to the form or a template, the session ID is now
 * passed in the URL parameters.  This means a script can access the
 * session by using the following code (this is a PHP example):
 *      if (isset($_GET['sessid']) && $_GET['sessid'] !== "")
 *          session_id(urldecode($_GET['sessid']));
 *      session_name("<put your session name here>");   // optional
 *      session_start();
 *
 * This allows your forms to be scripts that can create and/or access a
 * PHP session even when they are being processed by FMBadHandler.
 *
 **Version 1.12: 11-Jan-2006
 *
 * Fixed a problem with sending the USER_AGENT in the query string
 * to the $return_link URL.
 * Also, if a URL contains a fragment (#blah), adding the USER_AGENT
 * now works properly - previously, the USER_AGENT was put in the
 * wrong location.
 *
 **Version 1.11: 27-Oct-2005
 *
 * Fixed some typographical errors and improved some wording.
 * Added support for automatic HTTP authentication when used with FormMail
 * version 7.05 or later.
 *
 **Version 1.10: 26-Sep-2005
 *
 * Fixed bug in matching "selected" and "checked" attributes. This bug only
 * occurs under rare circumstances.  An example is:
 *      <option value="Unselected">
 * In this case, previous versions of FMBadHandler would incorrectly match
 * "selected" in the string "Unselected".  Similarly for "checked".
 *
 **Version 1.09: 9-Jun-2005
 *
 * Fixed bug in multi-form processing that could cause a complete
 * lock up.  This was resolved by unlocking the session data as soon
 * as possible.
 *
 **Version 1.08: 18-Apr-2005
 *
 * Added new $SESSION_NAME configuration setting.
 * Added support for new template tags <fmsyserror> and </fmsyserror>
 *
 **Version 1.07: 21-Jan-2005
 *
 * Fixed bug in returning to the form and putting TEXTAREA values
 * back. If the textarea value started with a digit, the substitution
 * in the form would corrupt the form.
 * Example that would trigger the fault:
 *  <textarea name="address"></textarea>
 * with the value entered:
 *      9 Some Street
 *
 * Thanks to Carl Pettitt for notifying us of the problem.
 *
 **Version 1.06: 14-Dec-2004
 *
 * Improved error reporting.
 *
 **Version 1.05: 23-Oct-2004
 * Fixed bug in the new $return_link feature.  Previously, if you use it,
 * FMBadHandler would also add it's own text before </body>!
 * Now, if you use $return_link, the automatic return link before
 * </body> or replacing <return_link /> is no longer added.
 *
 **Version 1.04: 18-Aug-2004
 *
 * When returning to the form, the form's URL is now opened with
 * with the USER_AGENT specified.  This means dynamic web sites can
 * know what the user's browser is and render the form appropriately.
 *
 * Added support for new "$return_link" substitution.  This is similar
 * to the <return_link /> special tag, except that it is simply
 * replaced with the complete URL to return to the form.
 * Note this is *not* the same as the direct URL for the form: it's
 * a URL for fmbadhandler.php that will load the form automatically
 * and perform the data substitution.
 * Sample usage:
 *		Please <a href="$return_link">try again</a>.
 *
 **Version 1.03: 24-Jun-2004
 *
 * Now supports templates accessed by URL.
 * Handles XHTML compliant tag attributes like this:
 *		checked="checked"
 *		selected="selected"
 * Handles XHTML single-tag closures:
 *		<input ... />
 * Now uses the preferred PCRE back reference replacement
 * syntax ($1 instead of \1).
 *
 **Version 1.02: 18-May-2004
 *
 * First released version.
 *
 **Version 1.01: ?-May-2004
 *
 * More development.
 *
 **Version 1.00: ?-Apr-2004
 * First version.
 */

	//
	// Check for old version of PHP - die if too old.
	//
function IsOldVersion(&$a_this_version)
{
    $a_modern = array(4,1,0);   // versions prior to this are "old" - "4.1.0"
	$s_req_string = "4.0.5";	// version 4.0.5 of PHP is required from
								// FormMail 5.00 onward (because we use
								// preg_replace_callback for all messages to
								// support languages other than English)
    $a_too_old = explode(".",$s_req_string);

    $i_cannot_use = ($a_too_old[0] * 10000) +
                    ($a_too_old[1] * 100) +
                    $a_too_old[2];

	$s_vers_string = phpversion();
    $a_this_version = explode(".",$s_vers_string);
    $i_this_num = ($a_this_version[0] * 10000) +
                    ($a_this_version[1] * 100) +
                    $a_this_version[2];

    if ($i_this_num <= $i_cannot_use)
        die(GetMessage(MSG_SCRIPT_VERSION,array("PHPREQ"=>$s_req_string,
												"PHPVERS"=>$s_vers_string)));
    $i_modern_num = ($a_modern[0] * 10000) +
                    ($a_modern[1] * 100) +
                    $a_modern[2];
    return ($i_this_num < $i_modern_num);
}

$bUseOldVars = IsOldVersion($aPHPVERSION);

    //
    // we set references to the appropriate arrays to handle PHP version differences
    // Session vars are selected after we start the session.
    //
if ($bUseOldVars)
{
    $aServerVars = &$HTTP_SERVER_VARS;
    $aGetVars = &$HTTP_GET_VARS;
    $aFormVars = &$HTTP_POST_VARS;
    $aFileVars = &$HTTP_POST_FILES;
    $aEnvVars = &$HTTP_ENV_VARS;
}
else
{
	$aServerVars = &$_SERVER;
    $aGetVars = &$_GET;
	$aFormVars = &$_POST;
    $aFileVars = &$_FILES;
    $aEnvVars = &$_ENV;
}

function SetRealDocumentRoot()
{
	global	$aServerVars,$REAL_DOCUMENT_ROOT;

	if (isset($aServerVars['SCRIPT_FILENAME']))
		$REAL_DOCUMENT_ROOT = $aServerVars['SCRIPT_FILENAME'];
	elseif (isset($aServerVars['PATH_TRANSLATED']))
		$REAL_DOCUMENT_ROOT = $aServerVars['PATH_TRANSLATED'];
	else
		$REAL_DOCUMENT_ROOT = "";
		//
		// look for 'www' or 'public_html' and strip back to that if found,
		// otherwise just get the directory name
		//
	if (($i_pos = strpos($REAL_DOCUMENT_ROOT,"/www/")) !== false)
		$REAL_DOCUMENT_ROOT = substr($REAL_DOCUMENT_ROOT,0,$i_pos+4);
	elseif (($i_pos = strpos($REAL_DOCUMENT_ROOT,"/public_html/")) !== false)
		$REAL_DOCUMENT_ROOT = substr($REAL_DOCUMENT_ROOT,0,$i_pos+12);
	elseif (!empty($REAL_DOCUMENT_ROOT))
		$REAL_DOCUMENT_ROOT = dirname($REAL_DOCUMENT_ROOT);
	elseif (isset($aServerVars['DOCUMENT_ROOT']) &&
			!empty($aServerVars['DOCUMENT_ROOT']))
		$REAL_DOCUMENT_ROOT = $aServerVars['DOCUMENT_ROOT'];
}

if (!isset($REAL_DOCUMENT_ROOT))
	SetRealDocumentRoot();

if (isset($_SERVER['SERVER_PORT']))
	$SCHEME = ($_SERVER['SERVER_PORT'] == 80) ? "http://" : "https://";
elseif (isset($HTTP_SERVER_VARS['SERVER_PORT']))
	$SCHEME = ($HTTP_SERVER_VARS['SERVER_PORT'] == 80) ? "http://" : "https://";
else
	$SCHEME = "";
if (isset($_SERVER['SERVER_NAME']))
	$SERVER = $_SERVER['SERVER_NAME'];
elseif (isset($HTTP_SERVER_VARS['SERVER_NAME']))
	$SERVER = $HTTP_SERVER_VARS['SERVER_NAME'];
else
	$SERVER = "";

/*****************************************************************************/
/* CONFIGURATION (do not alter this line in any way!!!)                      */
/*****************************************************************************
 * This is the *only* place where you need to modify things to use formmail.php
 * on your particular system.  This section finishes at "END OF CONFIGURATION".
 *
 * Each variable below is marked as LEAVE, OPTIONAL or MANDATORY.
 * What we mean is:
 *		LEAVE		you can change this if you really want to and know what
 *					you're doing, but we recommend that you leave it unchanged
 *
 *		OPTIONAL	you can change this if you need to, but its current
 *					value is fine and we recommend that you leave it unchanged
 *					unless you need a different value
 *
 *		MANDATORY	you *must* modify this for your system.  The script will
 *					not work if you don't set the value correctly.
 *
 *****************************************************************************/
	//
	// ** OPTIONAL **
	// Set TARGET_URLS to a list of URL prefixes that are acceptable.
	// This is used if you want to provide a link back to the form.
	// Only values of the hidden field "this_form" that match a URL
	// prefix specified here are processed.
	//
	// No pattern matching is allowed, and all comparisons are
	// performed by first converting to lower case.
	//
$TARGET_URLS = array( "http://www.candpgeneration.com/");					// default; no URLs allowed

	//
	// ** OPTIONAL **
	// SET_REAL_DOCUMENT_ROOT tells FMBadHandler the DocumentRoot for your website.
	//
	// Automatically finding the document root for your website in PHP can be
	// quite problematical.  $_SERVER["DOCUMENT_ROOT"] is often correct,
	// but sometimes it's not provided (e.g. with a CGI interface) and with
	// certain secure server configurations, it's completely inappropriate.
	//
	// For example, our website at http://www.tectite.com/ also lives
	// at https://secure.rootsoftware.com/~tectite/.  If we run FMBadHandler
	// from the latter location (such as when you place an order)
	// $_SERVER["DOCUMENT_ROOT"] is set to "/home/secure" - which is completely
	// wrong and won't work.
	//
	// The function above - SetRealDocumentRoot - is designed to set
	// $REAL_DOCUMENT_ROOT to the right value based on the setting
	// of SCRIPT_FILENAME or PATH_TRANSLATED (or as a last attempt, DOCUMENT_ROOT).
	//
	// SetRealDocumentRoot should work on most servers in most situations.
	// However, it might not work on your server.  Therefore, you can set
	// $SET_REAL_DOCUMENT_ROOT to the correct value for your website.
    // Use an absolute directory pathname such as:
	//
	//		/home/yourname/public_html
	//		d:/inet/user/htdocs
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\document_root"
    // or
    //      "d:/path/to/document_root"
    //
	// If you don't want to use $REAL_DOCUMENT_ROOT in your other settings
    // (very advanced users might want to do this), then you don't need
    // to worry about these settings.
	//
$SET_REAL_DOCUMENT_ROOT = "";		// overrides the value set by SetRealDocumentRoot function

    //
    // override $REAL_DOCUMENT_ROOT from the $SET_REAL_DOCUMENT_ROOT value (if any)
    // Do not alter the following code (next 3 lines)!
    //
if (isset($SET_REAL_DOCUMENT_ROOT) && $SET_REAL_DOCUMENT_ROOT !== "")
    $REAL_DOCUMENT_ROOT = $SET_REAL_DOCUMENT_ROOT;

	//
	// ** OPTIONAL **
	// Set TEMPLATEDIR to the directory on your server where template files are
	// stored.
	//
	// If you want to specify "bad_template" in your forms, the templates
	// must be found in the directory you specify below.
	// This is a necessary step to prevent security problems.  For example,
	// without this measure, an attacker might be able to gain access to
	// any file on your server.
	//
	// We recommend you set aside a particular directory on your
	// server for all your templates.
	//
$TEMPLATEDIR = "";					// directory for template files; empty string
									// if you don't have any templates

	//
	// ** OPTIONAL **
	// Set TEMPLATEURL to the url where template files can be fetched.
	// If you set TEMPLATEDIR too, that takes precedence and TEMPLATEURL
	// is ignored.
	//
	// TEMPLATEURL is analogous to TEMPLATEDIR, but allows for templates
	// to be read from a web server.  This is useful for cases where
	// you want the template to be generated via a PHP script, for example.
	//
	// You can use $SCHEME and $SERVER to refer to your own server.
	//
	// Note that the HTTP_USER_AGENT string is passed to any URL opened
	// through TEMPLATEURL with a parameter, for example:
	//		http://blah.blah/templatedir/template.php?USER_AGENT=blahblah
	//
//$TEMPLATEURL = $SCHEME.$SERVER."/templatedir";		// a sample using your server
$TEMPLATEURL = "http://www.candpgeneration.com/templates";

	//
	// ** OPTIONAL **
	// Set SESSION_NAME to a non-empty string to get a unique PHP session for
    // your FormMail processing.  You only need to do this if your site
    // is a PHP-based site that uses sessions.
    //
    // FormMail attaches to or creates a PHP session so it can pass error
    // information to bad_url.  On succcessful completion, and if you're not
    // using good_url, FormMail destroys the session.  If you use the default
    // PHP session name on your site and within FormMail, this will cause any
    // session information from your site to be discarded.
    //
    // By using a unique session in FormMail, you avoid this problem.  You
    // should set the value below to the same value you set in FormMail.
    //
$SESSION_NAME = "";

	//
	// ** OPTIONAL **
	// When FMBadHandler returns to the form for the user, it opens a
    // URL to read in the form.  This means your server is opening a URL
    // to itself.
    //
    // If your form requires authentication, you need FMBadHandler to be
    // able to authenticate with the server to open the URL.
    //
    // FormMail version 7.05 attempts to provide the authentication information
    // automatically to FMBadHandler.
    //
    // If this doesn't work on your site or you want to provide a separate
    // authentication for FMBadHandler, put the value(s) here.
    //
    // $AUTHENTICATE is placed as the value of the "Authorization:" header.
    // For example:
    //      Basic cnVzc2VsbHI6dGVzdA==
    // The second value is the Base-64 encoded user name and password
    // separated by ":".  (The above value is: "russellr:test".)
    //
    // If this is inconvenient for you, leave $AUTHENTICATE empty and
    // set $AUTH_USER and $AUTH_PW as normal strings
    // (e.g. "russellr" and "test").  When using $AUTH_USER and $AUTH_PW
    // FMBadHandler will automatically specify "Basic" authentication.
    //
$AUTHENTICATE = "";
//$AUTHENTICATE = "Basic cnVzc2VsbHI6dGVzdA==";        // example
$AUTH_USER = "";
$AUTH_PW = "";

/*****************************************************************************/
/* END OF CONFIGURATION (do not alter this line in any way!!!)               */
/*****************************************************************************/

if (!empty($SESSION_NAME))
    session_name($SESSION_NAME);

session_start();

    //
    // When using multi-page form sequences, the session data is critical
    // and must be passed in the URLs processed by FMBadHandler.  If we
    // don't close the session here, then we won't be able to open
    // a URL because the session is locked!
    //
if (function_exists('session_write_close'))
    session_write_close();

ini_set('track_errors',1);			// enable $php_errormsg

//$aDebug = array();

	//
	// Strip slashes if magic_quotes_gpc is set.
	//
function StripGPC($s_value)
{
	if (get_magic_quotes_gpc() != 0)
		$s_value = stripslashes($s_value);
	return ($s_value);
}

    //
    // Add a parameter to a URL
    //
function AddURLParam($s_url,$s_param)
{
		//
		// check for ? and # in the url
		//
	$i_hash_pos = strpos($s_url,'#');   // for fragment
	$i_quest_pos = strpos($s_url,'?');  // for query string

	if ($i_hash_pos !== false)
	{
		$s_front = substr($s_url,0,$i_hash_pos);
		$s_frag = substr($s_url,$i_hash_pos);
		if ($i_quest_pos !== false)
			$s_url = $s_front.'&'.$s_param.$s_frag;
		else
			$s_url = $s_front.'?'.$s_param.$s_frag;
	}
	else
		$s_url .= (($i_quest_pos !== false) ? '&' : '?').$s_param;
	return ($s_url);
}

	//
	// Add the user agent to the url as a parameter called USER_AGENT.
	// This allows dynamic web sites to know what the user's browser is.
	//
function AddUserAgent($s_url)
{
	global	$HTTP_SERVER_VARS;

	unset($s_agent);
	if (isset($_SERVER['HTTP_USER_AGENT']))
		$s_agent = $_SERVER['HTTP_USER_AGENT'];
	elseif (isset($HTTP_SERVER_VARS['HTTP_USER_AGENT']))
		$s_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
	if (isset($s_agent))
    {
        $s_agent = "USER_AGENT=".urlencode($s_agent);
		$s_url = AddURLParam($s_url,$s_agent);
    }
	return ($s_url);
}

	//
    // Open a URL and return the data from it as a string.
    // Returns false on failure.
    //
function GetURL($s_url)
{
    global  $php_errormsg,$aDataArray,$FMBH_VERS;
    global  $AUTHENTICATE,$AUTH_USER,$AUTH_PW;

        //
        // parse the URL to get the component parts
        //
    $a_parts = parse_url($s_url);
        //
        // must have a host
        //
    if (!isset($a_parts["host"]))
    {
        $php_errormsg = "URL parse failed";
        return (false);
    }
    $s_host_hdr = $a_parts["host"];
        //
        // if no port number is given, we support http and https
        //
    if (!isset($a_parts["port"]))
    {
        if (!isset($a_parts["scheme"]) || strtolower($a_parts["scheme"]) == "http")
            $a_parts["port"] = 80;
        elseif (strtolower($a_parts["scheme"]) == "https")
            $a_parts["port"] = 443;
        else
        {
           $php_errormsg = "Unsupported URL scheme '".$a_parts["scheme"]."'";
           return (false);
        }
    }
    if ($a_parts["port"] == 443)
            //
            // fsockopen requires ssl:// in the host name
            //
        $a_parts["host"] = "ssl://".$a_parts["host"];

        //
        // default the path if empty
        //
    if (!isset($a_parts["path"]) || $a_parts["path"] === "")
        $a_parts["path"] = "/";

    $f_sock = @fsockopen($a_parts["host"],(int) $a_parts["port"],$i_errno,$s_errstr,30);
    if ($f_sock === false)
    {
        $php_errormsg = "Error $i_errno: $s_errstr: $php_errormsg";
        return (false);
    }

    $s_req = $a_parts["path"];
        //
        // add the query to the path
		// Note that parse_url decodes the query string (urldecode), so
		// we need to split it into its component parameters
		// are re-encode their values.  Calling urlencode($a_parts["query"])
		// encodes the '=' between parameters and this breaks things.
        //
    if (isset($a_parts["query"]))
	{
		$a_params = explode('&',$a_parts["query"]);
		foreach ($a_params as $i_idx=>$s_param)
		{
			if (($i_pos = strpos($s_param,"=")) === false)
				$a_params[$i_idx] = urlencode($s_param);
			else
				$a_params[$i_idx] = substr($s_param,0,$i_pos).'='.
										urlencode(substr($s_param,$i_pos+1));
		}
        $s_req .= '?'.implode('&',$a_params);
	}

        //
        // add the fragment to the path.  Note, however, this
        // won't actually make the user's browser jump to that
        // location (because we'd need to alter our current URL
        // and add the fragment to achieve that - we might
        // add that feature in a later version if we can
        // figure out how to do it!)
        //
    if (isset($a_parts["fragment"]))
        $s_req .= '#'.urlencode($a_parts["fragment"]);

        //
        // the GET request
        //
	fputs($f_sock,"GET ".$s_req." HTTP/1.0\r\n");

        //
        // Determine authentication requirements
        //
    if ($AUTHENTICATE !== "" || $AUTH_USER !== "" || $AUTH_PW !== "")
    {
        if ($AUTHENTICATE === "")
		    fputs($f_sock,"Authorization: Basic ".
					    base64_encode("$AUTH_USER:$AUTH_PW")."\r\n");
        else
		    fputs($f_sock,"Authorization: $AUTHENTICATE\r\n");

    }
    else
    {
        if (isset($a_parts["user"]) || isset($a_parts["pass"]))
        {
	        $s_auth_user = isset($a_parts["user"]) ? $a_parts["user"] : "";
	        $s_auth_pass = isset($a_parts["pass"]) ? $a_parts["pass"] : "";
        }
        else
        {
	        $s_auth_type = isset($aDataArray["PHP_AUTH_TYPE"]) ? $aDataArray["PHP_AUTH_TYPE"] : "";
	        $s_auth_user = isset($aDataArray["PHP_AUTH_USER"]) ? $aDataArray["PHP_AUTH_USER"] : "";
	        $s_auth_pass = isset($aDataArray["PHP_AUTH_PW"]) ? $aDataArray["PHP_AUTH_PW"] : "";
        }
        if (!isset($s_auth_type) || $s_auth_type === "")
            $s_auth_type = "Basic";
            //
            // Add the authentication header
            //
	    if ($s_auth_user !== "" || $s_auth_pass !== "")
		    fputs($f_sock,"Authorization: $s_auth_type ".
					    base64_encode("$s_auth_user:$s_auth_pass")."\r\n");
    }

        //
        // Specify the host name
        //
	fputs($f_sock,"Host: $s_host_hdr\r\n");
        //
        // Specify the user agent
        //
	fputs($f_sock,"User-Agent: FMBadHandler/$FMBH_VERS (FormMail Bad Handler from www.tectite.com)\r\n");
        //
        // Accept any output
        //
	fputs($f_sock,"Accept: */*\r\n");
        //
        // End of request headers
        //
	fputs($f_sock,"\r\n");

		//
		// Read and parse the response header
		//
	$i_http_code = 0;
    $s_status = "";
	while (!feof($f_sock))
	{
		$s_line = fgets($f_sock,4096);
		if ($s_line == "\r\n" || $s_line == "\n")
			break;
		if (substr($s_line,0,4) == "HTTP")
		{
			$i_pos = strpos($s_line," ");
			$s_status = substr($s_line,$i_pos+1);
			$i_end_pos = strpos($s_status," ");
			if ($i_end_pos === false)
				$i_end_pos = strlen($s_status);
			$i_http_code = (int) substr($s_status,0,$i_end_pos);
		}
	}
	if ($i_http_code < 200 || $i_http_code > 299)
    {
		$php_errormsg = "Failed: $s_status";
        fclose($f_sock);
        return (false);
    }
        //
        // read content into one big string buffer and return
        //
	$s_buf = "";
	while (!feof($f_sock))
		$s_buf .= fread($f_sock,1024);
	fclose($f_sock);
    return ($s_buf);
}

	//
	// Add any debug to the end of the body.
	//
/****
function ShowDebug($s_text)
{
	global	$aDebug;

	if (count($aDebug) > 0)
	{
		$s_debug = "<br />\n".implode("<br />\n",$aDebug);
		if (preg_match('/<\s*\/\s*body\s*>/ims',$s_text) > 0)
			$s_text = preg_replace('/<\s*\/\s*body\s*>/ims',
									"$s_debug\n\$0",$s_text);
		else
				//
				// no body end tag - just append
				//
			$s_text .= $s_debug;
	}
	return ($s_text);
}
****/

	//
	// report an error
	//
function ReportError($s_mesg)
{
?>
	<html>
	<body>
	<p><?php echo nl2br(htmlentities($s_mesg)); ?></p>
	</body>
	</html>
<?php
	exit;
}

	//
	// Check for valid URL in TARGET_URLS
	//
function CheckValidURL($s_url)
{
	global	$TARGET_URLS;

	foreach ($TARGET_URLS as $s_prefix)
		if (!empty($s_prefix) &&
				strtolower(substr($s_url,0,strlen($s_prefix))) ==
				strtolower($s_prefix))
			return (true);
	return (false);
}


if (isset($_SERVER["PHP_SELF"]))
	$sThisScript = $_SERVER["PHP_SELF"];
elseif (isset($HTTP_SERVER_VARS["PHP_SELF"]))
	$sThisScript = $HTTP_SERVER_VARS["PHP_SELF"];

$sQueryString = "";
if (isset($_SERVER["QUERY_STRING"]))
	$sQueryString = $_SERVER["QUERY_STRING"];
elseif (isset($HTTP_SERVER_VARS["QUERY_STRING"]))
	$sQueryString = $HTTP_SERVER_VARS["QUERY_STRING"];

if (isset($_GET))
	$aGetVars = &$_GET;
elseif (isset($HTTP_GET_VARS))
	$aGetVars = &$HTTP_GET_VARS;
else
	ReportError("PHP appears to be faulty - no GET array");
if (isset($aGetVars["insession"]) && $aGetVars["insession"] == 1)
{
		//
		// the data is in the session, not in the URL
		//
	if (isset($_SESSION["FormData"]))
		$aDataArray = &$_SESSION["FormData"];
	elseif (isset($HTTP_SESSION_VARS["FormData"]))
		$aDataArray = &$HTTP_SESSION_VARS["FormData"];
	else
		ReportError("insession specified, but no data found in session");
	$bStripData = false;
}
else
{
	$aDataArray = &$aGetVars;
	$bStripData = true;
}
    //
    // Before FormMail version 8.19, the this_form and bad_template values
    // were specified in the URL (in $aGetVars).
    // Security features on some servers prevent URLs from being passed in
    // URL parameters, so this logic failed on those servers.
    // From version 8.19, they are in the session if "insession" is set.
    // So, we grab from aDataArray or $aGetVars and this provides backward and
    // forward compatibility.
    //
if (isset($aDataArray) && isset($aDataArray["this_form"]))
{
    $sSubmittedForm = $aDataArray["this_form"];
    if ($bStripData)
        $sSubmittedForm = StripGPC($sSubmittedForm);
}
elseif (isset($aGetVars) && isset($aGetVars["this_form"]))
    $sSubmittedForm = StripGPC($aGetVars["this_form"]);
else
    $sSubmittedForm = "";

if (isset($aDataArray) && isset($aDataArray["bad_template"]))
{
    $sBadTemplate = $aDataArray["bad_template"];
    if ($bStripData)
        $sBadTemplate = StripGPC($sBadTemplate);
}
elseif (isset($aGetVars) && isset($aGetVars["bad_template"]))
    $sBadTemplate = StripGPC($aGetVars["bad_template"]);
else
    $sBadTemplate = "";

if (!isset($aGetVars["bad_state"]))
{
		//
		// This logic is processed on the initial redirect from FormMail
		//
		// It displays a message, which you can configure yourself and
		// provides a link back to itself that the user can click.
		// That link sets "bad_state" in the URL, so that the next
		// logic is executed instead on that click.
		//
	$b_session = true;
	$aVars = NULL;
	if (isset($_SESSION))
		$aVars = &$_SESSION;
	elseif (isset($HTTP_SESSION_VARS))
		$aVars = &$HTTP_SESSION_VARS;
	if (!isset($aVars["FormError"]))
	{
		$b_session = false;
		$aVars = &$aGetVars;
	}
	if ($b_session)
	{
		$sErrorMesg = $aVars["FormError"];
		$sErrorExtra = $aVars["FormErrorInfo"];
		$sErrorCode = $aVars["FormErrorCode"];
		$aItems = $aVars["FormErrorItems"];
		$bIsUserError = $aVars["FormIsUserError"];
		$bAlerted = $aVars["FormAlerted"];
	}
	else
	{
		$sErrorMesg = StripGPC($aVars["error"]);
		$sErrorExtra = StripGPC($aVars["extra"]);
		$sErrorCode = StripGPC($aVars["errcode"]);
		$bIsUserError = StripGPC($aVars["isusererror"]);
		$bAlerted = StripGPC($aVars["alerted"]);
		$aItems = array();
		for ($iCount = 1 ; $iCount <= 9 ; $iCount++)
		{
			if (!isset($aVars["erroritem$iCount"]))
				break;
			$aItems[] = StripGPC($aVars["erroritem$iCount"]);
		}
	}

		//
		// To return the HTML for the link back to the form.
		//
	function GetFormLink(&$s_url)
	{
		global	$aGetVars,$sThisScript,$sQueryString,$sSubmittedForm;

		$s_url = $s_link = "";
		if ($sSubmittedForm !== "" &&
			isset($sThisScript) && !empty($sThisScript) &&
			CheckValidURL($sSubmittedForm))
		{
				//
				// Provide a link back to this script that provides
				// all the same information *and* sets bad_state=1
				// see below for what happens....
				//
				// We can only do this sensibly if the form has supplied
				// "this_form" ($sSubmittedForm) and PHP is working within the webserver.
				// This probably won't work if PHP is being called as
				// a CGI script.
				//
			$b_quest = (strpos($sThisScript,'?') !== false);
			$s_url = $sThisScript.($b_quest ? "&" : "?")."bad_state=1&$sQueryString";
			$s_link = "<p>You can <a href=\"".htmlentities($s_url)."\">return to the form</a> to fix the errors.</p>";
		}
		return ($s_link);
	}

		//
		// To show a template.	The template must be HTML and, for security
		// reasons, must be a file on the server in the directory specified
		// by $TEMPLATEDIR or a file accessible by a URL through
		// $TEMPLATEURL.
		// $a_specs is an array of substitutions to perform, as follows:
		//		tag-name	replacement string
		//
		// For example:
		//		"fmerror"=>"An error message"
		//
	function ShowTemplate($s_name,$a_specs)
	{
		global	$TEMPLATEURL,$TEMPLATEDIR,$bIsUserError,$bAlerted,$aGetVars;
		global	$php_errormsg,$sBadTemplate;

		if (empty($TEMPLATEDIR) && empty($TEMPLATEURL))
		{
			ReportError("neither TEMPLATEDIR nor TEMPLATEURL is set");
			return (false);
		}
		if (!empty($TEMPLATEDIR))
		{
			$s_name = "$TEMPLATEDIR/".basename($s_name);
		@	$fp = fopen($s_name,"r");
			if ($fp === false)
			{
				ReportError("Cannot open template '$s_name': $php_errormsg");
				return (false);
			}
				//
				// load the whole template into a string
				//
			$s_buf = fread($fp,filesize($s_name));
			fclose($fp);
		}
		else
		{
			$s_name = AddUserAgent("$TEMPLATEURL/".basename($s_name));
	        if (session_id() !== "")
		        $s_name = AddURLParam($s_name,"sessid=".urlencode(session_id()));
            if (defined("SID"))
    	        $s_name = AddURLParam($s_name,SID);
		@	$fp = fopen($s_name,"r");
			if ($fp === false)
			{
				ReportError("Cannot open template '$s_name': $php_errormsg");
				return (false);
			}
				//
				// load the whole template into a string
				//
			$s_buf = "";
			while (!feof($fp))
				$s_buf .= fread($fp,4096);
			fclose($fp);
		}
			//
			// now look for the tags to replace
			//
		foreach ($a_specs as $s_tag=>$s_value)
				//
				// search for
				//		<tagname/>
				// with optional whitespace
				//
			$s_buf = preg_replace('/<\s*'.preg_quote($s_tag,"/").'\s*\/\s*>/ims',
								nl2br($s_value),$s_buf);
		if ($bIsUserError)
		{
				//
				// put the form link just before the </body> end tag or replace
				// a <return_link/> tag
				//
			$s_link = GetFormLink($s_url);
			if (!empty($s_link))
			{
					//
					// Replace any "$return_link" strings with the
					// return link URL.
					//
				if (preg_match('/\$return_link\b/ms',$s_buf) > 0)
					$s_buf = preg_replace('/\$return_link\b/ms',"$s_url",$s_buf);
				else
				{
						//
						// Look for a "<return_link/>" tag and replace that.
						// If it doesn't exist, put the return link before
						// the body end tag.
						//
					if (preg_match('/<\s*return_link\s*\/\s*>/ims',$s_buf) > 0)
						$s_buf = preg_replace('/<\s*return_link\s*\/\s*>/ims',
												"$s_link\n",$s_buf);
					else
						$s_buf = preg_replace('/<\s*\/\s*body\s*>/ims',
												"$s_link\n".'$0',$s_buf);
				}
			}

				// strip any <fmusererror> and </fmusererror> tags
				//
				// You can show information that's specific to user
				// errors between these special tags.
				//
			$s_buf = preg_replace('/<\s*\/?\s*fmusererror\s*>/ims','',$s_buf);
				//
				// since this isn't a system error, strip anything between
				// <fmsyserror> and </fmsyserror>
				//
			$s_buf = preg_replace('/<\s*fmsyserror\s*>.*<\s*\/\s*fmsyserror\s*>/ims','',$s_buf);
		}
		else
        {
				// strip any <fmsyserror> and </fmsyserror> tags
				//
				// You can show information that's specific to system
				// errors between these special tags.
				//
			$s_buf = preg_replace('/<\s*\/?\s*fmsyserror\s*>/ims','',$s_buf);
				//
				// since this isn't a user error, strip anything between
				// <fmusererror> and </fmusererror>
				//
			$s_buf = preg_replace('/<\s*fmusererror\s*>.*<\s*\/\s*fmusererror\s*>/ims','',$s_buf);
        }
			//
			// output the modified page
			//
		echo $s_buf;
		return (true);
	}
	if (!empty($sBadTemplate))
	{
		$aSpecs = array("fmerror"=>htmlspecialchars("$sErrorMesg"),
						"fmerrorcode"=>htmlspecialchars("$sErrorCode"),
						"fmfullerror"=>htmlspecialchars("$sErrorMesg")."\n".
										htmlspecialchars("$sErrorExtra"),
						"fmerrorextra"=>htmlspecialchars("$sErrorExtra"),
						"fmalerted"=>(!$bIsUserError && $bAlerted ?
										"Our staff have been ".
										"alerted to the problem. ".
										"We apologize for any inconvenience." :
										""),);
		if ($bIsUserError)
		{
			$iCount = 1;
			foreach ($aItems as $sItem)
			{
				$aSpecs["fmerroritem$iCount"] = htmlspecialchars($sItem);
				$iCount++;
			}
			$sList = "";
			foreach ($aItems as $sItem)
				$sList .= "<li>".htmlspecialchars($sItem)."</li>";
			$aSpecs["fmerroritemlist"] = $sList;
		}
		else
		{
			for ($iCount = 1 ; $iCount <= 20 ; $iCount++)
				$aSpecs["fmerroritem$iCount"] = "";
			$aSpecs["fmerroritemlist"] = "";
		}
		ShowTemplate($sBadTemplate,$aSpecs);
	}
	else
	{
	?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Form Submission Error</title>
        </head>
        <body>
		<h2>Form Error</h2>
		<p>Your form submission failed due to the following reason:</p>
		<p><?php echo nl2br(htmlspecialchars($sErrorMesg)); ?></p>
		<ul>
			<?php
				foreach ($aItems as $s_item)
					echo "<li>".htmlspecialchars($s_item)."</li>";
			?>
		</ul>
	<?php
		if (!$bIsUserError && $bAlerted)
			echo "<p>Our staff have been alerted to the problem. ".
						"We apologize for any inconvenience.</p>";
		if ($bIsUserError)
			echo GetFormLink($sURL);
	?>
		</body>
		</html>
	<?php
	}
}
else
{
        //
        // Quote special characters in a replacement expression
        // for preg_replace.
        //
    function RegReplaceQuote($s_value)
    {
        return (str_replace('$','\\$',str_replace('\\','\\\\',$s_value)));
    }

		//
		// This logic loads (bad_state is set) in the original form
		// and modifies it to include the values the user originally
		// entered into each field.
		//

		//
		// First some functions....
		//

		//
		// This function handles input type "text" and "password"
		//
	function FixInputText($s_name,$s_value,$s_buf)
	{
			//
			// we search for:
			//	<input type="text" name="thename"...
			// and change it to:
			//	<input type="text" name="thename" value="thevalue" ...
			//
			// Note that the value attribute must appear *after* the
			// type and name attributes.
			//

			//
			// first strip any current value attribute for the field
			//

			//
			// (?:) is a grouping subpattern that does no capturing
			//

    		// handle type attribute first
		$s_pat  = '/(<\s*input[^>]*type="(?:text|password)"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*)(value="[^"]*")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			// handle name attribute first
		$s_pat  = '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*type="(?:text|password)"[^>]*)(value="[^"]*")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			//
			// now add in the new value
			//
		$s_repl  = '$1 value="'.htmlspecialchars(RegReplaceQuote($s_value)).'" $2>';

			// handle type attribute first
		$s_pat  = '/(<\s*input[^>]*type="(?:text|password)"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

			// handle name attribute first
		$s_pat  = '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*type="(?:text|password)"[^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

		return ($s_buf);
	}

		//
		// This function handles textareas.
		//
	function FixTextArea($s_name,$s_value,$s_buf)
	{
			//
			// we search for:
			//	<textarea name="thename"...>value</textarea>
			// and change it to:
			//	<textarea name="thename"...>new value</textarea>
			//

		$s_pat  = '/(<\s*textarea[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*)>.*?<\s*\/\s*textarea\s*>';
		$s_pat .= '/ims';
            //
            // we exclude the closing '>' from the match above so that
            // we can put it below.  We need to do this so that the replacement
            // string is not faulty if the value begins with a digit:
            //      $19 Some Street
            //
		$s_repl = '$1>'.htmlspecialchars(RegReplaceQuote($s_value)).'</textarea>';
		$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

		return ($s_buf);
	}

		//
		// This function handles radio buttons and non-array checkboxes.
		//
	function FixButton($s_name,$s_value,$s_buf)
	{
			//
			// we search for:
			//	<input type="radio" name="thename" value="thevalue" ...
			// and change it to:
			//	<input type="radio" name="thename" value="thevalue" checked="checked"
			//
			// Note that the value attribute must appear *after* the
			// type and name attributes.
			//

			//
			// first strip any current checked attributes
			//

			//
			// (?:) is a grouping subpattern that does no capturing
			//

			// handle type attribute first
            // match: input tag with type 'radio' or 'checkbox' with attribute
            // 'checked' or 'checked="checked"'
            //              <A NAME="PatternInfo">
            //      [^>]*?[^"\w] matches up to a word boundary starting with
            //      'checked' but not '"checked'
            //      (="checked"|(?=[^"\w]))? this matches:
            //              nothing
            //              ="checked"
            //              any character except a word character or " (without
            //              consuming it)
            //
		$s_pat  = '/(<\s*input[^>]*type="(?:radio|checkbox)"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			// handle name attribute first
		$s_pat  = '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*type="(?:radio|checkbox)"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			// handle type attribute first
		$s_pat  = '/(<\s*input[^>]*type="(?:radio|checkbox)"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$2 checked="checked" $3>',$s_buf);

			// handle name attribute first
		$s_pat  = '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '"[^>]*type="(?:radio|checkbox)"[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$2 checked="checked" $3>',$s_buf);

		return ($s_buf);
	}

		//
		// This function handles checkboxes as an array of values.
		//
	function FixCheckboxes($s_name,$a_values,$s_buf)
	{
		//global $aDebug;

			//
			// we search for:
			//	<input type="checkbox" name="thename" value="thevalue" ...
			// and change it to:
			//	<input type="checkbox" name="thename" value="thevalue" checked
			//
			// Note that the value attribute must appear *after* the
			// type and name attributes.
			//

			//
			// first strip any current checked attributes
			//
		//$aDebug[] = "FixCheckboxes: Name='$s_name'";

			// handle type attribute first
            // see <A HREF="fmbadhandler.php#PatternInfo">
		$s_pat  = '/(<\s*input[^>]*type="checkbox"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '\[]"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			// handle name attribute first
		$s_pat  = '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '\[]"[^>]*type="checkbox"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		foreach ($a_values as $s_value)
		{
				// handle type attribute first
			$s_pat	= '/(<\s*input[^>]*type="checkbox"[^>]*name="';
			$s_pat .= preg_quote($s_name,"/");
			$s_pat .= '\[\]"[^>]*value="';
			$s_pat .= preg_quote($s_value,"/");
			$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
			$s_pat .= '/ims';
			$s_buf = preg_replace($s_pat,'$1$2 checked="checked"$3>',$s_buf);
			//$aDebug[] = "Name='$s_name', pat='$s_pat'";

				// handle name attribute first
			$s_pat	= '/(<\s*input[^>]*name="';
			$s_pat .= preg_quote($s_name,"/");
			$s_pat .= '\[\]"[^>]*type="checkbox"[^>]*value="';
			$s_pat .= preg_quote($s_value,"/");
			$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
			$s_pat .= '/ims';
			$s_buf = preg_replace($s_pat,'$1$2 checked="checked">',$s_buf);
		}
		return ($s_buf);
	}

		//
		// This function handles selects.
		//
	function FixSelect($s_name,$s_value,$s_buf)
	{
			//
			// we search for:
			//	<select name="thename"...>
			//	<option value="thevalue">...</option>
			//	</select>
			//

		$s_pat  = '/(<\s*select[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '".*?<\s*option[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '"[^>]*)>';
		$s_pat .= '/ims';
		$s_repl = '$1 selected="selected">';
	//	echo "<p>pat: ".htmlspecialchars($s_pat);
		$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

		return ($s_buf);
	}

		//
		// This function handles multiple selects.
		//
	function FixMultiSelect($s_name,$a_values,$s_buf)
	{
			//
			// we search for:
			//	<select name="thename"...>
			//	<option value="thevalue">...</option>
			//	</select>
			//

		foreach ($a_values as $s_value)
		{
			$s_pat	= '/(<\s*select[^>]*name="';
			$s_pat .= preg_quote($s_name,"/");
			$s_pat .= '\[\]".*?<\s*option[^>]*value="';
			$s_pat .= preg_quote($s_value,"/");
			$s_pat .= '"[^>]*)>';
			$s_pat .= '/ims';
			$s_repl = '$1 selected="selected">';
		//	echo "<p>pat: ".htmlspecialchars($s_pat);
			$s_buf = preg_replace($s_pat,$s_repl,$s_buf);
		}
		return ($s_buf);
	}

		//
		// This function unchecks all checkboxes and select options.
		//
	function UnCheckStuff($s_buf)
	{
		global	$php_errormsg,$sSubmittedForm;

			//
			// we search for:
			//	<input type="checkbox" ... checked
			// and remove "checked" (checked="checked" is OK too)
			//
			// Note that the check attribute must appear *after* the
			// type attribute.
            // see <A HREF="fmbadhandler.php#PatternInfo">
			//

		$s_pat  = '/(<\s*input[^>]*type="checkbox"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

			//
			// we search for:
			//	<option... selected
			// and remove "selected" (selected="selected" is OK too)
            // see <A HREF="fmbadhandler.php#PatternInfo">
			//

		$s_pat  = '/(<\s*option[^>]*?[^"\w])selected(="selected"|(?=[^"\w]))?([^>]*)>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$3>',$s_buf);

		return ($s_buf);
	}

	if ($sSubmittedForm === "")
			//
			// something's gone really haywire
			//
		ReportError("Protocol error");
	if (!CheckValidURL($sSubmittedForm))
		ReportError("Invalid URL '".$sSubmittedForm."'");

		//
		// read the original form, and modify it to provide values
		// for the fields
		//
	$sFormURL = AddUserAgent($sSubmittedForm);
	if (session_id() !== "")
		$sFormURL = AddURLParam($sFormURL,"sessid=".urlencode(session_id()));
    if (defined("SID"))
	    $sFormURL = AddURLParam($sFormURL,SID);
        //
        // Read the form into one big string buffer.
        //
    $sFormBuf = GetURL($sFormURL);
	if ($sFormBuf === false)
		ReportError("Cannot open form URL: $sFormURL: $php_errormsg");
		//
		// For each field do some pattern matching and replacement.
		//

		//
		// first, uncheck any checkboxes and select options
		//
	$sFormBuf = UnCheckStuff($sFormBuf);
	foreach ($aDataArray as $sName=>$sValue)
	{
	//	$sName = StripGPC($sName);	// probably not needed
		//$aDebug[] = "Name='$sName', type=".gettype($sValue);
		if (is_array($sValue))
		{
				//
				// note that if no values are selected for a field,
				// then we will never get here for that field
				//
			$sFormBuf = FixCheckboxes($sName,$sValue,$sFormBuf);
			$sFormBuf = FixMultiSelect($sName,$sValue,$sFormBuf);
		}
		else
		{
			if ($bStripData)
				$sValue = StripGPC($sValue);

				//
				// Fix the field if it's an input type "text" or "password".
				//
			$sFormBuf = FixInputText($sName,$sValue,$sFormBuf);
				//
				// Fix the field if it's radio button.
				//
			$sFormBuf = FixButton($sName,$sValue,$sFormBuf);
				//
				// Fix the field if it's a "textarea".
				//
			$sFormBuf = FixTextArea($sName,$sValue,$sFormBuf);
				//
				// Fix the field if it's a "select".
				//
			$sFormBuf = FixSelect($sName,$sValue,$sFormBuf);
		}
	}

//	$sFormBuf = ShowDebug($sFormBuf);
	echo $sFormBuf;
}
?>
