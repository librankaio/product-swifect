@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Chart Of Account</a></div>
        </div>
    </div>
    @php
        $mcoa_save = session('mcoa_save');
        $mcoa_updt = session('mcoa_updt');
        $mcoa_dlt = session('mcoa_dlt');
    @endphp
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Chart Of Account</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" name="kode" id="kode">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <input type="text" class="form-control" name="jenis" id="jenis">
                                    </div>
                                    <div class="form-group">
                                        <label>Saldo</label>
                                        <input type="text" class="form-control" name="saldo" id="saldo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">                            
                            @if($mcoa_save == 'Y')
                                <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mchartaccpost') }}" id="confirm">Save</button>
                            @elseif($mcoa_save == 'N' || $mcoa_save == null)
                                <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mchartaccpost') }}" id="confirm" disabled>Save</button>
                            @endif
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-5">No</th>
                                        <th scope="col" class="border border-5">Code</th>
                                        <th scope="col" class="border border-5">Name</th>
                                        <th scope="col" class="border border-5">Jenis</th>
                                        <th scope="col" class="border border-5">Saldo</th>
                                        <th scope="col" class="border border-5">Edit</th>
                                        <th scope="col" class="border border-5">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0 @endphp
                                    @foreach($datas as $data => $item)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row" class="border border-5">{{ $counter }}</th>
                                        <td class="border border-5">{{ $item->code }}</td>
                                        <td class="border border-5">{{ $item->name }}</td>
                                        <td class="border border-5">{{ $item->jenis }}</td>
                                        <td class="border border-5">{{ number_format( $item->saldo, 2, '.', ',')}}</td>
                                        @if($mcoa_updt == 'Y')
                                        <td class="border border-5"><a href="/mchartacc/{{ $item->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        <td>
                                        @elseif($mcoa_updt == null || $mcoa_updt == 'N')
                                        <td class="border border-5"><a href="/mchartacc/{{ $item->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary" style="pointer-events: none;"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        <td class="border border-5">
                                        @endif
                                            <form action="/mchartacc/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                method="POST">
                                                @csrf
                                                @if($mcoa_dlt == 'Y')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                    data-confirm-yes="submitDel({{ $item->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @elseif($mcoa_dlt == null || $mcoa_dlt == 'N')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                    data-confirm-yes="submitDel({{ $item->id }})" disabled><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('botscripts')
<script type="text/javascript">
    $('#datatable').DataTable({
        // "ordering":false,
        "bInfo" : false
    });
    function submitDel(id){
        $('#del-'+id).submit()
    }
    $(document).on("click","#confirm",function(e){
        // Validate ifnull
        kode = $("#kode").val();
        nama = $("#nama").val();
        if (kode == ""){
            swal('WARNING', 'Kode Tidak boleh kosong!', 'warning');
            return false;
        }else if (nama == 0){
            swal('WARNING', 'Nama Tidak boleh kosong!', 'warning');
            return false;
        }
    });

    $(document).on("change", "#saldo", function(e) {
        if($('#saldo').val() == ''){
            $('#saldo').val(0);
        }
        saldoparse = $('#saldo').val();
        if (/\D/g.test(saldoparse)){
        // Filter non-digits from input value.
        saldoparse = saldoparse.replace(/\D/g, '');
        }
        // console.log(hrg);                
        $("#saldo").val(thousands_separators(saldoparse));
    });

    $(document).on("click", "#saldo", function(e) {
        if (/\D/g.test(this.value)){
        // Filter non-digits from input value.
        this.value = this.value.replace(/\D/g, '');
        }
    });

    // VALIDATE TRIGGER
    $("#saldo").keyup(function(e){
        if (/\D/g.test(this.value)){
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
</script>
@endsection