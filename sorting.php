<!DOCTYPE html>
<html>
  <head>
    <title>Sorting</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
    
    <style>
     

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Consolas;
      }

#wrapper {
  position: absolute;
  display:table;
  width:50%;
  left:25%;
}
#row1,#row2,#row3 ,#row4,#row5{
  display:table-row;
}
#first , #second{
  display:table-cell;
  background-color:red;
  width:25%;
  border-radius: 10px;
  padding: 5px;
  border-color:black;
}

#place1,#place2,#place3 ,#place4,#place5{
  position: relative;
  left:30%;
  font-family: Consolas;
}

#text {
background-color:black;
text-align: center;
font-family: Consolas;
font-size: 30px;

}

</style>
  </head>
  <body>
    <div id="text"><p  style="color:white; text-align: center;">List of Places with sortest distance from the source address</p></div>

    <div id="wrapper">
        <div id="row1">
          <div id="first"><p style="color:black; text-align: center;" id = 'demo1'></p></div>
          <div id="second"><button onclick="getdirection(1)" id='place1'>GET DIRECTION</button><br><br></div>
        </div>

        <div id="row2">
          <div id="first"><p style="color:black; text-align: center;" id = 'demo2'></p></div>
          <div id="second"><button onclick="getdirection(2)" id='place2'>GET DIRECTION</button><br><br></div>
        </div>

        <div id="row3">
          <div id="first"><p style="color:black; text-align: center;" id = 'demo3'></p></div>
          <div id="second"><button onclick="getdirection(3)" id='place3'>GET DIRECTION</button><br><br></div>
        </div>

        <div id="row4">
          <div id="first"><p style="color:black; text-align: center;" id = 'demo4'></p></div>
          <div id="second"><button onclick="getdirection(4)" id='place4'>GET DIRECTION</button><br><br></div>
        </div>

        <div id="row5">
          <div id="first"><p style="color:black; text-align: center;" id = 'demo5'></p></div>
          <div id="second"><button onclick="getdirection(5)" id='place5'>GET DIRECTION</button><br><br></div>
        </div>
    </div>
    <script>

     var locations = [

                    ['Agonda Beach',15.0437626,73.9857577,0],
                    ['Palolem Beach',15.0099648,74.0232185999999,0],
                    ['Cavelossim Beach',15.1715011,73.941493,0],
                    ['Varca Beach',15.2209348,73.9290015,0],
                    ['Arambol Beach',15.6846886,73.70328359999999,0],
                    ['Utorda Beach',15.3180882,73.8996066,0],
                    ['Dudhsagar Falls',15.3144691,74.314067,0],
                    ['Morjim',15.6316233,73.7389596,0],
                    ['Ashwem Beach',15.6437966,73.71740249999999,0],
                    ['Cola Beach',15.0645446,73.9712454,0],
                    ['Old Goa',15.5027745,73.9154069,0],
                    ['Candolim Beach',15.5183861,73.7654787,0],
                    ['Vagator Beach',15.6029835,73.733627,0],
                    ['Majorda Beach',15.3111553,73.9018114,0],
                    ['Baga Beach',15.5556936,73.75164699999999,0],
                    ['Shantadurga Temple',15.2604729,73.97592639999999,0],
                    ['Chapora Fort',15.620702,73.74484369999999,0],
                    ['Sinquerim Beach',15.5302398,73.7629527,0],
                    ['Baga Beach',15.5556936,73.75164699,0],
                    ['Fort Aguada',15.4920556,73.7740778,0],
                    ['Anjuna Market',15.5794752,73.7475508,0],
                    ['Anjuna Beach',15.5735995,73.7407065,0],
                    ['Cansaulim Beach',15.5183861,73.7654787,0],
                    ['Fontainhas',38.7215131,-9.410376699999999,0],
                    ['Mangeshi Temple',15.4481986,73.96858569999999,0],
                    ['Church of St. Francis of Assissi',-20.3868142,-43.5027534,0],
                    ['Mobor Beach',15.1563886,73.9457178,0],
                    ['Betalbatim Beaches',15.2926227,73.9078744,0],
                    ['Fort Aguada Lighthouse',15.4919312,73.7726119,0],
                    ['Dona Paula Beach',15.4532717,73.80128549999999,0],
                    ['Miramar Beach',15.480617,73.8073429,0],
                    ['Galgibaga Beach',14.9600472,74.04956539999999,0],
                    ['Sahakari Spice Farm',15.4093, 74.0241,0],
                    ['Casino Royale Goa',15.2993,74.124,0],
                    ['Chapora Beach',15.606325,73.7402468,0]
                
                    ];
 

var latitude1 = "<?php echo $_POST['l1']; ?>";
var longitude1 = "<?php echo $_POST['l2']; ?>";
var i,j;
for(i=0;i<30;i++)
{

var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(locations[i][1], locations[i][2])); 
locations[i][3]=(distance/1000);

}


var key,key0,key1,key2;
var z;
for (j=1 ;j<30;j++)
{
  key=locations[j][3];
  key2=locations[j][2];
  key1=locations[j][1];
  key0=locations[j][0];
  z=j-1;
  while(z>=0 && locations[z][3]>key)
  {
    locations[z+1][0]=locations[z][0];
    locations[z+1][1]=locations[z][1];
    locations[z+1][2]=locations[z][2];
    locations[z+1][3]=locations[z][3];
    z=z-1;
  }
  locations[z+1][3]=key;
  locations[z+1][2]=key2;
  locations[z+1][1]=key1;
  locations[z+1][0]=key0;

}

for(x=0;x<5;x++)

{
  if(x==0)
  {
  document.getElementById('demo1').innerHTML+='<br>'+ '<strong>'+ locations[x][0]+'</strong>'+'<br>' + '<strong>'+"Distance  in kilometers   "+locations[x][3]+'</strong>';
  }

   if(x==1)
  {
  document.getElementById('demo2').innerHTML+='<br>'+  '<strong>'+locations[x][0]+'</strong>'+'<br>'+ '<strong>'+"Distance  in kilometers  "+locations[x][3]+'</strong>';
  }

   if(x==2)
  {
  document.getElementById('demo3').innerHTML+='<br>'+ '<strong>'+ locations[x][0]+'</strong>'+'<br>' + '<strong>'+"Distance  in kilometers "+locations[x][3]+'</strong>';
  }


   if(x==3)
  {
  document.getElementById('demo4').innerHTML+='<br>'+ '<strong>'+ locations[x][0]+'</strong>'+'<br>' + '<strong>'+"Distance  in kilometers "+locations[x][3]+'</strong>';
  }


   if(x==4)
  {
  document.getElementById('demo5').innerHTML+='<br>'+ '<strong>'+ locations[x][0]+'</strong>'+'<br>' + '<strong>'+"Distance  in kilometers "+locations[x][3]+'</strong>';
  }

}

function getdirection(option)
{
  window.location.href = "https://www.google.co.in/maps/dir/" + latitude1+","+longitude1+"/"+ locations[option-1][1]+","+locations[option-1][2];
}
     
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRZ8di7cKfG8IXF3Fn5U80gOysHZDP9wg&callback=initMap">
    </script>
  </body>
</html>