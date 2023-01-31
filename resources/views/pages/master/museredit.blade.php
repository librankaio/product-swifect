@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master User Edit</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master User Edit</h4>
                    </div>
                    <form action="" method="POST">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Branch</label>
                                    <select class="form-control" name="branch">
                                        <option selected>{{ $user->username }}</option>
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
                                        <input class="form-check-input" type="checkbox" name="create_acs" id="checkall">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Check All
                                        </label>
                                    </div>
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
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mitem'></td> --}}
                                                    <td class="border border-5">Master Item</td>
                                                    {{-- <td class="border border-5">{{ $auth_mitem->feature }}</td> --}}
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            
                                                            @if($auth_mitem->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mitem" value="Y" checked>
                                                            @elseif($auth_mitem->save == 'N' || $auth_mitem->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mitem" value="Y">                                                                
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            @if($auth_mitem->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mitem" value="Y" checked>
                                                            @elseif($auth_mitem->open == 'N' || $auth_mitem->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mitem" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_mitem" value="Y" checked> --}}
                                                            @if($auth_mitem->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mitem" value="Y" checked>
                                                            @elseif($auth_mitem->updt == 'N' || $auth_mitem->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mitem" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_mitem" value="Y" checked> --}}
                                                            @if($auth_mitem->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mitem" value="Y" checked>
                                                            @elseif($auth_mitem->dlt == 'N' || $auth_mitem->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mitem" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='muser'></td> --}}
                                                    <td class="border border-5">Master User</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_user" value="Y" checked> --}}
                                                            @if($auth_muser->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_user" value="Y" checked>
                                                            @elseif($auth_muser->save == 'N' || $auth_muser->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_user" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_user" value="Y" checked> --}}
                                                            @if($auth_muser->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_user" value="Y" checked>
                                                            @elseif($auth_muser->open == 'N' || $auth_muser->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_user" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_user" value="Y" checked> --}}
                                                            @if($auth_muser->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_user" value="Y" checked>
                                                            @elseif($auth_muser->updt == 'N' || $auth_muser->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_user" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_user" value="Y" checked> --}}
                                                            @if($auth_muser->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_user" value="Y" checked>
                                                            @elseif($auth_muser->dlt == 'N' || $auth_muser->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_user" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='msatuan'></td> --}}
                                                    <td class="border border-5">Master Satuan</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_satuan" value="Y" checked> --}}
                                                            @if($auth_msatuan->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_satuan" value="Y" checked>
                                                            @elseif($auth_msatuan->save == 'N' || $auth_msatuan->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_satuan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_satuan" value="Y" checked> --}}
                                                            @if($auth_msatuan->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_satuan" value="Y" checked>
                                                            @elseif($auth_msatuan->open == 'N' || $auth_msatuan->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_satuan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_satuan" value="Y" checked> --}}
                                                            @if($auth_msatuan->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_satuan" value="Y" checked>
                                                            @elseif($auth_msatuan->updt == 'N' || $auth_msatuan->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_satuan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_satuan" value="Y" checked> --}}
                                                            @if($auth_msatuan->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_satuan" value="Y" checked>
                                                            @elseif($auth_msatuan->dlt == 'N' || $auth_msatuan->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_satuan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mdtgrp'></td> --}}
                                                    <td class="border border-5">Master Data Group</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_group" value="Y" checked> --}}
                                                            @if($auth_mdtgrp->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_group" value="Y" checked>
                                                            @elseif($auth_mdtgrp->save == 'N' || $auth_mdtgrp->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_group" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_group" value="Y" checked> --}}
                                                            @if($auth_mdtgrp->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_group" value="Y" checked>
                                                            @elseif($auth_mdtgrp->open == 'N' || $auth_mdtgrp->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_group" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_group" value="Y" checked> --}}
                                                            @if($auth_mdtgrp->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_group" value="Y" checked>
                                                            @elseif($auth_mdtgrp->updt == 'N' || $auth_mdtgrp->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_group" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_group" value="Y" checked> --}}
                                                            @if($auth_mdtgrp->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_group" value="Y" checked>
                                                            @elseif($auth_mdtgrp->dlt == 'N' || $auth_mdtgrp->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_group" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcoa'></td> --}}
                                                    <td class="border border-5">Master Chart Of Account</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_coa" value="Y" checked> --}}
                                                            @if($auth_mcoa->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_coa" value="Y" checked>
                                                            @elseif($auth_mcoa->save == 'N' || $auth_mcoa->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_coa" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_coa" value="Y" checked> --}}
                                                            @if($auth_mcoa->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_coa" value="Y" checked>
                                                            @elseif($auth_mcoa->open == 'N' || $auth_mcoa->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_coa" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_coa" value="Y" checked> --}}
                                                            @if($auth_mcoa->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_coa" value="Y" checked>
                                                            @elseif($auth_mcoa->updt == 'N' || $auth_mcoa->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_coa" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_coa" value="Y" checked> --}}
                                                            @if($auth_mcoa->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_coa" value="Y" checked>
                                                            @elseif($auth_mcoa->dlt == 'N' || $auth_mcoa->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_coa" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mbank'></td> --}}
                                                    <td class="border border-5">Master Bank</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_bank" value="Y" checked> --}}
                                                            @if($auth_mbank->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bank" value="Y" checked>
                                                            @elseif($auth_mbank->save == 'N' || $auth_mbank->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bank" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_bank" value="Y" checked> --}}
                                                            @if($auth_mbank->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bank" value="Y" checked>
                                                            @elseif($auth_mbank->open == 'N' || $auth_mbank->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bank" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_bank" value="Y" checked> --}}
                                                            @if($auth_mbank->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bank" value="Y" checked>
                                                            @elseif($auth_mbank->updt == 'N' || $auth_mbank->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bank" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_bank" value="Y" checked> --}}
                                                            @if($auth_mbank->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bank" value="Y" checked>
                                                            @elseif($auth_mbank->dlt == 'N' || $auth_mbank->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bank" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mmtuang'></td> --}}
                                                    <td class="border border-5">Master Mata Uang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_mtuang" value="Y" checked> --}}
                                                            @if($auth_mmtuang->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mtuang" value="Y" checked>
                                                            @elseif($auth_mmtuang->save == 'N' || $auth_mmtuang->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_mtuang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_mtuang" value="Y" checked> --}}
                                                            @if($auth_mmtuang->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mtuang" value="Y" checked>
                                                            @elseif($auth_mmtuang->open == 'N' || $auth_mmtuang->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_mtuang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_mtuang" value="Y" checked> --}}
                                                            @if($auth_mmtuang->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mtuang" value="Y" checked>
                                                            @elseif($auth_mmtuang->updt == 'N' || $auth_mmtuang->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_mtuang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_mtuang" value="Y" checked> --}}
                                                            @if($auth_mmtuang->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mtuang" value="Y" checked>
                                                            @elseif($auth_mmtuang->dlt == 'N' || $auth_mmtuang->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_mtuang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcust'></td> --}}
                                                    <td class="border border-5">Master Customer</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_cust" value="Y" checked> --}}
                                                            @if($auth_mcust->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cust" value="Y" checked>
                                                            @elseif($auth_mcust->save == 'N' || $auth_mcust->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cust" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_cust" value="Y" checked> --}}
                                                            @if($auth_mcust->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cust" value="Y" checked>
                                                            @elseif($auth_mcust->open == 'N' || $auth_mcust->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cust" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_cust" value="Y" checked> --}}
                                                            @if($auth_mcust->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cust" value="Y" checked>
                                                            @elseif($auth_mcust->updt == 'N' || $auth_mcust->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cust" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_cust" value="Y" checked> --}}
                                                            @if($auth_mcust->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cust" value="Y" checked>
                                                            @elseif($auth_mcust->dlt == 'N' || $auth_mcust->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cust" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='msupp'></td> --}}
                                                    <td class="border border-5">Master Supplier</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_supp" value="Y" checked> --}}
                                                            @if($auth_msupp->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_supp" value="Y" checked>
                                                            @elseif($auth_msupp->save == 'N' || $auth_msupp->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_supp" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_supp" value="Y" checked> --}}
                                                            @if($auth_msupp->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_supp" value="Y" checked>
                                                            @elseif($auth_msupp->open == 'N' || $auth_msupp->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_supp" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_supp" value="Y" checked> --}}
                                                            @if($auth_msupp->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_supp" value="Y" checked>
                                                            @elseif($auth_msupp->updt == 'N' || $auth_msupp->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_supp" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_supp" value="Y" checked> --}}
                                                            @if($auth_msupp->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_supp" value="Y" checked>
                                                            @elseif($auth_msupp->dlt == 'N' || $auth_msupp->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_supp" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mlokasi'></td> --}}
                                                    <td class="border border-5">Master Lokasi</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_lokasi" value="Y" checked> --}}
                                                            @if($auth_mlokasi->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_lokasi" value="Y" checked>
                                                            @elseif($auth_mlokasi->save == 'N' || $auth_mlokasi->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_lokasi" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_lokasi" value="Y" checked> --}}
                                                            @if($auth_mlokasi->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_lokasi" value="Y" checked>
                                                            @elseif($auth_mlokasi->open == 'N' || $auth_mlokasi->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_lokasi" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_lokasi" value="Y" checked> --}}
                                                            @if($auth_mlokasi->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_lokasi" value="Y" checked>
                                                            @elseif($auth_mlokasi->updt == 'N' || $auth_mlokasi->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_lokasi" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_lokasi" value="Y" checked> --}}
                                                            @if($auth_mlokasi->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_lokasi" value="Y" checked>
                                                            @elseif($auth_mlokasi->dlt == 'N' || $auth_mlokasi->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_lokasi" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='mcabang'></td> --}}
                                                    <td class="border border-5">Master Nama Cabang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_cabang" value="Y" checked> --}}
                                                            @if($auth_mcabang->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cabang" value="Y" checked>
                                                            @elseif($auth_mcabang->save == 'N' || $auth_mcabang->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_cabang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_cabang" value="Y" checked> --}}
                                                            @if($auth_mcabang->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cabang" value="Y" checked>
                                                            @elseif($auth_mcabang->open == 'N' || $auth_mcabang->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_cabang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_cabang" value="Y" checked> --}}
                                                            @if($auth_mcabang->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cabang" value="Y" checked>
                                                            @elseif($auth_mcabang->updt == 'N' || $auth_mcabang->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_cabang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_cabang" value="Y" checked> --}}
                                                            @if($auth_mcabang->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cabang" value="Y" checked>
                                                            @elseif($auth_mcabang->dlt == 'N' || $auth_mcabang->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_cabang" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpembelianbrg'></td> --}}
                                                    <td class="border border-5">Trans Pembelian Barang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_belibrg" value="Y" checked> --}}
                                                            @if($auth_tpembelianbrg->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_belibrg" value="Y" checked>
                                                            @elseif($auth_tpembelianbrg->save == 'N' || $auth_tpembelianbrg->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_belibrg" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_belibrg" value="Y" checked> --}}
                                                            @if($auth_tpembelianbrg->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_belibrg" value="Y" checked>
                                                            @elseif($auth_tpembelianbrg->open == 'N' || $auth_tpembelianbrg->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_belibrg" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_belibrg" value="Y" checked> --}}
                                                            @if($auth_tpembelianbrg->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_belibrg" value="Y" checked>
                                                            @elseif($auth_tpembelianbrg->updt == 'N' || $auth_tpembelianbrg->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_belibrg" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_belibrg" value="Y" checked> --}}
                                                            @if($auth_tpembelianbrg->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_belibrg" value="Y" checked>
                                                            @elseif($auth_tpembelianbrg->dlt == 'N' || $auth_tpembelianbrg->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_belibrg" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpos'></td> --}}
                                                    <td class="border border-5">Trans Point Of Sales</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_pos" value="Y" checked> --}}
                                                            @if($auth_tpos->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_pos" value="Y" checked>
                                                            @elseif($auth_tpos->save == 'N' || $auth_tpos->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_pos" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_pos" value="Y" checked> --}}
                                                            @if($auth_tpos->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_pos" value="Y" checked>
                                                            @elseif($auth_tpos->open == 'N' || $auth_tpos->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_pos" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_pos" value="Y" checked> --}}
                                                            @if($auth_tpos->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_pos" value="Y" checked>
                                                            @elseif($auth_tpos->updt == 'N' || $auth_tpos->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_pos" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_pos" value="Y" checked> --}}
                                                            @if($auth_tpos->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_pos" value="Y" checked>
                                                            @elseif($auth_tpos->dlt == 'N' || $auth_tpos->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_pos" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tops'></td> --}}
                                                    <td class="border border-5">Trans Pembayaran Operasional</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_bayarops" value="Y" checked> --}}
                                                            @if($auth_tops->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bayarops" value="Y" checked>
                                                            @elseif($auth_tops->save == 'N' || $auth_tops->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_bayarops" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_bayarops" value="Y" checked> --}}
                                                            @if($auth_tops->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bayarops" value="Y" checked>
                                                            @elseif($auth_tops->open == 'N' || $auth_tops->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_bayarops" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_bayarops" value="Y" checked> --}}
                                                            @if($auth_tops->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bayarops" value="Y" checked>
                                                            @elseif($auth_tops->updt == 'N' || $auth_tops->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_bayarops" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_bayarops" value="Y" checked> --}}
                                                            @if($auth_tops->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bayarops" value="Y" checked>
                                                            @elseif($auth_tops->dlt == 'N' || $auth_tops->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_bayarops" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tjvouch'></td> --}}
                                                    <td class="border border-5">Trans Jurnal Voucher</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_jvouch" value="Y" checked> --}}
                                                            @if($auth_tjvouch->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_jvouch" value="Y" checked>
                                                            @elseif($auth_tjvouch->save == 'N' || $auth_tjvouch->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_jvouch" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_jvouch" value="Y" checked> --}}
                                                            @if($auth_tjvouch->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_jvouch" value="Y" checked>
                                                            @elseif($auth_tjvouch->open == 'N' || $auth_tjvouch->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_jvouch" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_jvouch" value="Y" checked> --}}
                                                            @if($auth_tjvouch->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_jvouch" value="Y" checked>
                                                            @elseif($auth_tjvouch->updt == 'N' || $auth_tjvouch->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_jvouch" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_jvouch" value="Y" checked> --}}
                                                            @if($auth_tjvouch->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_jvouch" value="Y" checked>
                                                            @elseif($auth_tjvouch->dlt == 'N' || $auth_tjvouch->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_jvouch" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><input style='width:120px;' readonly class='noteclass form-control' name='features[]' type='text' value='tpenerimaan'></td> --}}
                                                    <td class="border border-5">Trans Penerimaan Barang</td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="create_penerimaan" value="Y" checked> --}}
                                                            @if($auth_tpenerimaan->save == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_penerimaan" value="Y" checked>
                                                            @elseif($auth_tpenerimaan->save == 'N' || $auth_tpenerimaan->save == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="create_penerimaan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="read_penerimaan" value="Y" checked> --}}
                                                            @if($auth_tpenerimaan->open == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_penerimaan" value="Y" checked>
                                                            @elseif($auth_tpenerimaan->open == 'N' || $auth_tpenerimaan->open == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="read_penerimaan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="update_penerimaan" value="Y" checked> --}}
                                                            @if($auth_tpenerimaan->updt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_penerimaan" value="Y" checked>
                                                            @elseif($auth_tpenerimaan->updt == 'N' || $auth_tpenerimaan->updt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="update_penerimaan" value="Y">
                                                            @endif
                                                            {{-- <label class="form-check-label" for="flexCheckDefault">Create</label> --}}
                                                        </div>
                                                    </td>
                                                    <td class="border border-5 text-center pb-3">
                                                        <div class="form-check">
                                                            {{-- <input class="form-check-input checkbox" type="checkbox" name="delete_penerimaan" value="Y" checked> --}}
                                                            @if($auth_tpenerimaan->dlt == 'Y')
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_penerimaan" value="Y" checked>
                                                            @elseif($auth_tpenerimaan->dlt == 'N' || $auth_tpenerimaan->dlt == null)
                                                            <input class="form-check-input checkbox" type="checkbox" name="delete_penerimaan" value="Y">
                                                            @endif
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
                        <button class="btn btn-primary mr-1" type="submit" formaction="/materdatauser/{{ $user->id }}">Save</button>
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                    </div>
                    </form>
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