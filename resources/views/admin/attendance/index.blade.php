<div class="container">
    <h1>Attendance Records</h1>
    <form method="GET" action="{{ route('attendance.index') }}">
        <div class="form-group">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Show Attendance</button>
    </form>
    @if(isset($attendances))
    <table class="table">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Attendance Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $employee => $status)
            <tr>
                <td>{{ $employee }}</td>
                <td>{{ $status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>