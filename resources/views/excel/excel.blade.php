<table>
    <thead>
    <tr style="background: #BBBBBB">
        <th style="background: #BBBBBB">Name</th>
        <th style="background: #BBBBBB">Describe</th>
        <th style="background: #BBBBBB">Image</th>
        <th style="background: #BBBBBB">Price</th>
        <th style="background: #BBBBBB">Code</th>
    </tr>
    </thead>
    <tbody>
    @foreach($Products as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->describe }}</td>
            <td>{{ $user->image }}</td>
            <td>{{ $user->price }}</td>
            <td>{{ $user->code }}</td>
        </tr>
    @endforeach
    </tbody>
</table>