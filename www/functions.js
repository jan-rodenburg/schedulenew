function checkForm(f) {
	var msg = "Please fix these errors:\n";
	var errors = false;
	
	if (f.fname.value == "") {
		msg+="-First name is required\n";
		errors = true;
	}
	if (f.lname.value == "") {
		msg+="-Last name is required\n";
		errors = true;
	}
	if (f.phone.value == "") {
		msg+="-Phone number is required\n";
		errors = true;
	}
	if (f.institution.value == "") {
		msg+="-Institution is required\n";
		errors = true;
	}
	if ( (f.email.value == "") || ( f.email.value.indexOf('@') == -1) ) {
		msg+="-Valid email is required\n";
		errors = true;
	}
	if (errors) {
		window.alert(msg);
		return false;
	}
		
	return true;
}

function verifyEdit() {
	var msg = "Please fix these errors:\n";
	var errors = false;
	
	if ( (document.register.email.value != "") && ( document.register.email.value.indexOf('@') == -1) ) {
		msg+="-Valid email is required\n";
		errors = true;
	}
	if ( (document.register.password.value != "") && (document.register.password.value.length < 6) ) {
		msg+="-Min 6 character password is required\n";
		errors = true;
	}
	if ( (document.register.password.value != "") && (document.register.password.value != document.register.password2.value) ) {
		msg+=("-Passwords to not match\n");
		errors = true;
	}
	if (errors) {
		window.alert(msg);
		return false;
	}
		
	return true;
}

function help(file) {  
	if (file==null)  {
			window.open("help.php","","width=500,height=500,scrollbars");    
			void(0);  
	}else{
			window.open("help.php#" + file ,"","width=500,height=500,scrollbars");    
			void(0);    
	}
}      
function info(file) {  
	if (file==null)  {
			window.open("info.php","","width=500,height=500,scrollbars");    
			void(0);  
	}else{
			window.open("info.php#" + file ,"","width=500,height=500,scrollbars");    
			void(0);    
	}
}
// janr , voor tonen accessoires, eentje tonen
			function hideDuplicateOptions(selelm) {
				if (typeof selelm=='string') selelm=document.getElementById(selelm);
				if (selelm) {
					var stack = '';
					for (var oc=0;oc<selelm.options.length;oc++) {
						var option = selelm.options[oc];
						option.style.display='none';
						if (stack.indexOf('['+option.text+']')==-1) {
							option.style.display='block';
							stack += '['+option.text+']';
						}
					}					
				}
			}

// janr add delay
function reserve(type, machid, start_date, resid, scheduleid, is_blackout, read_only, pending, starttime, endtime, delay) {  
		if (is_blackout == null) { is_blackout = 0; }
		// r new
		// m modify
		// c cluster
		// d delete
		//if (is_blackout != 1) {
		//	w = (type == 'r' || type == 'm') ? 600 : 520;
		//	h = (type == 'm') ? 610 : 570;
		//}
		//else {
		//	w = (type == 'r') ? 600 : 425;
		//	h = (type == 'm') ? 460 : 420;
		//}
		// letop janr, override
		h = 710;
		w = 820;
		if (machid == null) { machid = ''; }
		if (start_date == null) { start_date = ''; }
		if (resid == null) { resid = ''; }
		if (scheduleid == null) { scheduleid = ''; }

		if (read_only == null) { read_only = ''; }
		if (pending == null) { pending = ''; }
		if (starttime == null) { starttime = ''; }
		if (endtime == null) { endtime = ''; }

if (type!='copy'){		   
		nurl = "reserve.php?type=" + type + "&machid=" + machid + "&start_date=" + start_date + "&resid=" + resid + '&scheduleid=' + scheduleid + "&is_blackout=" + is_blackout + "&read_only=" + read_only + "&pending=" + pending + "&starttime=" + starttime + "&endtime=" + endtime;  
}
if (type=='copy'){nurl = "copycluster.php?type=" + type + "&machid=" + machid + "&start_date=" + start_date + "&resid=" + resid + '&scheduleid=' + scheduleid + "&is_blackout=" + is_blackout + "&read_only=" + read_only + "&pending=" + pending + "&starttime=" + starttime + "&endtime=" + endtime;
}		
		// pike
		// alert("current window name: "+window.name);
		// als delay dan komt ie uit iframe, en doel is parent, doel is "reserve" is ook goed.
		if (delay == "2500") {
				//alert ("delay: "+delay);
				setTimeout (parent.document.location.href = nurl,'2500')
		} else {
			if (window.name == "reserve") {
				document.location.href=nurl;
			} else {
				var resWindow = window.open(nurl,"reserve","width=" + w + ",height=" + h + ",scrollbars,resizable=no,status=no");     
				resWindow.focus();
			}
		}
		void(0);   
}

