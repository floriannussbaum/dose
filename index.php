<!DOCTYPE html>
<html lang="de">
<head>
  <title>Dose</title>
  <meta name="robots" content="noindex, nofollow">
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
    }

    html, body, main {
      height: 100%;
    }

    #noscript, progress {
      z-index: 110;
    }

    progress[value] {
      position: absolute;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 100%;
      height: 4px;
      background-size: auto;
      background-color: transparent;
      border: none;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      max-width: 100vw;
      margin: 0 auto;
    }

    @media (max-width: 1280px) {
      .container {
        grid-template-columns: 1fr; 
      }
    }

    .model {
      width: 100%;
      height: 100vh;
    }

    .error {
      display: inline-block;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      text-align: center;
      font-family: Arial, sans-serif;
      color: #cc0000;
      background: rgba(255, 204, 204, 0.5);
      backdrop-filter: blur(2px);
      padding: 10px 0;
    }
  </style>
</head>

<body>
  <noscript>
    <div id="noscript" class="error">
      <strong>Please enable Your JavaScript for the full experience.</strong>
      <p>JavaScript ist nicht aktiviert, Elemente können nicht richtig dargestellt werden.</p>
    </div>
  </noscript>

  <progress id="progressBar" value="0" max="100" style="display:none;"></progress>
  <main class="container">
    <iframe id="ifrm1" src="box1.php" class="model" scrolling="no" frameborder="0"></iframe>
    <iframe id="ifrm2" src="box2.php" class="model" scrolling="no" frameborder="0"></iframe>
  </main>
</body>

<script>
  var bar = document.getElementById('progressBar');
  var sim;
  var amountLoaded = 0;
  
  var totalIframes = 2;
  var loadedIframes = 0;

  function progressBarSim() {
    if (amountLoaded === 0) {
      bar.style.display = "";
      bar.style.opacity = "0.5";
    }

    if (bar.value >= 100) {
      clearTimeout(sim);
      bar.style.opacity = "1";
      setTimeout(function() { 
        bar.style.display = "none"; 
      }, 400);
      return;
    }

    if (amountLoaded < 90) {
      amountLoaded++;
      bar.value = amountLoaded;
    }

    sim = setTimeout(progressBarSim, 30);
  }

  function iframeLoaded() {
    loadedIframes++;
    if (loadedIframes === totalIframes) {
      bar.value = 100;
    }
  }

  document.getElementById('ifrm1').onload = iframeLoaded;
  document.getElementById('ifrm2').onload = iframeLoaded;

  progressBarSim();
</script>
</html>
