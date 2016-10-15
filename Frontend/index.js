window.onload = function () {
    navigator.geolocation.getCurrentPosition(function (location) {

        window.document.getElementById("userlat").value = location.coords.latitude;
        window.document.getElementById("userlong").value = location.coords.longitude;
    });
};

function redirectHelfer(){
    navigator.geolocation.getCurrentPosition(function (location) {
        window.document.getElementById("userlat").value = location.coords.latitude;
        window.document.getElementById("userlong").value = location.coords.longitude;
        $( "#redirect" ).submit();
    });
    
}