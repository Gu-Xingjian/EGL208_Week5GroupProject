setInterval(function(){
    let now = new Date();
    document.getElementById("realtimeclock").innerHTML=now.toDateString()+"<br>"+now.
    toTimeString();
    }, 500);
    