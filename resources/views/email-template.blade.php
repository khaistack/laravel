<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <title>Chào mừng bạn đã đến với Khải.</title>
                <p>Chào mừng bạn đã đến với Khải</p>
                <p>Name của bạn là: {{ $test->name }}</p>
                <p>Password của bạn là: {{ $test->password }}</p>
                <p>Email của bạn là: {{ $test->email }}</p>
                <br />
                <p>Bạn có thể đổi mật khẩu tại đây: chưa cho đổi đâu hi</p>
            </div>
        </div>
    </div>
</body>

</html>
