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
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($preARTs as $item)
                            <tr>
                                <td>
                                    @php
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>{{$item->number}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->sex}}</td>
                                <td>{{$item->dob}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
