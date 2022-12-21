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
            <div class="breadcrumb-item"><a class="text-muted">Master Data Item</a></div>
        </div>
    </div>

    <div class="section-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('layouts.flash-message')
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Data Item</h4>
                    </div>                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" name="kode" id="kode" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select class="form-control select2" name="lokasi" id="lokasi">
                                            <option disabled selected>--Select Lokasi--</option>
                                            @foreach($mwhses as $data => $mwhse)
                                            <option>{{ $mwhse->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Beli(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgbeli" id="hrgbeli" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Item Type</label>
                                        <select class="form-control select2" name="itemtype" id="itemtype">
                                            <option disabled selected>--Select Item Type--</option>
                                            <option>BAHAN BAKU</option>                                                
                                            <option>BARANG JADI</option>       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" style="height:50px" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select class="form-control select2" name="satuan" id="satuan">
                                            <option disabled selected>--Select Satuan--</option>
                                            @foreach($muoms as $data => $muom)
                                            <option>{{ $muom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual(Rp.)</label>
                                        <input type="text" class="form-control" name="hrgjual" id="hrgjual" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Item Group</label>
                                        <select class="form-control select2" name="itemgrp" id="itemgrp">
                                            <option disabled selected>--Select Item Group--</option>
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
                                formaction="{{ route('mbrgpost') }}" id="confirm">Save</button>
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>                    
                </div>
            </div>            
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Image</h4>
                    </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm" style="border:1px solid #ced4da; border-radius:5px;">
                                    <input id="upload" name="upload" type="file" onchange="readURL(this);" class="form-control border-0 upload">
                                    {{-- <label id="upload-label" for="upload" class="font-weight-light text-muted upload-label">Choose
                                        file</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                    </div> --}}
                                </div>
                                <div class="image-area mt-4"><img id="imageResult" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                <hr>
                            </div>
                        </div>
                </div>
            </div>            
        </div>
        </form>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Item Group</th>
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
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code_mwhse }}</td>
                                        <td>{{ $item->code_muom }}</td>
                                        <td>{{ number_format($item->price, 3, '.', ',') }}</td>
                                        <td>{{ number_format($item->price2, 3, '.', ',') }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>{{ $item->code_mgrp }}</td>
                                        <td><a href="/masterdatabarang/{{ $item->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        <td>
                                            <form action="/masterdatabarang/delete/{{ $item->id }}"
                                                id="del-{{ $item->id }}" method="POST">
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
        </div>
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

    $(".alert button.close").click(function (e) {
        $(this).parent().fadeOut(2000);
    });

    function submitDel(id){
        $('#del-'+id).submit()
    }

    $(document).on("click","#confirm",function(e){
        // Validate ifnull
        kode = $("#kode").val();
        nama = $("#nama").val();
        satuan = $("#satuan").prop('selectedIndex');
        lokasi = $("#lokasi").prop('selectedIndex');
        itemgrp = $("#itemgrp").prop('selectedIndex');
        if (kode == ""){
            alert("Kode Tidak boleh kosong!");
            return false;
        }else if (nama == '' || nama == null){
            alert("Nama Tidak boleh kosong!");
            return false;
        }else if (lokasi == 0){
            alert("Please select Lokasi");
            return false;
        }else if (satuan == 0){
            alert("Please select Satuan");
            return false;
        }else if (itemgrp == 0){
            alert("Please select Item Group");
            return false;
        }
    });

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