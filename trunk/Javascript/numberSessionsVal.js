function validateForm() 
    {
        var x = document.forms["indexform"]["name"].value;
//        
        if (x==null || x=="") 
            {
                alert("First name must be filled out");
                return false;
            }  
        
    }



    
function countSessions()
    {
        
        //alert("First name must be filled out");
        //return false;
        var checkboxes = document.getElementById("confList").confs;
        
        //alert (checkboxes.length);//del
        
        //document.write("culo");
        //document.write(checkboxes);
        //return false;
        var count = 0;
        
        for (var x=0; x < checkboxes.length; x++) 
            {
        
                if (checkboxes[x].checked) 
                    {                
                        count = count + 1;
                    }
            }
        
        //alert(cont);
        //return false;
        
        if (count<12)
            {
                alert("Has de triar 12 sessions!"); 
                return false;
            }
    }
    
//function validate(){
//        //alert("First name must be filled out");
//        //return false;
//	// keep a count of how many checked
//	var boxeschecked=0;
//	
//	// cycle thru all checkbox ids - increment boxeschecked var if true
//	for(var i=1; i<12; i++){
//		document.getElementById("c"+String(i)).checked == true ? boxeschecked++: null;
//	}
//        
//        
//        alert(boxeschecked);
//        return false;
//        
//	if(boxeschecked>3){
//		alert("passed");
//		return true;
//		
//	}else{
//		alert("failed");
//		return false;
//	}
//}

function validate()
    {
        var chks = document.getElementsByName('confs[]');
        var checkCount = 0;
        for (var i = 0; i < chks.length; i++)
            {
                if (chks[i].checked)
                    {
                        checkCount++;
                    }
            }

        if (checkCount < 2)
            {
                alert("Please select at least 12.");
                return false;
            }

        return true;
    }