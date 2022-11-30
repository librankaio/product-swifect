@extends('layouts.main')
@section('topscripts')
    <style>
        /* Image uploader CSS Properties */
        .container .row .input-group .upload {
            opacity: 0;
        }
        .container .row .input-group .upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }
        .image-area {
            border: 2px dashed rgba(37, 147, 238, 0.7);
            padding: 1rem;
            position: relative;
        }
        .image-area::before {
            content: "Image";
            color: rgba(37, 147, 238);
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
@stop
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
        <form action="" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="kode" id="kode" class="form-control" value="{{ $mitem->code }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select class="form-control select2" name="lokasi" id="lokasi">
                                            <option selected>{{ $mitem->code_mwhse }}</option>
                                            @foreach($mwhses as $data => $mwhse)
                                            <option>{{ $mwhse->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Beli(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgbeli" id="hrgbeli"
                                            value="{{ number_format($mitem->price) }}">
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
                                        <select class="form-control select2" name="satuan" id="satuan">
                                            <option selected>{{ $mitem->code_muom }}</option>
                                            @foreach($muoms as $data => $muom)
                                            <option>{{ $muom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgjual" id="hrgjual"
                                            value="{{ number_format($mitem->price2) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Item Group</label>
                                        <select class="form-control select2" name="itemgrp" id="itemgrp">
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
                            <button class="btn btn-primary mr-1" type="submit" id="confirm"
                                formaction="/masterdatabarang/{{ $mitem->id }}">Save</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Image</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm" style="border:1px solid #ced4da; border-radius:5px;">
                                <input type="text" class="form-control" id="hdnupload" name="hdnupload" value="{{ $mitem->img }}" readonly>
                                <input id="upload" name="upload" type="file" onchange="readURL(this);" class="form-control border-0 upload" value="{{ $mitem->img }}">
                                {{-- <label id="upload-label" for="upload" class="font-weight-light text-muted upload-label">Choose
                                    file</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                </div> --}}
                            </div>
                            <div class="image-area mt-4"><img id="imageResult" src="{{url('/storage/images/'.$mitem->img)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            <hr>
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

    // VALIDATE TRIGGER
    $("#hrgbeli").keyup(function(e){
        if (/\D/g.test(this.value)){
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
    $("#hrgjual").keyup(function(e){
        if (/\D/g.test(this.value)){
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
    
    $(document).on("change", "#hrgbeli", function(e) {
        if($('#hrgbeli').val() == ''){
            $('#hrgbeli').val(0);
        }
        data = $(this).val();
        $("#hrgbeli").val(thousands_separators(data));
    });
    $(document).on("change", "#hrgjual", function(e) {
        if($('#hrgjual').val() == ''){
            $('#hrgjual').val(0);
        }
        data = $(this).val();
        $("#hrgjual").val(thousands_separators(data));
    });

    $(document).on("click", "#hrgbeli", function(e) {
        if (/\D/g.test(this.value)){
        // Filter non-digits from input value.
        this.value = this.value.replace(/\D/g, '');
        }
    });
    $(document).on("click", "#hrgjual", function(e) {
        if (/\D/g.test(this.value)){
        // Filter non-digits from input value.
        this.value = this.value.replace(/\D/g, '');
        }
    });
    $("#hrgjual").focusout(function(){
        if($('#hrgjual').val() == ''){
            $('#hrgjual').val(0);
        }
        data = $(this).val();
        $("#hrgjual").val(thousands_separators(data));
    });
    $("#hrgbeli").focusout(function(){
        if($('#hrgbeli').val() == ''){
            $('#hrgbeli').val(0);
        }
        data = $(this).val();
        $("#hrgbeli").val(thousands_separators(data));
    });

    $(document).on("click","#confirm",function(e){
        // Validate ifnull
        kode = $("#kode").val();
        nama = $("#nama").val();
        if (kode == ""){
            alert("Kode Tidak boleh kosong!");
            return false;
        }else if (nama == ""){
            alert("Nama Tidak boleh kosong!");
            return false;
        }
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE 
    * ========================================== */
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResult').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input0.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name:' + fileName;

        }
</script>
@endsection