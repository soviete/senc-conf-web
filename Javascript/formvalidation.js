function validateForm() {
    //REGEXs
    cha=/^[a-zA-ZáàäéèëíïòóöùúüÀÁÄÈÉËÍÒÓÖÙÚÜÑñ]+$/ //REGEX for just text characters and spaces
    anum=/^[0-9a-zA-Z ]+$/ //REGEX to accept alphanumeric and spaces
    num=/^[0-9]+$/ //REGEX for only numbers
    mailreg=/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/ //REGEX for emails
    //Field Name
    x=document.forms["indexform"]["name"].value
    if (x==null || x=="") {
        alert("First name must be filled out")
        return false
    }
    if (x.search(cha)==-1) {
        alert("Please enter only characters in field Name")
        return false
    }
    //Field Surname
    x=document.forms["indexform"]["surname"].value
    if (x==null || x=="") {
        alert("Surname must be filled out")
        return false
    }
    if (x.search(cha)==-1) {
        alert("Please enter only characters in field Surname")
        return false
    }
    //Field DNI/Passport
    x=document.forms["indexform"]["dni"].value
    if (x==null || x=="") {
        alert("DNI/Passport must be filled out")
        return false
    }
    if (x.search(num)==-1) {
        alert("DNI/Passport must contain a numeric value")
        return false
    }
    //Field email
    x=document.forms["indexform"]["email"].value
    if (x==null || x=="") {
        alert("email must be filled out")
        return false
    }
    if (x.search(mailreg)==-1) {
        alert("Not a valid e-mail address")
        return false
    }
    //Field emailConfirm
    x1=document.forms["indexform"]["emailConfirm"].value
    if (x1==null || x1=="") {
        alert("confirmation email must be filled out")
        return false
    }
    if (x1.search(mailreg)==-1) {
        alert("Not a valid confirmation email address")
        return false
    }
    if (x != x1) {
        alert("Email and confirmation email must be the same")
        return false
    }

    //Field Registration option
    x=document.forms["indexform"]["type"].value
    if (x==null || x=="") {
        alert("Registration option must be filled out")
        return false
    }
}