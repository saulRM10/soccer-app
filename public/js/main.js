import ApiCalls from './apiCalls.js';


$(document).ready(function() {

  var updateViewWithMatchHistory = async function() {
    const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5);
};

var handleDeletionOfGame = async function() {
  const gameId = $(this).data('game-id');
  const statusOfGameDeletion = await ApiCalls.deleteGame(gameId); 
}

var showTeams = async function(){
  const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5); 

  teams.sort((a, b) => {
    const nameA = a.team_name.toUpperCase(); // Convert to uppercase to ignore case sensitivity
    const nameB = b.team_name.toUpperCase();
  
    if (nameA < nameB) {
      return -1;
    }
  
    if (nameA > nameB) {
      return 1;
    }
  
    return 0;
  });

  const bladeViewFileName = 'teams';
  const route = 'teamsList';
  
  const html = await ApiCalls.renderView(teams, bladeViewFileName, route);
  document.getElementById('teamsContainer').innerHTML = html;
}


$("#getAllTeamsButtonTest").on("click", showTeams);
$(".deleteGame").on("click", handleDeletionOfGame);


});
