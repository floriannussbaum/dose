<!DOCTYPE html>
<html lang="de">
<head>
  <title>WebGL - Dose</title>
  <meta name="robots" content="noindex, nofollow">
  <script src="js/three.min.js"></script>

  <script type="text/javascript">
	function onLoadComplete()
	{
		var camera, scene, renderer;
		var mesh, mesh2;
		var light, material, material2;

		var targetRotation = 1.2;
		var targetRotationOnMouseDown = 0;

		var mouseX = 0;
		var mouseXOnMouseDown = 0;

		var windowHalfX = window.innerWidth / 2;
		var windowHalfY = window.innerHeight / 2;

		var isAnimating = false;

		init();
		requestRender();

		function init() {
			renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
			renderer.setPixelRatio( window.devicePixelRatio );
			renderer.setSize( window.innerWidth, window.innerHeight );
			renderer.setClearColor( 0x000000, 0 );
			document.body.appendChild( renderer.domElement );

			camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
			camera.position.z = 400;
			camera.position.y = 300;
			camera.rotation.x = -0.58;
			camera.lookAt( new THREE.Vector3( 0, -50, 0 ) );

			scene = new THREE.Scene();

			var geometry = new THREE.CylinderGeometry( -80, -80, 300, 30, 14 );
			var geometry2 = new THREE.CircleGeometry( 79, 30, 0, 6.3 );

			var texture = THREE.ImageUtils.loadTexture( 'img/dose.jpg' );
			texture.anisotropy = renderer.getMaxAnisotropy();

			var texture2 = THREE.ImageUtils.loadTexture( 'img/deckel.png' );
			texture2.anisotropy = renderer.getMaxAnisotropy();

			light = new THREE.DirectionalLight( 0xffffff, 1.5 );
			light.position.z = 1;
			scene.add( light );

			material = [
				new THREE.MeshLambertMaterial( { color: 0xbbbbbb, map: texture, side: THREE.FrontSide } ),
				new THREE.MeshPhongMaterial( { emissive: 0x111111, side: THREE.BackSide } )
			];

			material2 = [
				new THREE.MeshLambertMaterial( { color: 0xbbbbbb, map: texture2, side: THREE.FrontSide } ),
				new THREE.MeshBasicMaterial( { color: 0xffffff, side: THREE.BackSide } )
			];

			mesh = new THREE.SceneUtils.createMultiMaterialObject( geometry, material );
			mesh2 = new THREE.SceneUtils.createMultiMaterialObject( geometry2, material2 );
			mesh2.position.y = 145;
			mesh2.rotation.x = 80.11;

			scene.add( mesh, mesh2 );

			document.addEventListener( 'mousedown', onDocumentMouseDown, false );
			document.addEventListener( 'touchstart', onDocumentTouchStart, false );
			document.addEventListener( 'touchmove', onDocumentTouchMove, false );

			window.addEventListener( 'resize', onWindowResize, false );
		}

		function onWindowResize() {
			windowHalfX = window.innerWidth / 2;
			windowHalfY = window.innerHeight / 2;

			camera.aspect = window.innerWidth / window.innerHeight;
			camera.updateProjectionMatrix();

			renderer.setSize( window.innerWidth, window.innerHeight );
			requestRender();
		}

		function onDocumentMouseDown( event ) {
			event.preventDefault();

			document.addEventListener( 'mousemove', onDocumentMouseMove, false );
			document.addEventListener( 'mouseup', onDocumentMouseUp, false );
			document.addEventListener( 'mouseout', onDocumentMouseOut, false );

			mouseXOnMouseDown = event.clientX - windowHalfX;
			targetRotationOnMouseDown = targetRotation;
		}

		function onDocumentMouseMove( event ) {
			mouseX = event.clientX - windowHalfX;
			targetRotation = targetRotationOnMouseDown + ( mouseX - mouseXOnMouseDown ) * 0.02;
			requestRender();
		}

		function onDocumentMouseUp( event ) {
			document.removeEventListener( 'mousemove', onDocumentMouseMove, false );
			document.removeEventListener( 'mouseup', onDocumentMouseUp, false );
			document.removeEventListener( 'mouseout', onDocumentMouseOut, false );
		}

		function onDocumentMouseOut( event ) {
			document.removeEventListener( 'mousemove', onDocumentMouseMove, false );
			document.removeEventListener( 'mouseup', onDocumentMouseUp, false );
			document.removeEventListener( 'mouseout', onDocumentMouseOut, false );
		}

		function onDocumentTouchStart( event ) {
			if ( event.touches.length === 1 ) {
				event.preventDefault();

				mouseXOnMouseDown = event.touches[ 0 ].pageX - windowHalfX;
				targetRotationOnMouseDown = targetRotation;
				requestRender();
			}
		}

		function onDocumentTouchMove( event ) {
			if ( event.touches.length === 1 ) {
				event.preventDefault();

				mouseX = event.touches[ 0 ].pageX - windowHalfX;
				targetRotation = targetRotationOnMouseDown + ( mouseX - mouseXOnMouseDown ) * 0.05;
				requestRender();
			}
		}

		function requestRender() {
			if (!isAnimating) {
				isAnimating = true;
				animateOnDemand();
			}
		}

		function animateOnDemand() {
			var difference = targetRotation - mesh.rotation.y;
			mesh2.rotation.z = mesh.rotation.y += difference * 0.05;
			renderer.render( scene, camera );

			if ( Math.abs( difference ) > 0.001 ) {
				requestAnimationFrame( animateOnDemand );
			} else {
				isAnimating = false; 
			}
		}
	}
  </script>
  
  <style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}
	body {
		width: 100vw;
		height: 100vh;
		background-color: gray;
		background-image: linear-gradient(transparent, rgb(245, 220, 220));
		cursor: grab;
		text-align: center;
	}
	h1 {
		color: white;
		font-family: Arial, sans-serif;
		font-size: 48px;
		text-shadow: 4px 4px 8px rgba(0,0,0,0.7);
		margin: 24px 0;
	}
  </style>
</head>

<body onload="onLoadComplete();">
  <h1>WebGL</h1>
</body>
</html>
