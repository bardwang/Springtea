//Google Geolocation API
//http://www.w3schools.com/html/html5_geolocation.asp
  
  function showPosition(position)
  {
  lat= 42.3394537;
  lon= -71.0918575;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='400px';
  mapholder.style.width='700px';

  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Our company is here!"});
  }