function refresh_opener(res_id)
	{
	//alert('ff wachten hoor');
		if (parent.window.opener!=parent) {
			if (true) {
	//			alert('ff schermpie verversen');
				parent.window.opener.document.location.href=parent.window.opener.document.location.href;
			}
		}
	}


function printpage()
		  {
		  window.print()
		  }

function prrrint(type, machid, start_date, resid, scheduleid, is_blackout, read_only, pending, starttime, endtime) {  
		if (is_blackout == null) { is_blackout = 0; }
		// p print
		// letop janr, override
		h = 610;
		w = 820;
		if (machid == null) { machid = ''; }
		if (start_date == null) { start_date = ''; }
		if (resid == null) { resid = ''; }
		if (scheduleid == null) { scheduleid = ''; }

		if (read_only == null) { read_only = ''; }
		if (pending == null) { pending = ''; }
		if (starttime == null) { starttime = ''; }
		if (endtime == null) { endtime = ''; }

		   
		nurl = "print.php?type=" + type + "&machid=" + machid + "&start_date=" + start_date + "&resid=" + resid + '&scheduleid=' + scheduleid + "&is_blackout=" + is_blackout + "&read_only=" + read_only + "&pending=" + pending + "&starttime=" + starttime + "&endtime=" + endtime;   // janr &mod=rdm toegevoegd
		// pike
		//alert("current window name: "+window.name);
		if (window.name == "print") {
			document.location.href=nurl;
		} else {
			var resWindow = window.open(nurl,"print","width=" + w + ",height=" + h + ",scrollbars,resizable=no,status=no");     
			resWindow.focus();
		}
		void(0);   
}


function checkDate() {
	var formStr = document.getElementById("jumpWeek");
	
	var month = document.getElementById("jumpMonth").value;
	var day = document.getElementById("jumpDay").value;
	var year = document.getElementById("jumpYear").value;
	
	var dayNum = new Array();
	if ( year%4 == 0 ) {
		dayNum = [31,29,31,30,31,30,31,31,30,31,30,31];
	} 
	else {
		dayNum = [31,28,31,30,31,30,31,31,30,31,30,31];
	}
	
	if ( (month > 12) || (day > dayNum[month-1]) ) {
		alert("Please enter valid date value");
		return false;
	}
	
	for (var i=0; i < formStr.childNodes.length-1; i++) {
		if (formStr.childNodes[i].type == "text" || formStr.childNodes[i].type == "textbox" ) {			
			if ( (formStr.childNodes[i].value <= 0) || (formStr.childNodes[i].value.match(/\D+/) != null) ) {
					alert("Please enter valid date value");
					formStr.childNodes[i].focus();
					return false;
			}
		}
	}
	
	changeScheduler(month, day, year, 0, "");
}

function verifyTimes(f) {
	if (f.del && f.del.checked) {
		return confirm("Delete this reservation?");
	}
	if (parseFloat(f.starttime.value) < parseFloat(f.endtime.value)) {
		return true;
	}
	else {
		window.alert("End time must be later than start time\nCurrent start time: " + f.starttime.value + " Current end time: " + f.endtime.value);
		return false;
	}
}
function alertWarning() {
	return confirm('alert jan!\nContinue?');
	// return false;
}
function checkAdminForm() {
	var f = document.forms[1]; // nummer is nr van de form
	for (var i=0; i< f.elements.length; i++) {
		if ( (f.elements[i].type == "checkbox") && (f.elements[i].checked == true) )
			// return confirm('This will delete all reservations and permission information for the checked items!\nContinue?');
			return confirm('This will set the checked items to status Deleted!\nContinue?');
	}
	alert("No boxes have been checked!");	
	return false;
}

