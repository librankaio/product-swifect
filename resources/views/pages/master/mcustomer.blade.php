@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item">
                <a class="text-muted">Master Customer</a>
            </div>
        </div>
    </div>
    @php
        $mcust_save = session('mcust_save');
        $mcust_updt = session('mcust_updt');
        $mcust_dlt = session('mcust_dlt');
    @endphp
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('layouts.flash-message')
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master Customer</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" name="kode" id="kode">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP</label>
                                        <input type="text" class="form-control" name="npwp">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control" name="cp">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($mcust_save == 'Y')
                                <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mcustpost') }}" id="confirm">Save</button>
                            @elseif($mcust_save == 'N' || $mcust_save == null)
                                <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mcustpost') }}" id="confirm" disabled>Save</button>
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
                                        <th scope="col" class="border border-5">Kode</th>
                                        <th scope="col" class="border border-5">Nama</th>
                                        <th scope="col" class="border border-5">NPWP</th>
                                        <th scope="col" class="border border-5">Alamat</th>
                                        <th scope="col" class="border border-5">Contact Person</th>
                                        <th scope="col" class="border border-5">Phone</th>
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
                                        <td class="border border-5">{{ $item->npwp }}</td>
                                        <td class="border border-5">{{ $item->address }}</td>
                                        <td class="border border-5">{{ $item->cp }}</td>
                                        <td class="border border-5">{{ $item->phone }}</td>
                                        @if($mcust_updt == 'Y')
                                        <td class="border border-5"><a href="/mastercust/{{ $item->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        @elseif($mcust_updt == null || $mcust_updt == 'N')
                                        <td class="border border-5"><a href="/mastercust/{{ $item->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary" style="pointer-events: none;"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        @endif
                                        <td class="border border-5">
                                            <form action="/mastercust/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                method="POST">
                                                @csrf
                                                @if($mcust_dlt == 'Y')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                    data-confirm-yes="submitDel({{ $item->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @elseif($mcust_dlt == null || $mcust_dlt == 'N')
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