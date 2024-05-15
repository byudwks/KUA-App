<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kartu Nikah</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		.container {
			width: 300px;
			height: 500px;
			margin: 20px auto;
			padding: 20px;
			background-color: #f8f8f8;
			border: 1px solid #ccc;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-radius: 10px;
			position: relative;
			overflow: hidden;
			background-image: linear-gradient(to top, #b9f866, #b2f970, #abfa7a, #a5fa83, #9ffb8c, #96f58a, #8eee88, #85e886, #77da78, #69cb6b, #5abd5d, #4caf50);
		}
		
		.background {
			background-image: url(/img/kua.png);
			background-size: 60px;
			opacity: 0.1;
			width: 100%;
			height: 100%;
			background-repeat: repeat;
			background-position: 50px 20px;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}

		.hero{
			display: flex;
			justify-content: space-between;
		}

		.img-hero{
			height: 50px;
			width: 50px;
		}

		.text-hero{
			display: flex;
			flex-direction: column;
			justify-content: center;
			text-align: center;
			font-size: 15px;
			font-weight: 800;
			-webkit-text-stroke: 0.3px #fff;
			text-stroke: 0.3px #fff;
			text-transform: uppercase;
		}

		.middle{
			display: flex;
			flex-direction: column;
			justify-content: center;
			text-align: center;
		}

		.middle{
			margin-top: 40px;
			border-bottom: 2px solid #000;	
		}

		.text1{
			font-size: 20px;
			text-transform: uppercase;
			font-weight: 800;
		}

		.text2{
			font-size: 12px;
			text-transform: capitalize;
			font-weight: 400;
		}

		.img-bg{
			display: flex;
			justify-content: space-between;
			margin-right: 15px;
			margin-left: 15px;
			margin-top: 25px;
		}

		.img1{
			display: flex;
			flex-direction: column;
			z-index: 99;
			justify-content: center;
		}

		.img2{
			display: flex;
			flex-direction: column;
			z-index: 99;
			justify-content: center;

		}

		.imgpas{
			height: 150px;
			width: 110px;
			align-self: center;
		}
		
		.img-bg span{
			text-transform: capitalize;
			fonr-size: 12px;
			font-weight: 600;
			align-self: center;

		}

		.bg-qr{
			display: flex;
			justify-content: center;
		}

		.qrimg{
			height:150px;
			width: 150px;
		}

		.tbl{
			display: flex;
			justify-content: center;
		}

		.tbl-ct{
			background-color : #FF0000;
			border: none;
			padding: 10px;
			text-transform: uppercase;
			border-radius: 10px;
			font-weight: 600;
		}

		@media print {
			.tbl {
			display: none;
		}
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="background">
		</div>
		<div class="hero">
			<img src="/img/garuda.png" alt="" class="img-hero">
			<div class="text-hero">
				<span>Kementrian Agama</span>
				<span>Republik Indonesia</span>
			</div>	
			<img src="/img/kua.png" alt="" class="img-hero">
		</div>
		<div class="middle">
			<span class="text1">kartu nikah</span>
			<span class="text2">Kantor urusan agama kecamatan trimurjo </span>
		</div>
		<div class="img-bg">
			<div class="img1">
				<img src="{{ asset('storage/' . $cpprias->pasimg) }}" class="imgpas">
				<span>{{ $cpprias->nama }}</span>
			</div>
			<div class="img2">
				<img src="{{ asset('storage/' . $cpwanitas->pasimg) }}" class="imgpas">
				<span>{{ $cpwanitas->nama }}</span>
			</div>
		</div>
		<div class="bg-qr">
			<img src="/img/qr.png" alt="" class="qrimg">
		</div>
	</div>
	<div class="tbl">
		<button class="tbl-ct" onclick="window.print()">Print</button>
	</div>
</body>
</html>
