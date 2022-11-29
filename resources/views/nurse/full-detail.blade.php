<x-app-layout>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card author-box">
            <div class="card-body">
                <div class="author-box-center">
                    <img alt="image" src="{{asset('assets/img/profile.png')}}" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <div class="author-box-name">
                        <a href="#">{{$patient->fullname}}</a>
                    </div>
                    <div class="author-box-job">{{$patient->artnum}}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('nurse-add-book', $patient->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip">
                    art care booklet
                </a>
                <a href="{{route('nurse-followup', $patient->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip">
                    record follow up
                </a>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Personal Details</h4>
            </div>
            <div class="card-body">
              <div class="py-4">
                <p class="clearfix">
                  <span class="float-left">
                    Birthday
                  </span>
                  <span class="float-right text-muted">
                    {{$patient->dob}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Phone
                  </span>
                  <span class="float-right text-muted">
                    {{$patient->phone}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Gender
                  </span>
                  <span class="float-right text-muted">
                    {{$patient->sex}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Address
                  </span>
                  <span class="float-right text-muted">
                    <a href="#">{{$patient->address}}</a>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
          <div class="card">
            <div class="padding-20">
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">Pre Art Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Art Register</a>
                </li>
              </ul>
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">

                    @if (is_null($preart->date_eligible))
                        <div class="row">
                            <div class="col-md-6 b-r">
                                <strong>Date</strong>
                                <br>
                                <p class="text-muted">{{$preart->created_at}}</p>
                            </div>
                            <div class="col-md-6 b-r">
                                <strong>Entry Point</strong>
                                <br>
                                <p class="text-muted">{{$preart->entry_point}}</p>
                            </div>
                            <div class="col-md-6 b-r">
                                <strong>Status at End</strong>
                                <br>
                                <p class="text-muted">{{$preart->status_at_end}}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Clinical Stage</strong>
                                <br>
                                <p class="text-muted">{{$preart->clinical_stage}}</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Transafered On: {{$preart->date_eligible}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    @if (is_null($art))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    Not yet in ART Register
                                </div>
                            </div>
                        </div>
                    @else

                            <div class="row">
                                <div class="col-md-6 b-r">
                                    <strong>Date Eligible</strong>
                                    <br>
                                    <p class="text-muted">{{$art->created_at}}</p>
                                </div>
                                <div class="col-md-6 b-r">
                                    <strong>Function Status</strong>
                                    <br>
                                    <p class="text-muted">{{$art->function_status}}</p>
                                </div>
                                <div class="col-md-6 b-r">
                                    <strong>Weight</strong>
                                    <br>
                                    <p class="text-muted">{{$art->weight}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Clinical Stage</strong>
                                    <br>
                                    <p class="text-muted">{{$art->clinical_stage}}</p>
                                </div>
                                <div class="col-md-6 b-r">
                                    <strong>CD4T Count</strong>
                                    <br>
                                    <p class="text-muted">{{$art->cd4t_count}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Original Regiment</strong>
                                    <br>
                                    <p class="text-muted">{{$art->original_regiment}}</p>
                                </div>
                            </div>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
