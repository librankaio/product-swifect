@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Satuan (EDIT)</a></div>
        </div>
    </div>

    <div class="section-body">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Satuan (EDIT)</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Satuan Code</label>
                                        <input type="text" class="form-control" name="kode" value="{{ $muom->code }}" id="kode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Satuan Name</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $muom->name }}" id="nama">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="/mastersatuan/{{ $muom->id }}" id="confirm">Update</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
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