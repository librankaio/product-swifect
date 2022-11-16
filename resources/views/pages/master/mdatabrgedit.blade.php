@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Data Item (EDIT)</a></div>
        </div>
    </div>

    <div class="section-body">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Data Item (EDIT)</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" name="kode" class="form-control" value="{{ $mitem->code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select class="form-control select2" name="lokasi">
                                            <option selected>{{ $mitem->code_mwhse }}</option>
                                            @foreach($mwhses as $data => $mwhse)
                                            <option>{{ $mwhse->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Beli(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgbeli"
                                            value="{{ $mitem->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" style="height:50px"
                                            name="note">{{ $mitem->note }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $mitem->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select class="form-control select2" name="satuan">
                                            <option selected>{{ $mitem->code_muom }}</option>
                                            @foreach($muoms as $data => $muom)
                                            <option>{{ $muom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgjual"
                                            value="{{ $mitem->price2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Item Group</label>
                                        <select class="form-control select2" name="itemgrp">
                                            <option selected>{{ $mitem->code_mgrp }}</option>
                                            @foreach($mgrps as $data => $mgrp)
                                            <option>{{ $mgrp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="/masterdatabarang/{{ $mitem->id }}">Save</button>
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
    $(document).ready(function(){
        $('.select2').select2({});
    });

    $('#datatable').DataTable({
        // "ordering":false,
        "bInfo" : false
    });

    function submitDel(id){
        $('#del-'+id).submit()
    }
</script>
@endsection