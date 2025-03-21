<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota - Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center text-center mb-3">

                <div class="col text-sm-end mt-3 mt-sm-0">
                    <h2 class="mb-3">Invoice</h2>
                    <h5>Resto Managemen System</h5>

                </div>
                <div class="col-12">
                    <hr />
                </div>
            </div>

            <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="light">
                        <tr class="bg-primary text-white dark__bg-1000">
                            <th class="border-0">Order</th>
                            <th class="border-0 text-center">Qty</th>
                            <th class="border-0 text-end">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $item->t_product_name }}</h6>
                                    <p class="mb-0">{{ $item->t_product_type }}</p>
                                </td>
                                <td class="align-middle text-center">{{ $item->quantity }}</td>
                                <td class="align-middle text-end">@currency(($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) * $item->quantity)</td>
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
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                        <tr>
                            <th class="text-900">Subtotal:</th>
                            <td class="fw-semi-bold">@currency($total)</td>
                        </tr>
                        <tr>
                            <th class="text-900">PPH 11%:</th>
                            <td class="fw-semi-bold">@currency(0)</td>
                        </tr>
                        <tr class="border-top border-top-2 fw-bolder text-900">
                            <th>Total Payment:</th>
                            <td>@currency($total)</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light">
            <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s
                anything
                else we can do, please let us know!</p>
        </div>
    </div>

</body>

</html>
