<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Pre-ART Register</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <div class="input-group-btn">
                        <a href="{{route('nurse-preART-add')}}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Add New
                        </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>ART #</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($prearts as $item)
                            <tr>
                                <td>
                                    @php
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td><a href="{{route('nurse-full-details', $item->id)}}"> {{$item->artnum}} </a></td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->sex}}</td>
                                <td>{{$item->dob}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <form method="GET" action="{{route('nurse-art-add')}}">
                                        <input type="hidden" name="patient_id" value="{{$item->id}}" required>
                                        <button type="submit" class="btn btn-primary btn-action mr-1" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
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
</x-app-layout>
