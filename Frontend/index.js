function putPosition(position) {
    window.document.getElementsByName()("userlat").value = position.coords.latitude;
    window.document.getElementsByName()("userlong").value = position.coords.longitude; 
}

window.onload=function(){
 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(putPosition);
    } else {
        alert("Leider konnten wir deine Postition nicht abrufen :/");
    }

};