import ApiCalls from './apiCalls.js';

$(document).ready(function() {

  var updateViewWithTeams = async function() {
    var teamsContainer = document.getElementById('teamsContainer');
    teamsContainer.innerHTML = '';

    const teamData = await ApiCalls.getAllTeams();

    teamData.teams.forEach(function(team) {
        var teamElement = document.createElement('div');
        teamElement.textContent = team.team_name;

        teamsContainer.appendChild(teamElement);
      });
};

$("#getAllTeamsButtonTest").on("click", updateViewWithTeams);


});
