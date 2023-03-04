<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>
</head>
<body>
    <form action="/table" method="get">
        @csrf
            <div id="select-division" style="width:200px;">
                <select id="division" name="division_id" required>
                    <option value="1">Division 1</option>
                    <option value="2">Division 2</option>
                    <option value="3">Division 3</option>
                    <option value="4">Division 4</option>
                    <option value="5">Division 5</option>
                    <option value="6">Division 6</option>
                </select>
            </div>
    
            <div id="select-session" style="width:200px;">
                <select id="session" name="session_id" required>
                <option value="6">Session 1</option>
                </select>
            </div>
            <input type="submit" value="Apply">
        </form>
    <table>
        @foreach ($teams as $team)
        <tr>
            <td>{{ $team['id'] }} - {{ $team['team_name'] }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
