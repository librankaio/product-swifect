@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Report Penjualan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Reports</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Report Penjualan Barang</a></div>
        </div>
    </div>
    @php        
        $tpembelianbrg_updt = session('tpembelianbrg_updt');
        $tpembelianbrg_dlt = session('tpembelianbrg_dlt');
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Dari</label>
                                        <input type="date" class="form-control" name="dtfr" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Dari</label>
                                        <input type="date" class="form-control" name="dtto" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <select class="form-control select2" name="customer" id="customer">
                                            <option disabled selected>--Select Customer--</option>
                                            @foreach($customers as $data => $customer)
                                            <option>{{ $customer->code." - ".$customer->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit"
                                formaction="{{ route('rpenjualanpost') }}">Search</button>
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
                                        <th scope="col" class="border border-5">Customer</th>
                                        <th scope="col" class="border border-5">Subtotal</th>
                                        <th scope="col" class="border border-5">Diskon</th>
                                        <th scope="col" class="border border-5">PPN</th>
                                        <th scope="col" class="border border-5">Grand Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $grdtotal = 0;
                                    @endphp
                                    @isset($results)                                    
                                    @php 
                                    $counter = 0;
                                    @endphp
                                    @foreach($results as $data => $result)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row" class="border border-5">{{ $counter }}</th>
                                        <td class="border border-5">{{ $result->no }}</td>
                                        <td class="border border-5">{{ date("d/m/Y", strtotime($result->tdt)) }}</td>
                                        <td class="border border-5">{{ $result->code_mcust }}</td>
                                        <td class="border border-5">{{ number_format($result->subtotal, 2, '.', ',') }}</td>
                                        <td class="border border-5">{{ number_format($result->disc, 2, '.', ',') }}</td>
                                        <td class="border border-5">{{ number_format($result->tax, 2, '.', ',') }}</td>
                                        <td class="border border-5">{{ number_format($result->grdtotal, 2, '.', ',') }}</td>
                                    </tr>
                                    @if($grdtotal == 0)
                                    @php $grdtotal = $result->grdtotal @endphp
                                    @elseif($grdtotal >= 0){
                                    @php $grdtotal = $grdtotal + $result->grdtotal @endphp
                                    }
                                    @endif
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 align-self-end">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="form-group">
                                <label>Grand Total</label>
                                <input type="text" class="form-control" name="price_total" form="thisform" id="price_total" value="{{ number_format($grdtotal, 2, '.', ',') }}" readonly>
                            </div>
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