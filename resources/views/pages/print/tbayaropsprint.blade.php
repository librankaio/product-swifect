<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Pembayaran Operasional</title>
</head>
<body class="idr" onload="window.print()">

<div style="margin-left: 0%; margin-right: 0%;">
<h2>PEMBAYARAN OPERASIONAL</h2>
<h5>NO TRANSAKSI : {{ $tbayaropsh->no }}<br>
TANGGAL : {{ date("d/m/Y", strtotime($tbayaropsh->tdt)) }}<br>
JENIS : {{ $tbayaropsh->jenis }} <br> 
REF.NO : {{ $tbayaropsh->noref }} <br>
AKUN PEMBAYARAN : {{ $tbayaropsh->akun_pembayaran }}</h5>
<center>
<table id="mytable" border="1px" cellspacing="0">
    <tr>
        <td align="center" style="width: 150px; word-wrap: break-word;">No</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Deskripsi</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Total</td>
    </tr>                      
    <?php
    $no = 0;
    ?>
    @foreach($tbayaropsds as $tbayaropsd)
    @php $no++ @endphp
    <tr>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $no }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tbayaropsd->note }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tbayaropsd->total, 2, '.', ',') }}</div></td>
    </tr>
    @endforeach
    <td align="center" colspan="4">Grand Total : {{ number_format( $tbayaropsh->grdtotal, 2, '.', ',') }}</td>
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


