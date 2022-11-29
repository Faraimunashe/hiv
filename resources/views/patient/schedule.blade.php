<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>NEXT APPOINTMENT</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if (is_null($book))
                                <div class="alert alert-warning">
                                    No appoint
                                </div>
                            @else
                                <div class="alert alert-success">
                                    {{$book->next_date}}
                                </div>

                            @endif
                        </div>
                        <div class="col-md-6">
                            Do not forget to take your pills everyday.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
