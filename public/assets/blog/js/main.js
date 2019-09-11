$(".dropdown-item").hover(function () {
        $(this).addClass('active');
        $(this).removeClass('text-success');
        $(this).addClass('text-white');
    }, function () {
        $(this).addClass('text-success');
        $(this).removeClass('active');
        $(this).removeClass('text-white');
    }
);
$(".nav-item").hover(function(){
    $(this).addClass('active');
},function(){
    $(this).removeClass('active');
});

function regular_map() {
    var var_location = new google.maps.LatLng(36.870806, 10.197207);

    var var_mapoptions = {
        center: var_location,
        zoom: 14
    };

    var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "Tunisia"
    });
}
// Initialize maps
google.maps.event.addDomListener(window, 'load', regular_map);
$(".navbar-nav").on('click','li',function () { 
    $(".navbar-nav li.active").removeClass('active');
    $(this).addClass('active');
 });