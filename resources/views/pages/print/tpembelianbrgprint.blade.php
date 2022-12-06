<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Pembayaran Operasional</title>
</head>
<body class="idr" onload="window.print()">

<div style="margin-left: 0%; margin-right: 0%;">
<h2>POINT OF SALES</h2>
<h5>NO TRANSAKSI : {{ $tposh->no }}<br>
TANGGAL : {{ date("d/m/Y", strtotime($tposh->tdt)) }}<br>
CUSTOMER : {{ $tposh->code_mcust }} <br> 
PAYMENT METHOD : {{ $tposh->pay_method }} <br>
NOTE : {{ $tposh->note }}</h5>
<center>
<table id="mytable" border="1px" cellspacing="0">
    <tr>
        <td align="center" style="width: 150px; word-wrap: break-word;">No</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Kode</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Quantity</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Satuan</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Harga</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Discount</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Tax</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Subtotal</td>
    </tr>                      
    <?php
    $no = 0;
    ?>
    @foreach($tposhds as $tposhd)
    @php $no++ @endphp
    <tr>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $no }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tposhd->code_mitem }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tposhd->qty, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tposhd->code_muom }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tposhd->price, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tposhd->disc, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tposhd->tax, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tposhd->subtotal, 2, '.', ',') }}</div></td>
    </tr>
    @endforeach
    <td align="center" colspan="3">Total Disc : {{ number_format( $tposh->disc, 2, '.', ',') }}</td>
    <td align="center" colspan="3">Total Tax : {{ number_format( $tposh->tax, 2, '.', ',') }}</td>
    <td align="center" colspan="3">Grand Total : {{ number_format( $tposh->grdtotal, 2, '.', ',') }}</td>
    </table>
</center>
<br><br>
<p>
	<footer><a href="http://www.swifect.com">~ Swifect Custom Application ~</a></footer>
</div>
</body>
</html>

<style type="text/css" media="print">
  @page { size: landscape; margin: 0px auto; }
</style>