function checkBoxes() {
	var f = document.train;
	for (var i=0; i< f.elements.length; i++) {
		if (f.elements[i].type == "checkbox")
			f.elements[i].checked = true;
	}
	void(0);
}

function viewUser(user) {
	window.open("userInfo.php?user="+user,"UserInfo","width=400,height=400,scrollbars,resizable=no,status=no");     
		void(0);    
}

function checkAddResource(f) {
	var msg = "";
	minres = (parseInt(f.minH.value) * 60) + parseInt(f.minM.value);
	maxRes = (parseInt(f.maxH.value) * 60) + parseInt(f.maxM.value);
	
	if (f.name.value=="")
		msg+="-Resource name is required.\n";
	if (parseInt(minres) > parseInt(maxRes))
		msg+="-Minimum reservation time must be less than or equal to maximum";
	if (msg!="") {
		alert("You have the following errors:\n\n"+msg);
		return false;
	}
	
	return true;
}

function checkAddSchedule() {
	var f = document.addSchedule;
	var msg = "";
	
	if (f.scheduletitle.value=="")
		msg+="-Schedule title is required.\n";
	if (parseInt(f.daystart.value) > parseInt(f.dayend.value))
		msg+="-Invalid start/end times.\n";
	if (f.viewdays.value == "" || parseInt(f.viewdays.value) <= 0)
		msg+="Invalid view days.\n";
	if (f.adminemail.value == "")
		msg+="Admin email is required.\n";

	if (msg!="") {
		alert("You have the following errors:\n\n"+msg);
		return false;
	}
	
	return true;
}

function checkAllBoxes(box) {
    var f = document.forms[0];
	
	for (var i = 0; i < f.elements.length; i++) {
		if (f.elements[i].type == "checkbox" && f.elements[i].name != "notify_user")
			f.elements[i].checked = box.checked;
	}

	void(0);
}

function check_reservation_form(f) {
	
	var recur_ok = false;
	var days_ok = false;
	var is_repeat = false;
	var msg = "";
	
	if ((typeof f.interval != 'undefined') && f.interval.value != "none") {
		is_repeat = true;
		if (f.interval.value == "week" || f.interval.value == "month_day") {
			for (var i=0; i < f.elements["repeat_day[]"].length; i++) {
				if (f.elements["repeat_day[]"][i].checked == true)
					days_ok = true;
			}
		}
		else {
			days_ok = true;
		}
		
		if (f.repeat_until.value == "") {
			msg += "- Please choose an ending date\n";
			recur_ok = false;
		}
	}
	else {
		recur_ok = true;
		days_ok = true;
	}
	
	if (days_ok == false) {
		recur_ok = false;
		msg += "- Please select days to repeat on";
	}
	
	if (msg != "")
		alert(msg);
		
	return (msg == "");
}

// janr check_warnings
function check_warnings(form) {
	//confirm(form.memberid.value);
	//confirm(form.adminid.value);
	//confirm(form.memberid.value);
	//confirm(form.leenpermissie.value);
	//confirm(form.uitleennivo.value);
	var msg = "";
		if (form.memberid && form.adminid && form.memberid.value == form.adminid.value) {
			 msg+="As admin you make this reservation for yourself.\nAre you sure ?";
			}
			
		if (msg!="") {
			return confirm("Warning\n\n" + msg);
		}
	return (msg == "");
}

function check_for_delete(f) {
	if (f.del && f.del.checked == true)
		return confirm('Delete this reservation?');
}

function toggle_fields(box) {
	document.forms[0].elements["table," + box.value + "[]"].disabled = (box.checked == true) ? false : "disabled";
}

