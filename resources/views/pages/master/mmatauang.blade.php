@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Mata Uang</a></div>
        </div>
    </div>
    @php
        $mmtuang_save = session('mmtuang_save');
        $mmtuang_updt = session('mmtuang_updt');
        $mmtuang_dlt = session('mmtuang_dlt');
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
                        <h4>Master Mata Uang</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mata Uang Code</label>
                                        <input type="text" class="form-control" name="kode" id="kode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mata Uang Name</label>
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($mmtuang_save == 'Y')
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mmatauangpost') }}" id="confirm">Save</button>
                            @elseif($mmtuang_save == 'N' || $mmtuang_save == null)
                                <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mmatauangpost') }}" id="confirm" disabled>Save</button>
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
                            <table class="table table-sm" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
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
                                        @if($mmtuang_updt == 'Y')
                                        <td><a href="/mmatauang/{{ $item->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        @elseif($mmtuang_updt == null || $mmtuang_updt == 'N')
                                        <td><a href="/mmatauang/{{ $item->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary" style="pointer-events: none;"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        @endif
                                        <td>
                                            <form action="/mmatauang/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                method="POST">
                                                @csrf
                                                @if($mmtuang_dlt == 'Y')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                    data-confirm-yes="submitDel({{ $item->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @elseif($mmtuang_dlt == null || $mmtuang_dlt == 'N')
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
    <form class="modal-part" id="modal-login-part">
        <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
        <div class="form-group">
            <label>Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
        </div>
    </form>
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