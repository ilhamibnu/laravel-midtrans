<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                        <p class="card-text">Durian WKWKWK</p>
                        <form action="/checkout" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Berapa Yang Mau
                                    Dipesan?</label>
                                <input type="text" name="qty" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
</body>

</html>
