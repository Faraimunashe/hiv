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
                <form method="POST" action="{{route('nurse-add-booklets')}}">
                    @csrf
                    <div class="card-header">
                        <h4>ART CARE BOOKLET - {{$patient->fullname}}</h4>
                    </div>
                    <input type="hidden" class="form-control" name="patient_id" value="{{$patient->id}}" required>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinical Stage</label>
                                    <select class="form-control" name="clinical_stage" required>
                                        <option selected disabled>Selected Clinic Stage</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TB Status</label>
                                    <select class="form-control" name="tb_status" required>
                                        <option selected disabled>Selected TB Status</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="number" class="form-control" name="weight" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Height</label>
                                    <input type="text" class="form-control" name="height" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Next Date</label>
                            <input type="date" class="form-control" name="next_date" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pills name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pills Quantity</label>
                                    <input type="number" class="form-control" name="qty" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save Booklet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
