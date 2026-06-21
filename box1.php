<!DOCTYPE html>
<html lang="de">
<head>
  <title>CSS - Dose</title>
  <meta name="robots" content="noindex, nofollow">
  <style type="text/css" media="screen">
  body {
    width: 100vw;
    height: 100vh;
    background-color: gray;
    background-image: linear-gradient(transparent, rgb(220, 232, 245));
    margin: 0;
    cursor: grab;
  }
  body:active {
		cursor: grabbing;
		user-select: none;
	}
  h1 {
    color: white;
    font-family: Arial, sans-serif;
    font-size: 48px;
    text-shadow: 4px 4px 8px rgba(0,0,0,0.7);
    margin: 24px 0;
  }
  button {
    margin: 4px;
    padding: 6px 12px;
    font-size: 32px;
    border: none;
    border-radius: 4px;
    background-color: rgba(255, 255, 255, 0.8);
    color: #333;
    cursor: pointer;
  }
  
  #container {
  position: fixed;
  width: auto;
  height: auto;
  top: 25%;
  left: 48%;
  perspective: 900px;
  transition: all 1s ease 0s;
  }
      
  #frame {
  width:100%;
  transform-style: preserve-3d;
  transform: rotateX(-25deg) rotateY(258deg) rotateZ(0deg);
  }
    
  .strip {
  transform-style: preserve-3d;
  }
  
  .strip div {
  position: absolute;
  left: 0;
  top: 0;
  background: #000 url(img/dose.jpg);
  background-size: 100% 100%;
  height: 420px;
  width: 34px;
  opacity: 1;
  z-index: 100;
  transform-origin: 0px 50% 0;
  }
  
  .strip .a {background-position: 0 0;
       transform: rotateY(0deg) translateZ(124px);}
      
  .strip .b {background-position: 759px 0;
       transform: rotateY(15deg) translateZ(124px);}
    
  .strip .c {background-position: 726px 0;
       transform: rotateY(30deg) translateZ(124px);}
    
  .strip .d {background-position: 693px 0;
       transform: rotateY(45deg) translateZ(124px);}	
    
  .strip .e {background-position: 660px 0;
       transform: rotateY(60deg) translateZ(124px);}	
    
  .strip .f {background-position: 627px 0;
       transform: rotateY(75deg) translateZ(124px);}
    
  .strip .g {background-position: 594px 0;
       transform: rotateY(90deg) translateZ(124px);}
    
  .strip .h {background-position: 561px 0;
       transform: rotateY(105deg) translateZ(124px);}	
    
  .strip .i {background-position: 528px 0;
       transform: rotateY(120deg) translateZ(124px);}	
    
  .strip .j {background-position: 495px 0;
       transform: rotateY(135deg) translateZ(124px);}
    
  .strip .k {background-position: 462px 0;
       transform: rotateY(150deg) translateZ(124px);}
      
  .strip .l {background-position: 429px 0;
       transform: rotateY(165deg) translateZ(124px);}	
      
  .strip .m {background-position: 396px 0;
       transform: rotateY(180deg) translateZ(124px);}		
      
  .strip .n {background-position: 363px 0;
       transform: rotateY(195deg) translateZ(124px);}
    
  .strip .o {background-position: 330px 0;
       transform: rotateY(210deg) translateZ(124px);}
    
  .strip .p {background-position: 297px 0;
       transform: rotateY(225deg) translateZ(124px);}	
    
  .strip .q {background-position: 264px 0;
       transform: rotateY(240deg) translateZ(124px);}	
    
  .strip .r {background-position: 231px 0;
       transform: rotateY(255deg) translateZ(124px);}
    
  .strip .s {background-position: 198px 0;
       transform: rotateY(270deg) translateZ(124px);}
    
  .strip .t {background-position: 165px 0;
       transform: rotateY(285deg) translateZ(124px);}	
    
  .strip .u {background-position: 132px 0;
       transform: rotateY(300deg) translateZ(124px);}	
    
  .strip .v {background-position: 99px 0;
       transform: rotateY(315deg) translateZ(124px);}
    
  .strip .w {background-position: 66px 0;
       transform: rotateY(330deg) translateZ(124px);}
    
  .strip .x {background-position: 33px 0;
       transform: rotateY(345deg) translateZ(124px);}
  
  .strip .y {
  transform: rotateX(90deg) translateX(-110px) translateY(5px) translateZ(120px);
  background: url(img/deckel.png);
  background-size: 100% 100%;
  height: 250px;
  width: 250px;
  border-radius: 50%;
  transform-style: preserve-3d;
  }
  
  #doseScrollBox {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  text-align: center;
  }
  </style>
  
  <script language="JavaScript">
  window.onload=function() {
    // Can dimensions
    const doseRadius = (14*innerHeight/100);
    const doseDurchmesser = (doseRadius*2);
    const doseUmfang = (doseDurchmesser*Math.PI);
    const stripWidth = doseUmfang / 24 + 1;
  
    const styles = document.createElement('style');
    
    // Lids
    const doseDeckelTrzZ = (13.4*innerHeight/100); // Lid a bit lowered
    styles.innerHTML += ".strip .y {width:"+doseDurchmesser+"px; height:"+doseDurchmesser+"px; transform: rotateX(90deg) rotateY(0deg) rotateZ(0deg) translateX(-"+doseRadius+"px) translateY(0px) translateZ("+doseDeckelTrzZ+"px);}";
    
    // Cylinder
    styles.innerHTML += ".strip div {background-size:"+doseUmfang+"px 100%; height:"+(50*innerHeight/100)+"px; width:"+stripWidth+"px;}";
    
    const strips = new Array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x');
    for (let i = 0; i < strips.length; i++) {
      const TexturePositioning = i < 1 ? 0 : (doseUmfang/24)*(24-i);
  
      // strips rotation
      const stripRotation = i*15; // Rotate 15° per strip
      const stripStyle = ".strip ."+strips[i]+" {transform: rotateY("+stripRotation+"deg) translateX(-"+(stripWidth/2)+"px) translateZ("+doseRadius+"px); background-position:"+TexturePositioning+"px 0;}";
      styles.innerHTML += stripStyle;
    
      // Marker position 
      const marker = document.getElementById("z"+i);
      if (!marker) continue;
      
      const borderRadiusLeft = "border-radius:10px 0px 0px 10px;";
      const borderRadiusRight = "border-radius:0px 10px 10px 0px;";
      let markerStyle = "transform: rotateY("+stripRotation+"deg) translateX(-"+(stripWidth/2)+"px) translateZ("+(doseRadius+8)+"px); background: transparent; width:"+(stripWidth+1.5)+"px;";
    
      // Energy seal
      if (i > 10 && i < 15) {
        markerStyle += "height:"+(27*innerHeight/100)+"px; margin-top:"+(1*innerHeight/100)+"px;";
        if (i === 11) markerStyle += borderRadiusLeft;
        if (i === 14) markerStyle += borderRadiusRight;
      }
      // Energy ingredients
      else if (i > 15 && i < 23) {
        markerStyle += "height:"+(7*innerHeight/100)+"px; margin-top:"+(12*innerHeight/100)+"px;";
        if (i === 16) markerStyle += borderRadiusLeft;
        if (i === 22) markerStyle += borderRadiusRight;
      }
      // Hidden fallback
      else {
      markerStyle = "display: none;";
      }
      marker.style = markerStyle;
    }
    document.body.appendChild(styles);
  }
  
  
  /* ---------------- dose Manuell Drehung --------------------------- */
  
  var zahl = 258;
  var rollLim = 0;
  var still = 0;
  
  (function() {
    var mainObj = {
      next: null,
      distance: 0,
      initialX: 0,
      initialY: 0,
      finalX: 0,
      finalY: 0,
      presentX: 0,
      presentY: 0,
      hasuserInteracted: false,                     
      counter: 0,
      noOfImages: 18,
  
      isTouchSupported: 'ontouchstart' in window.document,    
  
      initApp: function() {
        //  setTimeout(function() { window.scrollTo(0, 1); }, 20);
        mainObj.startEvent = mainObj.isTouchSupported ? 'touchstart' : 'mousedown',
        mainObj.moveEvent = mainObj.isTouchSupported ? 'touchmove' : 'mousemove',
        mainObj.endEvent = mainObj.isTouchSupported ? 'touchend' : 'mouseup',   
        
        mainObj.imageHolder = document.getElementById("doseScrollBox");
        mainObj.imageHolder.addEventListener(mainObj.startEvent, mainObj.startHandler, false);
        mainObj.imageHolder.addEventListener(mainObj.moveEvent, mainObj.moveHandler, false);
        mainObj.imageHolder.addEventListener(mainObj.endEvent, mainObj.endHandler, false);
  
        //  mainObj.stopScrolling(); // TODO: scrollen stoppen
      },
      startHandler: function(event) {                         
        var eventObj = mainObj.isTouchSupported ? event.touches[0] : event;            
        mainObj.initialX = eventObj.pageX;
        mainObj.hasuserInteracted = true;
      },
      moveHandler: function(event) {
        if (mainObj.hasuserInteracted) {
          var eventObj = mainObj.isTouchSupported ? event.touches[0] : event; 
          mainObj.presentX = eventObj.pageX;
          mainObj.distance = parseInt((mainObj.presentX - mainObj.initialX) / 10);
  
          if (mainObj.distance <= -1) {
            mainObj.initialX = eventObj.pageX;
            mainObj.moveForward();
            rollLim = 1;
            still = 0;
          }
          else if (mainObj.distance >= 1) {
              mainObj.initialX = eventObj.pageX;
              mainObj.moveBackward();
            rollLim = 2;
            still = 0;
          }
          else {
            rollLim = 3;
            still++;
          }
        }
      },
      endHandler: function() {
        mainObj.hasuserInteracted = false;
        var rz = 150-(still*15);
        endRoll(rz, "frame");
      },
      moveForward: function() {
        zahl = zahl - 2;
        document.getElementById("frame").style.transform = "rotateX(-25deg) rotateY("+zahl+"deg) translateZ(0px)";
      },
      moveBackward: function() {
        zahl = zahl + 2;
        document.getElementById("frame").style.transform = "rotateX(-25deg) rotateY("+zahl+"deg) translateZ(0px)";
      }
    }
  
    window.addEventListener("load", function() { mainObj.initApp(); }, false);
  })()
  
  function endRoll(sec, elem) {
    if(rollLim == 1) {
      zahl--;
    }
  
    if(rollLim == 2) {
      zahl++;
    }
  
    if(sec <= 0) {
      clearTimeout(timer);
    } else {
      var element = document.getElementById(elem);
      element.style.transform = "rotateX(-25deg) rotateY("+zahl+"deg)";
  
      sec--;
  
      if(sec < 10) {
        var timer = setTimeout('endRoll('+sec+',"'+elem+'")',30);
      } else {
        var timer = setTimeout('endRoll('+sec+',"'+elem+'")',still);
      }
    }
  }
  
  
  /* ---------------- activate marker --------------------------- */
  
  function partReset(from, to) {
    for (let i = from; i < to; i++) {
      const ifrmMarker = document.getElementById("z"+i);
      ifrmMarker.style.background = "transparent";
      ifrmMarker.style.transition = "0.5s ease";
    }
  }
  
  function markerEnable(from, to, marginTop) {
    for (let i = from; i < to; i++) {
      const ifrmMarker = document.getElementById("z"+i);
      ifrmMarker.style.background = "rgba(000,255,000,0.3)";
      ifrmMarker.style.marginTop = (marginTop*innerHeight/100)+"px";
      ifrmMarker.style.transition = "0.5s ease";
    }
  }
  
  function marker(from, to, marginTop, scrollTo) {
    partReset(0, 23);
  
    const ifrmSpin = document.getElementById("frame");
    ifrmSpin.style.transform = `rotateX(-25deg) rotateY(${scrollTo}deg) translateZ(0px)`;
    ifrmSpin.style.transition = "0.6s ease";
    setTimeout(() => { ifrmSpin.style.transition = "none"; }, 600);
    zahl = scrollTo;
  
    markerEnable(from, to, marginTop);
  }
  </script>
