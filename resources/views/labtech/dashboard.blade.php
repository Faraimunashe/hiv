<x-app-layout>
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Search Patient</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{route('labtech-dashboard')}}">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>ART-NUMBER</label>
                                    <input type="text" class="form-control" name="search" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
    </div>
    <div class="row">
        @if (!$searches->isEmpty())
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Search Results</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            @foreach ($searches as $search)
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" src="{{asset('assets/img/profile.png')}}" width="70">
                                    <div class="media-body">
                                    <div class="media-right">
                                        <div class="text-primary">Approved</div>
                                    </div>
                                    <div class="media-title mb-1">{{$search->fullname}}</div>
                                    <div class="text-time">Patient</div>
                                    <div class="row">
                                        <div class="col-md-6 b-r">
                                            <strong>Gender</strong>
                                            <br>
                                            <p class="text-muted">{{$search->sex}}</p>
                                        </div>
                                        <div class="col-md-6 b-r">
                                            <strong>Phone</strong>
                                            <br>
                                            <p class="text-muted">{{$search->phone}}</p>
                                        </div>
                                        <div class="col-md-6 b-r">
                                            <strong>DOB</strong>
                                            <br>
                                            <p class="text-muted">{{$search->dob}}</p>
                                        </div>
                                        <div class="col-md-6 b-r">
                                            <strong>Address</strong>
                                            <br>
                                            <p class="text-muted">{{$search->address}}</p>
                                        </div>
                                    </div>
                                    <div class="media-links">
                                        <a href="{{route('labtech-followup', $search->id)}}">
                                            <i class="fa fa-edit"></i>
                                            Update Record
                                        </a>
                                    </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
