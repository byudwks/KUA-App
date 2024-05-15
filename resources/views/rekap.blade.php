<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            paddign:0;
        }
        .laporan {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
            .kop-surat{
                display: flex;
                width: 100%;
                border-bottom: 2px solid #000;
                text-transform: uppercase;
                justify-content : start;
            }

            .img-lap img {
                width: 120px;
				height: 120px;
            }
            .img-lap2 img {
                width: 150px;
				height: 150px;
                margin-left : 2rem;

            }

            .text-kop {
                text-align: center;
                margin-bottom : 10px;
            }
            .text-kop p {
                font-size: 18px;
				line-height: 35px;
                font-weight: bold;
                margin-left: 140px;
            }
            .text-kop h5 {
                font-style: italic;
                font-size: 17px;
                text-transform: lowercase;
            }

            .sub-lap {
                display :flex;
                margin-top : 3rem;
                justify-content: space-between;
                font-size: 17px;
                text-align: left;
            }

            .tabel-sup table{
                margin-left: 2rem;
                text-align: flex-start;
            }

            .text-sub{
                margin-right: 3rem;
                font-size: 14px;

            }

            .lap-isi {
                margin-top: 5rem;
            }

            .lap-isi h6 {
                margin-bottom : 10px;
                font-size: 16px;
            }

            .card-lap{
                margin-top: 2rem;
            }

            .card-lap h5{
                font-size: 16px;
                text-align: center;
                margin-bottom : 2rem;
            }

            .card-lap .table-isi {
                border-collapse: collapse;
                margin-bottom: 2rem;
				line-height: 45px;
                width: 100%;

            }

            .card-lap .table-isi th{
                font-size: 14px;
                text-align: start;
                padding-left: 5px;
                border: 1px solid #ddd;


            }
            .card-lap .table-isi td{
                font-size: 14px;
                text-align: start;
                padding-left: 15px;
                border: 1px solid #ddd;


            }

            .tutup-lap {
                font-size : 16px;
                margin-top : 5rem;
                text-align: center;
                display: flex;
                justify-content: flex-end;

            }
            .tutup-lap p {
                margin-bottom : 5rem;

            }

            .tutup-lap h6 {
                font-size : 16px;
                
            }

            @media print{
				.button-laporan{
					display: none;

                }
                .img-lap {
                    margin-left : 0rem;
                }
                .text-kop {
                    margin-left : 2rem;
                }
                .text-kop p {
                font-size: 16px;
				line-height: 25px;
            }
                .img-lap img {
                width: 100px;
				height: 100px;
            }
                .img-lap2 img {
                width: 100px;
				height: 100px;
            }
            .text-kop h5 {
                font-size: 15px;
            }
                
                }

    </style>
                <div class="button-laporan">
                    <button action="/buat_laporan" class="mb-5 btn-cetak btn btn-sm btn-danger"  onclick="window.print()" >Cetak Laporan</button>
                </div>

    <div class="laporan">

        <div class="kop-surat">
            <div class="img-lap">
                <img src="/img/kua.png" alt="">
            </div>
            <div class="text-kop">
                <p>kantor Urusan agama<br> Kecamatan trimurjo <br> kabupaten Lampung Tengah </p>
            </div>
        </div>

        <div class="sub-lap">
            <div class="tabel-sub">
                <table class="table">
                    <tbody> 
                        <tr>
                            <th>Lampiran</th>
                            <td>: 1 (Satu) Lembar</td>
                        </tr>
                        <tr>
                            <th>Perihal</th>
                            <td><p>: Rekap Data Pendaftaran Pernikahan</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-sub">
                <h4>Trimurjo, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</h4>
            </div>
        </div>

        <div class="lap-isi">
            <h6>Dengan Hormat,</h6>
            <p>Bersama ini kami sampaikan rekap laporan pendaftaran pernikahan kecamatan Trimurjo , Dengan rekapitulasi sebagai berikut :</p>
        </div>
        
        <div class="card-lap">
            <h5>Data Pendaftaran Pernikahan Kecamatan Trimurjo</h5>
               
            <table class="table-isi">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Token</th>
                        <th>Nomer Handphone</th>
                        <th>Nama Pengantin Pria</th>
                        <th>Nama Pengantin Wanita</th>
                        <th>Tanggal Akad Nikah</th>
                    </thead>
                    
                   
                    <tbody>
                        @foreach ($filteredAkads as $fa )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $fa->token }}</td>
                                <td>{{ $fa->nohp }}</td>
                                <td>{{ $fa->cppria->nama  }}</td>
                                <td>{{ $fa->cppria->cpwanita->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($fa->tanggal_akad)->formatLocalized('%d %b %Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            <p>Demikian laporan Rekap ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
        </div>

        <div class="tutup-lap">
            <div>
                <p>Mengetahui <br>Kepala KUA Kecamatan Trimurjo</p>
                <h6>H. Abdul Karim Lubis, M.Kom.I </h6>
                <h6>NIP. 197003142005011005</h6>
            </div>
        </div>

    </div>
</body>
</html>