document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {

    if (session.has()) {
        //alert('HOME');
        //window.location.href = "home.html";
        $(".page-with-subnavbar").show();
    } else {
        $("#login").trigger('click');
    }

}