function search_user_lname(letter) {
	var frm = isIE() ? document.name_search : document.forms['name_search'];
	frm.firstName.value = "";
	frm.lastName.value=letter;
	frm.submit();
}
function search_resource_name(letter) {
	var frm = isIE() ? document.resource_search : document.forms['resource_search'];

	frm.Name.value=letter;
	alert (frm.Name.value);
	frm.submit();
}

function isIE() {
	return document.all;
}

function changeDate(month, year) {
	var frm = isIE() ? document.changeMonth : document.forms['changeMonth'];
	frm.month.value = month;
	frm.year.value = year;
	frm.submit();
}

// Function to change the Scheduler on selected date click
function changeScheduler(m, d, y, isPopup, scheduleid) {
	//consoleclick added for persistence in search sept 17 janr
	newDate = m + '-' + d + '-' + y;
	keys = new Array();
	vals = new Array();
	// Get everything up to the "?" (if it even exists)
	var queryString = (isPopup) ? window.opener.document.location.search.substring(0): document.location.search.substring(0);

	queryString = queryString.replace("?", "");

	var pairs = queryString.split('&');
	var url = (isPopup) ? window.opener.document.URL.split('?')[0] : document.URL.split('?')[0];
	var schedid = ""
	
	if (scheduleid == "") {
		for (var i=0;i<pairs.length;i++)
		{
			var pos = pairs[i].indexOf('=');
			if (pos >= 0)
			{
				var argname = pairs[i].substring(0,pos);
				var value = pairs[i].substring(pos+1);
				keys[keys.length] = argname;
				vals[vals.length] = value;		
			}
		}
		
		for (i = 0; i < keys.length; i++) {
			if (keys[i] == "scheduleid") {
				schedid = vals[i];
			}
		}
	}
	else {
		schedid	= scheduleid;
	}
	// janr  consoleclick added
	if (isPopup)
		window.opener.location = url + "?date=" + newDate + "&scheduleid=" + schedid + "&consoleclick=1";
	else
		document.location.href = url + "?date=" + newDate + "&scheduleid=" + schedid + "&consoleclick=1";
}

// BUGFIX by Eric Maclot
function isIE7() {
        return (document.all && (typeof document.body.style.maxHeight != "undefined"));
}
 
// Shorthand functions for schedule display
function ssum(e, text)
{
	showsummary('summary', e, text);
	// alert('summary', e, text);
}
function hsum()
{
	hideSummary('summary');
}

function msum(e)
{
	moveSummary('summary', e);
}

function showsummary(object, e, text) {
 
        myLayer = document.getElementById(object);
        myLayer.innerHTML = text;
 
        w = parseInt(myLayer.style.width) ;
        h = parseInt(myLayer.style.height);
 
        if (e != '') {
            if (isIE()) {
                  x = e.clientX;
                  y = e.clientY;
                  browserX = document.body.offsetWidth - 25;
                  if (isIE7()) {
                     // IE 7
                    x += document.documentElement.scrollLeft - document.body.clientLeft ;
                    y += document.documentElement.scrollTop - document.body.clientTop;
                 } else {
                    // IE6, and previous version
                    x += document.body.scrollLeft ;                        // Adjust for scrolling on IE
                    y += document.body.scrollTop ;
                }
 
            }
            if (!isIE()) {
            x = e.pageX;
            y = e.pageY;
            browserX = window.innerWidth - 35;
            }
    }
 
        x1 = x + 20;                // Move out of mouse pointer
        y1 = y + 20;
 
        // Keep box from going off screen
        if (x1 + w > browserX){
                x1 = browserX - w;
        }
    myLayer.style.left = parseInt(x1)+ "px";
    myLayer.style.top = parseInt(y1) + "px";
    myLayer.style.visibility = "visible";
}

function getAbsolutePosition(element) {
    var r = { x: element.offsetLeft, y: element.offsetTop };
    if (element.offsetParent) {
      var tmp = getAbsolutePosition(element.offsetParent);
      r.x += tmp.x;
      r.y += tmp.y;
    }
    return r;
  };

