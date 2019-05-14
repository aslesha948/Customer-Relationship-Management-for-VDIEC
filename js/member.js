// JavaScript Document
function checkRePassword(document) {
    var pwd = document.getElementById("password");
    var pwd_msg = document.getElementById('pwd_msg');
    var repwd = document.getElementById("rePassword");
    if (pwd.value != repwd.value) {
        pwd_msg.innerHTML = "The two passwords are not the same.";
        repwd.value = "";
        pwd.focus();
        return false;
    }
    else {
        pwd_msg.innerHTML = "";
    }
    return true;
}

function checkphoneNumber(document) {
    var number = document.getElementById("number");
    var number_msg = document.getElementById("number_msg");
    var isNum = /^[0-9]{10}$/.test(number.value); // 10 digits
    if(!isNum) {
        number_msg.innerHTML = "10 digits are required.";
        number.focus();
        return false;
    }
    else {
        number_msg.innerHTML = "";
    }
    return true;
}
function reset_frm(document) {
    document.getElementById('pwd_msg').innerHTML = "";
    document.getElementById("num_msg").innerHTML = "";
}
function validateInfo(document) {
    if ( checkRePassword(document) && checkphoneNumber(document) )
    {
        return true;
    }
    return false;
}
