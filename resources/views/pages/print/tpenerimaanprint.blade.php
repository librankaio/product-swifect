<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Penerimaan Barang</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/printstyle.css') }}">
</head>
<body class="idr" onload="window.print()">
<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Pembelian Barang</h2>
    <h5>NO TRANSAKSI : {{ $tpenerimaanh->no }}<br>
    TANGGAL : {{ date("d/m/Y", strtotime($tpenerimaanh->tdt)) }}<br>
    SUPPLIER : {{ $tpenerimaanh->supplier }} <br> 
    MATA UANG : {{ $tpenerimaanh->mata_uang }} <br> 
    NOMER LAINNYA : {{ $tpenerimaanh->nolain }} <br>
    NOTE : {{ $tpenerimaanh->note }}</h5>
  </div>
  <div class="column" style="background-color:#bbb; text-align: right;">
    <h2>Pembelian Barang</h2>
    <h5>NO TRANSAKSI : {{ $tpenerimaanh->no }}<br>
    TANGGAL : {{ date("d/m/Y", strtotime($tpenerimaanh->tdt)) }}<br>
    SUPPLIER : {{ $tpenerimaanh->supplier }} <br> 
    MATA UANG : {{ $tpenerimaanh->mata_uang }} <br> 
    NOMER LAINNYA : {{ $tpenerimaanh->nolain }} <br>
    NOTE : {{ $tpenerimaanh->note }}</h5>
  </div>
</div>
<hr>
<div class="row">
    <div class="column">
        <h5>TANGGAL TRANSAKSI: {{ date("d/m/Y", strtotime($tpenerimaanh->tdt)) }}<br>
            TANGGAL JATUH TEMPO: {{ date("d/m/Y", strtotime($tpenerimaanh->tdt)) }}</h5>
    </div>
    <div class="column">
        <h5>PHONE : {{ $msupps->phone }}<br>
            SUPPLIER : {{ $tpenerimaanh->supplier }}</h5>
    </div>
</div>
<div style="margin-left: 0%; margin-right: 0%;">
<center>
<table id="mytable" border="1px" cellspacing="0">
    <tr>
        <td align="center" style="width: 150px; word-wrap: break-word;">No</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Kode</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Nama Item</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Quantity</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Satuan</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Harga</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Discount</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Tax</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Subtotal</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Note</td>
    </tr>                      
    <?php
    $no = 0;
    ?>
    @foreach($tpenerimaands as $tpenerimaand)
    @php $no++ @endphp
    <tr>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $no }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tpenerimaand->code_mitem }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tpenerimaand->name_mitem }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tpenerimaand->qty, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tpenerimaand->code_muom }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tpenerimaand->price, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tpenerimaand->disc, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tpenerimaand->tax, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tpenerimaand->subtotal, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tpenerimaand->note }}</div></td>
    </tr>
    @endforeach
    <td align="center" colspan="3">Total Disc : {{ number_format( $tpenerimaanh->disc, 2, '.', ',') }}</td>
    <td align="center" colspan="3">Total Tax : {{ number_format( $tpenerimaanh->tax, 2, '.', ',') }}</td>
    <td align="center" colspan="4">Grand Total : {{ number_format( $tpenerimaanh->grdtotal, 2, '.', ',') }}</td>
    </table>
</center>
<br>
<hr style="border: 1px dashed black;" />
<h5>NOTE : {{ $tpenerimaanh->note }}</h5>
<br>
<div class="row">
    <div class="column">
        <div class="column" style="text-align: center;">
            <div class="box"></div>
            <H5>HORMAT KAMI</H5>
        </div>
        <div class="column" style="text-align: center;">
            <div class="box"></div>
            <H5>TTD</H5>
        </div>
    </div>
</div>
<p>
	<footer><a href="http://www.swifect.com">~ Swifect Custom Application ~</a></footer>
</div>
</body>
</html>

<style type="text/css" media="print">
  @page { size: landscape; margin: 0px auto; }
</style>