</head>

<div id="container">
  <div id="frame">
    <div class="strip">
       <div class="y"></div>
       <div class="a"></div><div id="z0"></div>
       <div class="b"></div><div id="z1"></div>
       <div class="c"></div><div id="z2"></div>
       <div class="d"></div><div id="z3"></div>
       <div class="e"></div><div id="z4"></div>
       <div class="f"></div><div id="z5"></div>
       <div class="g"></div><div id="z6"></div>
       <div class="h"></div><div id="z7"></div>
       <div class="i"></div><div id="z8"></div>
       <div class="j"></div><div id="z9"></div>
       <div class="k"></div><div id="z10"></div>
       <div class="l"></div><div id="z11"></div>
       <div class="m"></div><div id="z12"></div>
       <div class="n"></div><div id="z13"></div>
       <div class="o"></div><div id="z14"></div>
       <div class="p"></div><div id="z15"></div>
       <div class="q"></div><div id="z16"></div>
       <div class="r"></div><div id="z17"></div>
       <div class="s"></div><div id="z18"></div>
       <div class="t"></div><div id="z19"></div>
       <div class="u"></div><div id="z20"></div>
       <div class="v"></div><div id="z21"></div>
       <div class="w"></div><div id="z22"></div>
       <div class="x"></div><div id="z23"></div>
    </div>
  </div>
</div>

<div id="doseScrollBox">
  <h1>CSS</h1>
  <button onclick="partReset(0, 23)">Reset</button>
  <button onclick="marker(16, 23, 12, 75)">Zutat 1</button>
  <button onclick="marker(16, 23, 18, 75)">Zutat 2</button>
  <button onclick="marker(16, 23, 24, 75)">Zutat 3</button>
  <button onclick="marker(16, 23, 30, 75)">Zutat 4</button>
  <button onclick="marker(16, 23, 36, 75)">Zutat 5</button>
  <button onclick="marker(11, 15, 0, 175)">Sigel</button>
</div>
</html>