function moveSummary(object, e) {
 
        myLayer = document.getElementById(object);
        w = parseInt(myLayer.style.width);
        h = parseInt(myLayer.style.height);
 
    if (e != '') {
        if (isIE()) {
            x = e.clientX;
            y = e.clientY;
            browserX = document.body.offsetWidth -25;
             if (isIE7()) {
   // IE 7
                    x += document.documentElement.scrollLeft - document.body.clientLeft ;
                    y += document.documentElement.scrollTop - document.body.clientTop;
   } else {
   // IE6, and previous version
                    x += document.body.scrollLeft ;                        // Adjust for scrolling on IE
                    y += document.body.scrollTop ;
   }
        }
        if (!isIE()) {
            x = e.pageX;
            y = e.pageY;
                        browserX = window.innerWidth - 30;
        }
    }
 
        x1 = x + 20;        // Move out of mouse pointer
        y1 = y + 20;
 
        // Keep box from going off screen
        if (x1 + w > browserX)
                x1 = browserX - w;
 
    myLayer.style.left = parseInt(x1) + "px";
    myLayer.style.top = parseInt(y1) + "px";
}

function hideSummary(object) {
	myLayer = document.getElementById(object);
	myLayer.style.visibility = 'hidden';
}

function showHideDays(opt) {
	e = document.getElementById("days");
	
	if (opt.options[2].selected == true || opt.options[4].selected == true) {
		e.style.visibility = "visible";
		e.style.display = isIE() ? "inline" : "table";
	}
	else {
		e.style.visibility = "hidden";
		e.style.display = "none";
	}
	
	e = document.getElementById("week_num")
	if (opt.options[4].selected == true) {
		e.style.visibility = "visible";
		e.style.display = isIE() ? "inline" : "table";
	}
	else {
		e.style.visibility = "hidden";
		e.style.display = "none";
	}
}

function chooseDate(input_box, m, y) {
	var file = "recurCalendar.php?m=" + m + "&y="+ y;
	if (isIE()) {
		yVal = "top=" + 200;
		xVal = "left=" + 500;
	}
	if (!isIE()) {
		yVal = "screenY=" + 200;
		xVal = "screenX=" + 500
	}
	window.open(file, "calendar",yVal + "," + xVal + ",height=270,width=220,resizable=no,status=no,menubar=no");
	void(0);
}

function selectRecurDate(m, d, y, isPopup) {
	f = window.opener.document.forms[0];
	f._repeat_until.value = m + "/" + d + "/" + y;
	f.repeat_until.value = f._repeat_until.value;
	window.close();
}

function setSchedule(sid) {
	f = document.getElementById("setDefaultSchedule");
	f.scheduleid.value = sid;
	f.submit();
}

function changeSchedule(sel) {
	var url = document.URL.split('?')[0];
	document.location.href = url + "?scheduleid=" + sel.options[sel.selectedIndex].value;
}

function showHideCpanelTable(element) {
	var expires = new Date();
	var time = expires.getTime() + 2592000000;
	expires.setTime(time);
	var showHide = "";
	if (document.getElementById(element).style.display == "none") {
		document.getElementById(element).style.display='block';
		showHide = "show";
	} else {
		document.getElementById(element).style.display='none';
		showHide = "hide";
	}
	
	document.cookie = element + "=" + showHide + ";expires=" + expires.toGMTString();
}
function changeImage(element) {
// janr get other image
	//	alert (document.getElementById(element).getAttribute('src')); 
	if (document.getElementById(element).getAttribute('src') == 'img/plus.gif') {
		document.getElementById(element).setAttribute('src' , 'img/min.gif');
	} else {
		document.getElementById(element).setAttribute('src' , 'img/plus.gif');
	}
}
//function changeImageToMin(this) {
/* janr get other image
	$('img#plusmin').on({
		'click': function() {
			 var src = ($(this).attr('src') === 'img/plus.gif')
				? 'img/min.gif'
				: 'img/plus.gif';
			 $(this).attr('src', src);
		}
	});
}	*/
function changeLanguage(opt) {
	var expires = new Date();
	var time = expires.getTime() + 2592000000;
	expires.setTime(time);
	document.cookie = "lang=" + opt.options[opt.selectedIndex].value + ";expires=" + expires.toGMTString() + ";path=/";
	document.location.href = document.URL;
}

