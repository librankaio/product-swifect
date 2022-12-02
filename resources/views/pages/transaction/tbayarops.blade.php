@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Transaction</h1>
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
                        <h4>Pembayaran Operasional</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Trans</label>
                                    <input type="text" class="form-control" name="no" id="no">
                                </div>        
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control" name="jenis">
                                        <option disabled selected>--Select Jenis--</option>
                                        <option>Uang Keluar</option>
                                        <option>Uang Masuk</option>
                                    </select>
                                </div>      
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" name="total" id="total" value="0">
                                </div>      
                                <div class="form-group">
                                    <label>Akun Pembayaran</label>
                                    <select class="form-control select2" name="akun_bayar" id="akun_bayar">
                                        <option disabled selected>--Select Akun Pembayaran--</option>
                                        @foreach($banks as $data => $bank)
                                        <option value="{{ $bank->code }}">{{ $bank->code." - ".$bank->name }}</option>
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
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="dt" value="{{ date("Y-m-d") }}">
                                </div>                                 
                                <div class="form-group">
                                    <label>Ref No.</label>
                                    <input type="text" class="form-control" name="noref" id="noref">
                                </div>  
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" style="height:50px" name="note" id="note"></textarea>
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
                                        <th scope="col">Note</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>                            
                            </table>
                        </div>                                              
                    </div>      
                    <div class="col-12 col-md-4 col-lg-4 align-self-end">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" name="grand_total" form="thisform" id="grand_total" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" id="confirm" type="submit" formaction="{{ route('transpospost') }}">Submit</button>
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

            var counter = 1;
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();

                total = $("#total").val();
                note = $("#note").val();

                tablerow = "<tr><th style='readonly:true;'>" + counter + "</th><td><input style='width:120px;' readonly form='thisform' class='totalclass form-control' name='total_d[]' id='total_d_"+counter+"' type='text' value='" + total + "'></td><td><input type='text' style='width:100px;' form='thisform' class='noteclass form-control' name='note_d[]' value='" + note + "'></td><td><a title='Delete' class='delete'><i style='font-size:15pt;color:#6777ef;' class='fa fa-trash'></i></a></td></tr>";
                
                totalparse = parseFloat(total.replace(/,/g, ''));
                $("#datatable tbody").append(tablerow);
                if(counter == 1){
                    $("#grand_total").val(thousands_separators(totalparse));
                    $("#note").val('');
                    $("#total").val(0);
                    // $('#disc').val(0);
                    // $('#hrgsatuan').val(0);
                    // $('#quantity').val(0);
                }else{
                    grandtot_old = parseFloat($("#grand_total").val().replace(/,/g, ''));

                    grandtot_new =  totalparse + grandtot_old;

                    $("#grand_total").val(thousands_separators(grandtot_new));
                }
                counter++;
                // $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#note").val('');
                $("#total").val(0);
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
                    counter_id = $(this).closest('tr').text();
                    subtotal = parseFloat($("#total_d_"+ counter_id).val().replace(/,/g, ''));                    

                    grand_total = parseFloat($("#grand_total").val().replace(/,/g, ''))
                    grandtot_new = grand_total - subtotal;

                    $("#grand_total").val(thousands_separators(grandtot_new));
                    $(this).closest('tr').remove();
                } else {
                    return false;
                }
            });

            $(document).on("change", "#total", function(e) {
                if($('#total').val() == ''){
                    $('#total').val(0);
                }
                totalparse = $('#total').val();
                if (/\D/g.test(totalparse)){
                // Filter non-digits from input value.
                totalparse = totalparse.replace(/\D/g, '');
                }
                // console.log(hrg);                
                $("#total").val(thousands_separators(totalparse));
            });

            $(document).on("click", "#total", function(e) {
                if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
                }
            });
        });
        // VALIDATE TRIGGER
        $("#total").keyup(function(e){
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
