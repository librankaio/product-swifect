@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pembelian Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Pembelian Barang</a></div>
        </div>
    </div>
    <div class="section-body">
        <form action="" method="POST" id="thisform">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Header Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Trans</label>
                                        <input type="text" class="form-control" name="no" id="no" value="{{ $tpembelianh->no }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="dt" value="{{ date("Y-m-d", strtotime($tpembelianh->tdt)) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Cabang</label>
                                        <select class="form-control select2" name="cabang" id="cabang">
                                            <option selected>{{ $tpembelianh->cabang }}</option>
                                            @foreach($cabangs as $data => $cabang)
                                            <option>{{ $cabang->name." - ".$cabang->address }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control select2" name="code_cust" id="code_cust">
                                            <option selected>{{ $tpembelianh->supplier }}</option>
                                            @foreach($suppliers as $data => $supplier)
                                            <option>{{ $supplier->code." - ".$supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mata Uang</label>
                                        <select class="form-control select2" name="mata_uang" id="mata_uang">
                                            <option selected>{{ $tpembelianh->mata_uang }}</option>
                                            @foreach($matauangs as $data => $matauang)
                                            <option>{{ $matauang->code." - ".$matauang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomer Lainnya</label>
                                        <input type="text" class="form-control" name="nolain" value="{{ $tpembelianh->nolain }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Kurs</label>
                                        <input type="text" class="form-control" name="kurs" id="kurs" value="{{ number_format($tpembelianh->kurs) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" style="height:50px" name="note">{{ $tpembelianh->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card" style="border: 1px solid lightblue">
                        <div class="card-header">
                            <h4>Add Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <select class="form-control select2" id="kode">
                                            <option disabled selected>--Select Kode--</option>
                                            @foreach($items as $data => $item)
                                            <option value="{{ $item->code }}">{{ $item->code."-".$item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Item</label>
                                        <input type="text" class="form-control" id="nama_item" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <input type="text" class="form-control" id="hrgsatuan" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control" id="satuan" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount(%)</label>
                                        <input type="text" class="form-control" id="disc" value="0">
                                    </div>
                                    <div class="form-group">
                                        <a href="" id="addItem">
                                            <i class="fa fa-plus" style="font-size:18pt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control" id="quantity" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Subtotal</label>
                                        <input type="text" class="form-control" id="subtot" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" style="height:50px" id="note"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <input type="text" class="form-control" id="tax" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border border-5">No</th>
                                            <th scope="col" class="border border-5">Kode</th>
                                            <th scope="col" class="border border-5">Nama Item</th>
                                            <th scope="col" class="border border-5">Quantity</th>
                                            <th scope="col" class="border border-5">Satuan</th>
                                            <th scope="col" class="border border-5">Harga</th>
                                            <th scope="col" class="border border-5">Discount</th>
                                            <th scope="col" class="border border-5">Tax</th>
                                            <th scope="col" class="border border-5">Subtotal</th>
                                            <th scope="col" class="border border-5">Note</th>
                                            <th scope="col" class="border border-5">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 0; @endphp
                                        @for($i = 0; $i < sizeof($tpembeliands); $i++) @php $counter++; @endphp <tr>
                                            <th class="id-header border border-5" style='readonly:true;' headers="{{ $counter }}">{{ $counter }}</th>
                                            {{-- <td><input style='width:120px;' readonly class='kodeclass' name='id_d[]' type='text' value='{{ $tposhds[$i]->id }}'></td> --}}
                                            <td class="border border-5"><input style='width:120px;' readonly form='thisform' class='kodeclass form-control' name='kode_d[]' type='text' value='{{ $tpembeliands[$i]->code_mitem }}'></td>
                                            <td class="border border-5"><input style='width:120px;' readonly form='thisform' class='namaitemclass form-control' name='nama_item_d[]' type='text' value='{{ $tpembeliands[$i]->name_mitem }}'></td>
                                            <td class="border border-5"><input type='text' style='width:100px;' form='thisform' class='quantityclass form-control' name='quantity[]' value='{{ number_format($tpembeliands[$i]->qty) }}'></td>
                                            <td class="border border-5"><input type='text' readonly form='thisform' style='width:100px;' class='satuanclass form-control' value='{{ $tpembeliands[$i]->code_muom }}' name='satuan_d[]'></td>
                                            <td class="border border-5"><input type='text' readonly form='thisform' style='width:100px;' class='hargaclass form-control' value='{{ number_format($tpembeliands[$i]->price, 2, '.', ',') }}' name='harga_d[]'></td>
                                            <td class="border border-5"><input type='text' readonly form='thisform' style='width:100px;' class='discclass form-control' value='{{ number_format($tpembeliands[$i]->disc) }}' name='disc_d[]' id='disc_d{{ $counter }}'></td>
                                            <td class="border border-5"><input type='text' readonly form='thisform' style='width:100px;' class='taxclass form-control' value='{{ number_format($tpembeliands[$i]->tax) }}' name='tax_d[]' id='tax_d{{ $counter }}'></td>
                                            <td class="border border-5"><input type='text' readonly form='thisform' style='width:100px;' class='subtotclass form-control' value='{{ number_format($tpembeliands[$i]->subtotal, 2, '.', ',') }}' name='subtot_d[]' id='subtot_d{{ $counter }}'></td>
                                            <td class="border border-5"><input type='text' form='thisform' style='width:100px;' class='subtotclass form-control' value='{{ $tpembeliands[$i]->note }}' name='note_d[]'></td>
                                            <td class="border border-5"><button title='Delete' class='delete btn btn-primary' value="{{ $counter }}"><i style='font-size:15pt;color:#ffff;' class='fa fa-trash'></i></button></td>
                                            <td hidden><input style='width:120px;' readonly form='thisform' class='noclass form-control' name='no_d[]' type='text' value=''></td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 align-self-end">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Subtotal</label>
                                        <input type="text" class="form-control" name="subtotal_h" id="subtotal_h" form="thisform" value="{{ number_format($tpembelianh->subtotal, 2, '.', ',') }}"readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" name="price_disc" id="price_disc" form="thisform" value="{{ number_format($tpembelianh->disc, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <input type="text" class="form-control" name="price_tax" form="thisform" id="price_tax" value="{{ number_format($tpembelianh->tax, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" class="form-control" name="price_total" form="thisform" id="price_total" value="{{ number_format($tpembelianh->grdtotal, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" id="confirm" type="submit" formaction="/transbelibrg/{{ $tpembelianh->id }}">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@stop
@section('botscripts')
<script type="text/javascript">
    $(document).ready(function() {
        //CSRF TOKEN
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('.select2').select2({});

            $("#kode").on('select2:select', function(e) {
                var kode = $(this).val();
                $.ajax({
                    url: '{{ route('getmitem') }}',
                    method: 'post',
                    data: {
                        'kode': kode
                    }
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'
                    , success: function(response) {
                        // console.log(kode);
                        // console.log(response);
                        for (i = 0; i < response.length; i++) {
                            if (response[i].code == kode) {
                                // $("#hrgsatuan").val((Number(response[i].price2).toFixed(2)));
                                $("#nama_item").val(response[i].name)
                                hrg = Number(response[i].price2);
                                // console.log(thousands_separators($('#hrgsatuan').val()));
                                $("#satuan").val(response[i].code_muom)
                                // $("#subtot").val($("#hrgsatuan").val() * $('#quantity').val());
                                subtotal = Number(hrg).toFixed(2) * $('#quantity').val()
                                $("#subtot").val(thousands_separators(subtotal.toFixed(2)));
                                $("#hrgsatuan").val(thousands_separators(hrg.toFixed(2)));
                            }
                        }
                    }
                });
            });

            var counter = parseInt({{ $counter}}) +1;
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();
                if ($('#quantity').val() == 0) {
                    alert('Quantity tidak boleh 0');
                    return false;
                }

                no = $("#no").val();
                kode = $("#kode").val();
                nama = $("#nama").val();
                hrgsatuan = $("#hrgsatuan").val();
                discount = $("#disc").val();
                tax = $("#tax").val();
                nama_item = $("#nama_item").val();
                satuan = $("#satuan").val();
                quantity = $("#quantity").val();
                merk = $("#merk").val();
                subtot = $("#subtot").val();
                note = $("#note").val();


                tablerow = "<tr><th class='border border-5' style='readonly:true;'>" + counter + "</th><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='kodeclass form-control' name='kode_d[]' type='text' value='" + kode + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='namaitemclass form-control' name='nama_item_d[]' type='text' value='" + nama_item + "'></td><td class='border border-5'><input type='text' style='width:100px;' form='thisform' class='quantityclass form-control' name='quantity[]' value='" + quantity + "'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='satuanclass form-control' value='" + satuan + "' name='satuan_d[]'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='hargaclass form-control' value='" + hrgsatuan + "' name='harga_d[]'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='discclass form-control' value='" + discount + "' name='disc_d[]' id='disc_d_" + counter + "'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='taxclass form-control' value='" + tax + "' name='tax_d[]' id='tax_d_" + counter + "'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='subtotclass form-control' value='" + subtot + "' name='subtot_d[]' id='subtot_d_" + counter + "'></td><td class='border border-5'><input type='text' form='thisform' style='width:100px;' class='subtotclass form-control' value='" + note + "' name='note_d[]'></td><td class='border border-5'><a title='Delete' class='delete'><i style='font-size:15pt;color:#6777ef;' class='fa fa-trash'></i></a></td><td hidden><input style='width:120px;' readonly form='thisform' class='noclass form-control' name='no_d[]' type='text' value='" + no + "'></td></tr>";

                subtotparse = subtot.replaceAll(",", "");
                $("#datatable tbody").append(tablerow);
                if (counter == 1) {
                    disc = Number(subtotparse).toFixed(2) * ($("#disc").val() / 100);
                    tax = (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) * ($("#tax").val() / 100);
                    total =  (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2));
                    subtot = Number(subtotparse);

                    $("#subtotal_h").val(thousands_separators(subtot.toFixed(2)));
                    $("#price_disc").val(thousands_separators(disc.toFixed(2)));
                    $("#price_tax").val(thousands_separators(tax.toFixed(2)));
                    $("#price_total").val(thousands_separators(total.toFixed(2)));

                    // disc = subtotparse * ($("#disc").val() / 100);
                    // tax = (subtotparse - disc) * ($("#tax").val() / 100);
                    // total = (subtotparse - disc) + parseFloat(tax);


                    // $("#price_disc").val(thousands_separators(disc));
                    // $("#price_tax").val(thousands_separators(tax));
                    // $("#price_total").val(thousands_separators(total));


                    $("#nama_item").val('');
                    $('#tax').val(0);
                    $('#disc').val(0);
                    $('#hrgsatuan').val(0);
                    $('#quantity').val(0);
                    console.log("Disc : " + disc.toFixed(2), "Tax : " + tax, "Total : " + total);
                } else {
                    disc_old = $("#price_disc").val().replaceAll(",", "");
                    tax_old = $("#price_tax").val().replaceAll(",", "");
                    total_old = $("#price_total").val().replaceAll(",", "");
                    subtot_old = $("#subtotal_h").val().replaceAll(",", "");
                    thisdisc = $("#disc").val();
                    thistax = $("#tax").val()
                    console.log("Subtot old pada header : "+subtot_old);
                    disc = Number(subtotparse).toFixed(2) * (Number(thisdisc).toFixed(2) / 100);
                    tax = (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) * (Number(thistax).toFixed(2) / 100);
                    total =  (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2));
                    
                    subtot_new = Number(Number(subtotparse).toFixed(2)) + Number(Number(subtot_old).toFixed(2));
                    console.log("Subtot lama : "+Number(subtotparse).toFixed(2))
                    disc_new = Number(Number(disc_old).toFixed(2)) + Number(disc.toFixed(2));
                    tax_new = Number(Number(tax_old).toFixed(2)) + Number(tax.toFixed(2));
                    total_new = Number(Number(total_old).toFixed(2)) + Number(total.toFixed(2));
                    console.log("Subtot lama+baru : "+subtot_new.toFixed(2))

                    // $("#subtotal_h").val(thousands_separators(Number(subtot_new)));
                    // $("#price_disc").val(thousands_separators(Number(disc_new)));
                    // $("#price_tax").val(thousands_separators(Number(tax_new)));
                    // $("#price_total").val(thousands_separators(Number(total_new)));

                    $("#subtotal_h").val(thousands_separators(subtot_new.toFixed(2)));
                    $("#price_disc").val(thousands_separators(disc_new.toFixed(2)));
                    $("#price_tax").val(thousands_separators(tax_new.toFixed(2)));
                    $("#price_total").val(thousands_separators(total_new.toFixed(2)));


                    $("#nama_item").val('');
                    $('#tax').val(0);
                    $('#disc').val(0);


                    // disc = subtotparse * (parseFloat($("#disc").val()) / 100);
                    // tax = (subtotparse - disc) * (parseFloat($("#tax").val()) / 100);
                    // total = (subtotparse - disc) + tax;
                    // disc_new = disc_old + disc;
                    // tax_new = tax_old + tax;
                    // subtot_new = subtot_old + total;
                    // $("#price_disc").val(thousands_separators(disc_new));
                    // $("#price_tax").val(thousands_separators(tax_new));
                    // $("#price_total").val(thousands_separators(subtot_new));
                    // $("#nama_item").val('');
                    // $('#tax').val(0);
                    // $('#disc').val(0);
                    console.log("Disc : " + disc_new, "Tax : " + tax_new, "Total : " + subtot_new);
                }
                counter++;
                $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#nama").val('');
                $("#hrgsatuan").val(0);
                $("#satuan").val('');
                $("#quantity").val(0);
                $("#merk").val('');
                $("#subtot").val('');
                $("#note").val('');
            });

            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                counter_id = $(this).val();
                var r = confirm("Delete Transaksi ?");
                if (r == true) {
                    if(counter_id != 0){
                        // counter_id = $(this).closest('tr').text();
                        console.log(counter_id);
                        subtot = $("#subtot_d" + counter_id).val().replaceAll(",", "");
                        // console.log(subtot.toFixed(2));

                        price_tax = $("#price_tax").val().replaceAll(",", "");
                        price_disc = $("#price_disc").val().replaceAll(",", "");
                        price_total = $("#price_total").val().replaceAll(",", "");
                        subtotal_h = $("#subtotal_h").val().replaceAll(",", "");

                        console.log("tax : "+ price_tax,"price : "+price_disc,"total : "+price_total);
                        disc_d = $("#disc_d" + counter_id).val()
                        tax_d = $("#tax_d" + counter_id).val()

                        disc = Number(subtot).toFixed(2) * (Number(disc_d).toFixed(2) / 100);
                        tax = (Number(subtot).toFixed(2) - Number(disc).toFixed(2)) * (Number(tax_d).toFixed(2) / 100);
                        total = (Number(subtot).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2))

                        subtotal = Number(subtotal_h).toFixed(2) - Number(subtot).toFixed(2);
                        totaltax = Number(price_tax).toFixed(2) - Number(tax).toFixed(2);
                        totaldisc = Number(price_disc).toFixed(2) - Number(disc).toFixed(2);
                        totalfinal = Number(price_total).toFixed(2) - Number(total).toFixed(2);

                        // totaltax = price_tax - tax;
                        // totaldisc = price_disc - disc;
                        // totalwithdisc = (subtot) - disc;
                        // total = price_total - (totalwithdisc + tax);
                        console.log("disc delete :" + totaldisc, "tax del : " + totaltax, "total del :" + total);

                        $("#subtotal_h").val(thousands_separators(subtotal.toFixed(2)));
                        $("#price_disc").val(thousands_separators(totaldisc.toFixed(2)));
                        $("#price_tax").val(thousands_separators(totaltax.toFixed(2)));
                        $("#price_total").val(thousands_separators(totalfinal.toFixed(2)));
                        $(this).closest('tr').remove();

                        counter_id = 0;
                    }else{
                        counter_id = $(this).closest('tr').text();
                        console.log(counter_id);
                        subtot = $("#subtot_d_" + counter_id).val().replaceAll(",", "");

                        price_tax = $("#price_tax").val().replaceAll(",", "");
                        price_disc = $("#price_disc").val().replaceAll(",", "");
                        price_total = $("#price_total").val().replaceAll(",", "");
                        subtotal_h = $("#subtotal_h").val().replaceAll(",", "");
                        

                        disc_d = $("#disc_d_" + counter_id).val()
                        tax_d = $("#tax_d_" + counter_id).val()
                        
                        disc = Number(subtot).toFixed(2) * (Number(disc_d).toFixed(2) / 100);
                        tax = (Number(subtot).toFixed(2) - Number(disc).toFixed(2)) * (Number(tax_d).toFixed(2) / 100);
                        total = (Number(subtot).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2))
                        console.log("tax : "+ tax,"price : "+disc,"total : "+total);
                        
                        console.log("subtot lama : "+ Number(subtot).toFixed(2))
                        console.log("subtot baru : "+ Number(subtotal_h).toFixed(2))
                        subtotal = Number(subtotal_h).toFixed(2) - Number(subtot).toFixed(2);
                        totaltax = Number(price_tax).toFixed(2) - Number(tax).toFixed(2);
                        totaldisc = Number(price_disc).toFixed(2) - Number(disc).toFixed(2);
                        totalfinal = Number(price_total).toFixed(2) - Number(total).toFixed(2);
                        console.log("Hasil : "+(Number(subtotal_h) - Number(subtot)) );
                        $("#subtotal_h").val(thousands_separators(subtotal.toFixed(2)));
                        $("#price_disc").val(thousands_separators(totaldisc.toFixed(2)));
                        $("#price_tax").val(thousands_separators(totaltax.toFixed(2)));
                        $("#price_total").val(thousands_separators(totalfinal.toFixed(2)));
                        $(this).closest('tr').remove();

                        // counter_id = $(this).closest('tr').text();
                        // console.log(counter_id);
                        // subtot = parseFloat($("#subtot_d_" + counter_id).val().replace(/,/g, ''));

                        // price_tax = parseFloat($("#price_tax").val().replace(/,/g, ''))
                        // price_disc = parseFloat($("#price_disc").val().replace(/,/g, ''))
                        // price_total = parseFloat($("#price_total").val().replace(/,/g, ''))
                        // disc = subtot * ($("#disc_d_" + counter_id).val() / 100);
                        // tax = (subtot - disc) * ($("#tax_d_" + counter_id).val() / 100);
                        // console.log(price_tax, price_disc, price_total);
                        // totaltax = price_tax - tax;
                        // totaldisc = price_disc - disc;
                        // totalwithdisc = (subtot) - disc;
                        // total = price_total - (totalwithdisc + tax);
                        // console.log("disc delete :" + totaldisc, "tax del : " + totaltax, "total del :" + total);

                        // $("#price_disc").val(thousands_separators(totaldisc));
                        // $("#price_tax").val(thousands_separators(totaltax));
                        // $("#price_total").val(thousands_separators(total));
                        // $(this).closest('tr').remove();
                    }                    
                } else {
                    return false;
                }
            });

            $(document).on("change", "#disc", function(e) {
                if ($('#disc').val() == '') {
                    $('#disc').val(0);
                }
            });

            $(document).on("change", "#tax", function(e) {
                if ($('#tax').val() == '') {
                    $('#tax').val(0);
                }
            });

            $(document).on("change", "#quantity", function(e) {
                if ($('#quantity').val() == '') {
                    $('#quantity').val(0);
                }
                hrgparse = $('#hrgsatuan').val();
                if (/\D/g.test(hrgparse)) {
                    // Filter non-digits from input value.
                    hrgparse = hrgparse.replace(/\D/g, '');
                }
                var hrg = Number(hrgparse).toFixed(2);
                var qty = Number($("#quantity").val()).toFixed(2);
                var total = Number(hrg) * Number(qty);
                // console.log(hrg);    
                $("#subtot").val(thousands_separators(total.toFixed(2)));        
            });

            $(document).on("change", "#kurs", function(e) {
                if($('#kurs').val() == ''){
                    $('#kurs').val(1);
                }
                $(this).val(thousands_separators($(this).val()));
            });

            $(document).on("change", "#hrgsatuan", function(e) {
                if ($('#hrgsatuan').val() == '') {
                    $('#hrgsatuan').val(0);
                }
                $(this).val(thousands_separators($(this).val()));
                hrgparse = $('#hrgsatuan').val();
                if (/\D/g.test(hrgparse)) {
                    // Filter non-digits from input value.
                    hrgparse = hrgparse.replace(/\D/g, '');
                }
                var hrg = Number(hrgparse).toFixed(2);
                var qty = Number($("#quantity").val()).toFixed(2);
                var total = Number(hrg) * Number(qty);
                console.log(total);

                $("#subtot").val(thousands_separators(total));
            });

            $(document).on("click", "#hrgsatuan", function(e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });

            $(document).on("click", "#kurs", function(e) {
                if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
                }
            });
        });
        // VALIDATE TRIGGER
        $("#quantity").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#hrgsatuan").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#kurs").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }            
        });
        $("#disc").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
            if(this.value >= 99){
                this.value = 99;
            }
        });
        $("#tax").keyup(function(e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
            if(this.value >= 99){
                this.value = 99;
            }
        });    

        $(document).on("click", "#confirm", function(e) {
            // Validate ifnull
            no = $("#no").val();
            if (no == "") {
                alert("No Tidak boleh kosong!");
                return false;
            }
        });

    })

</script>
@endsection