function clickTab(tabid, panel_to_show) {
// alert (panel_to_show);
	document.getElementById(tabid.getAttribute("id")).className = "tab-selected";
	rows = document.getElementById("tab-container").getElementsByTagName("td");
	for (i = 0; i < rows.length; i++) {
		if (rows[i].className == "tab-selected" && rows[i] != tabid) {
			rows[i].className = "tab-not-selected";
		}
	}

	div_to_display = document.getElementById(panel_to_show);
	div_to_display.style.display = isIE() ? "block" : "table";
	divs = document.getElementById("main-tab-panel").getElementsByTagName("div");

	for (i = 0; i < divs.length; i++) {
		// only hide panels with prefix "pnl"
		if (divs[i] != div_to_display && divs[i].getAttribute("id").substring(0,3) == "pnl") {
			divs[i].style.display = "none";
		}
	}
}

function checkCalendarDates() {
	var table = document.getElementById("repeat_table");
	if (table == null) return;
	
	// If the start/end date are not equal, hide the whole repeat section
	if (document.getElementById("hdn_start_date").value != document.getElementById("hdn_end_date").value) {
		table.style.display = "none";
		table.style.visibility = "hidden";	
	}
	else {
		// JANR repeat_table ALTIJD UIT
		//table.style.display = isIE() ? "inline" : "table";
		//table.style.visibility = "visible";
	}
}

function showHideMinMax(chk) {
	document.getElementById("minH").disabled = document.getElementById("minM").disabled = document.getElementById("maxH").disabled = document.getElementById("maxM").disabled= chk.checked
}

function moveSelectItems(from, to) {
	from_select = document.getElementById(from);
	to_select = document.getElementById(to);
	
	for (i = 0; i < from_select.options.length; i++) {
		if (from_select.options[i].selected) {
			if (isIE()) {
				var option = new Option(from_select.options[i].text, from_select.options[i].value);
				to_select.options.add(option);
				from_select.options.remove(i); 
				//alert('hoi');
				to_select.options[0].selected = true;
			}
			else {
			// alert ('boe');
				to_select.options.add(from_select.options[i]);
			}
			i--;	
		}
	}
}

function selectAllOptions(button) {
	var form = button.form;
	var i;
	
	for (i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "select-multiple" && form.elements[i].multiple == true) {
			selectbox = form.elements[i];
			for (j = 0; j < selectbox.options.length; j++) {
				selectbox.options[j].selected = true;
			}
		}
	}
}

function changeMyCal(m, d, y, view) {
	var url = document.URL.split('?')[0];
	document.location.href = url + "?date=" + m + "-" + d + "-" + y + "&view=" + view;
}

function changeResCalendar(m, d, y, view, id) {
	var url = document.URL.split('?')[0];
	var type_id = id.split("|");
	var type = type_id[0];
	var p = (type == "s") ? "scheduleid" : "machid";
	var id = type_id[1];
	document.location.href = url + "?date=" + m + "-" + d + "-" + y + "&view=" + view + "&" + p + "=" + id;
}
// selectUserForReservation('1021297','Rosalie','Gorter','272833rg@student.eur.nl','06-48605290','DZBJ1/A','1','1');
function selectUserForReservation(memberid, fname, lname, email, phone, klas, leenpermissie, demerit_punt) {
	var doc = window.opener.document
	//alert (doc);
	//alert (doc.forms);
	doc.forms[0].memberid.value = memberid;
	doc.forms[0].leenpermissie1.value = leenpermissie;
	//alert (doc.forms[0].memberid.value);
	doc.getElementById('name').innerHTML = fname + " " + lname;
	doc.getElementById('email').innerHTML = email;
	doc.getElementById('phone').innerHTML = phone;
	doc.getElementById('klas').innerHTML = klas;
	doc.getElementById('leenpermissie').innerHTML = leenpermissie;
	doc.getElementById('demerit_punt').innerHTML = demerit_punt;
	window.close();
}
// janr

