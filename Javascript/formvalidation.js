var x=document.forms["indexform"]["name"].value;
function validateForm() {
    if (x==null || x=="") {
        alert("First name must be filled out");
        return false;
    }
}

