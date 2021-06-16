@extends('Layouts.app', ["pageTitle" => "New Service Form - RSVP Medical App"])

@section('content')
    <div class="container">

        <form method="POST">
            @csrf
            <h1>Create new service form</h1>
            <fieldset>

                <div class="form-group">
                    <label class="form-label mt-4">Service name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label class="form-label mt-4">Service desciption</label>
                    <textarea class="form-control" rows="3" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label mt-4">Doctor</label>
                    <select class="form-select form-control" name="doctorId" required>
                        <option value="1">Aristide</option>
                        <option value="2">Beanca</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>

    </div>
@endsection
