<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>ART Care Booklet</h4>
              <div class="card-header-form">
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
                            <th>weight</th>
                            <th>Height</th>
                            <th>Clinical Stage</th>
                            <th>TB Status</th>
                            <th>Next Date</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($booklets as $item)
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
                                <td>{{$item->weight}}</td>
                                <td>{{$item->height}}</td>
                                <td>{{$item->clinical_stage}}</td>
                                <td>{{$item->tb_status}}</td>
                                <td>{{$item->next_date}}</td>
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
