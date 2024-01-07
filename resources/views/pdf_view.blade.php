<!DOCTYPE html>
<html>
<head>
    <title>PDF View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .headerText {
            display: flex;
        }
        .telp {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="headerText">
            <h2>SMK Wikrama Bogor</h3>
            <hr>
            <p class="fs-4">Teknologi Informasi dan Komunikasi</p>
        </div>
        <div class="telp">
            <p class="fs-4">Jl. Raya Wangun Kel Sindangsari Bogor</p>
            <p class="fs-4">Telp/Faks.: (0251) 8242411</p>
            <p class="fs-4">e-mail: prohumasi@smkwikrama.sch.id</p>
            <p class="fs-4">website : www.smkwikrama.sch.id/p>
        </div>
    </div>
    <hr>
    
    <p>{{ $letter->letter_perihal }}</p>
</body>
</html>
