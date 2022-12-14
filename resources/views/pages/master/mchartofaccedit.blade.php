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
                                        <input type="text" class="form-control" name="kode" id="kode" value="{{ $mchartofacc->code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $mchartofacc->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <input type="text" class="form-control" name="jenis" id="jenis" value="{{ $mchartofacc->jenis }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Saldo</label>
                                        <input type="text" class="form-control" name="saldo" id="saldo" value="{{ number_format( $mchartofacc->saldo, 2, '.', ',') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="/mchartacc/{{ $mchartofacc->id }}" id="confirm">Save</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
        {{-- <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Code Name</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0 @endphp
                                    @foreach($datas as $data => $item)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row">{{ $counter }}</th>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ number_format( $item->saldo, 2, '.', ',')}}</td>
                                        <td><a href="/mchartacc/{{ $item->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        <td>
                                            <form action="/mchartacc/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                    data-confirm-yes="submitDel({{ $item->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
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
        </div> --}}
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
        jenis = $("#jenis").val();
        saldo = $("#sald0").val();
        if (kode == ""){
            alert("Kode Tidak boleh kosong!");
            return false;
        }else if (jenis == ""){
            alert("Jenis Tidak boleh kosong!");
            return false;
        }else if (saldo == 0){
            alert("Saldo Tidak boleh kosong!");
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