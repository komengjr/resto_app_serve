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
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="data:image/png;base64, {{ $image }}"
                width="80">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;"></p>
        </div>
        <h3 style="padding-top: 10px; margin: 20px; left: 5px; padding-left: 135px;text-decoration: underline;">NOTA
            PEMBAYARAN</h3>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 0px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 0, 0, 0, 0, 100, 100)->format('svg')->style('round')->size(84)->errorCorrection('H')->generate($reg->no_reg_order),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table style="font-size: 12px; margin: 0px; padding: 0px; width: 490px; font-family: Calibri (Body);" border="0">
            <tr>
                <td style="width: 200px;">Nomor Order</td>
                <td style="width: 5px;">:</td>
                <td>{{$reg->no_reg_order}}</td>
            </tr>
            <tr>
                <td>Tanggal Order</td>
                <td style="width: 5px;">:</td>
                <td>{{$reg->m_order_date}}</td>
            </tr>
            <tr>
                <td>Table Order</td>
                <td style="width: 5px;">:</td>
                <td>{{$reg->m_table_master_name}}</td>
            </tr>
        </table>

        <hr>
        <table style="font-size: 12px; margin: 0px; padding: 0px; width: 490px;" border="0">
            <thead style="font-weight: bold;">
                <tr>
                    <td>
                        <strong>Order Name</strong>
                    </td>
                    <td>Qty</td>
                    <td style="text-align: right;">Total</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td class="align-middle">
                            <h4>{{ $item->t_product_name }}</h4>
                            <p class="mb-0">{{ $item->t_product_type }}</p>
                        </td>
                        <td class="align-middle text-center">{{ $item->quantity }}</td>
                        <td class="align-middle text-right" style="text-align: right;">@currency(($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) * $item->quantity)</td>
                    </tr>
                    @php
                        $total =
                            ($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) *
                                $item->quantity +
                            $total;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <hr>
        <table style="font-size: 12px; margin: 0px; padding: 2px; width: 490px;" border="0">
            <thead style="font-weight: bold;">
                <tr>
                    <td><strong>Total Pembayaran</strong></td>

                    <td style="text-align: right;">@currency($total)</td>
                </tr>
            </thead>

        </table>
        <br><br><br>
        <table style="font-size: 12px; margin: 0px; padding: 2px; width: 490px;" style="border: solid 1px">
            <thead style="font-weight: bold;">
                <tr>
                    <td>
                        <strong>Nota ini Sah Secara Sistem , Apabila Terjadi Kesalahan Tunjukan nota ini sebagai Bukti</strong>
                    </td>

                </tr>
            </thead>

        </table>


        <div class="footer">

        </div>
    </div>


</html>
