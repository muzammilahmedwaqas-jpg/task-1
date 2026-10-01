<!DOCTYPE html>
<html>
<head>
    <title>Member Portal</title>
</head>
<body>

    <header>
        <h2>Member Portal</h2>
        <a href="{{ route('login') }}">Log in</a>
    </header>

    <hr>

    <h3>Seeded Members & Documents</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Documents</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        @if($member->documents->count() > 0)
                            @foreach($member->documents as $doc)
                                <div>{{ $doc->filename }}</div>
                            @endforeach
                        @else
                            None
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>