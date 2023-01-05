<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Pembayaran Operasional</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/printstyle.css') }}">
</head>
<body class="idr" onload="window.print()">
    <div class="row">
        <div class="column-3" style="background-color:#aaa;">
            <h5>PELANGGAN : {{ $tposh->code_mcust }}<br>
            TELEPON : {{ date("d/m/Y", strtotime($tposh->tdt)) }}<br>
            ALAMAT : {{ $tposh->pay_method }}</h5>
        </div>
        <div class="column-3" style="background-color:#bbb; text-align: center;">
            <h2>POINT OF SALES</h2>
            <h5>NO TRANSAKSI : {{ $tposh->no }}<br>
            TANGGAL : {{ date("d/m/Y", strtotime($tposh->tdt)) }}<br>
            CUSTOMER : {{ $tposh->code_mcust }} <br> 
            PAYMENT METHOD : {{ $tposh->pay_method }} <br>
            NOTE : {{ $tposh->note }}</h5>
        </div>
        <div class="column-3" style="background-color:#bbb; text-align: right;">
            <h2>INVOICE</h2>
            <h5>NO INVOICE : {{ $tposh->no }}<br>
            SALES : {{ $tposh->code_mcust }} <br> 
            TGL TRANSAKSI : {{ date("d/m/Y", strtotime($tposh->tdt)) }}<br></h5>
        </div>
      </div>
<div style="margin-left: 0%; margin-right: 0%;">
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
<br>
<hr style="border: 1px dashed black;" />
<div class="row">
    <div class="column-3" style="background-color:#bbb; text-align: left;">
        <h5>PEMBAYARAN #1 : {{ $tposh->code_mcust }}<br>
            SISA : {{ date("d/m/Y", strtotime($tposh->tdt)) }}<br>
            ALAMAT : {{ $tposh->pay_method }}</h5>
    </div>
    <div class="column-3" style="background-color:#bbb; text-align: center;">
        <h5>TOTAL QTY : {{ $tposh->code_mcust }}</h5>
    </div>
    <div class="column-3" style="background-color:#bbb; text-align: right;">
        <h5>TOTAL QTY #1 : {{ $tposh->code_mcust }} <br>
            DISKON : {{ $tposh->code_mcust }} <br>
            CHARGE : {{ $tposh->code_mcust }}</h5>
        <h4>GRAND TOTAL : </h4>
    </div>
</div>
<br>
<div class="row">
    <div class="column">
        <div class="column" style="text-align: center;">
            <div class="box"></div>
            <h5>HORMAT KAMI</h5>
        </div>
        <div class="column" style="text-align: center;">
            <div class="box"></div>
            <h5>TTD</h5>
        </div>
    </div>
    <div class="column">
        <div class="column" style="text-align: left;">
            <h5>CATATAN :</h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="column"></div>
    <div class="column" style="text-align: right;">Page 1 Of 1</div>
</div>
<p>
	<footer><a href="http://www.swifect.com">~ Swifect Custom Application ~</a></footer>
</div>
</body>
</html>

<style type="text/css" media="print">
  @page { size: landscape; margin: 0px auto; }
</style>


