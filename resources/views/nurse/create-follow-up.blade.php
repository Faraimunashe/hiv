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
                <form method="POST" action="{{route('nurse-add-followup')}}">
                    @csrf
                    <div class="card-header">
                        <h4>Record Follow Up To {{$patient->fullname}}</h4>
                    </div>
                    <input type="hidden" class="form-control" name="patient_id" value="{{$patient->id}}" required>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Follow Up Status</label>
                                    <select class="form-control" name="follow_up_status" required>
                                        <option selected disabled>Selected Follow Up Status</option>
                                        <option value="Seen">Seen</option>
                                        <option value="Default">Default</option>
                                        <option value="Lost">Lost</option>
                                        <option value="TO">TO</option>
                                        <option value="Dead">Dead</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TB Status</label>
                                    <select class="form-control" name="tb_status" required>
                                        <option selected disabled>Selected TB Status</option>
                                        <option value="No Sign">No Sign</option>
                                        <option value="Suspect">Suspect</option>
                                        <option value="TBRX">TBRX</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CD4T Count</label>
                                    <input type="number" class="form-control" name="cd4t_count" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinical Stage</label>
                                    <input type="text" class="form-control" name="clinical_stage" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Record Follow Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
