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
                        <button class="btn btn-primary mr-1" type="submit" formaction="/materdatauser/{{ $user->id }}">Save</button>
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection