@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Data Cabang</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Data Cabang</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" name="kode" id="kode" value="{{ $mnamacabang->code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $mnamacabang->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $mnamacabang->address }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                            formaction="/mnamacabang/{{ $mnamacabang->id }}" id="confirm">Update</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </form>
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
            alert("Kode Tidak boleh kosong!");
            return false;
        }else if (nama == 0){
            alert("Nama Tidak boleh kosong!");
            return false;
        }
    });
</script>
@endsection