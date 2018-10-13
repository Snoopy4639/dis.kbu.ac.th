function checkNewPassword() {
    var password1 = document.SetPassword.password1.value;
    var password2 = document.SetPassword.password2.value;
    var password3 = document.SetPassword.password3.value;
    var password4 = document.SetPassword.password4.value;

    if(password1 != "" && password2 != "") {
        // Check password !
        var str = "abcdefghijklmnopqrstuvwxyz0123456789";
        var passwordInput = password1;
        var checkStatus = true;
        for(i=0; i < passwordInput.length & checkStatus; i++) {
            checkStatus = (str.indexOf(passwordInput.charAt(i)) != -1)
        }
        if (!checkStatus) {
            document.getElementById('confirmSave').style.display='none';
            document.getElementById('passwordChaError').style.display='block';
            document.SetPassword.password1.value = "";
            document.SetPassword.password2.value = "";
            document.SetPassword.password3.value = "";
            document.SetPassword.password1.focus();
            return false;
        }

        if(password3 == password4) {
            if(password1 == password2) {
                if(password1 == password4) {
                    document.getElementById('confirmSave').style.display='none';
                    document.getElementById('passwordExist').style.display='block';
                    document.SetPassword.password1.value = "";
                    document.SetPassword.password2.value = "";
                    document.SetPassword.password3.value = "";
                    document.SetPassword.password1.focus();
                    return false;
                }
                return true;
            } else {
            document.getElementById('confirmSave').style.display='none';
            document.getElementById('passwordNotMatch').style.display='block';
            document.SetPassword.password2.value = "";
            document.SetPassword.password3.value = "";
            document.SetPassword.password2.focus();
            return false;
            }
        } else {
            document.getElementById('confirmSave').style.display='none';
            document.getElementById('oldPasswordNotMatch').style.display='block';
            document.SetPassword.password3.value = "";
            return false;
        }
    } else {
        document.getElementById('confirmSave').style.display='none';
        document.getElementById('passwordNull').style.display='block';
        return false;
    }
}