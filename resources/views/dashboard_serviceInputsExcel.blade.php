<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Worker</th>
            <th>Master</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inputs as $input)
            <tr>
                <td>{{$input->created_at}}</td>
                <td>{{$input->description}}</td>
                <td>{{$input->user}}</td>
                <td>{{$input->admin}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
