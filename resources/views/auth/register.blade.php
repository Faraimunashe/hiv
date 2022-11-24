<x-guest-layout>
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <div class="card-header">
                <h4>HIV Treatment Adherence System</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('register')}}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-control" name="role" tabindex="1" required>
                            <option selected disabled>Select Role</option>
                            <option value="patient">Patient</option>
                            <option value="labtech">Labtech</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Confirm Password</label>
                        <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-1 text-muted text-center">
            Already have an account? <a href="{{route('login')}}">Login</a>
        </div>
    </div>
</x-guest-layout>
