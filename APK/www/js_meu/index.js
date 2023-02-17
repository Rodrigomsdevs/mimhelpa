document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {


    StatusBar.overlaysWebView(true);

    if (session.has()) {
        //alert('HOME');
        //window.location.href = "home.html";
        $(".page-with-subnavbar").show();
    } else {
        $("#login").trigger('click');
    }



}