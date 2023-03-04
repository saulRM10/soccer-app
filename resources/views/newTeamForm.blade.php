<form action="/newTeam" method="post">
    @csrf
    <label for="name">Team Name:</label>
    <input type="text" id="name" name="team_name" required>
    <br>
    <label for="division">Division:</label>
    <select id="division" name="division_id" required>
        <option value="1">Division 1</option>
        <option value="2">Division 2</option>
        <option value="3">Division 3</option>
        <option value="4">Division 4</option>
        <option value="5">Division 5</option>
        <option value="6">Division 6</option>
    </select>
    <br>
    <label for="session">Session:</label>
    <select id="session" name="session_id" required>
        <option value="6">Session 1</option>
    </select>
    <br><br>
    <input type="submit" value="Create Team">
</form>