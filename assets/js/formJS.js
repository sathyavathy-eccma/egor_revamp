$(document).ready(function() {



	// Username Validation

	/**

	checkusername	==>	Username Check - "/^[a-zA-Z0-9_-]{5,20}$/"

						Allow a-z, A-Z, 0-9, Underscore, Hyphen

						String Length(Minimum - 5 & Maximum - 20)

	**/

	var regex_username 	= /^[a-zA-Z0-9_-]{5,19}$/;

	jQuery.validator.addMethod("addUsernameValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_username);

    },"Characters (A-z, 0-9, _, -) are allowed with length 6-20");

	// Username Validation

	/**


	// Remove more tha one space Validation

	/**

	input field	==>	remove more than one space in the input field

	**/
	// var regex_extraspace 		= /\s{2,}/g;
	var regex_extraspace 		= /^\s+|\s+$/;
	// var regex_extraspace 		= /^[a-zA-Z0-9]+(?: [a-zA-Z0-9]+)*$/;

	jQuery.validator.addMethod("removeextraspace", function(value, element) {

         return this.optional(element) || value == value.match(regex_extraspace);

    },"");

	// Username Validation

	/**

	checkurl	==>	Check URL

	**/

	// var regex_url 	= /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
	var regex_url 	= /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/g;

	jQuery.validator.addMethod("addUrlValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_url);

    },"Invalid URL");

	

	// Alpha Validation

	/**

	checkalpha		==>	allowing only Alphabets

	**/

	var regex_alpha = /^(?!\d)[a-zA-Z]+(?: [a-zA-Z]+)*$/;

	jQuery.validator.addMethod("addAlpha", function(value, element) {

         return this.optional(element) || value == value.match(regex_alpha);

    },"Only Characters (A-Z) are allowed and more than one space are not allowed");

	

	// Alpha Space Validation

	/**

	checkspacealpha		==>	allowing only Alphabets with spaces

	**/

	// var regex_alphaspace 		= /^(?!\d)[a-zA-Z]+(?: [a-zA-Z]+)*$/;
	// var regex_alphaspace 		= /[A-Za-z0-9][ ]{2,}/;
	// var regex_alphaspace 		= /^[a-zA-Z0-9.,()#-&@<>\/->]+(?: [a-zA-Z0-9.,()#-]+)*$/;
	var regex_alphaspace 		= /^[a-zA-Z0-9.,()#\-'_&@<>\/->]+(?: [a-zA-Z0-9.,()#\-'_&@<>\/->]+)*$/;

	jQuery.validator.addMethod("addAlphaSpace", function(value, element) {

         return this.optional(element) || value == value.match(regex_alphaspace);

    },"Characters (A-Z, 0-9) and Special Characters (& /. ( ) - , ' # ; :) are allowed with single space");

	

	// Alpha Space Validation

	/**

	checkspacealphaorg		==>	allowing only Alphabets with spaces

	**/

	// var regex_alphaspace 		= /^(?!\d)[a-zA-Z]+(?: [a-zA-Z]+)*$/;
	// var regex_alphaspace 		= /[A-Za-z0-9][ ]{2,}/;
	// var regex_alphaspace 		= /^[a-zA-Z0-9.,()#-&@<>\/->]+(?: [a-zA-Z0-9.,()#-]+)*$/;
	var regex_alphaspaceorg 		= /^[a-zA-Z0-9.,()#\-'_&@<>\/->]+(?: [a-zA-Z0-9.,()#\-'_&@<>\/->]+)*$/;

	jQuery.validator.addMethod("addAlphaSpaceorg", function(value, element) {

         return this.optional(element) || value == value.match(regex_alphaspaceorg);

    },"Characters (A-Z, 0-9) and Special Characters (& /. ( ) - _ , ' # ; : < > @) are allowed with single space");

	

	// Alpha Numeric Validation

	/**

	checknumericalpha	==>	allowing only Alphabets & Numbers

	**/

	var regex_alphanumeric 		= /^[a-zA-Z0-9]+$/;

	jQuery.validator.addMethod("addAlphaNumeric", function(value, element) {

         return this.optional(element) || value == value.match(regex_alphanumeric);

    },"Characters (A-Z, 0-9) are allowed");

	

	// Alpha Numeric & Space Validation

	/**

	checkspacenumericalpha		==>	allowing only Alphabets & Numbers with spaces

	**/

	var regex_alphanumericspace 		= /^[^-\s][a-zA-Z0-9 ]{3,255}$/;

	jQuery.validator.addMethod("addAlphaNumericSpace", function(value, element) {

         return this.optional(element) || value == value.match(regex_alphanumericspace);

    },"Characters (A-Z, 0-9) are allowed with spaces with length 3-255");

	

	// Numeric Validation

	/**

	checknumber		==>	allowing only Numbers

	**/

	var regex_numeric 		= /^[0-9]+$/;

	jQuery.validator.addMethod("addNumeric", function(value, element) {

         return this.optional(element) || value == value.match(regex_numeric);

    },"Characters (0-9) are allowed");

	

	// Numeric Space Validation

	/**

	checkspacenumber		==>	allowing only Numbers with Space

	**/

	var regex_space_numeric 		= /^[0-9 ]+$/;

	jQuery.validator.addMethod("addSpaceNumeric", function(value, element) {

         return this.optional(element) || value == value.match(regex_space_numeric);

    },"Characters (0-9) are allowed");

	

	// Name Validation

	/**

	checksupplierlength		==>	allowing only character length validation 

	**/

	var regex_supplier_length 		= /^[^-\s].{3,255}$/;

	// var regex_supplier_length 		= /^(?![\s-])[A-Za-zÂªÂµÂºÃ€-Ã–Ã˜-Ã¶Ã¸-ËË†-Ë‘Ë -Ë¤Ë¬Ë®Í°-Í´Í¶Í·Íº-Í½Í¿Î†Îˆ-ÎŠÎŒÎŽ-Î¡Î£-ÏµÏ·-ÒÒŠ-Ô¯Ô±-Õ–Õ™Õ¡-Ö‡×-×ª×°-×²Ø -ÙŠÙ®Ù¯Ù±-Û“Û•Û¥Û¦Û®Û¯Ûº-Û¼Û¿ÜÜ’-Ü¯Ý-Þ¥Þ±ßŠ-ßªß´ßµßºà €-à •à šà ¤à ¨à¡€-à¡˜à¢ -à¢´à¤„-à¤¹à¤½à¥à¥˜-à¥¡à¥±-à¦€à¦…-à¦Œà¦à¦à¦“-à¦¨à¦ª-à¦°à¦²à¦¶-à¦¹à¦½à§Žà§œà§à§Ÿ-à§¡à§°à§±à¨…-à¨Šà¨à¨à¨“-à¨¨à¨ª-à¨°à¨²à¨³à¨µà¨¶à¨¸à¨¹à©™-à©œà©žà©²-à©´àª…-àªàª-àª‘àª“-àª¨àªª-àª°àª²àª³àªµ-àª¹àª½à«à« à«¡à«¹à¬…-à¬Œà¬à¬à¬“-à¬¨à¬ª-à¬°à¬²à¬³à¬µ-à¬¹à¬½à­œà­à­Ÿ-à­¡à­±à®ƒà®…-à®Šà®Ž-à®à®’-à®•à®™à®šà®œà®žà®Ÿà®£à®¤à®¨-à®ªà®®-à®¹à¯à°…-à°Œà°Ž-à°à°’-à°¨à°ª-à°¹à°½à±˜-à±šà± à±¡à²…-à²Œà²Ž-à²à²’-à²¨à²ª-à²³à²µ-à²¹à²½à³žà³ à³¡à³±à³²à´…-à´Œà´Ž-à´à´’-à´ºà´½àµŽàµŸ-àµ¡àµº-àµ¿à¶…-à¶–à¶š-à¶±à¶³-à¶»à¶½à·€-à·†à¸-à¸°à¸²à¸³à¹€-à¹†àºàº‚àº„àº‡àºˆàºŠàºàº”-àº—àº™-àºŸàº¡-àº£àº¥àº§àºªàº«àº­-àº°àº²àº³àº½à»€-à»„à»†à»œ-à»Ÿà¼€à½€-à½‡à½‰-à½¬à¾ˆ-à¾Œá€€-á€ªá€¿á-á•áš-áá¡á¥á¦á®-á°áµ-á‚á‚Žá‚ -áƒ…áƒ‡áƒáƒ-áƒºáƒ¼-á‰ˆá‰Š-á‰á‰-á‰–á‰˜á‰š-á‰á‰ -áŠˆáŠŠ-áŠáŠ-áŠ°áŠ²-áŠµáŠ¸-áŠ¾á‹€á‹‚-á‹…á‹ˆ-á‹–á‹˜-áŒáŒ’-áŒ•áŒ˜-ášáŽ€-áŽáŽ -áµá¸-á½á-á™¬á™¯-á™¿áš-áššáš -á›ªá›±-á›¸áœ€-áœŒáœŽ-áœ‘áœ -áœ±á€-á‘á -á¬á®-á°áž€-áž³áŸ—áŸœá  -á¡·á¢€-á¢¨á¢ªá¢°-á£µá¤€-á¤žá¥-á¥­á¥°-á¥´á¦€-á¦«á¦°-á§‰á¨€-á¨–á¨ -á©”áª§á¬…-á¬³á­…-á­‹á®ƒ-á® á®®á®¯á®º-á¯¥á°€-á°£á±-á±á±š-á±½á³©-á³¬á³®-á³±á³µá³¶á´€-á¶¿á¸€-á¼•á¼˜-á¼á¼ -á½…á½ˆ-á½á½-á½—á½™á½›á½á½Ÿ-á½½á¾€-á¾´á¾¶-á¾¼á¾¾á¿‚-á¿„á¿†-á¿Œá¿-á¿“á¿–-á¿›á¿ -á¿¬á¿²-á¿´á¿¶-á¿¼â±â¿â‚-â‚œâ„‚â„‡â„Š-â„“â„•â„™-â„â„¤â„¦â„¨â„ª-â„­â„¯-â„¹â„¼-â„¿â……-â…‰â…Žâ†ƒâ†„â°€-â°®â°°-â±žâ± -â³¤â³«-â³®â³²â³³â´€-â´¥â´§â´­â´°-âµ§âµ¯â¶€-â¶–â¶ -â¶¦â¶¨-â¶®â¶°-â¶¶â¶¸-â¶¾â·€-â·†â·ˆ-â·Žâ·-â·–â·˜-â·žâ¸¯ã€…ã€†ã€±-ã€µã€»ã€¼ã-ã‚–ã‚-ã‚Ÿã‚¡-ãƒºãƒ¼-ãƒ¿ã„…-ã„­ã„±-ã†Žã† -ã†ºã‡°-ã‡¿ã€-ä¶µä¸€-é¿•ê€€-ê’Œê“-ê“½ê”€-ê˜Œê˜-ê˜Ÿê˜ªê˜«ê™€-ê™®ê™¿-êšêš -ê›¥êœ—-êœŸêœ¢-êžˆêž‹-êž­êž°-êž·êŸ·-ê ê ƒ-ê …ê ‡-ê Šê Œ-ê ¢ê¡€-ê¡³ê¢‚-ê¢³ê£²-ê£·ê£»ê£½ê¤Š-ê¤¥ê¤°-ê¥†ê¥ -ê¥¼ê¦„-ê¦²ê§ê§ -ê§¤ê§¦-ê§¯ê§º-ê§¾ê¨€-ê¨¨ê©€-ê©‚ê©„-ê©‹ê© -ê©¶ê©ºê©¾-êª¯êª±êªµêª¶êª¹-êª½ê«€ê«‚ê«›-ê«ê« -ê«ªê«²-ê«´ê¬-ê¬†ê¬‰-ê¬Žê¬‘-ê¬–ê¬ -ê¬¦ê¬¨-ê¬®ê¬°-ê­šê­œ-ê­¥ê­°-ê¯¢ê°€-íž£íž°-íŸ†íŸ‹-íŸ»ï¤€-ï©­ï©°-ï«™ï¬€-ï¬†ï¬“-ï¬—ï¬ï¬Ÿ-ï¬¨ï¬ª-ï¬¶ï¬¸-ï¬¼ï¬¾ï­€ï­ï­ƒï­„ï­†-ï®±ï¯“-ï´½ïµ-ï¶ï¶’-ï·‡ï·°-ï·»ï¹°-ï¹´ï¹¶-ï»¼ï¼¡-ï¼ºï½-ï½šï½¦-ï¾¾ï¿‚-ï¿‡ï¿Š-ï¿ï¿’-ï¿—ï¿š-ï¿œ0-9\s-,:;'"+-_&()#\'" ]*\S$/;

	// var regex_supplier_length 		= /^[A-Za-z0-9][ A-Za-z-9,:;+-_&#()\'"\n]+$/;

	//var regex_supplier_length 		= /^[ A-Za-z0-9_@./#&+-]*$/;

	

	jQuery.validator.addMethod("addLengthValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_supplier_length);

    },"Only Characters (A-Z), Numbers (0-9) & Some special characters (& ' - , : ; \" + - _ ( ) #) are allowed.");

	

	// Name Validation

	/**

	checkonlylength		==>	allowing only character length validation 

	**/

	//var regex_only_length 		= /^[^-\s].{3,255}$/;

	/*var regex_only_length 		= /^[A-Za-z0-9][ A-Za-z-9,:;+-_&#()\'"\n]{2,255}$/;*/

	/*var regex_only_length 		= /^(\s*\w){2,255}\s*$/ ;*/

	/*var regex_only_length 		= /^[^-\s]*[\s\S]{2,255}$/ ;*/

	// var regex_only_length 		= /^\S.+\S{2,255}$/ ;

	// var regex_only_length 		= /^\S$|^\S[ \S]*\S$/ ;

	// var regex_only_length 		= /^[\s\S]{3,255}$/;

	var regex_only_length 		= /^(?![\s-])[\W\S-]{2,255}\S$/;

	jQuery.validator.addMethod("addOnlyLengthValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_only_length);

    },"Characters are allowed with length 3-255");

	

	// Name Validation

	/**

	checkname		==>	allowing Alphabets, Dots, Spaces

						ensure DOT never comes at the start of the name

	**/

	var regex_name 		= /^[a-zA-Z .]{5,29}$/;

	jQuery.validator.addMethod("addNameValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_name);

    },"Characters (A-Z, Space, Dot) are allowed with length 6-30");



    // Supplier Name Validation

	/**

	checksuppliername		==>	allowing Alphabets, Dots, Spaces

						ensure DOT never comes at the start of the name

	**/

	var regex_supplier_name 		= /^[^-\s][a-zA-Z .][ A-Za-z-9.,:;\'"]{4,255}$/; 

	jQuery.validator.addMethod("addSupplierNameValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_supplier_name);

    },"Characters (A-Z, Space, Dot) are allowed with length 6-255");



    // email Validation

	/**

	checkemail		==>	allowing Alphabets, Dots, Spaces

						ensure DOT never comes at the start of the name

	**/
	// /^(?![\s-])[A-Za-zÂªÂµÂºÃ€-Ã–Ã˜-Ã¶Ã¸-ËË†-Ë‘Ë -Ë¤Ë¬Ë®Í°-Í´Í¶Í·Íº-Í½Í¿Î†Îˆ-ÎŠÎŒÎŽ-Î¡Î£-ÏµÏ·-ÒÒŠ-Ô¯Ô±-Õ–Õ™Õ¡-Ö‡×-×ª×°-×²Ø -ÙŠÙ®Ù¯Ù±-Û“Û•Û¥Û¦Û®Û¯Ûº-Û¼Û¿ÜÜ’-Ü¯Ý-Þ¥Þ±ßŠ-ßªß´ßµßºà €-à •à šà ¤à ¨à¡€-à¡˜à¢ -à¢´à¤„-à¤¹à¤½à¥à¥˜-à¥¡à¥±-à¦€à¦…-à¦Œà¦à¦à¦“-à¦¨à¦ª-à¦°à¦²à¦¶-à¦¹à¦½à§Žà§œà§à§Ÿ-à§¡à§°à§±à¨…-à¨Šà¨à¨à¨“-à¨¨à¨ª-à¨°à¨²à¨³à¨µà¨¶à¨¸à¨¹à©™-à©œà©žà©²-à©´àª…-àªàª-àª‘àª“-àª¨àªª-àª°àª²àª³àªµ-àª¹àª½à«à« à«¡à«¹à¬…-à¬Œà¬à¬à¬“-à¬¨à¬ª-à¬°à¬²à¬³à¬µ-à¬¹à¬½à­œà­à­Ÿ-à­¡à­±à®ƒà®…-à®Šà®Ž-à®à®’-à®•à®™à®šà®œà®žà®Ÿà®£à®¤à®¨-à®ªà®®-à®¹à¯à°…-à°Œà°Ž-à°à°’-à°¨à°ª-à°¹à°½à±˜-à±šà± à±¡à²…-à²Œà²Ž-à²à²’-à²¨à²ª-à²³à²µ-à²¹à²½à³žà³ à³¡à³±à³²à´…-à´Œà´Ž-à´à´’-à´ºà´½àµŽàµŸ-àµ¡àµº-àµ¿à¶…-à¶–à¶š-à¶±à¶³-à¶»à¶½à·€-à·†à¸-à¸°à¸²à¸³à¹€-à¹†àºàº‚àº„àº‡àºˆàºŠàºàº”-àº—àº™-àºŸàº¡-àº£àº¥àº§àºªàº«àº­-àº°àº²àº³àº½à»€-à»„à»†à»œ-à»Ÿà¼€à½€-à½‡à½‰-à½¬à¾ˆ-à¾Œá€€-á€ªá€¿á-á•áš-áá¡á¥á¦á®-á°áµ-á‚á‚Žá‚ -áƒ…áƒ‡áƒáƒ-áƒºáƒ¼-á‰ˆá‰Š-á‰á‰-á‰–á‰˜á‰š-á‰á‰ -áŠˆáŠŠ-áŠáŠ-áŠ°áŠ²-áŠµáŠ¸-áŠ¾á‹€á‹‚-á‹…á‹ˆ-á‹–á‹˜-áŒáŒ’-áŒ•áŒ˜-ášáŽ€-áŽáŽ -áµá¸-á½á-á™¬á™¯-á™¿áš-áššáš -á›ªá›±-á›¸áœ€-áœŒáœŽ-áœ‘áœ -áœ±á€-á‘á -á¬á®-á°áž€-áž³áŸ—áŸœá  -á¡·á¢€-á¢¨á¢ªá¢°-á£µá¤€-á¤žá¥-á¥­á¥°-á¥´á¦€-á¦«á¦°-á§‰á¨€-á¨–á¨ -á©”áª§á¬…-á¬³á­…-á­‹á®ƒ-á® á®®á®¯á®º-á¯¥á°€-á°£á±-á±á±š-á±½á³©-á³¬á³®-á³±á³µá³¶á´€-á¶¿á¸€-á¼•á¼˜-á¼á¼ -á½…á½ˆ-á½á½-á½—á½™á½›á½á½Ÿ-á½½á¾€-á¾´á¾¶-á¾¼á¾¾á¿‚-á¿„á¿†-á¿Œá¿-á¿“á¿–-á¿›á¿ -á¿¬á¿²-á¿´á¿¶-á¿¼â±â¿â‚-â‚œâ„‚â„‡â„Š-â„“â„•â„™-â„â„¤â„¦â„¨â„ª-â„­â„¯-â„¹â„¼-â„¿â……-â…‰â…Žâ†ƒâ†„â°€-â°®â°°-â±žâ± -â³¤â³«-â³®â³²â³³â´€-â´¥â´§â´­â´°-âµ§âµ¯â¶€-â¶–â¶ -â¶¦â¶¨-â¶®â¶°-â¶¶â¶¸-â¶¾â·€-â·†â·ˆ-â·Žâ·-â·–â·˜-â·žâ¸¯ã€…ã€†ã€±-ã€µã€»ã€¼ã-ã‚–ã‚-ã‚Ÿã‚¡-ãƒºãƒ¼-ãƒ¿ã„…-ã„­ã„±-ã†Žã† -ã†ºã‡°-ã‡¿ã€-ä¶µä¸€-é¿•ê€€-ê’Œê“-ê“½ê”€-ê˜Œê˜-ê˜Ÿê˜ªê˜«ê™€-ê™®ê™¿-êšêš -ê›¥êœ—-êœŸêœ¢-êžˆêž‹-êž­êž°-êž·êŸ·-ê ê ƒ-ê …ê ‡-ê Šê Œ-ê ¢ê¡€-ê¡³ê¢‚-ê¢³ê£²-ê£·ê£»ê£½ê¤Š-ê¤¥ê¤°-ê¥†ê¥ -ê¥¼ê¦„-ê¦²ê§ê§ -ê§¤ê§¦-ê§¯ê§º-ê§¾ê¨€-ê¨¨ê©€-ê©‚ê©„-ê©‹ê© -ê©¶ê©ºê©¾-êª¯êª±êªµêª¶êª¹-êª½ê«€ê«‚ê«›-ê«ê« -ê«ªê«²-ê«´ê¬-ê¬†ê¬‰-ê¬Žê¬‘-ê¬–ê¬ -ê¬¦ê¬¨-ê¬®ê¬°-ê­šê­œ-ê­¥ê­°-ê¯¢ê°€-íž£íž°-íŸ†íŸ‹-íŸ»ï¤€-ï©­ï©°-ï«™ï¬€-ï¬†ï¬“-ï¬—ï¬ï¬Ÿ-ï¬¨ï¬ª-ï¬¶ï¬¸-ï¬¼ï¬¾ï­€ï­ï­ƒï­„ï­†-ï®±ï¯“-ï´½ïµ-ï¶ï¶’-ï·‡ï·°-ï·»ï¹°-ï¹´ï¹¶-ï»¼ï¼¡-ï¼ºï½-ï½šï½¦-ï¾¾ï¿‚-ï¿‡ï¿Š-ï¿ï¿’-ï¿—ï¿š-ï¿œ0-9\s-,:;'"+-_&()#\'" ]*\S$/;

	// var regex_email = /^[a-zA-Z0-9\-.&_]+@[a-zA-Z0-9\-](?:[a-zA-Z0-9\-]{2,61}[a-zA-Z0-9\-])?(?:\.[a-zA-Z0-9\-](?:[a-zA-Z0-9\-]{0,61}[a-zA-Z0-9\-])?)*$/; 

	var regex_email = /^[a-zA-Z0-9\-.&_]+@[a-zA-Z0-9\-](?:[a-zA-Z0-9\-]{2,61}[a-zA-Z0-9\-])?(?:\.[a-zA-Z0-9\-](?:[a-zA-Z0-9\-]{0,61}[a-zA-Z0-9\-])?)*$/; 

	jQuery.validator.addMethod("addemail", function(value, element) {

         return this.optional(element) || value == value.match(regex_email);

    },"Please enter a valid email");



     // Supplier Name Validation

	/**

	checksuppliercomments		==>	allowing Alphabets, Dots, Spaces

						ensure DOT never comes at the start of the name

	**/

	var regex_supplier_comments 	= /^[^-\s][a-zA-Z .][ A-Za-z-9,:;+-_&#\'"\n]{5,29}$/;

	jQuery.validator.addMethod("addSupplierCommentsValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_supplier_comments);

    },"Characters (A-Z, Space, Dot) are allowed with length 6-30");

	

	

	// Password Validation

	/**

	checkpassword	==>	Password matching expression. 

						Match all alphanumeric character and predefined wild characters. 

						Password Length(Minimum - 5 & Maximum - 20)

	**/

	var regex_password 	= /^[a-z0-9A-Z_!@#$%^&*()-]{5,29}$/;

	jQuery.validator.addMethod("addPasswordValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_password);

    },"Characters (A-Z, 0-9) & some special characters with length 6-30");

	

	// Address Field Validation

	/**

	checkaddress	==>	Only Characters, Numbers & Some special characters are Allowed

	**/

	var regex_address 	= /^[A-Za-z0-9][ A-Za-z-9,:;+-_&()#\'"\n]{3,255}$/;

	jQuery.validator.addMethod("addAddressValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_address);

    },"Only Characters (A-Z), Numbers (0-9) & Some special characters are allowed with length 3-255");

	

	// Zipcode Field Validation

	/**

	checkzipcode	==>	Only Characters, Numbers, Spaces & Hypen are Allowed

	**/

	// var regex_zipcode	= /^([a-zA-Z0-9][\s-]*){8}$/;

	// var regex_zipcode	= /^(?=.*\d.*)[A-Za-z0-9]{3,15}$/;
	var regex_zipcode	= /^[A-Za-z0-9 \-]{3,15}$/;
	// var regex_zipcode	= /^([a-zA-Z0-9][\s-]*){3,10}$/;

	jQuery.validator.addMethod("addZipcodeValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_zipcode);

    },"Only Numbers (0-9), Alphabets (A-Z) & length should be between 3-15 are allowed");

	

	// Zipcode2 Validation

	/**

	checkziponlylength		==>	allowing only character length validation 

	**/

	//var regex_only_length 		= /^[^-\s].{3,255}$/;

	/*var regex_only_length 		= /^[A-Za-z0-9][ A-Za-z-9,:;+-_&#()\'"\n]{2,255}$/;*/

	/*var regex_only_length 		= /^(\s*\w){2,255}\s*$/ ;*/

	/*var regex_only_length 		= /^[^-\s]*[\s\S]{2,255}$/ ;*/

	// var regex_only_length 		= /^\S.+\S{2,255}$/ ;

	var regex_zipcode_length 		= /^(?=\S.{3,30}\S$).*[ ]{2,}/ ;

	/*var regex_zipcode_length 		= /^\w{3,9}$/;*/

	jQuery.validator.addMethod("addZipOnlyLengthValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_zipcode_length);

    },"Allowed with length should be greater than 4 with single space");

	



	// Phone Field Validation

	/**

	checkfivedigit	==>	

	**/

	var regex_fivedigit		= /^[0-9]{5}$/;

	jQuery.validator.addMethod("addFiveDigitValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_fivedigit);

    },"Only Numbers (0-9) are Allowed with length 5");



	// other Field Validation

	/**

	checkother	==>	

	**/

	// var regex_other		= /^[^-\s][\w\s-]+$/;

	//var regex_other		= /^[^-\s][\w\s-][a-zA-ZÃ¼Ã¶Ã¤ÃœÃ–Ã„ÃŸ]{3,255}$/; 
	 var regex_other		= /^(?!\s)(?![^]*\s$)[a-zA-Z0-9\s()-,:;+-_&#%\'"\n]{2,255}$/;
	// var regex_other		= /^[^-\s][a-zA-Z0-9 .][,:;+-_&#\'"\n]{1,255}$/;
	//var regex_other		= /^[^-\s][a-zA-Z0-9 .][ A-Za-z0-9,:;+-_&#\'"\n]{1,255}$/;

	jQuery.validator.addMethod("addOther", function(value, element) {

         return this.optional(element) || value == value.match(regex_other);

    },"Empty Space not allowed at the beginning and characters are allowed with spaces with length 3-255");

	



	// Phone Field Validation

	/**

	checkswiftcode	==>	

	**/

	var regex_swiftcode		= /^[0-9]{8,11}$/;

	jQuery.validator.addMethod("addSwiftCodeValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_swiftcode);

    },"Only Numbers (0-9) are Allowed with length 8-11");

	

	// Phone Field Validation

	/**

	checkphone	==>	Only Characters, Numbers, Spaces & Hypen are Allowed

	**/

	// var regex_phone		= /^[0-9-+()]+$/;
	var regex_phone		= /^[0-9-+()]+$/;

	jQuery.validator.addMethod("addPhoneValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_phone);

    },"Only Numbers (0-9) with special characters like + - () are allowed");

	

	// Mobile Field Validation

	/**

	checkmobile	==>	Only Characters, Numbers, Spaces & Hypen are Allowed

	**/

	//var regex_mobile	= /^\d{9,10}$/;

	var regex_mobile	= /^\d{8,9}$/;

	jQuery.validator.addMethod("addMobileValidation", function(value, element) {

         return this.optional(element) || value == value.match(regex_mobile);

    },"Only Numbers (0-9) & Hypen are Allowed with length 9-10");

	

	// Checkbox Validation Script

	$.validator.addMethod("checkboxvalidation", function(value, elem, param) {

		if($(".checkboxvalidation:checkbox:checked").length > 0){

		   return true;

	   }else {

		   return false;

	   }

	}," Please select the option ");

	

	// Check file input type validation - File Size

	$.validator.addMethod('filesize', function(value, element, param) {

		return this.optional(element) || (element.files[0].size <= param) 

	}, " File size exceeds the limit ");

	

	// Dynamic Form Name

	$("form").each(function() {

		var passwordfieldname = "";

		var rulesString = "";

		var rulesComplete = "";

		var className = "";

		var messages = "";

		var i=0;

		$("input, select, checkbox, radio, textarea").each(function(){	

			var className = $(this).attr("class");

			if(className)

			{

				if(	className.toLowerCase().indexOf("checkrequired") >= 0 ||

					className.toLowerCase().indexOf("checkusername") >= 0 ||
					className.toLowerCase().indexOf("checkextraspace") >= 0 ||

					className.toLowerCase().indexOf("checkavailability") >= 0 ||

					className.toLowerCase().indexOf("checkpassword") >= 0 ||

					className.toLowerCase().indexOf("checkconfirmpassword") >= 0 ||

					className.toLowerCase().indexOf("checkname") >= 0 ||

					className.toLowerCase().indexOf("checksuppliername") >= 0 ||

					className.toLowerCase().indexOf("checksuppliercomments") >= 0 ||

					className.toLowerCase().indexOf("checkemail") >= 0 ||

					className.toLowerCase().indexOf("checkaddress") >= 0 ||

					className.toLowerCase().indexOf("checkphone") >= 0 ||

					className.toLowerCase().indexOf("checkswiftcode") >= 0 ||

					className.toLowerCase().indexOf("checkfivedigit") >= 0 ||

					className.toLowerCase().indexOf("checkother") >= 0 ||

					className.toLowerCase().indexOf("checkmobile") >= 0 ||

					className.toLowerCase().indexOf("checknumber") >= 0 ||

					className.toLowerCase().indexOf("checkspacenumber") >= 0 ||

					className.toLowerCase().indexOf("checkboxrequired") >= 0 ||

					className.toLowerCase().indexOf("checkradiorequired") >= 0 ||	

					className.toLowerCase().indexOf("checkdatepicker") >= 0 ||

					className.toLowerCase().indexOf("checktimepicker") >= 0 ||

					className.toLowerCase().indexOf("checkalpha") >= 0 ||

					className.toLowerCase().indexOf("checkspacealpha") >= 0 ||
					className.toLowerCase().indexOf("checkspacealphaorg") >= 0 ||

					className.toLowerCase().indexOf("checknumericalpha") >= 0 ||

					className.toLowerCase().indexOf("checkspacenumericalpha") >= 0 ||

					className.toLowerCase().indexOf("checklength") >= 0 ||

					className.toLowerCase().indexOf("checkfiletype") >= 0 ||

					className.toLowerCase().indexOf("checkfilesize") >= 0 ||

					className.toLowerCase().indexOf("checkurl") >= 0 ||

					className.toLowerCase().indexOf("loadcountry") >= 0 ||

					className.toLowerCase().indexOf("checkzipcode") >= 0 ||

					className.toLowerCase().indexOf("checkziponlylength") >= 0 ||

					className.toLowerCase().indexOf("checksupplierlength") >= 0 ||

					className.toLowerCase().indexOf("checkonlylength") >= 0

					) 

				{

					var element = className.split(" "), part;

					rulesString = ' "'+$(this).attr("id")+'" : { ';

					for (var i = 0; i < element.length; i++) {

						if(element[i].toLowerCase().indexOf("checkrequired") >= 0) {

							rulesString +=' "required": true,';

						}

						if(element[i].toLowerCase().indexOf("checkusername") >= 0) {

							rulesString +=' "addUsernameValidation": true,';

						}
						if(element[i].toLowerCase().indexOf("checkextraspace") >= 0) {

							rulesString +=' "removeextraspace": true,';

						}

						if(element[i].toLowerCase().indexOf("checkavailability") >= 0) {

							var urlArr = element[i].toLowerCase().split(":")

							var urlLink = baseUrl;

							urlLink += urlArr[1];

							rulesString +=	' "remote": "'+urlLink+'",';

						}

						if(element[i].toLowerCase().indexOf("checkpassword") >= 0) {

							rulesString +='"addPasswordValidation": true,';

							passwordfieldname = '"#'+$(this).attr("id")+'"';

						}

						if(element[i].toLowerCase().indexOf("checkconfirmpassword") >= 0) {

							rulesString +=' "addPasswordValidation": true,';

							rulesString +=' "equalTo": '+passwordfieldname+',';

						}

						if(element[i].toLowerCase().indexOf("checksupplierlength") >= 0) {

							rulesString +=' "addLengthValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkonlylength") >= 0) {

							rulesString +=' "addOnlyLengthValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkname") >= 0) {

							rulesString +=' "addNameValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checksuppliercomments") >= 0) {

							rulesString +=' "addSupplierCommentsValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checksuppliername") >= 0) {

							rulesString +=' "addSupplierNameValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkzipcode") >= 0) {

							rulesString +=' "addZipcodeValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkziponlylength") >= 0) {

							rulesString +=' "addZipOnlyLengthValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkemail") >= 0) {

							rulesString +=' "addemail": true,';

						}

						if(element[i].toLowerCase().indexOf("checkaddress") >= 0) {

							rulesString +=' "addAddressValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkphone") >= 0) {

							rulesString +=' "addPhoneValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkswiftcode") >= 0) {

							rulesString +=' "addSwiftCodeValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkfivedigit") >= 0) {

							rulesString +=' "addFiveDigitValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checkother") >= 0) {

							rulesString +=' "addOther": true,';

						}

						if(element[i].toLowerCase().indexOf("checkmobile") >= 0) {

							rulesString +=' "addMobileValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("checknumber") >= 0) {

							rulesString +=' "addNumeric": true,';

						}

						if(element[i].toLowerCase().indexOf("checkspacenumber") >= 0) {

							rulesString +=' "addSpaceNumeric": true,';

						}

						if(element[i].toLowerCase().indexOf("checkboxrequired") >= 0 || element[i].toLowerCase().indexOf("checkradiorequired") >= 0) {

							$("#"+$(this).attr("id")).addClass("required");

						}

						if(element[i].toLowerCase().indexOf("checkdatepicker") >= 0) {

							$("#"+$(this).attr("id")).datepicker({ changeMonth: true,changeYear: true, yearRange : "1980:2100", dateFormat:'yy-mm-dd' });

							$('.MonthYearOnly').datepicker({

								changeMonth: true,

								changeYear: true,

								showButtonPanel: true,

								dateFormat: 'mm/yy',

								onClose: function(dateText, inst) { 

									var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();

									var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

									$(this).datepicker('setDate', new Date(year, month, 1));

								}

							}).focus(function() {

								$(".ui-datepicker-calendar").hide();

							});

						}

						if(element[i].toLowerCase().indexOf("checktimepicker") >= 0) {

							$("#"+$(this).attr("id")).ptTimeSelect();

						}

						if(element[i].toLowerCase().indexOf("checkalpha") >= 0) {

							rulesString +=' "addAlpha": true,';

						}

						if(element[i].toLowerCase().indexOf("checkspacealpha") >= 0) {

							rulesString +=' "addAlphaSpace": true,';

						}

						if(element[i].toLowerCase().indexOf("checkspacealphaorg") >= 0) {

							rulesString +=' "addAlphaSpaceorg": true,';

						}

						if(element[i].toLowerCase().indexOf("checknumericalpha") >= 0) {

							rulesString +=' "addAlphaNumeric": true,';

						}

						if(element[i].toLowerCase().indexOf("checkspacenumericalpha") >= 0) {

							rulesString +=' "addAlphaNumericSpace": true,';

						}

						if(element[i].toLowerCase().indexOf("checklength") >= 0) {

							var minmaxString = element[i].split("_"), part;

							if(minmaxString.length>1) {

								rulesString +=' "minlength" : '+minmaxString[1]+', "maxlength": '+minmaxString[2]+',';

							} else {

								rulesString += ' "minlength" :3, "maxlength" :255,';

							}

						}

						if(element[i].toLowerCase().indexOf("checkfiletype") >= 0) {

							var validateString = element[i].split(":"), part;

							rulesString += ' "accept" : "'+validateString[1]+'",';

						}

						if(element[i].toLowerCase().indexOf("checkfilesize") >= 0) {

							var validateString = element[i].split(":"), part;

							rulesString += ' "filesize" : "'+validateString[1]+'",';

						}

						if(element[i].toLowerCase().indexOf("checkurl") >= 0) {

							rulesString +=' "addUrlValidation": true,';

						}

						if(element[i].toLowerCase().indexOf("loadcountry") >= 0) {

							var urlLink = baseUrl;

							urlLink += "/admin/ajax/loadplaceinfo";

							$("#country").change(function() {

								jQuery.getJSON(urlLink,{ countrycode:$("#country").val() },

								function(json) {

									$('#state').empty();

									$('#city').empty();

									$("#city").append($("<option>--Select--</option>").attr("value",""))

									jQuery.each(json, function(key, val) {

										$("#state").append($("<option></option>").

										attr("value",key).

										text(val)); 

									});

								});

							});

							jQuery("#state").change(function() {

								jQuery.getJSON(urlLink,{ statecode:jQuery("#state").val() },

								function(json) {

									$('#city').empty();

									jQuery.each(json, function(key, val) {

										$("#city").append($("<option></option>").

										attr("value",key).

										text(val)); 

									});

								});

							});	

						}

					}

					rulesString = rulesString.substring(0,rulesString.length - 1);

					rulesString += " } ";

					rulesComplete += rulesString+",";

				}

			}

		});

		rulesComplete = rulesComplete.substring(0,rulesComplete.length - 1);

		rulesComplete = "{"+rulesComplete+"}";	

		// alert(rulesComplete);

		var obj = jQuery.parseJSON(rulesComplete);

		var newRules = { debug:false, 

						"rules" : obj,

						errorPlacement: function(error, element) {

							if(element.attr("type") == 'radio') {

								error.appendTo(element.parent().parent());

								$('input:radio').removeClass('error');

							} else if(element.attr("type") == 'checkbox') {

								error.appendTo(element.parent().parent());

								$('input:checkbox').removeClass('error');

							}

				            else if (element.hasClass('select2-hidden-accessible')) { // Input with icons and Select2

				                error.appendTo(element.parent());

				            } 

				            else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {

								 error.appendTo(element.parent().parent());

							}

							else if (element.hasClass('multiselect-display-values')) {

									error.insertAfter(element.next('.btn-group'));

									//error.appendTo(element.next('.btn-group'));

									element.focus();

							} 

				            else {

								error.insertAfter(element);

								console.log(element);

							}

						}

					};

		console.log(newRules);

		$("#"+$(this).attr('id')).validate(

			newRules

		);

	});

});



jQuery.fn.multiselect = function() {

    $(this).each(function() {

        var checkboxes = $(this).find("input:checkbox");

        alert(checkboxes);

        checkboxes.each(function() {

            var checkbox = $(this);

            // Highlight pre-selected checkboxes

            if (checkbox.attr("checked"))

                checkbox.parent().addClass("multiselect-on");

 

            // Highlight checkboxes that the user selects

            checkbox.click(function() {

                if (checkbox.attr("checked"))

                    checkbox.parent().addClass("multiselect-on");

                else

                    checkbox.parent().removeClass("multiselect-on");

            });

        });

    });

};


