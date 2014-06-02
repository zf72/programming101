//*******************************************************************************************************************************
//
//                              RETURN DATE VARIABLES
//
//
//*******************************************************************************************************************************


function returnDateVariables(dLocal, delimiter)
{

    if(Object.prototype.toString.call(dLocal) != '[object Date]') {
        console.log('Invalid Date: ' + dLocal);
        return null;
    }

    var dateStringLocal = new Object();
    var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var dayNamesLocal = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

    dateStringLocal = {
                            date: ('0' + dLocal.getDate()).slice(-2),
                            dayOfWeek: dLocal.getDay(),
                            dayName: dayNamesLocal[dLocal.getDay()],
                            month: ('0' + (dLocal.getMonth()+ 1)).slice(-2),
                            monthName: monthNames[dLocal.getMonth()],
                            year: dLocal.getFullYear() + '',
                            hour: ('0' + dLocal.getHours()).slice(-2),
                            min: ('0' + dLocal.getMinutes()).slice(-2),
                            sec: ('0' + dLocal.getSeconds()).slice(-2),
                            dateCode: '\"'+ dLocal.getTime() + '\"'
                      };


    dateStringLocal.clockHour = dateStringLocal.hour%12;
    if(dateStringLocal.clockHour == '00') dateStringLocal.clockHour = 12;

   //-------------------------------------------------------  BUILD DATE STRING  -------------------------------------------------------

    if(delimiter == null) delimiter = '-';

    dateStringLocal.fullString = dateStringLocal.month + delimiter + dateStringLocal.date + delimiter + dateStringLocal.year;
   //dateStringLocal.timeString = dateStringLocal.hour + '.' + dateStringLocal.min + '.' + dateStringLocal.sec;

    dateStringLocal.amPM = 'AM';
    if(dLocal.getHours()>12) dateStringLocal.amPM = 'PM';

    dateStringLocal.twentyFourHourTime = dateStringLocal.hour + ':' + dateStringLocal.min + ':' + dateStringLocal.sec;
    dateStringLocal.twelveHourTime = (dLocal.getHours()%12) + ':' + dateStringLocal.min + ':' + dateStringLocal.sec + ' ' + dateStringLocal.amPM;


    //console.log(dateStringLocal);


    return dateStringLocal;

}


//*******************************************************************************************************************************
//
//                              OUTPUT OBJECT TO TEXT
//
//
//*******************************************************************************************************************************

function objToText(obj, prefix) //object, prefix (optional)
{
    var itemList = [];
    var theValues = [];
    prefix = (prefix==null) ? '' : prefix + '.';
    for(property in obj) itemList.push({title: prefix + property, value: obj[property]});

    for(c=0;c<itemList.length;c++)
    {
            text = 'currObject: ' + itemList[c].title + ': ' + itemList[c].value + '\n\n';
            for(z=0;z<itemList.length;z++) text += itemList[z].title + ': ' + itemList[z].value + '\n';
            text += '\n\n\n--------------------\n';
            for(z=0;z<theValues.length;z++) text += theValues[z].title + ': ' + theValues[z].value + '\n';
            //if(!confirm(text)) break;

        var aTitle = itemList[c].title;
        var anItem = itemList[c].value;

        var hasSubProperties = false;
        if(anItem instanceof Object || anItem instanceof Array ) hasSubProperties = true;
        //if(anItem instanceof File || anItem instanceof Folder) hasSubProperties = false;

        if(hasSubProperties)
        {
            for(property in anItem) itemList.push({title: aTitle + '.' + property, value: anItem[property]});
        }
        else
        {
            theValues.push(itemList[c]);
        }
    }

    var returnInfo = {object:{},titles:'',values:'',text:''}
    for(c in theValues)
    {
        returnInfo.object[theValues[c].title] = theValues[c].value;
        returnInfo.titles += theValues[c].title + ',';
        returnInfo.values += theValues[c].value + ',';
        returnInfo.text += theValues[c].title + ': ' + theValues[c].value + '\n\n';
     }

    return returnInfo;
}



function showWarning(title, body){

    $.growl({ title: title, message: body });
    /*$('#modalWarning').modal({
        keyboard: true,
        backdrop: 'static'
    });

    $('#modalWarning .warningTitle').html(title);
    $('#modalWarning .modal-body').html(body);*/
}

