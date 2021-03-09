<?php
if (isset($_POST["nomor"]) && isset($_POST['sender']) && isset($_POST["pesan"])) {
    $nomor = $_POST["nomor"];
    $sender = $_POST["sender"];
    $pesan = $_POST["pesan"];
    $data = [
        "sender" => $sender,
        "nomor" => $nomor,
        "pesan" => $pesan
    ];
    $data_string = json_encode($data);
    $url = "https://venturo-whatsapp.herokuapp.com/kirim-pesan";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $start_time = time();
    $res = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($res);
    $end_time = time();
    $hasil = $end_time - $start_time;
    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>WhatsApp API</title>
    <style>
        .noselect {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Old versions of Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
        }
    </style>
</head>

<body>
    <div class="container row mt-5">
        <div class="col-md-6 mb-5">
            <form method="post">
                <div class="form-floating mt-3">
                    <label for="nomor">Nomor Tujuan</label>
                    <input name="nomor" class="form-control" placeholder="08xxxxxxxxxx" id="nomor" />
                </div>
                <div class="form-floating">
                    <label for="floatingTextarea2">Pesan</label>
                    <textarea name="pesan" class="form-control" placeholder="Masukkan pesan disini" id="floatingTextarea2" style="height: 400px" autofocus></textarea>
                </div>
                <div class="form-floating mt-3">
                    <label for="sender">Sender</label>
                    <input name="sender" class="form-control" placeholder="Masukkan ID" id="sender" value="<?= isset($_POST['sender']) ? $_POST['sender'] : ""; ?>" />
                    <small class="text-muted">Sender harus sesuai dengan ID di https://venturo-whatsapp.herokuapp.com/</small>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Kirim Pesan</button>
            </form>
        </div>
        <div class="col-md-6 mb-5">
            <?php
            if (isset($result)) {
            ?>
                <label>Berhasil dieksekusi dalam <?= $hasil; ?> detik.</label>
                <ul class="list-group" style="max-height: 400px;overflow-y: scroll;">
                    <li class="list-group-item <?= $result->status == true ? '' : 'bg-danger text-white' ?>">
                        (<?= $_POST['nomor']; ?>)
                        <i class="fas <?= $result->status == true ? 'fa-check' : 'fa-times' ?> ml-2 noselect"></i>
                        <br>
                        <?= $result->hasil->body; ?>
                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>