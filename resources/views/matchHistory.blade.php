<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="{{ asset('js/main.js') }}" defer type="module"></script>
    <title>Games</title>
</head>
<body>
    <button id="getAllTeamsButtonTest"> show all teams </button>
    <div id="teamsContainer"></div>
    <table>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game['id'] }} - {{ $game['match_date'] }}</td>
            <td>{{  $game['team_one_name'] }}: {{  $game['team_one_goals'] }} vs {{ $game['team_two_name'] }}: {{ $game['team_two_goals'] }}</td>
            <td>
                <form action="/updateGameForm" method="post">
                @csrf
                    <button type="submit" name="id" value="{{ $game['id'] }}" > edit </button>
                </form>
            </td>
            <td>
                <form action="/deleteGame" method="post">
                    @csrf
                        <button type="submit" name="id" value="{{ $game['id'] }}" > X </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>
