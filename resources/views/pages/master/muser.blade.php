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
                                        <input class="form-check-input" type="checkbox" name="create_acs" value="C" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Create
                                        </label>
                                      </div>
                                      <div class="form-check">
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
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
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
@endsection