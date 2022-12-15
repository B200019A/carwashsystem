//Job Opening Tabs
function openExplain(evt, jobPosition) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");

    if(document.getElementById(jobPosition).style.display === "block"){
        document.getElementById(jobPosition).style.display = "none";
    }
    else{
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
            document.getElementById(jobPosition).style.display = "block";
            evt.currentTarget.className += " active";
    }
}
// Get the element with id="defaultTabOpen" and click on it
document.getElementById("defaultTabOpen").click();

//contact-us validate user input.
function validate() {
    var name = document.getElementById("name").value;  
    var email = document.getElementById("email").value;
    var pass= document.getElementById("password").value;
    var repass = document.getElementById("password_confirmation").value;

    var email_val = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(name==''||pass==''||email==''||repass==''){  
        alert("Enter each details correctly");
        return false;  
    }    
    else if (!email_val.test(email)){  
        alert('Invalid email format please enter valid email'); 
        return false;  
    }  
    else if(pass!=repass){    
        alert('Password and Repeat Password not the same!');
        return false;
    }
    else {
        alert('Register Pending');
        return true;
    }   
}

//contact-us validate user input.
function validateReset() {
    var name = document.getElementById("name").value;  
    var pass= document.getElementById("password").value;
    var repass = document.getElementById("password_confirmation").value;
    var i=0;

    for (i = 0; i<=pass.length; i++){      
    }
    if(i>=8){
        alert("The password must be at least 8 characters!");    
    }
    if(name==''||pass==''||repass==''){  
        alert("Enter each details correctly");
        return false;  
    }    
 
    else if(pass!=repass){    
        alert('Password and Repeat Password not the same!');
        return false;
    }
    else if(countLength(pass)<8){    
        alert('The password must be at least 8 characters!');
        return false;
    }
    else{
        return true;
    }   
}


//nav bar responsive
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsivenav";
    } else {
        x.className = "topnav";
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }