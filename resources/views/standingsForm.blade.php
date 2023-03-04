<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>
</head>
<body>
    <form method="POST" action="/teams">
        @csrf
        <label for="team_name">Team Name:</label>
        <input type="text" id="team_name" name="team_name" required>
        <label for="cars">Choose Session:</label>
        <select id="session" name="Session">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <label for="cars">Choose Division:</label>
        <select id="division" name="Division">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button type="submit">Search</button>
    </form>
</body>
</html>