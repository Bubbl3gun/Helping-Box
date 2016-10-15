window.onload = function () {
    navigator.geolocation.getCurrentPosition(function (location) {
        window.document.getElementsByName("userlat").value = location.coords.latitude;
        window.document.getElementsByName("userlong").value = location.coords.longitude;
    });
};

function redirect(){
    navigator.geolocation.getCurrentPosition(function (location) {
        window.document.getElementsByName("userlat").value = location.coords.latitude;
        window.document.getElementsByName("userlong").value = location.coords.longitude;
        $( "#redirect" ).submit();
    });
    
}