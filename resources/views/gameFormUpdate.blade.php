<!DOCTYPE html>
<html>
<head>
    <title>New Game</title>
</head>
<body>
    <form action="/updateGame" method="post">
        @csrf
            <div id="select-team-one" style="width:400px;">
                <select id="team-one" name="team_one_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team['id'] }}"  @if ($team['id'] == $currentGame['team_one_id']) selected @endif> {{ $team['team_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div id="select-team-two" style="width:400px;">
                <select id="team-two" name="team_two_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team['id'] }}"  @if ($team['id'] == $currentGame['team_two_id']) selected @endif> {{ $team['team_name'] }}</option>
                    @endforeach
                </select>
            </div>
   
            <p>team 1 goals: </p>
            <input type="text" id="team-one-goals" name="team_one_goals" value="{{ $currentGame['team_one_goals'] }}">

            <p>team 2 goals: </p>
            <input type="text" id="team-two-goals" name="team_two_goals" value="{{ $currentGame['team_two_goals'] }}">

            <p>Field</p>
            <input type="radio" id="small-field" name="field_id" value="2" @if ($currentGame['field_id'] == 2) checked @endif>
            <label for="field_id">Small Field</label><br>
            <input type="radio" id="big-field" name="field_id" value="1" @if ($currentGame['field_id'] == 1) checked @endif>
            <label for="field_id">Big Field</label><br>

            <input type="date" name="match_date" value="{{ $currentGame['match_date']}}"/>
            <input type="hidden" name="game_id" value="{{ $currentGame['id'] }}">
            <input type="hidden" name="session_id" value="{{ $currentGame['session_id'] }}">
            <input type="hidden" name="division_id" value="{{ $currentGame['division_id'] }}">
            <input type="submit" value="Save Changes">
        </form>
</body>
</html>