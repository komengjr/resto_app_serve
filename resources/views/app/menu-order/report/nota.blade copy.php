<!DOCTYPE html>
<html lang="en">

<head>

    <title>Nota Pembayaran</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.ttf') }}"> --}}
</head>
<style>
    @page {
        margin-left: 15px;
        margin-top: 5px;
        font-family: 'Courier New';

    }
</style>
<style>
    div.header {
        position: relative;
        left: 20px;
        width: 490px;
        height: 86px;
        border: 0.2px solid #000000;
    }

    div.body {
        font-family: 'Courier New';
        position: relative;
        left: 20px;
        width: 490px;
        height: 600px;
        border: 0px solid #302a2a;
        font-size: 15px;
        /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
    }


    div.absolute {
        position: absolute;
        top: 0px;
        right: 0;
        width: 84px;
        height: 84px;
        border: 1px solid #252424;
    }
    div.absolute-kiri {
        position: absolute;
        top: 0px;
        left: 0;
        width: 84px;
        height: 84px;
        border: 0.5px solid #252424;
    }

    table tr td p {

        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }
    div.footer {
        position: fixed;
        left: 0;
        bottom: 15px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">

    <div class="header">
        <div class="absolute-kiri">
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="data:image/png;base64, {{$image}}" width="80">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;"></p>
        </div>
        <h3 style="padding-top: 10px; margin: 20px; left: 5px; padding-left: 135px;text-decoration: underline;" >NOTA PEMBAYARAN</h3>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 0px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 0, 0, 0, 0, 255, 255)->format('svg')->size(84)->errorCorrection('H')->generate(123),
            ) !!}">
        </div>
    </div>
    <div class="body">

        <table style="font-size: 12px; margin: 0px; padding: 0px; width: 490px; font-family: Calibri (Body);" border="0">
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Nomor Dokumen </strong></td>
            </tr>
            <br>
            <tr>

            </tr>
            <tr>
                <td style="width: 200px;">Nama Pasien</td>
                <td style="width: 5px;">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 200px;">Nomor Registrasi</td>
                <td style="width: 5px;">:</td>

                <td></td>
            </tr>
            <tr>
                <td>Tanggal </td>
                <td style="width: 5px;">:</td>
                <td> </td>
            </tr>
            <tr>
                <td>Nomor Telp</td>
                <td>:</td>
                <td> </td>
            </tr>
            <tr>
                <td>Pengirim</td>
                <td>:</td>
                <td> </td>
            </tr>
            <tr>
                <td>Kelompok Pelanggan</td>
                <td>:</td>
                <td> </td>
            </tr>
        </table>
        <br>
        <table style="font-size: 12px; margin: 0px; padding: 2px; width: 490px;" border="0">
           <thead style="font-weight: bold;">
                <tr>
                    <td><strong>Rincian Pemeriksaan</strong></td>

                    <td></td>
                </tr>
           </thead>
           <tbody>
            @php
                $jumlah = 0;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->nama_pemeriksaan}}</td>

                    <td style="text-align: right;">@currency($item->nominal_paket_perusahaan-($item->nominal_paket_perusahaan*$item->diskon_paket_perusahaan/100))</td>
                </tr>
                @php
                    $jumlah = $jumlah + ($item->nominal_paket_perusahaan-($item->nominal_paket_perusahaan*$item->diskon_paket_perusahaan/100));
                @endphp
            @endforeach
           </tbody>
        </table>
        <hr>
        <table style="font-size: 12px; margin: 0px; padding: 2px; width: 490px;" border="0">
            <thead style="font-weight: bold;">
                 <tr>
                     <td><strong>Total Pembayaran</strong></td>

                     <td style="text-align: right;">@currency($jumlah)</td>
                 </tr>
            </thead>

         </table>
         <br><br><br>
        <table style="font-size: 12px; margin: 0px; padding: 2px; width: 490px;" style="border: solid 1px">
            <thead style="font-weight: bold;">
                 <tr>
                     <td><strong>Dokumen pelunasan dianggap sah apabila nominal tersebut diatas telah masuk pada rekening yang telah di
                        tetapkan
                        </strong></td>

                 </tr>
            </thead>

         </table>


    <div class="footer">
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 490px; font-size: 11px; font-family: Calibri (Body);"
            border="0">
            <tr>

                <td colspan="3" style="text-align: right"><strong>Pontianak , {{date('d - m - Y ')}}</strong></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">Petugas</td>
            </tr>
            <tr >
                <td class="text-center" style="padding-top: 10px; padding-bottom: 10px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br><br><br>


                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>


                </td>
                <td  style="width: 33%;text-align: right;">Agus Prasetyo Raharjo</td>
            </tr>

        </table>
    </div>
    </div>


</html>
