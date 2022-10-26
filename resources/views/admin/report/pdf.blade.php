<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pembelian</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        
        .statistics {
            font-size: small;
        }

        .statistics tbody tr {
            font-size: small;
        }
 
        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>
    <table width="100%">
        <tr>
            <td valign="top">
                <img src="{{ url('assets/images/logo.jpg') }}" alt="" width="150" /></td>
            <td align="right">
                <h3>Toko Apparel Sablon ASG Print</h3>
                <pre>
                ARYOBENNO PUTRA CHANIAGO
                Jl. Jati Bening II No. 28,  RT.002/RW.002
                Jatibening Baru, Kec. Pd. Gede, Kota Bekasi
                Jawa Barat, 17412
                0821-1121-4572
            </pre>
            </td>
        </tr>

    </table>
    <h2>
        Laporan Pembelian
    </h2>
    <h4>{{ $start }} - {{ $end }}</h4>

    <h5 align="center">Produk Ready Stock</h5>
    <table width="100%" class="statistics">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Nama Statistik</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($statistics as $key => $value)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $key }}</td>
                <td align="right">{{ $value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <h5 align="center">Produk Custom</h5>
    <table width="100%" class="statistics">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Nama Statistik</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($other_statistics as $key => $value)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $key }}</td>
                <td align="right">{{ $value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>