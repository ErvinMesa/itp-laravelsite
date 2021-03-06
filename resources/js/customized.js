const { LatLng } = require("leaflet");
const { slice } = require("lodash");
const { default: QrScanner } = require("qr-scanner");

$(function () {
   $("#ctracing").DataTable({
      ajax:'/ctracing/index/data',
      deferLoading: true,
   })

   $("#userstable").DataTable()

   $("#logstable").DataTable()

   if($("#qr").length){
      let url = window.location.href;
      let canvas = document.getElementById("qr");
      fetch(url+'/data')
      .then((res)=>res.json())
      .then((data)=>{
         QRCode.toCanvas(canvas,data['id'].toString(),(err)=>{if(err) console.error(err)})
      });
   }

   if($('#userstable').length){
      var el = document.querySelectorAll(".rolecheck");
      xhr = new XMLHttpRequest();
      for (var i = 0; i < el.length; i++) {
         el[i].addEventListener("change", function (e) {
            let id = e.target.id;
            let value = e.target.value;
            fetch("users/"+id,{
               method:'PATCH',
               headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-Token": $('input[name="_token"]').val(),
                  "Access-Control-Allow-Origin" : "*", 
                  "Access-Control-Allow-Credentials" : true 
                },
               credentials:'same-origin',
               body:JSON.stringify({
                  user_role:value
               })
            })
            .then((res)=>res.text())
            .then((data)=>{
               Swal.fire({
                  title:"Success!",
                  text:'Role changed!',
                  type:"success"
               })
            })
          })
      }
   }

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
         
         cities = new L.layerGroup();
         municipalities = new L.layerGroup();
         data.forEach(marker => {
            let latlong = L.latLng(parseFloat(marker.latitude),parseFloat(marker.longitude));
            switch(marker.cmclass){
               case "City":
                  cities.addLayer(L.marker(latlong,{icon:icon}).bindPopup(marker.cmdesc));
                  break;
               case "Municipality":
                  municipalities.addLayer(L.marker(latlong,{icon:icon}).bindPopup(marker.cmdesc));
                  break;
            }
         });
         mymap.eachLayer(function(layer){
            if(layer._url === undefined){
               mymap.removeLayer(layer);
            }
         })
         console.log(cities);
         switch(document.getElementById("MapDisplay").value){
            case "all":   
               cities.addTo(mymap);
               municipalities.addTo(mymap);     
               break;
            case "cities":
               cities.addTo(mymap);
               break;
            case "municipalities":
               municipalities.addTo(mymap);
               break;
         }
      }
      xhr.send();
   }

   if($("#citymunedit").length){
      const queryString = window.location.href;
      // grab citymun id from url
      let regex = new RegExp('[a-zA-Z0-9\/:.]*\/ctracing\/edit\/');
      let id = queryString.replace(regex,"");
      // set url to the custom api that returns a json
      let url = "/ctracing/edit/"+id+"/data";
      // use fetch to make an ajax request
      fetch(url).then((res)=>res.json()).then((data)=>{
         document.getElementsByName("cmdesc")[0].value = data.cmdesc;
         document.getElementsByName("latitude")[0].value = data.latitude;
         document.getElementsByName("longitude")[0].value = data.longitude;
         document.getElementsByName("cmclass")[0].getElementsByTagName('option')[data.cmclass].selected;
         document.getElementsByName("remarks")[0].value = data.remarks;
      });

      // --- ALTERNATIVE USING PURE AJAX ---
      // let xhr = new XMLHttpRequest();
      // xhr.open("GET",url,true);
      // xhr.onload = function(){
      //    let data = JSON.parse(this.responseText);
      //    document.getElementsByName("cmdesc")[0].value = data.cmdesc;
      //    document.getElementsByName("latitude")[0].value = data.latitude;
      //    document.getElementsByName("longitude")[0].value = data.longitude;
      //    document.getElementsByName("cmclass")[0].getElementsByTagName('option')[data.cmclass].selected;
      //    document.getElementsByName("remarks")[0].value = data.remarks;
      // };
      // xhr.send()
   }

   if($('video').length){
      const qrScanner = new QrScanner(document.getElementById('scanner'),result=> console.log('code:', result));
      document.getElementById('startScan').addEventListener('click',(e)=>{
         qrScanner.start();
      })
      document.getElementById('stopScan').addEventListener('click',(e)=>{
         qrScanner.stop();
      })
   }
});

