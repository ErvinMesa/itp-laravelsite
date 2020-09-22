const { LatLng } = require("leaflet");

$(function () {
   $("#ctracing").DataTable()

   $("#Form").on("click",function(e){ 
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
         title: "Are you sure?",
         text: "Confirm Submission?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Confirm",
         closeOnConfirm: false
      }).then( confirm=>{
         if (confirm.value) {
            form.submit();
         }
         else{
            Swal.fire({
                  title: "Okay!",
                  text: "Submission Cancelled",
                  type: "error",
            })
         }
      });
   })
   
   var mymap;
   //check if the map exists
   if($("#mapid").length){
      //add event listener that runs updateMap function when the dropdown is changed
      document.getElementById("MapDisplay").addEventListener('change',updateMap);
      //supply mymap variable
      mymap = L.map('mapid').setView([10.6342877,122.9324966], 13);
      //add map layer
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
         attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
         maxZoom: 18,
         id: 'mapbox/streets-v11',
         tileSize: 512,
         zoomOffset: -1,
         accessToken: 'pk.eyJ1IjoicmF5dmVuam0iLCJhIjoiY2tmMjNvbnFoMWVzMTJ2cDN2eHpmZzNjZSJ9.C1e6ZYTvg-xVUFRkoDrLCw'
         }).addTo(mymap);
      //run updateMap
      updateMap();
  }

  function updateMap(){
      //create AJAX request
      let xhr = new XMLHttpRequest();
      //request from custom api that returns locations
      xhr.open("GET",'/map/data',true);

      // to remove bugged shadows
      let icon = new L.Icon.Default();
      icon.options.shadowSize = [0,0];

      //runs when the request is received
      xhr.onload = function(){
         //parse json data
         let data = JSON.parse(this.responseText);
         
         citymuns = new L.layerGroup();
         barangays = new L.layerGroup();
         data['citymuns'].forEach(marker => {
            let latlong = L.latLng(parseInt(marker['longitude']),parseInt(marker['latitude']));
            citymuns.addLayer(L.marker(latlong,{icon:icon}).bindPopup(marker['cmdesc']));
         });
         data['barangays'].forEach(marker => {
            let latlong = L.latLng(parseInt(marker['longitude']),parseInt(marker['latitude']));
            barangays.addLayer(L.marker(latlong,{icon:icon}).bindPopup(marker['bname']));
         });
         mymap.eachLayer(function(layer){
            if(layer._url === undefined){
               mymap.removeLayer(layer);
            }
         })
         switch(document.getElementById("MapDisplay").value){
            case "all":   
               citymuns.addTo(mymap);
               barangays.addTo(mymap);     
               break;
            case "citymuns":
               citymuns.addTo(mymap);
               break;
            case "barangays":
               barangays.addTo(mymap);
               break;
         }
      }
      xhr.send();
   }
});

