<!DOCTYPE html>
<html>
<head>
    <title>New Game</title>
</head>
<body>
    <form action="/createGame" method="post">
        @csrf
            <div id="select-team-one" style="width:400px;">
                <select id="team-one" name="team_one_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team['id'] }}"> {{ $team['team_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div id="select-team-two" style="width:400px;">
                <select id="team-wo" name="team_two_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team['id'] }}"> {{ $team['team_name'] }}</option>
                    @endforeach
                </select>
            </div>
   
            <p>team 1 goals: </p>
            <input type="text" id="team-one-goals" name="team_one_goals">

            <p>team 2 goals: </p>
            <input type="text" id="team-two-goals" name="team_two_goals">

            <p>Field</p>
            <input type="radio" id="small-field" name="field_id" value="2">
            <label for="field_id">Small Field</label><br>
            <input type="radio" id="big-field" name="field_id" value="1">
            <label for="field_id">Big Field</label><br>

            <input type="date" name="match_date" />
            <input type="hidden" name="session_id" value="{{ $teams[0]['session_id']}}">
            <input type="hidden" name="division_id" value="{{ $teams[0]['division_id']}}">
            <input type="submit" value="Apply">
        </form>
</body>
</html>