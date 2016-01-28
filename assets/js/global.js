/**
 * Created by phemmy on 18/12/15.
 */
var smsPageCount = 0;
var smsMaxCount = 160;

$(document).ready(function() {

    getElemClicked();
    toggleSmsMsgDisplay();
    whichWasClicked();

});

function toggleSmsMsgDisplay() {
    var $remaining = $('.revealTextCount'), $messages = $remaining.next();

    $('.getTextCount').keyup(function(){
        var chars = this.value.length,
                messages = Math.ceil(chars / smsMaxCount),
                remaining = messages * smsMaxCount - (chars % (messages * smsMaxCount) || messages * smsMaxCount);

        $remaining.text(remaining + ' characters left');
        $messages.text('SMS Page: '+ messages);
    });

    var $remaining2 = $('.revealTextCount2'), $messages2 = $remaining2.next();

    $('.getTextCount2').keyup(function(){
        var chars2 = this.value.length,
                messages2 = Math.ceil(chars2 / smsMaxCount),
                remaining2 = messages2 * smsMaxCount - (chars2 % (messages2 * smsMaxCount) || messages2 * smsMaxCount);

        $remaining2.text(remaining2 + ' characters left');
        $messages2.text('SMS Page: '+ messages2);
    });
}

function insertComma() {
    var txtObj = document.getElementById('_recipientPhoneNo');
    // Remove commas
    var txtVal = replaceAll(txtObj.value, ',', '');
    txtVal = replaceAll(txtVal, '\n', '');

    if (txtObj.value != "") {
        var newVal = "";

        // Append commas
        for (var i = 0; i < txtVal.length; i++) {
            newVal = newVal + txtVal.substring(i, i + 1);

            if ((i + 1) % 11 == 0 && i != 0) {
                newVal = newVal  +",";
            }
        }
        txtObj.value = newVal;
    }

}

function replaceAll(txt, replace, with_this) {
    return txt.replace(new RegExp(replace, 'g'), with_this);
}

function whichWasClicked() {
    $('._my-cude li').click(function() {
        $('#sendDeclaration .getTextCount').html('');
        var elemNeeded = $(this).attr('class');

        var msg = $('.'+ elemNeeded + ' .message').html();
        $('#sendDeclaration .getTextCount').html(msg.trim());
        $('.code_text_value').val(elemNeeded);
        //alert(msg.trim());
    });
}

function getElemClicked() {
    setTimeout(function(){
        $("#menu_toggle .fa.fa-bars").trigger('click');
    }, 10)
}
