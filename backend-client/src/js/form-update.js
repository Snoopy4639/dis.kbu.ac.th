function checkSubmit()
{
    // Check username !
    var username_obj = registerForm.usernameInput;
    var str = "abcdefghijklmnopqrstuvwxyz0123456789";
    var usernameInput = username_obj.value;
    var checkStatus = true;

    for(i=0; i < usernameInput.length & checkStatus; i++) {
        checkStatus = (str.indexOf(usernameInput.charAt(i)) != -1)
    }
    if (!checkStatus) {
        document.registerForm.usernameInput.focus();
        document.getElementById("Error_Message_Username").style.display = "block";
        return false
    }
    document.getElementById("Error_Message_Username").style.display = "none";

    // Check None value in input !
    if(document.registerForm.usernameInput.value == "")
	{
		document.registerForm.usernameInput.focus();
		return false;
	}	
	if(document.registerForm.passwordInput.value == "")
	{
		document.registerForm.passwordInput.focus();		
		return false;
    }
    if(document.registerForm.nameInput.value == "")
	{
		document.registerForm.nameInput.focus();		
		return false;
    }
    if(document.registerForm.lastNameInput.value == "")
	{
		document.registerForm.lastNameInput.focus();		
		return false;
    }
    if(document.registerForm.emailInput.value == "")
	{
		document.registerForm.emailInput.focus();		
		return false;
    }
    if(document.registerForm.phoneInput.value == "")
	{
		document.registerForm.phoneInput.focus();		
		return false;
    }

    // Check Phone-Number !
    var phoneInput_obj = registerForm.phoneInput;
    var str2 = "0123456789";
    var phoneInput = phoneInput_obj.value;
    var checkStatus2 = true;

    for(i=0; i < phoneInput.length & checkStatus2; i++) {
        checkStatus2 = (str2.indexOf(phoneInput.charAt(i)) != -1)
    }
    if (!checkStatus2) {
        document.registerForm.phoneInput.focus();
        document.getElementById("Error_Message_Phone").style.display = "block";
        return false
    }
    document.getElementById("Error_Message_Phone").style.display = "none";

    document.registerForm.submit();
    
}