function showWarningModal(title, body){

    $('#modalWarning').modal({
        keyboard: true,
        backdrop: 'static'
    });

    $('#modalWarning .warningTitle').html(title);
    $('#modalWarning .modal-body').html(body);
}

function showError(title, body){
	$('#modalError').modal({
		keyboard: true,
		backdrop: 'static'
	});

	$('#modalError .errorTitle').html(title);
	$('#modalError .modal-body-content').html(body);

	var emailBody = encodeURIComponent("What were you doing when this error occured?\n\n\n\n====================================\n" + body);
	var emailLink = "<a class=\"btn btn-primary\" href=\"mailto:studioncst@exchange.nordstrom.com?subject=SAM Web Error&body=" + emailBody + "\"><i class=\"fa fa-mail-forward\"></i> Send Error to CST</a>";

	$('#modalError .emailError').html(emailLink);
}

/* Logout Binding */

$('#buttonLogout').click(function(event) {
	$.cookie("user", '');
	$.cookie("userToken", '');
	location.reload();
});

/* CONTACT US - HELP Docs. AARON'S CODE FOR CHECKING CURRENT PAGE AND ROUTING TO CORRESPONDING HELP PAGE */

$('document').ready(function(event){
	$(window).bind('hashchange', function(){
		//console.log("hash change");
		$('#contactUsLink').attr('href', getContactUsHelpLink());
		//console.log("Link:" + getContactUsHelpLink());
	});
	$('#contactUsLink').attr('href', getContactUsHelpLink());
	//console.log("Link:" + getContactUsHelpLink());
});

// Returns whether or not this is an individual studio page
function studioCheck() {
		if (window.location.href.indexOf('?studio=') > -1) {
			return true;
		}
}

// Returns the type of vendor image status page user is on
function statusCheck() {
	if (window.location.href.indexOf("status") > -1) {
		return status;
	}
}

// Selects corresponding HELP page from current page user is on
function getContactUsHelpLink() {

	var helpLink = "";
	var pathArray = window.location.pathname.split( '/' );
	var currentPage = pathArray[pathArray.length-1];
	var ifStudio = studioCheck(); //check if individual studio
	var status = statusCheck(); //get the current vendor page status
	//var statusType = "";
	var hash = window.location.hash;
	//var contactUsEmail = '';
	//console.log(currentPage);
	//return currentPage;

	switch (currentPage) {
		case ("studioOverview.php"):
			if(ifStudio){
				helpLink = "help.php?section=Studio%20Dashboard&title=Individual%20Studio";
			}else{
				helpLink = "help.php?section=Studio%20Dashboard&title=Studio%20Overview";
			}
			break;
		case ("setdetail.php"):
			helpLink = "help.php?section=Studio%20Dashboard&title=Set%20Detail";
			break;
		case ("iptOverview.php"):
			if(ifStudio){
				helpLink = "help.php?section=IPT%20Dashboard&title=Individual%20IPT";
			}else{
				helpLink = "help.php?section=IPT%20Dashboard&title=IPT%20Overview";
			}
			break;
		case ("iptdetail.php"):
			helpLink = "help.php?section=IPT%20Dashboard&title=IPT%20Detail";
			break;
		case ("imageReview.php"):
			helpLink = "help.php?section=Image%20Review";
			break;
		case ("reporting.php"):
			helpLink = "help.php?section=Reporting";
			break;
		case ("vendorImages.php"):
			if (window.location.href.indexOf('status=assign')!==-1){
				helpLink = "help.php?section=Vendor&title=Assigning%20Images";
			}else if (window.location.href.indexOf('status=pendingipt')!==-1){
					helpLink = "help.php?section=Vendor&title=IPT%20image%20review";
			}else{
					helpLink = "help.php?section=Vendor&title=AD%20image%20review";
			}
			break;
		case ("dashboard.php"):
			switch (hash) {
				case "#tabDashboard":
					helpLink = "help.php?section=General";
					break;
				case "#tabVendor":
					helpLink = "help.php?section=Vendor";
					break;
				case "#tabShowroomImages":
					helpLink = "help.php";
					break;
				default:
					helpLink = "help.php?section=Vendor&title=PC%20vendor%20dashboard";
					break;
				}
			break;
		default:
			helpLink = "help.php";
			break;
		}
		//console.log(helpLink);
	return helpLink;
}