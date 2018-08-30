function preview_image(event) 
{
    var extall="jpg,jpeg,png";
    file = document.getElementById('profile_image_upload').value;
    ext = file.split('.').pop().toLowerCase();
    if(parseInt(extall.indexOf(ext)) < 0)
    {
        document.getElementById("Error_Message_Image").style.display = "block";
        return false
    }
    document.getElementById("Error_Message_Image").style.display = "none";
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('profile_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function checkSubmit()
{
    // Check None value in input !
    if(document.registerForm.studentIdInput.value == "")
	{
		document.registerForm.studentIdInput.focus();
		return false;
	}	
	if(document.registerForm.facultyInput.value == 0)
	{
		document.registerForm.facultyInput.focus();		
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
    if(document.registerForm.dobInput.value == "")
	{
		document.registerForm.dobInput.focus();		
		return false;
    }
    if(document.registerForm.phoneInput.value == "")
	{
		document.registerForm.phoneInput.focus();		
		return false;
    }
    if(document.registerForm.addressInput.value == "")
	{
		document.registerForm.addressInput.focus();		
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