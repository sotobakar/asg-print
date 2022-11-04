<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice Pesanan {{ $order->id_pembelian}}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src={{ url('assets/images/logo.jpg')}} alt="" width="150"/></td>
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

  <table width="100%">
    <tr>
        <td><strong>Nama Pembeli:</strong> 
            <br>
            {{ $order->user->nama }}</td>
            <td><strong>Nomor Pesanan:</strong> 
                <br>
                #{{ $order->id_pembelian }}</td>
    </tr>
    <tr>
        <td><strong>Nomor Telepon:</strong> 
            <br>
            {{ $order->user->telepon}}</td>
            <td><strong>Tanggal Pembelian:</strong> 
                <br>
                {{ \Carbon\Carbon::parse(strtotime($order->tanggal_pembelian))->format('d F Y'); }}</td>
    </tr>
    <tr>
        <td><strong>Metode Pembayaran:</strong> 
            <br>
            {{ $order->payment->bank }}</td>
            <td><strong>Alamat Tujuan:</strong> 
                <br>
                {{ $order->alamat_pengiriman }}</td>
    </tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Jumlah</th>
        <th>Harga Satuan (Rp)</th>
        <th>Harga Total (Rp)</th>
      </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($order->items as $item)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $item->sku->product->nama_produk . ' (' . ucfirst($item->sku->warna) . ', ' . $item->sku->ukuran . ')'}}</td>
          <td>{{ ucwords($item->sku->product->category->nama_kategori) }}</td>
          <td align="right">{{ $item->jumlah }}</td>
          <td align="right">{{ number_format($item->harga, 0, ',', '.') }}</td>
          <td align="right">{{ number_format($item->subharga, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td align="right">Subtotal</td>
            <td align="right">{{ number_format($order->total_pembelian -
                $order->ongkir->tarif, 0, ',', '.')}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right">Ongkir</td>
            <td align="right">{{ number_format($order->ongkir->tarif, 0, ',', '.')}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right">Total</td>
            <td align="right" class="gray">{{ number_format($order->total_pembelian, 0, ',', '.')}}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>