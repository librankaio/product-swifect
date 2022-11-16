@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Transaction</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaction</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Pembelian Barang</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pembelian Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Trans</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. Surat Jalan</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control select2">
                                        <option disabled selected>--Select Supplier--</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Trans</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Grand Total</label>
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="border: 1px solid lightblue">
                    <div class="card-header">
                        <h4>Add Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <select class="form-control select2" id="kode">
                                        <option disabled selected>--Select Kode--</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Harga Satuan</label>
                                    <input type="text" class="form-control" id="hrgsatuan">
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" id="satuan" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" id="quantity">
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control" id="merk" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Subtotal</label>
                                    <input type="text" class="form-control" id="subtot" disabled>
                                </div>
                                <div class="form-group">
                                    <a href="" id="addItem">
                                        <i class="fa fa-plus" style="font-size:18pt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <th scope="col">Merk</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
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

        var counter = 1;
        $(document).on("click","#addItem",function(e){
            e.preventDefault();
            // alert("test")
            kode=$("#kode").val();
            nama=$("#nama").val();
            hrgsatuan=$("#hrgsatuan").val();
            satuan=$("#satuan").val();
            quantity=$("#quantity").val();
            merk=$("#merk").val();
            subtot=$("#subtot").val();
            tablerow="<tr><th style='readonly:true;'>"+counter+"</th><td><input style='width:120px;' readonly form='myform' class='kodeclass' name='kode[]' type='text' value='"+kode+"'></td><td><input type='text' readonly style='width:150px;' form='myform' class='namaclass' value='"+nama+"' name='nama[]'></td><td><input type='text' readonly style='width:100px;' form='myform' class='merkclass' value='"+merk+"' name='merk[]'></td><td><input type='text' style='width:100px;' form='myform' class='quantityclass' name='quantity[]' value='"+quantity+"'></td><td><input type='text' readonly form='myform' style='width:100px;' class='satuanclass' value='"+satuan+"' name='satuan[]'></td><td><input type='text' readonly form='myform' style='width:100px;' class='hargaclass' value='"+hrgsatuan+"' name='harga[]'></td><td><input type='text' readonly form='myform' style='width:100px;' class='subtotclass' value='"+subtot+"' name='subtot[]'></td><td><a title='Delete' class='delete'><i style='font-size:15pt;color:#6777ef;' class='fa fa-trash'></i></a></td></tr>";
            $("#datatable tbody").append(tablerow);
            counter++;
        });

        $(document).on("click",".delete",function(e){
            e.preventDefault();
            var r = confirm("Delete Transaksi ?");
                if (r == true) 
                {
                $(this).closest('tr').remove();
                } 
                else 
                {
                return false;
                }
        });
    });
</script>
@endsection