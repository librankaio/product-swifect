@extends('layouts.main')
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
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Data Item</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
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
                                        <input type="text" class="form-control" name="hrgbeli">
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
                                        <input type="text" class="form-control" name="hrgjual">
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
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
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
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->price2 }}</td>
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
        }else if (nama == 0){
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
</script>
@endsection