@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pembayaran Operasional</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Pembayaran Operasional</a></div>
        </div>
    </div>
    <div class="section-body">
        <form action="" method="POST" id="thisform">
            @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Header Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Trans</label>
                                    <input type="text" class="form-control" name="no" id="no" value="{{ $tbayaropsh->no }}" readonly>
                                </div>        
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control select2" name="jenis" id="jenis">
                                        <option selected>{{ $tbayaropsh->jenis }}</option>
                                        <option>Uang Keluar</option>
                                        <option>Uang Masuk</option>
                                    </select>
                                </div>       
                                <div class="form-group">
                                    <label>Akun Pembayaran</label>
                                    <select class="form-control select2" name="akun_bayar" id="akun_bayar">
                                        <option selected>{{ $tbayaropsh->akun_pembayaran  }}</option>
                                        @foreach($banks as $data => $bank)
                                        <option>{{ $bank->code." - ".$bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>      
                                <div class="form-group">
                                    <label>Cabang</label>
                                    <select class="form-control select2" name="cabang" id="cabang">
                                        <option selected>{{ $tbayaropsh->cabang  }}</option>
                                        @foreach($cabangs as $data => $cabang)
                                        <option>{{ $cabang->name." - ".$cabang->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <a href="" id="addItem">
                                        <i class="fa fa-plus" style="font-size:18pt"></i>
                                    </a>
                                </div>                          
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mata Uang</label>
                                    <select class="form-control select2" name="mata_uang" id="mata_uang">
                                        <option selected>{{ $tbayaropsh->mata_uang }}</option>
                                        @foreach($matauangs as $data => $matauang)
                                        <option>{{ $matauang->code." - ".$matauang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                <input type="date" class="form-control" name="dt" value="{{ date("Y-m-d", strtotime($tbayaropsh->tdt)) }}">
                                </div>                                 
                                <div class="form-group">
                                    <label>Ref No.</label>
                                    <input type="text" class="form-control" name="noref" id="noref" value="{{ $tbayaropsh->noref }}">
                                </div>          
                                <div class="form-group">
                                    <label>Kurs</label>
                                    <input type="text" class="form-control" name="kurs" id="kurs" value="{{ number_format($tbayaropsh->kurs) }}">
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
                                    <label>Note</label>
                                    <textarea class="form-control" style="height:50px" name="note" id="note"></textarea>
                                </div>                                 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" class="form-control" name="nominal" id="nominal" value="0">                                    
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="" id="addItem">
                                        <i class="fa fa-plus" style="font-size:18pt"></i>
                                    </a>
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
                                        <th scope="col" class="border border-5">Deskripsi</th>
                                        <th scope="col" class="border border-5">Total</th>
                                        <th scope="col" class="border border-5">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0; @endphp
                                    @for($i = 0; $i < sizeof($tbayaropsds); $i++)
                                    @php $counter++; @endphp
                                    <tr>
                                        <th class="id-header border border-5" style='readonly:true;' headers="{{ $counter }}">{{ $counter }}</th>
                                        <td class="border border-5"><input style='width:120px;' readonly class='noteclass form-control' name='note_d[]' type='text' value='{{ $tbayaropsds[$i]->note }}'></td>
                                        <td class="border border-5"><input style='width:120px;' readonly class='totalclass form-control' name='total_d[]' id='total_d{{ $counter }}' type='text' value='{{ number_format( $tbayaropsds[$i]->total, 2, '.', ',') }}'></td>
                                        <td class="border border-5"><button title='Delete' class='delete btn btn-primary' value="{{ $counter }}"><i style='font-size:15pt;color:#ffff;' class='fa fa-trash'></i></button></td>
                                        <td hidden><input style='width:120px;' readonly class='noteclass form-control' name='no_d[]' type='text' value='{{ $tbayaropsds[$i]->no_tbayaropsh }}'></td>
                                    </tr>
                                    @endfor
                                </tbody>                            
                            </table>
                        </div>                                              
                    </div>      
                    <div class="col-12 col-md-4 col-lg-4 align-self-end">
                        <div class="row">
                            <div class="col-md-4 offset-md-8">
                                <div class="form-group">
                                    <label>Grand Total</label>
                                    <input type="text" class="form-control" name="grand_total" form="thisform" id="grand_total" value="{{ number_format( (Int)$tbayaropsh->grdtotal, 2, '.', ',') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" id="confirm" type="submit" formaction="/tbayarops/{{ $tbayaropsh->id }}">Submit</button>
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

            $("#jenis").select2({
                minimumResultsForSearch: Infinity
            });

            var counter = parseInt({{ $counter}}) +1;
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();

                no = $("#no").val();
                total = $("#nominal").val();
                note = $("#note").val();

                if(total == 0){
                    alert("Nominal tidak boleh 0");
                    return false;
                }
                if(note == ""){
                    alert("Note tidak boleh kosong");
                    return false;
                }

                tablerow = "<tr><th style='readonly:true;' class='border border-5'>" + counter + "</th><td class='border border-5'><input type='text' form='thisform' class='noteclass form-control' name='note_d[]' value='" + note + "'><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='totalclass form-control' name='total_d[]' id='total_d"+counter+"' type='text' value='" + total + "'></td></td><td class='border border-5'><button title='Delete' class='delete btn btn-primary' value="+counter+"><i style='font-size:15pt;color:#fff;' class='fa fa-trash'></i></button></td><td hidden><input style='width:120px;' readonly form='thisform' class='noclass form-control' name='no_d[]' type='text' value='" + no + "'></td></tr>";
                
                totalparse = parseFloat(total.replace(/,/g, ''));
                $("#datatable tbody").append(tablerow);
                if(counter == 1){
                    $("#grand_total").val(thousands_separators(totalparse));
                    $("#note").val('');
                    $("#nominal").val(0);
                    // $('#disc').val(0);
                    // $('#hrgsatuan').val(0);
                    // $('#quantity').val(0);
                }else{
                    grandtot_old = parseFloat($("#grand_total").val().replace(/,/g, ''));
                    subtot = Number(totalparse).toFixed(2);
                    grandtot = Number(grandtot_old).toFixed(2);
                    grandtot_new =  Number(subtot) + Number(grandtot);
                    

                    console.log( Number(subtot) + Number(grandtot))

                    $("#grand_total").val(thousands_separators(grandtot_new));
                }
                counter++;
                // $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#note").val('');
                $("#nominal").val(0);
                // $("#satuan").val('');
                // $("#quantity").val(0);
                // $("#merk").val('');
                // $("#subtot").val('');
                // $("#note").val('');
            });

            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                var r = confirm("Delete Transaksi ?");
                if (r == true) {
                    counter_id = $(this).val();
                    subtotal = parseFloat($("#total_d"+ counter_id).val().replace(/,/g, ''));                    

                    grand_total = parseFloat($("#grand_total").val().replace(/,/g, ''))
                    grandtot_new = grand_total - subtotal;

                    $("#grand_total").val(thousands_separators(grandtot_new));
                    $(this).closest('tr').remove();
                } else {
                    return false;
                }
            });

            $(document).on("change", "#nominal", function(e) {
                if($('#nominal').val() == ''){
                    $('#nominal').val(0);
                }
                totalparse = $('#nominal').val();
                if (/\D/g.test(totalparse)){
                // Filter non-digits from input value.
                totalparse = totalparse.replace(/\D/g, '');
                }
                // console.log(hrg);                
                $("#nominal").val(thousands_separators(totalparse));
            });

            $(document).on("change", "#kurs", function(e) {
                if($('#kurs').val() == ''){
                    $('#kurs').val(1);
                }
                $(this).val(thousands_separators($(this).val()));
            });

            $(document).on("click", "#nominal", function(e) {
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
        });
        // VALIDATE TRIGGER
        $("#nominal").keyup(function(e){
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
