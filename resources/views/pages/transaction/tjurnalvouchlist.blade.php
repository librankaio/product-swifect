@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Journal Voucher List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Journal Voucher List</a></div>
        </div>
    </div>
    @php        
        $tjvouch_updt = session('tjvouch_updt');
        $tjvouch_dlt = session('tjvouch_dlt');
    @endphp
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Header Information</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Dari</label>
                                        <input type="date" class="form-control" name="dtfr" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Dari</label>
                                        <input type="date" class="form-control" name="dtfr" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('mbrgpost') }}">Search</button>
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
                                        <th scope="col">No Voucher</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Total Debit</th>
                                        <th scope="col">Total Credit</th>
                                        <th scope="col">Mata Uang</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Print</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0 @endphp
                                    @foreach($tjurnalvouchhs as $data => $tjurnalvouchh)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row">{{ $counter }}</th>
                                        <td>{{ $tjurnalvouchh->no }}</td>
                                        <td>{{ date("d/m/Y", strtotime($tjurnalvouchh->tdt)) }}</td>
                                        <td>{{ $tjurnalvouchh->keterangan }}</td>
                                        <td>{{ number_format( $tjurnalvouchh->total_debit, 2, '.', ',') }}</td>
                                        <td>{{ number_format( $tjurnalvouchh->total_credit, 2, '.', ',') }}</td>
                                        <td>{{ $tjurnalvouchh->mata_uang }}</td>
                                        @if($tjvouch_updt == 'Y')
                                        <td><a href="/tjurnalvoucher/{{ $tjurnalvouchh->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        @elseif($tjvouch_updt == null || $tjvouch_updt == 'N')
                                        <td><a href="/tjurnalvoucher/{{ $tjurnalvouchh->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary"
                                            style="pointer-events: none;"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        @endif
                                        @if($tjvouch_updt == 'Y')
                                        <td><a href="/tjurnalvoucher/{{ $tjurnalvouchh->id }}/print"
                                                class="btn btn-icon icon-left btn-outline-primary" target="_blank"><i class="fa fa-print"> Print</i></a></td>
                                        @elseif($tjvouch_updt == null || $tjvouch_updt == 'N')
                                        <td><a href="/tjurnalvoucher/{{ $tjurnalvouchh->id }}/print"
                                            class="btn btn-icon icon-left btn-outline-primary" target="_blank"
                                            style="pointer-events: none;"><i class="fa fa-print"> Print</i></a></td>
                                        @endif
                                        <td>
                                            <form action="/tjurnalvoucher/delete/{{ $tjurnalvouchh->id }}"
                                                id="del-{{ $tjurnalvouchh->id }}" method="POST">
                                                @csrf
                                                @if($tjvouch_dlt == 'Y')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $tjurnalvouchh->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $tjurnalvouchh->name }} data?"
                                                    data-confirm-yes="submitDel({{ $tjurnalvouchh->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @elseif($tjvouch_dlt == null || $tjvouch_dlt == 'N')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $tjurnalvouchh->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $tjurnalvouchh->name }} data?"
                                                    data-confirm-yes="submitDel({{ $tjurnalvouchh->id }})" disabled><i
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