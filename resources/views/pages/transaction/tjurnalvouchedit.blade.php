@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Journal Voucher Edit</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Journal Voucher Edit</a></div>
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
                                        <label>No Voucher</label>
                                        <input type="text" class="form-control" name="no_vouch" id="no_vouch" value="{{ $tjurnalvouchh->no }}" readonly>
                                    </div>                                
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="dt" value="{{ date("Y-m-d") }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" style="height:50px" name="keterangan">{{ $tjurnalvouchh->keterangan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mata Uang</label>
                                        <select class="form-control select2" name="mata_uang" id="mata_uang">
                                            <option selected>{{ $tjurnalvouchh->mata_uang }}</option>
                                            @foreach($matauangs as $data => $matauang)
                                            <option>{{ $matauang->code." - ".$matauang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cabang</label>
                                        <select class="form-control select2" name="cabang" id="cabang">
                                            <option selected>{{ $tjurnalvouchh->cabang }}</option>
                                            @foreach($cabangs as $data => $cabang)
                                            <option>{{ $cabang->name." - ".$cabang->address }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kurs</label>
                                        <input type="text" class="form-control" name="kurs" id="kurs" value="{{ number_format($tjurnalvouchh->kurs) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card" style="border: 1px solid lightblue">
                        <div class="card-header">
                            <h4>Add Accounts</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <select class="form-control select2" id="kode">
                                            <option disabled selected>--Select Kode--</option>
                                            @foreach($chartaccs as $data => $chartacc)
                                            <option value="{{ $chartacc->code }}">{{ $chartacc->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="nama" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Debit</label>
                                        <input type="text" class="form-control" id="debit">
                                    </div>
                                    <div class="form-group">
                                        <a href="" id="addItem">
                                            <i class="fa fa-plus" style="font-size:18pt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Credit</label>
                                        <input type="text" class="form-control" id="credit">
                                    </div>
                                    <div class="form-group">
                                        <label>Memo/Catatan</label>
                                        <textarea class="form-control" style="height:50px" id="memo"></textarea>
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
                                            <th scope="col" class="border border-5">Nama</th>
                                            <th scope="col" class="border border-5">Debit</th>
                                            <th scope="col" class="border border-5">Credit</th>
                                            <th scope="col" class="border border-5">Memo/ Catatan</th>
                                            <th scope="col" class="border border-5">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 0; @endphp
                                        @for($i = 0; $i < sizeof($tjurnalvouchds); $i++)
                                        @php $counter++; @endphp
                                        <tr>
                                            <th class="id-header border border-5" style='readonly:true;' headers="{{ $counter }}">{{ $counter }}</th>
                                            <td class="border border-5"><input style='width:120px;' readonly class='kodeclass form-control' name='kode_d[]' type='text' value='{{ $tjurnalvouchds[$i]->kode }}'></td>
                                            <td class="border border-5"><input style='width:120px;' readonly class='namaclass form-control' name='nama_d[]' type='text' value='{{ $tjurnalvouchds[$i]->nama }}'></td>
                                            <td class="border border-5"><input style='width:120px;' readonly class='debitclass form-control' name='debit_d[]' id='debit_d{{ $counter }}' type='text' value='{{ number_format( $tjurnalvouchds[$i]->debit, 2, '.', ',') }}'></td>
                                            <td class="border border-5"><input style='width:120px;' readonly class='creditclass form-control' name='credit_d[]' id='credit_d{{ $counter }}' type='text' value='{{ number_format( $tjurnalvouchds[$i]->credit, 2, '.', ',') }}'></td>
                                            <td class="border border-5"><input style='width:120px;' readonly class='memoclass form-control' name='memo_d[]' type='text' value='{{ $tjurnalvouchds[$i]->memo }}'></td>
                                            <td class="border border-5"><button title='Delete' class='delete btn btn-primary' value="{{ $counter }}"><i style='font-size:15pt;color:#ffff;' class='fa fa-trash'></i></button></td>
                                            <td hidden><input style='width:120px;' readonly class='noteclass form-control' name='no_d[]' type='text' value='{{ $tjurnalvouchds[$i]->no_tjurnalvouchh }}'></td>
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
                                        <label>Total Debit</label>
                                        <input type="text" class="form-control" name="total_debit" form="thisform" id="total_debit" value="{{ number_format( $tjurnalvouchh->total_debit, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Credit</label>
                                        <input type="text" class="form-control" name="total_credit" form="thisform" id="total_credit" value="{{ number_format( $tjurnalvouchh->total_credit, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="text" class="form-control" name="balance" form="thisform" id="balance" value="{{ number_format( $tjurnalvouchh->balance, 2, '.', ',') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>                
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" id="confirm" type="submit" formaction="/tjurnalvoucher/{{ $tjurnalvouchh->id }}">Submit</button>
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
                    url: '{{ route('getcoa') }}', 
                    method: 'post', 
                    data: {'kode': kode}, 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    dataType: 'json', 
                    success: function(response) {
                        // console.log(kode);
                        console.log(response);
                        for (i=0; i < response.length; i++) {
                            if(response[i].code == kode){
                                $("#nama").val(response[i].jenis)
                            }
                        }
                    }
                });
            });

            var counter = 1;
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();

                novouch = $("#no_vouch").val();
                kode = $("#kode").val();
                nama = $("#nama").val();
                debit = $("#debit").val();
                credit = $("#credit").val();
                memo = $("#memo").val();

                // if(total == 0){
                //     alert("Nominal tidak boleh 0");
                //     return false;
                // }
                // if(note == ""){
                //     alert("Note tidak boleh kosong");
                //     return false;
                // }

                tablerow = "<tr><th style='readonly:true;' class='border border-5'>" + counter + "</th><td class='border border-5'><input type='text' style='width:100px;' form='thisform' class='kodeclass form-control' name='kode_d[]' value='" + kode + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='namaclass form-control' name='nama_d[]' type='text' value='" + nama + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='debitclass form-control' name='debit_d[]' type='text' value='" + debit + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='creditclass form-control' name='credit_d[]' type='text' value='" + credit + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='memoclass form-control' name='memo_d[]' type='text' value='" + memo + "'></td><td class='border border-5'><a title='Delete' class='delete'><i style='font-size:15pt;color:#6777ef;' class='fa fa-trash'></i></a></td><td hidden><input style='width:120px;' readonly form='thisform' class='novouchclass form-control' name='no_d[]' type='text' value='" + novouch + "'></td></tr>";
                
                $("#datatable tbody").append(tablerow);
                // totalparse = parseFloat(total.replace(/,/g, ''));
                // if(counter == 1){
                //     $("#grand_total").val(thousands_separators(totalparse));
                //     $("#note").val('');
                //     $("#nominal").val(0);
                //     // $('#disc').val(0);
                //     // $('#hrgsatuan').val(0);
                //     // $('#quantity').val(0);
                // }else{
                //     grandtot_old = parseFloat($("#grand_total").val().replace(/,/g, ''));

                //     grandtot_new =  totalparse + grandtot_old;

                //     $("#grand_total").val(thousands_separators(grandtot_new));
                // }
                counter++;
                $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#nama").val('');
                $("#debit").val('');
                $("#credit").val('');
                $("#memo").val('');
            });

            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                var r = confirm("Delete Transaksi ?");
                if (r == true) {
                    // counter_id = $(this).closest('tr').text();
                    // subtotal = parseFloat($("#total_d"+ counter_id).val().replace(/,/g, ''));                    

                    // grand_total = parseFloat($("#grand_total").val().replace(/,/g, ''))
                    // grandtot_new = grand_total - subtotal;

                    // $("#grand_total").val(thousands_separators(grandtot_new));
                    $(this).closest('tr').remove();
                } else {
                    return false;
                }
            });

            $(document).on("change", "#credit", function(e) {
                if($('#credit').val() == ''){
                    $('#credit').val(0);
                }
                creditparse = $('#credit').val();
                if (/\D/g.test(creditparse)){
                // Filter non-digits from input value.
                creditparse = creditparse.replace(/\D/g, '');
                }
                // console.log(hrg);                
                $("#credit").val(thousands_separators(creditparse));
            });
            // VALIDATE TRIGGER
            $(document).on("click", "#credit", function(e) {
                if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
                }
            });

            $(document).on("change", "#debit", function(e) {
                if($('#debit').val() == ''){
                    $('#debit').val(0);
                }
                debitparse = $('#debit').val();
                if (/\D/g.test(debitparse)){
                // Filter non-digits from input value.
                debitparse = debitparse.replace(/\D/g, '');
                }
                // console.log(hrg);                
                $("#debit").val(thousands_separators(debitparse));
            });
            $(document).on("change", "#kurs", function(e) {
                if($('#kurs').val() == ''){
                    $('#kurs').val(1);
                }
                $(this).val(thousands_separators($(this).val()));
            });
            // VALIDATE TRIGGER
            $(document).on("click", "#debit", function(e) {
                if (/\D/g.test(this.value)){
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

            $("#credit").keyup(function(e){
                if (/\D/g.test(this.value)){
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            
            $("#debit").keyup(function(e){
                if (/\D/g.test(this.value)){
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
        });

        $(document).on("click","#confirm",function(e){
        // Validate ifnull
        no = $("#no").val();
        code_cust = $("#code_cust").prop('selectedIndex');
        if (no == ""){
            alert("No Tidak boleh kosong!");
            return false;
        }else if (code_cust == 0){
            alert("Please select Code Cust");
            return false;
        }
        });
        
    })

</script>
@endsection