function selectResourceForReservation(machid, name, uitleennivo) {
	// called from popup window
	var doc = window.opener.document // bestaat deze
	doc.forms[0].machid1.value = machid; // bestaat deze en is deze leeg (child question. zo nee zandloper)
	doc.forms[0].uitleennivo1.value = uitleennivo; // jaro, uitleennivo1 is defined in hidden form in reserve.php
	// alert (doc.forms[0].uitleennivo1.value);
	doc.getElementById('machname').innerHTML = name;
	doc.getElementById('machname').style.textDecoration = "none";
	//doc.forms[0].btnSubmit.disabled = false;  // disabled="disabled", of disabled=false
	//doc.getElementById('selectmach').innerHTML = "change resource";		// schrijf change resource in add resource
	doc.getElementById('selectmach').innerHTML = " ";		// schrijf change resource in add resource
	doc.getElementById('selectmach').style.display="none";		// weg met change resource in add resource
	
	// NOW HANDLED BY FORM SUBMIT RESULT 
	//if (window.opener.checkReservation) {
	//	window.opener.checkReservation(doc.getElementById('check-button').getAttribute('link'), 'reserve', 'Bezig met verifiëren');
		// exe de 'check reservation button'
	//}
	
	// click op submit
	doc.forms[0].elements['btnSubmit'].click();
	var docthis = window.document;
// begin test
	// now check if parent is ready. means: it has updated the form and refreshed itself so: doc.forms[0].machid1.value == empty
/* DIT IS BIJNA GOED NOVENBER 2017
	var i=1;
	if (!doc.forms[0] === undefined) {
		if (!doc.forms[0].machid1 === undefined) {
				while (!doc.forms[0].machid1.value === null) {
					docthis.getElementById('my'+machid).innerHTML = "3..."+i;		
					i++;
					setTimeout(function(){ docthis.getElementById('my'+machid).innerHTML = "..."; }, 10);
				}
		}
		setTimeout(function(){ docthis.getElementById('my'+machid).innerHTML = ".."; }, 10);
		docthis.getElementById('my'+machid).innerHTML = "2..."+i;		
	} 	
	setTimeout(function(){ docthis.getElementById('my'+machid).innerHTML = "."; }, 10);
	docthis.getElementById('my'+machid).innerHTML = "1..."+i;		
	alert ("condition oke");
*/
// end test
	// schrijf status text naar id
	
	//alert ('my'+machid);
	docthis.getElementById('my'+machid).innerHTML = "Busy... ";		// even bezig
	setTimeout(function(){ docthis.getElementById('my'+machid).innerHTML = "&#9679;"; }, 500);

}




function deselectResourceForReservation() {
	// called from ajax.js :: checkReservation
	var doc = window.document
	//doc.forms[0].machid1.value = '';  // dit forceert leeg te vroeg
	doc.getElementById('machname').style.color = "#ff0000";
	//doc.forms[0].btnSubmit.disabled = false;  // disabled="disabled", of disabled=false
	//doc.getElementById('selectmach').innerHTML = name;		//   schrijf change resource in add resource
}


function adminRowClick(checkbox, row_id, count) {
	var row = document.getElementById(row_id);
	row.className = (checkbox.checked) ? "adminRowSelected" : "cellColor" + (count%2);
}

function showHide(element) {
	if (document.getElementById(element).style.display == "none") {
		document.getElementById(element).style.display='block';
	}
	else {
		document.getElementById(element).style.display='none';
	}
}

function submitJoinForm(isLoggedIn) {
	var loggedIn = (isLoggedIn != 0);
	var f = document.getElementById("join_form");
	f.h_join_fname.value = (!loggedIn) ? document.getElementById("join_fname").value : "";
	f.h_join_lname.value = (!loggedIn) ? document.getElementById("join_lname").value : "";
	f.h_join_email.value = (!loggedIn) ? document.getElementById("join_email").value : "";
	f.h_join_userid.value= (loggedIn) ? document.getElementById("join_userid").value : "";
	f.h_join_resid.value = document.getElementById("resid").value;
	f.submit();
}

