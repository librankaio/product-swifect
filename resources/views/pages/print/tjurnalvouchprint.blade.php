<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Jurnal Voucher</title>
</head>
<body class="idr" onload="window.print()">

<div style="margin-left: 0%; margin-right: 0%;">
<h2>Journal Voucher</h2>
<h5>NO Voucher : {{ $tjurnalvouchh->no }}<br>
TANGGAL : {{ date("d/m/Y", strtotime($tjurnalvouchh->tdt)) }}<br>
KETERANGAN : {{ $tjurnalvouchh->ketenrangan }} <br> 
MATA UANG : {{ $tjurnalvouchh->mata_uang }}</h5>
<center>
<table id="mytable" border="1px" cellspacing="0">
    <tr>
        <td align="center" style="width: 150px; word-wrap: break-word;">No</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Kode</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Nama</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Debit</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Credit</td>
        <td align="center" style="width: 150px; word-wrap: break-word;">Memo/Catatan</td>
    </tr>                      
    <?php
    $no = 0;
    ?>
    @foreach($tjurnalvouchds as $tjurnalvouchd)
    @php $no++ @endphp
    <tr>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $no }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tjurnalvouchd->kode }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tjurnalvouchd->nama }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tjurnalvouchd->debit, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ number_format( $tjurnalvouchd->credit, 2, '.', ',') }}</div></td>
        <td><div align="center" style="width: 150px; word-wrap: break-word;">{{ $tjurnalvouchd->memo }}</div></td>
    </tr>
    @endforeach
    <td align="center" colspan="3">Total Debit :</td>
    <td align="center" colspan="3">Total Credit :</td>
    <td align="center" colspan="3">Grand Balance : </td>
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


