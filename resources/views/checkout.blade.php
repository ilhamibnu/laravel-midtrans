<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Bootstrap</h1>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Durian</h5>

                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $order->name }}</td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td>{{ $order->qty }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>{{ $order->total_price }}</td>
                        </table>
                        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        // alert("payment success!");

                        window.location.href = "/invoice/{{ $order->id }}";
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
</body>

</html>
