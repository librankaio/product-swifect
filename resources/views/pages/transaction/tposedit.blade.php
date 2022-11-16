@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Transaction</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">POS EDIT</a></div>
        </div>
    </div>
    <div class="section-body">
        <form action="" method="POST" id="thisform">
            @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>POS EDIT</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Trans</label>
                                    <input type="text" class="form-control" name="no" id="no" value="{{ $tposh->no }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="dt" id="dt" value="{{ date("Y-m-d", strtotime($tposh->tdt)) }}">
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select class="form-control select2" name="code_cust">
                                        <option selected>{{ $tposh->code_mcust }}</option>
                                        @foreach($customers as $data => $customer)
                                        <option>{{ $customer->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" style="height:50px" name="note">{{ $tposh->note }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount(%)</label>
                                    <input type="text" class="form-control" id="disc" value="0">
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
                                        <option>{{ $item->code }}</option>
                                        @endforeach
                                    </select>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Transaksi</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Tax</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0; @endphp
                                    @for($i = 0; $i < sizeof($tposhds); $i++)
                                    @php $counter++; @endphp
                                    <tr>
                                        <th class="id-header" style='readonly:true;' headers="{{ $counter }}">{{ $counter }}</th>
                                        <td><input style='width:120px;' readonly class='noclass form-control' name='no_d[]' type='text' value='{{ $tposhds[$i]->no_tposh }}'></td>
                                        {{-- <td><input style='width:120px;' readonly class='kodeclass' name='id_d[]' type='text' value='{{ $tposhds[$i]->id }}'></td> --}}
                                        <td><input style='width:120px;' readonly class='kodeclass form-control' name='kode_d[]' type='text' value='{{ $tposhds[$i]->code_mitem }}'></td>
                                        <td><input style='width:120px;' readonly class='quantityclass form-control' name='quantity[]' type='text' value='{{ number_format( $tposhds[$i]->qty, 2, '.', ',') }}'></td>
                                        <td><input style='width:120px;' readonly class='satuanclass form-control' name='satuan_d[]' type='text' value='{{ $tposhds[$i]->code_muom }}'></td>
                                        <td><input style='width:120px;' readonly class='hargaclass form-control' name='harga_d[]' type='text' value='{{ number_format( $tposhds[$i]->price, 2, '.', ',') }}'></td>
                                        <td><input style='width:120px;' readonly class='discclass form-control' name='disc_d[]' id='disc_d_{{ $counter }}' type='text' value='{{ number_format( $tposhds[$i]->disc, 2, '.', ',') }}'></td>
                                        <td><input style='width:120px;' readonly class='taxclass form-control' name='tax_d[]' id='tax_d_{{ $counter }}' type='text' value='{{ number_format( $tposhds[$i]->tax, 2, '.', ',') }}'></td>
                                        <td><input style='width:120px;' readonly class='subtotclass form-control' name='subtot_d[]' id='subtot_d_{{ $counter }}' type='text' value='{{ number_format( $tposhds[$i]->subtotal, 2, '.', ',') }}'></td>
                                        <td><input style='width:120px;' readonly class='noteclass form-control' name='note_d[]' type='text' value='{{ $tposhds[$i]->note }}'></td>
                                        <td><button title='Delete' class='delete btn btn-primary' value="{{ $counter }}"><i style='font-size:15pt;color:#ffff;' class='fa fa-trash'></i></button></td>
                                    </tr>
                                    @endfor
                                </tbody>                            
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 align-self-end">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" class="form-control" name="price_disc" id="price_disc" form="thisform" value="{{ number_format($tposh->disc, 2, '.', ',') }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tax</label>
                                    <input type="text" class="form-control" name="price_tax" form="thisform" id="price_tax" value="{{ number_format($tposh->tax, 2, '.', ',') }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" name="price_total" form="thisform" id="price_total" value="{{ number_format($tposh->grdtotal, 2, '.', ',') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" id="confirm" type="submit" formaction="/transpos/{{ $tposh->id }}">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
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
                    data: {'kode': kode}, 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    dataType: 'json', 
                    success: function(response) {
                        // console.log(kode);
                        // console.log(response);
                        for (i=0; i < response.length; i++) {
                            if(response[i].code == kode){
                                $("#hrgsatuan").val(parseInt(response[i].price2))
                                $("#satuan").val(response[i].code_muom)
                                $("#subtot").val($("#hrgsatuan").val() * $('#quantity').val());
                            }
                        }
                    }
                });
            });

            var counter = parseInt({{ $counter}}) +1;
            // console.log(counter);
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();
                // alert("test")
                no = $("#no").val();
                kode = $("#kode").val();
                nama = $("#nama").val();
                hrgsatuan = $("#hrgsatuan").val();
                discount = $("#disc").val();
                tax = $("#tax").val();
                satuan = $("#satuan").val();
                quantity = $("#quantity").val();
                merk = $("#merk").val();
                subtot = $("#subtot").val();
                note = $("#note").val();
                tablerow = "<tr><th style='readonly:true;'>" + counter + "</th><td><input style='width:120px;' readonly form='thisform' class='noclass form-control' name='no_d[]' type='text' value='" + no + "'></td><td><input style='width:120px;' readonly form='thisform' class='kodeclass form-control' name='kode_d[]' type='text' value='" + kode + "'></td><td><input type='text' style='width:100px;' form='thisform' class='quantityclass form-control' name='quantity[]' value='" + quantity + "'></td><td><input type='text' readonly form='thisform' style='width:100px;' class='satuanclass form-control' value='" + satuan + "' name='satuan_d[]'></td><td><input type='text' readonly form='thisform' style='width:100px;' class='hargaclass form-control' value='" + hrgsatuan + "' name='harga_d[]'></td><td><input type='text' readonly form='thisform' style='width:100px;' class='discclass form-control' value='" + discount + "' name='disc_d[]' id='disc_d_"+counter+"'></td><td><input type='text' readonly form='thisform' style='width:100px;' class='taxclass form-control' value='" + tax + "' name='tax_d[]' id='tax_d_"+counter+"'></td><td><input type='text' readonly form='thisform' style='width:100px;' class='subtotclass form-control' value='" + subtot + "' name='subtot_d[]' id='subtot_d_"+counter+"'></td><td><input type='text' form='thisform' style='width:100px;' class='subtotclass form-control' value='" + note + "' name='note_d[]'></td><td><button title='Delete' class='delete btn btn-primary' value="+counter+"><i style='font-size:15pt;color:#fff;' class='fa fa-trash'></i></button></td></tr>";
                
                $("#datatable tbody").append(tablerow);

                disc_input = parseFloat(subtot) * (parseFloat(discount) / 100);
                tax_input = (parseFloat(subtot) - disc_input) * (parseFloat(tax) / 100);
                total_input = (parseFloat(subtot) - parseFloat(disc_input)) + parseFloat(tax_input);
                // console.log(tax_input);
                total_tax = parseFloat($('#price_tax').val()) + parseFloat(tax_input);
                total_disc = parseFloat($('#price_disc').val()) + parseFloat(disc_input);
                total = parseFloat($('#price_total').val()) + parseFloat(total_input);

                $('#price_tax').val(Number(total_tax).toFixed(2));
                $('#price_disc').val(Number(total_disc).toFixed(2));
                $('#price_total').val(Number(total).toFixed(2));
                $('#tax').val(0);
                $('#disc').val(0);

                counter++;
                $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#nama").val('');
                $("#hrgsatuan").val('');
                $("#satuan").val('');
                $("#quantity").val('');
                $("#merk").val('');
                $("#subtot").val('');
                $("#note").val('');
            });

            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                counter_id = $(this).val();

                var r = confirm("Delete Transaksi ?");
                if (r == true) {
                    // console.log(counter_id);

                    subtot = parseInt($("#subtot_d_"+ counter_id).val());
                    disc = parseInt(subtot) * ($("#disc_d_"+ counter_id).val() / 100);
                    tax = (parseInt(subtot) - disc) * ($("#tax_d_"+ counter_id).val() / 100);
                    // console.log(subtot, disc, tax);
                    totaltax = parseFloat($("#price_tax").val()) - Number(tax).toFixed(2);
                    parsetax = parseFloat(tax);
                    totaldisc = parseFloat($("#price_disc").val()) - Number(disc).toFixed(2);
                    totalwithdisc = Number(subtot).toFixed(2) - Number(disc).toFixed(2)
                    total =  parseFloat($("#price_total").val()) - (totalwithdisc + parseFloat(Number(parsetax).toFixed(2)));
                    // console.log(total_disc,total_tax,total);

                    $(this).closest('tr').remove();
                    $('#price_tax').val(Number(totaltax).toFixed(2));
                    $('#price_disc').val(Number(totaldisc).toFixed(2));
                    $('#price_total').val(Number(total).toFixed(2));
                    // if (parseFloat(total) || parseFloat(total_disc) || parseFloat(total_tax) == 0) {
                    //     $('#price_tax').val(0);
                    //     $('#price_disc').val(0);
                    //     $('#price_total').val(0);
                    // } else {
                        
                    // }
                } else {
                    return false;
                }
            });

            $(document).on("change", "#quantity", function(e) {
                if($('#quantity').val() == ''){
                    $('#quantity').val(0);
                }
                var hrg = $("#hrgsatuan").val();
                var qty = $("#quantity").val();
                var total = parseInt(hrg) * parseInt(qty);
                console.log(hrg);
                $("#subtot").val(total);
            });

            $(document).on("change", "#hrgsatuan", function(e) {
                if($('#hrgsatuan').val() == ''){
                    $('#hrgsatuan').val(0);
                }
                var hrg = $("#hrgsatuan").val();
                var qty = $("#quantity").val();
                var total = parseInt(hrg) * parseInt(qty);
                console.log(hrg);
                $("#subtot").val(total);
            });

            
        });

        // $('#dt').val().format("YYYY-MM-DD")
        
        // VALIDATE TRIGGER
        $("#quantity").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#hrgsatuan").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#disc").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#tax").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        
    })

</script>
@endsection