function validateReservationWindow() {
	document.getElementById("check").style.display = "inline";
	var f = document.getElementById("reserve");
	f.target = "check";
	f.submit();
}

function createXMLDoc() {
	var xmlDoc = null;
	if (document.implementation && document.implementation.createDocument)
	{
		xmlDoc = document.implementation.createDocument("", "", null);
	}
	else if (window.ActiveXObject)
	{
		xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
 	}
	
	return xmlDoc;
}

function getOption(opt) {
	if (isIE()) {
		return new Option(opt.text, opt.value);
	}
	else {
		return opt;
	}
}

function popGroupEdit(memberid) {
	window.open("group_edit.php?edit=1&memberid=" + memberid, "groups","height=250,width=470,resizable=no,status=no,menubar=no");
	void(0);
}

function popGroupView(memberid) {
	window.open("group_edit.php?edit=0&memberid=" + memberid, "groups","height=250,width=470,resizable=no,status=no,menubar=no");
	void(0);
}

function showHere(parent, id) {
	var element = document.getElementById(id);
	var x;
	var y;
	
	var offset = getOffset(parent);
	x = offset[0];
	y = offset[1];
	element.style.left = parseInt(x) + "px";
    element.style.top = parseInt(y - 34) + "px";
	element.style.display = "inline";
}

function getOffset(obj) {
	var curLeft = 0;
	var curTop = 0;
	
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curLeft += obj.offsetLeft
			curTop += obj.offsetTop;
			obj = obj.offsetParent;
		}
	}
	else if (obj.x) {
		curLeft += obj.x;
		curTop += obj.y;
	}
	
	return new Array(curLeft, curTop);
}

function switchStyle(obj, style) {
	obj.className = style;
}

function openExport(type, id, start, end) {
	var qs = 'type=' + type;
	
	if (id.length > 0) {
		qs += "&resid=" + id;
	}
	else {
		if (start.length > 0) {
			qs += "&start_date=" + start; 	
		}
		if (end.length >0) {
			qs += "&end_date=" + end;	
		}
	}
	
	window.open("exports/ical.php?" + qs);
}

function exportSearch() {
	var _type = document.getElementById("type");
	var type = _type[_type.selectedIndex].value;
	
	var start = document.getElementById("nostart").checked ? '' : document.getElementById("hdn_start_date").value;
	var end = document.getElementById("noend").checked ? '' : document.getElementById("hdn_end_date").value;
	
	openExport(type, '', start, end);
}

function blurDiv(checkbox, divid) {
	document.getElementById(divid).className = checkbox.checked ? "blur_textbox" : "textbox";
}

function updateEnd(startDrop)
{
	var endDrop = document.getElementById("endtime");
	var index = startDrop.selectedIndex;
	endDrop.selectedIndex = (endDrop.options.length-1 > index) ? index + 1 : index;	
}
function allow_this_user(loanperm) 
{		
    // if (confirm("User has loanpermission "+loanperm+", this is too low. Still allow this article?")) {
    if (confirm("NOTE: User has loanpermission "+loanperm+". This is too low. Still allow this article?")) {
		//parent.document.forms[0].override.value = "1";
		//var elem = document.getElementById("override");
		//elem.value = "1";
		//document.overridex.value = "1";
		//alert ("set true");
		return true;
		
    }else{
		//window.document.forms[0].override.value = "4";
		//var elem = document.getElementById("override");
		//elem.value = "4";
		//document.overridex.value = "0";
		//alert ("set false");
		return false;
	}
	return
}
function alert_this_user(loanperm) 
{		
	alert ("NOTE: User has loanpermission "+loanperm+". This is too low for this article, but reservation is made.");
	
}

//	window.opener.document.forms[0].uitleennivo1.value = uitleennivo; // jaro, uitleennivo1 is defined in hidden form in reserve.php
