<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Report Data</h4>
              <div class="card-header-form">
                <form method="GET" action="{{route('nurse-reports')}}">
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form form-control" name="query" required>
                                <option value="lost follow up"> Lost Follow Up</option>
                                <option value="dead"> Dead</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Address</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($reports as $item)
                            <tr>
                                <td>
                                    @php
                                        $patient = \App\Models\Patient::find($item->patient_id);
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td><a href="{{route('nurse-full-details', $item->id)}}"> {{$patient->artnum}} </a></td>
                                <td>{{$patient->fullname}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->address}}</td>
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
