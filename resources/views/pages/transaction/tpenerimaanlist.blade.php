@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerimaan Barang List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Penerimaan Barang List</a></div>
        </div>
    </div>
    @php        
        $tpenerimaan_updt = session('tpenerimaan_updt');
        $tpenerimaan_dlt = session('tpenerimaan_dlt');
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
                                        <input type="date" class="form-control" name="dtto" value="{{ date("Y-m-d") }}">
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
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-5">No</th>
                                        <th scope="col" class="border border-5">No Trans</th>
                                        <th scope="col" class="border border-5">Tanggal</th>
                                        <th scope="col" class="border border-5">Code Customer</th>
                                        <th scope="col" class="border border-5">Grand Total</th>
                                        <th scope="col" class="border border-5">Edit</th>
                                        <th scope="col" class="border border-5">Print</th>
                                        <th scope="col" class="border border-5">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0 @endphp
                                    @foreach($tpenerimaanhs as $data => $tpenerimaanh)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row" class="border border-5">{{ $counter }}</th>
                                        <td class="border border-5">{{ $tpenerimaanh->no }}</td>
                                        <td class="border border-5">{{ date("d/m/Y", strtotime($tpenerimaanh->tdt)) }}</td>
                                        <td class="border border-5">{{ $tpenerimaanh->supplier }}</td>
                                        <td class="border border-5">{{ number_format($tpenerimaanh->grdtotal, 2, '.', ',') }}</td>
                                        @if($tpenerimaan_updt == 'Y')
                                        <td class="border border-5"><a href="/tpenerimaan/{{ $tpenerimaanh->id }}/edit"
                                                class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                    Edit</i></a></td>
                                        @elseif($tpenerimaan_updt == null || $tpenerimaan_updt == 'N')
                                        <td class="border border-5"><a href="/tpenerimaan/{{ $tpenerimaanh->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary" style="pointer-events: none;"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        @endif
                                        @if($tpenerimaan_updt == 'Y')
                                        <td class="border border-5"><a href="/tpenerimaan/{{ $tpenerimaanh->id }}/print"
                                                class="btn btn-icon icon-left btn-outline-primary" target="_blank"><i class="fa fa-print"> Print</i></a></td>
                                        @elseif($tpenerimaan_updt == null || $tpenerimaan_updt == 'N')
                                        <td class="border border-5"><a href="/tpenerimaan/{{ $tpenerimaanh->id }}/print"
                                            class="btn btn-icon icon-left btn-outline-primary" target="_blank"><i class="fa fa-print" style="pointer-events: none;"> Print</i></a></td>
                                        @endif
                                        <td class="border border-5">
                                            <form action="/tpenerimaan/delete/{{ $tpenerimaanh->id }}"
                                                id="del-{{ $tpenerimaanh->id }}" method="POST">
                                                @csrf
                                                @if($tpenerimaan_dlt == 'Y')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $tpenerimaanh->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $tpenerimaanh->name }} data?"
                                                    data-confirm-yes="submitDel({{ $tpenerimaanh->id }})"><i
                                                        class="fa fa-trash">
                                                        Delete</i></button>
                                                @elseif($tpenerimaan_dlt == null || $tpenerimaan_dlt == 'N')
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $tpenerimaanh->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $tpenerimaanh->name }} data?"
                                                    data-confirm-yes="submitDel({{ $tpenerimaanh->id }})" disabled><i
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