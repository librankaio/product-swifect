@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master User</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master User</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Branch</label>
                                    <select class="form-control" name="branch">
                                        <option disabled selected>--Select Branch--</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-block">Admin Privilage</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="create_acs" id="checkall" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Check All
                                        </label>
                                      </div>
                                      {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="read_acs" value="R" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Read
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="update_acs" value="U" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Update
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_acs" value="D" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Delete
                                        </label>
                                      </div> --}}
                                </div>                                
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border border-5">Feature</th>
                                                    <th scope="col" class="border border-5">Create</th>
                                                    <th scope="col" class="border border-5">Read</th>
                                                    <th scope="col" class="border border-5">Update</th>
                                                    <th scope="col" class="border border-5">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mitem'></td>
                                                    <td class="border border-5">Master Item</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mitem" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mitem" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mitem" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mitem" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='muser'></td>
                                                    <td class="border border-5">Master User</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_user" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_user" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_user" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_user" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='msatuan'></td>
                                                    <td class="border border-5">Master Satuan</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_satuan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_satuan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_satuan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_satuan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mdtgrp'></td>
                                                    <td class="border border-5">Master Data Group</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_group" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_group" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_group" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_group" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcoa'></td>
                                                    <td class="border border-5">Master Chart Of Account</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_coa" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_coa" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_coa" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_coa" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mbank'></td>
                                                    <td class="border border-5">Master Bank</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bank" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bank" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bank" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bank" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mmtuang'></td>
                                                    <td class="border border-5">Master Mata Uang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mtuang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mtuang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mtuang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mtuang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcust'></td>
                                                    <td class="border border-5">Master Customer</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cust" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cust" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cust" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cust" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='msupp'></td>
                                                    <td class="border border-5">Master Supplier</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_supp" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_supp" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_supp" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_supp" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mlokasi'></td>
                                                    <td class="border border-5">Master Lokasi</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_lokasi" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_lokasi" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_lokasi" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_lokasi" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcabang'></td>
                                                    <td class="border border-5">Master Nama Cabang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cabang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cabang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cabang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cabang" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpembelianbrg'></td>
                                                    <td class="border border-5">Trans Pembelian Barang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_belibrg" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_belibrg" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_belibrg" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_belibrg" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpos'></td>
                                                    <td class="border border-5">Trans Point Of Sales</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_pos" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_pos" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_pos" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_pos" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tops'></td>
                                                    <td class="border border-5">Trans Pembayaran Operasional</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bayarops" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bayarops" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bayarops" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bayarops" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tjvouch'></td>
                                                    <td class="border border-5">Trans Jurnal Voucher</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_jvouch" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_jvouch" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_jvouch" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_jvouch" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpenerimaan'></td>
                                                    <td class="border border-5">Trans Penerimaan Barang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_penerimaan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_penerimaan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_penerimaan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_penerimaan" value="Y" checked>
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit" formaction="{{ route('muserpost') }}">Save</button>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-5">No</th>
                                        <th scope="col" class="border border-5">Name</th>
                                        <th scope="col" class="border border-5">Email</th>
                                        <th scope="col" class="border border-5">Branch</th>
                                        <th scope="col" class="border border-5">Edit</th>
                                        <th scope="col" class="border border-5">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $no = 0;
                                    @endphp
                                    @foreach($datas as $key => $item)
                                    @php $no++; @endphp
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>Otto</td>
                                        <td><a href="/materdatauser/{{ $item->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                Edit</i></a></td>
                                        <td>
                                            <form action="/materdatauser/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-icon icon-left btn-danger"
                                                    id="del-{{ $item->id }}" type="submit"
                                                    data-confirm="WARNING!|Do you want to delete {{ $item->username }} data?"
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
    $(document).ready(function() {
        $('#checkall').click(function(){
            if($(".checkbox").is(":checked")){
                console.log("Checkbox is checked.");
                $('.checkbox').prop('checked', false)
            }
            else if($(".checkbox").is(":not(:checked)")){
                console.log("Checkbox is unchecked.");
                $('.checkbox').prop('checked', true)
            }
        });
    });
</script>    
@endsection