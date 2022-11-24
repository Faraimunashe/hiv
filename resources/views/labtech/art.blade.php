<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="POST" action="{{route('nurse-add-art')}}">
                    @csrf
                    <div class="card-header">
                        <h4>Add {{$patient->fullname}} To Art</h4>
                    </div>
                    <input type="hidden" class="form-control" name="patient_id" value="{{$patient_id}}" required>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Function Status</label>
                                    <input type="text" class="form-control" name="function_status" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinical Stage</label>
                                    <input type="text" class="form-control" name="clinical_stage" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CD4T Count<label>
                                    <input type="number" class="form-control" name="cd4t_count" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Entry Point</label>
                                    <input type="text" class="form-control" name="entry_point" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status at End</label>
                                    <input type="text" class="form-control" name="status_at_end" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinical Stage</label>
                                    <input type="text" class="form-control" name="clinical_stage" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Original Regiment</label>
                            <input type="text" class="form-control" name="original_regiment" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save Art</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
