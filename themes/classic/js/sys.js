//--work functions

function ExecuteService(params, url, callbackSuccess, callbackError) {$.ajax({type: "POST",url: url,contentType: "application/json; charset=utf-8",dataType: "json",data: params,success: callbackSuccess,error: callbackError});}
function trim(string, character) {return string.replace(/^\|+/, "");}
function isValidEmailAddress(emailAddress) { var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i); return pattern.test(emailAddress); }
function show(url, name, width, height) { window.open(url, name, 'scrollbars=yes,resizable=yes,menubar=no,width=' + width + ',height=' + height + ',toolbar=no'); }
function goTo(url) { window.location = url; }
function TryParseInt(str, defaultValue) { var retValue = defaultValue; if (str != null) { if (str.length > 0) { if (!isNaN(str)) { retValue = parseInt(str); } } } return retValue; }
function closepopup(name) { $('#' + name).hide(); $('#' + name + ' input:text').val(''); }
function showpopup(name) { $('#' + name).show(); }
$(document).ready(function() { $('.dropdown a').click(function() { $(this).next('div.drop').fadeIn(100).parent('span').mouseleave(function() { $(this).children('div.drop').fadeOut(100) }); }); });
//--end work functions
$(document).ready(function() {
    $('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
    this.value = this.value.replace(',','');
    this.value = this.value.replace('.','');
  });
  
  jQuery('.dateOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
    this.value = this.value.replace(',','.');
  });
  
    jQuery('.phoneOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\+]/g,'');
    this.value = this.value.replace(',','');
  });
});
function configTable(tableName) {
    $('#' + tableName).dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": true
    });
}

function setLeftMenu() {
    if ($('#toLeftMenu').size() > 0) {
        $('#left').prepend($('#toLeftMenu').html());
        $('#toLeftMenu').remove();
    }
}
$(document).ready(function () { setLeftMenu(); });